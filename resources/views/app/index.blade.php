<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Visa and entry - Federal Foreign Office</title>

    <!-- Stylesheet File -->
    <link rel="stylesheet" href="{{asset('mobile/assets/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('mobile/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('mobile/assets/css/responsive.css')}}">
</head>

<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- auto notification start -->
    {{-- <div class="modal fade fade-modal-nitification" id="overlay">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="ba-bill-pay-inner">
                    <div class="ba-single-bill-pay">
                        <div class="thumb">
                            <img src="{{asset('mobile/assets/img/icon/6.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5>Recived Money By Aron Fince</h5>
                            <p>You have received a payment from Aorn Fice.</p>
                        </div>
                    </div>
                    <div class="amount-inner">
                        <h5><i class="fa fa-long-arrow-left"></i>$169</h5>
                        <a class="btn btn-blue" href="#">Read</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- auto notification end -->

    <!-- header start -->
    <div class="header-area" style="background-color: #e4dcfc">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <div class="menu-bar" style="color:#000000">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="col-sm-4 col-4 text-center">
                    <a href="{{url('/')}}/home" class="logo">
                        <img style="width:140px" src="{{asset('uploads/logo.png')}}" alt="logo">
                    </a>
                </div>
                <div class="col-sm-4 col-5 text-right">
                    <ul class="header-right">
                        <li>
                            <a  class="header-user" href="#">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i style="color:#000000" class="fa fa-power-off"></i>
                                </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->

    <!-- navbar end -->
    <div class="ba-navbar">
        <div class="ba-navbar-user">
            <div class="menu-close">
                <i class="la la-times"></i>
            </div>
            <div class="thumb">
                <img src="{{asset('mobile/assets/img/user.png')}}" alt="user">
            </div>
            <div class="details">
                <h5>{{Auth::User()->name}}</h5>
                <p>Acount Number: 99883323</p>
            </div>
        </div>

        <div class="ba-main-menu">

            <a class="btn btn-purple" href="#">View Profile</a>
        </div>
    </div>
    <!-- navbar end -->

    <!-- navbar end -->
    <div class="add-balance-inner-wrap">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Make transfer</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form method="POST" action="{{route('Transfer')}}">
                                @csrf
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">From</label>
                                        <select class="form-control custom-select" id="account1">
                                            <option value="0">My Account (*** 7284)</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}">

                                <div class="form-group basic">
                                    <label class="label">To</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">Account Number</span>
                                        </div>
                                        <input name="account_number" type="text" class="form-control form-control-lg" value="">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">kes</span>
                                        </div>
                                        <input name="amount" type="text" class="form-control form-control-lg" value="">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="submit" class="btn-c btn-primary btn-block btn-lg" data-dismiss="modal">Transfer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar end -->

    <!-- balance start -->
    <div class="balance-area pd-top-40 mg-top-50">
        <div class="container">
            <div class="balance-area-bg balance-area-bg-home">
                <div class="balance-title text-center">
                    <h6>Welcome Back! {{Auth::User()->name}}</h6>
                </div>
                <div class="ba-balance-inner text-center" style="background-image: url('{{asset('mobile/assets/img/bg/2.png')}}'); ">
                    <div class="row">
                        <?php
                        $Balances = DB::table('balances')->where('user_id',Auth::User()->id)->get();
                      ?>
                      @if($Balances->isEmpty())
                        <div class="col-6 pr-0">
                            <div class="icon">
                                <img src="{{asset('mobile/assets/img/icon/1.png')}}" alt="img">
                            </div>

                            <h5 class="title"> Available</h5>
                            <h5 class="amount" style="font-size:15px !important">KES 0.00</h5>
                        </div>
                        <div class="col-6 pr-0">
                            <div class="icon">
                                <img src="{{asset('mobile/assets/img/icon/1.png')}}" alt="img">
                            </div>
                            <h5 class="title">Pending </h5>
                            <h5 class="amount" style="font-size:15px !important">KES 0.00</h5>
                        </div>
                    @else
                        @foreach ($Balances as $balance)
                        <div class="col-6 pr-0">
                            <div class="icon">
                                <img src="{{asset('mobile/assets/img/icon/1.png')}}" alt="img">
                            </div>

                            <h5 class="title"> Available</h5>
                            <h5 class="amount" style="font-size:15px !important">KES {{$balance->available}}.00</h5>
                        </div>
                        <div class="col-6 pr-0">
                            <div class="icon">
                                <img src="{{asset('mobile/assets/img/icon/1.png')}}" alt="img">
                            </div>
                            <h5 class="title">Pending </h5>
                            <h5 class="amount" style="font-size:15px !important">KES {{$balance->pending}}.00</h5>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- balance End -->

    <br>
    <div class="add-balance-area pd-top-50">
        <div class="container">
            <center>

                @if(Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

                @if(Session::has('messageError'))
                                <div class="alert alert-danger">{{ Session::get('messageError') }}</div>
                @endif
                </center>
        </div>
    </div>

    <!-- add balance start -->
    <div class="add-balance-area pd-top-5">
        <div class="container">
            {{-- <div class="ba-add-balance-title ba-add-balance-btn">
                <h5>Add Balance</h5>
                <i class="fa fa-plus"></i>
            </div> --}}
            <div class="ba-add-balance-inner mg-top-40">
                <div class="row custom-gutters-20">
                    {{-- <div class="col-6">
                        <a class="btn btn-blue ba-add-balance-btn" href="#">Withdraw <i class="fa fa-arrow-down"></i></a>
                    </div> --}}
                    <div class="col-12">
                        <a style="background-color:#5d5386" class="btn btn-green ba-add-balance-btn" href="#">Transfer Funds <i class="fa fa-arrow-right"></i></a>
                    </div>
                    {{-- <div class="col-6">
                        <a class="btn btn-purple ba-add-balance-btn" href="#">Cards <i class="fa fa-credit-card-alt "></i></a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-green ba-add-balance-btn" href="#">Exchange <i class="fa fa-arrow-down"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- add balance End -->

    <!-- goal area Start -->
    <div class="goal-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Updates</h3>
                <a href="#">View All</a>
            </div>

        <?php
            $Updates = DB::table('updates')->OrderBy('id','DESC')->where('user_id',Auth::User()->id)->get();
         ?>
         @if($Updates->isEmpty())
         <div class="single-goal single-goal-one">
            <div class="row">
                <div class="col-12 pr-0">
                    <div class="details">
                        <h6>You have No New Updates</h6>
                        {{-- <p>{{$updates->content}}</p> --}}
                    </div>
                </div>
            </div>
        </div>
         @else
            @foreach ($Updates as $updates)
                <div class="single-goal single-goal-one">
                    <div class="row">
                        <div class="col-9 pr-0">
                            <div class="details">
                                <h6>{{$updates->title}}</h6>
                                <p>{{$updates->content}}</p>
                            </div>
                        </div>
                        <div class="col-3 pl-0">
                            <div class="circle-inner circle-inner-one">
                                {{-- <h6 class="goal-amount">$130</h6> --}}
                                <div class="chart-circle" data-value="1.0">
                                    <canvas width="52" height="52"></canvas>
                                    <div class="chart-circle-value text-center">100%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
         @endif






        </div>
    </div>
    <!-- goal area End -->


    <!-- transaction start -->
    <div class="transaction-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Transactions</h3>
                <a href="#">View All</a>
            </div>
            <ul class="transaction-inner">
                <?php
                   $Transactions = DB::table('transactions')->OrderBy('id','DESC')->where('user_id',Auth::User()->id)->get();
                ?>
                @if($Transactions->isEmpty())
                    <li class="ba-single-transaction">
                        <div class="details">
                            <div class="row">
                                <div class="col-12 pr-0">
                                    <h5>You have not Transacted Yet</h5>

                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    @foreach ($Transactions as $transaction)
                    <li class="ba-single-transaction">
                        <div class="details">
                            <div class="row">
                                <div class="col-8">
                                    <h5>{{$transaction->title}}.</h5>
                                    <p style="min-width:300px !important">{{$transaction->narrative}}</p>
                                </div>
                                <div class="col-4">
                                    @if($transaction->type == "Deposit")
                                      <h5 class="amount text-success">kes {{$transaction->amount}}</h5>
                                    @else
                                       <h5 class="amount text-danger">-kes {{$transaction->amount}}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    <hr>
                    @endforeach
                @endif


            </ul>
        </div>
    </div>
    <!-- transaction End -->





    <!-- Footer Area -->
    <div class="footer-area">
        <div class="footer-top text-center" style="background-image: url('{{url('/mobile/assets/img/bg/7.png')}}');">
            <div class="container">
                <p>Copyright © German Embassy Nairobi 2024. All Rights Reserved</p>
            </div>
        </div>
        {{-- <div class="container">
            <div class="footer-bottom text-center">
                <ul>
                    <li>
                        <a href="home.html">
                            <i class="fa fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="all-page.html">
                            <i class="fa fa-file-text"></i>
                            <p>Pages</p>
                        </a>
                    </li>
                    <li>
                        <a href="component.html">
                            <i class="fa fa-plus"></i>
                            <p>Components</p>
                        </a>
                    </li>
                    <li>
                        <a class="menu-bar" href="#">
                            <i class="fa fa-bars"></i>
                            <p>Menu</p>
                        </a>
                    </li>
                    <li>
                        <a href="carts.html">
                            <i class="fa fa-home"></i>
                            <p>My Card</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div> --}}
    </div>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- All Js File here -->
    <script src="{{asset('mobile/assets/js/vendor.js')}}"></script>
    <script src="{{asset('mobile/assets/js/main.js')}}"></script>

</body>


</html>
