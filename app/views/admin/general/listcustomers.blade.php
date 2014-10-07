@extends('admin.layout.master')
@section('content')
<div class="row">
<?php echo $Customers->links(); ?>
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
    Customer Details
</div>
<!-- /.panel-heading -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
@if($Customers)
<thead>
<tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Email</th>
    <th>City</th>
    <th>Mobile number</th>

    <th>Action</th>
</tr>
</thead>

<tbody>
@foreach($Customers as $Customers_key=>$Customers_value)
<tr class="odd gradeX">
    <td>{{{$Customers_value->first_name or ''}}}</td>
    <td>{{{$Customers_value->last_name or ''}}}</td>
    <td>{{{$Customers_value->email or ''}}}</td>
    <td>{{{$Customers_value->city()->first()->name or ''}}}</td>
    <td>{{{$Customers_value->mobilenumber or ''}}}</td>
    <td>
        <button id="edit_{{$Customers_value->id}}" class="manipulatecustomerdetails btn btn-primary btn-circle" type="button" data-target="#customerModal" data-toggle="modal"><i class="fa fa-list"></i></button>
        <button id="delete_{{$Customers_value->id}}" class="manipulatecustomerdetails btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i></button>
    </td>
</tr>

@endforeach

</tbody>
@else
<div class="alert alert-danger">
      No dealer exists
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
<div class="modal fade" id="dealerModal" tabindex="-1" role="dialog" aria-labelledby="dealerModal" aria-hidden="true">
     <div id="editdealer_display">{{--Edit/Add dealer modal window is shown here--}}</div>
</div>
@stop
@stop