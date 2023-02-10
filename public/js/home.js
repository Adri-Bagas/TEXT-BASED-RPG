window.onload = (event) => {
    anime({
        targets: '.preloader',
        opacity: [1, 0],
        duration: 2500,
        easing: "easeOutExpo",
    })

    let preloader = document.getElementsByClassName('preloader')[0]

    setTimeout(function () {
        preloader.style.display = 'none';
    }, 2500)

    let heroText = document.getElementsByClassName('hero-text')[0];

    let btn1 = document.getElementsByClassName('btn1')[0];

    heroText.innerHTML = heroText.textContent.replace(/\S/g, '<span class="letter">$&</span>');

    anime.timeline()
        .add({
            targets: '.hero-text .letter',
            opacity: [0, 1],
            duration: 1000,
            easing: "easeOutExpo",
            delay: (elem, index) => index * 80
        })

    anime({
        targets: '.btn1',
        opacity: [0, 0.3, 1],
        translateY: [-600, 0],
        duration: 2500,
        easing: "easeOutExpo",
    })

    btn1.addEventListener('click', function () {
        anime.timeline()
            .add({
                targets: '.hero-text .letter',
                opacity: [1, 0],
                duration: 500,
                easing: "easeOutExpo",
                delay: (elem, index) => index * 80
            })

        anime({
            targets: '.btn1',
            opacity: [1, 0],
            duration: 2500,
            easing: "easeOutExpo",
        })

        setTimeout(() => {
            heroText.style.display = 'none';
            btn1.style.display = 'none';
            document.getElementsByClassName('signIn')[0].style.display = 'block';

            anime.timeline()
                .add({
                    targets: '.screen',
                    width: '500px',
                    duration: 2500,
                    easing: "easeOutExpo",
                })
                .add({
                    targets: '.signIn',
                    opacity: [0, 1],
                    duration: 2500,
                    easing: "easeOutExpo",
                })
        }, 2500);
    })

    let loginBtn = document.getElementsByClassName('login')[0]

    loginBtn.addEventListener('click', function(){
        preloader.style.display = 'block';

        anime({
            targets: '.preloader',
            opacity: [0, 1],
            duration: 2500,
            easing: "easeOutExpo",
        })

        setTimeout(function(){
            // console.log(window.location.host)
            location.replace(window.location.protocol + "//" + window.location.host + '/login')
        },2500)
    })



}
