<?php

namespace App\Http\Controllers;

//  panggil model
use App\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $items = TravelPackage::with(['galleries'])->get();
    return view('pages.home', [
      'items' => $items
    ]);
  }
}
