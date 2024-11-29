<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    public function index(){
        return view('backend.pages.index');
    }

    public function create(){
        return view('backend.pages.modules.category.create');
    }
}