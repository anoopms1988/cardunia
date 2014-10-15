<?php
/**
 * Created by PhpStorm.
 * User: Anoopms
 * Date: 15/10/14
 * Time: 4:35 PM
 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class InsuranceEnquiry extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'insurance_enquiry';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

    public $timestamps=false;

    public function city()
    {
        return $this->belongsTo('City');
    }

}