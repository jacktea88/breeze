{{-- 繼承首頁父層的元素 --}}
@extends('layouts.home')

@section('style_filterDiv')
@parent
@endsection

@section('style_show')
@parent
@endsection


@section('style_container')
@parent
@endsection

@section('style_btn')
@parent
@endsection



{{-- 填body content --}}
@section('content')
  <!-- banner -->
  <div class="callbacks_container">
    <ul class="rslides" id="slider3">
      <li>
        <div class="slider-info bg1">
          <div class="w3l-overlay">
            <div class="banner-text text-center container">
              <h3 class="text-white mb-md-4 mb-3">來份不須將就的餐點吧

              </h3>
              <p class="movetxt text-white mb-4">不愛的芹菜、香菜、青椒、紅蘿蔔、苦瓜都不會出現....</p>





              <div class="search-agile">
                <form action="#" method="post">
                  <!--             <input type="search" name="search" placeholder="Search here..." required="">
                  <input type="submit" value="Search">
                  <div class="clearfix"> </div>-->



                </form>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="slider-info bg2">
          <div class="w3l-overlay">
            <div class="banner-text text-center container">
              <h3 class="text-white mb-md-4 mb-3">認識個味覺相近的新朋友一同用餐

              </h3>
              <p class="movetxt text-white mb-4">幫我推薦新朋友</p>
              <div class="search-agile">
                <form action="#" method="post">
                  <input type="search" name="search" placeholder="Search here..." required="">
                  <input type="submit" value="Search">
                  <div class="clearfix"> </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <!-- //banner -->






  <!-- middle section one -->
  <div class="w3ls-middle-works py-5 text-center" id="specials">
    <div class="py-xl-5 py-lg-3">

      <h3 class="title text-center text-dark mb-lg-5">
        <span>Fresh, organic ingredients,</span>Carefully prepared, Eat green for a reason.
      </h3>

      <div>

        <div id="myBtnContainer">
          <button class="btn active" onclick="filterSelection('all')"> Show all</button>
          <button class="btn" onclick="filterSelection('中式餐點')"> 中式餐點</button>
          <button class="btn" onclick="filterSelection('西式餐點')"> 西式餐點</button>
          <button class="btn" onclick="filterSelection('飲料點心')"> 飲料點心</button>
          <button class="btn" onclick="filterSelection('異國美食')"> 異國美食</button>
        </div>
        <div class="row">
          <div class="offset-1 col-10">


            <div class="container  <!-- d-flex --> justify-content-center align-items-center flex-wrap" >
              <div class="filterDiv 中式餐點">雞腿飯</div>
              <div class="filterDiv 異國美食 fruits">椰汁綠咖哩飯</div>
              <div class="filterDiv 中式餐點">牛肉麵</div>
              <div class="filterDiv 異國美食">酸辣河粉</div>
              <div class="filterDiv 中式餐點 飲料點心">胡椒餅</div>
              <div class="filterDiv 異國美食">親子井</div>
              <div class="filterDiv 西式餐點">漢堡</div>
              <div class="filterDiv 西式餐點">義大利麵</div>
              <div class="filterDiv 飲料點心">紅茶</div>
              <div class="filterDiv 飲料點心 異國美食">印度拉茶</div>
              <div class="filterDiv 飲料點心">起司蛋糕</div>
              <div class="filterDiv 飲料點心">提拉米蘇</div>
            </div>


          </div>
        </div>
        <script>
          filterSelection("all")
          function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
              w3RemoveClass(x[i], "show");
              if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
          }

          function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
              if (arr1.indexOf(arr2[i]) == -1) { element.className += " " + arr2[i]; }
            }
          }

          function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
              while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
              }
            }
            element.className = arr1.join(" ");
          }

          // Add active class to the current button (highlight it)
          var btnContainer = document.getElementById("myBtnContainer");
          var btns = btnContainer.getElementsByClassName("btn");
          for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
              var current = document.getElementsByClassName("active");
              current[0].className = current[0].className.replace(" active", "");
              this.className += " active";
            });
          }
        </script>

      </div>



      <a href="#" class="col-12 button-w3ls my-4 text-center" data-toggle="modal"
        data-target="#exampleModalCenter1">幫我過濾以下食材
        <i class="fas fa-long-arrow-alt-right ml-3"></i>
      </a>
      <div class="text-dark">
        <div class="form-check form-check-inline"><input type="checkbox" class="text-white">芹菜</div>
        <div class="form-check form-check-inline"><input type="checkbox">香菜</div>
        <div class="form-check form-check-inline"><input type="checkbox">青椒</div>
        <div class="form-check form-check-inline"><input type="checkbox">茄子</div>
        <div class="form-check form-check-inline"><input type="checkbox">紅蘿蔔</div>
        <div class="form-check form-check-inline"><input type="checkbox">皮蛋</div>
        <div class="form-check form-check-inline"><input type="checkbox">苦瓜</div> <span>更多</span><button
          class="btn btn-primary  ml-3">篩選</button>
        <div class="clearfix"> </div>
      </div>



    </div>
  </div>
  <!-- //middle section one -->


  <!-- about -->
  <div class="about py-5" id="about">
    <div class="container py-xl-5 py-lg-3">
      <h3 class="title text-center text-dark mb-sm-5 mb-4">
        <span>餐點推薦</span> world's no.1 tasty food
      </h3>
      <div class="row about-bottom-w3l text-center pt-lg-5">
        <div class="col-sm-6 col-lg-3 about-grid ">
          <div class="about-grid-main">
            {{-- <img src="images/a1.jpg" alt="" class="img-fluid"> --}}
            <img src="{{ asset('assets/images/a1.jpg') }}" alt="" class="img-fluid">

            <h4 class="mb-3">Clean & Continental Place</h4>
            <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
            <a href="#" class="button-w3ls mt-4" data-toggle="modal" data-target="#exampleModalCenter1">Read More
              <i class="fas fa-long-arrow-alt-right ml-3"></i>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 about-grid mt-sm-0 mt-4">
          <div class="about-grid-main">
            {{-- <img src="images/a2.jpg" alt="" class="img-fluid"> --}}
            <img src="{{ asset('assets/images/a2.jpg') }}" alt="" class="img-fluid">

            <h4 class="mb-3">100% Healthy Food</h4>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
            <a href="#" class="button-w3ls mt-4" data-toggle="modal" data-target="#exampleModalCenter1">Read More
              <i class="fas fa-long-arrow-alt-right ml-3"></i>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 about-grid mt-sm-0 mt-4">
          <div class="about-grid-main">
            {{-- <img src="images/a2.jpg" alt="" class="img-fluid"> --}}
            <img src="{{ asset('assets/images/a2.jpg') }}" alt="" class="img-fluid">

            <h4 class="mb-3">100% Healthy Food</h4>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
            <a href="#" class="button-w3ls mt-4" data-toggle="modal" data-target="#exampleModalCenter1">Read More
              <i class="fas fa-long-arrow-alt-right ml-3"></i>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 about-grid mt-sm-0 mt-4">
          <div class="about-grid-main">
            {{-- <img src="images/a2.jpg" alt="" class="img-fluid"> --}}
            <img src="{{ asset('assets/images/a2.jpg') }}" alt="" class="img-fluid">

            <h4 class="mb-3">100% Healthy Food</h4>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
            <a href="#" class="button-w3ls mt-4" data-toggle="modal" data-target="#exampleModalCenter1">Read More
              <i class="fas fa-long-arrow-alt-right ml-3"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- //about -->

  <!-- about -->
  <div class="about py-5" id="about">
    <div class="container py-xl-5 py-lg-3">
      <h3 class="title text-center text-dark mb-sm-5 mb-4">
        <span>味覺與您接近的小夥伴</span> world's no.1 tasty food
      </h3>
      <div class="row about-bottom-w3l text-center pt-lg-5">
        <div class="col-sm-6 col-lg-3 about-grid mt-sm-0 mt-4">
          <div class="about-grid-main">
            {{-- <img src="images/05.jpg" alt="" class="img-fluid"> --}}
            <img src="{{ asset('assets/images/05.jpg') }}" alt="" class="img-fluid">

            <h4 class="mb-3">阿南仔</h4>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
            <a href="#" class="button-w3ls mt-4" data-toggle="modal" data-target="#exampleModalCenter1">Read More
              <i class="fas fa-long-arrow-alt-right ml-3"></i>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 about-grid mt-sm-0 mt-4">
          <div class="about-grid-main">
            {{-- <img src="images/04.jpg" alt="" class="img-fluid"> --}}
            <img src="{{ asset('assets/images/04.jpg') }}" alt="" class="img-fluid">

            <h4 class="mb-3">陳大東</h4>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
            <a href="#" class="button-w3ls mt-4" data-toggle="modal" data-target="#exampleModalCenter1">Read More
              <i class="fas fa-long-arrow-alt-right ml-3"></i>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 about-grid mt-sm-0 mt-4">
          <div class="about-grid-main">
            {{-- <img src="images/02.jpg" alt="" class="img-fluid"> --}}
            <img src="{{ asset('assets/images/02.jpg') }}" alt="" class="img-fluid">

            <h4 class="mb-3">小虎兒</h4>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
            <a href="#" class="button-w3ls mt-4" data-toggle="modal" data-target="#exampleModalCenter1">Read More
              <i class="fas fa-long-arrow-alt-right ml-3"></i>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 about-grid mt-sm-0 mt-4">
          <div class="about-grid-main">
            {{-- <img src="images/01.jpg" class="img-fluid"> --}}
            <img src="{{ asset('assets/images/01.jpg') }}" alt="" class="img-fluid">

            <h4 class="mb-3">莉莉安</h4>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
            <a href="#" class="button-w3ls mt-4" data-toggle="modal" data-target="#exampleModalCenter1">Read More
              <i class="fas fa-long-arrow-alt-right ml-3"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- //about -->



  <!-- gallery -->
  <div class="gallery pt-5" id="gallery">
    <div class="container py-xl-5 py-lg-3">
      <div class="row gallery_grids">
        <div class="col-4 agile-gallery_grid_main">
          <div class="gallery-img-grid gallery_grid1 hover14 column">
            <div class="gallery_effect">
              <a href="{{ asset('assets/images/g1.jpg') }}" class="sb"
                title="quis nostrud exercitation ullamco laboris quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum">
                <figure>
                  {{-- <img src="images/g1.jpg" alt=" " class="img-fluid" /> --}}
            <img src="{{ asset('assets/images/g1.jpg') }}" alt="" class="img-fluid">

                </figure>
              </a>
            </div>
          </div>
          <div class="gallery-img-grid hover14 column">
            <div class="gallery_effect">
              <a href="{{ asset('assets/images/g2.jpg') }}" class="sb"
                title="quis nostrud exercitation ullamco laboris quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum">
                <figure>
                  {{-- <img src="images/g2.jpg" alt=" " class="img-fluid" /> --}}
            <img src="{{ asset('assets/images/g2.jpg') }}" alt="" class="img-fluid">

                </figure>
              </a>
            </div>
          </div>
          <div class="gallery-img-grid hover14 column">
            <div class="gallery_effect">
              <a href="{{ asset('assets/images/g3.jpg') }}" class="sb"
                title="quis nostrud exercitation ullamco laboris quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum">
                <figure>
                  {{-- <img src="images/g3.jpg" alt=" " class="img-fluid" /> --}}
            <img src="{{ asset('assets/images/g3.jpg') }}" alt="" class="img-fluid">

                </figure>
              </a>
            </div>
          </div>
        </div>
        <div class="col-4 agile-gallery_grid_main">
          <div class="gallery-img-grid hover14 column">
            <div class="gallery_effect">
              <a href="{{ asset('assets/images/g7.jpg') }}" class="sb"
                title="quis nostrud exercitation ullamco laboris quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum">
                <figure>
                  {{-- <img src="images/g7.jpg" alt=" " class="img-fluid" /> --}}
            <img src="{{ asset('assets/images/g7.jpg') }}" alt="" class="img-fluid">

                </figure>
              </a>
            </div>
          </div>
          <div class="gallery-img-grid hover14 column">
            <div class="gallery_effect">
              <a href="{{ asset('assets/images/g8.jpg') }}" class="sb"
                title="quis nostrud exercitation ullamco laboris quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum">
                <figure>
                  {{-- <img src="images/g8.jpg" alt=" " class="img-fluid" /> --}}
            <img src="{{ asset('assets/images/g8.jpg') }}" alt="" class="img-fluid">

                </figure>
              </a>
            </div>
          </div>
        </div>
        <div class="col-4 agile-gallery_grid_main">
          <div class="gallery-img-grid gallery_grid1 hover14 column">
            <div class="gallery_effect">
              <a href="{{ asset('assets/images/g4.jpg') }}" class="sb"
                title="quis nostrud exercitation ullamco laboris quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum">
                <figure>
                  {{-- <img src="images/g4.jpg" alt=" " class="img-fluid" /> --}}
            <img src="{{ asset('assets/images/g4.jpg') }}" alt="" class="img-fluid">

                </figure>
              </a>
            </div>
          </div>
          <div class="gallery-img-grid hover14 column">
            <div class="gallery_effect">
              <a href="{{ asset('assets/images/g5.jpg') }}" class="sb"
                title="quis nostrud exercitation ullamco laboris quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum">
                <figure>
                  {{-- <img src="images/g5.jpg" alt=" " class="img-fluid" /> --}}
            <img src="{{ asset('assets/images/g5.jpg') }}" alt="" class="img-fluid">

                </figure>
              </a>
            </div>
          </div>
          <div class="gallery-img-grid hover14 column">
            <div class="gallery_effect">
              <a href="{{ asset('assets/images/g6.jpg') }}" class="sb"
                title="quis nostrud exercitation ullamco laboris quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum">
                <figure>
                  {{-- <img src="images/g6.jpg" alt=" " class="img-fluid" /> --}}
            <img src="{{ asset('assets/images/g6.jpg') }}" alt="" class="img-fluid">

                </figure>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- //gallery -->

  <!-- contact -->
  <div class="address py-5" id="contact">
    <div class="container py-xl-5 py-lg-3">
      <h3 class="title text-center text-dark mb-sm-5 mb-4">
        <span>Contact US</span> world's no.1 tasty food
      </h3>
      <div class="row address-row pt-lg-5">
        <div class="col-lg-6">
          <div class="address-right p-sm-5 p-4">
            <div class="address-info wow fadeInRight animated" data-wow-delay=".5s">
              <h4 class="mb-3">Address</h4>
              <p>123 San Sebastian, Hill Towers 4567,
                <span>New York City, USA</span>
              </p>
            </div>
            <div class="address-info address-mdl wow fadeInRight animated my-sm-5 my-4" data-wow-delay=".7s">
              <h4 class="mb-3">Phone </h4>
              <p>+222 111 333 4444</p>
              <p>+222 111 333 5555</p>
            </div>
            <div class="address-info agileits-info wow fadeInRight animated" data-wow-delay=".6s">
              <h4 class="mb-3">Mail</h4>
              <p>
                <a href="mailto:example@mail.com"> mail@example.com</a>
              </p>
              <p>
                <a href="mailto:example@mail.com"> mail2@example.com</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 address-left wow agile fadeInLeft animated mt-lg-0 mt-5" data-wow-delay=".5s">
          <div class="address-grid p-sm-5 p-4">
            <h4 class="wow fadeIndown animated mb-3" data-wow-delay=".5s">Get In Touch</h4>
            <form action="#" method="post">
              <div class="form-group">
                <input type="text" placeholder="Name" name="name" class="form-control" required="">
              </div>
              <div class="form-group">
                <input type="email" placeholder="Email" name="email" class="form-control" required="">
              </div>
              <div class="form-group">
                <textarea placeholder="Message" name="Message" class="form-control" required=""></textarea>
              </div>
              <input type="submit" value="SEND">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--//contact-->
@endsection
{{-- body content end --}}



  <!-- Js files -->
  <!-- JavaScript -->
@section('js_jquery')
@parent
@endsection

@section('js_banner')
  @parent
@endsection

@section('js_password')
@parent
@endsection

@section('js_gallery')
@parent
@endsection

@section('js_scrolling')
@parent
@endsection

@section('js_moveTop')
@parent
@endsection

@section('js_easing')
@parent
@endsection

@section('js_snacks')
@parent
@endsection

