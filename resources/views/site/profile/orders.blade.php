@extends('site.layouts.app')
@push('head')

@endpush
@section('content')
    <div class="container">
        <h2 class="mt-3 mb-2">{{__('site.myOrders')}}</h2>
        <main class="main">
            <div class="container">
                <div class="row" id="cartBox">
                    @if(!$orders->isEmpty())
                        <div class="col-lg-12">
                            <div class="cart-table-container">
                                <table class="table table-cart" id="cartTable">
                                    <thead>
                                    <tr>
                                        <th class="iteration-col">№</th>
                                        <th class="order_id-col">{{__('site.order_id_inOrders')}}</th>
                                        <th class="name-col">{{__('site.fullname_inOrders')}}</th>
                                        <th class="email-col">{{__('site.email_inOrders')}}</th>
                                        <th class="phone-col">{{__('site.phone_inOrders')}}</th>
                                        <th class="payment-col">{{__('site.payment_inOrders')}}</th>
                                        <!--<th class="delivery-col">{{__('site.delivery_inOrders')}}</th>-->
                                        <th class="total-col">{{__('site.total_inOrders')}}</th>
                                        <th class="details-col"></th>
                                        <!--<th class="product-col">Fullname</th>-->
                                        <!--<th class="price-col">Price</th>-->
                                        <!--<th class="qty-col">Quantity</th>-->
                                        <!--<th class="text-right">Subtotal</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                    
                                    @foreach($orders as $key => $order)
                    
                                        <tr id="touchspin{{$key}}" class="order-row">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->phone }}</td>
                                            @php
                                                if($order->payment == 'card') {
                                                    $payment = __('site.card_inOrder');
                                                } elseif($order->payment == 'cash'){
                                                    $payment = __('site.cash_inOrder');
                                                } else {
                                                    $payment = $order->payment;
                                                }
                                                
                                                if($order->delivery == 'take'){
                                                    $delivery = __('site.takeFromOffice_inOrder');
                                                } else {
                                                    $delivery = $order->delivery;
                                                }
                                            @endphp
                                            <td>{{ $payment }}</td>
                                            <!--<td>{{ $delivery }}</td>-->
                                            <td>{{ $order->total }}</td>
                                            <td>
                                                <a href="{{ route('profile.showOneOrder', $order->id) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                    
                                    @endforeach
                                    </tbody>
                    
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mb-6"></div>
        </main>
    </div>
@endsection