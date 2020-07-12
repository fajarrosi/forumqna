<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::group(['middleware' =>'auth'],function(){
	
	Route::get('/home', 'HomeController@index')->name('home');

	//CRUD pertanyaan
	Route::get('pertanyaan/tambah','PertanyaanController@tambah');
	Route::post('pertanyaan/simpan','PertanyaanController@simpan')->name('pertanyaan.simpan');
	Route::get('pertanyaan/tampil/{id}','PertanyaanController@tampil');
	Route::get('pertanyaan/edit/{id}','PertanyaanController@edit');
	Route::put('pertanyaan/{id}','PertanyaanController@ubah');
	Route::delete('pertanyaan/{id}','PertanyaanController@hapus');

	//Jawab pertanyaan
	Route::get('pertanyaan/jawab/{id}','PertanyaanController@jawab');
	//nyimpan jawaban user 
	Route::post('jawaban/simpan','JawabanController@simpan')->name('jawaban.simpan');
	Route::get('jawaban/edit/{prtid}/{id}','JawabanController@edit');
	Route::put('jawaban/{id}','JawabanController@ubah');
	Route::delete('jawaban/{prtid}/{id}','JawabanController@hapus');

	//terbaru
	Route::get('pertanyaan/terbaru','PertanyaanController@terbaru');

	//jawabanku
	Route::get('jawaban/tampil/{id}','JawabanController@tampil');

	//vote
	Route::post('vote/jawaban', ['before'=>'csfr', 'uses'=>'VoteController@vote_jawaban']);
	Route::post('vote/pertanyaan', ['before'=>'csfr', 'uses'=>'VoteController@vote_pertanyaan']);

	//Reputasi
	Route::get('reputasi/{id}','HomeController@reputasi');

	//top Pertanyaan
	Route::get('pertanyaan/top','PertanyaanController@top');
});
