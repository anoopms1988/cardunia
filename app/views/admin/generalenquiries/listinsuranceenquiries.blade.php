@extends('admin.layout.master')
@section('content')
<div class="row">
    <?php echo $insuranceEnquiryDetails->links(); ?>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Insurance Enquiry Details
            </div>
            <!-- /.panel-heading -->

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        @if($insuranceEnquiryDetails)
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Cartype</th>
                            <th>Variant</th>
                            <th>City</th>
                            <th>Mobile number</th>
                            <th>Email</th>
                            <th>Purchase month</th>
                            <th>Purchase year</th>
                            <th>Registration number</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($insuranceEnquiryDetails as
                        $insuranceEnquiryDetails_key=>$insuranceEnquiryDetails_value)
                        <tr class="odd gradeX">
                            <td>{{{$insuranceEnquiryDetails_value->name or ''}}}</td>
                            <td>{{{$insuranceEnquiryDetails_value->carType()->first()->type or ''}}}</td>
                            <td>{{{$insuranceEnquiryDetails_value->variant()->first()->name or ''}}}</td>
                            <td>{{{$insuranceEnquiryDetails_value->city()->first()->name or ''}}}</td>
                            <td>{{{$insuranceEnquiryDetails_value->mobilenumber or ''}}}</td>
                            <td>{{{$insuranceEnquiryDetails_value->email or ''}}}</td>
                            <td>{{{$insuranceEnquiryDetails_value->purchase_month or ''}}}</td>
                            <td>{{{$insuranceEnquiryDetails_value->purchase_year or ''}}}</td>
                            <td>{{{$insuranceEnquiryDetails_value->registrationnumber or ''}}}</td>
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