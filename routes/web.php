<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::controller(NewsController::class)->group(function(){

    /* Rota principal que inicializa o sistema.. */
    Route::get('/','index');
});


    /*Rota para criar um form para uma nova notícia .. */
Route::get('/nova', 'NoticiasController@create');

    /* Rota para salvar notícia na BD */
Route::post('/salvar', 'NoticiasController@store');

    /* Rota para a área de gestão */
Route::get('/gestao/noticias', 'NoticiasController@apresentargestaoTabelas')->name('gestao');

 
/* Visibilidade e invisibilidade dos icones */
Route::get('tornar_visivel/{id}', 'NoticiasController@tornarVisivel');
Route::get('tornar_invisivel/{id}', 'NoticiasController@tornarInvisivel');

/* Apagar notícia */

Route::get('apagar/{id}', 'NoticiasController@destroy');

/* Editar | Atualizar */
Route::get('editar/{id}', 'NoticiasController@edit');
Route::post('atualizar/{id}', 'NoticiasController@update');
