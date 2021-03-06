const header = document.querySelector("header");
const sectionOne = document.querySelector(".home-intro");

const faders = document.querySelectorAll(".fade-in");
const sliders = document.querySelectorAll(".slide-in");

const sectionOneOptions = {
  rootMargin: "-200px 0px 0px 0px"
};

const sectionOneObserver = new IntersectionObserver(function(
  entries,
  sectionOneObserver
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      header.classList.add("nav-scrolled");
    } else {
      header.classList.remove("nav-scrolled");
    }
  });
},
sectionOneOptions);

// sectionOneObserver.observe(sectionOne);

const appearOptions = {
  threshold: 0,
  rootMargin: "0px 0px -250px 0px"
};

const appearOnScroll = new IntersectionObserver(function(
  entries,
  appearOnScroll
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      return;
    } else {
      entry.target.classList.add("appear");
      appearOnScroll.unobserve(entry.target);
    }
  });
},
appearOptions);

faders.forEach(fader => {
  appearOnScroll.observe(fader);
});

sliders.forEach(slider => {
  appearOnScroll.observe(slider);
});



function openNav() {
    document.getElementById("mySidebar").style.width = "90%";
    document.getElementById("mySidebar").style.backgroundColor = "rgba(250,250,250,0.9)";

    // document.getElementById("body").style.overflow-y = hidden;
    // document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    // document.getElementById("main").style.marginLeft= "0";
}
function show(){
  document.getElementById("fixtop2").style.opacity = .8;
  document.getElementById("fixtop1").style.opacity = 0;
}
function close1(){
  document.getElementById("fixtop2").style.opacity = 0;
  document.getElementById("fixtop1").style.opacity = .4;
}
function closepop(){
  document.getElementById("fixtop5").style.opacity = 0;
  document.getElementById("fixtop5").style.zIndex = -1;
  // document.getElementById("fixtop1").style.opacity = .4;
}
$(document).on('click', 'label', function(){
  $(this).addClass('active').siblings().removeClass('active');
});

$(document).on('click', 'li', function(){
  $(this).addClass('active').siblings().removeClass('active');
});

$(document).on('click', 'btn-book', function(){
  $(this).addClass('active').siblings().removeClass('active');
});


// $('button.branch').click(function(){
//   $("button.package").hide();
//   $("button.calc").hide();
//   $("#calcc").hide();
//     let branch_id = $(this).attr('value') ;
//   $.ajax(
//         {
//             url: 'duration.php',
//             type: 'post',
//             data: {id: branch_id},
//             success: function (response){
//                 $('#duration').html(response);
//             }
//         }
//     );
//   });
//
//
// $('body').on('click', 'button.duration', function() {
//   $("button.calc").hide();
//   let selected_branch = $('#selected_branch').val() ;
//   let duration_id = $(this).attr('value') ;
//   let branch_id = $(this).attr('data-value') ;
//   $.ajax(
//       {
//           url: 'package.php',
//           type: 'post',
//           data: {
//               d_id: duration_id,
//               b_id: branch_id,
//               selected_branch: selected_branch
//           },
//           success: function (response){
//               $('#package').html(response);
//
//           }
//       }
//   );
// });
// $('body').on('click', 'button.package', function() {
//   let selected_branch2 = $('#selected_branch2').val() ;
//   let package_category_id = $(this).attr('value') ;
//   $.ajax(
//       {
//           url: 'package_name.php',
//           type: 'post',
//           data: {
//               package_category_id: package_category_id,
//               selected_branch2: selected_branch2
//           },
//           success: function (response){
//               $('#packageName').html(response);
//
//           }
//       }
//   );
// });
// $('body').on('click', 'button.calc', function() {
//   let selected_branch3 = $('#selected_branch3').val() ;
//   let p_id = $('#p_id').val() ;
//   let package_name = $(this).attr('value') ;
//   $.ajax(
//       {
//           url: 'calc.php',
//           type: 'post',
//           data: {
//               package_name: package_name,
//               selected_branch3: selected_branch3,
//               p_id: p_id
//           },
//           success: function (response){
//               $('#calcDetails').html(response);
//
//           }
//       }
//   );
// });

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

function view_modal0(close = ''){
  if(close != ''){
    $("#modal-container.view_modal0").removeClass('unfolding');
    $("#modal-container.view_modal0").addClass('unfolding out');
    // $("body").css("overflow","scroll");
  }else{
    $("#modal-container.view_modal0").removeClass('unfolding out');
    $("#modal-container.view_modal0").addClass('unfolding');
    // $("body").css("overflow","hidden");
  }
}

//-------------- img galary ----------


$(document).ready(function () {

});
$(document).ready(function () {
  $('.thumb a').on('click', function (e) {
      e.preventDefault();
      $('.imgBox img').attr("src", $(this).attr("href"));
  })
});




// ---------------------------------------------------------------booking js---------------------------------------------------------------------------------------------

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
var pdate = '35';
var rdays = dd;
ndate = yyyy + '/' + mm + '/' + dd;
$('button.branch').click(function(){
    $(this).parent().find('.selected').removeClass('selected');
    $(this).addClass('selected');
    $('hr.branch').remove();
    $('hr.pkg').remove();
    $( this ).parent().parent().after( "<hr class='solid branch'>" );
    $('hr.divide').addClass('solid');
    $('#packageName').empty();
    $('#packageDetails').empty();
    let branch_id = $(this).attr('value');
	if(screen.width < 768){
		$('#selected_dropdown').html( '<div class="button branch selected">' + $(this).html() + '</div>');
		$('#selected_dropdown').show();
		$('#hide_dropdown').addClass('hide_dropdown_menu');
		$('#selected_dropdown_toggle').show();
	}
	$.ajax(
        {
            url: 'package_plan/fetch_branch_package.php',
            type: 'post',
            data: {branch_id: branch_id},
            success: function (response){
                $('#package').html(response);
                money_manage_ment_pkn_pln();
            }
        }
    );
});
$('#selected_dropdown_toggle').click(function(){
	$('#selected_dropdown').hide();
	$('#selected_dropdown_toggle').hide();
	$('#hide_dropdown').removeClass('hide_dropdown_menu');
});

$('body').on('click', 'button.package', function() {
    $(this).parent().find('.selected').removeClass('selected');
    $(this).addClass('selected');
    $('hr.pkg').remove();
    $( this ).parent().parent().after( "<hr class='solid pkg'>" );
    $('#packageDetails').empty();
    let branch_id = $('#selectedBranchId').attr('value');
    let package_category_id = $(this).attr('value') ;
    let package_name = $(this).html() ;
	if(screen.width < 768){
		$('#pkg_ctg_dropdown').html( '<div class="button branch selected">' + $(this).html() + '</div>');
		$('#pkg_ctg_dropdown').show();
		$('#hide_pkg_ctg_dropdown').addClass('hide_dropdown_menu');
		$('#pkg_ctg_dropdown_toggle').show();
	}
    $.ajax(
        {
            url: 'package_plan/fetch_package_details.php',
            type: 'post',
            data: {
                package_category_id: package_category_id,
                branch_id: branch_id
            },
            success: function (response){
                $('#packageName').html(response);
				show_modal(package_name);
                money_manage_ment_pkn_pln();
            }
        }
    );
});

function pkg_dropdown_hide(){
	$('#pkg_ctg_dropdown').hide();
	$('#pkg_ctg_dropdown_toggle').hide();
	$('#hide_pkg_ctg_dropdown').removeClass('hide_dropdown_menu');
};

$('body').on('click', 'button.packageName', function() {
    $(this).parent().find('.selected').removeClass('selected');
    $(this).addClass('selected');
    let branch_id = $('#selectedBranchId').attr('value');
    let package_category_id = $('#selectedPackageId').attr('value');
    let package_name = $(this).attr('value') ;
	if(screen.width < 768){
		$('#pkg_name_dropdown').html( '<div class="button branch selected">' + $(this).html() + '</div>');
		$('#pkg_name_dropdown').show();
		$('#hide_pkg_name_dropdown').addClass('hide_dropdown_menu');
		$('#pkg_name_dropdown_toggle').show();
	}
    $.ajax(
        {
            url: 'package_plan/fetch_package_expenses.php',
            type: 'post',
            data: {
                package_category_id: package_category_id,
                branch_id: branch_id,
                package_name: package_name
            },
            success: function (response){
                $('#packageDetails').html(response);
                money_manage_ment_pkn_pln();
            }
        }
    );
});

function pkg_name_dropdown_hide(){
	$('#pkg_name_dropdown').hide();
	$('#pkg_name_dropdown_toggle').hide();
	$('#hide_pkg_name_dropdown').removeClass('hide_dropdown_menu');
};

function date_append(date){
    let date_set = document.getElementById('date_set').getAttribute('value');
    if(date_set === 'not set'){
        let _href = document.getElementById('check_date').getAttribute('href');
        document.getElementById('check_date').setAttribute('href',_href+'/'+date);
        document.getElementById('date_set').setAttribute('value', 'set');
    }else{
        let _href = document.getElementById('check_date').getAttribute('href');
        _href = _href.slice(0,_href.length - 11);
        document.getElementById('check_date').setAttribute('href',_href+'/'+date);
    }
	money_manage_ment_pkn_pln();
}

$('body').on('click', '#parking_yes', function (){
    // console.log($('#vicle_parking').val());
    $('#vicle_parking').val(1);
    $('#parking_amount').show();
});


$('body').on('click', '#parking_no', function (){
    $('#vicle_parking').val(0);
    $('#parking_amount').hide();
});

$('body').on('click', '#locker_yes', function (){
    $('#locker_type_show').show();
});

$('body').on('click', '#locker_no', function (){
    $('#locker_type_show').hide();
});

$('body').on('click', '#payment_full', function (){
    $('#payment_pattern').val(1);
});

$('body').on('click', '#payment_half', function (){
    $('#payment_pattern').val(0);
});
$('body').on('click', "input[type='radio']", function(){
    var locker_type = $("input[name='locker_type']:checked").val();
    $.ajax({
        url: 'package_plan/fetch_locker_expenses.php',
        type: 'post',
        data: {
            locker_type: locker_type,
        },
        success: function (response){
            $('#locker_price').html(response);
            money_manage_ment_pkn_pln();
        }
    });
});


// Money Management
var getDaysInMonth = function(month,year){
	return new Date(year, month, 0).getDate();
};

function select_date(){
	$('#totalAmountBeforeDate').hide();
	$('#totalAmount').show();
	$('#total_amount_disclaimer').show();
	money_manage_ment_pkn_pln();
}


function money_manage_ment_pkn_pln(){
    console.log('working');
    console.log(ndate);
	if($("#try_us_condition_check").val() == '1' ){
		if(ndate == $("#checkin_date").val()){
            console.log('on first if');
			$("#check_in_purpose").css({"display":"block"});
			$("#force_rent_container").css({"display":"none"});
			$('#force_rent').prop('checked', false);
			$('#card_number').attr('readonly', false);
			//----------
			if($("#vicle_parking").val() == '1' ){
				$("#parking_purpose").css({"display":"block"});
				var parki_val = ($('#parking_value').val());
				var park_m = parki_val;
				var d_p_a = parki_val;
			}else{
				$("#parking_purpose").css({"display":"none"});
				var park_m = (0);
				var d_p_a = (0);
			}

			if($("#locker_value").val() != ''){
				var locker_m = ($("#locker_value").val());
			}else{
				var locker_m = (0);
			}

			if($("#disccount_money").val() != ''){
				if($('#payment_pattern').val() == '1'){
					var discount = ($("#disccount_money").val());
				}else if($('#payment_pattern').val() == '0'){
					var discount = ($("#disccount_money").val()) / 2;
				}else{
					var discount = ($("#disccount_money").val());
				}
			}else{
				var discount = (0);
			}
			var m_ry = ($('#rent_amount').val());
			if($('#payment_pattern').val() == '1'){
				var rent_date = m_ry;
				$("#rental_fiels_container").css({"display":"block"});
			}else if($('#payment_pattern').val() == '0'){
				var rent_paymnt_p = m_ry;
				var rent_date = rent_paymnt_p / 2 + 200;
				$("#rental_fiels_container").css({"display":"block"});
			}else{
				var rent_date = (0);
				var park_m = (0);
				var due_g_m = 1;
				var r_d_a = m_ry;
				$("#rental_fiels_container").css({"display":"none"});
			}

			if(rent_date > discount){
				var f_rent_v = rent_date - discount;
				$("#discount_text").val(formatCurrency(discount));
				$("#disccount_money").val(discount);
			}else{
				var f_rent_v = rent_date;
				$("#discount_text").val(formatCurrency(discount));
				$("#disccount_money").val(discount); //discount
			}
			var security_money = ($('#security_money').val());
			var all_total = security_money + park_m + f_rent_v + locker_m;

			if(security_money > 0){
				$("#booking_security_amount").val(security_money);
				$("#parking_amount").val(formatCurrency(park_m));
				$('#rent_amount_show').val(formatCurrency(f_rent_v));
				$('#ac_rent_amount_1').val(f_rent_v);
				$('#total_amount_large').html(Math.round(formatCurrency(all_total)));
				$("#booking_total_amount").val((all_total));
				$("#booking_total_amount_c").val((all_total));
				if(due_g_m == 1){
					$("#booking_rent_amount").val(r_d_a);
					$("#booking_parking_amount").val(d_p_a);
				}else{
					$("#booking_rent_amount").val(rent_date);
					$("#booking_parking_amount").val(park_m);
				}
			}else{
				$("#booking_security_amount").val('');
				$('#total_amount_large').html('0.00');
				$("#booking_total_amount").val((0));
				$("#booking_total_amount_c").val((0));
				$('#rent_amount_show').val(0);
				$('#ac_rent_amount_1').val(0);
				$("#parking_amount").val(0);
				$("#booking_rent_amount").val('');
				$("#booking_parking_amount").val('');
			}
			//----------
			$("#card_number_check").val('1');
		}else{
            console.log('on first else');
			$("#card_number_check").val('0');
			$("#force_rent_container").css({"display":"flex"});
			// if($("#force_rent").is(':checked')){
				$("#check_in_purpose").css({"display":"block"});
				if($("#late_night_checkin").is(':checked')){
					$('#card_number').attr('readonly', false);
				}else{
					$('#card_number').attr('readonly', true);
				}
				//----------

				if($("input[name='parking']:checked").val() == 'yes'){
					$("#parking_purpose").css({"display":"block"});
					var parki_val = ($('#parking_value').val());
					var park_m = parki_val;
					var d_p_a = parki_val;
				}else{
					//$("#payment_pattern").html(payment_pattern_values);
					var park_m = (0);
					var d_p_a = (0);
				}

				if($("input[name='locker']:checked").val() == 'yes'){
					if(typeof $("#locker_value").val() != 'undefined'){
						var locker_m = ($("#locker_value").val());
					}else{
						var locker_m = (0);
					}
				}else{
					var locker_m = (0);
				}

				if($("#disccount_money").val() != ''){
					if($('#payment_pattern').val() == '1'){
						var discount = ($("#disccount_money").val());
					}else if($('#payment_pattern').val() == '0'){
						var discount = ($("#disccount_money").val()) / 2;
					}else{
						var discount = ($("#disccount_money").val());
					}
				}else{
					var discount = (0);
				}
				var m_ry = ($('#rent_amount').val());

				if($("input[name='payment']:checked").val() == 'full'){
					var rent_date = m_ry;
					$("#rental_fiels_container").css({"display":"block"});
				}else if($("input[name='payment']:checked").val() == 'half'){
					var rent_paymnt_p = m_ry;
					var rent_date = rent_paymnt_p / 2 + 200;
					$("#rental_fiels_container").css({"display":"block"});
				}else{
					var rent_date = (0);
					var park_m = (0);
					var due_g_m = 1;
					var r_d_a = m_ry;
					$("#rental_fiels_container").css({"display":"none"});
				}
				if(rent_date > discount){
					var f_rent_v = rent_date - discount;
					$("#discount_text").val((discount));
					$("#disccount_money").val(discount);
				}else{
					var f_rent_v = rent_date;
					$("#discount_text").val((discount));
					$("#disccount_money").val(discount);//discount
				}
				var security_money = ($('#security_money').val());
				var all_total = Number(security_money) + Number(park_m) + Number(f_rent_v) + Number(locker_m);
                console.log('full ' + all_total);
                console.log('security ' + security_money);
                console.log('park ' + park_m);
                console.log('rent ' + f_rent_v);
                console.log('locker ' + locker_m);
				if(security_money > 0){
					$("#booking_security_amount").val(security_money);
					$("#parking_amount").val((park_m));
					$('#rent_amount_show').val((f_rent_v));
					$('#ac_rent_amount_1').val(f_rent_v);
					$('#total_amount_large').html(Math.round(all_total));
					$("#booking_total_amount").val((all_total));
					$("#booking_total_amount_c").val((all_total));
					if(due_g_m == 1){
						$("#booking_rent_amount").val(r_d_a);
						$("#booking_parking_amount").val(d_p_a);
					}else{
						$("#booking_rent_amount").val(rent_date);
						$("#booking_parking_amount").val(park_m);
					}
				}else{
					$("#booking_security_amount").val('');
					$('#total_amount_large').html('0.00');
					$("#booking_total_amount").val((0));
					$("#booking_total_amount_c").val((0));
					$("#booking_rent_amount").val('');
					$("#booking_parking_amount").val('');
					$("#parking_amount").val(0);
					$('#rent_amount_show').val(0);
					$('#ac_rent_amount_1').val(0);
				}
				//----------
			// }else{
			// 	$("#check_in_purpose").css({"display":"none"});
			// 	var tt_aa = ($('#security_money').val());
			// 	$('#total_amount_large').html((tt_aa));
			// 	$("#booking_total_amount").val(tt_aa);
			// 	$("#booking_total_amount_c").val(tt_aa);
			// 	$("#booking_security_amount").val(tt_aa);
			// 	$("#booking_rent_amount").val('');
			// 	$("#booking_parking_amount").val('');
			// 	$("#parking_amount").val('');
			// 	$('#rent_amount_show').val('');
			// 	$('#ac_rent_amount_1').val('');
			// 	$('#card_number').attr('readonly', false);
			// }
			$("#card_number_check").val('0');
		}
	}else{
		if(ndate == $("#checkin_date").val()){
            console.log('on second if');
			$("#check_in_purpose").css({"display":"block"});
			$("#force_rent_container").css({"display":"none"});
			$('#force_rent').prop('checked', false);
			$('#card_number').attr('readonly', false);
			//---------
			if($("#vicle_parking").val() == '1' ){
				$("#parking_purpose").css({"display":"block"});
				var parki_val = ($('#parking_value').val());
				var park_m = ( parki_val / tdate ) * edate;
				var d_p_a = ( parki_val / tdate ) * edate;
			}else{
				$("#parking_purpose").css({"display":"none"});
				var park_m = (0);
				var d_p_a = (0);
			}

			if($("#locker_value").val() != ''){
				var locker_m = ($("#locker_value").val());
			}else{
				var locker_m = (0);
			}

			if($("#disccount_money").val() != ''){
				if($('#payment_pattern').val() == '1'){
					var discount = ($("#disccount_money").val());
				}else if($('#payment_pattern').val() == '0'){
					var discount = ($("#disccount_money").val()) / 2;
				}else{
					var discount = ($("#disccount_money").val());
				}
			}else{
				var discount = (0);
			}
			var m_ry = ($('#rent_amount').val());

			if($('#payment_pattern').val() == '1'){
				var rent_date = ( m_ry / tdate ) * edate;
				$("#rental_fiels_container").css({"display":"block"});
			}else if($('#payment_pattern').val() == '0'){
				var rent_paymnt_p = ( m_ry / tdate ) * edate;
				var rent_date = rent_paymnt_p / 2 + 200;
				$("#rental_fiels_container").css({"display":"block"});
			}else{
				var rent_date = (0);
				var park_m = (0);
				var due_g_m = 1;
				var r_d_a = ( m_ry / tdate ) * edate;
				$("#rental_fiels_container").css({"display":"none"});
			}
			if(rent_date > discount){
				var f_rent_v = rent_date - discount;
				$("#discount_text").val((discount));
				$("#disccount_money").val(discount);
			}else{
				var f_rent_v = rent_date;
				$("#discount_text").val((discount));
				$("#disccount_money").val(discount);  //discount
			}
			var security_money = ($('#security_money').val());
			var all_total = security_money + park_m + f_rent_v + locker_m;

			if(security_money > 0){
				$("#booking_security_amount").val(security_money);
				$("#parking_amount").val((park_m));
				$('#rent_amount_show').val((f_rent_v));
				$('#ac_rent_amount_1').val(f_rent_v);
				$('#total_amount_large').html(Math.round(all_total));
				$("#booking_total_amount").val((all_total));
				$("#booking_total_amount_c").val((all_total));
				if(due_g_m == 1){
					$("#booking_rent_amount").val(r_d_a);
					$("#booking_parking_amount").val(d_p_a);
				}else{
					$("#booking_rent_amount").val(rent_date);
					$("#booking_parking_amount").val(park_m);
				}
			}else{
				$("#booking_security_amount").val('');
				$('#total_amount_large').html('0.00');
				$("#booking_rent_amount").val('');
				$("#booking_parking_amount").val('');
				$("#booking_total_amount").val((0));
				$("#booking_total_amount_c").val((0));
				$('#rent_amount_show').val(0);
				$('#ac_rent_amount_1').val(0);
				$("#parking_amount").val(0);
			}
			//---------
			$("#card_number_check").val('1');
		}else{
            console.log('on second else');
			// if($("#force_rent").is(':checked')){


				//---------------------------------------------
				var n_chk_in = $("#checkin_date").val().split('-');
				var n_days_ed = getDaysInMonth(n_chk_in[1],n_chk_in[0]);
				var n_days_m = getDaysInMonth(n_chk_in[1],n_chk_in[0]);
				console.log('ok');
				console.log($("#checkin_date").val() + 'check in date');
				console.log(parseInt(n_chk_in[2]) + n_chk_in[2] + 'check in');
				if( parseInt(n_chk_in[2]) > n_chk_in[2]){
					var ac_days = n_days_m - (n_chk_in[2]) + 1;
					console.log(ac_days + ' AC days 1');
				}else if( parseInt(n_chk_in[1]) == n_chk_in[1]){
					var ac_days = n_days_m - (n_chk_in[2]) + 1;
					console.log(ac_days + ' AC days 2');
				}else if( parseInt(n_chk_in[1]) > n_chk_in[1]){
					var number_after_d = n_chk_in[2];
					var date_month = n_chk_in[1] + 1;
					var number_after_n = getDaysInMonth(date_month, n_chk_in[0]);
					var ac_days = number_after_n - number_after_d + 1;
					console.log(ac_days + ' AC days 3');
				}else if(parseInt(n_chk_in[0]) == n_chk_in[0]){
					var number_after_d = n_chk_in[2];
					var date_month = n_chk_in[1] + 1;
					var number_after_n = getDaysInMonth(date_month , n_chk_in[0]);
					var ac_days = number_after_n - number_after_d + 1;
				}else if(parseInt(n_chk_in[0]) > n_chk_in[0]){
					var number_after_d = n_chk_in[2];
					var number_after_m = n_chk_in[1];
					var number_after_y = n_chk_in[0];
					var date_year = number_after_y + 1;
					var number_after_n = getDaysInMonth(number_after_m, date_year);
					var ac_days = number_after_n - number_after_d + 1;
					console.log(ac_days + ' AC days 4');
				}else{
					var ac_days = (n_days_m) - n_chk_in[2] + 1;
					console.log(ac_days + ' AC days 5');
					//var ac_days = 'test not working!';
				}
