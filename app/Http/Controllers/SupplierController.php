<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('company_name', 'ASC')->get();

        return response()->json($suppliers);
    }

    public function view (Supplier $supplier) {
        return response()->json($supplier);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Supplier $supplier)
    {
        $fields = $request->validate([
            'company_name'  => 'required|string',
            'address'       => 'required|string',
            'phone'         => 'required|string',
            'contact_person'=> 'required|string'
        ]);

        $supplier = Supplier::create($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Supplier ' . $supplier->company_name . ' has been created.',
            'data'      => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $fields = $request->validate([
            'company_name'  => 'string',
            'address'       => 'string',
            'phone'         => 'string',
            'contact_person'=> 'string'
        ]);

        $supplier->update($fields);

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Supplier with ID# ' . $supplier->id . ' has been updated.',
            'data'      => $supplier
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $details = $supplier->id;
        $supplier->delete();

        return response()->json([
            'status'    => 'OK',
            'message'   => 'Supplier with the ID# ' . $details . ' has been deleted.'
        ]);
    }
}
