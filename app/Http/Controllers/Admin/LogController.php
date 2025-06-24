<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserActivity;

class LogController extends Controller
{
    public function index()
    {
         $logs = UserActivity::with('user')->latest()->paginate(10);
        return view('admin.logs.index', compact('logs'));
      
    }
}
