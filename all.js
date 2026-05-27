const menuBtn = document.querySelector('.menu-btn');
const menuNav = document.querySelector('.menu');
let menuShow = false;
let menuMotion = false;
menuBtn.addEventListener('click', function() {
    if(menuMotion) return;
    if(menuShow) {
        menuNav.classList.remove('show');
        menuBtn.classList.remove('close');
        menuBtn.classList.add('open');
    } else {
        menuNav.classList.add('show');
        menuBtn.classList.add('close');
        menuBtn.classList.remove('open');
    }
    menuShow = !menuShow;
    menuMotion = true;
    // console.log('menuShow: ', menuShow);
    // console.log('menuMotion: ', menuMotion);
    
    setTimeout(function() {
        menuMotion = false;
        // console.log('menuMotion_After: ', menuMotion);
    }, 600);
})


const hoverElements = document.querySelectorAll(".hover");
hoverElements.forEach(function (element) {
    element.addEventListener("mouseover", function () {
        const aChild = this.querySelector(".a");
        const bChild = this.querySelector(".b");
        
        if (aChild && bChild) {
            aChild.style.display = "none";
            bChild.style.display = "block";
        }
    });
    element.addEventListener("mouseout", function () {
        const aChild = this.querySelector(".a");
        const bChild = this.querySelector(".b");
        
        if (aChild && bChild) {
            bChild.style.display = "none";
            aChild.style.display = "block";
        }
    });
});



if(document.body.id === 'winner') {
    console.log('winnerPage');
    
    const topBtn = document.querySelector('.btn-top');
    topBtn.addEventListener('click', function(e) {
        console.log('topClick');
        
        e.preventDefault();
        
        // const anchor = e.target.getAttribute('href');
        // const linkScroll = document.querySelector(anchor).offsetTop;
        scrollWithAnimation(0, 700);
    });
}


function scrollWithAnimation(to, duration) {
    const start = window.scrollY;
    const startTime = 'now' in window.performance ? performance.now() : new Date().getTime();

    function animateScroll(timestamp) {
        const currentTime = 'now' in window.performance ? performance.now() : new Date().getTime();
        const elapsed = currentTime - startTime;
        const scrollAmount = Math.easeInOutQuad(elapsed, start, to - start, duration);

        window.scrollTo(0, scrollAmount);

        if (elapsed < duration) {
            requestAnimationFrame(animateScroll);
        }
    }

    Math.easeInOutQuad = function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    };

    requestAnimationFrame(animateScroll);
}
