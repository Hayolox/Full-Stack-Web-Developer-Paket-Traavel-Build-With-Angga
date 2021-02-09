<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
  public function index(Request $request, $slug)
  {
    $item = TravelPackage::with(['galleries'])
      ->where('slug', $slug)
      ->firstOrFail();
    //mengambil data travelpackage dgn gallery jk slug = slug yg masuk ke dalam & panggil data pertama atau gagal jk tidak ada
    return view('pages.detail', [
      'item' => $item
    ]);
  }
}
