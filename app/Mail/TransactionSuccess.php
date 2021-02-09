<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionSuccess extends Mailable
{
  use Queueable, SerializesModels;

  public $data; // krn di email ada data jd $data utk menampung data tsb. $data jg bisa digunakan di ->view('email.transaction-success') di function build

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->data = $data; // utk memproses data yg masuk ke dlm TransactionSuccess yg ada di function success - CheckoutController
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this
      ->from('hi@belajarcoding.com', 'NOMADS') // email pengirim dan nama pengirim
      ->subject('Tiket NOMADS Anda')
      ->view('email.transaction-success');
  }
}
