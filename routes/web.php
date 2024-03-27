<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ChekoutController;
use App\Http\Controllers\User\DescriptionController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderHistoryController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegisterController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
//AIzaSyBwo2Qx83HErr2gxjwcQqqRBtBOaNAakZ8
//AIzaSyBwo2Qx83HErr2gxjwcQqqRBtBOaNAakZ8
Route::get('/abc',function(){
    return view('abc');
});

Route::post('/fetch-states/{id}' , function($category_id = null){
    $states = SubCategory::where('category_id' , $category_id)->get();
    // dd($states);
    return response()->json([
        'status' => 1,
        'states' => $states
    ]);
});

Route::group(['middleware'=>['auth','checkRole']],function(){
    Route::get('/add-user',[UserController::class,'create'])->name('add-user');
    Route::post('/update-users/{id}',[UserController::class,'updateStatus'])->name('update_users');
    Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('edit-user'); 
    Route::get('/add-role',[RoleController::class,'create'])->name('add-role'); 
    Route::get('/edit-role/{id}',[RoleController::class,'edit'])->name('edit-role');
    Route::get('/add-category',[CategoryController::class,'create'])->name('add-category');
    Route::get('/edit-category/{id}',[CategoryController::class,'edit'])->name('edit-category');
    Route::get('/add-sub-category',[SubCategoryController::class,'create'])->name('add-sub-category');
    Route::get('/edit-sub-category/{id}',[SubCategoryController::class,'edit'])->name('edit-sub-category');
    Route::get('/add-product',[ProductController::class,'create'])->name('add-product');
    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit-product');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('view-dashboard');
    Route::get('/orders',[OrderController::class,'index'])->name('seller-orders');
    Route::get('/order-details/{id}',[OrderController::class,'orderDetail'])->name('order-detail');
    Route::post('/update-status/{id}',[OrderController::class,'update'])->name('update-status');
    Route::get('/admin/profile',[ProfileController::class,'profile'])->name('admin-profile');
    Route::post('/upadte/profile/{id}',[ProfileController::class,'update'])->name('update-profile');
    Route::get('/change/password',[PasswordController::class,'index'])->name('change-password');
    Route::post('update/password/{id}',[PasswordController::class,'update'])->name('update-password1');
});

Route::group(['middleware'=>['guest']],function(){
    Route::get('/admin/login',[LoginController::class,'login'])->name('admin-login'); 
    Route::post('/login',[LoginController::class,'verify'])->name('login');
    Route::get('/admin/register',[RegisterController::class,'register'])->name('admin-register');
    Route::post('/register',[RegisterController::class,'store'])->name('register');  
});
    Route::post('/logout',[LoginController::class,'logout'])->name('logout');



    Route::group(['middleware'=>['auth' , 'CheckPermission']],function(){

   
    //users
    Route::get('/users',[UserController::class,'index'])->name('view-users');
    Route::post('/create-users',[UserController::class,'store'])->name('create-user');
    Route::post('/update-user/{id}',[UserController::class,'update'])->name('update-user');
    Route::delete('delete-user/{id}',[UserController::class,'delete'])->name('delete-user');

    //roles
    Route::get('/roles',[RoleController::class,'index'])->name('view-role');
    Route::post('/create-role',[RoleController::class,'store'])->name('create-role');
    Route::post('/update-role/{id}',[RoleController::class,'update'])->name('update-role');
    Route::delete('/delete-role/{id}',[RoleController::class,'delete'])->name('delete-role');

    //category
    Route::get('/category',[CategoryController::class,'index'])->name('view-category');
    Route::post('/create-category',[CategoryController::class,'store'])->name('create-category'); 
    Route::post('/update-category/{id}',[CategoryController::class,'update'])->name('update-category');
    Route::delete('/delete-category/{id}',[CategoryController::class,'delete'])->name('delete-category');

    //subcategory
    Route::get('/sub-category',[SubCategoryController::class,'index'])->name('view-sub-category');
    Route::post('/create-sub-category',[SubCategoryController::class,'store'])->name('create-sub-category');
    Route::post('/update-sub-category/{id}',[SubCategoryController::class,'update'])->name('update-sub-category');
    Route::delete('/delete-sub-category/{id}',[SubCategoryController::class,'delete'])->name('delete-sub-category');

    //routes for product   
    Route::get('/products',[ProductController::class,'index'])->name('view-products');
    Route::post('/create-product',[ProductController::class,'store'])->name('create-product');
    Route::post('/update-product/{id}',[ProductController::class,'update'])->name('update-product');
    Route::delete('/delete-product/{id}',[ProductController::class,'delete'])->name('delete-product');
    //orders
   
});

//user routes
Route::group(['middleware'=>['guest']],function(){
    Route::get('/user/login',[UserLoginController::class,'login'])->name('user-login'); 
    Route::post('/user-login',[UserLoginController::class,'verify'])->name('user-verify');
    Route::get('/user/register',[UserRegisterController::class,'register'])->name('user-register');
    Route::post('/user-register',[UserRegisterController::class,'store'])->name('store-user');  
});


    Route::get('/',[HomeController::class,'home'])->name('homepage');
    Route::get('/product-description/{id}',[DescriptionController::class,'index'])->name('product-description');
    Route::get('/subcategory/{subcat}',[HomeController::class,'abc'])->name('abc');

Route::group(['middleware'=>['checkAuth','checkRequest']],function(){
    Route::post('/user/logout',[UserLoginController::class,'logout'])->name('user-logout');
    //carts
    Route::get('/cart',[CartController::class,'index'])->name('cart');
    Route::post('/add-cart',[CartController::class,'store'])->name('add-cart');
    Route::post('/increment/{id}',[CartController::class,'increment'])->name('increment');
    Route::post('/decrement/{id}',[CartController::class,'decrement'])->name('decrement');
    Route::delete('/delete-cart/{id}',[CartController::class,'delete'])->name('delete-cart');

    //
    Route::get('/buy-product',[ChekoutController::class,'purchase'])->name('buy-product');    
    Route::post('stripe', [ChekoutController::class, 'stripePost'])->name('stripe.post'); 
    //

    Route::get('/order',[OrderHistoryController::class,'order'])->name('view-order');
    Route::get('/order-detail/{id}',[OrderHistoryController::class,'detail'])->name('view-order-product');
});

Route::get('/forget-password',[ForgetPasswordController::class,'index'])->name('forget-password');
Route::post('/verify-user',[ForgetPasswordController::class,'verify_user'])->name('verify-user');
Route::get('reset/password/{token}',[ForgetPasswordController::class,'reset_password'])->name('reset-password');
Route::any('verify/password/{token}',[RegisterController::class,'verifyUser'])->name('vu');

Route::post('/set-password', [ForgetPasswordController::class,'update_password'])->name('update-password');



Route::get('/lang', function(Request $request){
    if (! in_array($request->locale, ['en', 'es'])) {
        abort(400, 'Invalid locale');
    }   
    $app = $request->locale;
    App::setLocale($app);   
    Session::put('local',$app);
    return redirect()->back();
})->name('setLocale');


