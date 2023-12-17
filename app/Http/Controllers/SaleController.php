<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('id')->get();

        return response()->json($sales);
    }

    public function view (Sale $sale) {
        $sale->load('customer');
        return response()->json($sale);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Sale $sale)
    {
        $fields = $request->validate([
            'customer_id'   => 'required|exists:customers,id',
            'user_id'       => 'required|exists:users,id',
            'date'          => 'required|timestamp',
            'is_credit'     => 'required|tiny integer|between:0,1',
        ]);

        $sale = Sale::create($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Sale ' . $sale->company_name . ' has been created.',
            'data'      => $sale
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $fields = $request->validate([
            'customer_id'   => 'exists:customers,id',
            'user_id'       => 'exists:users,id',
            'date'          => 'timestamp',
            'is_credit'     => 'tiny integer|between:0,1',
        ]);

        $sale->update($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Sale with ID# ' . $sale->id . ' has been updated.',
            'data'      => $sale 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $details = $sale->id;
        $sale->delete();

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Sale with the ID# ' . $details . ' has been deleted.'
        ]);
    }
}
