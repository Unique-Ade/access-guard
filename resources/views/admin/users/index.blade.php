@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">User Management</h1>

@if(session('success'))
<div class="bg-green-100 text-green-800 p-2 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Role</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $user->name }}</td>
                <td class="py-2 px-4">{{ $user->email }}</td>
                <td class="py-2 px-4">{{ ucfirst($user->role) }}</td>
                <td class="py-2 px-4">
                    @if($user->email_verified_at)
                    <span class="text-green-600">Active</span>
                    @else
                    <span class="text-red-600">Unverified</span>
                    @endif
                </td>
                <td class="py-2 px-4">
                    <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST"
                        class="inline-flex space-x-2">
                        @csrf
                        @method('PATCH')
                        <select name="role" class="text-sm border rounded px-2 py-1">
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <button type="submit"
                            class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 text-sm">Update</button>
                    </form>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block ml-2"
                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 text-white px-2 py-1 rounded text-sm hover:bg-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-4 px-4 text-center text-gray-500">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $users->links() }}
</div>
@endsection