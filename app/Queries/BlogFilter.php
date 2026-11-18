<?php

namespace App\Queries;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;

class BlogFilter
{
    protected Builder $builder;
    protected array $input;

    public function apply(array $input): Builder
    {
        $this->builder = Blog::query();
        $this->input = $input;

        foreach ($this->input as $name => $value) {
            if (is_null($value)) {
                continue;
            }

            $method = 'filter' . ucfirst($name);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }

        return $this->builder;
    }

    protected function filterTitle(string $value): void
    {
        $this->builder->where('title', 'like', "%{$value}%");
    }

    protected function filterCategoryName(string $value): void
    {
        $this->builder->whereHas('category', function (Builder $query) use ($value) {
            $query->where('category_name', 'like', "%{$value}%");
        });
    }

    protected function filterCategory_id(int $value): void
    {
        $this->builder->where('category_id', $value);
    }

    protected function filterFilter_id(int $value): void
    {
        $this->builder->whereHas('filters', function (Builder $query) use ($value) {
            $query->where('filters.filter_id', $value);
        });
    }

    protected function filterSort(string $value): void
    {
        switch ($value) {
            case 'title_asc':
                $this->builder->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $this->builder->orderBy('title', 'desc');
                break;
            case 'date_asc':
                $this->builder->orderBy('dt_created', 'asc');
                break;
            case 'date_desc':
            default:
                $this->builder->orderBy('dt_created', 'desc');
                break;
        }
    }
}
