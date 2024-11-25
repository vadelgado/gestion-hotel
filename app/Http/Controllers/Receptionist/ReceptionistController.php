<?php
namespace App\Http\Controllers\Receptionist;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class ReceptionistController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        return Inertia::render('Dashboard', [
            'role' => $role,
        ]);
    }
}
