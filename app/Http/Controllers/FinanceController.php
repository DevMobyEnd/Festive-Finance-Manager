<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account; // Modelo de las cuentas

class FinanceController extends Controller
{
    public function index()
    {
        // Obtén todas las cuentas desde la base de datos
        $accounts = Account::all();

        // Pasa las cuentas a la vista
        return view('finances.index', compact('accounts'));
    }
}
