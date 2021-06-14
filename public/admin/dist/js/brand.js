$('#btn-add').filemanager('image');
$('#btn-edit').filemanager('image');

//function get BrandById
function getBrandById(id) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "get",
        url: "/shopwatch.com/admin/brand/edit-brand/" + id,
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        data: {
            brand_id: id,
        },
        success: function(data) {
            var content_select_value_show = "";
            var content_select_value_hidden = "";
            content_select_value_show +=
                "<option value='1' selected>Hiện</option><option value='0'>Ẩn</option>";
            content_select_value_hidden +=
                "<option value='1'>Hiện</option><option value='0' selected>Ẩn</option>";
            $('#brand_name_edit').val(data.name);
            $('.brand_image_edit').val(data.image);
            if (data.status == 1) {
                $('#brand_status_edit').html(content_select_value_show);
            } else {
                $('#brand_status_edit').html(content_select_value_hidden);
            }
            $('#img_edit').prop('src', data.image);
            $('#edit_form').prop('action', "/shopwatch.com/admin/brand/update-brand/" + data.id);

        },
    });
}