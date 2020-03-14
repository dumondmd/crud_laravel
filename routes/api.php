<?php


Route::apiResource('dogs', 'api\DogController');

/**
 *POST  http://127.0.0.1:8000/api/dogs?raca=Caçador&nome=Rex
 *
 * GET http://127.0.0.1:8000/api/dogs/1
 * 
 * PUT http://127.0.0.1:8000/api/dogs/2?raca=New&nome=Bionic
 * 
 * DELETE http://127.0.0.1:8000/api/dogs/2
 */