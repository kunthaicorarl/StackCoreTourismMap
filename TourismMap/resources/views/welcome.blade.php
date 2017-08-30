<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

body{ }

@font-face {
    font-family: RadikalW01_Black_bold;
    src: url('../fonts/radikal_font_family/RadikalW01-Bold.ttf');
    src: url('../fonts/radikal_font_family/RadikalW01-Bold.eot');
    src: url('../fonts/radikal_font_family/RadikalW01-Bold.woff');
	font-weight:bold;
}

@font-face {
    font-family: RadikalW01_thin;
    src: url('../fonts/radikal_font_family/RadikalW01-Light.ttf');
    src: url('../fonts/radikal_font_family/RadikalW01-Light.eot');
    src: url('../fonts/radikal_font_family/RadikalW01-Light.woff');
	font-weight:bold;
}
@font-face {
    font-family: RadikalW01-Medium;
src: url('../fonts/radikal_font_family/RadikalW01-Medium.ttf');

}

@font-face {
    font-family: RadikalW01-Light;
src: url('../fonts/radikal_font_family/RadikalW01-Light.ttf');

}

@font-face {
    font-family: RadikalW01-Bold;
src: url('../fonts/radikal_font_family/RadikalW01-Bold.ttf');

}

@font-face {
    font-family: CenturyGothic-bold;
src: url('../fonts/radikal_font_family/CenturyGothic-bold.ttf');

}

@font-face {
    font-family:GOTHICB;
src: url('../fonts/radikal_font_family/GOTHICB.TTF');

}


@font-face {
    font-family:OPENSANS-REGULAR;
src: url('../fonts/radikal_font_family/OPENSANS-REGULAR.TTF');

}

@font-face {
    font-family:OPENSANS-SEMIBOLD;
src: url('../fonts/radikal_font_family/OPENSANS-SEMIBOLD.TTF');

}

.clear{    clear: both;}
.jain_container{ margin:0px; padding:0px;}
.jain_container .medias{margin-top: 15px;}
.jain_container .medias ul{ padding:0px; margin:0px; }
.jain_container .medias ul li{  display:inline;  padding:7px 0px;}
/* .jain_container .medias i {    font-size: 18px;} */
.jain_container  .navbar-brand{ height:inherit;}
.jain_container .form-control{border-radius: 0px;border: 2px solid #adadad;}
.jain_container  .form-horizontal_x{
    margin-top: 10px;
}
.form-horizontal_x .col-sm-4 {    padding: 3px;}
.form-horizontal_x .col-sm-3 {    padding: 3px;}
.form-horizontal_x .col-sm-2 {    padding: 3px;}
.jain_container .navbar-default{position: absolute;    top: 20px;     background-color: rgba(255, 255, 255, 0.72);}

.jain_container .nav>li>a{padding: 15px 10px;color:#4c1f1e;font-family: RadikalW01_Black_bold;}

.jain_container .btn-default {
    color: #fff;
    background-color: #ff523f;
    border-color: #ff523f;
    border-radius: 0px;
    text-transform: uppercase;
    font-size: 16px;

}
.jain_container .navbar-nav{    margin-top: 12px;}
.jain_container .btn-default:hover{ background:#000; border-color:#000;}
.medias ul li a {
    height: 30px;
    width: 30px;
    border: 1px solid #fff;
    line-height: 30px;
    background: #4c1f1e;
    border-radius: 50%;
    display: inline-block;
    text-align: center;
    color: #fff;
    font-size: 12px;
}
.classus p{color:#4c1f1e;padding-top: 10px;}
.why_bookonline p{color:#4c1f1e;   font-family: RadikalW01-Medium; font-size:18px;}
.medias ul li a:hover {    background: #000;}
.jain_container .carousel-caption{    top: 38%;}

.jain_container .tagline h3	{font-family: RadikalW01-Light;font-size: 42px;text-transform: uppercase;text-shadow: 0px 0px 2px #c29c78;}
.jain_container .tagline h3  span{    font-family: RadikalW01-Bold; font-size:60px; letter-spacing:3px;}

.new_years {
    border: 1px solid #fff;
    width: 38%;
    margin: auto;
    padding: 10px;
}
.new_years_inner{background: rgba(255, 82, 63, 0.9);padding: 14px 0px;}
.new_years_inner h4 {font-size: 22px;font-family: RadikalW01-Bold;letter-spacing: 2px;text-transform: uppercase;}

.new_years_inner a {
    color: #fff;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-family: RadikalW01-Bold;
	    text-decoration: none;
}
.tagline hr{ width:60%;     border-top: 3px solid #eee;}

.carousel-control.left {    background: transparent; }
.carousel-control.right{    background: transparent; }
.carousel-control{ width:inherit;}
.banner_hotels_all  h1{font-size: 20px;font-family: RadikalW01-Bold;color:#ff523f;text-transform: uppercase;letter-spacing: 4px;padding-bottom: 30px;}
#hotel_alls{ padding:50px  0px;}

.banner_hotels_all .col-md-4{padding:0px;}
.banner_hotels_all .col-md-8{padding:0px;}
.banner_hotels_all .hotels_abouts{border:4px solid #f5d1a9;padding: 20px 30px;}
.hotels_abouts h2 {
	 font-family:GOTHICB;
	color:#4c1f1e;
    font-size: 22px;
    text-transform: uppercase;
line-height: 25px;}
a.hotels_ex {
    display: block;
    width: 100%;
    background: #4c1f1e;
    text-align: center;
    padding: 6px 0px;
    text-transform: uppercase;
    color: #fff;
    letter-spacing: 1px;
	margin-bottom: 15px;
	text-decoration: none;
	    margin-top: 20px;
}

a.booking_qx {
    display: block;
    width: 100%;
    background: #ff523f;
    text-align: center;
    padding: 6px 0px;
    text-transform: uppercase;
    color: #fff;
    letter-spacing: 1px;
	text-decoration: none;
}
.hotels_abouts p {
    color: #818181;
    font-size: 12px;
}
.hotels_loc {
    background: rgba(76, 31, 30, 0.71);
    position: absolute;
    z-index: 999;
    top: 0px;
    left: 10%;
	    padding: 10px 20px;
}

.hotels_loc span {
    color: #4c1f1e;
    background: #f5d1a9;
    font-size: 18px;
	padding: 5px;
}
.hotels_loc h3 {
    color: #fff;
    margin: 10px 0;
}
.hotels_loc p {
    color: #fff;
}

#myCarousel_hotels .carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev{    margin-left: -50px;    font-size: 50px;     color: #4c1f1e;}
#myCarousel_hotels .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next{    margin-right: -50px;     font-size: 50px;    color: #4c1f1e;}
#myCarousel_hotels .carousel-control{opacity: .9;}

.banner_hotels_all_abouts p{font-family: RadikalW01-Medium;line-height: 30px;text-align: center;}
.banner_hotels_all_abouts p span{ color:#ff523f;}
.all_offers_in .col-md-4{ padding:5px;}
.offers_off {
    margin-top: -117px;
    display: -webkit-box;
    background: rgba(120, 64, 61, 0.71);
    width: 100%;
    position: relative;
    padding: 15px 0px;
}
.offers_off h4{
    font-family: RadikalW01_Black_bold;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 24px;
}
.offers_off h4 span{
    display: block;
    font-family: RadikalW01_thin;
    text-transform: uppercase;
    color: #fff;
    font-size: 38px;
}
.offers_off p{
    font-family: RadikalW01_thin;
    color: #fff;
    font-size: 18px;
    padding-top: 6px;
}

a.offers_link{
    font-family: RadikalW01_Black_bold;
    color: #ff523f;
    font-size: 20px;
    text-decoration: none;
}
#offers_out{ padding-top:40px;}

#myCarousel_wedding .carousel-indicators {
    position: absolute;
    bottom: 70px;
    right: 0%;
    z-index: 15;
    left: inherit;
    width: 22%;
    }
.wedding_slide_tag {
    position: absolute;
    z-index: 999;
    top: 24%;
    left: 10%;
    color: #fff;
}

.wedding_slide_tag h3 {
	  font-family: RadikalW01_Black_bold;
    display: table-caption;
    text-transform: uppercase;
    font-size: 50px;
}
.wedding_slide_tag h3  span{
	  font-family: RadikalW01_thin;
	
}
.wedding_forms {
    display: block;
    z-index: 999;
    position: relative;
    width: 50%;
    left: 50%;
    margin-top: -4%;
}
 .wedding_forms .form-control{    border: none;}
 .wedd_btn{ width:100%; font-family: RadikalW01_Black_bold;     letter-spacing: 1px;
    padding: 10px 0px;}
	.wedd_sel{width:100%;color: #4c1f1e;font-family: RadikalW01_Black_bold;height: 44px;     text-transform: uppercase;     letter-spacing: 1px;} 
	#footersl{background: url(../images/footers.png);padding: 150px 0px 50px 0px;background-repeat: no-repeat;background-position-y: center;border-bottom: 8px solid #4c1f1e;}
	.site_menus ul {
    margin: 0px;
    padding: 0px;
    float: right;
    width: 63%;
}
.site_menus ul li {
    display: inline;
    padding: 4px;
}
.site_menus a {
    color: #000;
    line-height: 30px;
	    text-decoration: none;
}
.site_menus {
    padding: 10px 0px;
}
.abouts_footers p{font-family:OPENSANS-REGULAR;color:#696969;padding: 10px 0px;line-height: 30px;font-size: 14px;}
.hotelslog img{margin-bottom: 30px;}

.barands_menus {
    text-align: center;
}
.barands_menus ul {
    margin-bottom: 40px;
    padding: 0px;
}
.barands_menus ul li {
    display: inline;
    padding: 8px;
}
.barands_menus a {
    color: #4c1f1e;
    font-weight: 600;
	font-family: OPENSANS-REGULAR;
	    text-decoration: none;
}
.footers_adds {
    border-right: 1px solid #000;
}
.footers_adds h3{
    font-family: OPENSANS-SEMIBOLD;
    font-size: 20px;
    color: #000;
}
.footers_adds p{
    font-family: OPENSANS-REGULAR;
    color: #696969;
}
.footers_adds span {
    display: block;
}
.footers_media{
    text-align: right;
}
.footers_media h3{
    text-align: left;
    padding-left: 55%;
    font-family: OPENSANS-SEMIBOLD;
    font-size: 20px;
    color: #000;
}
.footers_media ul{}
.footers_media ul li{
    display: inline-block;
    padding: 0px 10px;
}
.footers_media ul li a{
    display: inline-block;
    border: 1px solid #000;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    border-radius: 20px;
}
.footers_copyright {
    text-align: center;
    padding: 30px 0px 0px 0px;
}
.footers_copyright p{
    font-size: 16px;
    font-family: OPENSANS-REGULAR;
    font-weight: bold;
}
.footers_copyright p a {
    color: #000;
	 text-decoration: none;
}
.footers_media ul li a i {
    font-size: 18px;
    color: #000;
}
.hotelslog .col-md-4{ padding:0px;}




@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
body {
  font-family: 'Open Sans', 'sans-serif';
}
.mega-dropdown {
  position: static !important;
}
.mega-dropdown-menu {
    padding: 20px 0px;
    width: 100%;
    box-shadow: none;
    -webkit-box-shadow: none;
}
.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}
.mega-dropdown-menu > li > ul > li {
  list-style: none;
}
.mega-dropdown-menu > li > ul > li > a {
    display: block;
	padding: 10px 5px;
    border-bottom: 1px solid #ca7167;
    color: #4c1f1e;
    font-family: RadikalW01_Black_bold;
    text-transform: uppercase;
}
.mega-dropdown-menu > li ul > li > a:hover,
.mega-dropdown-menu > li ul > li > a:focus {
  text-decoration: none;
}
.mega-dropdown-menu .dropdown-header {
  font-size: 18px;
  color: #ff3546;
  padding: 5px 60px 5px 5px;
  line-height: 30px;
}



.jain_container .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover{    color: #f45541;    background-color: rgba(231, 231, 231, 0);}

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{--  @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif  --}}
<!---->

<link rel="stylesheet" href="http://mogulsdemo.com/html/pride-home/css/font-awesome.css">

<div class="jain_container">

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container1 container-fluid"> 
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<i class="icon-menu"></i> Menu
</button>
<a class="navbar-brand" href="#"> <img src="http://mogulsdemo.com/html/pride-home/images/logo.png" /></a>
</div>


 <div class="col-md-8">
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


<div class="col-md-12">
<ul class="nav navbar-nav">

<li class="dropdown mega-dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown">FIND YORU HOTEL <span class="caret"></span></a>				
				<ul class="dropdown-menu mega-dropdown-menu">
					<li class="col-sm-4">
    					<ul>
							<li class="dropdown-header">Features</li>
							<li><a href="#">Auto Carousel</a></li>
                            <li><a href="#">Carousel Control</a></li>
                            <li><a href="#">Left & Right Navigation</a></li>
							<li><a href="#">Four Columns Grid</a></li>
							<!-- <li class="divider"></li>
							<li class="dropdown-header">Fonts</li>
                            <li><a href="#">Glyphicon</a></li>
							<li><a href="#">Google Fonts</a></li> -->
						</ul>
					</li>
					<li class="col-sm-4">
						<ul>
							<li class="dropdown-header">Plus</li>
							<li><a href="#">Navbar Inverse</a></li>
							<li><a href="#">Pull Right Elements</a></li>
							<li><a href="#">Coloured Headers</a></li>                            
							<li><a href="#">Primary Buttons & Default</a></li>							
						</ul>
					</li>
					<li class="col-sm-4">
						<ul>
							<li class="dropdown-header">Much more</li>
                            <li><a href="#">Easy to Customize</a></li>
							<li><a href="#">Calls to action</a></li>
							<li><a href="#">Custom Fonts</a></li>
							<li><a href="#">Slide down on Hover</a></li>                         
						</ul>
					</li>
                   
				</ul>				
			</li>


<li><a href="#">SPECIAL OFFERS</a></li><li>
<a href="#">PLAN YOUR EVENTS</a></li><li>
<a href="#">OUR BRANDS</a></li>

<li><a href="#">LOYALTY</a></li>
<li>
<a href="#">CONTACT US</a>
</li>

</ul>
</div>
<div class="col-md-12">
<form class="form-horizontal form-horizontal_x">
<div class="col-md-12">
    <div class="form-group">
     
      <div class="col-sm-4">
	 <select  name="hotel" id="hotel" required="" class="form-control" onchange="changeFormaction2(this.value);">
                        <option value="" selected="">Select Hotel</option>
                                                <option value="67961">Pride Plaza Hotel Ahmedabad</option>
                                                <option value="67964">The Pride Hotel Bengaluru</option>
                                                <option value="29191">The Pride Hotel Nagpur</option>
                                                <option value="67963">The Pride Hotel Chennai</option>
                                                <option value="29190">The Pride Hotel, Pune</option>
                                                <option value="67962">Pride Plaza Hotel Kolkata</option>
                                                <option value="67580">Pride Plaza Hotel Delhi</option>
                                                <option value="8">Pride Amber Vilas Jaipur</option>
                                                <option value="65728">Pride Surya Mountain Resort Mcleodganj</option>
                                                <option value="60533">Pride Sun Village Resort SPA,Goa</option>
                                                <option value="138227">The Pride Biznotel,Vadodara</option>
                                        </select>
	  
        <!-- <input type="text" class="form-control" id="email" placeholder="Enter email"> -->
      </div>
	  
	  <div class="col-sm-3">          
        <input type="text" class="form-control" id="pwd" placeholder="Check In">
      </div>
	  
	  <div class="col-sm-3">          
        <input type="text" class="form-control" id="pwd" placeholder="Check Out">
      </div>
	  
	  <div class="col-sm-2">
        <button type="submit" class="btn btn-default">Book Now</button>
      </div>
    </div>
	</div>
	
  </form>
  </div>
  
</div>
</div>

<div class="col-md-2 medias">

<ul> 
<li> <a href=""> <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li> <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<li> <a href=""> <i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
<li> <a href=""> <i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>

</ul>

<div class="classus">

<p> Call us +91 22 39178077</p>

</div>

<div class="why_bookonline">
<p> Why Bookonline?</p>

</div>

</div>

 
</div>
 
</nav>


<div class="banner_home">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   <!--    <li data-target="#myCarousel" data-slide-to="3"></li> -->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="http://mogulsdemo.com/html/pride-home/images/banner/1.jpg" alt="pride Hotel banner"/>
		<div class="carousel-caption">
       <div class="tagline">
        <h3>never just stay

		<hr/>
		<span>stay inspired </span>
		</h3>
		<div class="new_years">
		<div class="new_years_inner">
		<h4> New Year Offer</h4>
      <a href="">  Grab it now >></a>
	  </div>
		</div>
		</div>
      </div>
		
		
      </div>

      <div class="item">
          <img src="http://mogulsdemo.com/html/pride-home/images/banner/1.jpg" alt="pride Hotel banner"/>
		<div class="carousel-caption">
       <div class="tagline">
        <h3>never just stay

		<hr/>
		<span>stay inspired </span>
		</h3>
		<div class="new_years">
		<div class="new_years_inner">
		<h4> New Year Offer</h4>
      <a href="">  Grab it now >></a>
	  </div>
		</div>
		</div>
      </div>
		
		
      </div>
    
      <div class="item">
          <img src="http://mogulsdemo.com/html/pride-home/images/banner/1.jpg" alt="pride Hotel banner"/>
		 <div class="carousel-caption">
       <div class="tagline">
        <h3>never just stay

		<hr/>
		<span>stay inspired </span>
		</h3>
		<div class="new_years">
		<div class="new_years_inner">
		<h4> New Year Offer</h4>
      <a href="">  Grab it now >></a>
	  </div>
		</div>
		</div>
      </div>
      </div>

    
    </div>

    <!-- Left and right controls -->
  <!--   <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
  </div>
</div>
</div>

<!---->



            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
