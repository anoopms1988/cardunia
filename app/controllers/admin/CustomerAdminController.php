<?php
/**
 * Created by PhpStorm.
 * User: Anoopms
 * Date: 6/10/14
 * Time: 1:20 PM
 */
class CustomerAdminController extends BaseController
{
    function __construct()
    {

        $this->beforeFilter('auth');
        $this->currentMenu = 'customers';
    }

   public function listAllCustomers()
   {
       $mainmenu='generalmanagement';
       $currentmenu='dealer';
       $Customers=Customer::where('is_active','=','1')->paginate(10);
       return View::make('admin.general.listcustomers',array('Customers'=>$Customers,'mainmenu'=>$mainmenu,'currentmenu'=>$currentmenu));
   }

    public function displayEditCustomerPopup()
    {
        $mainmenu='generalmanagement';
        $currentmenu='dealer';
        $customerId=Input::get('customer_id',null);
        $cities=City::all();
        $companies=Company::all();
        if($customerId){
            $Customer=Customer::find($customerId);
        }else{
            $Customer=null;
        }
        return View::make('admin.customer.editcustomerpopup',array('Customer'=>$Customer,'cities'=>$cities,'companies'=>$companies,'mainmenu'=>$mainmenu,'currentmenu'=>$currentmenu));
    }

    public function manipulateEditCustomerPopup()
    {

        $customerId=Input::get('editcustomer_id',null);
        $firstName=Input::get('first_name',null);
        $lastName   =Input::get('last_name',null);
        $email=Input::get('email',null);
        $city=Input::get('city',null);
        $mobilenumber=Input::get('mobilenumber',null);

        if($customerId){
            $Customer=Customer::find($customerId);
            $Customer->first_name=$firstName;
            $Customer->last_name=$lastName;
            $Customer->email=$email;
            $Customer->city_id=$city;
            $Customer->mobilenumber=$mobilenumber;
        }else{
            $Customer=new Customer();
            $Customer->first_name=$firstName;
            $Customer->last_name=$lastName;
            $Customer->email=$email;
            $Customer->city_id=$city;
            $Customer->mobilenumber=$mobilenumber;
        }
        $Customer->save();
        //return  Redirect::to('admin/dealers' );
        return Response::json(array('msg' => 'success'));
    }

    public function deleteCustomer()
    {
        $customerId=Input::get('customer_id',null);
        $Customer=Customer::find($customerId);
        $Customer->is_active=0;
        if($Customer->save()){
            return Response::json(array('msg' => 'success'));
        }else{
            return Response::json(array('msg' => 'failure'));
        }

    }

    public function listCustomerReviews()
    {
        $mainmenu='generalmanagement';
        $currentmenu='review';
        $reviews=Review::where('is_approved','=','1')
            ->where('is_active','=','1')
            ->paginate(10);
        return View::make('admin.customer.listcustomerreviews',array('reviews'=>$reviews,'mainmenu'=>$mainmenu,'currentmenu'=>$currentmenu));
    }

    public function deleteReview()
    {
        $reviewId=Input::get('review_id',null);
        $Review=Review::find($reviewId);
        $Review->is_active=0;
        if($Review->save()){
            return Response::json(array('msg' => 'success'));
        }else{
            return Response::json(array('msg' => 'failure'));
        }
    }

    public function customerReviewApprove()
    {
        $reviewId=Input::get('review_id',null);
        $approve=Input::get('approve');
        $Review=Review::find($reviewId);
        if($approve==1){
            $Review->is_approved=1;
        }else{
            $Review->is_approved=0;
        }

        if($Review->save()){
            return Response::json(array('msg' => 'success'));
        }else{
            return Response::json(array('msg' => 'failure'));
        }
    }



}