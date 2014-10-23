@extends('site.layout.master')

@section('content')
<div class="header-bottom">
    <div class="wrap">
        <div class="main-box">
            <div class="filter-wrapper ">

            </div>

            <div class="gallery-grids">

                <div class="gallery-grid specificvariant" id="">
                    <a href="images/t-pic21.jpg"><img src="{{URL::to(trim('/'))}}"  height="250" width="250" alt=""></a>
                    <h4>{{{$specificVariant->name or ''}}}</h4>
                    <p></p>
                    <h4>Braking system</h4>
                    <table  border="1">
                        <tr>
                            <th>Rear brakes</th>
                            <th>Front brakes</th>
                        </tr>
                        <tr>
                            <td>{{{$specificVariant->brake()->first()->rear_brakes or ''}}}</td>
                            <td>{{{$specificVariant->brake()->first()->front_brakes or ''}}}</td>
                        </tr>
                    </table>
                    <h4>Capacity</h4>
                    <table  border="1">
                        <tr>
                            <th>Tank capacity</th>
                            <th>Seating capacity</th>
                        </tr>
                        <tr>
                            <td>{{{$specificVariant->capacity()->first()->tank_capacity or ''}}}</td>
                            <td>{{{$specificVariant->capacity()->first()->seating_capacity or ''}}}</td>
                        </tr>
                    </table>
                    <h4>Fuel efficiency</h4>
                    <table  border="1">
                        <tr>
                            <th>Mileage highway</th>
                            <th>Mileage city</th>
                            <th>Mileage overall</th>
                        </tr>
                        <tr>
                            <td>{{{$specificVariant->fuelEfficiency()->first()->mileage_highway or ''}}}</td>
                            <td>{{{$specificVariant->fuelEfficiency()->first()->mileage_city or ''}}}</td>
                            <td>{{{$specificVariant->fuelEfficiency()->first()->mileage_overall or ''}}}</td>
                        </tr>
                    </table>
                    <h4>Engine configuration</h4>
                    <table  border="1">
                        <tr>
                            <th>Torque</th>
                            <th>Displacement</th>
                            <th>Power</th>
                            <th>Cylinders</th>
                            <th>Valvepercylinder</th>
                            <th>Valvemechanism</th>
                            <th>Cylinderconfiguration</th>
                        </tr>
                        <tr>
                            <td>{{{$specificVariant->engine()->first()->torque or ''}}}</td>
                            <td>{{{$specificVariant->engine()->first()->displacement or ''}}}</td>
                            <td>{{{$specificVariant->engine()->first()->power or ''}}}</td>
                            <td>{{{$specificVariant->engine()->first()->cylinders or ''}}}</td>
                            <td>{{{$specificVariant->engine()->first()->valvespercylinder or ''}}}</td>
                            <td>{{{$specificVariant->engine()->first()->valvemechanism or ''}}}</td>
                            <td>{{{$specificVariant->engine()->first()->cylinderconfiguration or ''}}}</td>
                        </tr>
                    </table>
                    <h4>Price</h4>
                    <table  border="1">
                        <tr>
                            <th>Showroom price</th>
                            <th>Onroad price</th>
                        </tr>
                        <tr>
                            <td>{{{$specificVariant->price()->first()->showroomprice or ''}}}</td>
                            <td>{{{$specificVariant->price()->first()->onroadprice or ''}}}</td>
                        </tr>
                    </table>
                    <h4>Wheel tyres</h4>
                    <table  border="1">
                        <tr>
                            <th>Tyres</th>
                            <th>Wheelsize</th>
                            <th>Wheel type</th>
                        </tr>
                        <tr>
                            <td>{{{$specificVariant->wheel()->first()->tyres or ''}}}</td>
                            <td>{{{$specificVariant->wheel()->first()->wheelsize or ''}}}</td>
                            <td>{{{$specificVariant->wheel()->first()->wheeltype or ''}}}</td>
                        </tr>
                    </table>

                </div>

                <div class="clear"> </div>
            </div>

        </div>
    </div>
</div>
@stop
@section('script')
<script>

</script>
@stop



