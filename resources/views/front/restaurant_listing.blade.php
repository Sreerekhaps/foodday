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
    <title>FoodDay - Restaurant listing</title>
    @livewireStyles
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
                            <a class="nav-link" href="{{route('customer.my_home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.restaurant_listing')}}">Restaurants</a>
                        </li> -->

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/signin">Sign In</a>
                        </li> -->
                       @if(app('request')->has('customer_id'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.account')}}">
                                <i class='bx bx-user mr-1'></i>
                                My Account</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.signin')}}">Sign In</a>
                        </li>
                        @endif
                        <livewire:cart-count />
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header -->

    <div class="search-nav">
        <div class="container">

            
            @if (app('request')->has('location'))
            <h3>All restaurants delivering to {{ app('request')->input('location')}}</h3>
            @endif
            
            <p>Change location</p>
            <div class="row">
                <div class="col-lg-8 col-xl-6">
                    <form action="{{route('customer.search')}}" method="GET">
                        <div class="input-group search-location-group">
                        @if (app('request')->has('location'))
                            <input type="text" name="location" class="form-control" value="{{ app('request')->input('location')}}"placeholder="Enter your delivery location"
                               >
                               @else
                               <input type="text" name="location" class="form-control" placeholder="Enter your delivery location"
                               >
                               @endif

                            <a href="" class="btn-locate"><i class='bx bx-target-lock'></i> Locate Me</a>
                            <!-- <button class="btn-locate"><i class='bx bx-target-lock'></i> Locate Me</button> -->
                            <div class="input-group-append btn-find-food">
                            <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- location popup -->

            <!-- @unless(app('request')->has('location'))
            <div class="location-popup" id="location-popup">
                <h5 class="mb-3">Add your delivery location</h5>
                <p class="mb-4">Please set a more precise location to see more relevant options.
                </p>
                <form action="">
                <button class="btn btn-light" onclick="locationPopup()">Set Location</button>
                </form>
            </div>
            @endunless -->

            <!-- location popup end -->

        </div>
    </div>

    <section class="py-60">
        <div class="container">
        @if (app('request')->has('location'))
            <h4 class="mb-4">Restaurants</h4>
            <div class="row rest-listing-row">
                
            @foreach($restaurants as $rest)
            @if($rest->is_open==1)
                <div class="col-md-4 col-sm-6">
               
                    <a href="{{route('customer.restaurant_details',$rest->id)}}" class="card restaurant-card available">
                        <span class="restaurant-status">
                        @if($rest->is_open ==1)
                            <em class="ribbon"></em>Open
                        @endif
                        </span>
                        @if($rest->is_open ==0)
                        <span class="restaurant-status closed"> 
                        <em class="ribbon"></em>Closed      
                        @endif
                        </span>
                        <div class="restaurant-image" style="
                                background-image: url('{{$rest->logo}}');
                              ">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$rest->name}}</h5>
                            <div class="cuisines">
                                <span>{{$rest->location}}</span>
                                @foreach($cuisines as $cuisine)
                                 @if($rest->cuisines->contains($cuisine->id))
                                 <span>                               
                                  {{$cuisine->name}}
                                  </span>
                                 @endif               
                                @endforeach 
                                
                            </div>
                            <p class="location"><i class="bx bx-location-plus"></i> {{$rest->address}}</p>
                            <div class="details">
                                <span class="badge"><i class='bx bxs-star'></i> 4.2</span>
                                <span class="badge">{{$rest->default_preparation_time}}hours</span>
                                <span class="badge">{{$rest->cost_for_two_people}} for two</span>
                            </div>
                        </div>
                    </a>
                </div>
                @else
                <div class="col-md-4 col-sm-6">
               
                    <a href="{{route('customer.restaurant_details',$rest->id)}}" class="card restaurant-card unavailable">
                        <span class="restaurant-status">
                        @if($rest->is_open ==1)
                            <em class="ribbon"></em>Open
                        @endif
                        </span>
                        @if($rest->is_open ==0)
                        <span class="restaurant-status closed"> 
                        <em class="ribbon"></em>Closed      
                        @endif
                        </span>
                        <div class="restaurant-image" style="
                                background-image: url('{{$rest->banner}}');
                              ">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$rest->name}}</h5>
                            <div class="cuisines">
                                <span>{{$rest->location}}</span><span>
                                @foreach($cuisines as $cuisine)
                                 @if($rest->cuisines->contains($cuisine->id))
                                  {{$cuisine->name}},
                                 @endif               
                                @endforeach 
                                </span>
                            </div>
                            <p class="location"><i class="bx bx-location-plus"></i> {{$rest->address}}</p>
                            <div class="details">
                                <span class="badge"><i class='bx bxs-star'></i> 4.2</span>
                                <span class="badge">{{$rest->default_preparation_time}}hours</span>
                                <span class="badge">{{$rest->cost_for_two_people}} for two</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
               
            </div>
            @else
            <div class="empty-status-div">
            <h4 class="mb-4" >Sorry! We couldn't find any results</h4>
            </div>
            @endif
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
                    <a href="{{route('customer.cart')}}">
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
    @livewireScripts

    <script type="text/javascript">



function locationPopup() {

document.getElementById('location').focus();

document.getElementById('location-popup').style.display = "none";


}



</script>
</body>

</html>