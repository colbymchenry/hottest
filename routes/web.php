<?php

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

use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('home');
});

Route::get('/setup', function () {
    return view('setup');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/models', function () {
    return view('models');
});
Route::get('/top', function () {
    return view('top_models');
});

Auth::routes();


//** !!! IMPORTANT !!! */ any routes that post must refresh page

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('feed');

    Route::get('/search_for_model/{name}', 'ModelController@SearchForModel');

    Route::get('/send_msg', 'ChatController@sendMessage');

    Route::post('/send_img', 'ChatController@sendImage');

    Route::post('/update_avatar', 'ProfileController@updateAvatar');

    Route::get('/send_tip', 'ChatController@sendTip');

    Route::get('/typing', 'ChatController@sendTyping');

    Route::get('/followers', 'ModelController@getFollowers');

    Route::post('/report_profile', 'ProfileController@reportProfile');

    // model routes
    Route::prefix('model')->group(function () {
        // these must come before /{name} routes
        Route::post('/upload_image', 'ImageController@uploadImage')->name('upload_image');
        Route::get('/like-img/{id}', 'ImageController@likeImage');
        Route::get('/edit_image', 'ImageController@editImage')->name('edit_image');
        Route::get('/delete_image', 'ImageController@deleteImage')->name('delete_image');
        Route::get('/upload_avatar_image', 'ModelController@setAvatar')->name('upload_avatar');
        Route::get('/set_banner', 'ModelController@setBanner')->name('set_banner');

        Route::get('/{name}', 'ModelController@index');
        Route::get('/{name}/edit', function($name) {
            return view('model-settings')->with('name', $name);
        });
        Route::post('/set_banner/{imgID}', 'ModelController@setBanner')->name('set_banner');
        Route::post('/set_prices', 'ModelController@setPrices')->name('set_prices');
        Route::post('/follow/{model_id}', function($model_id) {
           return Auth::user()->follow($model_id);
        });
        Route::post('/unfollow/{model_id}', function($model_id) {
           return Auth::user()->unFollow($model_id);
        });
    });

    // new model page
        Route::get('/new/{name}', function ($name) {
            return view('model')->with('name', $name);
        });

    // media routes (url should have a random string after a slash ex. /model/julianne/media/5c732bb20829130d1c7f1a55
    Route::get('/model/{name}/media', function ($name) {
        return view('profile/media')->with('name', $name);
    });

    // message routes
    Route::prefix('message')->group(function () {
        Route::post('/reply', 'MessageController@reply');
        Route::post('/get/{model_id}', 'MessageController@getMessages');
        Route::get('/discussions', 'MessageController@getDiscussionsView');
        Route::get('/open_chat', 'MessageController@getChat');
    });

    // paypal routes
    Route::prefix('paypal')->group(function () {
        Route::post('/create-checkout/{model_id}/{type}', 'PayPalController@createCheckout');
        Route::get('/execute-checkout', 'PayPalController@executeCheckout')->name('execute-checkout');
        Route::post('/create-agreement/{model_id}/{type}', 'PayPalController@createBillingAgreementCheckout');
        Route::get('/execute-agreement', 'PayPalController@executeBillingAgreementCheckout')->name('execute-agreement');
        Route::post('/create-credit-checkout/{amount}', 'ChatController@createBuyCredits');
        Route::get('/execute-credit-checkout', 'ChatController@executeBuyCredits')->name('execute-credit-checkout');
    });

    Route::get('/model/{name}/analytics', function ($name) {
        return view('analytics')->with('name', $name);
    });

    Route::get('/uploads', function () {
        return view('uploads');
    });

    Route::get('/settings', function () {
        if(\request('avatar') == 'true') {
            return view('settings')->with('avatar', true);
        }
        return view('settings');
    });

    Route::get('/chat', 'ChatController@getChatsView');

    Route::get('/chat/get/{id}/{page}', 'ChatController@getMessages');

    Route::get('/chat/open/{id}', 'ChatController@getChat');

    Route::get('/notifications', function () {
        return view('notifications');
    });
    Route::get('/hot', function () {
        return view('discover');
    });
    Route::get('/feed', 'HomeController@feed');

    Route::get('/favorites', function () {
        return view('favorites');
    });
    Route::get('/apply', function () {
        return view('apply/application');
    });

    // Admin

    Route::get('/admin/dashboard', function () {
        return view('admin/dashboard');
    });
    Route::get('/admin/payments', function () {
        return view('admin/payments/payments');
    });
    Route::get('/admin/tickets', function () {
        return view('admin/tickets/tickets');
    });
    Route::get('/admin/tickets/open', function () {
        return view('admin/tickets/ticket');
    });
    Route::get('/admin/users', function () {
        return view('admin/users/users');
    });
    Route::get('/admin/settings', function () {
        return view('admin/settings');
    });
    Route::get('/admin/{name}', function ($name) {
        return view('admin/users/user')->with('name', $name);
    });


    Route::get('/cwpp/model', 'PayPalController@ConnectAccount');

});

//Route::get('/model/{name}/upload', function($name) {
//    return view('upload')->with('name', $name);
//});

Route::post('/register_new_model', 'ModelController@registerNewModel');
Route::get('/add-server', 'ModelController@colbysMain');
//Route::post('/upload_cover_image', 'ModelController@uploadCoverImage')->name('upload_cover_image');
Route::post('/create_data_server', 'ServerController@createServer');