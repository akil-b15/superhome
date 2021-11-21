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
