<?php

namespace App\Http\Controllers;

use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    public function getAllUsers()
    {
        $users = User::All();
        return view('user',compact('users'));
    }

    public function downloadPDF()
    {
        $users = User::all();
        $pdf = PDF::loadview('user',compact('users'));
        return $pdf->download('users.pdf');
    }
}

