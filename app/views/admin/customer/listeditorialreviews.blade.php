@extends('admin.layout.master')
@section('content')
<div class="row">
    <?php echo $reviews->links(); ?>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Customer Reviews
            </div>
            <!-- /.panel-heading -->

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        @if($reviews)
                        <thead>
                        <tr>
                            <th>Review variant</th>
                            <th>Review</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($reviews as $reviews_key=>$reviews_value)
                        <tr class="odd gradeX">
                            <td>{{{$reviews_value->variant()->first()->name or ''}}}</td>
                            <td>{{str_limit($reviews_value->review,$limit = 20, $end = '...') }}</td>
                            <td>



                                <button id="delete_{{$reviews_value->id}}"
                                        class="manipulatereviewdetails btn btn-warning btn-circle" type="button"><i
                                        class="fa fa-times"></i></button>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>
                        @else
                        <div class="alert alert-danger">
                            No review exists
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
    <div id="editreview_display"></div>
</div>
@stop

@section('script')
<script type="text/javascript">

    $('.manipulatereviewdetails').click(function () {
        var composite_id = this.id;
        var composite_arr = composite_id.split('_');
        var action_type = composite_arr[0];
        var review_id = composite_arr[1];

            if (confirm('Are you sure to delete the review')) {
                $.ajax({
                    url: '{{URL::to('/')}}/admin/deleteeditorialreview',
                    type: 'POST',
                    data: {review_id: review_id},
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