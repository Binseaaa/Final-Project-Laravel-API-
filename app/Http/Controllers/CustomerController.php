<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('name', 'ASC')->get();

        return response()->json($customers);
    }

    public function view (Customer $customer) {

        $customer->load('sales');
        return response()->json($customer);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        $fields = $request->validate([
            'name'    => 'required|string',
            'address' => 'required|string',
            'phone'   => 'required|string',
            'balance' => 'required|numeric',
        ]);

        $customer = Customer::create($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Customer ' . $customer->name . ' has been created.',
            'data'      => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $fields = $request->validate([
            'name'    => 'string',
            'address' => 'string',
            'phone'   => 'string',
            'balance' => 'numeric',
        ]);

        $customer->update($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Customer with ID# ' . $customer->id . ' has been updated.' ,
            'data'      => $customer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $details = $customer->id;
        $customer->delete();

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Customer with the ID# ' . $details . ' has been deleted.'
        ]);
    }
}
