
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
 
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::resource('/product', ProductController::class);
Route::put('product/{id}/update-status', [ProductController::class, 'updateStatus'])->name('product.updateStatus');