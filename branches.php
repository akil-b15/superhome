<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Branch</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/b7a72b64a1.js" crossorigin="anonymous"></script>
      <link href="style.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="modalanimate.css" rel="stylesheet">

  </head>
  <body style="background:#ffffff;overflow-x:hidden">
    <div  style="overflow-x:hidden">
      <?php
          include 'dbconnect.php';
          $conn = OpenCon();
          $branch = $_GET['id'];
          $raw_results = mysqli_query($conn,"SELECT * FROM branches1 WHERE id=$branch") or die(mysql_error());
          $packages_info = mysqli_query($conn,"SELECT * FROM packages_info where branch_id=$branch") or die(mysql_error());
          $branches = mysqli_query($conn,"SELECT * FROM branches") or die(mysql_error());

      ?>
      <div id="mySidebar" class="sidebar" style="z-index:6">
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
                                            while($branchs = mysqli_fetch_array($branches)){
                                            ?>
                                            <button type="button" id="branch_btn" class="button branch" value="<?php echo $branchs['branch_id'] ; ?>"><small><?php echo $branchs['branch_name'] ; ?></small><br>
                                                <?php
                                                    $branchLocal = '';
                                                    if(strtolower($branchs['branch_name']) === 'super home 4'){
                                                        $branchLocal = $branchs['branch_location'].' (Female)';
                                                    }else{
                                                        $branchLocal = $branchs['branch_location'] .' (Male)';
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
      <div class="">
          <h6 class="fixtop4 hidess text-center polaroid" id="fixtop4">

              <a href="https://www.facebook.com/superhomebd/" target="_blank"><i class="fab fa-facebook" style="font-size:28px;padding-top:30px"></i><p></p></a>
              <a href="https://twitter.com/superhomebd" target="_blank"><i class="fab fa-twitter" style="font-size:28px;;padding-top:30px"></i><p></p></a>
              <a href="https://www.youtube.com/channel/UCjWLCmbZ8_Pv4siYr4doN0A" target="_blank"><i class="fab fa-youtube" style="font-size:28px;;padding-top:30px"></i><p></p></a>
              <a href="https://www.instagram.com/superhomebd/" target="_blank"><i class="fab fa-instagram" style="font-size:28px;;padding-top:30px;padding-bottom:30px"></i></i><p></p></a>
          </h6>
      </div>
      <div class="wrapper">

        <!-- Sidebar  -->
        <nav id="sidebar">


            <ul class="active fix transft" id="sidebarCollapses">
                <!-- <p>Dummy Heading</p> -->
                <li >
                    <img src="img/home/logo.png" style="width:110px;margin-left:30%;background:#e6ee9c;padding:10px;border-radius:10px" class="mb-3 mt-3 "alt="">

                </li>
                <li>
                    <a href="index.php">Home</a>

                </li>
                <li>
                    <a href="#galary">Galary</a>
                </li>
                <li>
                    <a href="#facilities">Facilities</a>

                </li>
                <li>
                    <a href="#address">Address</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
                <li>
                    <a href="#" onclick="openNav()">Booking</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">
          <!-- sidebarToggle for phone -->
          <div class="container-fluid side-menu fix" >
              <button type="button" id="sidebarCollapse" class="btn" style="background:#c0ca33;color:#fafafa">
                  <i class="fas fa-align-left"></i>
              </button>
          </div>

          <!-- Page content wrapper-->
          <div>
            <div class="container-fluid" id="home" style="margin-top:-50px">
              <div class="margin"></div>
                <?php
                while($results = mysqli_fetch_array($raw_results)){
                    if($branch==1){
                ?>
                <section class="parallax">
                    <!-- <div class="parallax-inner">
                    <a target="_blank">
                        <button type="button" class="btn bookbr btn-lg fade-in" onclick="openNav()" style="left:50%;top:40%">BOOKING</button>
                    </a>
                    <!?php  echo "<h1>".$results['name']."</h1>" ; ?>
                    </div> -->
                </section>
                <?php }elseif($branch==2){ ?>
                <section class="parallax2">
                    <!-- <div class="parallax2-inner">
                    <a target="_blank">
                        <button type="button" class="btn bookbr btn-lg fade-in" onclick="openNav()" style="left:50%;top:40%">BOOKING</button>
                    </a>
                    <!?php  echo "<h1>".$results['name']."</h1>" ; ?>
                    </div> -->
                </section>
                <?php }elseif($branch==3){ ?>
                <section class="parallax3">
                    <!-- <div class="parallax3-inner">
                    <a target="_blank">
                        <button type="button" class="btn bookbr btn-lg fade-in" onclick="openNav()" style="left:50%;top:40%">BOOKING</button>
                    </a>
                    <!?php  echo "<h1>".$results['name']."</h1>" ; ?>
                    </div> -->
                </section>
                <?php }elseif($branch==4){ ?>
                <section class="parallax4">
                    <!-- <div class="parallax4-inner">
                    <a target="_blank">
                        <button type="button" class="btn bookbr btn-lg fade-in" onclick="openNav()" style="left:50%;top:40%">BOOKING</button>
                    </a>
                    <!?php  echo "<h1>".$results['name']."</h1>" ; ?>
                    </div> -->
                </section>
                <?php }elseif($branch==5){ ?>
                <section class="parallax5">
                    <!-- <div class="parallax5-inner">
                    <a target="_blank">
                        <button type="button" class="btn bookbr btn-lg fade-in" onclick="openNav()" style="left:50%;top:40%">BOOKING</button>
                    </a>
                    <!?php  echo "<h1>".$results['name']."</h1>" ; ?>
                    </div> -->
                </section>
                <?php }elseif($branch==6){ ?>
                <section class="parallax6">
                    <!-- <div class="parallax6-inner">
                    <a target="_blank">
                        <button type="button" class="btn bookbr btn-lg fade-in" onclick="openNav()" style="left:50%;top:40%">BOOKING</button>
                    </a>
                    <!?php  echo "<h1>".$results['name']."</h1>" ; ?>
                    </div> -->
                </section>
                <?php }else{ ?>
                <section class="parallax">
                    <!-- <div class="parallax-inner">
                    <a target="_blank">
                        <button type="button" class="btn bookbr btn-lg fade-in" onclick="openNav()" style="left:50%;top:40%">BOOKING</button>
                    </a>
                    <!?php  echo "<h1>".$results['names']."</h1>" ; ?>
                    </div> -->
                </section>
                <?php } ?>

              <div class="margin"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- jQuery CDN - Slim version (=without AJAX) -->
      <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
      <!-- Popper.JS -->
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
      <!-- Bootstrap JS -->
      <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->

      <script>
        function myFunction(x) {
            if (x.matches) { // If media query matches
                $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            });
            $('#sidebarCollapses').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
            } else {

            }
        }

        var x = window.matchMedia("(max-width: 576px)")
        myFunction(x) // Call listener function at run time
        x.addListener(myFunction) // Attach listener function on state changes
        </script>

      <!-------------JS----------->

      <script>
          $(document).scroll(function() {

          myID = document.getElementById("fixtop4");

          var myScrollFunc = function () {
              var y = window.scrollY;
              if (y >= 700) {
                  myID.className = "fixtop4 showss text-center polaroid";
                  // myID2.className = "fixtop2 showff text-center";
              } else {
                  myID.className = "fixtop4 hidess text-center polaroid";
                  // myID2.className = "fixtop2 hideff text-center";
              }
          };

          window.addEventListener("scroll", myScrollFunc);
          });
      </script>
      <script src="js/observers.js">

      </script>
    </div>
  </body>
</html>
