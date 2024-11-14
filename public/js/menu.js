let preloader = document.getElementsByClassName('preloader')[0]

let img = document.getElementById('imgShow')
let nameS = document.getElementById('name')
let hpBar = document.getElementsByClassName('hpBar')[0]
let manaBar = document.getElementsByClassName('manaBar')[0]
let btnspace = document.getElementsByClassName('btnspace')[0]

let itr = 0

window.addEventListener('click', ()=>{
    anime.remove();
})

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

    setTimeout(function () {
        $.ajax({
            type: "POST",
            url: appUrl + '/chara/status',
            data: "data",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if(response.status == "DEATH"){
                    let datas = {
                        'success' : true,
                        'type' : 'DEATH',
                        'response' : ' ',
                        'response_eff' : 'You Died!'
                    }
                    deathUpdate(datas)
                }else{
                    callStart()
                }
            }
        });
    }, 4000)

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
            showStatsUp(response)

            if(response.itemData.type == "head"){
                let Img = document.getElementById('HeadImg')

                Img.src = response.itemPic

                Img.setAttribute("onclick", `checkItem('${response.inventoId}')`)
            }

            if(response.itemData.type == "body"){
                let Img = document.getElementById('BodyImg')

                Img.src = response.itemPic

                Img.setAttribute("onclick", `checkItem('${response.inventoId}')`)
            }

            if(response.itemData.type == "weapon"){
                let Img = document.getElementById('WeaponImg')

                Img.src = response.itemPic

                Img.setAttribute("onclick", `checkItem('${response.inventoId}')`)
            }

            if(response.itemData.type == "foot"){
                let Img = document.getElementById('BodyImg')

                Img.src = response.itemPic

                Img.setAttribute("onclick", `checkItem('${response.inventoId}')`)
            }

            if(response.itemData.type == "accessories"){
                if(response.acc2){
                    let Img = document.getElementById('Acc2Img')

                    Img.src = response.itemPic

                    Img.setAttribute("onclick", `checkItem('${response.inventoId}')`)
                }else{
                    let Img = document.getElementById('Acc1Img')

                    Img.src = response.itemPic

                    Img.setAttribute("onclick", `checkItem('${response.inventoId}')`)
                }
            }
        }
    });
}

function showStatsUp(datas){
    //Mana

    let mana = document.getElementById("manaBarB")

    mana.innerHTML = datas.current_mana + " / " + datas.data.totMana

    let percen = (datas.current_mana / datas.data.totMana) * 100; 

    mana.style.width = percen + "%"

    //HP

    let hp = document.getElementById("hpBarB")

    hp.innerHTML = datas.current_hp + " / " + datas.data.totHP

    let perce = (datas.current_hp / datas.data.totHP) * 100; 

    hp.style.width = perce + "%"

    //STR
    let str = document.getElementById("STR")
    str.innerHTML = datas.data.totSTR 

    //DEF
    let def = document.getElementById("DEF")
    def.innerHTML = datas.data.totDEF

    //INT
    let int = document.getElementById("INT")
    int.innerHTML = datas.data.totINT

    //DEX
    let dex = document.getElementById("DEX")
    dex.innerHTML = datas.data.totDEX

    //CHAR
    let char = document.getElementById("CHAR")
    char.innerHTML = datas.data.totCHAR

}

function unEquip(id){ 
    $.ajax({
        type: "POST",
        url: appUrl + "/unEquip/Item",
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {

            showStatsUp(response)

            if(response.type == "head"){
                let Img = document.getElementById('HeadImg')

                Img.src = " "

            }

            if(response.type == "body"){
                let Img = document.getElementById('BodyImg')

                Img.src = " "

            }

            if(response.type == "weapon"){
                let Img = document.getElementById('WeaponImg')

                Img.src = " "

            }

            if(response.type == "foot"){
                let Img = document.getElementById('BodyImg')

                Img.src = " "

            }

            if(response.type == "accessories"){
                if(response.acc2){
                    let Img = document.getElementById('Acc2Img')

                    Img.src = " "

                }else{
                    let Img = document.getElementById('Acc1Img')

                    Img.src = " "

                }
            }
        }
    });
}

function backButt(){

    $.ajax({
        type: "POST",
        url: appUrl + "/evenTheBackButtonIsAnAjaxRequest",
        data: "data",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
        hpBar.style.display = 'block'
        manaBar.style.display = 'block'
        btnspace.style.display = 'none'

            nameS.innerHTML = response.userName
            img.src = response.userCharaRaceImg

            document.getElementById("backButton").style.display = "none"
        }
    });
}


function itemShow(data) {

    if(data.status == 'EQUIPPED'){
        document.getElementById("Ebutton").setAttribute("onclick", `unEquip(${data.inventory.id})`)
        document.getElementById("Ebutton").innerHTML = "Unequip"
    }

    if(data.status == 'NOT EQUIPPED'){
        document.getElementById("Ebutton").setAttribute("onclick", `equip(${data.inventory.id})`)
        document.getElementById("Ebutton").innerHTML = "Equip"
    }

    nameS.innerHTML = data.item.name
    nameS.style.fontWeight = 'normal'
    img.src = data.img

    hpBar.style.display = 'none'
    manaBar.style.display = 'none'
    btnspace.style.display = 'block'

    document.getElementById("backButton").style.display = "block"

    document.getElementById('itmSTR').innerHTML = data.item.str_boost
    document.getElementById('itmDEF').innerHTML = data.item.def_boost
    document.getElementById('itmINT').innerHTML = data.item.int_boost
    document.getElementById('itmDEX').innerHTML = data.item.dex_boost
    document.getElementById('itmCHAR').innerHTML = data.item.char_boost

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
        delay: (elem, index) => index * 80
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
                addScene(response)
            }
        }
    });
}

function addScene(data){

    if(document.getElementById("Start")){
        document.getElementById("Start").remove()
    }

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

    btnSpace.innerHTML = ""

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
        delay: (elem, index) => index * 80
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
                if(response.type == "CHEST"){
                    chestUpdate(response)
                }
                if(response.type == "HEALTH"){
                    hpUpdate(response)
                }
                if(response.type == "DEATH"){
                    deathUpdate(response)
                }
                if(response.type == "MANA"){
                    manaUpdate(response)
                }
                if(response.type == "ITEM"){
                    itemUpdate(response)
                }
                if(response.type == "EXP"){
                    expUpdate(response)
                }
                if(response.type == "LVUP"){
                    LVUpdate(response)
                }
            }
        }
    });
}

function picked2(id){
    $.ajax({
        type: "POST",
        url: appUrl + '/picked2',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                if(response.type == "CHEST"){
                    chestUpdate(response)
                }
                if(response.type == "HEALTH"){
                    hpUpdate(response)
                }
                if(response.type == "DEATH"){
                    deathUpdate(response)
                }
                if(response.type == "MANA"){
                    manaUpdate(response)
                }
                if(response.type == "ITEM"){
                    itemUpdate(response)
                }
                if(response.type == "EXP"){
                    expUpdate(response)
                }
                if(response.type == "LVUP"){
                    LVUpdate(response)
                }
            }
        }
    });
}

function picked3(id){
    $.ajax({
        type: "POST",
        url: appUrl + '/picked3',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                if(response.type == "CHEST"){
                    chestUpdate(response)
                }
                if(response.type == "HEALTH"){
                    hpUpdate(response)
                }
                if(response.type == "DEATH"){
                    deathUpdate(response)
                }
                if(response.type == "MANA"){
                    manaUpdate(response)
                }
                if(response.type == "ITEM"){
                    itemUpdate(response)
                }
                if(response.type == "EXP"){
                    expUpdate(response)
                }
                if(response.type == "LVUP"){
                    LVUpdate(response)
                }
            }
        }
    });
}

function picked4(id){
    $.ajax({
        type: "POST",
        url: appUrl + '/picked4',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                if(response.type == "CHEST"){
                    chestUpdate(response)
                }
                if(response.type == "HEALTH"){
                    hpUpdate(response)
                }
                if(response.type == "DEATH"){
                    deathUpdate(response)
                }
                if(response.type == "MANA"){
                    manaUpdate(response)
                }
                if(response.type == "ITEM"){
                    itemUpdate(response)
                }
                if(response.type == "EXP"){
                    expUpdate(response)
                }
                if(response.type == "LVUP"){
                    LVUpdate(response)
                }
            }
        }
    });
}

function chestUpdate(datas){
    let hr = document.createElement("hr")
    let elem = document.createElement("h4")
    let eff = document.createElement("h4")
    let main =  document.getElementById("main")
    let inventory = document.getElementById("inventory")
    let btnSpace = document.getElementById("choice")

    btnSpace.innerHTML = '';

    inventory.innerHTML = '';

    invento = datas.inventory_data

    invento.forEach(element => {
        inventory.innerHTML +=  `<button class="btnItem" onclick="checkItem('${element.id}')"><img src="${element.url}" alt=""></button>`
    });

    let id = "Scene" + itr
    let letter = "letter" + itr
    let targets = "#" + id + " " + "." + letter

    let resp = "Resp" + itr
    let lett = "lett" + itr
    let targ = "#" + resp + " " + "." + lett

    itr++

    hr.style.marginBottom = "10px"
    hr.style.marginTop = "10px"

    elem.innerHTML = datas.response
    elem.setAttribute("id", id)
    elem.style.fontWeight = 'normal'

    eff.innerHTML = datas.response_eff
    eff.setAttribute("id", resp)
    eff.style.fontWeight = "normal"
    eff.style.color = 'gold'

    main.append(hr)
    main.append(elem)
    main.append(eff)

    let text = document.getElementById(id)

    text.innerHTML =  text.textContent.replace(/\S/g, `<span class="${letter}">$&</span>`)

    let effText = document.getElementById(resp)

    effText.innerHTML = effText.textContent.replace(/\S/g, `<span class="${lett}">$&</span>`)

    anime.timeline()
    .add({
        targets: targets,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80
    })
    .add({
        targets: targ,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80,
        complete: function(){
            callEvent()
        }
    })

}

function hpUpdate(datas){
    let hr = document.createElement("hr")
    let elem = document.createElement("h4")
    let main =  document.getElementById("main")
    let eff = document.createElement("h4")
    let btnSpace = document.getElementById("choice")

    btnSpace.innerHTML = ""

    let id = "Scene" + itr
    let letter = "letter" + itr
    let targets = "#" + id + " " + "." + letter

    let resp = "Resp" + itr
    let lett = "lett" + itr
    let targ = "#" + resp + " " + "." + lett

    itr++

    hr.style.marginBottom = "10px"
    hr.style.marginTop = "10px"

    elem.innerHTML = datas.response
    elem.setAttribute("id", id)
    elem.style.fontWeight = 'normal'
    eff.innerHTML = datas.response_eff
    eff.setAttribute("id", resp)
    eff.style.fontWeight = 'normal'
    if(datas.getType == "GAIN"){
        eff.style.color = "gold"
    }
    if(datas.getType == "LOSS"){
        eff.style.color = "red"
    }
    main.append(hr)
    main.append(elem)
    main.append(eff)

    let text = document.getElementById(id)

    text.innerHTML =  text.textContent.replace(/\S/g, `<span class="${letter}">$&</span>`)

    let effText = document.getElementById(resp)

    effText.innerHTML = effText.textContent.replace(/\S/g, `<span class="${lett}">$&</span>`)

    anime.timeline()
    .add({
        targets: targets,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80
    })
    .add({
        targets: targ,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80,
        complete: function(){
            callEvent()
        }
    })

    //SET HP TRUE

    let hp = document.getElementById("hpBarB")

    hp.innerHTML = datas.current_hp + " / " + datas.max_hp

    let percen = (datas.current_hp / datas.max_hp) * 100; 

    hp.style.width = percen + "%"

}

function deathUpdate(datas){
    let preloader = document.getElementsByClassName('preloader')[0]

    preloader.style.display = 'flex'
    preloader.style.opacity = 1

    let deathText = datas.response

    let deathResp = datas.response_eff

    let deat = document.createElement("h1")
    let deathM = document.createElement("h3")
    deat.setAttribute("class", "textDeathResp")
    deat.setAttribute("id", "DEATH")
    deat.innerHTML = deathResp
    deathM.setAttribute("class", "textDeath")
    deathM.setAttribute("id", "DEATHTEXT")
    deathM.innerHTML = deathText

    preloader.append(deat)
    preloader.append(deathM)

    let textDetah = document.getElementById("DEATH")
    let textDeta = document.getElementById("DEATHTEXT")

    textDetah.innerHTML = textDetah.textContent.replace(/\S/g, `<span class="letterD">$&</span>`)
    textDeta.innerHTML = textDeta.textContent.replace(/\S/g, `<span class="letterDD">$&</span>`)

    let targ = "#DEATH .letterD"
    let target = "#DEATHTEXT .letterDD"

    let buttonDel = document.createElement("button")
    buttonDel.innerHTML = "Reset"
    buttonDel.style.fontSize = "2rem"
    buttonDel.style.width = "200px"
    buttonDel.setAttribute("class", "btnItem")
    buttonDel.setAttribute("id", "resetBtn")
    buttonDel.setAttribute("onClick", "REset()")

    preloader.append(buttonDel)

    anime.timeline()
    .add({
        targets: '.preloader',
        opacity: [0, 1],
        duration: 2500,
        easing: "easeOutExpo",
    })
    .add({
        targets: targ,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80
    })
    .add({
        targets: target,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80
    })
    .add({
        targets: "#resetBtn",
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo"
    })

}

function manaUpdate(datas){
    let hr = document.createElement("hr")
    let elem = document.createElement("h4")
    let main =  document.getElementById("main")
    let eff = document.createElement("h4")
    let btnSpace = document.getElementById("choice")

    btnSpace.innerHTML = ""

    let id = "Scene" + itr
    let letter = "letter" + itr
    let targets = "#" + id + " " + "." + letter

    let resp = "Resp" + itr
    let lett = "lett" + itr
    let targ = "#" + resp + " " + "." + lett

    itr++

    hr.style.marginBottom = "10px"
    hr.style.marginTop = "10px"

    elem.innerHTML = datas.response
    elem.setAttribute("id", id)
    elem.style.fontWeight = 'normal'
    eff.innerHTML = datas.response_eff
    eff.setAttribute("id", resp)
    eff.style.fontWeight = 'normal'
    if(datas.getType == "GAIN"){
        eff.style.color = "gold"
    }
    if(datas.getType == "LOSS"){
        eff.style.color = "red"
    }
    main.append(hr)
    main.append(elem)
    main.append(eff)

    let text = document.getElementById(id)

    text.innerHTML =  text.textContent.replace(/\S/g, `<span class="${letter}">$&</span>`)

    let effText = document.getElementById(resp)

    effText.innerHTML = effText.textContent.replace(/\S/g, `<span class="${lett}">$&</span>`)

    anime.timeline()
    .add({
        targets: targets,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80
    })
    .add({
        targets: targ,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80,
        complete: function(){
            callEvent()
        }
    })

    //SET HP TRUE

    let mana = document.getElementById("manaBarB")

    mana.innerHTML = datas.current_mana + " / " + datas.max_mana

    let percen = (datas.current_mana / datas.max_mana) * 100; 

    mana.style.width = percen + "%"

}

function itemUpdate(datas){
    let hr = document.createElement("hr")
    let elem = document.createElement("h4")
    let eff = document.createElement("h4")
    let main =  document.getElementById("main")
    let inventory = document.getElementById("inventory")
    let btnSpace = document.getElementById("choice")

    btnSpace.innerHTML = '';

    inventory.innerHTML = '';

    invento = datas.inventory_data

    invento.forEach(element => {
        inventory.innerHTML +=  `<button class="btnItem" onclick="checkItem('${element.id}')"><img src="${element.url}" alt=""></button>`
    });

    hr.style.marginBottom = "10px"
    hr.style.marginTop = "10px"

    elem.innerHTML = datas.response
    elem.setAttribute("id", id)
    elem.style.fontWeight = 'normal'

    eff.innerHTML = datas.response_eff
    eff.setAttribute("id", resp)
    eff.style.fontWeight = "normal"
    eff.style.color = 'gold'

    main.append(hr)
    main.append(elem)
    main.append(eff)

    let text = document.getElementById(id)

    text.innerHTML =  text.textContent.replace(/\S/g, `<span class="${letter}">$&</span>`)

    let effText = document.getElementById(resp)

    effText.innerHTML = effText.textContent.replace(/\S/g, `<span class="${lett}">$&</span>`)

    anime.timeline()
    .add({
        targets: targets,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80
    })
    .add({
        targets: targ,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80,
        complete: function(){
            callEvent()
        }
    })
}

function expUpdate(datas){
    let hr = document.createElement("hr")
    let elem = document.createElement("h4")
    let main =  document.getElementById("main")
    let eff = document.createElement("h4")
    let btnSpace = document.getElementById("choice")

    btnSpace.innerHTML = ""

    let id = "Scene" + itr
    let letter = "letter" + itr
    let targets = "#" + id + " " + "." + letter

    let resp = "Resp" + itr
    let lett = "lett" + itr
    let targ = "#" + resp + " " + "." + lett

    itr++

    hr.style.marginBottom = "10px"
    hr.style.marginTop = "10px"

    elem.innerHTML = datas.response
    elem.setAttribute("id", id)
    elem.style.fontWeight = 'normal'
    eff.innerHTML = datas.response_eff
    eff.setAttribute("id", resp)
    eff.style.fontWeight = 'normal'
    if(datas.getType == "GAIN"){
        eff.style.color = "gold"
    }
    if(datas.getType == "LOSS"){
        eff.style.color = "red"
    }
    main.append(hr)
    main.append(elem)
    main.append(eff)

    let text = document.getElementById(id)

    text.innerHTML =  text.textContent.replace(/\S/g, `<span class="${letter}">$&</span>`)

    let effText = document.getElementById(resp)

    effText.innerHTML = effText.textContent.replace(/\S/g, `<span class="${lett}">$&</span>`)

    anime.timeline()
    .add({
        targets: targets,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80
    })
    .add({
        targets: targ,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80,
        complete: function(){
            callEvent()
        }
    })
}

function LVUpdate(datas){
    let hr = document.createElement("hr")
    let elem = document.createElement("h4")
    let main =  document.getElementById("main")
    let eff = document.createElement("h4")
    let btnSpace = document.getElementById("choice")

    btnSpace.innerHTML = ""

    let id = "Scene" + itr
    let letter = "letter" + itr
    let targets = "#" + id + " " + "." + letter

    let resp = "Resp" + itr
    let lett = "lett" + itr
    let targ = "#" + resp + " " + "." + lett

    itr++

    hr.style.marginBottom = "10px"
    hr.style.marginTop = "10px"

    elem.innerHTML = datas.response
    elem.setAttribute("id", id)
    elem.style.fontWeight = 'normal'
    eff.innerHTML = datas.response_eff
    eff.setAttribute("id", resp)
    eff.style.fontWeight = 'normal'
    if(datas.getType == "GAIN"){
        eff.style.color = "gold"
    }
    if(datas.getType == "LOSS"){
        eff.style.color = "red"
    }
    main.append(hr)
    main.append(elem)
    main.append(eff)

    let text = document.getElementById(id)

    text.innerHTML =  text.textContent.replace(/\S/g, `<span class="${letter}">$&</span>`)

    let effText = document.getElementById(resp)

    effText.innerHTML = effText.textContent.replace(/\S/g, `<span class="${lett}">$&</span>`)

    anime.timeline()
    .add({
        targets: targets,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80
    })
    .add({
        targets: targ,
        opacity: [0, 1],
        duration: 1000,
        easing: "easeOutExpo",
        delay: (elem, index) => index * 80,
        complete: function(){
            callEvent()
        }
    })

    //UPdate Data

    //Mana

    let mana = document.getElementById("manaBarB")

    mana.innerHTML = datas.current_mana + " / " + datas.data.totMana

    let percen = (datas.current_mana / datas.data.totMana) * 100; 

    mana.style.width = percen + "%"

    //HP

    let hp = document.getElementById("hpBarB")

    hp.innerHTML = datas.current_hp + " / " + datas.data.totHP

    let perce = (datas.current_hp / datas.data.totHP) * 100; 

    hp.style.width = perce + "%"

    //STR
    let str = document.getElementById("STR")
    str.innerHTML = datas.data.totSTR 

    //DEF
    let def = document.getElementById("DEF")
    def.innerHTML = datas.data.totDEF

    //INT
    let int = document.getElementById("INT")
    int.innerHTML = datas.data.totINT

    //DEX
    let dex = document.getElementById("DEX")
    dex.innerHTML = datas.data.totDEX

    //CHAR
    let char = document.getElementById("CHAR")
    char.innerHTML = datas.data.totCHAR

}

function REset(){
    $.ajax({
        type: "POST",
        url: appUrl + "/chara/reset/death/lol",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                location.replace(appUrl+'/character-creation')
            }
        }
    });
}

let intervalCheck = {
    start: function(){
        setInterval(function(){
            let main = document.getElementById('main')

            if(main.children.length > 14){
                main.children[0].remove()
            }
        }, 750)
    }
}

intervalCheck.start()

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
