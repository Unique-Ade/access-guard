{{-- <div class="">
    <!-- Profile Picture Preview -->
    <img id="profilePreview" src="https://via.placeholder.com/150" 
         class="w-32 h-32 rounded-full border-2 border-gray-300 object-cover" 
         alt="Profile Picture">
    
    <!-- Upload Button -->
    <label for="profilePic" class="">
        Upload New Picture
    </label>
    <input type="file" id="profilePic" class="hidden" accept="image/*" onchange="previewImage(event)">
</div>

<form method="POST" action="" enctype="multipart/form-data" class="">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <input type="file" name="profile_picture" id="profile_picture" class="hidden">
    
    <button type="submit" >
        Save Changes
    </button>
</form>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profilePreview').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script> --}}

<form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <img src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : 'https://via.placeholder.com/100' }}" 
             class="w-24 h-24 rounded-full border bg-white border-white object-cover shadow-md" 
             alt="Profile Picture">
    <input type="file" name="profile_photo" accept="image/*" required
    class="block w-full text-sm text-white
    file:mr-4 file:py-2 file:px-4
    file:rounded-md file:border-0
    file:text-sm file:font-semibold
    file:bg-blue-500 file:text-white
    hover:file:bg-blue-600 mt-5"
    >
    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition mt-3">Upload</button>
</form>

@if(Auth::user()->profile_photo_path)
    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" width="100" height="100" alt="Profile Photo">
@endif
