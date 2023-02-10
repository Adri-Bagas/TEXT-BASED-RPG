@extends('layouts.home')

@section('content')

<form action="{{ url('logout') }}" method="POST" style="display: none;" id="logout">
    @csrf
</form>

    <section id="sidebar">
        <div class="charaData">
            <div class="flex">

            <div class="grup1">
                    <button class="btnItem logout" form="logout">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </button>
                <h1>RPG Text</h1>
            </div>

                <div class="data1">
                    <h2 id="name">{{ $user->name }}</h2>
    
                    <img src="{{ $userRace->media->first()->getUrl() }}" alt="" class="avatar" id="imgShow">

                        <div class="hpBar" data-total="{{ $userChara->max_health }}" data-value="{{ $userChara->current_health }}">
                            <div class="hpBarChild">
                                {{ $userChara->current_health }} / {{ $userChara->max_health }}
                            </div>
                        </div>
        
                        <div class="manaBar" data-total="{{ $userChara->max_mana }}" data-value="{{ $userChara->mana }}">
                            <div class="manaBarChild">
                                {{ $userChara->current_mana }} / {{ $userChara->max_mana }}
                            </div>
                        </div>

                    <div class="btnspace">
                        <button class="btnItem w-200px m-auto" id="Ebutton">Equip</button>

                        <h2 style="font-weight: normal;">Stats Boost</h2>
                        <div class="grid">
                            <p>Str </p> <p>:</p> <p id="itmSTR"></p>
                            <p>Def </p> <p>:</p> <p id="itmDEF"></p>
                            <p>Int </p> <p>:</p> <p id="itmINT"></p>
                            <p>Dex </p> <p>:</p> <p id="itmDEX"></p>
                            <p>Char </p> <p>:</p> <p id="itmCHAR"></p>
                        </div>

                    </div>
                </div>

                <h2>Stats</h2>

                <div class="charStats">
                    <p>Str </p> <p>:</p> <p id="STR">{{ $totSTR }}</p>
                    <p>Def </p> <p>:</p> <p id="DEF">{{ $totDEF }}</p>
                    <p>Int </p> <p>:</p> <p id="INT">{{ $totINT }}</p>
                    <p>Dex </p> <p>:</p> <p id="DEX">{{ $totDEX }}</p>
                    <p>Char </p> <p>:</p> <p id="CHAR">{{ $totChar }}</p>
                </div>

                <h2>Equipment</h2>
                <div class="equipment">
                    <p>Head </p> <p>:</p> <p id="HEAD"><img src="{{ $Head != null ? $Head->DataItem->media->first()->getUrl() : '' }}" alt=""></p>
                    <p>Body </p> <p>:</p> <p id="BODY"><img src="{{ $Body != null ? $Body->DataItem->media->first()->getUrl() : '' }}" alt=""></p>
                    <p>Weapon </p> <p>:</p> <p id="WEAPON"><img src="{{ $Weapon != null ? $Weapon->DataItem->media->first()->getUrl() : '' }}" alt=""></p>
                    <p>Foot </p> <p>:</p> <p id="FOOT"><img src="{{ $Foot != null ? $Foot->DataItem->media->first()->getUrl() : '' }}" alt=""></p>
                    <p>Accessories1 </p> <p>:</p> <p id="ACC1"><img src="{{ $Accessories1 != null ? $Accessories1->DataItem->media->first()->getUrl() : '' }}" alt=""></p>
                    <p>Accessories2 </p> <p>:</p> <p id="ACC2"><img src="{{ $Accessories2 != null ? $Accessories2->DataItem->media->first()->getUrl() : '' }}" alt=""></p>
                </div>

                <h2>Inventory</h2>
                <div class="inventory">
                    @foreach(auth()->user()->userChara->inventory as $item)
                    <button class="btnItem" onclick="checkItem('{{ $item->id }}')"><img src="{{ $item->dataItem->media->first()->getUrl() }}" alt=""></button>
                    @endforeach
                </div>
            </div>

        </div>

        
    </section>

    <main id="main">
        <img src="{{ asset('img/texture/paper2.png') }}" alt="" class="background">
        
    </main>

    <section id="choice">

    </section>


    <div class="preloader">

    </div>
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/style/menu.css') }}">
    <script>
        let appUrl = "{{ url('') }}"
    </script>
    <script src="https://kit.fontawesome.com/f8ad95a845.js" crossorigin="anonymous"></script>
@endsection

@section('js')
    <script src="{{ asset('/js/menu.js') }}" defer></script>
@endsection