<?php
/**
 * Created by PhpStorm.
 * User: toobler
 * Date: 21/10/14
 * Time: 12:02 PM
 */
class CarController extends BaseController
{

    function __construct()
    {

    }

    public function showVariants($carId=null)
    {
        $specificVariants=Variant::where('car_id','=',$carId)->get();
        return View::make('site.cars.specificvariants',array('specificVariants'=>$specificVariants));
    }

}