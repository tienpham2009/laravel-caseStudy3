let origin = location.origin
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
            '                                                            <li><a href="'+ origin +'/'+ item.id+ '/detail'+'" data-toggle="tooltip" data-placement="right"\n' +
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

                success: function (res) {
                    let subTotal = res.totalPrice;
                    console.log(subTotal)
                    for (let i = 0; i < id.length; i++) {
                        $('#delete-' + id[i]).remove()
                        $('#checkAll').prop('checked', false)
                    }
                    $('#grand-total').html(subTotal)
                    $('#sub-total').html(subTotal)
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
                $.each(carts, function (index, item) {
                    if (item) {
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


                // setInterval(function () {
                //     $('.side').removeClass('on')
                // }, 5000)
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
                console.log(res)
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
                show(res.data)
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
        console.log(id)
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

    //chuc nang kiem tra check-out
    $('body').on('click' , '#check-out' , function (){
        let price = $('#grand-total').html();
        if (price > 0){
            $(this).attr('data-target' , '#modalLoginForm');
        }else {
            $(this).attr('data-target' , '#check-cart')
        }
    })

    //chuc nang sap xep theo gia
    $('#basic').change(function (){
        let sort = $(this).val()
        $.ajax({
            url: origin + '/sort',
            type: 'GET',
            data:{
                sort:sort
            },

            success:function (res){
                show(res)
            },

            error:function (){

            }
        })
    })

    //chuc nang search theo ten
    $('#searchByName').click(function (){
        let text = $('#search').val();
        $.ajax({
            url: origin + '/searchByName',
            type: 'GET',
            data:{
                text:text
            },

            success:function (res){
                show(res)
            },

            error:function (){

            }
        })
    })


});
// hien thi cac tinh
$(window).on('load', function () {
    $.ajax({
        url: 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/province',
        method: 'GET',
        headers: {
            'token': "d250e2f1-de5e-11eb-9388-d6e0030cbbb7",
            'Content-Type': 'application/json'
        },
        dataType: 'json',
        success: function (res) {
            let data  = res.data;
            let html = '<option value="">-Tỉnh thành-</option>'

            $.each(data , function (index , item){
                // console.log(item)
                html += '<option provinceID="'+item.ProvinceID+'" value="'+item.ProvinceName+'">'+item.ProvinceName+'</option>'
            })

            $('#province').html(html)

        },

        error: function () {

        }
    })
})

// hien thi quan-huyen-phuong-xa
$(document).ready(function (){
    // hien thi quan huyen
    $('body').on('change','#province',function (){
        let provinceID = $('option:selected' , this ).attr('provinceID');
        $.ajax({
            url: 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/district',
            method: 'GET',
            headers: {
                'token': "d250e2f1-de5e-11eb-9388-d6e0030cbbb7",
                'Content-Type': 'application/json'
            },
            dataType: 'json',
            success: function (res) {
                let data  = res.data;
                let html = '<option value="">-Quận Huyện-</option>'

                $.each(data , function (index , item){
                    if (item.ProvinceID == provinceID){
                        html += '<option districtID="'+item.DistrictID+'" value="'+item.DistrictName+'">'+item.DistrictName+'</option>'
                    }

                })

                $('#district').html(html)

            },

            error: function () {

            }
        })
    })
    $('#1').click(function (){
        console.log(1)
    })

    // hien thi phuong xa
    $('body').on('change','#district',function (){
        let districtID = $('option:selected' , this).attr('districtID')
        console.log(districtID)
        $.ajax({
            url: 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id=' + districtID,
            method: 'GET',
            headers: {
                'token': "d250e2f1-de5e-11eb-9388-d6e0030cbbb7",
                'Content-Type': 'application/json'
            },
            dataType: 'json',
            success: function (res) {
                let data  = res.data;
                let html = '<option value="">-Phường Xã-</option>'

                $.each(data , function (index , item){
                    console.log(item)
                    if (item.DistrictID == districtID){
                        html += '<option value="'+item.WardName+'">'+item.WardName+'</option>'
                    }

                })

                $('#ward').html(html)
            },

            error: function () {

            }
        })
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
            let subTotal = res.totalPrice;
            $.each(carts, function (index, item) {
                if (index == key) {
                    $('#price-' + key).html(item.price)
                    $('#amount-' + key).val(amount)
                }
            })

            $('#sub-total').html(subTotal)
            $('#grand-total').html(subTotal)


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
                let subTotal = res.totalPrice;
                $.each(carts, function (index, item) {
                    if (item) {
                        if (index == key) {
                            $('#price-' + key).html(item.price)
                            $('#amount-' + key).val(amount)
                        }

                    }
                })
                $('#sub-total').html(subTotal)
                $('#grand-total').html(subTotal)
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


