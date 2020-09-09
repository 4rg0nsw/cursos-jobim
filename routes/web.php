<?php


Route::any('cursos.search', 'CursoController@search')->name('cursos.search')->middleware('auth');;
Route::resource('cursos', 'CursoController')->middleware('auth');
Route::resource('alunos', 'AlunoController')->middleware('auth');
Route::any('alunos.search', 'AlunoController@search')->name('alunos.search')->middleware('auth');;


/*
Route::put('/cursos{id}', 'CursoController@destroy')->name('cursos.destroy');

Route::get('/cursos/{id}/edit', 'CursoController@edit')->name('cursos.edit');
Route::put('/cursos{id}', 'CursoController@update')->name('cursos.update');


Route::get('/cursos/create', 'CursoController@create')->name('cursos.create');
Route::post('/cursos', 'CursoController@store')->name('cursos.store');

Route::get('/cursos/{id}', 'CursoController@show')->name('cursos.show');
Route::get('/cursos', 'CursoController@index')->name('cursos.index');

*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
