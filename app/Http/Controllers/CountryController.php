<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\CountryRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CountryController extends Controller
{
    public function index(): View
    {
        $countries = Country::query()->orderBy('name')->paginate(5);
        return view('country.index', compact('countries'));
    }

    public function create(): View
    {
        return view('country.create');
    }

    public function store(CountryRequest $request): RedirectResponse
    {
        Country::create($request->validated());
        return redirect()->route('country.index');
    }

    public function show(Country $country): View
    {
        return view('country.show', compact('country'));
    }

    public function edit(Country $country): View
    {
        return view('country.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->validated());
        return redirect()->route('country.index');
    }

    public function destroy(Country $country): RedirectResponse
    {
        $country->delete();
        return redirect()->route('country.index');
    }
}
