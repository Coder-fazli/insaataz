@if(!$products->isEmpty())
    <div class="col-lg-8">
        <div class="cart-table-container">
            <table class="table table-cart" id="cartTable">
                <thead>
                <tr>
                    <th class="thumbnail-col"></th>
                    <th class="product-col">{{__('site.product_inCartPage')}}</th>
                    <th class="price-col">{{__('site.price_inCartPage')}}</th>
                    <th class="qty-col">{{__('site.quantity_inCartPage')}}</th>
                    <th class="text-right">{{__('site.subtotal_inCartPage')}}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $key => $product)

                    <tr id="touchspin{{$key}}" class="product-row">
                        <td>
                            <figure class="product-image-container">
                                <a href="{{route('product',$product->slug)}}" class="product-image">
                                    <img src="{{get_image($product->front_image,'list')}}"
                                         alt="product">
                                </a>
                                <a href="#" class="btn-remove icon-cancel btnRemove"
                                   title="{{__('site.removeProduct')}}" data-row="{{$product->rowId}}"></a>
                            </figure>
                        </td>
                        <td class="product-col">
                            <h5 class="product-title">
                                <a href="{{route('product',$product->slug)}}">{{$product->title}}</a>
                            </h5>
                        </td>
                        <td>{!! currency_index() !!} {{$product->discount_price ?? $product->price}}</td>
                        <td>
                            <div class="product-single-qty">
                                <input class="horizontal-quantity cartInput form-control"
                                       max="{{$product->stock}}" value="{{$product->qty}}" type="text"
                                       data-id="{{$product->id}}" data-row="{{$product->rowId}}">
                            </div>
                        </td>
                        <td class="text-right"><span
                                class="subtotal-price">{!! currency_index() !!} {{$product->total}}</span>
                        </td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="cart-summary">
            <h3>{{__('site.cart_totals')}}</h3>

            <form action="{{route('order')}}" method="get">
                <table class="table table-totals">
                    <!--<tbody>-->
                    <!--<tr>-->
                    <!--    <td colspan="2" class="text-left">-->
                            <!-- back-end: input-lar (.form-group-lar) burda olduqda input-ların width-i table-ın width-ini keçirdi deyə çıxartdım -->
                    <!--    </td>-->
                    <!--</tr>-->
                    <!--</tbody>-->
                     @php
                        $user  = auth('client')->user();
                        $name  = old('name') ?: ($user ? $user->fullname : '');
                        $email = old('email') ?: ($user ? $user->email : '');
                        $phone = old('phone') ?: ($user ? $user->phone : '');
                    @endphp
                    <div class="form-group form-group-sm">
                        <input name="name" type="text"
                               class="form-control  @error('name') is-invalid @enderror form-control-sm"
                               placeholder="{{__('contact_form.name')}}" value="{{$name}}">
                    </div>
                    <div class="form-group form-group-sm">
                        <input name="email" type="email"
                               class="form-control  @error('email') is-invalid @enderror form-control-sm"
                               placeholder="{{__('contact_form.email')}}" value="{{$email}}">
                    </div>
                    <div class="form-group form-group-sm">
                        <input name="phone" type="tel"
                               class="form-control  @error('name') is-invalid @enderror  form-control-sm"
                               value="{{$phone}}"
                               placeholder="{{__('contact_form.phone')}}">
                    </div>
                    <div class="form-group form-group-sm">
                        <div class="input__box">
                            <input type="radio" name="payment" value="card" id="card"> <label for="card">{{__('contact_form.card')}}</label>
                        </div>
                        <div class="input__box">
                            <input type="radio" name="payment" value="cash" id="cash"> <label for="cash">{{__('contact_form.cash')}}</label>
                        </div>
                        
                    </div>
                    
                     <div class="form-group form-group-sm adress__btn">
                        <div class="input__box">
                            <input type="radio" name="delivery" value="take" id="take"> <label for="take">{{__('contact_form.take_away')}}</label>
                        </div>
                        <div class="input__box">
                            <input type="radio" name="delivery" value="deliveryFromAddress" id="deliveryFromAddress"> <label for="deliveryFromAddress">{{__('contact_form.delivery_from_address')}}</label>
                        </div>
                        
                    </div>
                     <div class="form-group form-group-sm adress__box">
                        <input name="address" type="text"
                               class="form-control  @error('name') is-invalid @enderror  form-control-sm"
                               value="{{old('address')}}"
                               placeholder="{{__('contact_form.adress')}}">
                    </div>
                    <div class="form-group form-group-sm">
                        <textarea name="message" type="tel"
                                  class="form-control @error('name') is-invalid @enderror  form-control-sm"
                                  placeholder="{{__('contact_form.message')}}">{{old('message')}}</textarea>
                    </div>
                    <tfoot>
                        <tr>
                            <td>{{__('site.total')}}</td>
                            <td>{!! currency_index() !!} {{$products->sum('total')}}</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="checkout-methods">
                    <button type="submit" class="btn btn-block btn-dark">{{__('site.checkout')}}
                        <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>

        </div>
    </div>
@endif
