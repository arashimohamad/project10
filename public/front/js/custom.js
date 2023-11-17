// Products Sorting on listing blade with refresh of page
$(document).ready(function () {
    /*$("#sort").on('change', function () {
        this.form.submit();
    }) */

    // Get Product Price based on Size
    $(".getPrice").change(function () { 
        var size = $(this).val();
        var product_id = $(this).attr('product-id'); 
        //alert(size);

        $.ajax({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            type: 'post',
            url: '../get-attribute-size',
            data: {size:size, product_id:product_id},
            success: function (resp) {
                // alert(resp);
                if (resp['discount'] > 0) {
                    $('.getAttributePrice').html("<span class='pd-detail__price'>RM"+resp['final_price']+"</span>"
                    +"<span class='pd-detail__discount'>("+resp['discount_percent']+"% OFF)</span>"+
                    "<del class='pd-detail__del'>RM"+resp['product_price']+"</del>");
                } else {
                    $('.getAttributePrice').html("<span class='pd-detail__price'>RM"+resp['final_price']+"</span>");
                }
            }, error:function() {
                alert("Error");
            }
        });
        
    });
});