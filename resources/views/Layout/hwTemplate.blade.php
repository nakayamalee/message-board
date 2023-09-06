<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FreshCart</title>
  <!-- Link Bootstrap's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <!-- Local CSS -->
  <link rel="stylesheet" href="./css/all.css">
  <link rel="stylesheet" href="./css/down.css">
  <!-- Local Swiper CSS -->
  <link rel="stylesheet" href="./css/swiper.css">


</head>


<body>
  <header>
    <div class="top-showcase">
      <div class="container p-1">
        <div class="d-flex justify-content-center justify-content-md-between">
          <span> Super Value Deals - Save more with coupons</span>
          <div class="dropdown d-none d-md-block">
            <div class="btn-group">
              <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="./img/icon/english-flag_工作區域 1.png" alt="English-flag" class="img-fluid flag">
                <span>English</span>
                <i class="bi bi-chevron-down chevron-down"></i>
              </button>
              <ul class="dropdown-menu">
                <li class="flag-menu">
                  <img src="./img/icon/english-flag_工作區域 1.png" alt="English-flag" class="img-fluid flag">
                  <span>English</span>
                </li>
                <li class="flag-menu">
                  <img src="./img/icon/germany-flag_工作區域 1.png" alt="germany-flag" class="img-fluid flag">
                  <span>Germany</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="top-search">
      <div class="container d-flex justify-content-between">
        <div class="top-search-left d-flex align-items-center">
          <a href="#" class="freshcart-logo"><img src="./img/icon/freshcart-logo.svg" alt=""></a>
          <form class="d-flex position-relative d-none d-lg-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search for products" aria-label="Search">
            <button class="btn search-btn position-absolute" type="submit"><i class="bi bi-search"></i></button>
          </form>
          <button type="button" class="btn btn-outline-secondary location-btn d-none d-lg-block">
            <i class="bi bi-geo-alt"></i>
            <span>Location</span>
          </button>
        </div>
        <div class="top-search-right d-flex align-items-center">
          <a href="#" class="position-relative d-none d-lg-block ">
            <i class="bi bi-heart top-icon"></i>
            <span class="position-absolute badge badge-circle text-bg-success rounded-circle">5</span>
          </a>
          <a href="{{route('type.index')}}">
            <i class="bi bi-person top-icon"></i>
          </a>
          <a href="#" class="position-relative">
            <i class="bi bi-cart2 top-icon"></i>
            <span class="position-absolute badge badge-circle text-bg-success rounded-circle">1</span>
          </a>
          <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
            <i class="bi bi-text-indent-left top-icon"></i>
          </button>
          <!-- 彈跳menu -->
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <img src="./img/icon/freshcart-logo.svg" alt="" class="offcanvas-title" id="offcanvasExampleLabel">

              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- 彈跳menu 內容 -->
            <div class="offcanvas-body">
              <form class="d-flex position-relative mb-2" role="search">
                <input class="form-control" type="search" placeholder="Search for products" aria-label="Search">
                <button class="btn search-btn position-absolute" type="submit"><i class="bi bi-search"></i></button>
              </form>
              <button type="button" class="btn btn-outline-secondary location-btn mb-3">
                <i class="bi bi-geo-alt"></i>
                <span>Pick Location</span>
              </button>
              <button type="button" class="btn dropdown-toggle all-departments-btn fs-6-7 mb-3"
              data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-grid me-1"></i>
                <span>All Departments</span>
              </button>
              <div class="collapse all-departments-menu" id="collapseExample">
                <ul class="p-0">
                  <li><a class="dropdown-item" href="#">Dairy, Bread & Eggs</a></li>
                  <li><a class="dropdown-item" href="#">Snacks & Munchies</a></li>
                  <li><a class="dropdown-item" href="#">Fruits & Vegetables</a></li>
                  <li><a class="dropdown-item" href="#">Cold Drinks & Juices</a></li>
                  <li><a class="dropdown-item" href="#">Breakfast & Instant Food</a></li>
                  <li><a class="dropdown-item" href="#">Bakery & Biscuits</a></li>
                  <li><a class="dropdown-item" href="#">Chicken, Meat & Fish</a></li>
                </ul>

              </div>
              <!-- accordion test to do -->
              <div class="accordion" id="accordionExample">
                <!-- Home -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button hover-green" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Home
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body fs-6-7">
                      <a class="dropdown-item" href="#">Home 1</a>
                      <a class="dropdown-item" href="#">Home 2</a>
                      <a class="dropdown-item" href="#">Home 3</a>
                      <a class="dropdown-item" href="#">Home 4</a>
                      <a class="dropdown-item" href="#">Home 5<span class="badge light-blue ms-1">New</span></a>

                    </div>
                  </div>
                </div>
                <!-- Shop -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed hover-green" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Shop
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body  fs-6-7">
                      <a class="dropdown-item" href="#">Shop Grid - Filter</a>
                      <a class="dropdown-item" href="#">Shop Grid - 3 column</a>
                      <a class="dropdown-item" href="#">Shop List - Filter</a>
                      <a class="dropdown-item" href="#">Shop - Filter</a>
                      <a class="dropdown-item" href="#">Shop Single</a>
                      <a class="dropdown-item" href="#">Shop Single v2</a>
                      <a class="dropdown-item" href="#">Shop Wishlist</a>
                      <a class="dropdown-item" href="#">Shop Cart</a>
                      <a class="dropdown-item" href="#">Shop Checkout</a>
                    </div>
                  </div>
                </div>
                <!-- Stores -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed hover-green" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Stores
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body fs-6-7">
                      <a class="dropdown-item" href="#">Store List</a>
                      <a class="dropdown-item" href="#">Store Grid</a>
                      <a class="dropdown-item" href="#">Store Single</a>
                    </div>
                  </div>
                </div>
                <!-- Mega menu -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed hover-green" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Mega menu
                    </button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body fs-6-7">
                      <ul>
                        <li>
                          <!-- Mega menu 第一列 -->
                          <h6 class="main-green-color">Dairy, Bread & Eggs</h6>
                          <a class="dropdown-item" href="#">Butter</a>
                          <a class="dropdown-item" href="#">Milk Drinks</a>
                          <a class="dropdown-item" href="#">Curd & Yogurt</a>
                          <a class="dropdown-item" href="#">Eggs</a>
                          <a class="dropdown-item" href="#">Buns & Bakery</a>
                          <a class="dropdown-item" href="#">Cheese</a>
                          <a class="dropdown-item" href="#">Condensed Milk</a>
                          <a class="dropdown-item" href="#">Dairy Products</a>
                        </li>
                        <li class="mt-3">
                          <!-- Mega menu 第二列 -->
                          <h6 class="main-green-color">Breakfast & Instant Food</h6>
                          <a class="dropdown-item" href="#">Breakfast Cereal</a>
                          <a class="dropdown-item" href="#"> Noodles, Pasta & Soup</a>
                          <a class="dropdown-item" href="#">Frozen Veg Snacks</a>
                          <a class="dropdown-item" href="#"> Frozen Non-Veg Snacks</a>
                          <a class="dropdown-item" href="#"> Vermicelli</a>
                          <a class="dropdown-item" href="#"> Instant Mixes</a>
                          <a class="dropdown-item" href="#"> Batter</a>
                          <a class="dropdown-item" href="#"> Fruit and Juices</a>
                        </li>
                        <li class="mt-3">
                          <!-- Mega menu 第三列 -->
                          <h6 class="main-green-color">Cold Drinks & Juices</h6>
                          <a class="dropdown-item" href="#">Soft Drinks</a>
                          <a class="dropdown-item" href="#">Fruit Juices</a>
                          <a class="dropdown-item" href="#">Coldpress</a>
                          <a class="dropdown-item" href="#">Water & Ice Cubes</a>
                          <a class="dropdown-item" href="#">Soda & Mixers</a>
                          <a class="dropdown-item" href="#">Health Drinks</a>
                          <a class="dropdown-item" href="#">Herbal Drinks</a>
                          <a class="dropdown-item" href="#">Milk Drinks</a>
                        </li>
                        <li class="position-relative mt-3">
                          <!--Mega menu 第四列 -->
                          <img src="./img/banner/mega-menu-banner.jpeg" alt="" class="img-fluid">
                          <div class="position-absolute mega-branner">
                            <h5>
                              Dont miss this <br> offer today.
                            </h5>
                            <a href="#" class="btn shop-now-btn ms-auto fs-7">Shop Now</a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- Pages -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed hover-green" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      Pages
                    </button>
                  </h2>
                  <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body fs-6-7">
                      <a class="dropdown-item" href="#">Blog</a>
                      <a class="dropdown-item" href="#">Blog Single</a>
                      <a class="dropdown-item" href="#">Blog Category</a>
                      <a class="dropdown-item" href="#">About us</a>
                      <a class="dropdown-item" href="#">404 Error</a>
                      <a class="dropdown-item" href="#">Contact</a>
                    </div>
                  </div>
                </div>
                <!-- Account -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed hover-green" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                      Account
                    </button>
                  </h2>
                  <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body fs-6-7">
                      <a class="dropdown-item" href="#">Sign in</a>
                      <a class="dropdown-item" href="#">Signup</a>
                      <a class="dropdown-item" href="#">Forgot Password</a>
                      <a class="dropdown-item" href="#">My Account</a>
                      <a class="dropdown-item" href="#">Home 5<span class="badge light-blue ms-1">New</span>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- Dashboard -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <a href="#">
                      <button class="accordion-button collapsed hover-green dashboard" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                        aria-controls="collapseSeven">
                        Dashboard
                      </button>
                    </a>
                  </h2>
                </div>
                <!-- Docs -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed hover-green" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                      Docs
                    </button>
                  </h2>
                  <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body fs-6-7">
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-file-text doc-icon main-green-color me-2"></i>
                        <div class="doc-body">
                          <h6 class="mb-0 fs-6-7">Documentations</h6>
                          <p class="mb-0 fs-7">
                            Browse the all documentation
                          </p>
                        </div>
                      </a>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-layers doc-icon main-green-color me-2"></i>
                        <div class="doc-body">
                          <h6 class="mb-0 fs-6-7">
                            Changelog
                            <span class="main-green-color">v1.2.0</span>
                          </h6>
                          <p class="mb-0 fs-7">
                            See what's new
                          </p>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="top-nav">
      <div class="container d-none d-lg-flex align-items-center pb-3">
        <div class="dropdown">
          <button type="button" class="btn dropdown-toggle all-departments-btn d-none d-lg-block fs-6-7"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-grid me-1"></i>
            <span>All Departments</span>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Dairy, Bread & Eggs</a></li>
            <li><a class="dropdown-item" href="#">Snacks & Munchies</a></li>
            <li><a class="dropdown-item" href="#">Fruits & Vegetables</a></li>
            <li><a class="dropdown-item" href="#">Cold Drinks & Juices</a></li>
            <li><a class="dropdown-item" href="#">Breakfast & Instant Food</a></li>
            <li><a class="dropdown-item" href="#">Bakery & Biscuits</a></li>
            <li><a class="dropdown-item" href="#">Chicken, Meat & Fish</a></li>
          </ul>
        </div>
        <ul class="top-nav-menu d-flex p-0 m-0">
          <li class="top-nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle hover-green fs-6-7" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span>Home</span>
                <i class="bi bi-chevron-down nav-down-i"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Home 1</a></li>
                <li><a class="dropdown-item" href="#">Home 2</a></li>
                <li><a class="dropdown-item" href="#">Home 3</a></li>
                <li><a class="dropdown-item" href="#">Home 4</a></li>
                <li><a class="dropdown-item" href="#">Home 5<span class="badge light-blue ms-1">New</span>
                  </a></li>
              </ul>
            </div>
          </li>
          <li class="top-nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle hover-green fs-6-7" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span>Shop</span>
                <i class="bi bi-chevron-down nav-down-i"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Shop Grid - Filter</a></li>
                <li><a class="dropdown-item" href="#">Shop Grid - 3 column</a></li>
                <li><a class="dropdown-item" href="#">Shop List - Filter</a></li>
                <li><a class="dropdown-item" href="#">Shop - Filter</a></li>
                <li><a class="dropdown-item" href="#">Shop Single</a></li>
                <li><a class="dropdown-item" href="#">Shop Single v2</a></li>
                <li><a class="dropdown-item" href="#">Shop Wishlist</a></li>
                <li><a class="dropdown-item" href="#">Shop Cart</a></li>
                <li><a class="dropdown-item" href="#">Shop Checkout</a></li>
              </ul>
            </div>
          </li>
          <li class="top-nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle hover-green fs-6-7" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span>Stores</span>
                <i class="bi bi-chevron-down nav-down-i"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Store List</a></li>
                <li><a class="dropdown-item" href="#">Store Grid</a></li>
                <li><a class="dropdown-item" href="#">Store Single</a></li>
              </ul>
            </div>
          </li>
          <!-- mega menu -->
          <li class="top-nav-item mega-menu">
            <div class="dropdown">
              <button class="btn dropdown-toggle hover-green fs-6-7" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span>Mega menu</span>
                <i class="bi bi-chevron-down nav-down-i"></i>
              </button>
              <div class="dropdown-menu">
                <div>
                  <div class="row p-2 p-lg-3">
                    <!-- Mega-menu第一列 -->
                    <div class="col col-lg-3">
                      <h6 class="main-green-color">Dairy, Bread & Eggs</h6>
                      <a class="dropdown-item" href="#">Butter</a>
                      <a class="dropdown-item" href="#">Milk Drinks</a>
                      <a class="dropdown-item" href="#">Curd & Yogurt</a>
                      <a class="dropdown-item" href="#">Eggs</a>
                      <a class="dropdown-item" href="#">Buns & Bakery</a>
                      <a class="dropdown-item" href="#">Cheese</a>
                      <a class="dropdown-item" href="#">Condensed Milk</a>
                      <a class="dropdown-item" href="#">Dairy Products</a>
                    </div>
                    <!-- Mega-menu第二列 -->
                    <div class="col col-lg-3">
                      <h6 class="main-green-color">Breakfast & Instant Food</h6>
                      <a class="dropdown-item" href="#">Breakfast Cereal</a>
                      <a class="dropdown-item" href="#"> Noodles, Pasta & Soup</a>
                      <a class="dropdown-item" href="#">Frozen Veg Snacks</a>
                      <a class="dropdown-item" href="#"> Frozen Non-Veg Snacks</a>
                      <a class="dropdown-item" href="#"> Vermicelli</a>
                      <a class="dropdown-item" href="#"> Instant Mixes</a>
                      <a class="dropdown-item" href="#"> Batter</a>
                      <a class="dropdown-item" href="#"> Fruit and Juices</a>
                    </div>
                    <!-- Mega-menu第三列 -->
                    <div class="col col-lg-3">
                      <h6 class="main-green-color">Cold Drinks & Juices</h6>
                      <a class="dropdown-item" href="#">Soft Drinks</a>
                      <a class="dropdown-item" href="#">Fruit Juices</a>
                      <a class="dropdown-item" href="#">Coldpress</a>
                      <a class="dropdown-item" href="#">Water & Ice Cubes</a>
                      <a class="dropdown-item" href="#">Soda & Mixers</a>
                      <a class="dropdown-item" href="#">Health Drinks</a>
                      <a class="dropdown-item" href="#">Herbal Drinks</a>
                      <a class="dropdown-item" href="#">Milk Drinks</a>
                    </div>
                    <!-- Mega-menu第四列 -->
                    <div class="col col-lg-3 position-relative">
                      <img src="./img/banner/mega-menu-banner.jpeg" alt="" class="img-fluid">
                      <div class="position-absolute mega-branner">
                        <h5>
                          Dont miss this <br> offer today.
                        </h5>
                        <a href="#" class="btn shop-now-btn ms-auto fs-7">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="top-nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle hover-green fs-6-7" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span>Pages</span>
                <i class="bi bi-chevron-down nav-down-i"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Blog</a></li>
                <li><a class="dropdown-item" href="#">Blog Single</a></li>
                <li><a class="dropdown-item" href="#">Blog Category</a></li>
                <li><a class="dropdown-item" href="#">About us</a></li>
                <li><a class="dropdown-item" href="#">404 Error</a></li>
                <li><a class="dropdown-item" href="#">Contact</a></li>
              </ul>
          </li>
          <li class="top-nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle hover-green fs-6-7" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span>Account</span>
                <i class="bi bi-chevron-down nav-down-i"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Sign in</a></li>
                <li><a class="dropdown-item" href="#">Signup</a></li>
                <li><a class="dropdown-item" href="#">Forgot Password</a></li>
                <li><a class="dropdown-item" href="#">My Account</a></li>
                <li><a class="dropdown-item" href="#">Home 5<span class="badge light-blue ms-1">New</span>
                  </a></li>
              </ul>
            </div>
          </li>
          <li class="top-nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle hover-green fs-6-7" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span>Dashboard</span>
              </button>
            </div>
          </li>
          <li class="top-nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle hover-green fs-6-7" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span>Docs</span>
                <i class="bi bi-chevron-down nav-down-i"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <i class="bi bi-file-text doc-icon main-green-color me-2"></i>
                    <div class="doc-body">
                      <h6 class="mb-0 fs-6-7">Documentations</h6>
                      <p class="mb-0 fs-7">
                        Browse the all documentation
                      </p>
                    </div>
                  </a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <i class="bi bi-layers doc-icon main-green-color me-2"></i>
                    <div class="doc-body">
                      <h6 class="mb-0 fs-6-7">
                        Changelog
                        <span class="main-green-color">v1.2.0</span>
                      </h6>
                      <p class="mb-0 fs-7">
                        See what's new
                      </p>
                    </div>
                  </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <main>
    @yield('main')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <!-- Local Swiper JS -->
  <script src="./js/swiper.js"></script>
    @yield('js')
</body>

</html>
