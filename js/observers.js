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
