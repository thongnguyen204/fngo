<div class="table-responsive shopping-cart">
            
    <table class="table">
        <thead>
            <tr>
                {{-- {{__('cart.Product')}} --}}
                <th></th>
                <th class="text-center">{{__('cart.Quantity')}}</th>
                <th class="text-center">{{__('cart.Price')}}</th>

                <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#">Clear Cart</a></th>
            </tr>
        </thead>
        <tbody>

            @foreach (Session::get('Cart')->products as $product)
            <tr>
                <td>
                    <div class="product-item">
                        <a class="product-thumb" href="#"><img style="width: 200px; height: 160px"
                                src="{{$product['productInfo']->main_image}}" alt="Product"></a>
                        <div class="product-info">
                            <h4 class="product-title"><a href="#">{{$product['productInfo']->title}}</a></h4>
                            <span><em>Size:</em> 10.5</span><span><em>Color:</em> Dark Blue</span>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <div class="count-input">
                        <input class="form-control" type="number" value="{{$product['quantity']}}">
                    </div>
                </td>
                <td class="text-center text-lg text-medium">{{$product['price']}}đ</td>

                <td class="text-center">
                    <a class="remove-from-cart" href="#!" data-toggle="tooltip" title=""
                        data-original-title="Remove item">
                        <div class="remove">
                            <i class=" fa fa-trash" data-id="{{$product['productInfo']->product_code}}"></i>
                        </div>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<div class="shopping-cart-footer">
    <div class="column">
        {{-- <form class="coupon-form" method="post">
            <input class="form-control form-control-sm" type="text" placeholder="Coupon code" required="">
            <button class="btn btn-outline-primary btn-sm" type="submit">Apply Coupon</button>
        </form> --}}
    </div>
    <div class="column text-lg">{{__('cart.Total')}}: <span class="text-medium">{{Session::get('Cart')->totalPrice}}đ</span>
    </div>
</div>

<input id="noti" type="hidden" value="{{$noti}}">