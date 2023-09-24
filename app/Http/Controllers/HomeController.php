<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\TypeMobil;


class HomeController extends Controller
{
    public function index()
    {
        return view('contents.homepage', [
            'title' => 'Home',
            'mobil' => Mobil::selectMobilPagination(),
            'type_mobil' => TypeMobil::all(),
        ]);
    }

    public function cekMobil($id)
    {
        return view('contents.pages.sewa.detailMobil', [
            'title' => 'Detail Mobil',
            'mobil' => Mobil::getDetailMobil($id),
        ]);
    }
}
