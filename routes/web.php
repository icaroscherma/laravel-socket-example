<?php
// use Illuminate\Support\Facades\Redis;
// use \Redis;
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
    // First way
    $data = [
        'event' => 'UserSignedUp',
        'data' => [
            'message' => 'Someone entered in the channel.',
        ],
    ];
    Redis::publish('test-channel', json_encode($data));

    // Second Way (remember to set REDIS in Broadcast config)
    event(new \App\Events\UserSignedUp('Laravel Event was fired.'));

    // yourfrontend :D
    return view('welcome');
});
Route::post('/send-message', function () {
    Redis::publish('test-channel', json_encode(request()->toArray()));
    return 'oki-doki';
});