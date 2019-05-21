<?php
use Illuminate\Http\Request;
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
    return view('welcome');
});
// Route::get('/redirect', function () {
//     $query = http_build_query([
//         'client_id' => 'client-id',
//         'redirect_uri' => 'http://localhost:8000/callback',
//         'response_type' => 'code',
//         'scope' => '',
//     ]);
//
//     return redirect('http://115.68.220.209:8080//oauth/authorize?'.$query);
// })->name('get.token');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/callback', function (Request $request) {
//     $http = new GuzzleHttp\Client;
//
//     $response = $http->post('http://localhost:8000/oauth/token', [
//         'form_params' => [
//             'grant_type' => 'authorization_code',
//             'client_id' => '21',
//             'client_secret' => 'pLivdmpi4rUwtmG2GSg5TIWHSDyVtAHrHIFOJpDo',
//             'redirect_uri' => 'http://localhost:8000/callback',
//             'code' => $request->code,
//         ],
//     ]);
//     dd($response->getBody());
//     return json_decode((string) $response->getBody(), true);
// })->name('get.token');




// Route::get('/', 'GuzzleController@ProductShow');
