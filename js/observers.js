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
