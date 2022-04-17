<?php



use Illuminate\Support\Facades\Route;



Route::get('generate', function () {
    function gen_one_to_three() {
        for ($i = 1; $i <= 3; $i++) {
            // Note that $i is preserved between yields.
            yield $i;
        }
    }
    
    $generator = gen_one_to_three();
    
    // foreach ($generator as $value) {
    //     dump($value);
    // } 
    
});







Route::get('/product', function () {
    //    $first=app(ProductDetail::class)->price;
    //    $second=app()->make(ProductDetail::class)->price;
    // dump($first);
    // dd($second);

});

Route::get('/admin/register', [App\Http\Controllers\AdminController::class, 'ShowRegister'])->middleware('guest:admin');
Route::post('/admin/register', [App\Http\Controllers\AdminController::class, 'Register'])->name('register');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'ShowLogin'])->name('admin.login')->middleware('guest:admin');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'Login'])->name('login');
Route::post('/admin/logout', [App\Http\Controllers\AdminController::class, 'Logout'])->name('admin.logout');
//Auth::routes();
Route::get('/profile', [App\Http\Controllers\AdminController::class, 'ShowProfile'])->middleware('auth:admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
