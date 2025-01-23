<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;

class DashboardController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::all();
        return view('dashboard', compact('ebooks'));
    }
}
