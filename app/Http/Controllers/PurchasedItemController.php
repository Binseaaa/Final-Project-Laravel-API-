<?php

namespace App\Http\Controllers;

use App\Models\PurchasedItem;
use Illuminate\Http\Request;

class PurchasedItemController extends Controller
{
    public function index()
    {
        $purchasedItems = PurchasedItem::orderBy('id')->get();

        return response()->json($purchasedItems);
    }

    public function view (PurchasedItem $purchasedItem) {
        return response()->json($purchasedItem);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PurchasedItem $purchasedItem)
    {
        $fields = $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'purchase_id'    => 'required|exists:purchases,id',
            'whole_sale_qty' => 'required|integer',
            'purchase_price' => 'required|numeric'
        ]);

        $purchasedItem = PurchasedItem::create($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Purchased Item with ID# ' . $purchasedItem->id . ' has been created.',
            'data'      => $purchasedItem
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchasedItem $purchasedItem)
    {
        $fields = $request->validate([
            'merchandise_id' => 'exists:merchandises,id',
            'purchase_id'    => 'exists:purchases,id',
            'whole_sale_qty' => 'integer',
            'purchase_price' => 'numeric'
        ]);

        $purchasedItem->update($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Purchased Item with ID# ' . $purchasedItem->id . ' has been updated.',
            'data'      => $purchasedItem
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchasedItem $purchasedItem)
    {
        $details = $purchasedItem->id;
        $purchasedItem->delete();

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Purchased Item with the ID# ' . $details . ' has been deleted.'
        ]);
    }
}
