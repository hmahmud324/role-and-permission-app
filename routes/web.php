<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () 
{
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::controller(BlogController::class)->group(function()
{
    Route::get('/blog/index','index')->name('blog.home');
    Route::get('/blog/manage','manage')->name('blog.manage');
    });

Route::controller(UserController::class)->group(function(){
    Route::get('/user/add','index')->name('user.add');
    Route::post('/user/new','create')->name('user.new');
    Route::get('/user/manage','manage')->name('user.manage');
    Route::get('/user/edit/{id}','edit')->name('user.edit');
    Route::post('/user/update/{id}','update')->name('user.update');
    Route::get('/user/delete/{id}','delete')->name('user.delete'); 
    });

});

require __DIR__.'/auth.php';
