function ViewVotesPayByIdVotesPay(id_votes_pay) {
    $.ajax({
        type: "GET",
        url: "/shopwatch.com/admin/votes_pay/view_votes_pay/" + id_votes_pay,
        dataType: "json",
        success: function(data) {
            var content = "";
            if (data.categories_id == 4) {
                content += "<tr><td style='font-weight: bold;'>Mã Chứng Từ</td><td>" + data.voucher_code.replace(data.voucher_code.slice(0, 2), "PC") + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Thời Gian Giao Dịch</td><td>" + data.datetime + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Người Tạo</td><td>" + data.import_staff + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Giá Trị</td><td>" + data.total_money_votes_pay + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Hạng Mục Chi</td><td>" + data.categories + "</td></tr>" +
                    "<tr><td style='font-weight: bold;'>Lí Do</td><td>Phiếu thanh toán cho chứng từ " + data.voucher_code + "</td></tr>"
            } else {
                if (data.note == null) {
                    content += "<tr><td style='font-weight: bold;'>Mã Chứng Từ</td><td>" + data.voucher_code.replace(data.voucher_code.slice(0, 2), "PC") + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Thời Gian Giao Dịch</td><td>" + data.datetime + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Người Tạo</td><td>" + data.import_staff + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Người Nhận</td><td>" + data.supplier_name + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Giá Trị</td><td>" + data.total_money_votes_pay + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Hạng Mục Chi</td><td>" + data.categories + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Ghi Chú</td><td></td></tr>"
                } else {
                    content += "<tr><td style='font-weight: bold;'>Mã Chứng Từ</td><td>" + data.voucher_code.replace(data.voucher_code.slice(0, 2), "PC") + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Thời Gian Giao Dịch</td><td>" + data.datetime + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Người Tạo</td><td>" + data.import_staff + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Người Nhận</td><td>" + data.supplier_name + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Giá Trị</td><td>" + data.total_money_votes_pay + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Hạng Mục Chi</td><td>" + data.categories + "</td></tr>" +
                        "<tr><td style='font-weight: bold;'>Ghi Chú</td><td>" + data.note + "</td></tr>"
                }
            }
            $("#votes_pay_modal").html(content);
        }
    });
}

//event keyup input search votes_collect
$(document).on('keyup', '#searchVotesPay', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/search',
        dataType: 'json',
        data: {
            keyword: $('#searchVotesPay').val()
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].categories_id == 4) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].categories + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                        "<td>Phiếu thanh toán cho chứng từ " + data.data[i].voucher_code + "</td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                        "</td>" +
                        "</tr>"

                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].categories + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                        "<td></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' data-toggle='modal' data-target='#modalEditVotesPay' onclick='EditVotesPay(" + data.data[i].id_votes_pay + ")'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteVotesPay" onclick="getIdVotesPay(' + "'" + data.data[i].id_votes_pay + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_votes_pay').html(content);
        }
    });
});

//event click option categories
$("#categories").change(function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/categories_votes_pay',
        dataType: 'json',
        data: {
            categories_votes_pay: $('#categories option:selected').val()
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].categories_id == 4) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].categories + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                        "<td>Phiếu thanh toán cho chứng từ " + data.data[i].voucher_code + "</td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                        "</td>" +
                        "</tr>"

                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].categories + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                        "<td></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' data-toggle='modal' data-target='#modalEditVotesPay' onclick='EditVotesPay(" + data.data[i].id_votes_pay + ")'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteVotesPay" onclick="getIdVotesPay(' + "'" + data.data[i].id_votes_pay + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_votes_pay').html(content);
        }
    });
});

//event click radio all time
$(document).on('click', '#exampleRadios1', function() {
    $("#form_filter").prop("hidden", true);
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/all_time',
        dataType: 'json',
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].categories_id == 4) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].categories + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                        "<td>Phiếu thanh toán cho chứng từ " + data.data[i].voucher_code + "</td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                        "</td>" +
                        "</tr>"

                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].categories + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                        "<td></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' data-toggle='modal' data-target='#modalEditVotesPay' onclick='EditVotesPay(" + data.data[i].id_votes_pay + ")'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteVotesPay" onclick="getIdVotesPay(' + "'" + data.data[i].id_votes_pay + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_votes_pay').html(content);
        }
    });
});

//event click radio 2 -> 6
function getVotesCollectByDateTime(datetime) {
    $("#form_filter").prop("hidden", true);
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/datetime',
        dataType: 'json',
        data: {
            datetime: datetime
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].categories_id == 4) {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].categories + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                        "<td>Phiếu thanh toán cho chứng từ " + data.data[i].voucher_code + "</td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                        "</td>" +
                        "</tr>"

                } else {
                    content += "<tr>" +
                        "<td hidden>" + stt++ + "</td>" +
                        "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                        "<td>" + data.data[i].supplier_name + "</td>" +
                        "<td>" + data.data[i].categories + "</td>" +
                        "<td>" + data.data[i].datetime + "</td>" +
                        "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                        "<td></td>" +
                        "<td>" +
                        "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                        "<i class='fa fa-eye'></i>" +
                        "</a>" +
                        "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                        "<a class='btn btn-primary' data-toggle='modal' data-target='#modalEditVotesPay' onclick='EditVotesPay(" + data.data[i].id_votes_pay + ")'><i class='fa fa-edit'></i></a>" +
                        '<a class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteVotesPay" onclick="getIdVotesPay(' + "'" + data.data[i].id_votes_pay + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>"
                }
            };
            $('#list_votes_pay').html(content);
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
            url: '/shopwatch.com/admin/votes_pay/filter_by_date',
            dataType: 'json',
            data: {
                inputDate1: $('#inputDate1').val(),
                inputDate2: $('#inputDate2').val()
            },
            success: function(data) {
                var content = "";
                var stt = 1;
                for (var i = 0; i < data.data.length; i++) {
                    if (data.data[i].categories_id == 4) {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                            "<td>" + data.data[i].supplier_name + "</td>" +
                            "<td>" + data.data[i].categories + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                            "<td>Phiếu thanh toán cho chứng từ " + data.data[i].voucher_code + "</td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                            "</td>" +
                            "</tr>"

                    } else {
                        content += "<tr>" +
                            "<td hidden>" + stt++ + "</td>" +
                            "<td>" + data.data[i].voucher_code.replace(data.data[i].voucher_code.slice(0, 2), "PC") + "</td>" +
                            "<td>" + data.data[i].supplier_name + "</td>" +
                            "<td>" + data.data[i].categories + "</td>" +
                            "<td>" + data.data[i].datetime + "</td>" +
                            "<td>" + data.data[i].total_money_votes_pay + "</td>" +
                            "<td></td>" +
                            "<td>" +
                            "<a class='btn btn-warning' data-toggle='modal' data-target='#modalViewVotesPay' onclick='ViewVotesPayByIdVotesPay(" + data.data[i].id_votes_pay + ")'>" +
                            "<i class='fa fa-eye'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary'><i class='fa fa-print'></i></a>" +
                            "<a class='btn btn-primary' data-toggle='modal' data-target='#modalEditVotesPay' onclick='EditVotesPay(" + data.data[i].id_votes_pay + ")'><i class='fa fa-edit'></i></a>" +
                            '<a class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteVotesPay" onclick="getIdVotesPay(' + "'" + data.data[i].id_votes_pay + "'," + "'" + data.data[i].voucher_code + "'" + ')"><i class="far fa-trash-alt"></i></a>' +
                            "</td>" +
                            "</tr>"
                    }
                };
                $('#list_votes_pay').html(content);
            }
        });
    }
}

function getDataVotesPay() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/get_categories_votes_pay',
        dataType: 'json',
        success: function(data) {
            var content = "";
            for (var i = 0; i < data.data.length; i++) {
                content += "<option value='" + data.data[i].id + "'>" + data.data[i].categories + "</option>"
            }
            $('#categories_votes_pay').html(content);
        }
    });

    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/get_datetime_votes_pay',
        dataType: 'json',
        success: function(data) {
            $('#datetime_votes_pay').val(data);
        }
    });
}

$(document).on('keyup', '#searchSupplier', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/search_supplier',
        dataType: 'json',
        data: {
            keyword: $('#searchSupplier').val()
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                content += "<a class='dropdown-item' type='button' onclick='chooseSupplier(" + data.data[i].id + ")'>" + data.data[i].supplier_code + " - " + data.data[i].supplier_name + "</a>"
            };
            $('#listSupplier').css('display', 'block');
            $('#listSupplier').html(content);
            if ($('#listSupplier').text() == '' || $('#searchSupplier').val() == '') {
                $("#listSupplier").css("display", "none");
            }
            $("body").click(function(event) {
                $("#listSupplier").css("display", "none");
            });
        }
    });
});

function chooseSupplier(id_supplier) {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/choose_supplier',
        dataType: 'json',
        data: {
            id_supplier: id_supplier
        },
        success: function(data) {
            $('#listSupplier').css('display', 'none');
            $('#supplier').text(data.supplier_code + " - " + data.supplier_name);
            $('#supplierId').text(data.id);
            $('#searchSupplier').val('');
        }
    });
};

$(document).on('click', '#supplier_remove', function() {
    $('#supplier').text('Không xác định');
    $('#supplierId').text("");
});

function addCategories() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/add_categories',
        dataType: 'json',
        data: {
            categories: $('#dataCategories').val()
        },
        success: function(data) {
            getDataVotesPay();
        }
    });
}

function addVotesCollect() {

    function index() {
        window.location = "/shopwatch.com/admin/votes_pay/";
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if ($('#supplierId').text() == "") {
        alert('Hãy chọn người nộp!');
    } else if ($('#totalMoney').val() == "") {
        alert('Hãy nhập giá trị!');
    } else {
        $.ajax({
            method: 'post',
            url: '/shopwatch.com/admin/votes_pay/add_votes_pay',
            dataType: 'json',
            data: {
                categories: $('#categories_votes_pay').val(),
                id_supplier: $('#supplierId').text(),
                datetime: $('#datetime_votes_pay').val(),
                total_money: $('#totalMoney').val(),
                note: $('#note').val()
            },
            success: function(data) {
                setTimeout(index, 2000);
                swal("Bạn đã thêm mới phiếu chi thành công!", "You clicked the button!", "success");
            }
        });
    }
}

function EditVotesPay(id_votes_pay) {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/votes_pay/edit_votes_pay/' + id_votes_pay,
        dataType: 'json',
        success: function(data) {
            $('#id_votes_pay_edit').val(data.id_votes_pay);
            $('#categories_votes_pay_edit').val(data.categories);
            $('#supplierEdit').val(data.supplier_name);
            $('#datetime_votes_pay_edit').val(data.datetime.replace(data.datetime.slice(10, 11), "T"));
            $('#totalMoneyEdit').val(data.total_money_votes_pay);
            $('#noteEdit').val(data.note);
        }
    });
}

function updateVotesPay() {
    function index() {
        window.location = "/shopwatch.com/admin/votes_pay/";
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if ($('#totalMoneyEdit').val() == "") {
        alert('Hãy nhập giá trị!');
    } else {
        $.ajax({
            method: 'post',
            url: '/shopwatch.com/admin/votes_pay/update_votes_pay',
            dataType: 'json',
            data: {
                id_votes_pay: $('#id_votes_pay_edit').val(),
                datetime: $('#datetime_votes_pay_edit').val(),
                total_money: $('#totalMoneyEdit').val(),
                note: $('#noteEdit').val()
            },
            success: function(data) {
                setTimeout(index, 2000);
                swal("Bạn đã cập nhật phiếu chi thành công!", "You clicked the button!", "success");
            }
        });
    }
}

function getIdVotesPay(id_votes_pay, voucher_code) {
    $('#voucher_code_delete').text(voucher_code.replace(voucher_code.slice(0, 2), "PC"));
    $('#id_votes_pay_delete').text(id_votes_pay);
}

function deleteVotesPay() {
    function index() {
        window.location = "/shopwatch.com/admin/votes_pay/";
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: 'post',
        url: '/shopwatch.com/admin/votes_pay/delete_votes_pay',
        dataType: 'json',
        data: {
            id_votes_pay: $('#id_votes_pay_delete').text()
        },
        success: function(data) {
            setTimeout(index, 2000);
            swal("Bạn đã xóa phiếu chi thành công!", "You clicked the button!", "success");
        }
    });
}