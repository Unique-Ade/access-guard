@if (auth()->user()->profile_image)
    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" 
         alt="Profile Image" 
         class="w-24 h-24 rounded-full object-cover">
@else
    <p>No profile image uploaded.</p>
@endif


<br>

<br>

<form method="POST" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="profile_image" accept="image/*">
    <button type="submit" class="b inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md cursor-pointer hover:bg-blue-700 transition">Upload</button>
</form>


