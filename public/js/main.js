const visual = document.getElementById("visual")
const events = ['resize', 'load']

events.forEach(function(e){
    window.addEventListener(e, function(){
        const width = window.innerWidth
        const height = window.innerHeight
        const ratio = 45 / (width / height)
        visual.style.transform = "translate(-50%, -50%) rotate(-" + ratio + "deg)"
    });
});

var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});