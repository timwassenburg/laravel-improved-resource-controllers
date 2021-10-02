<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $customer = Customer::create($request->all());

        return response()->json($customer, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Customer  $customer
     * @return JsonResponse
     */
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Customer  $customer
     * @return JsonResponse
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Customer  $customer
     * @return JsonResponse
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(null, RESPONSE::HTTP_NO_CONTENT);
    }
}
