@extends('admin.layout.master')
@section('content')
<?php echo $enquiryDetails->links(); ?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Enquiry Details
            {{--
            <button id="edit_nothing" class="manipulateenquirydetails btn btn-primary btn-lg "
                    data-target="#enquiryModal" data-toggle="modal"> Add new enquiry
            </button>
            --}}
        </div>
        <!-- /.panel-heading -->

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    @if(count($enquiryDetails)>0)
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Mobile number</th>
                        <th>Enquiry</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($enquiryDetails as $enquiryDetails_key=>$enquiryDetails_value)
                    <tr class="odd gradeX">
                        <td>{{{$enquiryDetails_value->enquiryType()->first()->type or ''}}}</td>
                        <td>{{{$enquiryDetails_value->customer()->first()->first_name or ''}}}&nbsp;{{{$enquiryDetails_value->customer()->first()->last_name
                            or ''}}}
                        </td>
                        <td>{{{$enquiryDetails_value->customer()->first()->email or ''}}}</td>
                        <td>{{{$enquiryDetails_value->customer()->first()->mobilenumber or ''}}}</td>
                        <td>{{{$enquiryDetails_value->enquiry or ''}}}</td>
                        <td>
                            {{--
                            <button id="edit_{{$enquiryDetails_value->id}}"
                                    class="manipulateenquirydetails btn btn-primary btn-circle" type="button"
                                    data-target="#enquiryModal" data-toggle="modal"><i class="fa fa-list"></i></button>
                            --}}
                            <button id="delete_{{$enquiryDetails_value->id}}"
                                    class="manipulateenquirydetails btn btn-warning btn-circle" type="button"><i
                                    class="fa fa-times"></i></button>
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                    @else
                    <div class="alert alert-danger">
                        No enquiry exists
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
<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModal" aria-hidden="true">
    <div id="editdealer_display">{{--Edit/Add dealer modal window is shown here--}}</div>
</div>
@stop
@section('script')
<script type="text/javascript">


    $('.manipulateenquirydetails').click(function () {
        var composite_id = this.id;
        var composite_arr = composite_id.split('_');
        var action_type = composite_arr[0];
        var enquiry_id = composite_arr[1];
        if (confirm('Are you sure to delete the enquiry')) {
            $.ajax({
                url: '{{URL::to(' / ')}}/admin/deleteenquiry',
                type: 'POST',
                data: {enquiry_id: enquiry_id},
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

    });


</script>
@stop