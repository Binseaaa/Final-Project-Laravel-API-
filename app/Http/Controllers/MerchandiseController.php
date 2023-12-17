<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchandises = Merchandise::orderBy('brand', 'ASC')->get();

        return response()->json($merchandises);
    }

    public function view (Merchandise $merchandise) {
        return response()->json($merchandise);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Merchandise $merchandise)
    {
        $fields = $request->validate([
            'brand'            => 'required|string',
            'description'      => 'required|string',
            'retail_price'     => 'required|numeric',
            'whole_sale_price' => 'required|numeric',
            'qty_stock'        => 'required|integer'
        ]);

        $merchandise = Merchandise::create($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Merchandise ' . $merchandise->brand . ' has been created.',
            'data'      => $merchandise 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchandise $merchandise)
    {
        $fields = $request->validate([
            'brand'            => 'string',
            'description'      => 'string',
            'retail_price'     => 'numeric',
            'whole_sale_price' => 'numeric',
            'qty_stock'        => 'integer'
        ]);

        $merchandise->update($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Merchandise with ID# ' . $merchandise->id . ' has been updated.',
            'data'      => $merchandise 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchandise $merchandise)
    {
        $details = $merchandise->id;
        $merchandise->delete();

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Account with the ID# ' . $details . ' has been deleted.'
        ]);
    }
}
