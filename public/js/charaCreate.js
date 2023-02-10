let text1 = document.getElementsByClassName('text')[0];

text1.innerHTML = text1.textContent.replace(/\S/g, '<span class="letter">$&</span>')

let text2 = document.getElementsByClassName('text')[1];

text2.innerHTML = text2.textContent.replace(/\S/g, '<span class="letter2">$&</span>')

let text3 = document.getElementsByClassName('text')[2];

text3.innerHTML = text3.textContent.replace(/\S/g, '<span class="letter3">$&</span>')

let text4 = document.getElementsByClassName('text')[3];

text4.innerHTML = text4.textContent.replace(/\S/g, '<span class="letter4">$&</span>')

let text5 = document.getElementsByClassName('text5')[0];

text5.innerHTML = text5.textContent.replace(/\S/g, '<span class="letter5">$&</span>')

let text6 = document.getElementsByClassName('text6')[0];

text6.innerHTML = text6.textContent.replace(/\S/g, '<span class="letter6">$&</span>')

let text8 = document.getElementsByClassName('text8')[0];

text8.innerHTML = text8.textContent.replace(/\S/g, '<span class="letter8">$&</span>')

let text7 = document.getElementsByClassName('text7')[0];

text7.innerHTML = text7.textContent.replace(/\S/g, '<span class="letter7">$&</span>')

let text9 = document.getElementsByClassName('text9')[0];

text9.innerHTML = text9.textContent.replace(/\S/g, '<span class="letter9">$&</span>')

let text10 = document.getElementsByClassName('text10')[0];

text10.innerHTML = text10.textContent.replace(/\S/g, '<span class="letter10">$&</span>')

let text11 = document.getElementsByClassName('text11')[0];

text11.innerHTML = text11.textContent.replace(/\S/g, '<span class="letter11">$&</span>')

let text12 = document.getElementsByClassName('text12')[0];

text12.innerHTML = text12.textContent.replace(/\S/g, '<span class="letter12">$&</span>')

let text13 = document.getElementsByClassName('text13')[0];

text13.innerHTML = text13.textContent.replace(/\S/g, '<span class="letter13">$&</span>')

let text14 = document.getElementsByClassName('text14')[0];

text14.innerHTML = text14.textContent.replace(/\S/g, '<span class="letter14" style="color: red; font-size: 12rem;">$&</span>')

let choice1 = document.getElementsByClassName('choice')[0];

let choice2 = document.getElementsByClassName('classes')[0];

let choice3 = document.getElementsByClassName('statspread')[0];

let persona = document.getElementsByClassName('charaData')[0];

let part2 = document.getElementsByClassName('part2');

let races = document.querySelectorAll('.races')

let charaClass = document.querySelectorAll('.class')

let stats = document.querySelectorAll('.stats')

let preloader = document.getElementsByClassName('preloader')[0]

window.onload = (event) =>{

    anime({
        targets: '.preloader',
        opacity: [1, 0],
        duration: 2500,
        easing: "easeOutExpo",
    })

    setTimeout(function () {
        preloader.style.display = 'none';
    }, 2500)


    
    anime.timeline()
    .add({
        targets: '.text1 .letter',
        opacity: [0, 1],
        duration: 1500,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 100
    })

    setTimeout(function(){
        text2.style.display = 'block'

        anime({
            targets: '.text2 .letter2',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: (elem, index) => index * 100
        })
    }, 2500)

    setTimeout(function(){
        text3.style.display = 'block'

        anime({
            targets: '.text3 .letter3',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: (elem, index) => index * 100
        })
    }, 5500)

    setTimeout(function(){
        text4.style.display = 'block'
        choice1.style.display = 'flex'
        text3.style.display = 'none'
        text2.style.display = 'none' 
        text1.style.display = 'none' 

        races.forEach(element => {
            element.style.display = 'block'
        });

        anime({
            targets: '.text4 .letter4',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: (elem, index) => index * 100
        })

        anime({
            targets : '.races',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: 2000
        })
    }, 7500)

}

function showClass(){
    anime({
        targets: '.race',
        opacity: [1, 0],
        duration: 1500,
        easing: "easeOutExpo",
    })

    setTimeout(function(){
        text4.style.display = 'none'
        choice1.style.display = 'none'
        choice2.style.display = 'flex'
        text5.style.display = 'block'

        charaClass.forEach(element => {
            element.style.display = 'block'
        });

        anime({
            targets: '.text5 .letter5',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: (elem, index) => index * 100
        })

        anime({
            targets : '.class',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: 2000
        })

    }, 2000)
}

function plusStat(id){
    let  x = document.getElementById(id)
    let Points = document.getElementById('points')

    if(parseInt(Points.value) > 0 && parseInt(x.value) < 5){
        Points.value = parseInt(Points.value) - 1
        x.value = parseInt(x.value) + 1
    }
}

function minStat(id){
    let  x = document.getElementById(id)
    let Points = document.getElementById('points')

    if(parseInt(Points.value) >= 0 && parseInt(x.value) > 1){
        Points.value = parseInt(Points.value) + 1
        x.value = parseInt(x.value) - 1
    }
}

function showStat(){
    anime({
        targets: '.classes',
        opacity: [1, 0],
        duration: 1500,
        easing: "easeOutExpo",
    })

    setTimeout(function(){
        text5.style.display = 'none'
        choice2.style.display = 'none'
        choice3.style.display = 'flex'
        text6.style.display = 'block'

        stats.forEach(element => {
            element.style.display = 'flex'
        });

        anime({
            targets: '.text6 .letter6',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: (elem, index) => index * 100
        })

        anime({
            targets : '.stats',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: 2000
        })

        anime({
            targets : '.remain',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: 2000
        })

        anime({
            targets : '.continue',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: 2000
        })

    }, 2000)
}

function showPersona() {

    anime({
        targets: '.statspread',
        opacity: [1, 0],
        duration: 1500,
        easing: "easeOutExpo",
    })

    setTimeout(function(){
        choice3.style.display = 'none'
        part2[0].style.display ='block'

        anime.timeline().add({
            targets: '.text8 .letter8',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: (elem, index) => index * 100
        })
    }, 2000)

    setTimeout(function(){
        part2[1].style.display ='block'
        anime.timeline().add({
            targets: '.text7 .letter7',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: (elem, index) => index * 100
        })

        anime({
            targets: '.part2',
            opacity: [1, 0],
            duration: 1500,
            easing: "easeOutExpo",
            delay: 5000
        })
    }, 5500)

    setTimeout(function(){
        part2[0].style.display = 'none'
        part2[1].style.display = 'none'

        persona.style.display = 'flex'

        let bt = document.getElementsByClassName('start')[0]

        bt.style.display = 'block'

        anime({
            targets: '.charaData',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
        })

        anime({
            targets: '.start',
            opacity: [0, 1],
            duration: 1500,
            easing: "easeOutExpo",
            delay: 3000
        })

    }, 11500)
}

function starts(){
    preloader.style.display = 'flex'
    text9.style.display ='block'
    text10.style.display ='block'
    text11.style.display = 'block'

    anime.timeline()
    .add({
        targets: '.preloader',
        opacity: [0, 1],
        duration: 2000,
        easing: "easeOutExpo",
    })
    .add({
        targets: '.text9 .letter9',
        opacity: [0, 1],
        duration: 1500,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 100
    })
    .add({
        targets: '.text10 .letter10',
        opacity: [0, 1],
        duration: 1500,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 100
    })
    .add({
        targets: '.text11 .letter11',
        opacity: [0, 1],
        duration: 1500,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 100
    })

    setTimeout(function(){

        anime.timeline()
        .add({
            targets: '.bag1',
            opacity: [1, 0],
            duration: 1500,
            easing: "easeOutExpo"
        })

        setTimeout(function(){ 
            text9.style.display ='none'
            text10.style.display ='none'
            text11.style.display = 'none'
            text14.style.display = 'block'

            anime({
                targets: '.text14 .letter14',
                opacity: [0, 1],
                duration: 1500,
                easing: "easeOutExpo",
                delay: (elem, index) => index * 100
            })

            setTimeout(function(){
                anime({
                    targets: '.text14 .letter14',
                    opacity: [1, 0],
                    duration: 2000,
                    easing: "easeOutExpo",
                    delay: (elem, index) => index * 120
                })

                setTimeout(function(){
                    text14.style.display = 'none'
                    text12.style.display = 'block'
                    text13.style.display = 'block'

                    anime.timeline()
                    .add({
                        targets: '.text12 .letter12',
                        opacity: [0, 1],
                        duration: 1500,
                        easing: "easeOutExpo",
                        delay: (elem, index) => index * 100
                    })
                    .add({
                        targets: '.text13 .letter13',
                        opacity: [0, 1],
                        duration: 1500,
                        easing: "easeOutExpo",
                        delay: (elem, index) => index * 100
                    })
                    .add({
                        targets: '.bag2',
                        opacity: [1, 0],
                        duration: 1500,
                        easing: "easeOutExpo"
                    })

                    setTimeout(function(){
                        location.replace(window.location.protocol + "//" + window.location.host + '/')
                    }, 8000)
                }, 4000)
            }, 4000)
        }, 2000 )
    }, 11000)


}