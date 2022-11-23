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

use App\Model\Galery;
use App\Model\Package;
use App\Tracker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    //number of user connected or viewed
    Tracker::firstOrCreate([
        'ip'   => $_SERVER['REMOTE_ADDR']],
        ['ip'   => $_SERVER['REMOTE_ADDR'],
        'current_date' => date('Y-m-d')])->save();
    $packages = Package::all();
    $galery = Galery::all();
    return view('welcome',compact('packages','galery'));
})->name('welcome');



Route::group(['middleware' => ['role:admin']], function () {
	Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('users', 'Admin\UsersController');
    Route::get('login-activities',[
        'as' => 'login-activities',
        'uses' => 'Admin\UsersController@indexLoginLogs'
    ]);    

    Route::resource('packages', 'Admin\PackageController');
    Route::resource('galleries', 'Admin\GaleryController');
    Route::resource('services', 'Admin\JasaController');
    Route::resource('transaction', 'Admin\TransactionController');
    Route::resource('report', 'Admin\ReportController');
    Route::post('/reportresult', 'Admin\ReportController@getReport');
});

Route::group(['middleware' => ['role:member']], function () {
    Route::resource('booking', 'Member\BookingController');
    Route::resource('package', 'Member\PackageController');
    Route::resource('service', 'Member\JasaController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('profile','Users\ProfileController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');