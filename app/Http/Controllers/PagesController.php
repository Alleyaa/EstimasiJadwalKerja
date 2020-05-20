<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To Laravel';
        return view('Halaman.Beranda',compact('tit;e'));
    }
    public function services(){
        return view('Halaman.service');
    }
}
