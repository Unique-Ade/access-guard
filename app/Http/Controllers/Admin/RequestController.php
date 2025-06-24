<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendingRequest;

class RequestController extends Controller
{
    public function index()
    {
        // return view('admin.requests.index');

        $requests = \App\Models\PendingRequest::with('user')
        ->where('type', 'role_upgrade')
        ->where('status', 'pending')
        ->latest()
        ->get();

    return view('admin.requests.index', compact('requests'));
    }
     public function approve($id)
{
    // $request = \App\Models\PendingRequest::findOrFail($id);
    $request = PendingRequest::findOrFail($id);
    $user = $request->user;

    $user->role = 'admin'; 
    $user->save();

    // Update request status
    $request->status = 'approved';
    $request->save();

    return redirect()->route('admin.pending-requests.index')->with('success', 'Request approved successfully.');
}

public function reject($id)
{
    // $request = \App\Models\PendingRequest::findOrFail($id);
    $request = PendingRequest::findOrFail($id);

    $request->status = 'rejected';
    $request->save();

    return redirect()->route('admin.pending-requests.index')->with('info', 'Request rejected.');
}
}
