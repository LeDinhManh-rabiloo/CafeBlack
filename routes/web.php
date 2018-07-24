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
Route::get('register','PageController@Register');
Route::post('register','PageController@postRegister');
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
});
Route::get("Admin",function(){
	//kiểm tra nếu user đã đăng nhập thì di chuyển đến các trang trong admin nếu không thì yêu cầu đăng nhập
	if (Auth::check()==true) {
		return redirect(url('Admin/Home'));
	}
	else{
		return redirect('Admin/login');
	}
});
Route::get('logout',function(){
	Auth::logout();
	return redirect('Admin/login');
});