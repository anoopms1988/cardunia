@extends('admin.layout.master')
@section('content')
<div class="row">
    <?php echo $loanEnquiryDetails->links(); ?>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Insurance Enquiry Details
            </div>
            <!-- /.panel-heading -->

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        @if($loanEnquiryDetails)
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Cartype</th>
                            <th>Variant</th>
                            <th>City</th>
                            <th>Mobile number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($loanEnquiryDetails as
                        $loanEnquiryDetails_key=>$loanEnquiryDetails_value)
                        <tr class="odd gradeX">
                            <td>{{{$loanEnquiryDetails_value->first_name or ''}}}&nbsp;{{{$loanEnquiryDetails_value->last_name or ''}}}</td>
                            <td>{{{$loanEnquiryDetails_value->carType()->first()->type or ''}}}</td>
                            <td>{{{$loanEnquiryDetails_value->variant()->first()->name or ''}}}</td>
                            <td>{{{$loanEnquiryDetails_value->city()->first()->name or ''}}}</td>
                            <td>{{{$loanEnquiryDetails_value->mobile or ''}}}</td>
                            <td>{{{$loanEnquiryDetails_value->email or ''}}}</td>

                            <td>

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
@stop
@section('script')
@stop