<?php

/**
 * Created by PhpStorm.
 * User: Anoopms
 * Date: 6/10/14
 * Time: 1:20 PM
 */
class GeneraldetailsAdminController extends BaseController
{
    function __construct()
    {

        // if(!Auth::check()) {
        $this->beforeFilter('auth');
        // }
        $this->currentMenu = 'dealers';

    }


    public function listAllDealers()
    {
        $dealerDetails = Dealer::where('is_active', '=', '1')->paginate(10);
        return View::make('admin.general.listdealers', array('dealerDetails' => $dealerDetails));
    }

    public function displayEditDealerPopup()
    {
        $dealerId  = Input::get('dealer_id', null);
        $cities    = City::all();
        $companies = Company::all();
        if ($dealerId) {
            $Dealer = Dealer::find($dealerId);
        } else {
            $Dealer = null;
        }
        return View::make(
            'admin.general.editdealerpopup', array('Dealer' => $Dealer, 'cities' => $cities, 'companies' => $companies)
        );
    }

    public function manipulateEditDealerPopup()
    {

        $dealerId     = Input::get('editdealer_id', null);
        $companyId    = Input::get('company', null);
        $cityId       = Input::get('city', null);
        $dealerName   = Input::get('name', null);
        $address      = Input::get('address', null);
        $phonenumber  = Input::get('phonenumber', null);
        $mobilenumber = Input::get('mobilenumber', null);

        if ($dealerId) {
            $Dealer               = Dealer::find($dealerId);
            $Dealer->company_id   = $companyId;
            $Dealer->city_id      = $cityId;
            $Dealer->name         = $dealerName;
            $Dealer->address      = $address;
            $Dealer->phonenumber  = $phonenumber;
            $Dealer->mobilenumber = $mobilenumber;
        } else {
            $Dealer               = new Dealer();
            $Dealer->company_id   = $companyId;
            $Dealer->city_id      = $cityId;
            $Dealer->name         = $dealerName;
            $Dealer->address      = $address;
            $Dealer->phonenumber  = $phonenumber;
            $Dealer->mobilenumber = $mobilenumber;
            $Dealer->is_active    = 1;
        }
        $Dealer->save();
        //return  Redirect::to('admin/dealers' );
        return Response::json(array('msg' => 'success'));
    }

    public function deleteDealer()
    {
        $dealerId          = Input::get('dealer_id', null);
        $Dealer            = Dealer::find($dealerId);
        $Dealer->is_active = 0;
        if ($Dealer->save()) {
            return Response::json(array('msg' => 'success'));
        } else {
            return Response::json(array('msg' => 'failure'));
        }


    }


}