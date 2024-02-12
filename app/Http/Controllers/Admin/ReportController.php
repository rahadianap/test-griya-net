<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use App\Models\Report;

class ReportController extends BaseController
{
    public function index()
    {
        $sales = Report::paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Data Retrieved Successfully',
            'data' => $sales
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_name' => 'required|string|max:255',
            'report_view' => 'required|string'
        ]);

        $user = User::create([
            'report_name' => $request->report_name,
            'report_view' => $request->report_view
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Stored Successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $sales = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|numeric',
            'password' => 'required|confirmed'
        ]);

        $sales->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Updated Successfully'
        ], 200);
    }

    public function destroy($id)
    {
        $paket = User::findOrFail($id);

        $paket->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Deleted Successfully'
        ], 200);
    }
}
