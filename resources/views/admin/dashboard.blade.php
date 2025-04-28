{{-- @extends('layouts.app') --}}
<x-app-layout>
    <div>
        <h1>Admin Panel</h1>
        <a href="">Dashboard</a>
        <a href="">User Management</a>
        <a href="">Roles & Permissions</a>
        <a href="">System Logs</a>
        <a href="">Settings</a>
    </div>
@section('content')
    <div class="container">
        <h2>Dashboard</h2>
        <p>Welcome, {{ Auth::user()->name }}!</p>
    </div>
    <div>
        <h3>Total Users</h3>
        {{-- <h2>{{Total Number of Users}}</h2> --}}
    </div>
    <div>
        <h3>Active Users</h3>
        {{-- <h2>{{Total Number of Users}}</h2> --}}
    </div>
    <div>
        <h3>Pending Requests</h3>
        {{-- <h2>{{Total Number of Users}}</h2> --}}
    </div>
    <div>
        <h2>Recent Activities</h2>
    </div>
@endsection
</x-app-layout>
