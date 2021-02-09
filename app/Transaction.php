<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'travel_packages_id', 'users_id', 'additional_visa', 'transaction_total', 'transaction_status'
  ]; //disamakan dgn yg ada di tabel DB

  protected $hidden = [];

  public function details()
  {
    return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
  } // utk melihat transaksi details

  public function travel_package()
  {
    return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
  } //utk melihat travel package yg dipilih

  public function user()
  {
    return $this->belongsTo(User::class, 'users_id', 'id');
  } //utk melihat siapa yg mendaftarkan travel package tsb
}
