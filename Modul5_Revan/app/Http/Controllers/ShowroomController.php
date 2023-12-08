<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showroom;

class ShowroomController extends Controller
{
    public function create()
    {
        return view('showroom.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Showroom::create([
            'nama_mobil' => $data['name'],
            'brand_mobil' => $data['brand'],
            'warna_mobil' => $data['warna'],
            'tipe_mobil' => $data['tipe'],
            'harga_mobil' => $data['harga'],

        ]);
        return redirect()->route('showroom.index');
    }

    public function index()
    {

        return view('showroom.index', [
            'showroom' => Showroom::all()
        ]);
    }
}