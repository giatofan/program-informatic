<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Offer;
use DB;

class OffersController extends Controller
{
    public function index(Request $request)
    {
        $results = Offer::join('customers', 'customer_id', '=', 'customers.id')
                        ->join('services', 'service_id', '=', 'services.id')
                        ->where('accepted', '=', '0')
                        ->select(DB::raw('CONCAT(offers.id, ", ", customers.name, ", ", services.name) AS name'), 'offers.id')
                        ->orderBy('offers.id')
                        ->paginate(100);

        // dd($results);

        return $results;
    }

    public function show($id)
    {
        return Offer::find($id);
    }
    
}