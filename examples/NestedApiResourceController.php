<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Country  $country
     * @return JsonResponse
     */
    public function index(Country $country)
    {
        $cities = $country->cities;

        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param  Country  $country
     * @return JsonResponse
     */
    public function store(Request $request, Country $country)
    {
        $city = $country->cities()->create($request->all());

        return response()->json($city, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Country  $country
     * @param  City  $city
     * @return JsonResponse
     */
    public function show(Country $country, City $city)
    {
        $city = $country->cities->find($city);

        return response()->json($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Country  $country
     * @param  City  $city
     * @return JsonResponse
     */
    public function update(Request $request, Country $country, City $city)
    {
        $country->cities->find($city)->update($request->all());

        return response()->json($city->fresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Country  $country
     * @param  City  $city
     * @return JsonResponse
     */
    public function destroy(Country $country, City $city)
    {
        $country->cities->find($city)->delete();

        return response()->json(null, RESPONSE::HTTP_NO_CONTENT);
    }
}
