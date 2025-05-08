<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            background: #2c3e50;
            height: 100vh;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 15px 0;
        }

        .sidebar a:hover {
            background: #34495e;
            padding: 5px;
        }

        .content {
            flex: 1;
            padding: 30px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.users.index') }}">User Management</a>
        <a href="{{ route('admin.roles.index') }}">Roles & Permissions</a>
        <a href="{{ route('admin.pending-requests.index') }}"
            class="text-sm font-medium text-gray-800 hover:text-blue-600">
            Pending Requests
        </a>
        <a href="{{ route('admin.logs.index') }}">System Logs</a>
        <a href="{{ route('admin.settings.index') }}">Settings</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>

</html>