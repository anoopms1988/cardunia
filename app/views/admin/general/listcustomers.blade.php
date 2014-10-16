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
                                <button id="edit_{{$Customers_value->id}}"
                                        class="manipulatecustomerdetails btn btn-primary btn-circle" type="button"
                                        data-target="#customerModal" data-toggle="modal"><i class="fa fa-list"></i>
                                </button>
                                <button id="delete_{{$Customers_value->id}}"
                                        class="manipulatecustomerdetails btn btn-warning btn-circle" type="button"><i
                                        class="fa fa-times"></i></button>
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
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModal"
     aria-hidden="true">
    <div id="editcustomer_display"></div>
</div>
@stop
@section('script')
<script type="text/javascript">


    $('.manipulatecustomerdetails').click(function () {
        var composite_id = this.id;
        var composite_arr = composite_id.split('_');
        var action_type = composite_arr[0];
        var customer_id = composite_arr[1];
        if (action_type == 'edit') {

            $.ajax({
                url: '{{URL::to(' / ')}}/admin/editcustomerpopup',
                type: 'POST',
                data: {customer_id: customer_id},
                success: function (response) {

                    $('#editcustomer_display').html(response);
                },
                error: function () {
                    alert("error");
                }
            });
        } else if (action_type == 'delete') {
            if (confirm('Are you sure to delete the customer')) {
                $.ajax({
                    url: '{{URL::to(' / ')}}/admin/deletecustomer',
                    type: 'POST',
                    data: {customer_id: customer_id},
                    success: function (response) {
                        if (response.msg == 'success') {
                            setTimeout(function () {
                                location.reload(true)
                            }, 3000);
                        }
                    },
                    error: function () {
                        alert("error");
                    }
                });
            }
        }
    });


</script>
@stop