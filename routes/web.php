    <?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\BeritaController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/profil-content', function () {
        return view('welcome');
    })->name('profil.index');
    Route::get('/profil-content/content', function () {
        return view('profil-content');
    })->name('profil.content');
    Route::get('/berita-utama', function () {
        return view('welcome');
    })->name('berita.index');
    Route::get('/berita-utama/content', function () {
        return view('berita-content');
    })->name('berita.content');

    Route::get('/admin', function () {
        return view('admin.welcome');
    })->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.process');

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::get('/dashboard/content', function () {
            return view('admin.dashboard-content');
        })->name('dashboard.content');
        
        // Route utama untuk menu "Data Berita"
        Route::get('/data-berita', function () {
            return view('admin.dashboard');
        })->name('berita.index');
        
        // Route 'content' yang memanggil Controller untuk menampilkan data
        Route::get('/data-berita/content', [BeritaController::class, 'index'])
            ->name('berita.content'); 

        Route::post('/data-berita', [BeritaController::class, 'store'])
        ->name('store-berita');

        
        Route::get('/data-admin', function () {
            return view('admin.dashboard');
        })->name('data-admin.index');
        Route::get('/data-admin/content', function () {
            return view('admin.data-admin-content');
        })->name('data-admin.content');
        Route::get('/manajemen-berita', function () {
            return view('admin.dashboard');
        })->name('manajemen.index');
        Route::get('/manajemen-berita/content', function () {
            return view('admin.manajemen-berita-content');
        })->name('manajemen.content');


    Route::get('/berita/get/{id}', [BeritaController::class, 'get'])
    ->name('admin.berita.get');
    Route::put('/berita/update/{id}', [BeritaController::class, 'update'])
    ->name('admin.berita.update');
     Route::delete('/berita/delete/{id}', [BeritaController::class, 'destroy'])
     ->name('admin.berita.delete');
   
        

    });