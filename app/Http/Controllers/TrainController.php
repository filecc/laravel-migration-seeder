<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index(){
        $trains = Train::select('*')->orderBy('date', 'ASC')->get();
        return view('home', compact('trains'));
    }
}
