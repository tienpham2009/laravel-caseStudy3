$(document).ready(function (){
    let origin = location.origin

    $('body').on('click' , '#show-all' , function (){
        $.ajax({
            type:'GET',
            url:origin + '/show',

            success: function (res){
                let data = res.data
                let html = '';
                $.each(data , function (index  , item){
                    html += '<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">\n' +
                        '                                            <div class="products-single fix">\n' +
                        '                                                <div class="box-img-hover image-product">\n' +
                        '                                                    <div class="type-lb">\n' +
                        '                                                        <p class="sale">Sale</p>\n' +
                        '                                                    </div>\n' +
                        '                                                    <img src="'+ origin + '/storage/productImage/'+item.image+'" class="img-fluid" alt="Image">\n' +
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
                        '                                                        <button class="cart add-cart side-menu"  id="'+item.id+'">Add to Cart</button>\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '                                                <div class="why-text">\n' +
                        '                                                    <h4>'+item.name+'</h4>\n' +
                        '                                                    <h5>'+item.unit_price+'</h5>\n' +
                        '                                                </div>\n' +
                        '                                            </div>\n' +
                        '                                        </div>'
                });

                $('.filter-data').html(html);
            },

            error:function (){

            }
        });
    })

    function filterCate(category_id){
        $.ajax({
            type:'GET',
            url:origin + '/filterCate',
            data:{
                category_id:category_id
            },

            success: function (res){
                let data = res.data
                let html = '';
                $.each(data , function (index  , item){
                    html += '<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">\n' +
                        '                                            <div class="products-single fix">\n' +
                        '                                                <div class="box-img-hover image-product">\n' +
                        '                                                    <div class="type-lb">\n' +
                        '                                                        <p class="sale">Sale</p>\n' +
                        '                                                    </div>\n' +
                        '                                                    <img src="'+ origin + '/storage/productImage/'+item.image+'" class="img-fluid" alt="Image">\n' +
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
                        '                                                        <button class="cart add-cart side-menu"  id="'+item.id+'">Add to Cart</button>\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '                                                <div class="why-text">\n' +
                        '                                                    <h4>'+item.name+'</h4>\n' +
                        '                                                    <h5>'+item.unit_price+'</h5>\n' +
                        '                                                </div>\n' +
                        '                                            </div>\n' +
                        '                                        </div>'
                });

                $('.filter-data').html(html);
            },

            error:function (){

            }
        });
    }

});



