<?php
include '../dbconnect.php';
$conn = OpenCon();

if(isset($_POST['package_category_id'])){
  $package_category_id = $_POST['package_category_id'];
  $branch_id = $_POST['branch_id'];
  $try_us = mysqli_fetch_assoc(mysqli_query($conn,"SELECT try_us from packages where branch_id = '$branch_id' and package_category_id = $package_category_id"));
  $result = mysqli_query($conn,"SELECT package_name, try_us from packages where branch_id = '$branch_id' and package_category_id = $package_category_id");
  echo '<input type="hidden" id="try_us_condition_check" name="try_us_condition" value="'.$try_us['try_us'].'">
        <hr class="solid">
        <div class="col-md-3">
          <label style="float: left;" for="exampleInputPassword1"><h4>Package Name</h4></label>
          <div id="pkg_name_dropdown_toggle" style="float: right; display: none;" onclick="pkg_name_dropdown_hide()"><i class="fa fa-bars" aria-hidden="true"></i></div>
        </div>';
  echo '<input id="selectedPackageId" type="hidden" name="package_category_id" value="'.$package_category_id.'">';
  echo '<div id="pkg_name_dropdown" style="display: none;" class="col-md-9">
        </div>
        <div class="col-md-9" id="hide_pkg_name_dropdown">';
  
  echo '</div>';
}
