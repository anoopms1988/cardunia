<?php
/**
 * Created by PhpStorm.
 * User: Anoopms
 * Date: 6/10/14
 * Time: 1:22 PM
 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Dealer extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dealers';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

    public $timestamps=false;

    public function company()
    {
        return $this->belongsTo('Company');
    }

    public function city()
    {
        return $this->belongsTo('City','city_id');
    }



}