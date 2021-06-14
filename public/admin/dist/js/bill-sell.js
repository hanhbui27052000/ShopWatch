function viewBillByIdOrder(id_order) {
    $.ajax({
        type: "GET",
        url: "/shopwatch.com/admin/bill_sell/view_bill/" + id_order,
        dataType: "json",
        success: function(data) {
            var content = "";
            if (data.type == 0) {
                content += "<tr><td style='font-weight: bold;'>Mã Chứng Từ</td><td>" + data.voucher_code + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Thời Gian Giao Dịch</td><td>" + data.datetime + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Người Bán</td><td>" + data.staff_create + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Người Mua Hàng</td><td>" + data.customer_name + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Số Điện Thoại</td><td>" + data.phone_number + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Tiền</td><td>" + data.total_money + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Khách Đưa</td><td>" + data.customer_pay + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Trả Lại</td><td>" + data.return+"</td></tr>"
            } else {
                content += "<tr><td style='font-weight: bold;'>Mã Chứng Từ</td><td>" + data.voucher_code + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Thời Gian Đặt Hàng</td><td>" + data.datetime + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Người Mua Hàng</td><td>" + data.customer_name + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Số Điện Thoại</td><td>" + data.phone_number + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Địa Chỉ</td><td>" + data.address + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Tiền</td><td>" + data.total_money + "</td></tr>"
            }
            $("#bill_modal").html(content);

        }
    });

    $.ajax({
        type: "GET",
        url: "/shopwatch.com/admin/bill_sell/view_bill_product/" + id_order,
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
                    data.data[i].amount_of_product +
                    "</td><td>" +
                    data.data[i].price +
                    "</td><td>" +
                    data.data[i].total_discount +
                    "</td><td>" +
                    data.data[i].total_money_bill +
                    "</td><td>"
            }
            $("#list_product_modal").html(content);

        }
    });
}

//event keyup input search bill
$(document).on('keyup', '#search-bill', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/bill_sell/search',
        dataType: 'json',
        data: {
            keyword: $('#search-bill').val()
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].type == 0 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type1'>Mua tại cửa hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 0) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status1'>Chưa xác nhận</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 2) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status3'>Đã hủy</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status4'>Đang giao hàng</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_bill').html(content);
        }
    });
});

//event click input radio purchase form
function purchaseForm(purchase_form) {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/bill_sell/purchase_form',
        dataType: 'json',
        data: {
            purchase_form: purchase_form
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].type == 0 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type1'>Mua tại cửa hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 0) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status1'>Chưa xác nhận</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 2) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status3'>Đã hủy</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status4'>Đang giao hàng</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_bill').html(content);
        }
    });
}

//event click option status bill
$("#status").change(function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/bill_sell/status_bill',
        dataType: 'json',
        data: {
            status_bill: $('#status option:selected').val()
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].type == 0 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type1'>Mua tại cửa hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 0) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status1'>Chưa xác nhận</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 2) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status3'>Đã hủy</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status4'>Đang giao hàng</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_bill').html(content);
        }
    });
});

//event click radio all time
$(document).on('click', '#exampleRadios1', function() {
    $("#form_filter").prop("hidden", true);
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/bill_sell/all_time',
        dataType: 'json',
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].type == 0 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type1'>Mua tại cửa hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 0) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status1'>Chưa xác nhận</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 2) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status3'>Đã hủy</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status4'>Đang giao hàng</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_bill').html(content);
        }
    });
});

//event click radio 2 -> 6
function getBillByDateTime(datetime) {
    $("#form_filter").prop("hidden", true);
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/bill_sell/datetime',
        dataType: 'json',
        data: {
            datetime: datetime
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].type == 0 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type1'>Mua tại cửa hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 0) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status1'>Chưa xác nhận</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 1) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else if (data.data[i].type == 1 && data.data[i].status == 2) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status3'>Đã hủy</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money + "</td>" +
                        "<td><span class='label_type2'>Đặt hàng</span></td>" +
                        "<td><span class='label_status4'>Đang giao hàng</span></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_bill').html(content);
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
            url: '/shopwatch.com/admin/bill_sell/filter_by_date',
            dataType: 'json',
            data: {
                inputDate1: $('#inputDate1').val(),
                inputDate2: $('#inputDate2').val()
            },
            success: function(data) {
                var content = "";
                var stt = 1;
                for (var i = 0; i < data.data.length; i++) {
                    if (data.data[i].type == 0 && data.data[i].status == 1) {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money + "</td>" +
                            "<td><span class='label_type1'>Mua tại cửa hàng</span></td>" +
                            "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                            "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                            "</td>" +
                            "</tr>"
                    } else if (data.data[i].type == 1 && data.data[i].status == 0) {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money + "</td>" +
                            "<td><span class='label_type2'>Đặt hàng</span></td>" +
                            "<td><span class='label_status1'>Chưa xác nhận</span></td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                            "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                            "</td>" +
                            "</tr>"
                    } else if (data.data[i].type == 1 && data.data[i].status == 1) {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money + "</td>" +
                            "<td><span class='label_type2'>Đặt hàng</span></td>" +
                            "<td><span class='label_status2'>Hoàn Thành</span></td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                            "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                            "</td>" +
                            "</tr>"
                    } else if (data.data[i].type == 1 && data.data[i].status == 2) {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money + "</td>" +
                            "<td><span class='label_type2'>Đặt hàng</span></td>" +
                            "<td><span class='label_status3'>Đã hủy</span></td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                            "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                            "</td>" +
                            "</tr>"
                    } else {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money + "</td>" +
                            "<td><span class='label_type2'>Đặt hàng</span></td>" +
                            "<td><span class='label_status4'>Đang giao hàng</span></td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modal_bill' onclick='viewBillByIdOrder(" + data.data[i].order_id + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary' href=''><i class='fa fa-print'></i></a>" +
                            "<a class='btn btn-danger' href=''><i class='far fa-trash-alt'></i></a>" +
                            "</td>" +
                            "</tr>"
                    }
                };
                $('#list_bill').html(content);
            }
        });
    }
}

function getIdBillSell(id_bill_sell, voucher_code) {
    $('#voucher_code_delete').text(voucher_code);
    $('#id_bill_delete').text(id_bill_sell);
}

function deleteBillSell() {
    function index() {
        window.location = "/shopwatch.com/admin/bill_sell/";
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: 'post',
        url: '/shopwatch.com/admin/bill_sell/delete_bill_sell',
        dataType: 'json',
        data: {
            id_bill_sell: $('#id_bill_delete').text()
        },
        success: function(data) {
            setTimeout(index, 2000);
            swal("Bạn đã xóa hóa đơn thành công!", "You clicked the button!", "success");
        }
    });
}