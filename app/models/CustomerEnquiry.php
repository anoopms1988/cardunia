<?php
/**
 * Created by PhpStorm.
 * User: toobler
 * Date: 10/10/14
 * Time: 4:51 PM
 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class CustomerEnquiry extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer_enquiry';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

    public $timestamps=false;

    public function enquiryType()
    {
        return $this->belongsTo('EnquiryType');
    }

    public function customer()
    {
        return $this->belongsTo('Customer');
    }

}