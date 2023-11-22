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
        $data = Barang::select('*',DB::raw('qty*harga as total'))->get();
        $totalHarga = 0;
        $totalSetelahDiskon = 0;
        foreach($data as $key => $barang)
        {
            
            
            if($barang->total >= 500000){
                $data[$key]->diskon = 50/100; //50%
            }
            else if($barang->total >= 200000){
                $data[$key]->diskon = 20/100; //20%
            }
            else if($barang->total >= 100000){
                $data[$key]->diskon = 10/100; //10%

            }
            
            else{
                $data[$key]->diskon = 0;
            }
            $data[$key]->total_bayar = $barang->total - ($barang->total * $data[$key]->diskon);
            $totalHarga += $barang->total;
            $totalSetelahDiskon += $data[$key]->total_bayar;

        }
        
        return view('index',compact('data','totalHarga','totalSetelahDiskon','myName'));

    }
    function action(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'nama'=>'required',
            'jenis'=>'required',
            'qty'=>'required|numeric|min:1',
            'harga'=>'required|numeric|min:1'
        ]);

        $barang = Barang::create([
            'code'=>$request->code,
            'nama'=>$request->nama,
            'jenis'=>$request->jenis,
            'qty'=>$request->qty,
            'harga'=>$request->harga
        ]);
        if(!$barang){
            return redirect()->route('home')->with('error','Data gagal ditambahkan');
        }
        return redirect()->route('home')->with('success','Data berhasil ditambahkan');

    }

    function clear()
    {
        Barang::truncate();
        return redirect()->route('home');
    }
}
