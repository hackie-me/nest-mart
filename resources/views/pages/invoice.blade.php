@extends('layouts.guest')

@section('content')
    <div class="invoice invoice-content invoice-4">
        <div class="back-top-home hover-up mt-30 ml-30">
            <a class="hover-up" href="{{route('home')}}"><i class="fi-rs-home mr-5"></i> Homepage</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-header">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="logo">
                                            <a href="{{route('home')}}">
                                                <img src="{{asset('assets/imgs/theme/logo.svg')}}" alt="logo"/>
                                            </a>
                                        </div>
                                        <p class="invoice-addr-1 mt-10">
                                            <strong>Invoice Numb:</strong> <strong class="text-brand">#{{$id}}</strong>
                                            <br/>
                                            <strong>Invoice Date:</strong> {{$invDate}}
                                            <br/>
                                            <strong>Due Date:</strong> {{$invDueDate}}
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Invoice To</h4>
                                            <p class="invoice-addr-1">
                                                <strong class="text-brand"></strong> {{$vendorDetails->name}} <br/>
                                                {{$vendorDetails->address->address_line_1}}<br/>
                                                {{$vendorDetails->address->city }}, {{$vendorDetails->address->country}}
                                                , {{$vendorDetails->address->zip_code}}
                                                <br/>
                                                <abbr title="Phone">Phone:</abbr> {{$vendorDetails->phone}}<br/>
                                                <abbr title="Email">Email: </abbr>
                                                <a href="mailto:{{$vendor->email}}">{{$vendor->email}} </a><br/>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Bill To</h4>
                                            <p class="invoice-addr-1">
                                                <strong class="text-brand">{{$invoice->first_name . ' ' . $invoice->first_name }}</strong>
                                                <br/>
                                                {{$invoice->address_line_1}}<br/>
                                                {{$invoice->city }}, {{$invoice->country}}, {{$invoice->zip_code}}<br/>
                                                <abbr title="Phone">Phone:</abbr> {{$invoice->phone}}<br/>
                                                <abbr title="Email">Email: </abbr>
                                                <a href="mailto:{{$invoice->email}}">{{$invoice->email}} </a><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table table-striped invoice-table">
                                        <thead class="bg-active">
                                        <tr>
                                            <th>Item Item</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $item)
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>{{$item->product->name}}</span>
                                                        <small>SKU: {{$item->product->sku}}</small>
                                                    </div>
                                                </td>
                                                <td class="text-center">${{$item->product->price}}</td>
                                                <td class="text-center">{{$item->quantity}}</td>
                                                <td class="text-right">
                                                    ${{$item->product->price * $item->quantity}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                            <td class="text-right">
                                                ${{$subTotal}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end f-w-600">Tax</td>
                                            <td class="text-right">
                                                ${{$tax}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                            <td class="text-right f-w-600">
                                                ${{$total}}
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom pb-80">
                                <div class="row">
                                    <div class="col-md-6">
                                        @if($payment_method == "Direct Bank Transfer")
                                            <h6 class="mb-15">Bank Transfer to</h6>
                                            <p class="font-sm">
                                                <strong>Account Name:</strong> Nest Mart<br/>
                                                <strong>Account Number:</strong> 94730100001498<br/>
                                                <strong>Swift Code:</strong> BARB0IND11
                                            </p>
                                        @elseif($payment_method == "Online Gateway")
                                            <h6 class="mb-15">Payment Method</h6>
                                            <p class="font-sm">
                                                <strong>Payment Method:</strong> Online Gateway<br/>
                                                <strong>Payment Status:</strong> {{$payment_status}}<br/>
                                            </p>
                                        @else
                                            <h6 class="mb-15">Payment Method</h6>
                                            <p class="font-sm">
                                                <strong>Payment Method:</strong> Cash on Delivery<br/>
                                                <strong>Payment Status:</strong> {{$payment_status}}<br/>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h6 class="mb-15">Total Amount</h6>
                                        <h3 class="mt-0 mb-0 text-brand">${{$total}}</h3>
                                        <p class="mb-0 text-muted">Taxes Included</p>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="hr mt-30 mb-30"></div>
                                    <p class="mb-0">
                                        <strong>Note:</strong>This is computer generated receipt and does not require
                                        physical signature.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="invoice-btn-group">
                                        <a href="javascript:printData()" class="btn btn-primary btn-icon"><i
                                                    class="fi-rs-printer"></i> Print</a>
                                        <a href="javascript:printData()" class="btn btn-primary btn-icon"><i
                                                    class="fi-rs-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                            <script>
                                // Print Function to print invoice container with Id: invoice_wrapper
                                function printData() {
                                    let divToPrint = document.getElementById("invoice_wrapper");
                                    let stylesheets = getStylesheets();
                                    let styles = stylesheets.map(url => `<link rel='stylesheet' type='text/css' href='${url}'>`).join('');
                                    let newWin = window.open("");
                                    newWin.document.write(styles + divToPrint.outerHTML);
                                    newWin.print();
                                    newWin.close();
                                }

                                function getStylesheets() {
                                    // Replace these with the actual paths to your stylesheets
                                    return [
                                        "{{asset("assets/css/plugins/slider-range.css")}}",
                                        "{{asset("assets/css/main.css")}}"
                                    ];
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
