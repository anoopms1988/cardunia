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
    <th>Action</th>
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
    <td>
        <button id="edit_{{$dealerDetails_value->id}}" class="manipulatedealerdetails btn btn-primary btn-circle" type="button" data-target="#dealerModal" data-toggle="modal"><i class="fa fa-list"></i></button>
        <button id="delete_{{$dealerDetails_value->id}}" class="manipulatedealerdetails btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i></button>
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
@section('script')
<script type="text/javascript">



   $('.manipulatedealerdetails').click(function(){
        var composite_id=this.id;
        var composite_arr=composite_id.split('_');
        var action_type=composite_arr[0];
        var dealer_id=composite_arr[1];
        if(action_type=='edit'){

            $.ajax({
                url: '{{URL::to('/')}}/admin/editdealerpopup',
                type: 'POST',
                data: {dealer_id:dealer_id},
                success: function (response) {

                    $('#editdealer_display').html(response);
                },
                error: function () {
                    alert("error");
                }
            });
        }else if(action_type=='delete'){

        }
    });
         $("#editdealer_form").validate({
                errorClass: "error",
                errorElement: "div",
                rules: {
                    name: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    company: {
                        required: true
                     },
                     address: {
                        required: true
                    },
                    phonenumber: {
                       required: true
                    },
                    mobilenumber: {
                      required: true
                    }
                },
                messages: {
                     name: {
                          required: "Field is required"
                   },
                   city: {
                          required:"Field is required"
                    },
                   company: {
                          required: "Field is required"
                   },
                   address: {
                          required: "Field is required"
                   },
                   phonenumber: {
                           required: "Field is required"
                   },
                    mobilenumber: {
                             required: "Field is required"
                   }
                },
                //perform an AJAX post to ajax.php
                submitHandler: function () {

                    $.ajax({
                        url: '{{URL::to('/')}}/admin/manipulatedealer',
                        type: 'POST',
                        data: $("#editdealer_form").serialize(),
                        success: function (response) {

                            if (response.msg == 'success') {

                                setTimeout(function(){location.reload(true)}, 3000);
                            }else if(response.msg == 'duplicate'){
                               // $("#duplicate_variant").show();
                            }
                        },
                        error: function () {
                            //alert("error");
                        }
                    });

                },
                highlight: function (element, errorClass) {
                    $(element).removeClass(errorClass);
                }
            });
</script>
@stop