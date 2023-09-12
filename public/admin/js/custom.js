//Check Admin Password
$(document).ready(function () {
    // Check current admin password is correct or not
    $("#current_pwd").keyup(function () {
        var currentpwd = $("#current_pwd").val();
        var link = "../admin/check-current-password";
        //alert(current_pwd);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: link,
            data: {
                current_pwd: currentpwd,
            },
            success: function (resp) {
                if (resp == "true") {
                    $("#verifyCurrentPwd").html(
                        "Current Password is Correct!!"
                    );
                } else if (resp == "false") {
                    $("#verifyCurrentPwd").html(
                        "Current Password is Incorrect!!"
                    );
                }
            },

            error: function () {
                alert("Error");
            },
        });
    });

    //Update CMS Page Status (cms-pages.blade.php) - Option 1
    // $(document).on("click",".updateSmsPageStatus", function () {
    //     var status = $(this).children("i").attr("status");
    //     //"this" refer to <a href=""></a>.
    //     //"children" refer to <i class=""></i>
    //     //"status" refere t0 <i class="" status="Active"></i>
    //     alert(status);
    // });
    
});

//Update CMS Page Status (cms-pages.blade.php) - Option 2
$(".updateCmsPageStatus").click(function () {
    var status = $(this).children("i").attr("status");
    //alert(status);
    //"this" refer to <a href=""></a>. "children" refer to <i class=""></i>. attr "status" refer to <i class="" status="Active"></i>
    var page_id = $(this).attr("page_id");
    //"this" refer to <a href=""></a>. attr "page_id" refer to page_id in the link <a href="" page_id="{{$page->id}}">
    //alert(page_id);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "../admin/update-cms-page-status",
        data: {
            status: status,
            page_id: page_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#page-" + page_id).html(
                    "<i class='fas fa-toggle-off' status='Inactive' style='color:grey'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#page-" + page_id).html(
                    "<i class='fas fa-toggle-on' status='Active' style='color:#007bff'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

//Update Category Status (categories.blade.php) 
$(".updateCategoryStatus").click(function () {
    var status = $(this).children("i").attr("status");
    //alert(status);
    //"this" refer to <a href=""></a>. "children" refer to <i class=""></i>. attr "status" refer to <i class="" status="Active"></i>
    var category_id = $(this).attr("category_id");
    //"this" refer to <a href=""></a>. attr "category_id" refer to category_id in the link <a href="" category_id="{{$page->id}}">
    //alert(category_id);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "../admin/update-category-status",
        data: {
            status: status,
            category_id: category_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#category-" + category_id).html(
                    "<i class='fas fa-toggle-off' status='Inactive' style='color:grey'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#category-" + category_id).html(
                    "<i class='fas fa-toggle-on' status='Active' style='color:#007bff'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

//Update Brand Status (brands.blade.php) 
$(".updateBrandStatus").click(function () {
    var status = $(this).children("i").attr("status");
    //alert(status);
    //"this" refer to <a href=""></a>. "children" refer to <i class=""></i>. attr "status" refer to <i class="" status="Active"></i>
    var brand_id = $(this).attr("brand_id");
    //"this" refer to <a href=""></a>. attr "brand_id" refer to brand_id in the link <a href="" brand_id="{{$page->id}}">
    //alert(brand_id);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "../admin/update-brand-status",
        data: {
            status: status,
            brand_id: brand_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#brand-" + brand_id).html(
                    "<i class='fas fa-toggle-off' status='Inactive' style='color:grey'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#brand-" + brand_id).html(
                    "<i class='fas fa-toggle-on' status='Active' style='color:#007bff'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

//Update Product Status (products.blade.php) 
$(".updateProductStatus").click(function () {
    var status = $(this).children("i").attr("status");
    //alert(status);
    //"this" refer to <a href=""></a>. "children" refer to <i class=""></i>. attr "status" refer to <i class="" status="Active"></i>
    var product_id = $(this).attr("product_id");
    //"this" refer to <a href=""></a>. attr "product_id" refer to product_id in the link <a href="" product_id="{{$page->id}}">
    //alert(product_id);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "../admin/update-product-status",
        data: {
            status: status,
            product_id: product_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#product-" + product_id).html(
                    "<i class='fas fa-toggle-off' status='Inactive' style='color:grey'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#product-" + product_id).html(
                    "<i class='fas fa-toggle-on' status='Active' style='color:#007bff'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

//Update Banner Status (banners.blade.php) 
$(".updateBannerStatus").click(function () {
    var status = $(this).children("i").attr("status");
    //alert(status);
    //"this" refer to <a href=""></a>. "children" refer to <i class=""></i>. attr "status" refer to <i class="" status="Active"></i>
    var banner_id = $(this).attr("banner_id");
    //"this" refer to <a href=""></a>. attr "banner_id" refer to banner_id in the link <a href="" banner_id="{{$bnr->id}}">
    //alert(banner_id);   
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "../admin/update-banner-status",
        data: {
            status: status,
            banner_id: banner_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#banner-" + banner_id).html(
                    "<i class='fas fa-toggle-off' status='Inactive' style='color:grey'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#banner-" + banner_id).html(
                    "<i class='fas fa-toggle-on' status='Active' style='color:#007bff'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

//Update Attribute Status (add_edit_product.blade.php) 
$(".updateAttributeStatus").click(function () {
    var status = $(this).children("i").attr("status");
    //alert(status);
    //"this" refer to <a href=""></a>. "children" refer to <i class=""></i>. attr "status" refer to <i class="" status="Active"></i>
    var attribute_id = $(this).attr("attribute_id");
    //"this" refer to <a href=""></a>. attr "attribute_id" refer to attribute_id in the link <a href="" attribute_id="{{$page->id}}">
    //alert(attribute_id);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "../update-attribute-status",
        data: {
            status: status,
            attribute_id: attribute_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#attribute-" + attribute_id).html(
                    "<i class='fas fa-toggle-off' status='Inactive' style='color:grey'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#attribute-" + attribute_id).html(
                    "<i class='fas fa-toggle-on' status='Active' style='color:#f9f9f9'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

//Update Subadmin Status (subadmins.blade.php)
$(".updateSubadminStatus").click(function () {
    var status = $(this).children("i").attr("status");
    //alert(status);
    //"this" refer to <a href=""></a>. "children" refer to <i class=""></i>. attr "status" refer to <i class="" status="Active"></i>
    var subadmin_id = $(this).attr("subadmin_id");
    //"this" refer to <a href=""></a>. attr "subadmin_id" refer to subadmin_id in the link <a href="" subadmin_id="{{$page->id}}">
    //alert(subadmin_id);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "../admin/update-subadmin-status",
        data: {
            status: status,
            subadmin_id: subadmin_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#subadmin-" + subadmin_id).html(
                    "<i class='fas fa-toggle-off' status='Inactive' style='color:grey'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#subadmin-" + subadmin_id).html(
                    "<i class='fas fa-toggle-on' status='Active' style='color:#007bff'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

/*//Option 1 (alert biasa saja)- Confirm the deletion of CMS Page (cms_pages.blade.php)
$(".confirmDelete").click(function () {
    //alert("test");  return false;
    var name = $(this).attr('name');
    if (confirm('Are sure to delete this ' + name + '?')) {
        return true;
    }
    return false;
}); */

//Option 2 (SweetAlert2)- Confirm the deletion of CMS Page (cms_pages.blade.php)
// This SweetAlert2 can be used on all of delete method with pre-requisite route is "delete-xx-yy"
$(".confirmDelete").click(function () {
    var record = $(this).attr("record");
    var recordid = $(this).attr("recordid");
    var name = $(this).attr("name");
    Swal.fire({
        title: "Are you sure?",
        text: "Delete this "+ name + "?",
        //text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            window.location.href = "../admin/delete-" + record + "/" + recordid;            //route must be delete-xx-yy
        }
    });
});

$(".confirmDeleteAttribute").click(function () {
    var record = $(this).attr("record");
    var recordid = $(this).attr("recordid");
    var name = $(this).attr("name");
    Swal.fire({
        title: "Are you sure?",
        text: "Delete this " + name + "?",
        //text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            window.location.href = "../delete-" + record + "/" + recordid; //route must be delete-xx-yy
        }
    });
});

$(".confirmDeleteImage").click(function () {
    var record = $(this).attr("record");
    var recordid = $(this).attr("recordid");
    var name = $(this).attr("name");
    Swal.fire({
        title: "Are you sure?",
        text: "Delete this " + name + "?",
        //text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            window.location.href = "../delete-" + record + "/" + recordid; //route must be delete-xx-yy
            //window.location.href = "admin/delete-" + record + "/" + recordid; //route must be delete-xx-yy
            //window.location.href = "../admin/delete-" + record + "/" + recordid; //route must be delete-xx-yy
        }
    });
});

$(".confirmDeleteVideo").click(function () {
    var record = $(this).attr("record");
    var recordid = $(this).attr("recordid");
    var name = $(this).attr("name");
    Swal.fire({
        title: "Are you sure?",
        text: "Delete this " + name + "?",
        //text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            window.location.href = "../delete-" + record + "/" + recordid; //route must be delete-xx-yy
            //window.location.href = "admin/delete-" + record + "/" + recordid; //route must be delete-xx-yy
            //window.location.href = "../admin/delete-" + record + "/" + recordid; //route must be delete-xx-yy
        }
    });
});

//Add Product Attribute Script
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML =
        "<div>" +
        '<input type="text" name="size[]" placeholder="Size" style="width: 120px">&nbsp;' +
        '<input type="text" name="sku[]" placeholder="SKU" style="width: 120px">&nbsp;' +
        '<input type="text" name="price[]" placeholder="Price" style="width: 120px">&nbsp;' +
        '<input type="text" name="stock[]" placeholder="Stock" style="width: 120px">&nbsp;&nbsp;' +
        '<a href="javascript:void(0);" class="remove_button">&nbsp;&nbsp;<i class="fas fa-times-circle" style="color:red"></i></a>' +
        "</div>"; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});