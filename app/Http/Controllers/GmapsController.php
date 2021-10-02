<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
class GmapsController extends Controller
{
    public function index()
    {
        return view('gmaps.index');
    }
}
