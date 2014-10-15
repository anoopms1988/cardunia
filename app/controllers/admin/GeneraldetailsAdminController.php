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

        $this->beforeFilter('auth');
    }


    public function listAllDealers()
    {
        //$mainmenu and $currentmenu is not written in constructor
        $mainmenu='generalmanagement';
        $currentmenu='dealer';
        $dealerDetails = Dealer::where('is_active', '=', '1')->paginate(10);
        return View::make('admin.general.listdealers', array('dealerDetails' => $dealerDetails,'mainmenu'=>$mainmenu,'currentmenu'=>$currentmenu));
    }

    public function displayEditDealerPopup()
    {
        $mainmenu='generalmanagement';
        $currentmenu='dealer';
        $dealerId  = Input::get('dealer_id', null);
        $cities    = City::all();
        $companies = Company::all();
        if ($dealerId) {
            $Dealer = Dealer::find($dealerId);
        } else {
            $Dealer = null;
        }
        return View::make(
            'admin.general.editdealerpopup', array('Dealer' => $Dealer, 'cities' => $cities, 'companies' => $companies,'mainmenu'=>$mainmenu,'currentmenu'=>$currentmenu)
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

    public function listCustomerEnquiries()
    {
        $mainmenu='generalmanagement';
        $enquiryDetails = CustomerEnquiry::where('is_active', '=', '1')->paginate(10);
        return View::make('admin.general.listenquiries', array('enquiryDetails' => $enquiryDetails,'mainmenu'=>$mainmenu));
    }

    public function deleteCustomerEnquiries()
    {
        $enquiryId          = Input::get('enquiry_id', null);
        $Enquiry            = CustomerEnquiry::find($enquiryId);
        $Enquiry->is_active = 0;
        if ($Enquiry->save()) {
            return Response::json(array('msg' => 'success'));
        } else {
            return Response::json(array('msg' => 'failure'));
        }
    }


}