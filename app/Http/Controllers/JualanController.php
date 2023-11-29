<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JualanController extends Controller
{

    function index()
    {
        $myName = "Rafli Pasya";
        $data = Barang::select('*', DB::raw('qty*harga as total'))->get();
        $totalHarga = 0;
        $totalSetelahDiskon = 0;
        foreach ($data as $key => $barang) {


            if ($barang->total >= 500000) {
                $data[$key]->diskon = 50 / 100; //50%
            } else if ($barang->total >= 200000) {
                $data[$key]->diskon = 20 / 100; //20%
            } else if ($barang->total >= 100000) {
                $data[$key]->diskon = 10 / 100; //10%

            } else {
                $data[$key]->diskon = 0;
            }
            $data[$key]->total_bayar = $barang->total - ($barang->total * $data[$key]->diskon);
            $totalHarga += $barang->total;
            $totalSetelahDiskon += $data[$key]->total_bayar;
        }

        return view('index', compact('data', 'totalHarga', 'totalSetelahDiskon', 'myName'));
    }
    function add()
    {
        return view('add');
    }
    function action(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'qty' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:1'
        ]);

        $barang = Barang::create([
            'code' => $request->code,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'qty' => $request->qty,
            'harga' => $request->harga
        ]);
        if (!$barang) {
            return redirect()->route('home')->with('error', 'Data gagal ditambahkan');
        }
        return redirect()->route('home')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('edit', compact('barang'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'code' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'qty' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:1'
        ]);

        $barang = Barang::find($id);
        $barang->code = $request->code;
        $barang->nama = $request->nama;
        $barang->jenis = $request->jenis;
        $barang->qty = $request->qty;
        $barang->harga = $request->harga;
        $barang->save();
        if (!$barang) {
            return redirect()->route('home')->with('message', 'Data gagal diupdate');
        }
        return redirect()->route('home')->with('message', 'Data berhasil diupdate');
    }
    function delete($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        if (!$barang) {
            return redirect()->route('home')->with('message', 'Data gagal dihapus');
        }
        return redirect()->route('home')->with('message', 'Data berhasil dihapus');
    }
    function clear()
    {
        Barang::truncate();
        return redirect()->route('home');
    }
}
