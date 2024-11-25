<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el rol del usuario autenticado
        $role = Auth::user()->role;
        

        // Renderizar la vista 'Dashboard' y pasar el rol como una prop
        return Inertia::render('Dashboard', [
            'role' => $role,
        ]);
    }
}
