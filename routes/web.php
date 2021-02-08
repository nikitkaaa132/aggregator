<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/group_by_ip', function () {
    return view('group_by_ip');
});
Route::get('/group_by_date', function () {
    return view('group_by_date');
});
Route::get('/l', function () {
    return view('authorization');
});
Route::post('/select_date', function () {
    return view('select_date');
});