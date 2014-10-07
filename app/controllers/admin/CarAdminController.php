<?php

/**
 * Created by PhpStorm.
 * User: toobler
 * Date: 30/9/14
 * Time: 2:29 PM
 */
class CarAdminController extends BaseController
{
    function __construct()
    {

        if(!Auth::check()) {
            $this->beforeFilter('auth');
        }
        $this->currentMenu='car';
    }

    public function showVariants($carId = null)
    {

        if (isset($carId)) {
            $variantDetails = Variant::where('car_id', '=', $carId)
                ->where('is_active', '=', 1)
                ->get();
        }
        return View::make('admin.car.variants', array('variantDetails' => $variantDetails,'currentMenu'=>$this->currentMenu,'carId'=>$carId));
    }

    public function deleteSpecificCar($carId = null)
    {
        if (isset($carId)) {
            $deletingCar = Car::find($carId);

        }
        $deletingCar->is_active = 0;

        $deletingCar->save();
        //failed to enable laravel push  have to find later
        $deletingVariant = Variant::where('car_id', '=', $carId)->get();
        foreach ($deletingVariant as $lp_key_deletingVariant => $lp_value_deletingVariant) {
            $lp_value_deletingVariant->is_active = 0;
            $lp_value_deletingVariant->save();
        }

        return Redirect::to('/admin/dashboard');

    }

    public function deleteSpecificVariant($variantId = null)
    {
        if (isset($variantId)) {
            $deletingVariant = Variant::find($variantId);
        }
        $carId = $deletingVariant->car()->first()->id;
        $deletingVariant->is_active = 0;
        $deletingVariant->save();
        return Redirect::to('/admin/variants/' . $carId);
    }

    public function addNewCar()
    {

        $carName = Input::get('carname', null);
        $companyName = Input::get('companyname', null);
        $existingCarDetails = Car::where('is_active', '=', 1)
            ->where('company_id', '=', $companyName)
            ->get();
        foreach ($existingCarDetails as $existingCarDetails_key => $existingCarDetails_value) {
            $existingCars[] = strtolower($existingCarDetails_value->name);
        }

        if (in_array(strtolower($carName), $existingCars)) {
            return Response::json(array('msg' => 'duplicate'));
            exit();
        }


        $newCar = new Car();
        $newCar->name = $carName;
        $newCar->company_id = $companyName;
        if ($newCar->save()) {
            return Response::json(array('msg' => 'success'));
        } else {
            return Response::json(array('msg' => 'failure'));
        }

    }

    public function displaySpecificVariantDetails($variantId = null)
    {
        $variant = Variant::find($variantId);
        return View::make('admin.car.specificvariants', array('variant' => $variant,'currentMenu'=>$this->currentMenu));
    }

    public function addDimensions()
    {
        $dimensionId = Input::get('editdimension_id', null);
        $variantId = Input::get('variant_id', null);
        $length = Input::get('length', '');
        $width = Input::get('width', '');
        $height = Input::get('height', '');
        $wheelbase = Input::get('wheelbase', '');
        $bootspace = Input::get('bootspace', '');
        $kerbweight = Input::get('kerbweight', '');

        //edit existing dimension
        if ($dimensionId) {
            $Dimension = Dimension::find($dimensionId);
            $Dimension->variant_id = $variantId;
            $Dimension->length = $length;
            $Dimension->width = $width;
            $Dimension->height = $height;
            $Dimension->wheelbase = $wheelbase;
            $Dimension->bootspace = $bootspace;
            $Dimension->kerbweight = $kerbweight;

        } else {
            $Dimension = new Dimension();

            $Dimension->variant_id = $variantId;
            $Dimension->length = $length;
            $Dimension->width = $width;
            $Dimension->height = $height;
            $Dimension->wheelbase = $wheelbase;
            $Dimension->bootspace = $bootspace;
            $Dimension->kerbweight = $kerbweight;
        }
        $Dimension->save();
        return Redirect::to('admin/specificvariant/' . $variantId);

    }

    public function addEngineSpecifications()
    {
        $engineId = Input::get('editengine_id', null);
        $variantId = Input::get('variant_id', null);
        $torque = Input::get('torque', '');
        $displacement = Input::get('displacement', '');
        $power = Input::get('power', '');
        $cylinders = Input::get('cylinders', '');
        $valvespercylinder = Input::get('valvespercylinder', '');
        $valvemechanism = Input::get('valvemechanism', '');
        $cylinderconfiguration = Input::get('cylinderconfiguration', '');

        if ($engineId) {
            $Engine = Engine::find($engineId);
            $Engine->variant_id = $variantId;
            $Engine->torque = $torque;
            $Engine->displacement = $displacement;
            $Engine->power = $power;
            $Engine->cylinders = $cylinders;
            $Engine->valvespercylinder = $valvespercylinder;
            $Engine->valvemechanism = $valvemechanism;
            $Engine->cylinderconfiguration = $cylinderconfiguration;

        } else {
            $Engine = new Engine();
            $Engine->variant_id = $variantId;
            $Engine->torque = $torque;
            $Engine->displacement = $displacement;
            $Engine->power = $power;
            $Engine->cylinders = $cylinders;
            $Engine->valvespercylinder = $valvespercylinder;
            $Engine->valvemechanism = $valvemechanism;
            $Engine->cylinderconfiguration = $cylinderconfiguration;
        }
        $Engine->save();
        return Redirect::to('admin/specificvariant/' . $variantId);


    }

    public function addFuelEfficiencyDetails()
    {
        $fuelId = Input::get('editfuel_id', null);
        $variantId = Input::get('variant_id', null);
        $mileageHighway = Input::get('mileage_highway', '');
        $mileageCity = Input::get('mileage_city', '');
        $mileageOverall = Input::get('mileage_overall', '');

        if ($fuelId) {
            $Fuel = Fuelefficiency::find($fuelId);
            $Fuel->variant_id = $variantId;
            $Fuel->mileage_highway = $mileageHighway;
            $Fuel->mileage_city = $mileageCity;
            $Fuel->mileage_overall = $mileageOverall;

        } else {
            $Fuel = new Fuelefficiency();
            $Fuel->variant_id = $variantId;
            $Fuel->mileage_highway = $mileageHighway;
            $Fuel->mileage_city = $mileageCity;
            $Fuel->mileage_overall = $mileageOverall;
        }
        $Fuel->save();
        return Redirect::to('admin/specificvariant/' . $variantId);

    }

    public function addWheelDetails()
    {
        $wheelId = Input::get('editwheel_id', null);
        $variantId = Input::get('variant_id', null);
        $tyres = Input::get('tyres', '');
        $wheelSize = Input::get('wheelsize', '');
        $wheelType = Input::get('wheeltype', '');
        if ($wheelId) {
            $Wheel = Wheel::find($wheelId);
            $Wheel->variant_id = $variantId;
            $Wheel->tyres = $tyres;
            $Wheel->wheelsize = $wheelSize;
            $Wheel->wheeltype = $wheelType;
        } else {
            $Wheel = new Wheel();
            $Wheel->variant_id = $variantId;
            $Wheel->tyres = $tyres;
            $Wheel->wheelsize = $wheelSize;
            $Wheel->wheeltype = $wheelType;
        }
        $Wheel->save();
        return Redirect::to('admin/specificvariant/' . $variantId);
    }

    public function addBrakeDetails()
    {

        $brakeId = Input::get('editbrake_id', null);
        $variantId = Input::get('variant_id', null);
        $rearBrake = Input::get('rear_brakes', '');
        $frontBrake= Input::get('front_brakes', '');
        if($brakeId){
            $Brake=Brake::find($brakeId);
            $Brake->variant_id=$variantId;
            $Brake->rear_brakes=$rearBrake;
            $Brake->front_brakes=$frontBrake;

        }else{
            $Brake=new Brake();
            $Brake->variant_id=$variantId;
            $Brake->rear_brakes=$rearBrake;
            $Brake->front_brakes=$frontBrake;
        }
        $Brake->save();
        return Redirect::to('admin/specificvariant/' . $variantId);

    }

    public function addCapacityDetails()
    {
        $capacityId = Input::get('editcapacity_id', null);
        $variantId = Input::get('variant_id', null);
        $tankCapacity = Input::get('tank_capacity', '');
        $seatingCapacity= Input::get('seating_capacity', '');
        if($capacityId){
            $Capacity=Capacity::find($capacityId);
            $Capacity->variant_id=$variantId;
            $Capacity->tank_capacity=$tankCapacity;
            $Capacity->seating_capacity=$seatingCapacity;

        }else{
            $Capacity=new Capacity();
            $Capacity->variant_id=$variantId;
            $Capacity->tank_capacity=$tankCapacity;
            $Capacity->seating_capacity=$seatingCapacity;

        }
        $Capacity->save();
        return Redirect::to('admin/specificvariant/' . $variantId);

    }

    public function addSteeringDetails()
    {
        $steeringId = Input::get('editsteering_id', null);
        $variantId = Input::get('variant_id', null);
        $turningRadius = Input::get('turning_radius', '');
        $steeringType= Input::get('steering_type', '');

        if($steeringId){
            $Steering=Steering::find($steeringId);
            $Steering->variant_id=$variantId;
            $Steering->turning_radius=$turningRadius;
            $Steering->steering_type=$steeringType;
        }else{
            $Steering=new Steering();
            $Steering->variant_id=$variantId;
            $Steering->turning_radius=$turningRadius;
            $Steering->steering_type=$steeringType;
        }
        $Steering->save();
        return Redirect::to('admin/specificvariant/' . $variantId);


    }

    public function addPriceDetails()
    {
        $priceId = Input::get('editprice_id', null);
        $variantId = Input::get('variant_id', null);
        $showroomprice=Input::get('showroomprice', '');
        $onroadprice=Input::get('onroadprice', '');
        if($priceId){
            $Price=Price::find($priceId);
            $Price->variant_id=$variantId;
            $Price->showroomprice=$showroomprice;
            $Price->onroadprice=$onroadprice;
        }else{
            $Price=new Price();
            $Price->variant_id=$variantId;
            $Price->showroomprice=$showroomprice;
            $Price->onroadprice=$onroadprice;
        }
        $Price->save();
        return Redirect::to('admin/specificvariant/' . $variantId);

    }

    public function addNewVariant()
    {
        $carId=Input::get('carId', null);
        $variant=Input::get('variant');
        $fuelType=Input::get('fueltype');
        $validator = Validator::make(
            array(

                'variant' => $variant,
                'fueltype'    =>$fuelType
            ),
            array(
                'variant' => 'required',
                'fueltype'    => 'required'
            )
        );

        if (!$validator->fails()) {

            $Variant=new Variant();
            $Variant->name=$variant;
            $Variant->type=$fuelType;
            $Variant->car_id=$carId;
            if (isset($carId)) {
                $variantDetails = Variant::where('car_id', '=', $carId)
                    ->where('is_active', '=', 1)
                    ->get();
            }
            foreach($variantDetails as $variantDetails_key=>$variantDetails_value){
                $existingVariants[]=strtolower($variantDetails_value->name);
            }


            if(in_array(strtolower($variant),$existingVariants)){
                return Response::json(array('msg' => 'duplicate'));
                exit();
            }
            if($Variant->save()){
                return Response::json(array('msg' => 'success'));
            }else{
                return Response::json(array('msg' => 'failure'));

            }

        }
    }

}