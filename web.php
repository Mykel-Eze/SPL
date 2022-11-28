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

Route::get('/index', function () {
    return view('index');
});

Route::get('/', function () {
    return view('waiting');
});

Route::get('/cookie', function () {
    return view('cookie');
});
Route::get('/privacy', function () {
    return view('privacy');
});


//wait list
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});


Route::get('/profile','DoctorController@profileindex');


//wallet
Route::get('/wallet','DoctorController@wallet');
Route::post('/loan-request','DoctorController@loanrequest')->name('loan.application');


Route::get('/products','DoctorController@productsPage');

Route::post('/wait_store','WaitingController@store')->name('wait.store');

//patient list
Route::get('/patient-list', 'PatientController@index');
Route::post('add/patient','PatientController@store');
Route::post('update/patient','PatientController@update');

//admin
Route::get('/cco-overview','AdminController@getAllSignups');

//admin
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin');
Route::get('admin_register', 'Admin\RegisterController@showRegistrationForm');
Route::post('admin_register', 'Admin\RegisterController@register');
Route::post('admin_login', 'Admin\LoginController@login');
Route::get('admin_home','AdminController@home');
Route::post('admin_logout', 'Admin\LoginController@logout');

 //product management
 Route::get('add-product','ProductController@create')->name('add-product');
 Route::post('add-product','ProductController@store')->name('add-product');
 Route::get('all-product','ProductController@show')->name('all-products');
 Route::get('edit-product/{id}','ProductController@edit')->name('edit-product');
 Route::post('edit-product','ProductController@update')->name('update-product');
 Route::get('delete-product/{id}','ProductController@destroy')->name('delete-product');

 //patient management
 Route::get('all-patients','AdminController@allpatients')->name('patient.all');
 Route::get('patient-status/{id}','AdminController@editstatus')->name('status.edit');
 Route::post('patient-status','AdminController@storeupdate')->name('status.update');
 Route::get('purchase-status/{id}','AdminController@editpurchase')->name('purchase.store');
 Route::post('purchase-update','AdminController@purchaseupdate')->name('purchase.update');

 //patience.status
//auth
Route::post('reg_user','Auth\RegisterController@storeUser')->name('reg_user');
// Auth::routes();

//subscribe
Route::post('subscirbe','NewsletterController@store')->name('subscribe');
// Route::get('/home', 'HomeController@index')->name('home');


//profile
Route::post('password-update','DoctorController@passwordchange')->name('update.password');
Route::post('/profile-update','DoctorController@profile')->name('profile.update');
Route::post('/bank-update','DoctorController@bankdetails')->name('bank.update');

//Role
Route::get('role/permit','RoleController@index');
Route::get('all-roles','RoleController@allroles');
Route::get('add-role','RoleController@addrole');
Route::get('assign-role','RoleController@assignrole');
Route::get('/all-admins','RoleController@alladmins');
Route::get('/edit-role/{uid}/{rid}','RoleController@edit');
Route::post('/role/update','Role@storeUpdate');
Route::post('assign-role','RoleController@storeassignrole');
Route::post('add-role','RoleController@storerole');




// Route::get('admin_home','AdminController@home');
// Route::post('admin_logout', 'Admin\LoginController@logout');



//auth route
 Auth::routes(['verify' => true]);
 //Auth::routes();
 Route::post('reg_user','Auth\RegisterController@storeUser')->name('reg_user');

//subscribe
Route::post('subscirbe','NewsletterController@store')->name('subscribe');

//support
Route::post('mailsupport','SupportController@sendSupportMail')->name('mailsupport');
Route::get('/support', 'SupportController@supportForm');

//home
Route::get('/tutorial','DoctorController@tutorials');

Route::get('/home','DoctorController@home');


//video
Route::resource('video', 'VideoController');

//notification
Route::get('markRead','DoctorController@markallasread')->name('markRead');

//withdrawal request
Route::post('withdrawalrequest','WithdrawalRequestController@store');

//request management
Route::get('checkout/request','AdminController@checkout_request')->name('checkout.request');
Route::post('/approve-payment','AdminController@approve_payment');
Route::post('reverse-payment','AdminController@reverse_payment');
//image
Route::get('/public/{url}',function($url){
    $path=storage_path().'/app/public/'.$url;

    if(!File::exists($path)){
        abort(404);
    }$file = File::get($path);
    $type = File::mimeType($path);
        $response = Response::make($file,200);
        $response->header("Content-Type",$type);

        return $response;
});



Route::get('/test', function () {
    return view('emails.testmail');
});




