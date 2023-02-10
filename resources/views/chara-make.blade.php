@extends('layouts.home')

@section('title', 'Shall Be The One Thy Want')

@section('content')
<img class='background' src="{{ asset('img/gif/background2.gif') }}" alt="">

<main>
    <div class="screen">
        <h1 class="text text1">
            Hello, and Welcome.
        </h1>

        <h1 class="text text2">
            Adventure Awaits You.
        </h1>

        <h1 class="text text3">
            But First...
        </h1>

        <div class='choice race'>
            <h1 class="text text4">
                What do you wanna be?
            </h1>
            <div class="choicebtn">
                @foreach($races as $race)
                <button onclick="pick1('{{ $race->id }}')" class="btn races"> <img src="{{ $race->media->first()->getUrl() }}" alt=""> {{ $race->name }}</button> <br>
                @endforeach
            </div>
        </div>

        <div class='choice classes'>
            <h1 class="text text5">
                What do you like to be?
            </h1>
            <div class="choicebtn">
                @foreach($classes as $class)
                <button onclick="pick2('{{ $class->id }}')" class="btn class"> <img src="{{ $class->media->first()->getUrl() }}" alt=""> {{ $class->name }}</button> <br>
                @endforeach
            </div>
        </div>

        <div class="choice statspread">
            <div>
                <h1 class="text text6">What are You good at?</h1>
                <div style="display: flex;" class="remain">
                    <p>Point Remaining : </p><input type="number" class="points" value="10" id="points" disabled><br>
                </div>
                <p id="warning" style="color: red;"></p>
            </div>

            <form class="formStat">
                <div class='stats'>
                    <label for="">Str</label>
                    <button class="minusBtn" type="button" onclick="minStat('str')">-</button>
                    <div class="look">
                        <input type="number" name="str" id="str" value="1" min='1' max='5' disabled>
                    </div>
                    <button class="plusBtn" onclick='plusStat("str")' type="button">+</button>
                </div>
                <div class='stats'>
                    <label for="">Int</label>
                    <button class="minusBtn" type="button" onclick="minStat('int')">-</button>
                    <div class="look">
                        <input type="number" name="int" id="int" value="1" min='1' max='5' disabled>
                    </div>
                    <button class="plusBtn" onclick='plusStat("int")' type="button">+</button>
                </div>
                <div class='stats'>
                    <label for="">Dex</label>
                    <button class="minusBtn" type="button" onclick="minStat('dex')">-</button>
                    <div class="look">
                        <input type="number" name="dex" id="dex" value="1" min='1' max='5' disabled>
                    </div>
                    <button class="plusBtn" onclick='plusStat("dex")' type="button">+</button>
                </div>
                <div class='stats'>
                    <label for="">Char</label>
                    <button class="minusBtn" type="button" onclick="minStat('char')">-</button>
                    <div class="look">
                        <input type="number" name="char" id="char" value="1" min='1' max='5' disabled>
                    </div>
                    <button class="plusBtn" onclick='plusStat("char")' type="button">+</button>
                </div>
                <div class='stats'>
                    <label for="">Def</label>
                    <button class="minusBtn" type="button" onclick="minStat('def')">-</button>
                    <div class="look">
                        <input type="number" name="def" id="def" value="1" min='1' max='5' disabled>
                    </div>
                    <button class="plusBtn" onclick='plusStat("def")' type="button">+</button>
                </div>
                <button type="button" class="continue" onclick="sendStat()">Continue</button>
            </form>
        </div>

        <h1 class="text text8 part2">So you have decided what you wanna be?</h1>

        <h1 class="text text7 part2">it is wise to check again ...</h1>

        <div class="choice charaData">
            <h1>Your Persona.</h1>

            <div class="dataSets">
                <div class="genericData">
                    <p>Race </p> <p>:</p> <p id="RACE"></p>
                    <p>CLass </p> <p>:</p> <p id="CLASS"></p>
                    <p>Hp </p> <p>:</p> <p id="HP"></p>
                    <p>Mana </p> <p>:</p> <p id="MANA"></p>
                    <p>Level </p> <p>:</p> <p id="LEVEL"></p>
                </div>
    
                <div class="statsData">
                    <p>Str </p> <p>:</p> <p id="STR"></p>
                    <p>Def </p> <p>:</p> <p id="DEF"></p>
                    <p>Int </p> <p>:</p> <p id="INT"></p>
                    <p>Dex </p> <p>:</p> <p id="DEX"></p>
                    <p>Char </p> <p>:</p> <p id="CHAR"></p>
                </div>
            </div>
        </div>

        <button class="start" style="display: none;opacity: 0;" onclick="starts()">Start!</button>
        
    </div>
</main>
<div class="preloader">
    <h1 class="text text9 bag1">Alright, then...</h1>
    <h1 class="text text10 bag1">This world is a beautiful one</h1>
    <h1 class="text text11 bag1">But it's also ...</h1>
    <h1 class="text text14"><span style='color: red;'>DANGEROUS</span></h1>
    <h1 class="text text12 bag2">Have a great Adventure, <span class="name">{{ auth()->user()->name }}</span></h1>
    <h1 class="text text13 bag2">May the force be with you...</h1>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/style/charaCreate.css') }}">
@endsection

@section('js')
<script src="{{ asset('/js/charaCreate.js') }}" defer></script>

<script>
    function pick1(arg1){
    $.ajax({
        type: "POST",
        url: "{{ url('/character-creation/race') }}",
        data: { 'id' : arg1 },
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (response) {
            console.log(response)
            showClass()
        }
    });
}
</script>

<script>
    function pick2(arg1){
    $.ajax({
        type: "POST",
        url: "{{ url('/character-creation/class') }}",
        data: { 'id' : arg1 },
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (response) {
            console.log(response)
            showStat()
        }
    });
}
</script>

<script>
    function sendStat() {
        let str = $('#str').val()
        let int = $('#int').val()
        let dex = $('#dex').val()
        let char = $('#char').val()
        let def = $('#def').val()

        let points = $('#points').val()

        let data = {
            'str' : str,
            'int' : int,
            'dex' : dex,
            'char' : char,
            'def': def
        }

        if(points == 0){
            $.ajax({
                type: "POST",
                url: "{{ url('/character-creation/stats') }}",
                data: data,
                headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (response) {
                    console.log(response)

                    document.getElementById('RACE').innerText = response.data.race
                    document.getElementById('CLASS').innerText = response.data.class
                    document.getElementById('HP').innerText = response.data.hp
                    document.getElementById('MANA').innerText = response.data.mana
                    document.getElementById('LEVEL').innerText = response.data.level

                    document.getElementById('STR').innerText = response.data.str
                    document.getElementById('DEF').innerText = response.data.def
                    document.getElementById('INT').innerText = response.data.int
                    document.getElementById('DEX').innerText = response.data.dex
                    document.getElementById('CHAR').innerText = response.data.char

                    showPersona()
                }
            });
        }else{
            document.getElementById('warning').innerHTML = 'Must Spend All Of the Points'
        }

    }
</script>

@endsection