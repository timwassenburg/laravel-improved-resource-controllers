<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        Customer::create($request->all());

        return redirect()->route('customers.index')
            ->with('message', 'Customer saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return View
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('message', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('message', 'Customer deleted successfully.');
    }
}
