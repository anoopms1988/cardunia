$(document).ready(function(){
    $('.showvariant').click(function(){
        var composite_id=this.id;
        var composite_arr=composite_id.split('_');
        var carId=composite_arr[1];
        window.location.href="/admin/variants/"+carId;
    });

    $('.deletecar').click(function(){
        var composite_id=this.id;
        var composite_arr=composite_id.split('_');
        var carId=composite_arr[1];
        window.location.href="/admin/deletecar/"+carId;
    });

    $('.deletevariant').click(function(){
        var composite_id=this.id;
        var composite_arr=composite_id.split('_');
        var variantId=composite_arr[1];
        window.location.href="/admin/deletevariant/"+variantId;
    });

    $('.variantdetails').click(function(){
        var composite_id=this.id;
        var composite_arr=composite_id.split('_');
        var variantId=composite_arr[1];
        window.location.href="/admin/specificvariant/"+variantId;
    });


    $('.manipulatealerdetails').click(function(){
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
                    //alert("error");
                }
            });
        }else if(action_type=='delete'){

        }
    });


});

