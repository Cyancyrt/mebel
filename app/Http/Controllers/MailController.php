<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\checkout;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(Request $request, $id)
    {
        $checkout = checkout::find($id);
        //user email
        $email = $checkout->email;
        // user data
        $username = $checkout->nama_user;
        $barang = $checkout->check_produk;
        $kuantitas = $checkout->kuantitas;
        $total = $checkout->total;
        $mailData = [
            'title' => 'Dear customer UDjatilawas',
            'nama' => $username,
            'barang' => $barang,
            'kuantitas' => $kuantitas,
            'total' => $total,
        ];

        Mail::to($email)->send(new DemoMail($mailData));

        dd("Email is sent successfully.");
    }
}
