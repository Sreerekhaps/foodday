<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <title>FoodDay - Signup</title>
</head>

<body>

    <!-- header -->
    <header>
        <div class="container-fluid">
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light fixed-top">
                <a class="navbar-brand" href="home.html"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="restaurant-listing.html">Restaurants</a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.signin')}}">Sign In</a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="my-account.html">
                                <i class='bx bx-user mr-1'></i>
                                My Account</a>
                        </li> -->
                        @if(count((array) session('cart'))==0)

<a class="nav-link" href="{{route('customer.emptycart')}}">

<span class="cart-badge-wrap">

<span class="cart-badge">{{ count((array) session('cart')) }}</span>

<i class='bx bx-shopping-bag mr-1'></i>

</span>

Cart</a>

@else

<a class="nav-link" href="{{route('customer.cart2')}}">

<span class="cart-badge-wrap">

<span class="cart-badge">{{ count((array) session('cart')) }}</span>

<i class='bx bx-shopping-bag mr-1'></i>

</span>

Cart</a>

@endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header -->

    <!-- <div class="search-nav">
        <div class="container">
            <h3 class="mb-0">Sign in</h3>
        </div>
    </div> -->

    <section class="log-reg-sec">
        <div class="content">
            <div class="form-content">
                <img src="{{asset('assets/images/logo-round.png')}}" alt="" class="form-logo">
                <h1 class="text-center">Sign up to FoodDay</h1>
                <form method="post" action="{{route('customer.signup_store')}}">
                @csrf
                @if(Session::get('fail'))
                                          <div class="alert alert-danger" role="alert"> 
                                             {{ Session::get('fail') }} 
                                           </div>
                                        @endif
                   

                    <div class="form-group ">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{old('first_name')}}">
                        @error("first_name")
                                                    <p style="color:red">{{$errors->first("first_name")}}
                                                @enderror
                    </div>
                    <div class="form-group ">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{old('last_name')}}">
                        @error("last_name")
                                                    <p style="color:red">{{$errors->first("last_name")}}
                                                @enderror
                    </div>
                    <div class="form-group ">
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                        @error("email")
                                                    <p style="color:red">{{$errors->first("email")}}
                                                @enderror
                    </div>
                    <div class="form-group ">
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" value="{{old('mobile')}}">
                        @error("mobile")
                                                    <p style="color:red">{{$errors->first("mobile")}}
                                                @enderror
                    </div>
                    <div class="form-group ">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @error("password")
                                                    <p style="color:red">{{$errors->first("password")}}
                                                @enderror
                    </div>
                    <div class="form-group ">
                        <input type="password" name="confirm_password" class="form-control" placeholder=" Confirm Password">
                        @error("confirm_password")
                                                    <p style="color:red">{{$errors->first("confirm_password")}}
                                                @enderror
                    </div>
                    <div class="form-group  text-center">
                        <span class="d-inline-block">By clcking Sign up, Continue with Faecbook or Continue with
                            Google, you agree to our <a href="">Terms and Conditions</a> and <a href="">Privacy
                                Statement</a></span>
                    </div>

                    <div class="form-group ">
                        <button class="btn btn-primary w-100">Sign up</button>
                    </div>
                    <div class="form-group text-center mb-0">
                        <span>Already have an account?</span>
                        <a href="{{route('customer.signin')}}">Sign In</a>
                    </div>

                </form>
            </div>
        </div>
    </section>



    <!-- footer -->

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <h3>Quick links</h3>
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('customer.restaurant_listing')}}">Restaurants</a></li>
                            <li><a href="{{route('customer.aboutus')}}">About us</a></li>
                            <li><a href="{{route('customer.contact')}}">Contact</a></li>
                           
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h3>Quick links</h3>
                        <ul>

                            <li><a href="enrol-delivery-boy.html">Enroll Delivery Boy</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="terms-and-conditions.html">Terms and Conditions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="enrol-your-restaurant.html">Enroll Your Restaurant</a></li>
                        </ul>
                    </div>

                    <!-- <div class="col-lg-3 col-md-6">
                        <h3>Subscribe to newsletter</h3>
                        <p>Join our newsletter to keep be informed about offers and news.</p>
                        <form action="">
                            <div class="input-group newsletter-group">
                                <input type="text" class="form-control" placeholder="Enter your email" aria-label=""
                                    aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="find-food-btn"><i
                                            class='bx bx-send'></i></button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <div class="col-lg-4 col-md-6">
                        <h3>Contact us</h3>
                        <ul class="contact">
                            <li><i class='bx bx-location-plus'></i><span>Down Town Building, MG Road, Toronto, Canada,
                                    784578</span></li>
                            <li><i class='bx bx-mail-send'></i><span>hello@cedextech.com</span></li>
                            <li><i class='bx bx-phone'></i><span>+91-8129881750</span></li>
                        </ul>
                        <div class="social">
                            <i class='bx bxl-facebook-circle'></i>
                            <i class='bx bxl-twitter'></i>
                            <i class='bx bxl-youtube'></i>
                            <i class='bx bxl-instagram-alt'></i>
                        </div>
                    </div>
                </div><!-- End row -->
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">

                <div class="text-center">
                    <p class="mb-0 copy-right">© 2021 FoodDay All Rights Reserved</p>
                </div>
            </div>
        </div>

        <!-- mobile footer -->

        <div class="mobile-footer">
            <div class="row">
                <div class="col-4 item">
                    <a href="home.html">
                        <i class='bx bx-search'></i>
                        <span>Search</span>
                    </a>
                </div>
                <div class="col-4 item">
                    <a href="cart.html">
                        <i class='bx bx-cart'><span class="badge badge-light">22</span></i>
                        <span>Cart</span>
                    </a>
                </div>
                <div class="col-4 item">
                    <a href="my-account.html">
                        <i class='bx bx-user'></i>
                        <span>Account</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- mobile footer end -->

    </footer>

    <!-- footer end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>