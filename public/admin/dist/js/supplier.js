function viewSupplierById(id_supplier) {
    $.ajax({
        type: "GET",
        url: "/shopwatch.com/admin/supplier/view_supplier/" + id_supplier,
        dataType: "json",
        success: function(data) {
            var content = "";
            if (data.gender == 1) {
                content += "<tr><td style='font-weight: bold;'>Mã Nhà Cung Cấp</td><td>" + data.supplier_code + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Mã Số Thuế</td><td>" + data.tax_code + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tên Nhà Cung Cấp</td><td>" + data.supplier_name + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Giới Tính</td><td>Nam</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Ngày Sinh</td><td>" + data.date_of_birth + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>SĐT</td><td>" + data.phone_number + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Địa Chỉ</td><td>" + data.address + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Giao Dịch</td><td>" + data.total_money + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Còn Nợ</td><td>" + data.owed_money + "</td></tr>"
            } else {
                content += "<tr><td style='font-weight: bold;'>Mã Nhà Cung Cấp</td><td>" + data.supplier_code + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Mã Số Thuế</td><td>" + data.tax_code + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tên Nhà Cung Cấp</td><td>" + data.supplier_name + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Giới Tính</td><td>Nữ</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Ngày Sinh</td><td>" + data.date_of_birth + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>SĐT</td><td>" + data.phone_number + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Địa Chỉ</td><td>" + data.address + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Tổng Giao Dịch</td><td>" + data.total_money + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Còn Nợ</td><td>" + data.owed_money + "</td></tr>"
            }
            $("#supplier_modal").html(content);

        }
    });

    $.ajax({
        type: "GET",
        url: "/shopwatch.com/admin/supplier/transaction_history/" + id_supplier,
        dataType: "json",
        success: function(data) {
            var content = "";
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].note == null) {
                    content += "<tr>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].import_staff + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td></td>" +
                        "</tr>"
                } else {
                    content += "<tr>" +
                        "<td>" + data.data[i].voucher_code + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].import_staff + "</td>" +
                        "<td>" + data.data[i].total_payment + "</td>" +
                        "<td>" + data.data[i].note + "</td>" +
                        "</tr>"
                }
            }
            $("#importgoods_modal").html(content);

        }
    });

    $.ajax({
        type: "GET",
        url: "/shopwatch.com/admin/supplier/debt_book /" + id_supplier,
        dataType: "json",
        success: function(data) {
            // var content = "";
            // for (var i = 0; i < data.data.length; i++) {
            //     if (data.data[i].note == null) {
            //         content += "<tr>" +
            //             "<td>" + data.data[i].voucher_code + "</td>" +
            //             "<td>" + data.data[i].datetime + "</td>" +
            //             "<td>" + data.data[i].import_staff + "</td>" +
            //             "<td>" + data.data[i].total_money + "</td>" +
            //             "<td></td>" +
            //             "</tr>"
            //     } else {
            //         content += "<tr>" +
            //             "<td>" + data.data[i].voucher_code + "</td>" +
            //             "<td>" + data.data[i].datetime + "</td>" +
            //             "<td>" + data.data[i].import_staff + "</td>" +
            //             "<td>" + data.data[i].total_money + "</td>" +
            //             "<td>" + data.data[i].note + "</td>" +
            //             "</tr>"
            //     }
            // }
            // $("#importgoods_modal").html(content);

        }
    });
}