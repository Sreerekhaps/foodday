<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <title>FoodDay - Restaurant Page</title>
    @livewireStyles
</head>

<body>
    <!-- header -->
    <header>
        <div class="container-fluid">
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light fixed-top">
                <a class="navbar-brand" href="home.html"><img src="assets/images/logo.png" alt=""></a>
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
                    

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.account')}}">My Account</a>
                        </li>

                        
                        <livewire:cart-count />
                    </ul>
                </div>
            </nav>
        </div>
        
    </header>
    <!-- Header -->

    <div class="search-nav restaurant-head">
        <div class="container">
            <div class="rest-info-wrap">
                <div class="rest-logo" style="
            background-image: url('{{$restaurant->logo}}');
          "></div>
                <div>
                    <h3>{{$restaurant->name}}</h3>
                    <!-- <span class="rest-unserviceable">Restaurant Unserviceable</span> -->
                    
                    <div class="cuisines">
                                
                                @foreach($cuisines as $cuisine)
                                 @if($restaurant->cuisines->contains($cuisine->id)) 
                                 <span>                               
                                  {{$cuisine->name}}
                                  </span>
                                 @endif               
                                @endforeach 
                                
                            </div>
                    <p><i class="bx bx-location-plus"></i> {{$restaurant->address}}</p>
                </div>
            </div>
            <div class="details">
                <div class="detail-block">
                    <h5><i class="bx bxs-star"></i> 4.2</h5>
                    <span>25+ Ratings</span>
                </div>
                <div class="detail-block">
                    <h5>{{$restaurant->default_preparation_time}} Hours</h5>
                    <span>Delivery Time</span>
                </div>
                <div class="detail-block">
                    <h5>${{$restaurant->cost_for_two_people}}</h5>
                    <span>Cost For Two</span>
                </div>
                <div class="detail-block">
                    <h5>${{$restaurant->min_order_value}}</h5>
                    <span>Minimum Order Amount</span>
                </div>
                <div class="detail-block">
                    @if($restaurant->allow_pickup==1)
                    <h5><i class="bx bx-walk"></i>Pick Up</h5>
                                  <span>Pick Up Available</span>

                               @else
                               <h5><i class="bx bx-walk"></i> No Pick Up</h5>
                                  <span>Pick Up Not Available</span>
                                @endif
                    
                   
                </div>
                
            </div>

        </div>
    </div>

    <section class="py-60">
        <div class="container">
            <div class="row cuisine-dish-wrap">
                <div class="col-lg-8 cuisine-col">
                    <div class="rest-menus" id="rest-menus">
                     
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <ul class="nav sub-cat-nav">
                                  @foreach($itemfoods as $item)
                                  @if($restaurant->itemfoods->contains($item->id))
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger" href="#sub-cat2">{{$item->food_item}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>

                                <div class="food-item-cards-wrap">
                                    <div class="sub-cat mt-0" id="sub-cat1">
                                        <h4 class="mb-4">Most Popular</h4>
                                       
                                    @if($restaurant->is_open==1)
                                        <livewire:fooditem :restaurant="$restaurant"/>
                                    @else
                                    <div class="row">
                                    @foreach($restaurant->itemfoods as $item)
                                    <div class="col-lg-6">
                                         <div class="food-item-card unavailable">
                                                    <div class="food-item-img" style="
                                background-image: url({{asset('assets/images/img2.jpg')}});
                              "></div>
                                                    <div class="food-item-body">
                                                        <h5 class="card-title">
                                                            {{$item->food_item}}
                                                        </h5>
                                                        <div class="pricing">
                                                        <div class="price-wrap">
                                                                @if($item->status==1)
                                                                <div class="non-div food-type-div">
                                                                    <i class="bx bxs-circle" ></i>
                                                                </div>
                                                                @else
                                                                <div class="veg-div food-type-div">
                                                                    <i class="bx bxs-circle"></i>
                                                                </div>
                                                                @endif
                                                                <span class="price">${{$item->rate}}</span>
                                                                <span class="actual-price">$180.99</span>
                                                            </div>
                                                            
                                                            <span class="unavailable-text">Unavailable</span>
                                                           
                                                            

                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                @endforeach
                                                </div>
                                               @endif   
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  
</div>          
</div>

                                <livewire:cart />
            
           
         
    </section>
   
    <!--cart modal-->
    

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
                            <li>
                                <a href="enrol-delivery-boy.html">Enroll Delivery Boy</a>
                            </li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li>
                                <a href="terms-and-conditions.html">Terms and Conditions</a>
                            </li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li>
                                <a href="enrol-your-restaurant.html">Enroll Your Restaurant</a>
                            </li>
                        </ul>
                    </div>

                    <!-- <div class="col-lg-3 col-md-6">
                        <h3>Subscribe to newsletter</h3>
                        <p>
                            Join our newsletter to keep be informed about offers and news.
                        </p>
                        <form action="">
                            <div class="input-group newsletter-group">
                                <input type="text" class="form-control" placeholder="Enter your email" aria-label=""
                                    aria-describedby="button-addon2" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="find-food-btn">
                                        <i class="bx bx-send"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <div class="col-lg-4 col-md-6">
                        <h3>Contact us</h3>
                        <ul class="contact">
                            <li>
                                <i class="bx bx-location-plus"></i><span>Down Town Building, MG Road, Toronto, Canada,
                                    784578</span>
                            </li>
                            <li>
                                <i class="bx bx-mail-send"></i><span>hello@cedextech.com</span>
                            </li>
                            <li><i class="bx bx-phone"></i><span>+91-8129881750</span></li>
                        </ul>
                        <div class="social">
                            <i class="bx bxl-facebook-circle"></i>
                            <i class="bx bxl-twitter"></i>
                            <i class="bx bxl-youtube"></i>
                            <i class="bx bxl-instagram-alt"></i>
                        </div>
                    </div>
                </div>
                <!-- End row -->
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

        <!-- <div class="mobile-footer">
            <div class="row">
                <div class="col-4 item">
                    <a href="home.html">
                        <i class="bx bx-search"></i>
                        <span>Search</span>
                    </a>
                </div>
                <div class="col-4 item">
                    <a href="cart.html">
                        <i class="bx bx-cart"><span class="badge badge-light">22</span></i>
                        <span>Cart</span>
                    </a>
                </div>
                <div class="col-4 item">
                    <a href="my-account.html">
                        <i class="bx bx-user"></i>
                        <span>Account</span>
                    </a>
                </div>
            </div>
        </div> -->

        <!-- mobile footer end -->
    </footer>

    <!-- footer end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @livewireScripts
</body>

</html>