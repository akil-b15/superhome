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
        <div class="">
            <h6 class="fixtop3 hides text-center polaroid" id="fixtop3">

                <a href="https://www.facebook.com/superhomebd/" target="_blank"><i class="fab fa-facebook" style="font-size:28px;padding-top:30px"></i><p></p></a>
                <a href="https://twitter.com/superhomebd" target="_blank"><i class="fab fa-twitter" style="font-size:28px;;padding-top:30px"></i><p></p></a>
                <a href="https://www.youtube.com/channel/UCjWLCmbZ8_Pv4siYr4doN0A" target="_blank"><i class="fab fa-youtube" style="font-size:28px;;padding-top:30px"></i><p></p></a>
                <a href="https://www.instagram.com/superhomebd/" target="_blank"><i class="fab fa-instagram" style="font-size:28px;;padding-top:30px;padding-bottom:30px"></i></i><p></p></a>
            </h6>
        </div>
        <div class="">
            <h6 class="fixtop5 text-center polaroid" id="fixtop5">
            <a href="javascript:void(0)" class="closebtn" onclick="closepop()"><i class="fa fa-chevron-circle-down"  style="font-size:24px;" aria-hidden="true"></i></a><br>
                <img src="img/neways/pack.jpg" style="width:100%; margin-top:10%" alt="">
            </h6>
        </div>
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