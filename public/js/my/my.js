let origin = location.origin
$(document).ready(function () {
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
                        $('#checkAll').prop('checked' , false)
                    }
                },

                error: function () {
                    //
                }
            });
            $('#delete-cart').attr('data-dismiss', 'modal')
        }


    });
});
$(document).ready(function () {
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
                        html += '<li>'
                        html += '<a href="#" class="photo"><img src="http://127.0.0.1:8000/storage/productImage/' + item.item.image + '" class="cart-thumb" alt=""/></a>'
                        html += '<h6><a href="#">' + item.item.name + '</a></h6>'
                        html += '<p>' + item.quantity + 'x-' + '<span class="price">' + item.item.unit_price + '</span></p>'
                        html += '<li>'
                    }
                })
                $('#count-cart').html(count_cart)
                $('.cart-list').html(html)
                $('.side').addClass('on')
            },


            error: function () {
                //
            }
        });
    });

    $('#checkAll').click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});


function increment(key) {
    let amount = parseInt($('#amount-' + key).val());
    amount++;
    if (amount <= 0 ){
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
                if (index == key){
                    $('#price-' + key).html(item.price)
                    $('#amount-' + key).val(amount)
                }
            })

        },

        error: function () {

        }
    })
}

function reduction(key) {
    let amount = parseInt($('#amount-' + key).val());
    amount--;
    if (amount <= 0 ){
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
                        if (index == key){
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
