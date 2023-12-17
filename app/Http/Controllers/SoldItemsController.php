<?php

namespace App\Http\Controllers;

use App\Models\SoldItems;
use Illuminate\Http\Request;

class SoldItemsController extends Controller
{
    public function index()
    {
        $soldItems = SoldItems::orderBy('id')->get();

        return response()->json($soldItems);
    }

    public function view(SoldItems $soldItem)
    {
        return response()->json($soldItem);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'sale_id'        => 'required|exists:sales,id',
            'qty'            => 'required|integer',
            'selling_price'  => 'required|numeric',
        ]);

        $soldItem = SoldItems::create($fields);

        return response()->json([
            'status'  => 'OK',
            'message' => 'Sold Item with ID# ' . $soldItem->id . ' has been created.',
            'data'    => $soldItem,
        ]);
    }

    public function update(Request $request, SoldItems $soldItem)
    {
        $fields = $request->validate([
            'merchandise_id' => 'exists:merchandises,id',
            'sale_id'        => 'exists:sales,id',
            'qty'            => 'integer',
            'selling_price'  => 'numeric',
        ]);

        $soldItem->update($fields);

        return response()->json([
            'status'  => 'OK',
            'message' => 'Sold Item with ID# ' . $soldItem->id . ' has been updated.',
            'data'    => $soldItem,
        ]);
    }

    public function destroy(SoldItems $soldItem)
    {
        $details = $soldItem->id;
        $soldItem->delete();

        return response()->json([
            'status'  => 'OK',
            'message' => 'Sold Item with the ID# ' . $details . ' has been deleted.',
        ]);
    }
}
