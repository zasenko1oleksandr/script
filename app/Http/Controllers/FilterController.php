<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Http\Requests\FilterRequest;

class FilterController extends Controller
{
    public function index()
    {
        $filters = Filter::query()->orderBy('filter_name')->paginate(5);
        return view('filter.index', compact('filters'));
    }

    public function create()
    {
        return view('filter.create');
    }

    public function store(FilterRequest $request)
    {
        Filter::create($request->validated());
        return redirect()->route('filters.index');
    }

    public function edit(Filter $filter)
    {
        return view('filter.edit', compact('filter'));
    }

    public function update(FilterRequest $request, Filter $filter)
    {
        $filter->update($request->validated());
        return redirect()->route('filters.index');
    }

    public function destroy(Filter $filter)
    {
        $filter->delete();
        return redirect()->route('filters.index');
    }
}
