<?php

Route::get('/', function () {

		if (Auth::check()) {
			return view('master.home');
		} else {
			return view('user.login');
		}
	});
Route::get('checkName', 'UserController@ajaxLogin');
Route::get('dangkytaikhoanmoi', function () {
		return view('user.register');
	});
Route::post('dangky', 'UserController@dangky')->name('dangky');
Route::post('dangnhap', 'UserController@dangnhap')->name('dangnhap');
Route::get('logout', 'UserController@logout')->name('logout');
Route::get('updateProfile/{id?}', 'UserController@getUpdate')->name('updateProfile');
Route::post('updateProfile/{id?}', 'UserController@postUpdate')->name('updateProfile');
Route::get('showUser', 'UserController@getShowUser');
Route::get('showDetail/{id?}', 'UserController@getShow')->name('detail');
// tin nhắn
Route::get('tinnhan/{id?}', 'ChatController@index')->name('tinnhan');
Route::post('tinnhan/{id?}', 'ChatController@postSendMessage')->name('tinnhan');
Route::get('danhsachnhansu', 'ChatController@chatwithuser');
Route::get('hop-thu-den', 'ChatController@getInbox');
//tin nội bộ
Route::get('news/{id?}', 'NewsController@getNews')->name('news');
Route::post('news/{id?}', 'NewsController@postNews')->name('postnews');
Route::get('listNews', 'NewsController@getlistNews')->name('listNews');
Route::get('detail-news/{id?}', 'NewsController@getdetail')->name('detailNews');
Route::post('{url}', 'NewsController@getDown')->name('download');
Route::get('xulyComment', 'NewsController@ajaxCmt');
Route::get('edit-tin-tuc/{id?}', 'NewsController@edit');
Route::post('edit-news/{id?}', 'NewsController@UpdateNews');
//Công việc
Route::get('danh-sach-cong-viec-nhan/{id?}', 'WorksController@DanhSachViecNhan')->name('receive');
Route::get('tao-cong-viec-moi', 'WorksController@TaoViecMoi')->name('newWork');
Route::post('postCongViec/{id?}', 'WorksController@postWork')->name('postCV');
Route::get('danh-sach-cong-viec-giao/{id?}', 'WorksController@DanhSachViecGiao')->name('send');
Route::get('chi-tiet-cong-viec/{id?}', 'WorksController@getCongViec');
// lịch cộng tác cơ quan
Route::get('tao-moi-lich-cong-tac/{id?}', 'TaskController@getLich');
Route::get('tao-lich-cong-tac/', 'TaskController@postLich')->name('postLich');
Route::get('lich-cong-tac/{id?}','TaskController@showLich');

//lịch công tác đơn vị
Route::get('tao-moi-lich-cong-tac-don-vi/{id?}', 'TaskDonviController@getLich');
Route::get('tao-lich-cong-tac-don-vi/', 'TaskDonviController@postLich')->name('postLich');
Route::get('lich-cong-tac-don-vi/{id?}','TaskDonviController@showLich');

