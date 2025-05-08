<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\UserActivity;
use App\Models\PendingRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\PendingRequestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userId = Auth::id();
    $activities = UserActivity::where('user_id',  $userId)
        ->latest()
        ->take(10)
        ->get();
    return view('user_dashboard', compact('activities'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'uploadProfilePicture'])->name('profile.upload');
});


// Route::middleware(['auth', AdminMiddleware::class])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });


Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/pending-requests', [PendingRequestController::class, 'index'])->name('pending-requests.index');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/request-access', function () {
        return view('request_access');
    })->name('request.access');

    Route::post('/request-access', function (Request $request) {
        PendingRequest::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->route('request.access')->with('status', 'Request submitted successfully!');
    })->name('request.access.submit');
});


Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/github/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token

});

// Route::get('testroute', function(){
//     Mail::to('adeolaportfolioproject@gmail.com')->send()
// });

require __DIR__ . '/auth.php';
