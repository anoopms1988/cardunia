<?php
/**
 * Created by PhpStorm.
 * User: toobler
 * Date: 6/10/14
 * Time: 1:31 PM
 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class City extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

    public $timestamps=false;

    public function dealer()
    {
        return $this->hasMany('Dealer','city_id');
    }

    public function customer()
    {
        return $this->hasMany('Customer');
    }

    public function insuranceEnquiry()
    {
        return $this->hasMany('InsuranceEnquiry');
    }

    public function loanEnquiry()
    {
        return $this->hasMany('LoanEnquiry');
    }



}