<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Models\Customer;

class CustomerController extends BaseController
{
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index()
    {
        $customer = Customer::paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Data Retrieved Successfully',
            'data' => $customer
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'nomor_telepon' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'nama_paket' => 'required|string'
        ]);
    
        $user = Customer::create([
            'nama_customer' => $request->nama_customer,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'nama_paket' => $request->nama_paket,
            'foto_ktp' => $request->foto_ktp,
            'foto_rumah' => $request->foto_rumah,
            'status' => 'Pending'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Stored Successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $sales = Customer::findOrFail($id);

        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'nomor_telepon' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'nama_paket' => 'required|string'
        ]);

        $sales->update([
            'nama_customer' => $request->nama_customer,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'nama_paket' => $request->nama_paket,
            'foto_ktp' => $request->foto_ktp,
            'foto_rumah' => $request->foto_rumah
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Updated Successfully'
        ], 200);
    }

    public function destroy($id)
    {
        $paket = Customer::findOrFail($id);

        $paket->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Deleted Successfully'
        ], 200);
    }
}
