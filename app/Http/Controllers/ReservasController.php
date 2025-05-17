<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolpedModel;

class ReservasController extends Controller
{
    public function index()
    {
        $solpeds = SolpedModel::all();
        return view('reservas/reservas', compact('solpeds'));
    }
}
