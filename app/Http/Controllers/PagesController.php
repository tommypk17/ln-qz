<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a home
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index')->with('name', 'Home');
    }

}
