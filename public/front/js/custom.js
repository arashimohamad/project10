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
        $(".loader").show(); 
        var formData = $(this).serialize();
        $.ajax({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            type: "post",
            url: "../add-to-cart",
            data: formData,
            success: function (resp) {
                //alert(resp['status]);
                $(".loader").hide(); 
                $(".totalCartItems").html(resp['totalCartItems']);
                $("#appendCartItems").html(resp.view);
                $("#appendMiniCartItems").html(resp.minicartview);
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
                $(".loader").hide(); 
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
                $("#appendMiniCartItems").html(resp.minicartview);
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
                    $("#appendMiniCartItems").html(resp.minicartview);
                }, 
    
                error:function () {  
                    alert("Error");
                }
            });            
        }
    });

    // Empty Cart
    $(document).on('click', '.emptyCart', function(){        
        
        var notify = confirm("Are you sure to empty your cart?");

        if (notify) {
            $.ajax({
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                type: 'post',
                url: 'empty-cart',    
                success: function (resp) {
                    //alert(resp);
                    $(".totalCartItems").html(resp.totalCartItems);                
                    $("#appendCartItems").html(resp.view);
                    $("#appendMiniCartItems").html(resp.minicartview);
                }, 
    
                error:function () {  
                    alert("Error");
                }
            });            
        }
    });

    //User Register Form Validation
    $("#registerForm").submit(function () { 
        $(".loader").show();       
        var formData = $("#registerForm").serialize();                          // serialize use to take all data from form
        /*alert(formData); return false;*/                                      // return false use to pause for view the output
        $.ajax({
            type: 'post',
            url: '../user/register',
            data: formData,
            success: function (data) {
                //alert(resp);
                if (data.type == "validation") {
                    $(".loader").hide();       
                    $.each(data.errors, function (i, error) {                   // .each is same like loop
                        $('#register-'+i).attr('style', 'color:red');
                        $('#register-'+i).html(error);
                        setTimeout(function(){
                            $('#register-'+i).css({
                                'display':'none',
                            })
                        }, 6000)
                    });
                } else if(data.type == "success") {
                    $(".loader").hide();       
                    $('#register-success').attr('style', 'color:green');
                    $('#register-success').html(data.message);
                    //window.location.href=data.redirectUrl;                    // redirect to cart
                }
            },
            error: function (resp) {
                alert("Error");
            }
        });
    });

    // Login form validation
    $("#loginForm").submit(function () { 
        var formData = $(this).serialize();
        $.ajax({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            type: 'post',
            url: '../user/login',
            data: formData,
            success: function (resp) {
                //alert(resp);
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {                   //.each is same like loop
                        $('.login-'+i).attr('style', 'color:red');
                        $('.login-'+i).html(error);
                        setTimeout(function(){
                            $('.login-'+i).css({
                                'display':'none',
                            })
                        }, 6000)
                    });
                } else if (resp.type == "inactive") { 
                    //alert(resp.message);                  
                    $("#login-error").attr('style', 'color:red');
                    $("#login-error").html(resp.message);    
                } else if (resp.type == "incorrect") { 
                    //alert(resp.message);                  
                    $("#login-error").attr('style', 'color:red');
                    $("#login-error").html(resp.message);    
                } else if (resp.type == "success") {
                    window.location.href=resp.redirectUrl;                      // redirect to cart
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // forgot form validation
    $("#forgotForm").submit(function () { 
        $(".loader").show(); 
        var formData = $(this).serialize();
        $.ajax({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            type: 'post',
            url: '../user/forgot-password',
            data: formData,
            success: function (resp) {
                //alert(resp);
                $(".loader").hide(); 
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {                   //.each is same like loop
                        $('.forgot-'+i).attr('style', 'color:red');
                        $('.forgot-'+i).html(error);
                        setTimeout(function(){
                            $('.forgot-'+i).css({
                                'display':'none',
                            })
                        }, 6000)
                    });
                } else if (resp.type == "success") {
                    $(".loader").hide(); 
                    $(".forgot-success").attr('style', 'color:green');
                    $(".forgot-success").html(resp.message);
                    //window.location.href=data.redirectUrl;                    // redirect to cart
                }
            },
            error: function() {
                $(".loader").hide(); 
                alert("Error");
            }
        });
    });

    // reset password form validation
    $("#resetPwdForm").submit(function () { 
        $(".loader").show(); 
        var formData = $(this).serialize();
        $.ajax({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            type: 'post',
            url: '../reset-password',                                           // link is not stable
            data: formData,
            success: function (resp) {
                //alert(resp);
                $(".loader").hide(); 
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {                   //.each is same like loop
                        $('.reset-'+i).attr('style', 'color:red');
                        $('.reset-'+i).html(error);
                        setTimeout(function(){
                            $('.reset-'+i).css({
                                'display':'none',
                            })
                        }, 6000)
                    });
                } else if (resp.type == "success") {                    
                    $(".reset-success").attr('style', 'color:green');
                    $(".reset-success").html(resp.message);
                    //window.location.href=data.redirectUrl;                    // redirect to cart
                }
            },
            error: function() {
                $(".loader").hide(); 
                alert("Error");
            }
        });
    });

    // Account Form Validation
    $("#account-success").hide();  
    $("#accountForm").submit(function () { 
        $(".loader").show();       
        var formData = $(this).serialize();                                     // serialize use to take all data from form
        /*alert(formData); return false;*/                                      // return false use to pause for view the output
        $.ajax({
            type: 'post',
            url: '../user/account',
            data: formData,
            success: function (data) {
                //alert(resp);
                if (data.type == "validation") {
                    $(".loader").hide();       
                    $.each(data.errors, function (i, error) {                   // .each is same like loop
                        $('#account-'+i).attr('style', 'color:red');
                        $('#account-'+i).html(error);
                        setTimeout(function(){
                            $('#account-'+i).css({
                                'display':'none',
                            })
                        }, 6000)
                    });
                } else if(data.type == "success") {
                    $(".loader").hide();       
                    $('#account-success').attr('style', 'color:green');
                    $('#account-success').html(data.message);
                    //window.location.href=data.redirectUrl;                    // redirect to cart
                }
            },
            error: function (resp) {
                alert("Error");
            }
        });
    });
});