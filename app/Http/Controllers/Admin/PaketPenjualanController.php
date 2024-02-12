<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\PaketPenjualan;

class PaketPenjualanController extends BaseController
{
    public function index()
    {
        $paket = PaketPenjualan::paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Data Retrieved Successfully',
            'data' => $paket
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga_paket' => 'required|numeric',
        ]);

        $paket = PaketPenjualan::create([
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Stored Successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $paket = PaketPenjualan::findOrFail($id);

        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga_paket' => 'required|numeric',
        ]);

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Updated Successfully'
        ], 200);
    }

    public function destroy($id)
    {
        $paket = PaketPenjualan::findOrFail($id);

        $paket->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Deleted Successfully'
        ], 200);
    }
}
