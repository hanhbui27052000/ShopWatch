//event click button btn-all
$(document).on('click', '#btn-all', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/sell/all',
        dataType: 'json',
        success: function(data) {
            var content = "";
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].discount > 0) {
                    content += "<div class='col-md-2 col-sm-6'>" +
                        "<div class='item'>" +
                        "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                        "<div class='item-dtls'>" +
                        "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                        "<p class='priceDiscount'>" + (data.data[i].price - (data.data[i].price * data.data[i].discount / 100)) + "đ</p>" +
                        "<div>" +
                        "<p class='productPrice'>" + data.data[i].price + "đ</p>" +
                        " <p class='discount'>" + -data.data[i].discount + "%</p>" +
                        "</div>" +
                        "<p>SL: " + data.data[i].amount_of + "</p>" +
                        "</div>" +
                        "<div class='ecom bg-lblue'>" +
                        "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                } else {
                    content += "<div class='col-md-2 col-sm-6'>" +
                        "<div class='item'>" +
                        "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                        "<div class='item-dtls'>" +
                        "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                        "<p class='price'>" + data.data[i].price + "đ</p>" +
                        "<p>SL: " + data.data[i].amount_of + "</p>" +
                        "</div>" +
                        "<div class='ecom bg-lblue'>" +
                        "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                }
            };
            $('#listProduct').html(content);
        }
    });
});

//event click button btn-brand
$(document).on('click', '#btn-brand', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/sell/brand',
        dataType: 'json',
        success: function(data) {
            var content = "";
            for (var i = 0; i < data.data.length; i++) {
                content += "<div class='col-md-4 col-sm-6'>" +
                    "<div class='item'><img class='img-responsive' src='" + data.data[i].image + "'onclick='getProductByIdBrand(" + data.data[i].id + ")'>" +
                    "<div class='item-dtls'>" +
                    "<h6 class='productName'>" + data.data[i].name + "</h6>" +
                    "</div>" +
                    "</div>" +
                    "</div>";
            };
            $('#listProduct').html(content);

        }
    });
});

//event click image img-brand
function getProductByIdBrand(id_brand) {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/sell/product/brand/' + id_brand,
        dataType: 'json',
        success: function(data) {
            var content = "";
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].discount > 0) {
                    content += "<div class='col-md-2 col-sm-6'>" +
                        "<div class='item'>" +
                        "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                        "<div class='item-dtls'>" +
                        "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                        "<p class='priceDiscount'>" + (data.data[i].price - (data.data[i].price * data.data[i].discount / 100)) + "đ</p>" +
                        "<div>" +
                        "<p class='productPrice'>" + data.data[i].price + "đ</p>" +
                        " <p class='discount'>" + -data.data[i].discount + "%</p>" +
                        "</div>" +
                        "<p>SL: " + data.data[i].amount_of + "</p>" +
                        "</div>" +
                        "<div class='ecom bg-lblue'>" +
                        "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                } else {
                    content += "<div class='col-md-2 col-sm-6'>" +
                        "<div class='item'>" +
                        "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                        "<div class='item-dtls'>" +
                        "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                        "<p class='price'>" + data.data[i].price + "đ</p>" +
                        "<p>SL: " + data.data[i].amount_of + "</p>" +
                        "</div>" +
                        "<div class='ecom bg-lblue'>" +
                        "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                }
            };
            $('#listProduct').html(content);

        }
    });
};

//event click dropdown menu high to low
$(document).on('click', '#high_to_low', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/sell/product/sort/high-to-low',
        dataType: 'json',
        success: function(data) {
            var content = "";
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].discount > 0) {
                    content += "<div class='col-md-2 col-sm-6'>" +
                        "<div class='item'>" +
                        "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                        "<div class='item-dtls'>" +
                        "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                        "<p class='priceDiscount'>" + (data.data[i].price - (data.data[i].price * data.data[i].discount / 100)) + "đ</p>" +
                        "<div>" +
                        "<p class='productPrice'>" + data.data[i].price + "đ</p>" +
                        " <p class='discount'>" + -data.data[i].discount + "%</p>" +
                        "</div>" +
                        "<p>SL: " + data.data[i].amount_of + "</p>" +
                        "</div>" +
                        "<div class='ecom bg-lblue'>" +
                        "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                } else {
                    content += "<div class='col-md-2 col-sm-6'>" +
                        "<div class='item'>" +
                        "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                        "<div class='item-dtls'>" +
                        "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                        "<p class='price'>" + data.data[i].price + "đ</p>" +
                        "<p>SL: " + data.data[i].amount_of + "</p>" +
                        "</div>" +
                        "<div class='ecom bg-lblue'>" +
                        "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                }
            };
            $('#listProduct').html(content);
        }
    });
});

//event click dropdown menu low to hight
$(document).on('click', '#low_to_high', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/sell/product/sort/low-to-high',
        dataType: 'json',
        success: function(data) {
            var content = "";
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].discount > 0) {
                    content += "<div class='col-md-2 col-sm-6'>" +
                        "<div class='item'>" +
                        "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                        "<div class='item-dtls'>" +
                        "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                        "<p class='priceDiscount'>" + (data.data[i].price - (data.data[i].price * data.data[i].discount / 100)) + "đ</p>" +
                        "<div>" +
                        "<p class='productPrice'>" + data.data[i].price + "đ</p>" +
                        " <p class='discount'>" + -data.data[i].discount + "%</p>" +
                        "</div>" +
                        "<p>SL: " + data.data[i].amount_of + "</p>" +
                        "</div>" +
                        "<div class='ecom bg-lblue'>" +
                        "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                } else {
                    content += "<div class='col-md-2 col-sm-6'>" +
                        "<div class='item'>" +
                        "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                        "<div class='item-dtls'>" +
                        "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                        "<p class='price'>" + data.data[i].price + "đ</p>" +
                        "<p>SL: " + data.data[i].amount_of + "</p>" +
                        "</div>" +
                        "<div class='ecom bg-lblue'>" +
                        "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                }
            };
            $('#listProduct').html(content);
        }
    });
});

//event keyup input search
$(document).on('keyup', '#formGroupExampleInput', function() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/sell/product/search',
        dataType: 'json',
        data: {
            keyword: $('#formGroupExampleInput').val()
        },
        success: function(data) {
            var content = "";
            if (data.data.length > 0) {
                for (var i = 0; i < data.data.length; i++) {
                    if (data.data[i].discount > 0) {
                        content += "<div class='col-md-2 col-sm-6'>" +
                            "<div class='item'>" +
                            "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                            "<div class='item-dtls'>" +
                            "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                            "<p class='priceDiscount'>" + (data.data[i].price - (data.data[i].price * data.data[i].discount / 100)) + "đ</p>" +
                            "<div>" +
                            "<p class='productPrice'>" + data.data[i].price + "đ</p>" +
                            " <p class='discount'>" + -data.data[i].discount + "%</p>" +
                            "</div>" +
                            "<p>SL: " + data.data[i].amount_of + "</p>" +
                            "</div>" +
                            "<div class='ecom bg-lblue'>" +
                            "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                            "</div>" +
                            "</div>" +
                            "</div>";
                    } else {
                        content += "<div class='col-md-2 col-sm-6'>" +
                            "<div class='item'>" +
                            "<img class='img-responsive' src='" + data.data[i].image + "'>" +
                            "<div class='item-dtls'>" +
                            "<h6 class='productName'>" + data.data[i].product_name + "</h6>" +
                            "<p class='price'>" + data.data[i].price + "đ</p>" +
                            "<p>SL: " + data.data[i].amount_of + "</p>" +
                            "</div>" +
                            "<div class='ecom bg-lblue'>" +
                            "<a class='btn' onclick='getProductById(" + data.data[i].id_product + ")'>Add to cart</a>" +
                            "</div>" +
                            "</div>" +
                            "</div>";
                    }
                };
            } else {
                content += "<p>Không có kết quả</p>";
            }

            $('#listProduct').html(content);
        }
    });
});

//event click button btn add to cart
function getProductById(id_product, amount_of_product, name_product) {
    if (amount_of_product == 0) {
        alert('sản phẩm ' + name_product + ' đã hết,hãy nhập hàng!');
    } else {
        $("#payment").prop("disabled", false);
        var content = "";
        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/sell/addtocart/product/' + id_product,
            dataType: 'json',
            success: function(data) {
                if (data.discount > 0) {
                    content += "<tr data-id='" + data.id_product + "'>" +
                        "<td data-th='Product'>" +
                        "<div class='row'>" +
                        "<div class='col-md-3 text-left'>" +
                        "<p id='id_product' hidden>" + data.id_product + "</p>" +
                        "<img src='" + data.image + "' class='img-fluid d-none d-md-block rounded mb-2 shadow'>" +
                        "</div>" +
                        "<div class='col-md-9 text-left mt-sm-2'>" +
                        "<h6 id='name_product' style='padding-top: 15px;'>" + data.product_name + "</h6>" +
                        "</div>" +
                        "</div>" +
                        "</td>" +
                        "<td data-th='price' id='price' style='padding-top: 37px;'>" + (data.price - (data.price * data.discount / 100)) + "</td>" +
                        "<td data-th='price_hidden' id='price_hidden' style='padding-top: 37px;' hidden>" + data.price + "</td>" +
                        "<td data-th='total_price_hidden' id='total_price_hidden' style='padding-top: 37px;' hidden>" + (data.price - (data.price * data.discount / 100)) + "</td>" +
                        "<td data-th='discount_hidden' id='discount_hidden' style='padding-top: 37px;' hidden>" + (data.price * data.discount / 100) + "</td>" +
                        "<td data-th='total_discount_hidden' id='total_discount_hidden' style='padding-top: 37px;' hidden>" + (data.price * data.discount / 100) + "</td>" +
                        "<td data-th='sl' style='padding-top: 30px;'>" +
                        "<input type='number' class='form-control' id='sl' value='1'>" +
                        "<input type='number' class='form-control' id='total_sl' value='" + data.amount_of + "' hidden>" +
                        "</td>" +
                        "<td class='actions' data-th='' style='padding-top: 34px;'>" +
                        "<div class='text-right'>" +
                        "<button class='btn btn-danger' onclick='removeProduct(" + data.id_product + ")'>" +
                        "<i class='fas fa-trash'></i>" +
                        "</button>" +
                        "</div>" +
                        "</td>" +
                        "</tr>"
                } else {
                    content += "<tr data-id='" + data.id_product + "'>" +
                        "<td data-th='Product'>" +
                        "<div class='row'>" +
                        "<div class='col-md-3 text-left'>" +
                        "<p id='id_product' hidden>" + data.id_product + "</p>" +
                        "<img src='" + data.image + "' class='img-fluid d-none d-md-block rounded mb-2 shadow'>" +
                        "</div>" +
                        "<div class='col-md-9 text-left mt-sm-2'>" +
                        "<h6 id='name_product' style='padding-top: 15px;'>" + data.product_name + "</h6>" +
                        "</div>" +
                        "</div>" +
                        "</td>" +
                        "<td data-th='Price' id='price' style='padding-top: 37px;'>" + data.price + "</td>" +
                        "<td data-th='Price' id='price_hidden' style='padding-top: 37px;' hidden>" + data.price + "</td>" +
                        "<td data-th='Price' id='total_price_hidden' style='padding-top: 37px;' hidden>" + data.price + "</td>" +
                        "<td data-th='Price' id='discount_hidden' style='padding-top: 37px;' hidden>" + (data.price * data.discount / 100) + "</td>" +
                        "<td data-th='Price' id='total_discount_hidden' style='padding-top: 37px;' hidden>" + (data.price * data.discount / 100) + "</td>" +
                        "<td data-th='Quantity' style='padding-top: 30px;'>" +
                        "<input type='number' class='form-control' id='sl' value='1'>" +
                        "<input type='number' class='form-control' id='total_sl' value='" + data.amount_of + "' hidden>" +
                        "</td>" +
                        "<td class='actions' data-th='' style='padding-top: 34px;'>" +
                        "<div class='text-right'>" +
                        "<button class='btn btn-danger' onclick='removeProduct(" + data.id_product + ")'>" +
                        "<i class='fas fa-trash'></i>" +
                        "</button>" +
                        "</div>" +
                        "</td>" +
                        "</tr>"
                }
            }
        }).done(function() {
            if (checkProduct(id_product) == true) {
                $('#listProductOder').append(content);
                totalPrice();
            } else {
                $('#tableOder tbody tr').each(function(index, tr) {
                    if ($(tr).attr('data-id') == id_product) {
                        if (checkSLProductOrder(id_product, amount_of_product) == true) {
                            var setSL = Number($(tr).find("input#sl").val());
                            $(tr).find("input#sl").val(setSL += 1);
                            var sl = Number($(tr).find("input#sl").val());
                            var price = $(tr).find("td#price").text();
                            var discount_hidden = $(tr).find("td#discount_hidden").text();
                            $(tr).find("td#total_price_hidden").text(price * sl);
                            $(tr).find("td#total_discount_hidden").text(discount_hidden * sl);
                            totalPrice();
                        } else {
                            alert('sản phẩm ' + name_product + ' không đủ số lượng,hãy nhập hàng thêm!');
                        }
                    }
                });
            }
        });
    }

};

//function check product
function checkProduct(id_product) {
    var flag = true;
    $('#tableOder tbody tr').each(function(index, tr) {
        if ($(tr).attr('data-id') == id_product) {
            flag = false;
        }
    });
    return flag;
}

//function check product
function checkSLProductOrder(id_product, amount_of_product) {
    var flag = true;
    $('#tableOder tbody tr').each(function(index, tr) {
        if ($(tr).attr('data-id') == id_product && $(tr).find("input#sl").val() == amount_of_product) {
            flag = false;
        }
    });
    return flag;
}

//function total price
function totalPrice() {
    var sum = 0;
    $('#tableOder tbody tr').each(function(index, tr) {
        var total_price_hidden = Number($(tr).find("td#total_price_hidden").text());
        sum += total_price_hidden;
        $('#totalPrice').text(sum);
        $('#customer_sent').val(sum);
        var totalPrice = $('#totalPrice').text();
        var customer_sent = $('#customer_sent').val();
        $('#return').text(customer_sent - totalPrice);
    });
}

//event keyup input quantity
$(document).on('keyup', '#sl', function() {
    $('#tableOder tbody tr').each(function(index, tr) {
        if (Number($(tr).find("input#sl").val()) > Number($(tr).find('input#total_sl').val())) {
            alert('sản phẩm ' + $(tr).find("h6#name_product").text() + ' không đủ số lượng,hãy nhập hàng thêm!');
            $(tr).find("input#sl").val(1);
            totalPrice();
        } else {
            var price = Number($(tr).find("td#price").text());
            var sl = Number($(tr).find("input#sl").val());
            var discount_hidden = $(tr).find("td#discount_hidden").text();
            $(tr).find("td#total_price_hidden").text(price * sl);
            $(tr).find("td#total_discount_hidden").text(discount_hidden * sl);
            totalPrice();
            if (sl == "") {
                $("#payment").prop("disabled", true);
            } else {
                $("#payment").prop("disabled", false);
            }
        }
    });
});

//event click buuton remove
function removeProduct(id_product) {
    $('#tableOder tbody tr').each(function(index, tr) {
        if ($(tr).attr('data-id') == id_product) {
            $(tr).remove();
            totalPrice();
        }
    });
    var row_tr = document.getElementById("tableOder").rows.length;
    if (row_tr == 1) {
        $('#totalPrice').text(0);
        $('#customer_sent').val(0);
        $("#payment").prop("disabled", true);
    }
}

//event keyup input customer_sent
$(document).on('keyup', '#customer_sent', function() {
    var totalPrice = $('#totalPrice').text();
    var customer_sent = $('#customer_sent').val();
    $('#return').text(customer_sent - totalPrice);
});

//function print bill thanh toan
function printbill() {
    var nameCustomer = $('#nameCustomer').val();
    var numberPhone = $('#numberPhone').val();
    if (nameCustomer == "" || numberPhone == "") {
        alert('nhập tên khách hàng và số điện thoại')
    } else {
        var printwin = window.open("");
        printwin.document.write(
            "<h1>SHOP WATCH</h1>" +
            "<p>Địa chỉ: 105 Nguyễn Tri Phương - Thanh Khê - Đà Nẵng</p>" +
            "<p>SĐT: 0372348350</p>" +
            "<h1 style='text-align: center;'>HÓA ĐƠN THANH TOÁN</h1>" +
            "<h4>Tên Khách Hàng: " + nameCustomer + "</h4>" +
            "<h4>SĐT: " + numberPhone + "</h4>" +
            "<table style='border-collapse: collapse;width: 100%;'>" +
            "<thead>" +
            "<tr>" +
            "<th style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>Sản Phẩm</th>" +
            "<th style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>SL</th>" +
            "<th style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>Giá</th>" +
            "<th style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>Giảm Giá</th>" +
            "<th style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>Thành Tiền</th>" +
            "<tr>" +
            "</thead>" +
            "<tbody id='content_table'>" +

            "</tbody>" +
            "</table>" +
            "<div style='margin-left: 60%;'>" +
            "<h4>Tổng cộng: 100000000đ</h4>" +
            "<h4>Giảm Giá: 0đ</h4>" +
            "<h4>Khách Đưa: 100000000đ</h4>" +
            "<h4>Trả Lại:0đ</h4>" +
            "</div>" +
            "<p>Cảm ơn và hẹn gặp lại quý khách!</p>"
        );



        $('#tableOder tbody tr').each(function(index, tr) {
            var name_product = Number($(tr).find("h6#name_product").text());
            var sl = Number($(tr).find("input#sl").val());
            var price_hidden = Number($(tr).find("td#price_hidden").text());
            var total_discount_hidden = $(tr).find("td#total_discount_hidden").text();
            var total_price_hidden = $(tr).find("td#total_price_hidden").text();
            var content_table_oder = "";
            content_table_oder += "<tr>" +
                "<td style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>" + name_product + "</td>" +
                "<td style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>" + sl + "</td>" +
                "<td style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>" + price_hidden + "</td>" +
                "<td style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>" + total_discount_hidden + "</td>" +
                "<td style='padding: 8px;text-align: left;border-bottom: 1px solid #ddd;'>" + total_price_hidden + "</td>" +
                "</tr>"
            $('#content_table').html(content_table_oder);
        });

        printwin.stop();
        printwin.print();
        printwin.close();
    }
}

//event click button thanh toan
function payment() {
    var nameCustomer = $('#nameCustomer').val();
    var numberPhone = $('#numberPhone').val();

    function index() {
        window.location = "/shopwatch.com/admin/sell";
    }
    if (nameCustomer == "" || numberPhone == "") {
        alert('nhập đầy đủ thông tin tên khách hàng và số điện thoại')
    } else {
        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/sell/payment/saveOrder',
            dataType: 'json',
            success: function(data) {
                saveProductOrder();
                saveBill();
                checkAmountOfProduct();
                setTimeout(index, 2000);
                swal("Bạn đã thanh toán thành công!", "You clicked the button!", "success");
                console.log(data);
            }
        });
    }
}

function saveProductOrder() {

    $('#tableOder tbody tr').each(function(index, tr) {

        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/sell/payment/saveProductOrder',
            dataType: 'json',
            data: {
                product_id: $(tr).find("p#id_product").text(),
                amount_of: Number($(tr).find("input#sl").val()),
                total_discount: $(tr).find("td#total_discount_hidden").text(),
                total_price: $(tr).find("td#total_price_hidden").text()
            },
            success: function(data) {
                console.log(data);
            }
        });
    });

}

function saveBill() {
    $.ajax({
        method: 'get',
        url: '/shopwatch.com/admin/sell/payment/saveBill',
        dataType: 'json',
        data: {
            customer_name: $('#nameCustomer').val(),
            phone_number: $('#numberPhone').val(),
            total_price: $('#totalPrice').text(),
            customer_pay: $('#customer_sent').val(),
            return: $('#return').text()
        },
        success: function(data) {
            console.log(data);
        }
    });
}

function checkAmountOfProduct() {

    $('#tableOder tbody tr').each(function(index, tr) {

        $.ajax({
            method: 'get',
            url: '/shopwatch.com/admin/sell/payment/checkAmountOfProduct',
            dataType: 'json',
            data: {
                product_id: $(tr).find("p#id_product").text(),
                amount_of: Number($(tr).find("input#sl").val()),
            },
            success: function(data) {
                console.log(data);
            }
        });
    });

}