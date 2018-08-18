<?php

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
Auth::routes();
Route::get('/', function () {
    return view('layout.index');
});
Route::get('Admin/login','PageController@Login');
Route::post('Admin/login','PageController@postLogin');
Route::get('Admin/register','PageController@Register');
Route::post('Admin/register','PageController@postRegister');
Route::group(array("prefix"=>"Admin", "middleware"=>"adminLogin"),function(){
	Route::get('Home', 'PageController@Home');
	Route::get('list_users','PageController@ListUser');
	Route::get('insert','PageController@getinsert');
	Route::post('insert','PageController@insert');
	Route::get('list','PageController@Viewlist');
	Route::get('delete/{id}','PageController@delete');
	Route::get('Edit/{id}','PageController@EditProduct');
	Route::post('Edit/{id}','PageController@postEditProduct');
	Route::get('insertcategory','PageController@InsertCategory');
	Route::post('insertcategory','PageController@postInsertCategory');
	Route::get('listcategory','PageController@ListCategory');
	Route::get('listcategory/delete/{id}','PageController@DeleteCategory');
	Route::get('listcategory/Edit/{id}','PageController@EditCategory');
	Route::post('listcategory/Edit/{id}','PageController@postEditCategory');
	Route::get('profile/{id}','PageController@Profile');
	Route::get('profile/{id}/diary','PageController@Diary');
	Route::post('profile/{id}/diary','PageController@insertDiary');
	Route::get('cartEdit/{id}','PageController@Upstatuscart');
	Route::post('cartEdit/{id}','PageController@PostUpstatuscart');
	Route::get('list_order','PageController@ListOrder');
	Route::get('list_slide','PageController@listSlide');
	Route::get('list_slide/delete/{id}','PageController@DeleteSlide');
	Route::get('add_slide','PageController@getAddSlide');
	Route::post('add_slide','PageController@AddSlide');
	Route::get('list_sale','PageController@listSale');
	Route::get('Add_sale','PageController@getAddSale');
	Route::post('Add_sale','PageController@postAddSale');
	Route::get('sale/{id}','PageController@getSaleProduct');
	Route::post('sale/{id}','PageController@postSaleProduct');
	Route::get('salecategory/{id}','PageController@getSaleCategory');
	Route::post('salecategory/{id}','PageController@postSalecategory');
	Route::get('Statistical/day','PageController@FormStatisticalDay');
	Route::get('Statistical/dayn','PageController@StatisticalDay');
	Route::get('Statistical/month','PageController@FormStatisticalMonth');
	Route::get('Statistical/monthn','PageController@StatisticalMonth');
});
Route::get("Admin",function(){
	//kiểm tra nếu user đã đăng nhập thì di chuyển đến các trang trong admin nếu không thì yêu cầu đăng nhập
	if (Auth::check()==true && Auth::user()->status ==1) {
		return redirect(url('Admin/Home'));
	}
	else{
		Auth::logout();
		return redirect('Admin/login');
	}
});
Route::get('logout',function(){
	Auth::logout();
	return redirect('Admin/login');
});
Route::get('Home','PageController@viewHome');
Route::get('shopping{id}{id_user}','PageController@getShopping');
Route::get('cart','PageController@ShopCart');
Route::get('shop/delete/{id}','PageController@DeleteCart');
Route::get('login','PageController@UsersLogin');
Route::post('login','PageController@postUserLogin');
Route::get('register','PageController@UsersRegister');
Route::post('register','PageController@UserspostRegister');
Route::get('userlogout',function(){
	Auth::logout();
	return redirect('Home');
});
Route::get('san-pham/{name}{id}','PageController@ProductofCate');
Route::get('Update/{id}/{qty}','PageController@Update');
Route::get('Pay','PageController@Pay');
Route::post('Pay/{id}','PageController@postPay');
Route::get('don-hang/{id}','PageController@donhang');
Route::get('huy-don/{id}{id_user}','PageController@huydon');
Route::get('infoproduct/{id}','PageController@infoProduct');
Route::post('infoproduct/{id}','PageController@postreviews');
Route::get('seach','PageController@getSearch');