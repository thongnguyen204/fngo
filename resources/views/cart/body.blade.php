@if (Session::has('Cart') != null)
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
                        <a class="product-thumb" href="{{route('tour.show',$product['productInfo']->id)}}"><img style="width: 200px; height: 160px"
                                src="{{$product['productInfo']->main_image}}" alt="Product"></a>
                        <div class="product-info">
                            <h4 class="product-title"><a href="{{route('tour.show',$product['productInfo']->id)}}">{{$product['productInfo']->title}}</a></h4>
                            
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    {{-- <div class="count-input">
                        <input class="form-control" type="text" value="{{$product['quantity']}}">
                    </div> --}}
                    <div class="quantity">
                        <div class="pro-qty">
                            <input data-id="{{$product['productInfo']->product_code}}" id="product-{{$product['productInfo']->product_code}}" type="text" value="{{$product['quantity']}}">
                        </div>
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



<div class="shopping-cart-footer">
    <div class="column">
        {{-- <a class="btn btn-outline-secondary" href=""><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a> --}}
    </div>
    <div class="column">
        <a class="update btn btn-primary" href="#!" data-toast="" data-toast-type="success" data-toast-position="topRight"
            data-toast-icon="icon-circle-check" data-toast-title="Your cart"
            data-toast-message="is updated successfully!">
            {{__('cart.Update Cart')}}
        </a>
        <a class="btn btn-success" href="#">{{__('cart.Checkout')}}</a>
    </div>
</div>
<input id="noti" type="hidden" value="{{$noti}}">
<script src="{{ asset('js/cart.js') }}" defer></script>
<script>
    
    $(".update").on("click",function(){
        var list= [];
        $("table tbody tr td").each(function(){
            $(this).find("input").each(function(){
                var element = {key: $(this).data("id"),value: $(this).val()};
                list.push(element);
            });
        });
        // var list1 = [1,2,3]
        $.ajax({
            url: "updateCart",
            type:'POST',
            data:{
                "_token": "{{ csrf_token() }}",
                "data": list,
            }
        }).done(function(respone){
            var icon = '<span class="bi bi-bag-dash"></span>';
            $("#change").empty();
            $("#change").html(respone);
            var noti = $( "#noti" ).val();
            alertify.notify(icon+ " " + noti, 'custom');
        });
        $.ajax({
            url: "cartQuantity" ,
            type:'GET',   
        }).done(function(respone){
            $('#CartCount').text(respone);
            
        });
    });
</script>
    

@endif