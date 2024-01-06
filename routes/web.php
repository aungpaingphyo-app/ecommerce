<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminProductController;

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CommentController;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

//Home
Route::get('/homes', [HomeController::class, 'homepages']);
Route::get('/contact', [HomeController::class, 'contactpage']);

Route::get('/womenpages', [ProductController::class, 'women_product']);
Route::get('/accessorypages', [ProductController::class, 'accessory_product']);
Route::get('/menpages', [ProductController::class, 'men_product']);
Route::get('/detail_products/{id}', [ProductController::class, 'detail_product']);
Route::get('/allproducts', [ProductController::class, 'all_product']);
//cart
Route::post('/addcart/{id}', [CartController::class, 'add_cart']);
Route::get('/showcart', [CartController::class, 'show_cart']);
Route::get('/removecart/{id}', [CartController::class, 'remove_cart']);
//order
Route::get('/cartorder', [OrderController::class, 'cart_order']);
Route::get('/showorder', [OrderController::class, 'show_order']);
Route::get('/cancel_order/{id}', [OrderController::class, 'cancel_order']);
//comment
Route::post('/add_comment', [CommentController::class,'add_comment']);


//Admin
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/categories', [CategoryController::class, 'view_category']);
Route::post('/categories', [CategoryController::class, 'add_category']);
Route::get('/delete_categories/{id}', [CategoryController::class, 'delete_category']);

Route::get('/products', [AdminProductController::class, 'view_product']);
Route::get('/addproducts', [AdminProductController::class, 'product']);
Route::post('/addproducts', [AdminProductController::class, 'add_product']);
Route::get('/edit_products/{id}', [AdminProductController::class, 'edit_product']);
Route::post('/update_products/{id}', [AdminProductController::class, 'update_product']);
Route::get('/delete_products/{id}', [AdminProductController::class, 'delete_product']);
Route::get('/searchproduct', [AdminProductController::class, 'search_product']);

Route::get('/orders', [AdminController::class, 'order']);
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
Route::get('/search', [AdminController::class, 'search_data']);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
