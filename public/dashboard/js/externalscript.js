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


});

