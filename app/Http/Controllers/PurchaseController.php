<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('id')->get();

        return response()->json($purchases);
    }

    public function view (Purchase $purchase) {
        return response()->json($purchase);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Purchase $purchase)
    {
        $fields = $request->validate([
            'date'        => 'required|timestamp',
            'total'       => 'required|numeric',
            'supplier_id' => 'required|extists:suppliers,id',
            'user_id'     => 'required|exists:users,id'
        ]);

        $purchase = Purchase::create($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Purchase with ID#' . $purchase->id . ' has been created.'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        $fields = $request->validate([
            'date'        => 'timestamp',
            'total'       => 'numeric',
            'supplier_id' => 'exists:suppliers,id',
            'user_id'     => 'exists:users,id'
        ]);

        $purchase->update($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Purchase with ID# ' . $purchase->id . ' has been updated.' 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        $details = $purchase->id;
        $purchase->delete();

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Purchase with the ID# ' . $details . ' has been deleted.'
        ]);
    }
}
