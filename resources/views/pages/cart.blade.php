@extends('layouts.guest')

@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                    <span></span> Cart
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Your Cart</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">
                                {{auth()->user()->carts()->count()}}
                            </span> products in your cart</h6>
                        <h6 class="text-body"><a href="{{route('cart.clear')}}" class="text-muted"><i
                                        class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse(auth()->user()->carts as $item)
                                <tr class="py-12">
                                    <td class="custome-checkbox pl-30">
                                    </td>
                                    <td class="image product-thumbnail pt-40"><img
                                                src="assets/imgs/shop/product-1-1.jpg" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                            href="{{route('product', [$item->product->id, $item->product->name])}}">{{$item->product->name}}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-body">${{$item->product->price}} </h4>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink mr-15">
                                            <div class="detail-qty border radius">
                                                <a onclick="decrease('qid-{{$item->id}}')" class="qty-down"><i
                                                            class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val" id="qid-{{$item->id}}">{{$item->quantity}}</span>
                                                <a onclick="increase('qid-{{$item->id}}')" class="qty-up"><i
                                                            class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <script>
                                                function increase(id) {
                                                    let qid = document.getElementById(id);
                                                    let qidVal = parseInt(qid.innerText);
                                                    qidVal++;
                                                    qid.innerText = qidVal.toString();
                                                    // Update Subtotal
                                                    document.getElementById('sub-total-' + id).innerText = "$" + (qidVal * {{$item->product->price}}).toFixed(2);

                                                    // fetch api to update cart
                                                    updateCart(qidVal, id.replace('qid-', '').toString());
                                                }

                                                function decrease(id) {
                                                    let qid = document.getElementById(id);
                                                    let qidVal = parseInt(qid.innerText);
                                                    if (qidVal > 1) {
                                                        qidVal--;
                                                        qid.innerText = qidVal.toString();
                                                    }
                                                    // Update Subtotal
                                                    document.getElementById('sub-total-' + id).innerText = "$" + (qidVal * {{$item->product->price}}).toFixed(2);
                                                    // fetch api to update cart
                                                    updateCart(qidVal, id.replace('qid-', '').toString());
                                                }

                                                function updateCart(qidVal, id) {
                                                    try {
                                                        let url = "{{route('cart.update', ['id' => "item_id", 'quantity' => "qidVal"])}}"
                                                        url = url.replace('item_id', id);
                                                        url = url.replace('qidVal', qidVal);
                                                        fetch(url, {
                                                            method: 'GET',
                                                            headers: {
                                                                'Content-Type': 'application/json',
                                                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                                                            }
                                                        }).then(response => response.json())
                                                    } catch (e) {
                                                        // console.log(e);
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-brand" id="sub-total-qid-{{$item->id}}">${{$item->product->price * $item->quantity}} </h4>
                                    </td>
                                    <td class="action text-center" data-title="Remove"><a href="#" class="text-body"><i
                                                    class="fi-rs-trash"></i></a></td>
                                </tr>
                            @empty
                                <!-- Empty Cart -->
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="cart-action d-flex justify-content-between">
                        <a href="{{route('home')}}" class="btn "><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
                        <a href="" class="btn  mr-10 mb-sm-15"><i class="fi-rs-refresh mr-10"></i>Update Cart</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Shipping</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">Free</h5></td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        @php
                                            $total = 0;
                                            foreach (auth()->user()->carts as $item) {
                                                $total += $item->product->price * $item->quantity;
                                            }
                                        @endphp
                                        <h4 class="text-brand text-end" id="total">${{$total}}</h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('checkout')}}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
