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
            }, 
            
            error:function() {
                alert("Error");
            }
        });        
    });

    // Add to Cart JQuery function
    $('#addToCart').submit(function () { 
        // alert("Haha");
        var formData = $(this).serialize();
        $.ajax({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            type: "post",
            url: "../add-to-cart",
            data: formData,
            success: function (resp) {
                //alert(resp['status]);
                $(".totalCartItems").html(resp['totalCartItems']);
                if (resp['status'] == true) {
                    $('.print-success-msg').show();
                    $('.print-success-msg').delay(3000).fadeOut('slow');
                    $('.print-success-msg').html(                                            
                        "<div class='success'>" + 
                            "<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>" + 
                            resp['message'] + 
                        "</div>"
                    );                    
                } else {
                    $('.print-error-msg').show();
                    $('.print-error-msg').delay(3000).fadeOut('slow');
                    $('.print-error-msg').html(                                            
                        "<div class='alert'>" + 
                            "<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>" + 
                            resp['message'] + 
                        "</div>"
                    );
                }
            }, 
            
            error:function(){
                alert("Error");
            }
        });        
    });

    // Update Cart Items Quantity
    $(document).on('click','.updateCartItem', function(){
        if ($(this).hasClass('fa-plus')) {
            // Get qty
            var quantity = $(this).data('qty');
            
            // Increase the Qty by 1
            new_qty = parseInt(quantity) + 1;
        } 

        if ($(this).hasClass('fa-minus')) {
            // Get qty
            var quantity = $(this).data('qty');
            
            // Check Qty at least 1 
            if (quantity <= 1) {
                alert("Item Quantity Must Be 1 Or Greater!");
                return false;
            }

            // Decrease the Qty by 1
            new_qty = parseInt(quantity) - 1;
        }

        var cartid = $(this).data('cartid');

        $.ajax({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            type: 'post',
            url: 'update-cart-item-qty',
            data: {
                cartid:cartid,
                qty:new_qty,
            },
            success: function (resp) {
                //alert(resp);
                $(".totalCartItems").html(resp.totalCartItems);
                if (resp.status == false) {
                    alert(resp.message);    
                }
                $("#appendCartItems").html(resp.view);
            }, 
            
            error:function () {  
                alert("Error");
            }
        });
    });

    // Delete Cart Item
    $(document).on('click','.deleteCartItem', function(){

        var cartid = $(this).data('cartid');
        var notify = confirm("Are you sure to remove this Cart Item?");

        if (notify) {
            $.ajax({
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                type: 'post',
                url: 'delete-cart-item',
                data: {
                    cartid:cartid,                
                },
    
                success: function (resp) {
                    //alert(resp);
                    $(".totalCartItems").html(resp.totalCartItems);                
                    $("#appendCartItems").html(resp.view);
                }, 
    
                error:function () {  
                    alert("Error");
                }
            });            
        }
    });
});