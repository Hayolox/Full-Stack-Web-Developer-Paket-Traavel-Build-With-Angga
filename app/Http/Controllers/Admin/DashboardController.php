<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(Request $request)
  {
    return view('pages.admin.dashboard', [
      'travel_package' => TravelPackage::count(),
      'transaction' => Transaction::count(),
      'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
      'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count()
    ]); //where digunakan utk conditional
  }
}
