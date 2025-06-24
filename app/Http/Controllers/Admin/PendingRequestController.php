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
      public function approve($id)
{
    // $request = \App\Models\PendingRequest::findOrFail($id);
    $request = PendingRequest::findOrFail($id);
    $user = $request->user;

    // Update user's role (e.g., to 'admin')
    $user->role = 'admin'; // Change as needed (e.g., 'moderator', 'editor')
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
