function viewDetailImportGoods(id_import_goods) {
    $.ajax({
        type: "GET",
        url: "/shopwatch.com/admin/warehouse/import_goods/view_detail_import_goods/" + id_import_goods,
        dataType: "json",
        success: function(data) {
            var content = "";
            if (data.categories_id == 4 && data.status == 1) {
                content += "<tr><td style='font-weight: bold;'>Mã Chứng Từ</td><td>" + data.voucher_code + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Ngày Nhập</td><td>" + data.datetime + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Nhà Cung Cấp</td><td>" + data.supplier_name + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Người Nhập</td><td>" + data.import_staff + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Chiết Khấu</td><td>" + (data.discount * 100 / data.total_money_import_goods) + "%</td></tr>" +
                    "<tr><td style='font-weight: bold;'>VAT</td><td>" + (data.VAT * 100 / data.total_money_import_goods) + "%</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Tiền</td><td>" + data.total_money_import_goods + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Thanh Toán</td><td>" + data.total_payment + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Trả Trước</td><td>" + data.prepayment + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>còn nợ</td><td>" + data.owed_money_import_goods + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Trạng Thái</td><td><span class='label_status2'>Hoàn thành</span></td></tr>"
            } else if (data.categories_id == 4 && data.status == 0) {
                content += "<tr><td style='font-weight: bold;'>Mã Chứng Từ</td><td>" + data.voucher_code + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Ngày Tạo</td><td>" + data.datetime + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Nhà Cung Cấp</td><td>" + data.supplier_name + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Người Tạo</td><td>" + data.import_staff + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Chiết Khấu</td><td>" + (data.discount * 100 / data.total_money_import_goods) + "%</td></tr>" +
                    "<tr><td style='font-weight: bold;'>VAT</td><td>" + (data.VAT * 100 / data.total_money_import_goods) + "%</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Tiền</td><td>" + data.total_money_import_goods + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Thanh Toán</td><td>" + data.total_payment + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Trạng Thái</td><td><span class='label_status1'>Đang xử lý</span></td></tr>"
            } else {
                content += "<tr><td style='font-weight: bold;'>Mã Chứng Từ</td><td>" + data.voucher_code + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Ngày Tạo</td><td>" + data.datetime + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Nhà Cung Cấp</td><td>" + data.supplier_name + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Người Tạo</td><td>" + data.import_staff + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Chiết Khấu</td><td>" + (data.discount * 100 / data.total_money_import_goods) + "%</td></tr>" +
                    "<tr><td style='font-weight: bold;'>VAT</td><td>" + (data.VAT * 100 / data.total_money_import_goods) + "%</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Tiền</td><td>" + data.total_money_import_goods + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Thanh Toán</td><td>" + data.total_payment + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Trạng Thái</td><td><span class='label_status1'>Đang xử lý</span></td></tr>"
            }
            $("#import_goods_modal").html(content);
        }
    });


    $.ajax({
        type: "GET",
        url: "/shopwatch.com/admin/warehouse/import_goods/view_product_import_goods/" + id_import_goods,
        dataType: "json",
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                content += "<tr style='text-align: center;'><td hidden>" + stt++ +
                    "</td><td>" +
                    data.data[i].product_name +
                    "</td><td>" +
                    "<img src='" + data.data[i].image + "' style='width: 50px;'>" +
                    "</td><td>" +
                    data.data[i].amount_of_product_import +
                    "</td><td>" +
                    data.data[i].import_price +
                    "</td><td>" +
                    data.data[i].total_money +
                    "</td></tr>"
            }
            $("#list_product_modal").html(content);

        }
    });
}

//event keyup input search import goods
$(document).on('keyup', '#searchImportGoods', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/search',
        dataType: 'json',
        data: {
            keyword: $('#searchImportGoods').val()
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].categories_id == 4 && data.data[i].status == 0) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status1'>Đang xử lý</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].categories_id == 4 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status2'>Hoàn thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status3'>Đã hủy</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalDeleteImporGoods" onclick="getIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_import_goods').html(content);
        }
    });
});

//event click option status import_goods
$("#status").change(function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/status_import_goods',
        dataType: 'json',
        data: {
            status_import_goods: $('#status option:selected').val()
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].categories_id == 4 && data.data[i].status == 0) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status1'>Đang xử lý</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].categories_id == 4 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status2'>Hoàn thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status3'>Đã hủy</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalDeleteImporGoods" onclick="getIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_import_goods').html(content);
        }
    });
});

//event click radio all time
$(document).on('click', '#exampleRadios1', function() {
    $("#form_filter").prop("hidden", true);
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/all_time',
        dataType: 'json',
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].categories_id == 4 && data.data[i].status == 0) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status1'>Đang xử lý</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].categories_id == 4 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status2'>Hoàn thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status3'>Đã hủy</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalDeleteImporGoods" onclick="getIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_import_goods').html(content);
        }
    });
});

//event click radio 2 -> 6
function getImportGoodsByDateTime(datetime) {
    $("#form_filter").prop("hidden", true);
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/datetime',
        dataType: 'json',
        data: {
            datetime: datetime
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].categories_id == 4 && data.data[i].status == 0) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status1'>Đang xử lý</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].categories_id == 4 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status2'>Hoàn thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_import_goods + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td><span class='label_status3'>Đã hủy</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalDeleteImporGoods" onclick="getIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_import_goods').html(content);
        }
    });
}

$(document).on('click', '#exampleRadios7', function() {
    $("#form_filter").prop("hidden", false);
});

function filterByDate() {
    if ($('#inputDate1').val() == "" || $('#inputDate2').val() == "") {
        alert('Hãy chọn thời gian!')
    } else {
        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/warehouse/import_goods/filter_by_date',
            dataType: 'json',
            data: {
                inputDate1: $('#inputDate1').val(),
                inputDate2: $('#inputDate2').val()
            },
            success: function(data) {
                var content = "";
                var stt = 1;
                for (var i = 0; i < data.data.length; i++) {
                    if (data.data[i].categories_id == 4 && data.data[i].status == 0) {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code + "</td>" +
                            "<td>" + data.data[i].supplier_name + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money_import_goods + "</td>" +
                            "<td>" + data.data[i].total_payment + "</td>" +
                            "<td><span class='label_status1'>Đang xử lý</span></td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                            "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                            '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                            "</td>" +
                            "</tr>"
                    } else if (data.data[i].categories_id == 4 && data.data[i].status == 1) {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code + "</td>" +
                            "<td>" + data.data[i].supplier_name + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money_import_goods + "</td>" +
                            "<td>" + data.data[i].total_payment + "</td>" +
                            "<td><span class='label_status2'>Hoàn thành</span></td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                            "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                            '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalCancelImporGoods" onclick="getProductImportByIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'," + "'" + data.data[i].supplier_id + "'," + "'" + data.data[i].status + "'" + ')"><i class="fa fa-times"></i></a>' +
                            "</td>" +
                            "</tr>"
                    } else {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code + "</td>" +
                            "<td>" + data.data[i].supplier_name + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money_import_goods + "</td>" +
                            "<td>" + data.data[i].total_payment + "</td>" +
                            "<td><span class='label_status3'>Đã hủy</span></td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_import_goods' onclick='viewDetailImportGoods(" + data.data[i].id_import_goods + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                            "<a class='btn btn-primary' href='/shopwatch.com/admin/warehouse/import_goods/edit-import-goods/" + data.data[i].id_import_goods + "'><i class='fa fa-edit'></i></a>" +
                            '<a class="btn btn-danger"  data-toggle="modal" data-target="#modalDeleteImporGoods" onclick="getIdImportGoods(' + "'" + data.data[i].id_import_goods + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                            "</td>" +
                            "</tr>"
                    }
                };
                $('#list_import_goods').html(content);
            }
        });
    }
}

function getProductImportByIdImportGoods(id_import_good, voucher_code, id_supplier, status) {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/get_product_import_by_id_import_goods',
        dataType: 'json',
        data: {
            id_import_goods: id_import_good
        },
        success: function(data) {
            var content = "";
            for (var i = 0; i < data.data.length; i++) {
                content += "<tr>" +
                    "<td id='id_product_import'>" + data.data[i].product_id + "</td>" +
                    "<td id='amount_of_product_import'>" + data.data[i].amount_of + "</td>" +
                    "</tr>"
            }
            $('#list_Product_Import_Goods').html(content);
            $('#voucher_code').text(voucher_code);
            $('#id_import_good').text(id_import_good);
            $('#id_supplier').text(id_supplier);
            $('#status_import_good').text(status);
        }
    });
}

function CancelImportGoods() {
    function index() {
        window.location = "/shopwatch.com/admin/warehouse/import_goods";
    }
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/cancel_import_goods',
        dataType: 'json',
        data: {
            id_import_goods: $('#id_import_good').text()
        },
        success: function(data) {
            if ($('#status_import_good').text() == 1) {
                updateProduct();
                updateSupplier();
            }
            setTimeout(index, 2000);
            swal("Bạn đã hủy phiếu nhập thành công!", "You clicked the button!", "success");
            console.log(data);
        }
    });
}

function updateProduct() {
    $('#tableProductImportGoods tbody tr').each(function(index, tr) {
        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/warehouse/import_goods/update_product_after_cancel_import_goods',
            dataType: 'json',
            data: {
                product_id: $(tr).find("td#id_product_import").text(),
                amount_of: $(tr).find("td#amount_of_product_import").text()
            },
            success: function(data) {
                console.log(data);
            }
        });
    });
}

function updateSupplier() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/update_supplier_after_cancel_import_goods',
        dataType: 'json',
        data: {
            id_import_goods: $('#id_import_good').text(),
            id_supplier: $('#id_supplier').text()
        },
        success: function(data) {
            console.log(data);
        }
    });
}

function getIdImportGoods(id_import_good, voucher_code) {
    $('#id_import_good_delete').text(id_import_good);
    $('#voucher_code_delete').text(voucher_code);
}

function deleteImportGoods() {
    function index() {
        window.location = "/shopwatch.com/admin/warehouse/import_goods";
    }
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/delete_import_goods',
        dataType: 'json',
        data: {
            id_import_goods: $('#id_import_good_delete').text()
        },
        success: function(data) {
            setTimeout(index, 2000);
            swal("Bạn đã xóa phiếu nhập thành công!", "You clicked the button!", "success");
            console.log(data);
        }
    });
}