window.onload = (event) => {
    anime({
        targets: '.preloader',
        opacity: [1, 0],
        duration: 2500,
        easing: "easeOutExpo",
    })

    let preloader = document.getElementsByClassName('preloader')[0]

    anime.timeline()
                .add({
                    targets: '.screen',
                    opacity: [0, 1],
                    width: '500px',
                    duration: 500,
                    easing: "easeOutExpo",
                })
                .add({
                    targets: '.logIn',
                    opacity: [0, 1],
                    duration: 3500,
                    easing: "easeOutExpo",
                })

    setTimeout(function () {
        preloader.style.display = 'none';
    }, 2500)

    let signInBtn = document.getElementsByClassName('signIn')[0]

    signInBtn.addEventListener('click', function(){
        preloader.style.display = 'block';

        anime({
            targets: '.preloader',
            opacity: [0, 1],
            duration: 2500,
            easing: "easeOutExpo",
        })

        setTimeout(function(){
            location.replace(window.location.protocol + "//" + window.location.host + '/register')
        },2500)
    })
}