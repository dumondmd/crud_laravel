<?php

Route::get('/login', function () {
    return 'Login';
})->name('login');


/*
Route::middleware([])->group( function () {
   
   
   Route::prefix('admin')->group(function () {

    Route::namespace('Admin')->group(function () {

        Route::name('admin.')->group(function () {

            Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
                
            Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
        
            Route::get('/produtos', 'TesteController@teste')->name('products');

            //Route::get('/', 'TesteController@teste')->name('home');

            Route::get('/', function () {
                return redirect()->route('admin.dashboard');
            })->name('home');
        });
    
        
    });
    

   });
       
});
*/
Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function () {
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
                
    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
        
    Route::get('/produtos', 'TesteController@teste')->name('products');

    //Route::get('/', 'TesteController@teste')->name('home');

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('home');
});






Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function () {
    return 'Hey Hey, Hey';
})->name('url.name');

Route::get('/', function () {
    return view('welcome');    
});

Route::view('/view', 'welcome');

Route::redirect('/redirect1', '/redirect2');

/*
Route::get('redirect1', function () {
    return redirect('/redirect2');
});
*/
Route::get('redirect2', function () {
    return "Redirect02";
});


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


