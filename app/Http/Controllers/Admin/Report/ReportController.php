<?php

namespace App\Http\Controllers\Admin\Report;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use PDF;
use DB;

use App\Models\User;
use App\Models\Report;
use App\Models\Customer;
use App\Models\PaketPenjualan;

class ReportController extends BaseController
{
    public function indexReport()
    {
        $report = Report::paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Data Retrieved Successfully',
            'data' => $report
        ], 200);
    }
    
    public function download() 
    {
        $data = [
            [
                'quantity' => 1,
                'description' => '1 Year Subscription',
                'price' => '129.00'
            ]
        ];
     
        $pdf = Pdf::loadView('report/allsales', ['data' => $data]);
     
        return $pdf->download();
    }

    public function stream() 
    {
        $data = Customer::select(DB::raw('MAX(customers.nama_customer) as nama_customer'), DB::raw('MAX(customers.nama_paket) as nama_paket'), 'paket_penjualan.harga_paket', DB::raw('MAX(paket_penjualan.harga_paket) as total'))
        ->leftJoin('paket_penjualan', 'customers.nama_paket', '=', 'paket_penjualan.nama_paket')
        ->groupBy('paket_penjualan.harga_paket')
        ->get();

        $dataTotal = PaketPenjualan::select(DB::raw('SUM(harga_paket) as harga_paket'))->get();
     
        $pdf = Pdf::loadView('report/allsales', ['data' => $data, 'dataTotal' => $dataTotal]);
     
        return $pdf->stream();
    }
}
