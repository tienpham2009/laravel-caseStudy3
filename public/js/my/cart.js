function show(res) {
    let data = res.data
    let html = '';
    $.each(data, function (index, item) {
        html += '<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">\n' +
            '                                            <div class="products-single fix">\n' +
            '                                                <div class="box-img-hover image-product">\n' +
            '                                                    <div class="type-lb">\n' +
            '                                                        <p class="sale">Sale</p>\n' +
            '                                                    </div>\n' +
            '                                                    <img src="' + origin + '/storage/productImage/' + item.image + '" class="img-fluid" alt="Image">\n' +
            '                                                    <div class="mask-icon">\n' +
            '                                                        <ul>\n' +
            '                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"\n' +
            '                                                                   title="View"><i class="fas fa-eye"></i></a></li>\n' +
            '                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"\n' +
            '                                                                   title="Compare"><i class="fas fa-sync-alt"></i></a>\n' +
            '                                                            </li>\n' +
            '                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"\n' +
            '                                                                   title="Add to Wishlist"><i class="far fa-heart"></i></a>\n' +
            '                                                            </li>\n' +
            '                                                        </ul>\n' +
            '                                                        <button class="cart add-cart side-menu"  id="' + item.id + '">Add to Cart</button>\n' +
            '                                                    </div>\n' +
            '                                                </div>\n' +
            '                                                <div class="why-text">\n' +
            '                                                    <h4>' + item.name + '</h4>\n' +
            '                                                    <h5>' + item.unit_price + '</h5>\n' +
            '                                                </div>\n' +
            '                                            </div>\n' +
            '                                        </div>'
    });

    $('.filter-data').html(html);
}

let origin = location.origin

$(document).ready(function () {

    // chuc nang xoa gio hang
    $('#delete-cart').click(function () {
        let id = [];
        $(':checkbox:checked').each(function (i) {
            id[i] = $(this).val();
        });
        if (id.length === 0) {
            $('#content').html('Chọn sản phẩm bạn muốn xóa !');
        } else {
            $.ajax({
                type: 'GET',
                url: origin + '/cart/delete-cart',
                data: {id: id},

                success: function () {
                    for (let i = 0; i < id.length; i++) {
                        $('#delete-' + id[i]).remove()
                        $('#checkAll').prop('checked', false)
                    }
                },

                error: function () {
                    //
                }
            });
            $('#delete-cart').attr('data-dismiss', 'modal')
        }


    });

    // chuc nang show side-menu-cart
    $('body').on('click', '.side-menu', function () {
        let id = $(this).attr('id')
        $.ajax({
            type: 'GET',
            url: origin + '/cart/add',
            data: {id: id},

            success: function (res) {
                let carts = res.items;
                let html = '';
                let count_cart = Object.keys(carts).length;
                console.log(count_cart)
                $.each(carts, function (index, item) {
                    if (item) {
                        sub_total = item.price;
                        html += '<li>'
                        html += '<a href="" style="pointer-events: none" class="photo"><img src="http://127.0.0.1:8000/storage/productImage/' + item.item.image + '" class="cart-thumb" alt=""/></a>'
                        html += '<h6><a href="#" style="pointer-events: none">' + item.item.name + '</a></h6>'
                        html += '<p>' + item.quantity + 'x-' + '<span class="price">' + item.item.unit_price + '</span></p>'
                        html += '<li>'
                    }
                })
                $('#count-cart').html(count_cart)
                $('.cart-list').html(html)
                $('.side').addClass('on')

                setInterval(function (){
                    $('.side').removeClass('on')
                } , 5000)
            },


            error: function () {
                //
            }
        });
    });

    // chuc nang chon tat ca gio hang
    $('#checkAll').click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    // chuc nang chon tat ca san pham
    $('#select-all').click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    // chuc nang loc theo gia
    $('#filter-price').click(function () {
        let prices = $('#slider-range').slider('option', 'values');
        $.ajax({
            type: 'GET',
            url: origin + '/filterPrice',
            data: {
                prices: prices
            },

            success: function (res) {
                show(res)
            },

            error: function () {

            }
        })
    })

    //chuc nang show tat ca san pham
    $('body').on('click', '#show-all', function () {
        $.ajax({
            type: 'GET',
            url: origin + '/show',

            success: function (res) {
                show(res)
            },

            error: function () {

            }
        });
    })

    // chuc nang xoa san pham
    $('body').on('click', '#delete-product', function () {
        let id = [];
        $(':checkbox:checked').each(function (i) {
            id[i] = $(this).val();
        });
        if (id.length === 0) {
            $('#content').html('Chọn sản phẩm bạn muốn xóa !');
        } else {
            $.ajax({
                type: 'GET',
                url: origin + '/Product/delete',
                data: {id: id},

                success: function () {
                    for (let i = 0; i < id.length; i++) {
                        $('#delete-product-' + id[i]).remove()
                        $('#select-all').prop('checked', false)
                    }
                },

                error: function () {
                    //
                }
            });
        }
    })


});


// chuc nang tang so luong hang
function increment(key) {
    let amount = parseInt($('#amount-' + key).val());
    amount++;
    if (amount <= 0) {
        amount = 0;
    }
    $.ajax({
        type: 'GET',
        url: origin + '/cart/update',
        data: {
            key: key,
            amount: amount
        },

        success: function (res) {
            let carts = res.items;
            $.each(carts, function (index, item) {
                if (index == key) {
                    $('#price-' + key).html(item.price)
                    $('#amount-' + key).val(amount)
                }
            })

        },

        error: function () {

        }
    })
}

// chuc nang giam so luong hang
function reduction(key) {
    let amount = parseInt($('#amount-' + key).val());
    amount--;
    if (amount <= 0) {
        amount = 0;
    }
    $.ajax({
            type: 'GET',
            url: origin + '/cart/update',
            data: {
                key: key,
                amount: amount
            },

            success: function (res) {
                let carts = res.items;
                $.each(carts, function (index, item) {
                    if (item) {
                        if (index == key) {
                            $('#price-' + key).html(item.price)
                            $('#amount-' + key).val(amount)
                        }

                    }
                })

            },

            error: function () {

            }
        }
    )

}


// chuc nang loc theo danh muc
function filterCate(category_id) {
    $.ajax({
        type: 'GET',
        url: origin + '/filterCate',
        data: {
            category_id: category_id
        },

        success: function (res) {
            show(res)
        },

        error: function () {

        }
    });
}



