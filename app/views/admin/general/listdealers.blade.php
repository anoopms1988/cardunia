@extends('admin.layout.master')
@section('content')
<div class="row">
<?php echo $dealerDetails->links(); ?>
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
    Dealer Details
    <button class="btn btn-primary btn-lg " data-target="#addDealerModal" data-toggle="modal"> Add new dealer </button>
</div>
<!-- /.panel-heading -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
@if($dealerDetails)
<thead>
<tr>
    <th>Name</th>
    <th>Company</th>
    <th>City</th>
    <th>Address</th>
    <th>Phone number</th>
    <th>Mobile number</th>
</tr>
</thead>

<tbody>
@foreach($dealerDetails as $dealerDetails_key=>$dealerDetails_value)
<tr class="odd gradeX">
    <td>{{{$dealerDetails_value->name or ''}}}</td>
    <td>{{{$dealerDetails_value->company()->first()->name or ''}}}</td>
    <td>{{{$dealerDetails_value->city()->first()->name or ''}}}</td>
    <td>{{{$dealerDetails_value->address or ''}}}</td>
    <td>{{{$dealerDetails_value->phonenumber or ''}}}</td>
    <td>{{{$dealerDetails_value->mobilenumber or ''}}}</td>
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
@stop