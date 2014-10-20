<?php

/**
 * Created by PhpStorm.
 * User: toobler
 * Date: 30/9/14
 * Time: 11:41 AM
 */
class DashboardAdminController extends BaseController
{
   function __construct()
   {

       if(!Auth::check()) {
           $this->beforeFilter('auth');
       }
       $this->currentMenu='car';

   }

    public function welcome()
    {

        $companyDetails=Company::all();
        $carDetails=Car::where('is_active', '=',1)->paginate(10);
        return View::make('admin.dashboard.welcome',array('carDetails'=>$carDetails,'companyDetails'=>$companyDetails,'currentMenu'=>$this->currentMenu));
    }


    public function doLogout()
    {
        Session::flush();
        Auth::logout();
        return Redirect::to('/admin');
    }

}