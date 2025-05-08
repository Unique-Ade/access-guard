<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendingRequest;

class PendingRequestController extends Controller
{
    public function index()
    {
        $requests = PendingRequest::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.requests.pending', compact('requests'));
    }
}
