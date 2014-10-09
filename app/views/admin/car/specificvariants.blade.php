@extends('admin.layout.master')
@section('content')
<h1 class="page-header">{{{$variant->name or ''}}}({{{$variant->car()->first()->company()->first()->name or ''}}})</h1>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
    Dimensions&Weights
    @if(!$variant->dimension())
    <button class="btn btn-primary btn-lg " data-target="#dimensionModal" data-toggle="modal"> Add Dimensions&Weights </button>
    @else
        <button class="btn btn-primary btn-lg " data-target="#dimensionModal" data-toggle="modal"> Edit Dimensions&Weights </button>
    @endif
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
@if($variant->dimension()->first())
<thead>
<tr>
    <th>Overall Length</th>
    <th>Overall Width</th>
    <th>Overall Height</th>
    <th>Wheel Base</th>
    <th>Boot Space</th>
    <th>Kerb Weight</th>
    <th>Ground Clearance</th>
</tr>
</thead>

<tbody>

<tr class="odd gradeX">
    <td>{{{$variant->dimension()->first()->length or ''}}}</td>
    <td>{{{$variant->dimension()->first()->width or ''}}}</td>
    <td>{{{$variant->dimension()->first()->height or ''}}}</td>
    <td>{{{$variant->dimension()->first()->wheelbase or ''}}}</td>
    <td>{{{$variant->dimension()->first()->bootspace or ''}}}</td>
    <td>{{{$variant->dimension()->first()->kerbweight or ''}}}</td>
    <td>{{{$variant->dimension()->first()->length or ''}}}</td>
</tr>

</tbody>
@else
<div class="alert alert-danger">
      No dimension exist for the variants
</div>
@endif
</table>
</div>
<!-- /.table-responsive -->

</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
{{--Engine specs--}}
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
    Engine Specifications
    @if($variant->engine()->first())
        <button class="btn btn-primary btn-lg " data-target="#engineModal" data-toggle="modal"> Edit Engine Specifications </button>

    @else
        <button class="btn btn-primary btn-lg " data-target="#engineModal" data-toggle="modal">Add Engine Specifications </button>

    @endif
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
@if($variant->engine()->first())
<thead>
<tr>
    <th>Torque</th>
    <th>Displacement</th>
    <th>Power</th>
    <th>Cylinders</th>
    <th>Valves per cylinder</th>
    <th>Valve mechanism</th>
    <th>Cylinder Configuration</th>
</tr>
</thead>

<tbody>

<tr class="odd gradeX">
    <td>{{{$variant->engine()->first()->torque or ''}}}</td>
    <td>{{{$variant->engine()->first()->displacement or ''}}}</td>
    <td>{{{$variant->engine()->first()->power or ''}}}</td>
    <td>{{{$variant->engine()->first()->cylinders or ''}}}</td>
    <td>{{{$variant->engine()->first()->valvespercylinder or ''}}}</td>
    <td>{{{$variant->engine()->first()->valvemechanism or ''}}}</td>
    <td>{{{$variant->engine()->first()->cylinderconfiguration or ''}}}</td>
</tr>

</tbody>
@else
<div class="alert alert-danger">
      No engine specification exist for the variants
</div>
@endif
</table>
</div>
<!-- /.table-responsive -->

</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Fuel Efficiency
                 @if(!$variant->Fuelefficiency()->first())
                    <button class="btn btn-primary btn-lg " data-target="#fuelModal" data-toggle="modal"> Add Fuel Efficiency</button>
                 @else
                        <button class="btn btn-primary btn-lg " data-target="#fuelModal" data-toggle="modal"> Edit Fuel Efficiency </button>
                 @endif
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Mileage_highway</th>
                            <th>Mileage_city</th>
                            <th>Mileage_overall</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{{$variant->Fuelefficiency()->first()->mileage_highway or ''}}}</td>
                            <td>{{{$variant->Fuelefficiency()->first()->mileage_city or ''}}}</td>
                            <td>{{{$variant->Fuelefficiency()->first()->mileage_overall or ''}}}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Wheel & Tyres
                     @if(!$variant->Wheel()->first())
                      <button class="btn btn-primary btn-lg " data-target="#wheelModal" data-toggle="modal"> Add Wheels & Tyres</button>
                     @else
                          <button class="btn btn-primary btn-lg " data-target="#wheelModal" data-toggle="modal"> Edit Wheels & Tyres </button>
                     @endif
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tyres</th>
                                <th>Wheel Size</th>
                                <th>Wheel Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{{$variant->Wheel()->first()->tyres or ''}}}</td>
                                <td>{{{$variant->Wheel()->first()->wheelsize or ''}}}</td>
                                <td>{{{$variant->Wheel()->first()->wheeltype or ''}}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    <!-- /.col-lg-6 -->
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Brakes
                 @if(!$variant->Brake()->first())
                    <button class="btn btn-primary btn-lg " data-target="#brakeModal" data-toggle="modal"> Add Brake Details</button>
                 @else
                        <button class="btn btn-primary btn-lg " data-target="#brakeModal" data-toggle="modal"> Edit Brake Details </button>
                 @endif
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Rear Brakes</th>
                            <th>Front Brakes</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{{$variant->Brake()->first()->rear_brakes or ''}}}</td>
                            <td>{{{$variant->Brake()->first()->front_brakes or ''}}}</td>

                        </tr>


                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Capacity
                     @if(!$variant->Capacity()->first())
                      <button class="btn btn-primary btn-lg " data-target="#capacityModal" data-toggle="modal"> Add Capacity</button>
                     @else
                          <button class="btn btn-primary btn-lg " data-target="#capacityModal" data-toggle="modal"> Edit Capacity </button>
                     @endif
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tank Capacity</th>
                                <th>Seating Capacity</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{{$variant->Capacity()->first()->tank_capacity or ''}}}</td>
                                <td>{{{$variant->Capacity()->first()->seating_capacity or ''}}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    <!-- /.col-lg-6 -->
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Steering
                 @if(!$variant->Steering()->first())
                    <button class="btn btn-primary btn-lg " data-target="#steeringModal" data-toggle="modal"> Add Steering details</button>
                 @else
                        <button class="btn btn-primary btn-lg " data-target="#steeringModal" data-toggle="modal"> Edit Steering details </button>
                 @endif
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Turning Radius</th>
                            <th>Steering Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{{$variant->Steering()->first()->turning_radius or ''}}}</td>
                            <td>{{{$variant->Steering()->first()->steering_type or ''}}}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
                <div class="panel-heading">
                    Price
                     @if(!$variant->Price()->first())
                        <button class="btn btn-primary btn-lg " data-target="#priceModal" data-toggle="modal"> Add price details</button>
                     @else
                            <button class="btn btn-primary btn-lg " data-target="#priceModal" data-toggle="modal"> Edit price details </button>
                     @endif
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Showroom Price</th>
                                <th>Onroad price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{{$variant->Price()->first()->showroomprice or ''}}}</td>
                                <td>{{{$variant->Price()->first()->onroadprice or ''}}}</td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
        </div>
            <!-- /.panel -->
    </div>
    <div class="col-lg-12">
            <div class="panel panel-default">
                   <div class="panel-heading">
                        Safety
                       {{--  @if(!$variant->Price()->first())
                            <button class="btn btn-primary btn-lg " data-target="#priceModal" data-toggle="modal"> Add price details</button>
                         @else
                                <button class="btn btn-primary btn-lg " data-target="#priceModal" data-toggle="modal"> Edit price details </button>
                         @endif--}}
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                             {{Form::open(array( 'method' => 'post','name'=>'safety_features_form','url'=>'admin/updatesafety'))}}
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                     @foreach($safety as $safety_key=>$safety_value)
                                    <th>{{{$safety_value->name or ''}}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                     @foreach($safety as $safety_key=>$safety_value)
                                    <td>
                                        @if(in_array($safety_value->id,explode(',',$variant->variantSafety()->first()->features)))
                                        <input type="checkbox" name="safety[]" value="{{{$safety_value->id or ''}}}" checked>
                                        @else
                                         <input type="checkbox" name="safety[]" value="{{{$safety_value->id or ''}}}" >
                                        @endif
                                    </td>
                                    @endforeach
                                </tr>
                                </tbody>

                            </table>
                            <input type="submit" class="btn btn-primary" name="safetysubmit" value="Save">


                            <input type="hidden" name="variant_id" value="{{$variant->first()->id}}">


                              {{Form::close()}}
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
            </div>
                <!-- /.panel -->
        </div>
       <div class="col-lg-12">
                    <div class="panel panel-default">
                           <div class="panel-heading">
                                Interior

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">

                                       {{Form::open(array( 'method' => 'post','name'=>'interior_features_form','url'=>'admin/updateinterior'))}}

                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                             @foreach($interior as $interior_key=>$interior_value)
                                            <th>{{{$interior_value->name or ''}}}</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                             @foreach($interior as $interior_key=>$interior_value)
                                           <td>
                                                @if($variant->variantInterior()->first())

                                                @if(in_array($interior_value->id,explode(',',$variant->variantInterior()->first()->features)))
                                                <input type="checkbox" name="interior[]" value="{{{$interior_value->id or '' }}}" checked>
                                                @else
                                                 <input type="checkbox" name="interior[]" value="{{{$interior_value->id or ''}}}" >
                                                @endif
                                               @else
                                                 <input type="checkbox" name="interior[]" value="{{{$interior_value->id or ''}}}" >
                                               @endif
                                            </td>
                                            @endforeach
                                        </tr>
                                        </tbody>

                                    </table>
                                         <input type="submit" class="btn btn-primary" name="interiorsubmit" value="Save">
                                    <input type="hidden" name="variant_id"  value="{{$variant->first()->id}}" >



 {{Form::close()}}

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                    </div>
                        <!-- /.panel -->
                </div>
    <!-- /.col-lg-6 -->
</div>
<div class="modal fade" id="engineModal" tabindex="-1" role="dialog" aria-labelledby="engineModal" aria-hidden="true">
    {{Form::open(array( 'method' => 'post','name'=>'engine_form','id'=>'engine_form','url'=>'admin/addenginespecs'))}}
    <div class="modal-dialog">
        <div class="modal-content">

         <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <input type="hidden" name="variant_id" value="{{$variant->id}}">
                 @if(!$variant->engine()->first())
                 <h4 class="modal-title" id="myModalLabel">Add Engine specifications</h4>
                 @else
                 <h4 class="modal-title" id="myModalLabel">Edit Engine Specifcations</h4>
                  <input type="hidden" name="editengine_id" value="{{$variant->engine()->first()->id}}"
                 @endif
            </div>

            <div class="modal-body">
            <div class="form-group">
            <label>Torque</label>
                <input type="text" name="torque" id="torque" class="form-control" placeholder="Enter text" value="{{{$variant->engine()->first()->torque or ''}}}">
            </div>
             <div class="form-group">
             <label>Displacement</label>
                  <input type="text" name="displacement" id="displacement" class="form-control" placeholder="Enter text" value="{{{$variant->engine()->first()->displacement or ''}}}">
             </div>
             <div class="form-group">
             <label>Power</label>
                   <input type="text" name="power" id="power" class="form-control" placeholder="Enter text" value="{{{$variant->engine()->first()->power or ''}}}">
              </div>
              <div class="form-group">
              <label>Cylinders</label>
                   <input type="text" name="cylinders" id="cylinders" class="form-control" placeholder="Enter text" value="{{{$variant->engine()->first()->cylinders or ''}}}">
              </div>
              <div class="form-group">
              <label>Valves per cylinder</label>
                   <input type="text" name="valvespercylinder" id="valvespercylinder" class="form-control" placeholder="Enter text" value="{{{$variant->engine()->first()->valvespercylinder or ''}}}">
              </div>
              <div class="form-group">
              <label>Valve mechanism</label>
                    <input type="text" name="valvemechanism" id="valvemechanism" class="form-control" placeholder="Enter text" value="{{{$variant->engine()->first()->valvemechanism or ''}}}">
               </div>
               <div class="form-group">
               <label>Cylinder configuration</label>
                    <input type="text" name="cylinderconfiguration" id="cylinderconfiguration" class="form-control" placeholder="Enter text" value="{{{$variant->engine()->first()->cylinderconfiguration or ''}}}">
               </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input type="submit" name="engineformsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
                            <!-- /.modal-content -->
    </div>
    {{Form::close()}}
                        <!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade" id="dimensionModal" tabindex="-1" role="dialog" aria-labelledby="dimensionModal" aria-hidden="true">
    <div class="modal-dialog">
        {{Form::open(array( 'method' => 'post','name'=>'dimension_form','id'=>'dimension_form','url'=>'admin/adddimension'))}}

        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <input type="hidden" name="variant_id" value="{{$variant->id}}">
                 @if(!$variant->dimension()->first())
                 <h4 class="modal-title" id="myModalLabel">Add New Dimension&Weights</h4>
                 @else
                 <h4 class="modal-title" id="myModalLabel">Edit Dimension&Weights</h4>
                  <input type="hidden" name="editdimension_id" value="{{$variant->dimension()->first()->id}}"
                 @endif
            </div>

            <div class="modal-body">
            <div class="form-group">
            <label>Overall length</label>
                <input type="text" name="length" id="length" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->length or ''}}}">
            </div>
             <div class="form-group">
             <label>Overall Width</label>
                  <input type="text" name="width" id="width" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->width or ''}}}">
             </div>
             <div class="form-group">
             <label>Overall Width</label>
                   <input type="text" name="height" id="height" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->height or ''}}}">
              </div>
              <div class="form-group">
              <label>Wheel base</label>
                   <input type="text" name="wheelbase" id="wheelbase" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->wheelbase or ''}}}">
              </div>
              <div class="form-group">
              <label>Boot Space</label>
                   <input type="text" name="bootspace" id="bootspace" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->bootspace or ''}}}">
              </div>
              <div class="form-group">
              <label>Kerb weight</label>
                    <input type="text" name="kerbweight" id="kerbweight" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->kerbweight or ''}}}">
               </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input type="submit" name="dimensionformsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
                            <!-- /.modal-content -->
    </div>
    {{Form::close()}}
                        <!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade" id="fuelModal" tabindex="-1" role="dialog" aria-labelledby="fuelModal" aria-hidden="true">
    <div class="modal-dialog">
        {{Form::open(array( 'method' => 'post','name'=>'fuel_form','id'=>'fuel_form','url'=>'admin/addfuel'))}}

        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <input type="hidden" name="variant_id" value="{{$variant->id}}">
                 @if(!$variant->Fuelefficiency()->first())
                 <h4 class="modal-title" id="myModalLabel">Add fuel efficiency details</h4>
                 @else
                 <h4 class="modal-title" id="myModalLabel">Edit fuel efficiency details</h4>
                  <input type="hidden" name="editfuel_id" value="{{$variant->Fuelefficiency()->first()->id}}"
                 @endif
            </div>

            <div class="modal-body">
            <div class="form-group">
            <label>Mileage highway</label>
                <input type="text" name="mileage_highway" id="mileage_highway" class="form-control" placeholder="Enter text" value="{{{$variant->Fuelefficiency()->first()->mileage_highway or ''}}}">
            </div>
             <div class="form-group">
             <label>Mileage city</label>
                  <input type="text" name="mileage_city" id="mileage_city" class="form-control" placeholder="Enter text" value="{{{$variant->Fuelefficiency()->first()->mileage_city or ''}}}">
             </div>
              <div class="form-group">
             <label>Mileage Overall</label>
                  <input type="text" name="mileage_overall" id="mileage_overall" class="form-control" placeholder="Enter text" value="{{{$variant->Fuelefficiency()->first()->mileage_overall or ''}}}">
             </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input type="submit" name="dimensionformsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
                            <!-- /.modal-content -->
    </div>
    {{Form::close()}}
                        <!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade" id="wheelModal" tabindex="-1" role="dialog" aria-labelledby="wheelModal" aria-hidden="true">
    <div class="modal-dialog">
        {{Form::open(array( 'method' => 'post','name'=>'wheel_form','id'=>'wheel_form','url'=>'admin/addwheel'))}}

        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <input type="hidden" name="variant_id" value="{{$variant->id}}">
                 @if(!$variant->Wheel()->first())
                 <h4 class="modal-title" id="myModalLabel">Add wheels and tyres details</h4>
                 @else
                 <h4 class="modal-title" id="myModalLabel">Edit wheels and tyres details</h4>
                  <input type="hidden" name="editwheel_id" value="{{$variant->Wheel()->first()->id}}"
                 @endif
            </div>

            <div class="modal-body">
            <div class="form-group">
            <label>Tyres</label>
                <input type="text" name="tyres" id="tyres" class="form-control" placeholder="Enter text" value="{{{$variant->Wheel()->first()->tyres or ''}}}">
            </div>
             <div class="form-group">
             <label>Wheel size</label>
                  <input type="text" name="wheelsize" id="wheelsize" class="form-control" placeholder="Enter text" value="{{{$variant->Wheel()->first()->wheelsize or ''}}}">
             </div>
              <div class="form-group">
             <label>Wheel type</label>
                  <input type="text" name="wheeltype" id="wheeltype" class="form-control" placeholder="Enter text" value="{{{$variant->Wheel()->first()->wheeltype or ''}}}">
             </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input type="submit" name="wheelformsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
                            <!-- /.modal-content -->
    </div>
    {{Form::close()}}
                        <!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade" id="brakeModal" tabindex="-1" role="dialog" aria-labelledby="brakeModal" aria-hidden="true">
    <div class="modal-dialog">
        {{Form::open(array( 'method' => 'post','name'=>'brake_form','id'=>'brake_form','url'=>'admin/addbrake'))}}

        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <input type="hidden" name="variant_id" value="{{$variant->id}}">
                 @if(!$variant->Brake()->first())
                 <h4 class="modal-title" id="myModalLabel">Add brake details</h4>
                 @else
                 <h4 class="modal-title" id="myModalLabel">Edit brake details</h4>
                  <input type="hidden" name="editbrake_id" value="{{$variant->Brake()->first()->id}}"
                 @endif
            </div>

            <div class="modal-body">
            <div class="form-group">
            <label>Rear brakes</label>
                <input type="text" name="rear_brakes" id="rear_brakes" class="form-control" placeholder="Enter text" value="{{{$variant->Brake()->first()->rear_brakes or ''}}}">
            </div>
             <div class="form-group">
             <label>Front brakes</label>
                  <input type="text" name="front_brakes" id="front_brakes" class="form-control" placeholder="Enter text" value="{{{$variant->Brake()->first()->front_brakes or ''}}}">
             </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input type="submit" name="brakeformsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
                            <!-- /.modal-content -->
    </div>
    {{Form::close()}}
                        <!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade" id="capacityModal" tabindex="-1" role="dialog" aria-labelledby="capacityModal" aria-hidden="true">
    <div class="modal-dialog">
        {{Form::open(array( 'method' => 'post','name'=>'capacity_form','id'=>'capacity_form','url'=>'admin/addcapacity'))}}

        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <input type="hidden" name="variant_id" value="{{$variant->id}}">
                 @if(!$variant->Capacity()->first())
                 <h4 class="modal-title" id="myModalLabel">Add capacity details</h4>
                 @else
                 <h4 class="modal-title" id="myModalLabel">Edit capacity details</h4>
                  <input type="hidden" name="editcapacity_id" value="{{$variant->Capacity()->first()->id}}"
                 @endif
            </div>

            <div class="modal-body">
            <div class="form-group">
            <label>Tank capacity</label>
                <input type="text" name="tank_capacity" id="tank_capacity" class="form-control" placeholder="Enter text" value="{{{$variant->Capacity()->first()->tank_capacity or ''}}}">
            </div>
             <div class="form-group">
             <label>Seating capacity</label>
                  <input type="text" name="seating_capacity" id="seating_capacity" class="form-control" placeholder="Enter text" value="{{{$variant->Capacity()->first()->seating_capacity or ''}}}">
             </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input type="submit" name="capacityformsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
                            <!-- /.modal-content -->
    </div>
    {{Form::close()}}
                        <!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade" id="steeringModal" tabindex="-1" role="dialog" aria-labelledby="steeringModal" aria-hidden="true">
    <div class="modal-dialog">
        {{Form::open(array( 'method' => 'post','name'=>'steering_form','id'=>'steering_form','url'=>'admin/addsteering'))}}

        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <input type="hidden" name="variant_id" value="{{$variant->id}}">
                 @if(!$variant->Steering()->first())
                 <h4 class="modal-title" id="myModalLabel">Add steering details</h4>
                 @else
                 <h4 class="modal-title" id="myModalLabel">Edit steering details</h4>
                  <input type="hidden" name="editsteering_id" value="{{$variant->Steering()->first()->id}}"
                 @endif
            </div>

            <div class="modal-body">
            <div class="form-group">
            <label>Turning radius</label>
                <input type="text" name="turning_radius" id="turning_radius" class="form-control" placeholder="Enter text" value="{{{$variant->Steering()->first()->turning_radius or ''}}}">
            </div>
             <div class="form-group">
             <label>Steering Type</label>
                  <input type="text" name="steering_type" id="steering_type" class="form-control" placeholder="Enter text" value="{{{$variant->Steering()->first()->steering_type or ''}}}">
             </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input type="submit" name="steeringformsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
                            <!-- /.modal-content -->
    </div>
    {{Form::close()}}
                        <!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="priceModal" aria-hidden="true">
    <div class="modal-dialog">
        {{Form::open(array( 'method' => 'post','name'=>'price_form','id'=>'price_form','url'=>'admin/addprice'))}}

        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <input type="hidden" name="variant_id" value="{{$variant->id}}">
                 @if(!$variant->Price()->first())
                 <h4 class="modal-title" id="myModalLabel">Add steering details</h4>
                 @else
                 <h4 class="modal-title" id="myModalLabel">Edit steering details</h4>
                  <input type="hidden" name="editprice_id" value="{{$variant->Price()->first()->id}}"
                 @endif
            </div>

            <div class="modal-body">
            <div class="form-group">
            <label>Showroom price</label>
                <input type="text" name="showroomprice" id="showroomprice" class="form-control" placeholder="Enter text" value="{{{$variant->Price()->first()->showroomprice or ''}}}">
            </div>
             <div class="form-group">
             <label>Onroad price</label>
                  <input type="text" name="onroadprice" id="onroadprice" class="form-control" placeholder="Enter text" value="{{{$variant->Price()->first()->onroadprice or ''}}}">
             </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input type="submit" name="pricesformsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
                            <!-- /.modal-content -->
    </div>
    {{Form::close()}}
                        <!-- /.modal-dialog -->
    </div>
</div>
@stop
