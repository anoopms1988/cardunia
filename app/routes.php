<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get(
    '/', function () {
        return View::make('hello');
    }
);

Route::group(
    ['prefix' => 'admin'], function () {

        Route::get('/', 'LoginAdminController@login');
        Route::post('login', 'LoginAdminController@doLogin');
        Route::get('dashboard', 'DashboardAdminController@welcome');
        Route::get('logout', 'DashboardAdminController@doLogout');
        // Route::get('logout', 'DashboardAdminController@doLogout');
        Route::get('variants/{id}', 'CarAdminController@showVariants');
        Route::get('deletecar/{id}', 'CarAdminController@deleteSpecificCar');
        Route::get('deletevariant/{id}', 'CarAdminController@deleteSpecificVariant');
        Route::post('addcar', 'CarAdminController@addNewCar');
        Route::get('specificvariant/{id}', 'CarAdminController@displaySpecificVariantDetails');
        Route::post('adddimension', 'CarAdminController@addDimensions');
        Route::post('addenginespecs', 'CarAdminController@addEngineSpecifications');
        Route::post('addfuel', 'CarAdminController@addFuelEfficiencyDetails');
        Route::post('addwheel', 'CarAdminController@addWheelDetails');
        Route::post('addbrake', 'CarAdminController@addBrakeDetails');
        Route::post('addcapacity', 'CarAdminController@addCapacityDetails');
        Route::post('addsteering', 'CarAdminController@addSteeringDetails');
        Route::post('addprice', 'CarAdminController@addPriceDetails');
        Route::post('addvariant', 'CarAdminController@addNewVariant');
        Route::post('addvariant', 'CarAdminController@addNewVariant');
        Route::get('dealers','GeneraldetailsAdminController@listAllDealers');
       // Route::post('dealers','GeneraldetailsAdminController@listAllDealers');
        Route::post('editdealerpopup', 'GeneraldetailsAdminController@displayEditDealerPopup');
        Route::post('manipulatedealer','GeneraldetailsAdminController@manipulateEditDealerPopup');
        Route::post('deletedealer','GeneraldetailsAdminController@deleteDealer');
        Route::get('customers','CustomerAdminController@listAllCustomers');
        Route::post('editcustomerpopup','CustomerAdminController@displayEditCustomerPopup');
        Route::post('manipulatecustomer','CustomerAdminController@manipulateEditCustomerPopup');
        Route::post('deletecustomer','CustomerAdminController@deleteCustomer');
        Route::get('reviews','CustomerAdminController@listCustomerReviews');
        //Route::post('editreviewpopup','CustomerAdminController@displayEditReviewPopup');
        Route::post('deletereview','CustomerAdminController@deleteReview');
        Route::post('reviewapprove','CustomerAdminController@customerReviewApprove');
        // Route::post('customers','CustomerAdminController@listAllCustomers');


    }
);
