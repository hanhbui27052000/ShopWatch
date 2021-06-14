$(document).on('keyup', '#searchSupplier', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/search_supplier',
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
        url: '/shopwatch.com/admin/warehouse/import_goods/choose_supplier',
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

$(document).on('keyup', '#searchProduct', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/search_product',
        dataType: 'json',
        data: {
            keyword: $('#searchProduct').val()
        },
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                content += "<a class='dropdown-item' onclick='chooseProduct(" +
                    data.data[i].id + ")'><img src='" + data.data[i].image +
                    "' style='width: 46px;'>" + data.data[i].product_code +
                    " - " + data.data[i].product_name +
                    "</a>"
            };
            $('#listProduct').css('display', 'block');
            $('#listProduct').html(content);
            if ($('#listProduct').text() == '' || $('#searchProduct').val() == '') {
                $("#listProduct").css("display", "none");
            }
            $("body").click(function(event) {
                $("#listProduct").css("display", "none");
            });
        }
    });
});

function chooseProduct(id_product) {
    var content = "";
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/warehouse/import_goods/add_product/' + id_product,
        dataType: 'json',
        success: function(data) {
            content += "<tr data-id='" + data.id_product + "'>" +
                "<td id='id_product' hidden>" + data.id_product + "</td>" +
                "<td>" + data.product_code + "</td>" +
                "<td>" +
                "<img src='" + data.image + "' style='width:50px;'>" +
                "</td>" +
                "<td>" + data.product_name + "</td>" +
                "<td><input id='amount_of' type='number' value='1' style='width: 100px;'></td>" +
                "<td><input id='import_price' type='number' value='" + data.cost_prices + "' style='width: 100px;'></td>" +
                "<td id='into_money'>" + data.cost_prices + "</td>" +
                "<td>" +
                "<button class='btn btn-danger' onclick='removeProduct(" + data.id_product + ")'><i class='fas fa-trash'></i></button>" +
                "</td>" +
                "</tr>"
        }
    }).done(function() {
        if (checkProduct(id_product) == true) {
            $('#searchProduct').val('');
            $('#list_Product').append(content);
            totalAmountOf();
            totalMoney();
        } else {
            $('#tableImportGoods tbody tr').each(function(index, tr) {
                if ($(tr).attr('data-id') == id_product) {
                    $('#searchProduct').val('');
                    var setAmountOf = Number($(tr).find("input#amount_of").val());
                    $(tr).find("input#amount_of").val(setAmountOf += 1);
                    var amount_of = Number($(tr).find("input#amount_of").val());
                    var import_price = Number($(tr).find("input#import_price").val());
                    $(tr).find("td#into_money").text(import_price * amount_of);
                    totalAmountOf();
                    totalMoney();
                }
            });
        }
    });
}

function checkProduct(id_product) {
    var flag = true;
    $('#tableImportGoods tbody tr').each(function(index, tr) {
        if ($(tr).attr('data-id') == id_product) {
            flag = false;
        }
    });
    return flag;
}

function totalAmountOf() {
    var sum = 0;
    $('#tableImportGoods tbody tr').each(function(index, tr) {
        var amount_of = Number($(tr).find("input#amount_of").val());
        sum += amount_of;
        $('#totalAmountOf').text(sum);
    });
    $('#discount').val(0);
    $('#vat').val(0);
}

function totalMoney() {
    var sum = 0;
    $('#tableImportGoods tbody tr').each(function(index, tr) {
        var into_money = Number($(tr).find("td#into_money").text());
        sum += into_money;
        $('#total_payment').text(sum);
        $('#total_money').text(sum);
        $('#prepayment').val(sum);
        var total_payment = $('#total_payment').text();
        var prepayment = $('#prepayment').val();
        $('#owedMoney').text(total_payment - prepayment);
    });
}

$(document).on('keyup', '#amount_of', function() {
    $('#tableImportGoods tbody tr').each(function(index, tr) {
        var amount_of = Number($(tr).find("input#amount_of").val());
        var import_price = Number($(tr).find("input#import_price").val());
        $(tr).find("td#into_money").text(import_price * amount_of);
        totalAmountOf();
        totalMoney();
    });
});

$(document).on('keyup', '#import_price', function() {
    $('#tableImportGoods tbody tr').each(function(index, tr) {
        var amount_of = Number($(tr).find("input#amount_of").val());
        var import_price = Number($(tr).find("input#import_price").val());
        $(tr).find("td#into_money").text(import_price * amount_of);
        totalAmountOf();
        totalMoney();
    });
});

function removeProduct(id_product) {
    $('#tableImportGoods tbody tr').each(function(index, tr) {
        if ($(tr).attr('data-id') == id_product) {
            $(tr).remove();
            totalAmountOf();
            totalMoney();
        }
    });
    var row_tr = document.getElementById("tableImportGoods").rows.length;
    if (row_tr == 1) {
        $('#total_money').text(0);
        $('#total_payment').text(0);
        $('#prepayment').val(0);
        $('#totalAmountOf').text(0);
    }
}

$(document).on('keyup', '#discount', function() {
    var discount = Number($('#discount').val());
    var vat = Number($('#vat').val());
    var total_money = $('#total_money').text();
    $('#total_payment').text(total_money - (total_money * (discount + vat) / 100));
    $('#prepayment').val(total_money - (total_money * (discount + vat) / 100));
    var total_payment = $('#total_payment').text();
    var prepayment = Number($('#prepayment').val());
    $('#owedMoney').text(total_payment - prepayment);
});

$(document).on('keyup', '#vat', function() {
    var discount = Number($('#discount').val());
    var vat = Number($('#vat').val());
    var total_money = $('#total_money').text();
    $('#total_payment').text(total_money - (total_money * (discount + vat) / 100));
    $('#prepayment').val(total_money - (total_money * (discount + vat) / 100));
    var total_payment = $('#total_payment').text();
    var prepayment = Number($('#prepayment').val());
    $('#owedMoney').text(total_payment - prepayment);
});

$(document).on('keyup', '#prepayment', function() {
    var total_payment = $('#total_payment').text();
    var prepayment = Number($('#prepayment').val());
    $('#owedMoney').text(total_payment - prepayment);
});

function saveImportGoods() {
    if (document.getElementById("tableImportGoods").rows.length == 1) {
        alert('Chưa có mặt hàng nào trong danh sách');
    } else if ($('#supplierId').text() == "") {
        alert('Chưa chọn nhà cung cấp!');
    } else {
        function index() {
            window.location = "/shopwatch.com/admin/warehouse/import_goods";
        }
        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/warehouse/import_goods/save_import_goods',
            dataType: 'json',
            data: {
                datetime: $('#datetime').val(),
                supplier_id: $('#supplierId').text(),
                discount: $('#discount').val(),
                vat: $('#vat').val(),
                total_money: $('#total_money').text(),
                total_payment: $('#total_payment').text(),
                prepayment: $('#prepayment').val(),
                owed_money: $('#owedMoney').text()
            },
            success: function(data) {
                saveProductImport();
                setTimeout(index, 2000);
                swal("Bạn đã lưu danh sách sản phẩm nhập thành công!", "You clicked the button!", "success");
                console.log(data);
            }
        });
    }
}

function saveProductImport() {
    $('#tableImportGoods tbody tr').each(function(index, tr) {
        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/warehouse/import_goods/save_product_import',
            dataType: 'json',
            data: {
                product_id: $(tr).find("td#id_product").text(),
                amount_of: Number($(tr).find("input#amount_of").val()),
                import_price: $(tr).find("input#import_price").val(),
                total_money: $(tr).find("td#into_money").text()
            },
            success: function(data) {
                console.log(data);
            }
        });
    });
}

function confirmImportGoods() {
    if (document.getElementById("tableImportGoods").rows.length == 1) {
        alert('Chưa có mặt hàng nào trong danh sách');
    } else if ($('#supplierId').text() == "") {
        alert('Chưa chọn nhà cung cấp!');
    } else {
        function index() {
            window.location = "/shopwatch.com/admin/warehouse/import_goods";
        }
        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/warehouse/import_goods/confirm_import_goods',
            dataType: 'json',
            data: {
                datetime: $('#datetime').val(),
                supplier_id: $('#supplierId').text(),
                discount: $('#discount').val(),
                vat: $('#vat').val(),
                total_money: $('#total_money').text(),
                total_payment: $('#total_payment').text(),
                prepayment: $('#prepayment').val(),
                owed_money: $('#owedMoney').text()
            },
            success: function(data) {
                saveProductImport();
                updateProduct();
                updateSupplier();
                setTimeout(index, 2000);
                swal("Bạn đã nhập hàng thành công!", "You clicked the button!", "success");
                console.log(data);
            }
        });
    }
}

function updateProduct() {
    $('#tableImportGoods tbody tr').each(function(index, tr) {
        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/warehouse/import_goods/update_product',
            dataType: 'json',
            data: {
                product_id: $(tr).find("td#id_product").text(),
                amount_of: Number($(tr).find("input#amount_of").val()),
                cost_prices: Number($(tr).find("input#import_price").val())
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
        url: '/shopwatch.com/admin/warehouse/import_goods/update_supplier',
        dataType: 'json',
        data: {
            supplier_id: $('#supplierId').text(),
            total_payment: $('#total_payment').text(),
            owed_money: $('#owedMoney').text()
        },
        success: function(data) {
            console.log(data);
        }
    });
}