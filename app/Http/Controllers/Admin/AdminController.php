<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        return Inertia::render('Dashboard', [
            'role' => $role,
        ]);
    }
}
