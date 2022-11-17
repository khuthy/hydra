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

Route::get('/', function () {
    return "
    Restful Web Services: <br>
    ---------------------------------------- <br><br>
    -- This URLs will be capable of the following : get, post (create new users), put, delete, patch user --<br><br>
    { GET }     /api/users <br>
    { POST }     /api/users <br>
    { PUT }     /api/users/id <br>
    { DELETE }     /api/users/id <br>
    { PATCH }     /api/users/id <br>

    <br> -- login & roles API URL -- <br>
    { POST }     /api/login <br>

    { GET } /api/roles <br>
    { POST } /api/roles <br>
    { DELETE } /api/roles/id <br>
    { PUT }     /api/roles/id <br>
    { PATCH }     /api/roles/id <br>

    <br><br>-- This URLs will be capable of the following : get, post (create new users), put or post, patch user --<br><br>

    { GET }     /api/users <br>
    { POST }     /api/users <br>
    { PUT }     /api/users/id <br>
    { POST }     /api/users/id <br>
    { PATCH }     /api/users/id <br>";
});
