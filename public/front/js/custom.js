// Products Sorting on listing blade with refresh of page
$(document).ready(function () {
    $("#sort").on('change', function () {
        this.form.submit();
    })
});