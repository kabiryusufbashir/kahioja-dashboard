@extends('layouts.vendor') 

@section('content')
                    <div class="content-area">

                            @if($user->checkWarning())

                                <div class="alert alert-danger validation text-center">
                                        <h3>{{ $user->displayWarning() }} </h3> <a href="{{ route('vendor-warning',$user->verifies()->where('admin_warning','=','1')->orderBy('id','desc')->first()->id) }}"> {{$langg->lang803}} </a>
                                </div>

                            @endif

                        
                        @include('includes.form-success')
                        <div class="row row-cards-one">
                                
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg2">
                                        <div class="left">
                                            <h5 class="title">Available Balance</h5>
                                            <span class="number">₦{{ $user->current_balance }}</span>
                                        </div>
                                        <!--<div class="right d-flex align-self-center">-->
                                        <!--    <div class="icon">-->
                                        <!--       <i class="icofont-dollar-true"></i>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg4">
                                        <div class="left">
                                            <h5 class="title">Current Balance</h5>
                                            <span class="number">₦{{ App\Models\Withdraw::where('user_id','=',$user->id)->where('status','=','pending')->sum('amount') }}</span>
                                        </div>
                                        <!--<div class="right d-flex align-self-center">-->
                                        <!--    <div class="icon">-->
                                        <!--       <i class="icofont-dollar-true"></i>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg6">
                                        <div class="left">
                                            <h5 class="title">Total Earnings!</h5>
                                            <span class="number">{{ App\Models\Product::vendorConvertPrice( App\Models\VendorOrder::where('user_id','=',$user->id)->where('status','!=','pending')->where('status','!=','processing')->where('status','!=','declined')->sum('price') ) }}</span>
                                        </div>
                                        <!--<div class="right d-flex align-self-center">-->
                                        <!--    <div class="icon">-->
                                        <!--       <i class="icofont-dollar-true"></i>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg1">
                                        <div class="left">
                                            <h5 class="title">Orders Pending! </h5>
                                            <span class="number">{{ count($pending) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">View All</a>
                                        </div>
                                        <!--<div class="right d-flex align-self-center">-->
                                        <!--    <div class="icon">-->
                                        <!--        <i class="icofont-dollar"></i>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg2">
                                        <div class="left">
                                            <h5 class="title">Orders Procsessing!</h5>
                                            <span class="number">{{ count($processing) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">View All</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-truck-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg3">
                                        <div class="left">
                                            <h5 class="title">Ready for Delivery!</h5>
                                            <span class="number">{{ count($completed) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">View All</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-truck-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg6">
                                        <div class="left">
                                            <h5 class="title">Orders Delivered!</h5>
                                            <span class="number">{{ count($delivered) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">View All</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-truck-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg4">
                                        <div class="left">
                                            <h5 class="title">Total Products!</h5>
                                            <span class="number">{{ count($user->products) }}</span>
                                            <a href="{{route('vendor-prod-index')}}" class="link">View All</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-cart-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>  


                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg5">
                                        <div class="left">
                                            <h5 class="title">Total Item Sold!</h5>
                                            <span class="number">{{ App\Models\VendorOrder::where('user_id','=',$user->id)->where('status','!=','pending')->where('status','!=','declined')->sum('qty') }}</span>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-shopify"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>

@endsection
