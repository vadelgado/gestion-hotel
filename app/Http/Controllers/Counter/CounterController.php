<?php
namespace App\Http\Controllers\Counter;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class CounterController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        return Inertia::render('Dashboard', [
            'role' => $role,
        ]);
    }
}
