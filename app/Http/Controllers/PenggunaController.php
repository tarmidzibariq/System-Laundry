<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class PenggunaController extends Controller
{
    public function index()
    {
        $user=User::all()->where('role','member');
        return view('pengguna.index',compact('user'));
    }
}
