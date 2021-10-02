<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Country  $country
     * @return View
     */
    public function index(Country $country)
    {
        $cities = $country->cities;

        return view('cities.index', compact('cities', 'country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Country  $country
     * @return View
     */
    public function create(Country $country)
    {
        return view('cities.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param  Country  $country
     * @return RedirectResponse
     */
    public function store(Request $request, Country $country)
    {
        $country->cities()->create($request->all());

        return redirect()->route('countries.cities.index', $country->id)
            ->with('message', 'City saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Country  $country
     * @param  City  $city
     * @return View
     */
    public function show(Country $country, City $city)
    {
        return view('cities.show', compact('country', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Country  $country
     * @param  City  $city
     * @return View
     */
    public function edit(Country $country, City $city)
    {
        return view('cities.edit', compact('country', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Country  $country
     * @param  City  $city
     * @return RedirectResponse
     */
    public function update(Request $request, Country $country, City $city)
    {
        $city->update($request->all());

        return redirect()->route('countries.cities.index', $country->id)
            ->with('message', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Country  $country
     * @param  City  $city
     * @return RedirectResponse
     */
    public function destroy(Country $country, City $city)
    {
        $city->delete();

        return redirect()->route('countries.cities.index', $country->id)
            ->with('message', 'City deleted successfully.');
    }
}
