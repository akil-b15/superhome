<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperHome | Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/b7a72b64a1.js" crossorigin="anonymous"></script>
	<link href="style.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="modalanimate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans"> -->
</head>
<body>
    <div style="overflow-x:hidden">
<!-------PHP----->
<?php
    include 'dbconnect.php';
    $conn = OpenCon();
    $raw_results = mysqli_query($conn,"SELECT * FROM branches1") or die(mysql_error());
    $branches = mysqli_query($conn,"SELECT * FROM branches") or die(mysql_error());
    $packages_info = mysqli_query($conn,"SELECT DISTINCT name, image FROM packages_info WHERE status='1'") or die(mysql_error());
?>

<!-- menu  -->
<div >
    <div class="container-fluid row">
      <!-- Right nav fixtop -->
        <div class="">
            <h6 class="fixtop2 text-center" id="fixtop2">
                <img src="img/home/logo.png" style="width:70px;background:#f9fbe7;padding:10px;border-radius:10px" class="mb-3 mt-3 "alt=""><br>
                <a href="#home"><i class="fas fa-home" style="font-size:25px;;padding-top:20px"></i><p style="font-size:80%;">Home</p></a>
                <a href="#packages"><i class="fa fa-star-o" aria-hidden="true" style="font-size:25px;"></i><p style="font-size:80%;">Packages</p></a>
                <a href="#facilities"><i class="fab fa-buffer" style="font-size:25px;"></i><p style="font-size:80%;">Facilities</p></a>
                <a href="#branches"><i class="fa fa-map-marker" style="font-size:25px;"></i><p style="font-size:80%;">Branches</p></a>
                <a href="#contact"><i class="fas fa-phone" style="font-size:25px;"></i><p style="font-size:80%;">Connect</p></a>
                <a href="javascript:void(0)" class="closebtn" onclick="close1()"><i class="fa fa-chevron-circle-down"  style="font-size:24px;" aria-hidden="true"></i></a><br>
            </h6>
        </div>
        <!-- social media fixtop -->
        <div class="">
            <h6 class="fixtop3 hides text-center polaroid" id="fixtop3">

                <a href="https://www.facebook.com/superhomebd/" target="_blank"><i class="fab fa-facebook" style="font-size:28px;padding-top:30px"></i><p></p></a>
                <a href="https://twitter.com/superhomebd" target="_blank"><i class="fab fa-twitter" style="font-size:28px;;padding-top:30px"></i><p></p></a>
                <a href="https://www.youtube.com/channel/UCjWLCmbZ8_Pv4siYr4doN0A" target="_blank"><i class="fab fa-youtube" style="font-size:28px;;padding-top:30px"></i><p></p></a>
                <a href="https://www.instagram.com/superhomebd/" target="_blank"><i class="fab fa-instagram" style="font-size:28px;;padding-top:30px;padding-bottom:30px"></i></i><p></p></a>
            </h6>
        </div>
        <!-- first add fixtop -->
        <div class="">
            <h6 class="fixtop5 text-center polaroid" id="fixtop5">
            <a href="javascript:void(0)" class="closebtn" onclick="closepop()"><i class="fa fa-chevron-circle-down"  style="font-size:24px;" aria-hidden="true"></i></a><br>
                <img src="img/neways/pack.jpg" style="width:100%; margin-top:5%" alt="">
            </h6>
        </div>
        <!-- hidden button fixtop -->
        <div class="">
            <h1 class="fixtop1" id="fixtop1" onclick="show()"><i class="fa fa-chevron-circle-up"></i></h1>
        </div>
    </div>

</div>
<!--- Image Slider -->
<div class="container-fluid carousel" data-ride="carousel" id="home">

	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="img/neways/back12.jpg"  onclick="closeNav()">
			<div class="carousel-caption">
				<h1 class="display-2 fade-in">Super Home BD</h1>

				<a target="_blank">
					<button type="button" class="btn btn-outline-light btn-lg fade-in" onclick="openNav()">BOOKING</button>
				</a>
				<a href="#booking">
					<button type="button" class="btn btn-primary btn-lg fade-in" style="background:#d4e157">PACKAGES</button>
				</a>
			</div>
		</div>

	</div>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="z-index:1">&times;</a>
        <div class="container-fluid">
        	<div class="container-fluid pt-5">
                <form action="prebook_form.php" method="post">
                    <input type="hidden" name="from_pkg_pln">

                    <div class="row">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row" id="branchName">
                                        <div class="col-md-3">
                                            <label style="float: left;" for="exampleInputEmail1"><h4>Branches</h4></label>
                                            <div id="selected_dropdown_toggle" style="float: right; display: none;"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                        </div>
                                        <div id="selected_dropdown" style="display: none;" class="col-md-9">
                                        </div>
                                        <div class="col-md-9" id="hide_dropdown">
                                          <?php
                                          while($branch = mysqli_fetch_array($branches)){
                                          ?>
                                                    <button type="button" id="branch_btn" class="button branch" value="<?php echo $branch['branch_id'] ; ?>"><small><?php echo $branch['branch_name'] ; ?></small><br>
                                                        <?php
                                                            $branchLocal = '';
                                                            if(strtolower($branch['branch_name']) === 'super home 4'){
                                                                $branchLocal = $branch['branch_location'].' (Female)';
                                                            }else{
                                                                $branchLocal = $branch['branch_location'] .' (Male)';
                                                            }
                                                            echo $branchLocal;
                                                            ?></button>
                                                <?php  }?>
                                        </div>
                                    </div>
                                    <div class="row" id="package">

                                    </div>
                                    <div class="row" id="packageName">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group" id="packageDetails">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!---End Image Slider -->

<!---Welcome -->
<div class="container padding fade-in" id="packages">
	<div class="welcome text-center">
		<div class="col-12 mt-3">
			<h1 class="display-4">WELCOME</h1>
		</div>

		<hr>
		<!-- <div class="container">
			<p class="lead">Take A Look
            </p>
		</div> -->
	</div>
</div>
<!---End Welcome -->

<!--------slide------------>
<div class="container" id="home">
    <div class="row justify-content-center" style="padding-top:30px;background:#f9fbe7">
        <label for="radio1" class="manual-btn active">First Class</label>
        <label for="radio2" class="manual-btn">Business Class</label>
        <label for="radio3" class="manual-btn">Standard Class</label>
    </div>
    <div class="row">
        <div class="col-12" style="background:#f9fbe7">
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <div class="flx">
                        <div class="slide1 first" style="display:inherit">
                          <img src="img/neways/firstclass.jpg" alt="">
                        </div>
                        <div class="slide1">
                          <img src="img/neways/businessclass.jpg" alt="">
                        </div>
                        <div class="slide1">
                          <img src="img/neways/standardclass.jpg" alt="">
                        </div>
                    </div>
                    <div class="row flx">
                        <div class="slide2 first sl1" >
                            <h1>First Class</h1>
                        </div>
                        <div class="slide2 sl2">
                            <h1>Business Class</h1>
                        </div>
                        <div class="slide2 sl3">
                            <h1>Standard Class</h1>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="d-flex justify-content-center popup">
                        <button class="button1" onclick="return view_modal0()">Learn More</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-container" class="view_modal0" style="margin-left:0%">
    <div class="modal-background">
        <div class="modal modald" style="overflow:scroll">
            <!-- <div class="row"> -->
                <div class="col-sm-12">
                    <button onclick="return view_modal0(1)" type="button"  style="float:right;font-size:35px;cursor:pointer;color:#afb42b;background:rgba(230, 238, 156, 1)">
                        <i class="fas fa-times-circle"></i>
                    </button>
                    <!-- <div class="col-sm-12">
                        <h1 style = "text-align:center;">All class</h1> -->
                    <div class="row col-12" style="position:absolute; top: 60px;text-align:left; word-wrap: break-word; margin: 10px, font-style:bold">
                        <div class="col-md-4 col-12" style="margin-left: px;background: #fafafa;border-radius: 10px;">
                            <h1>First Class</h1>
                            <h2>BDT 9999 monthly</h2>
                            <h2 style="line-height:35px">3 Times Hot Meal <br> AC Room<br> Personal Locker & Luxurious Lobby <br> Laundry & Cleaning Services <br> Electric Clothes Dryer & Hair Dryer <br>
                                GYM & Cricket Playing Zone <br>
                                Finger Print Entrance <br> CCTV Camera & 24 Hours Security <br>
                                Reading Room & Reading Lamp (Bed) <br>
                                Wi-Fi Services & USB Socket <br>
                                Multi-functional Bed <br>
                                RO System (Purified Water) <br>
                                Smart LED TV(65″) <br>
                                Generator & Fire Safety<br>
                                Bed, Bedsit, Pillow & Pillow Cover<br>
                                Auto Shoe Polisher & Shoe Shelf<br>
                                Lift Service Available<br>
                                *Conditional Apply<br>
                            </h2>
                        </div>
                        <div class="col-md-4 col-12">
                            <h1>Business Class</h1>
                            <h2>BDT 8999 monthly</h2>
                            <h2 style="line-height:35px">3 Times Hot Meal <br> AC Room<br> Personal Locker & Luxurious Lobby <br> Laundry & Cleaning Services <br> Electric Clothes Dryer & Hair Dryer <br>
                                GYM & Cricket Playing Zone <br>
                                Finger Print Entrance <br> CCTV Camera & 24 Hours Security <br>
                                Reading Room & Reading Lamp (Bed) <br>
                                Wi-Fi Services & USB Socket <br>
                                Multi-functional Bed <br>
                                RO System (Purified Water) <br>
                                Smart LED TV(65″) <br>
                                Generator & Fire Safety<br>
                                Bed, Bedsit, Pillow & Pillow Cover<br>
                                Auto Shoe Polisher & Shoe Shelf<br>
                                Lift Service Available<br>
                                *Conditional Apply<br>
                            </h2>
                        </div>
                        <div class="col-md-4 col-12"style="margin-left: px;background: #fafafa;border-radius: 10px;">
                            <h1>Standard Class</h1>
                            <h2>BDT 7999 monthly</h2>
                            <h2 style="line-height:35px">3 Times Hot Meal <br> AC Room<br> Personal Locker & Luxurious Lobby <br> Laundry & Cleaning Services <br> Electric Clothes Dryer & Hair Dryer <br>
                                GYM & Cricket Playing Zone <br>
                                Finger Print Entrance <br> CCTV Camera & 24 Hours Security <br>
                                Reading Room & Reading Lamp (Bed) <br>
                                Wi-Fi Services & USB Socket <br>
                                Multi-functional Bed <br>
                                RO System (Purified Water) <br>
                                Smart LED TV(65″) <br>
                                Generator & Fire Safety<br>
                                Bed, Bedsit, Pillow & Pillow Cover<br>
                                Auto Shoe Polisher & Shoe Shelf<br>
                                No Lift Service<br>
                                *Conditional Apply<br>
                            </h2>
                        </div>
                        <!-- </div> -->
                    </div>


                    <!-- </div> -->

                </div>
            <!-- </div>-->
        </div>
    </div>
</div>

<!--------End Slide-------->

<!-- Facilities -->
<div class="container mt-3" id="facilities">

    <div id="packages">
        <div class="welcome text-center">
            <div class="col-12">
                <h5 class="display-4">Facilities</h5>
            </div>

            <hr>
            <!-- <div class="col-12">
                <p class="lead"></p>
            </div> -->
        </div>
    </div>
    <div class="row col-md-12" style="margin-left: 15px">
        <div class="row col-md-6">
            <div class="col-md-4 col-4 pos slide-in from-left" style="text-align: right">
                <h3>Multi-functional Bed with personal locker</h3>
            </div>
            <div class="col-md-8 col-8">
                <img src="img/home/bed.jpg" class="img-fluid slide-in from-left">
            </div>
            <div class="col-md-8 col-8 slide-in from-right" style="text-align: right">
                <img src="img/home/dining.jpg" class="img-fluid">
            </div>
            <div class="col-md-4 col-4 pos slide-in from-right">
                <h3>3 Times Meal</h3>
            </div>
            <div class="col-md-4 col-4 pos slide-in from-left" style="text-align: right">
                <h3>Luxarious Lobby</h3>
            </div>
            <div class="col-md-8 col-8">
                <img src="img/home/lobby8.jpg" class="img-fluid slide-in from-left">
            </div>
        </div>
        <div class="row col-md-6">

            <div class="col-md-4 col-4 pos slide-in from-left" style="text-align: right">
                <h3>Reading Room</h3>
            </div>
            <div class="col-md-8 col-8">
                <img src="img/home/reading.jpg" class="img-fluid slide-in from-left">
            </div>
            <div class="col-md-8 col-8">
                <img src="img/home/sports.jpg" class="img-fluid slide-in from-right">
            </div>
            <div class="col-md-4 col-4 pos slide-in from-right" style="text-align: left">
                <h3>Playing Zone</h3>
            </div>
            <div class="col-md-4 col-4 pos slide-in from-left" style="text-align: right">
                <h3>Gym</h3>
            </div>
            <div class="col-md-8 col-8 slide-in from-left" style="text-align: right">
                <img src="img/home/gym.jpg" class="img-fluid">
            </div>


        </div>

    </div>
</div>
<!-- End Facilities -->

<!-- unused -->
<!-- <div class="container" id="packages">
	<div class="welcome text-center">
		<div class="col-12 fade-in">
			<h6 class="display-4">Other Facilities We Offer For Free</h6>
		</div>
		<hr>
	</div>
</div>
<div class="row col-12 padding fade-in" style="text-align:center;padding-left:20%;padding-right:20%">
    <div class="col-md-2 col-sm-2 col-6">
        <img class="width-95-px" src="img/icon/ac.png" alt="24hour"><br>
        <h8 class="display-4">Air Condition</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
        <img class="width-95-px" src="img/icon/cctv.png" alt="24hour"><br>
        <h8 class="display-4">24 Hours Security</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
        <img class="width-95-px" src="img/icon/gym.png" alt="24hour"><br>
        <h8 class="display-4">GYM</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
        <img class="width-95-px" src="img/icon/hairdryer.png" alt="24hour"><br>
        <h8 class="display-4">Hair Dryer</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
    <img class="width-95-px" src="img/icon/wifi.png" alt="24hour"><br>
        <h8 class="display-4">Wi-Fi</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
        <i class="fas fa-fingerprint" style="font-size:65px;color:#afb42b" aria-hidden="true"></i><br>
        <h8 class="display-4">Finger Print Entrance</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
        <i class="fa fa-fire-extinguisher" style="font-size:65px;color:#afb42b" aria-hidden="true"></i><br>
        <h8 class="display-4">Fire Safety</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
    <img class="width-95-px" src="img/icon/washingmachine.png" alt="24hour"><br>
        <h8 class="display-4">Washing Machine</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
    <img class="width-95-px" src="img/icon/smarttv.png" alt="24hour"><br>
        <h8 class="display-4">Smart TV</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
    <img class="width-95-px" src="img/icon/generator.png" alt="24hour"><br>
        <h8 class="display-4">Generator</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
    <img class="width-95-px" src="img/icon/shoepolisher.png" alt="24hour"><br>
        <h8 class="display-4">Shoe Polish</h8>
    </div>
    <div class="col-md-2 col-sm-2 col-6">
    <img class="width-95-px" src="img/icon/housekeeing.png" alt="24hour"><br>
        <h8 class="display-4">Cleaning Service</h8>
    </div>


</div> -->

<hr class="my-4">
<!---End Facilities -->
<!--- About US -->
<!--
<div class="container" id="booking">
	<div class="welcome text-center">
		<div class="col-12 fade-in">
			<h1 class="display-4">OUR TOP MANAGEMENT</h1>
		</div>
		<hr>
	</div>

    <div class="row text-center fade-in">
        <div class="col-md-4 mb-2">
            <div>
                <img class="card-img-top feature-img" src="img/home/mr-zhang-li-guang-min.jpg" alt="Card image" style="border-radius:3%">
                <div class="card-body">
                <h3 class="card-title mb-3">
                    Mr. Zhang Li Guang
                </h3>
                <h4>Managing Director</h4>
                </div>
            </div>

        </div>
        <div class="col-md-4 mb-2">
            <div>
                <img class="card-img-top feature-img" src="img/home/mr-zhang-zhimin.jpg" alt="Card image" style="border-radius:3%">
                <div class="card-body">
                <h3 class="card-title mb-3">
                    Mr. Zhang Zhimin
                </h3>
                <h4>Chief Operating Officer</h4>
                </div>
            </div>

        </div>
        <div class="col-md-4 mb-2">
            <div>
                <img class="card-img-top feature-img" src="img/home/jolin-min.jpg" alt="Card image" style="border-radius:3%">
                <div class="card-body">
                    <h3 class="card-title mb-3">
                        Zhang Rui Ling
                    </h3>
                    <h4>Head of Supply Chain Management</h4>
                </div>
            </div>

        </div>
    </div>
</div> -->

<!--- End About Us -->
<!--- Fixed background -->
<!-- <figure>
	<div class="fixed-wrap">
		<div id="fixed">

		</div>
	</div>
</figure> -->
<!-- end unused -->

<!-- Noteworthy Facilities -->
<section class="parallaxm mb-3">
    <div class="parallax-innerm"  style="backdrop-filter: blur(20px);">
        <div class="container" id="facilities">
            <div class="welcome text-center">
                <div class="col-12 fade-in">
                    <h2>Our Noteworthy Facilities</h5>
                </div>
                <hr>
            </div>
        </div>
        <div class="row fade-in padding-facility">
            <!-- <div class="row col-md-2 col-sm-2 col-6" style="background-color:#afb42b; border-radius:5px;color:#fafafa;margin-right:2px">
                <h8 class="display-4">Air Condition</h8><br>
                <img class="width-95-px" src="icon/g.png" alt="24hour"><br>

            </div> -->
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/ac.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Air Condition</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/cctv1.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">24 Hours Security</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/gym.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">GYM</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/hairdryer.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Hair Dryer</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/wifi.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Wi-Fi</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/fingeraccess.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Finger Print Entrance</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/firesafe.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Fire Safety</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/washingmachine.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Washing Machine</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/smarttv.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Smart TV</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/generator.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Generator</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/shoepolisher.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Shoe Polish</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-6">
                <div class="card boxx polaroid h-100">
                    <img class="card-img-top" src="img/icon/housekeeing.png" style="opacity: 0.9;" alt="Card image cap">
                    <div class="br-c-body">
                        <h5 style="font-size:80%;font-weight: bold;" class="card-title">Cleaning Service</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Noteworthy Facilities -->

<!---Packages -->
<div class="container padding mb-5" id="booking" style="padding-left:50px; padding-right:50px">
	<div class="row welcome text-center">
		<div class="col-12 fade-in mt-4">
			<h1 class="display-4">Beds We Provide</h1>
		</div>

	</div>

    <div class="row fade-in transf justify-content-center text-center">
<?php
while($package_inf = mysqli_fetch_array($packages_info)){
?>
        <div class="col-md-4 mb-2">
            <div class="card">
                <img class="card-img-top feature-img" src="img/bed/<?php  echo $package_inf['image'] ; ?>" alt="Card image">

                <div class="card-body">
                    <h3 class="card-title mb-3">
                        <?php  echo "<p>".$package_inf['name']."</p>" ; ?>
                    </h3>
                    <!-- <a href="booking.php"> Learn More </a><br> -->

                </div>
            </div>

        </div>
<?php } ?>

    </div>


</div>
<!---END Packages -->

<!-- Media Coverage -->
<div class="container mb-5" style="background:#f0f4c3">
  <div class="row welcome text-center">
  		<div class="col-12 fade-in mt-4">
  			<h1 class="display-4">On Top Media Coverage</h1>
  		</div>

  </div>
  <div class="container mb-5">
      <div class="row justify-content-center text-center">
          <div class="col-md-2 col-sm-2 col-6">
              <a href="https://www.prothomalo.com/business/%E0%A6%AC%E0%A6%BE%E0%A6%A1%E0%A7%8D%E0%A6%A1%E0%A6%BE%E0%A7%9F-%E0%A6%B8%E0%A7%81%E0%A6%AA%E0%A6%BE%E0%A6%B0-%E0%A6%B9%E0%A7%8B%E0%A6%B8%E0%A7%8D%E0%A6%9F%E0%A7%87%E0%A6%B2-%E0%A6%AC%E0%A6%BF%E0%A6%A1%E0%A6%BF%E0%A6%B0-%E0%A6%A8%E0%A6%A4%E0%A7%81%E0%A6%A8-%E0%A6%B6%E0%A6%BE%E0%A6%96%E0%A6%BE" target="_blank">
              <img class="media2" src="img/media/pothomalo.jpg" alt="">
              <h5>Prothom Alo</h5></a>
          </div>
          <div class="col-md-2 col-sm-2 col-6">
              <a href="https://www.ekushey-tv.com/%E0%A6%AC%E0%A6%BE%E0%A6%A1%E0%A7%8D%E0%A6%A1%E0%A6%BE%E0%A7%9F-%E0%A6%89%E0%A6%A6%E0%A7%8D%E0%A6%AD%E0%A7%8B%E0%A6%A7%E0%A6%A8-%E0%A6%B9%E0%A6%B2-%E0%A6%B8%E0%A7%81%E0%A6%AA%E0%A6%BE%E0%A6%B0-%E0%A6%B9%E0%A7%8B%E0%A6%B8%E0%A7%8D%E0%A6%9F%E0%A7%87%E0%A6%B2-%E0%A6%AC%E0%A6%BF%E0%A6%A1%E0%A6%BF%E0%A6%B0-%E0%A7%AD%E0%A6%AE-%E0%A6%B6%E0%A6%BE%E0%A6%96%E0%A6%BE/75178" target="_blank">
              <img class="media2" src="img/media/ekusheye.jpg" alt="">
              <h5>Ekushey TV</h5></a>
          </div>
          <div class="col-md-2 col-sm-2 col-6">
              <a href="https://www.somoynews.tv/pages/details/178728?fbclid=IwAR2CfXUGPD9YeJUe_4SlbUUpbVUkuchsp6wEbJMUNzNuhyRdO9TV0RybiyE." target="_blank">
              <img class="media2" src="img/media/somoy.jpg" alt="">
              <h5>Somoy News</h5></a>
          </div>
          <div class="col-md-2 col-sm-2 col-6">
              <a href="https://www.thedailystar.net/business/news/housing-problem-china-firm-build-100-hostels-dhaka-1806751" target="_blank">
              <img class="media2" src="img/media/dailystar.jpg">
              <h5>The Daily Star</h5></a>
          </div>
          <div class="col-md-2 col-sm-2 col-6">
              <a href="https://www.dailyjanakantha.com/details/article/438833/%E0%A6%AC%E0%A6%BE%E0%A6%A1%E0%A7%8D%E0%A6%A1%E0%A6%BE%E0%A7%9F-%E0%A6%89%E0%A6%A6%E0%A7%8D%E0%A6%AD%E0%A7%8B%E0%A6%A7%E0%A6%A8-%E0%A6%B9%E0%A6%B2-%E0%A6%B8%E0%A7%81%E0%A6%AA%E0%A6%BE%E0%A6%B0-%E0%A6%B9%E0%A7%8B%E0%A6%B8%E0%A7%8D%E0%A6%9F%E0%A7%87%E0%A6%B2-%E0%A6%AC%E0%A6%BF%E0%A6%A1%E0%A6%BF%E0%A6%B0-%E0%A7%AD%E0%A6%AE-%E0%A6%B6%E0%A6%BE%E0%A6%96%E0%A6%BE/" target="_blank">
              <img class="media2"src="img/media/janakantho.jpg" alt="">
              <h5>The Daily Janakantha</h5></a>
          </div>
          <div class="col-md-2 col-sm-2 col-6">
              <a href="">
              <img class="media2" src="img/media/jago.png" alt="">
              <h5>Jago News 24</h5></a>
          </div>
          <div class="col-md-2 col-sm-2 col-6">
              <a href="https://www.bangladeshtoday.net/%E0%A6%9B%E0%A6%BE%E0%A6%A4%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AC%E0%A6%BE%E0%A6%B8-%E0%A6%B8%E0%A6%82%E0%A6%95%E0%A6%9F-%E0%A6%AE%E0%A7%8B%E0%A6%95%E0%A6%BE%E0%A6%AC%E0%A7%87%E0%A6%B2%E0%A6%BE%E0%A7%9F/" target="_blank">
              <img class="media2" src="img/media/bdtoday.png" alt="">
              <h5>Bangladesh Today</h5></a>
          </div>
          <div class="col-md-2 col-sm-2 col-6">
              <a href="" target="_blank">
              <img class="media2" src="img/media/fm.jpg" alt="">
              <h5>96.4 Special FM</h5></a>
          </div>
          <div class="col-md-2 col-sm-2 col-6">
              <a href="" target="_blank">
              <img class="media2" src="img/media/karatoa.jpg" alt="">
              <h5>Daily Karotoa</h5></a>
          </div>


      </div>
  </div>
</div>
<!--End Media Coverage -->

<!---BRANCHES -->
<div class="container-fluid" id="branches">
	<div class="row welcome text-center fade-in">
		<div class="col-12">
			<h1 class="display-4">OUR BRANCHES</h1>
		</div>

	</div>
  <div class="row fade-in justify-content-center">
    <div class="col-md-2">

    </div>
      <div class="row col-md-8">
        <?php
            while($results = mysqli_fetch_array($raw_results)){
        ?>
        <div class="col-md-4 text-center">
            <div class="card h-100" style="border-radius:3%">
                <img class="card-img-top feature-img"  style="border-radius:3% 3% 0% 0%; height: 180px;" src="img/br3/<?php echo $results['background']; ?>" alt="Card image" >
                <div class="card-body" style="padding:.6rem">
                    <h5 class="card-title" style="font-size:120%;margin-bottom: 0rem;">
                        <?php  echo "<p style='margin-bottom: 0rem'>".$results['name']."</p>" ; ?>
                    </h5>
                    <div class="row" style="text-align: center">
                        <div class="col-3"><i class="fa fa-map-marker" style="font-size:48px;color:#afb42b;transform: scale(1);padding-left:10px"></i></div>
                        <div class="col-9"><a align="justify"> <?php  echo "<h5 style='font-size:75%'>".$results['location']."</h6>" ; ?> </a></div>
                        <!-- <div style="position:absolute; bottom:15px;left:0;right:0"><a class="branbtn" style="background:#afb42b; color:#fafafa" href="branches.php?id=<!?php  echo $results['id'] ; ?>" style="font-weight:bold;text-transform: unset;letter-spacing: 0px;"> Take A Tour </a><br></div> -->

                    </div>
                    <!-- <div><a href="branches.php?id=<!?php  echo $results['id'] ; ?>" style="position:absolute; bottom:0px;left:0;right:0;font-weight:bold;text-transform: unset;letter-spacing: 0px;"><div class="btn" style="background:#d4e157;width:100%"> Take A Tour</div> </a><br></div> -->
                    <a class="manual-btn" href="branches.php?id=<?php  echo $results['id'] ; ?>" style="position:absolute; bottom:2px;right:2%; font-size:.7rem">Take a tour</a>
                </div>
            </div>
        </div>
        <?php

            };

          CloseCon($conn);

        ?>
      </div>
      <div class="col-md-2">

      </div>
  </div>
  <div class="row justify-content-center">
    <button class="button1 fade-in mt-4 mb-4" data-toggle="collapse" data-target="#emoji">View Galary <i class="fas fa-angle-double-down"></i></button>
  </div>
</div>
<!-- branches end -->

<!-- hidden gallary -->
<div class="collapse" id="emoji">

    <div class="container my-4" style="max-width:70%">

        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

        <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">

                    <div class="row">
                        <div class="col-md-2 col-4">
                            <img src="img/br3/9.jpg" alt="">
                        </div>

                        <div class="col-md-2 col-4">
                            <img src="img/br3/10.jpg" alt="">
                        </div>

                        <div class="col-md-2 col-4">
                            <img src="img/br3/11.jpg" alt="">
                        </div>

                        <div class="col-md-2 col-4">
                            <img src="img/br3/12.jpg" alt="">
                        </div>

                        <div class="col-md-2 col-4">
                            <img src="img/br3/13.jpg" alt="">
                        </div>

                        <div class="col-md-2 col-4">
                            <img src="img/br3/14.jpg" alt="">
                        </div>
                    </div>

                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">

                    <div class="row">
                        <div class="col-md-2 col-4">
                            <img src="img/br3/15.jpg" alt="">
                        </div>
                        <div class="col-md-2 col-4">
                            <img src="img/br3/16.jpg" alt="">
                        </div>
                        <div class="col-md-2 col-4">
                            <img src="img/br3/17.jpg" alt="">
                        </div>
                        <div class="col-md-2 col-4">
                            <img src="img/br3/18.jpg" alt="">
                        </div>
                        <div class="col-md-2 col-4">
                            <img src="img/br3/19.jpg" alt="">
                        </div>
                        <div class="col-md-2 col-4">
                            <img src="img/br3/20.jpg" alt="">
                        </div>

                    </div>

                </div>
                <!--/.Second slide-->



            </div>
            <!--/.Slides-->

            <!--Controls-->
            <div class="controls-top">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left" id="icond"></i></a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right" id="icond"></i></a>
            </div>
            <!--/.Controls-->

        </div>
        <!--/.Carousel Wrapper-->


    </div>
</div>
<!-- end hidden gallary -->

<!--- Connect for mobile-->
<div class="container hides" id="connect">
	<div class="row text-center padding">
		<div class="col-12 fade-in">
			<h2>Connect</h2>
		</div>
		<div class="col-12 social padding fade-in">
			<a href="https://www.facebook.com/superhomebd/" target="_blank"><i class="fab fa-facebook"></i></a>
			<a href="https://twitter.com/superhomebd" target="_blank"><i class="fab fa-twitter"></i></a>
			<a href="https://www.youtube.com/channel/UCjWLCmbZ8_Pv4siYr4doN0A" target="_blank"><i class="fab fa-youtube"></i></a>
			<a href="https://www.instagram.com/superhomebd/" target="_blank"><i class="fab fa-instagram"></i></a>
		</div>
	</div>
</div>
<!--- end Connect for mobile-->

<!-- Feedback FORM -->
<div class="container padding fade-in" id="contact">
    <div class="row col-md-12 contact-info justify-content-center">
    <div class="row col-md-6 col-12 justify-content-center">
        <div class="form-group col-md-6 name-field">
            <input type="text" name="name" id="contact-name" class="form-control" required="required" placeholder="Name">
        </div>
        <div class="form-group col-md-6 email-field">
            <input type="text" name="mobile" class="form-control" id="contact-mobile" required="required" placeholder="Mobile Number">
        </div>
        <div class="form-group col-md-12 email-field">
            <input type="email" name="email" class="form-control stp" id="contact-email" required="required" placeholder="Email Id">
        </div>
        <div class="form-group col-md-12">
            <textarea name="message" id="message" required="required" class="form-control stpp" rows="8" placeholder="Your Text"></textarea>
        </div>
        <div class="row justify-content-center">
            <button class="button">Submit</button>
        </div>
    </div>
    <div class="col-md-6 text-center">
        <h2 style="padding:10px;color:#4a4309">Our Contact Information</h2>
        <h5 style="color:#4a4309">
            <p><i class="fa fa-phone" style="color:#afb42b"></i> Phone: +8809638666333</p>
            <p><i class="fa fa-envelope" style="color:#afb42b"></i> Email: sales@superhomebd.com</p>
        </h5>
        <h2 style="padding:10px;color:#4a4309">Business Hours</h2>
        <h5 style="color:#4a4309">
            <p><i class="fa fa-clock-o" style="color:#afb42b"></i> Mon. - Sun. 8am to 7pm</p>
            <p><i class="fa fa-clock-o" style="color:#afb42b"></i> Open All day</p>
        </h5>
    </div>
    </div>

</div>
<!-- End Feedback Form -->

<!--- Footer -->
<footer id="about">
    <div class="container padding">
        <div class="text-center">
            <!-- <h4>Footer</h4> -->
            <div class="col-12">
                <!-- <hr class="light-100"> -->
                <h5>&copy; 2016-2021. Neways S & IT Department. All rights reserved.</h5>
            </div>
        </div>
    </div>
</footer>

<script>
    function myFunction(x) {
        myID = document.getElementById("connect");
        if (x.matches) { // If media query matches
            myID.className = "container shows"


        } else {
            myID.className = "container hides"
        }
    }

    var x = window.matchMedia("(max-width: 576px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes
</script>

<script>
    $(document).ready(function () {
  $('.thumb a').on('click', function (e) {
      e.preventDefault();
      $('.imgBox img').attr("src", $(this).attr("href"));
  })
});
$(document).scroll(function() {

  myID = document.getElementById("fixtop3");
  myID2 = document.getElementById("fixtop2");
  var myScrollFunc = function () {
      var y = window.scrollY;
      if (y >= 700) {
          myID.className = "fixtop3 shows text-center polaroid";
          // myID2.className = "fixtop2 showff text-center";
      } else {
          myID.className = "fixtop3 hides text-center polaroid";
          // myID2.className = "fixtop2 hideff text-center";
      }
  };

  window.addEventListener("scroll", myScrollFunc);
});
</script>
<!-------------JS----------->


<script src="js/observers.js">

</script>

<!-- <script type="text/javascript" src="js/package_plan.js"></script>

<script> -->

<!-------------JS END--------->
</div>
</body>
</html>
