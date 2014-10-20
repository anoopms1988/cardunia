<?php
/**
 * Created by PhpStorm.
 * User: toobler
 * Date: 20/10/14
 * Time: 6:04 PM
 */

class CompaniesController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    function __construct()
    {

    }

    public function listSpecificCompanyCars($companyId=null)
    {
        $cars=Car::where('company_id', '=',$companyId)->get();
        return View::make('site.cars.specificcars',array('cars'=>$cars));
    }

}