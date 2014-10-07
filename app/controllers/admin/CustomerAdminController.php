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
        $this->currentMenu = 'dealers';
    }

   public function listAllCustomers()
   {
       $Customers=Customer::where('is_active','=','1')->paginate(10);
       return View::make('admin.general.listcustomers',array('Customers'=>$Customers));
   }





}