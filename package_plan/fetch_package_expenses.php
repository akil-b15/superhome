<?php
include '../dbconnect.php';
$conn = OpenCon();

if(isset($_POST['package_category_id'])){
    $package_category_id = $_POST['package_category_id'];
    $branch_id = $_POST['branch_id'];
    $package_name = $_POST['package_name'];
    $result = mysqli_query($conn,"select package_price, monthly_rent, discount_amount, package_days, package_category_name, try_us, parking_amount, id from packages where branch_id = '$branch_id' and package_category_id = '$package_category_id' and package_name = '$package_name'");
    $expense = mysqli_fetch_assoc($result);
    $lockerCount = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(id) as lockerCount from manage_locker WHERE branch_id = '$branch_id' AND uses = 0"));
    $day = date('d');
    $month = date('Y-m');
    $newDay = $month.'-'.$day;
    $html = '<input type="hidden" id="package_name" name="package_name" value="'.$package_name.'">
             <input type="hidden" id="disccount_money" name="disccount_money" value="0">
             <input type="hidden" value="'.$branch_id.'" name="branch_id" id="branch_id">
             <input type="hidden" value="'.$expense['id'].'" name="package_id">
             <input type="hidden" value="'.$expense['package_price'].'" name="security_money" id="security_money">
             <input type="hidden" value="'.$expense['monthly_rent'].'" name="monthly_rent" id="rent_amount">
             <input type="hidden" value="'.$expense['parking_amount'].'" name="parking_amount" id="parking_value">
             <div class="card">
             <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Check-in Date: </h5>
                        <span style="color: red" class="error-page danger"></span>
                    </div>
                    <div class="col-md-6">
                        <input id="date_set" type="hidden" value="not set">
                        <input id="checkin_date" name="checkin_date" class="button date" type="date" min="'.$newDay.'" onchange="select_date()" required>
                    </div>
                </div>';
    if($expense['parking_amount'] != '0'){
        $html .=     '<hr class="solid">
                      <div class="row">
                            <div class="col-md-6">
                                <h5>Parking: </h5>
                                <span style="color: red" class="error-page danger"></span>
                            </div>
                            <div class="col-md-6 parking_container">
                                <label class="parking_label col-md-6">Yes
                                  <input type="radio" name="parking" id="parking_yes" value="yes" onchange="money_manage_ment()">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="parking_label col-md-6">No
                                  <input type="radio" name="parking" checked="checked" id="parking_no" value="no">
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                      </div>
                        ';
    }
    if($lockerCount['lockerCount'] > 0){
        $lockerResult = mysqli_query($conn,"SELECT id, locker_type_name from manage_locker WHERE branch_id = 'BAR_100920_294562129482664344_1599721915' AND uses = 0 group by locker_type_name");
        $html .=     '<hr class="solid">
                      <div class="row">
                            <div class="col-md-6">
                                <h5>Locker: </h5>
                                <span style="color: red" class="error-page danger"></span>
                            </div>
                            <div class="col-md-6 parking_container">
                                <label class="parking_label col-md-6">Yes
                                  <input type="radio" name="locker" id="locker_yes" value="yes">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="parking_label col-md-6">No
                                  <input type="radio" name="locker" checked="checked" id="locker_no" value="no">
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                      </div>
                      <div id="locker_type_show" style="display: none">
                        <hr class="solid">
                        <div class="row">
                                <div class="col-md-6">
                                    <h5>Locker Type: </h5>
                                    <span style="color: red" class="error-page danger"></span>
                                </div>
                                <div class="col-md-6 parking_container">';
                                while($locker = mysqli_fetch_assoc($lockerResult)){
                                    $html .= '<label class="parking_label col-md-6">'.$locker['locker_type_name'];
                                    $html .= '<input data-target="#locker_select" data-toggle="modal" type="radio" name="locker_type" value="'.$locker['id'].'" onclick="money_manage_ment()">';
                                    $html .= '<span class="checkmark"></span>
                                              </label>';
                                }
        $html .=                '</div>
                        </div>
                      </div>';
    }

//    <button class="button book">Book</button>
}
