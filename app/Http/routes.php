<?php

use App\Search;
use Illuminate\Http\Request;

/**
 * Display landing page
 */
Route::get('/', function () {
    return view('home');
});

/**
 * Search for a user
 */
Route::post('/search', function (Request $request) {
    //
});

