<?php
/**
 * Created by PhpStorm.
 * User: Anoopms
 * Date: 15/10/14
 * Time: 4:24 PM
 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class LoanEnquiry extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loan_enquiry';

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

    public function carType()
    {
        return $this->belongsTo('Cartype','cartype_id');
    }

    public function variant()
    {
        return $this->belongsTo('Variant');
    }

}