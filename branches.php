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
    </div>
  </body>
</html>
