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

        if(!Auth::check()) {
            $this->beforeFilter('auth');
        }
        $this->currentMenu='dealers';

    }


    public function listAllDealers()
    {
        $dealerDetails=Dealer::paginate(10);
        return View::make('admin.general.listdealers',array('dealerDetails'=>$dealerDetails));
    }



}