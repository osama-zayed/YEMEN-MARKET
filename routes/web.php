<?php

use App\Models\merchant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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
    // dd(Auth::user()->usertype);
    $pro = DB::select("SELECT IFNULL(main_categories.id, categories.id) AS main_category_id,   IFNULL(main_categories.name, categories.name) AS main_category_name,   IFNULL(main_categories.name_ar, categories.name_ar) AS main_category_name_ar,   IFNULL(main_categories.description, categories.description) AS main_category_description,   IFNULL(main_categories.description_ar, categories.description_ar) AS main_category_description_ar, IFNULL(main_categories.image, categories.image) AS main_category_image,  categories.id AS category_id,   categories.name AS category_name,   categories.name_ar AS category_name_ar,   categories.description AS category_description,   categories.description_ar AS category_description_ar,   categories.image AS category_image,   products.id ,   products.name ,   products.name_ar ,   products.description ,   products.description_ar ,   products.image ,   products.price,   products.discount_price,   products.merchant_id,   products.offer FROM   products JOIN   categories ON categories.id = products.category_id LEFT JOIN   categories AS main_categories ON main_categories.id = categories.parent_id GROUP BY   main_category_id, main_category_name, main_category_name_ar, main_category_description, main_category_description_ar,   category_id, category_name, category_name_ar, category_description, category_description_ar, category_image,   id, name, name_ar, description, description_ar, image,   price, discount_price, merchant_id, offer;");
    $products=[];
    foreach ($pro as $category) {
        if (!empty($category->main_category_id)) {
            if(Config::get('languages')[App::getLocale()]["display"]=='English')
            $products[$category->main_category_name][$category->id] = $category;
            else  $products[$category->main_category_name_ar][$category->id] = $category;
            // $products[$category->main_category_id][$category->product_id]["price_YM"]=$category->price *533 ;
        }
    }
    // dd($products);
    // dd($products);
    // dd(is_array(get_object_vars($products[6][7])));
    // $products = [
    //     [
    //         [1, 2, 3], [4, 5, 6], [7, 8, 9]
    //     ], [
    //         [10, 11, 12], [13, 14, 15], [16, 17, 18]
    //     ], [
    //         [19, 20, 21], [22, 23, 24], [25, 26, 27]
    //     ]
    // ];
    // dd($products[1][1][1]*533);
    return view('index', [
        "products"=>$products,
        "reviewstar" => DB::select("SELECT `products`.id , AVG(`reviews`.rating) AVG ,COUNT(`reviews`.rating) COUNT FROM `reviews` ,`products` WHERE `products`.id =`reviews`.product_id GROUP BY `products`.id;"),
        "merchant" => merchant::all(),
    ]);
})->name('index');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguagesController@switchLang']);
Route::get('curr/{curr}', ['as' => 'curr.switch', 'uses' => '\App\Http\Controllers\CurrencysController@switCurrency']);
/////////////////start shop/////////////////////////////

Route::get('cart', [App\Http\Controllers\shopController::class, 'cart'])->name("cartPage");
Route::get('My_Favorites', [App\Http\Controllers\shopController::class, 'Favorite'])->name('My_Favorites');
Route::get('prodect', [App\Http\Controllers\shopController::class, 'prodect'])->name('prodect');
Route::get('category', [App\Http\Controllers\shopController::class, 'Category'])->name('category');
Route::get('merchant', [App\Http\Controllers\shopController::class, 'merchant'])->name('merchant');
Route::get('Newst', [App\Http\Controllers\shopController::class, 'Newst'])->name('Newst');
Route::get('sale', [App\Http\Controllers\shopController::class, 'sale'])->name('sale');
Route::get('subcategory', [App\Http\Controllers\shopController::class, 'ChildCategory'])->name('subcategory');

/////////////////end shop/////////////////////////////
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('Product', App\Http\Controllers\ProductController::class)->middleware(['auth', 'superadmin', 'admin', 'merchant']);
Route::resource('show', App\Http\Controllers\user_showController::class);
Route::resource('Category', App\Http\Controllers\CategoryController::class);
Route::resource('Review', App\Http\Controllers\ReviewController::class);
Route::resource('Setting', App\Http\Controllers\SettingController::class)->middleware(['auth', 'superadmin', 'admin']);
Route::resource('offerimage', App\Http\Controllers\OfferImageController::class)->middleware(['auth', 'superadmin', 'admin']);

Route::group(['middleware' => 'auth', 'admin', 'superadmin'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile{user_id?}', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::get('createUser', ['as' => 'createUser', 'uses' => 'App\Http\Controllers\ProfileController@create']);
    Route::post('createUser.store', ['as' => 'createUser.store', 'uses' => 'App\Http\Controllers\ProfileController@store']);
    Route::get('User', ['as' => 'profile.index', 'uses' => 'App\Http\Controllers\ProfileController@index']);
    Route::put('profile{user_id?}', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::delete('profile{user_id?}', ['as' => 'profile.delete', 'uses' => 'App\Http\Controllers\ProfileController@delete']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

