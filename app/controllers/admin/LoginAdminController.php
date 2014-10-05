<?php

/**
 * Created by PhpStorm.
 * User: toobler
 * Date: 30/9/14
 * Time: 11:41 AM
 */
class LoginAdminController extends BaseController
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

    public function login()
    {

        return View::make('admin.login.login');
    }

    public function doLogin()
    {
        $email     = trim(Input::get('email'));
        $password  = trim(Input::get('password'));
        $validator = Validator::make(
            array(

                'password' => $password,
                'email'    => $email
            ),
            array(
                'password' => 'required|min:6',
                'email'    => 'required|email'
            )
        );

        if ($validator->fails()) {
            return Redirect::to('/admin')->withErrors($validator);
        }else{
            if (Auth::attempt(array('email' => $email, 'password' => $password))) {
                 Session::put('email',$email);
                return Redirect::intended('admin/dashboard');
            }else{
                return Redirect::to('/admin')->with('emailmismatch', 'Password not matches for the given user');;
            }
        }
    }






}