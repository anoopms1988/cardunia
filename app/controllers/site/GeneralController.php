<?php
/**
 * Created by PhpStorm.
 * User: toobler
 * Date: 21/10/14
 * Time: 11:35 AM
 */
class GeneralController extends BaseController
{

    function __construct()
    {

    }

    public function showCompanyDetails()
    {
        //$cars=Car::where('company_id', '=',$companyId)->get();
        return View::make('site.general.aboutus');
    }

}