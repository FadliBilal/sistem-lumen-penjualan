<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PenjualanController extends Controller
{
    public function index()
    {
        return response()->json([
            [
                'id' => 1,
                'nama' => 'Penjualan Bilal',
                'total' => 10000
            ],
            [
                'id' => 2,
                'nama' => 'Penjualan Fadli',
                'total' => 30000
            ],
            [
                'id' => 3,
                'nama' => 'Penjualan Afif',
                'total' => 20000
            ],
            [
                'id' => 4,
                'nama' => 'Penjualan Udin',
                'total' => 36000
            ]
        ]);
    }

    public function show($id)
    {
        $penjualans = [
            1 => ['id' => 1, 'nama' => 'Penjualan Bilal', 'harga' => 10000, 'jumlah' => 1, 'total' => 10000],
            2 => ['id' => 2, 'nama' => 'Penjualan Fadli', 'harga' => 15000, 'jumlah' => 2, 'total' => 30000],
            3 => ['id' => 3, 'nama' => 'Penjualan Afif', 'harga' => 20000, 'jumlah' => 1, 'total' => 20000],
            4 => ['id' => 4, 'nama' => 'Penjualan Udin', 'harga' => 12000, 'jumlah' => 3, 'total' => 36000],
        ];

        if (array_key_exists($id, $penjualans)) {
            return response()->json(['data' => $penjualans[$id]]);
        }

        // Jika ID tidak ditemukan
        return response()->json(['message' => 'Penjualan tidak ditemukan'], 404);
    }

    public function store(Request $request)
    {
        return response()->json(['message' => 'Penjualan DiTambahkan'], 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json(['message' => 'Penjualan DiUpdate']);
    }

    public function destroy($id)
    {
        return response()->json(['message' => 'Penjualan DiHapus']);
    }

    public function bayar($id)
    {
        return response()->json([
            'id' => $id,
            'status' => 'Terbayar',
            'message' => 'Pembayaran berhasil'
        ]);
    }

    public function sendEmail($id)
    {
        Mail::raw('Pesanan Anda berhasil diproses!', function ($message) {
            $message->to('fadlibilal783@gmail.com')
                    ->subject('Konfirmasi Pesanan');
        });

        return response()->json(['message' => 'Email berhasil dikirim']);
    }
}
