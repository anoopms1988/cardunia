<?php
/**
 * Created by PhpStorm.
 * User: Anoopms
 * Date: 15/10/14
 * Time: 4:50 PM
 */
class GeneralEnquiriesAdminController extends BaseController
{
    function __construct()
    {
        $this->beforeFilter('auth');
        $this->mainmenu='generalenquiries';
    }

    public function listInsuranceEnquiries()
    {
        $currentmenu='insurance';
        $insuranceEnquiryDetails=InsuranceEnquiry::paginate(10);
      return View::make('admin.generalenquiries.listinsuranceenquiries',array('insuranceEnquiryDetails'=>$insuranceEnquiryDetails,'mainmenu'=>$this->mainmenu,'currentmenu'=>$currentmenu));
    }

    public function listLoanEnquiries()
    {
        $currentmenu='loan';
        $loanEnquiryDetails=LoanEnquiry::paginate(10);
        return View::make('admin.generalenquiries.listloanenquiries',array('loanEnquiryDetails'=>$loanEnquiryDetails,'mainmenu'=>$this->mainmenu,'currentmenu'=>$currentmenu));
    }


}