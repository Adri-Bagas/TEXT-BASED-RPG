let preloader = document.getElementsByClassName('preloader')[0]

let img = document.getElementById('imgShow')
let nameS = document.getElementById('name')
let hpBar = document.getElementsByClassName('hpBar')[0]
let manaBar = document.getElementsByClassName('manaBar')[0]
let btnspace = document.getElementsByClassName('btnspace')[0]

let itr = 0

window.onload = (event) => {
    anime({
        targets: '.preloader',
        opacity: [1, 0],
        duration: 2500,
        easing: "easeOutExpo",
    })

    setTimeout(function () {
        preloader.style.display = 'none';
    }, 2500)

    callStart()
}


function checkItem(id){
    $.ajax({
        type: "POST",
        url: appUrl + '/item/inventory/check',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            console.log(response)
            itemShow(response)
        }
    });
}

function equip(id){
    $.ajax({
        type: "POST",
        url: appUrl + '/equip/item',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            console.log(response)
        }
    });
}

function itemShow(data) {

    document.getElementById("Ebutton").setAttribute("onclick", `equip(${data.inventory.id})`)

    nameS.innerHTML = data.item.name
    nameS.style.fontWeight = 'normal'
    img.src = data.img

    hpBar.style.display = 'none'
    manaBar.style.display = 'none'
    btnspace.style.display = 'block'

    document.getElementById('itmSTR').innerHTML = data.item.str_boost
    document.getElementById('itmDEF').innerHTML = data.item.def_boost
    document.getElementById('itmINT').innerHTML = data.item.int_boost
    document.getElementById('itmDEX').innerHTML = data.item.dex_boost
    document.getElementById('itmCHAR').innerHTML = data.item.char_boost

}

function itemEquipped(){
    let Ebtn = document.getElementById("Ebutton")
    Ebtn.style.display = 'none'

    let Ebtn2 = document.createElement("button")

    Ebtn2.setAttribute()
}

function callStart(){
    $.ajax({
        type: "POST",
        url: appUrl + '/start/scenes',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            addStartScene(response)
        }
    });
}

function addStartScene(data){
    let elem = document.createElement("h4")

    let id = "StartScene"

    elem.innerHTML = data.data.story_text
    elem.setAttribute("id", id)
    elem.style.fontWeight = 'normal'
    document.getElementById("main").append(elem)

    let text = document.getElementById(id)

    text.innerHTML = text.textContent.replace(/\S/g, '<span class="letter">$&</span>')

    let btnSpace = document.getElementById("choice")

    btnSpace.innerHTML = `<button class="btnItem w-200px m-auto" onclick="callEvent()" id="Start">${data.data.choice}</button>`

    anime.timeline()
    .add({
        targets: '#StartScene .letter',
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 100
    })
    .add({
        targets: '#Start',
        opacity: [0,1],
        duration: 1000,
        easing: "easeOutExpo",
    })
}

function callEvent(){
    $.ajax({
        type: "POST",
        url: appUrl + '/scene/call',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                console.log(response)
                addScene(response)
            }
        }
    });
}

function addScene(data){

    document.getElementById("Start").remove()

    //CREATE TEXT
    let hr = document.createElement("hr")
    let elem = document.createElement("h4")
    let main =  document.getElementById("main")

    let id = "Scene" + itr

    let letter = "letter" + itr

    let targets = "#" + id + " " + "." + letter

    itr++

    hr.style.marginBottom = "10px"
    hr.style.marginTop = "10px"

    elem.innerHTML = data.scene.story_text
    elem.setAttribute("id", id)
    elem.style.fontWeight = 'normal'
    main.append(hr)
    main.append(elem)

    let text = document.getElementById(id)

    text.innerHTML =  text.textContent.replace(/\S/g, `<span class="${letter}">$&</span>`)

    //CREATE BUTTON

    let btnSpace = document.getElementById("choice")

    btnSpace.innerHTML += `<button class="btnItem w-200px m-auto" onclick="picked1(${data.scene.id})" class="choice1">${data.scene.choice1}</button>`

    if(data.scene.choice2 != null){
    btnSpace.innerHTML += `<button class="btnItem w-200px m-auto" onclick="picked2(${data.scene.id})" class="choice2">${data.scene.choice2}</button>`
    }

    if(data.scene.choice3 != null){
        btnSpace.innerHTML += `<button class="btnItem w-200px m-auto" onclick="picked3(${data.scene.id})" class="choice3">${data.scene.choice3}</button>`
    }

    if(data.scene.choice4 != null){
        btnSpace.innerHTML += `<button class="btnItem w-200px m-auto" onclick="picked4(${data.scene.id})" class="choice4">${data.scene.choice4}</button>`
    }


    anime.timeline()
    .add({
        targets: targets,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 100
    })

}

function picked1(id){
    $.ajax({
        type: "POST",
        url: appUrl + '/picked1',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){

            }
        }
    });
}

// var colors = [
//     "#3c2626",
//     "#503636",
// ]

//     function getRandomColor() {
//         var color = colors[Math.floor(Math.random() * colors.length)];
//         return color;   
// }

// var container = document.getElementById('background');

// var num_of_pixels = ($('main').innerHeight() * $('main').innerWidth()) / (5 * 5);

// var output = "";

// for(var i = 0; i < num_of_pixels; i++) {
//     output+= '<div style="'
//     output+= "background-color:"+getRandomColor()+";"
//     output+='"" class="pixel"></div>'
// }

// container.innerHTML += output

