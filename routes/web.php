<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\PublicPageController;
use App\Models\Page;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::prefix('admin')->group(function () {
    Route::get('/', AdminDashboardController::class)->name('admin.index');
    Route::resource('/pages', PageController::class);
    Route::resource('/games', GameController::class);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

use Meilisearch\Endpoints\Indexes;

Route::get('/search', function (Request $request) {
    $query = $request->search ?? '';

    $raw = Page::search(
        $query,
        function (Indexes $meilisearch, string $query, array $options) {
            $options['attributesToHighlight'] = ['content'];

            return $meilisearch->search($query, $options);
        }
    )->raw();

    return Inertia::render('search', $raw);
});

// This needs to be at the end
Route::get('/{slug}', PublicPageController::class)
    ->where('slug', '.+')
    ->name('public-pages.show');
