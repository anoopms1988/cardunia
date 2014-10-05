<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Variant extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'variants';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

    public $timestamps=false;

    public function car()
    {
        return $this->belongsTo('Car');
    }

    public function dimension()
    {
        return $this->hasOne('Dimension');
    }

    public function fuelefficiency()
    {
        return $this->hasOne('Fuelefficiency');
    }

    public function engine()
    {
        return $this->hasOne('Engine');
    }

    public function wheel()
    {
        return $this->hasOne('Wheel');
    }

    public function steering()
    {
        return $this->hasOne('Steering');
    }

    public function capacity()
    {
        return $this->hasOne('Capacity');
    }


    public function brake()
    {
        return $this->hasOne('Brake');
    }


    public function price()
    {
        return $this->hasOne('Price');
    }

}