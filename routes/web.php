<?php


Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produtos(s) {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function($flag) {
    return "Posts da categoria: {$flag}";
});


Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria {$flag}";
});

Route::match(['get', 'post'], '/match', function () {
    return 'match';
});

Route::any('/any', function () {
    return 'Any';
});

Route::post('/register', function () { 
    return '';
});


Route::get('/empresa', function () {
    return 'Sobre a empresa';
});

Route::get('/contato',function() {
    return view('site.contact');
});

Route::get('/', function () {
    return view('welcome');    
});


