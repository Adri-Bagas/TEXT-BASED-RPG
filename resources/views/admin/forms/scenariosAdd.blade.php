@extends('admin.app')

@section('cssTambahan')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom styles for this page -->
    <link href="{{ asset('') }}vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('jsTambahan')
    <!-- Page level plugins -->
    <script src="{{ asset('') }}vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('') }}js/demo/datatables-demo.js"></script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        let case1 = document.getElementById('cons1')
        let effect1 = document.getElementById('effect1')
        let case2 = document.getElementById('cons2')
        let effect2 = document.getElementById('effect2')
        let case3 = document.getElementById('cons3')
        let effect3 = document.getElementById('effect3')
        let case4 = document.getElementById('cons4')
        let effect4 = document.getElementById('effect4')
        let case5 = document.getElementById('failedCons')
        let effect5 = document.getElementById('failedEff')

        case1.addEventListener('change', () => {
            if(case1.value == 'ITEM'){
                let inp = document.createElement('select')

                inp.id = 'selectItem1'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'effect1')
                inp.setAttribute('required', '')

                if(document.getElementById('selectItem1')){
                    document.getElementById('selectItem1').remove()
                }

                effect1.append(inp)

                $.ajax({
                    type: "POST",
                    url: "{{ route('data.item') }}",
                    success: function (response) {
                        let datas = response.data
                        datas.forEach(element => {
                            document.getElementById('selectItem1').innerHTML += `<option value="${element.id}">${element.id} - ${element.name}</option>`
                        });
                    }
                });
            }
            else if(case1.value == 'EXP' || case1.value == 'HEALTH' || case1.value == 'MANA'){
                let inp = document.createElement('input')

                inp.id = 'selectItem1'
                inp.type = 'number'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'effect1')

                if(document.getElementById('selectItem1')){
                    document.getElementById('selectItem1').remove()
                }

                effect1.append(inp)

            }
            else if(case1.value == 'CHEST'){
                if(document.getElementById('selectItem1')){
                    document.getElementById('selectItem1').remove()
                }
            }
        })

        case2.addEventListener('change', () => {
            if(case2.value == 'ITEM'){
                let inp = document.createElement('select')

                inp.id = 'selectItem2'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'effect2')

                if(document.getElementById('selectItem2')){
                    document.getElementById('selectItem2').remove()
                }

                effect2.append(inp)

                $.ajax({
                    type: "POST",
                    url: "{{ route('data.item') }}",
                    success: function (response) {
                        let datas = response.data
                        datas.forEach(element => {
                            document.getElementById('selectItem2').innerHTML += `<option value="${element.id}">${element.id} - ${element.name}</option>`
                        });
                    }
                });
            }
            else if(case2.value == 'EXP' || case2.value == 'HEALTH' || case2.value == 'MANA'){
                let inp = document.createElement('input')

                inp.id = 'selectItem2'
                inp.type = 'number'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'effect2')

                if(document.getElementById('selectItem2')){
                    document.getElementById('selectItem2').remove()
                }

                effect2.append(inp)

            }
            else if(case2.value == 'CHEST'){
                if(document.getElementById('selectItem2')){
                    document.getElementById('selectItem2').remove()
                }
            }
        })

        case3.addEventListener('change', () => {
            if(case3.value == 'ITEM'){
                let inp = document.createElement('select')

                inp.id = 'selectItem3'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'effect3')

                if(document.getElementById('selectItem3')){
                    document.getElementById('selectItem3').remove()
                }

                effect3.append(inp)

                $.ajax({
                    type: "POST",
                    url: "{{ route('data.item') }}",
                    success: function (response) {
                        let datas = response.data
                        datas.forEach(element => {
                            document.getElementById('selectItem3').innerHTML += `<option value="${element.id}">${element.id} - ${element.name}</option>`
                        });
                    }
                });
            }
            else if(case3.value == 'EXP' || case3.value == 'HEALTH' || case3.value == 'MANA'){
                let inp = document.createElement('input')

                inp.id = 'selectItem3'
                inp.type = 'number'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'effect3')

                if(document.getElementById('selectItem3')){
                    document.getElementById('selectItem3').remove()
                }

                effect3.append(inp)

            }
            else if(case3.value == 'CHEST'){
                if(document.getElementById('selectItem3')){
                    document.getElementById('selectItem3').remove()
                }
            }
        })

        case4.addEventListener('change', () => {
            if(case4.value == 'ITEM'){
                let inp = document.createElement('select')

                inp.id = 'selectItem4'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'effect4')

                if(document.getElementById('selectItem4')){
                    document.getElementById('selectItem4').remove()
                }

                effect4.append(inp)

                $.ajax({
                    type: "POST",
                    url: "{{ route('data.item') }}",
                    success: function (response) {
                        let datas = response.data
                        datas.forEach(element => {
                            document.getElementById('selectItem4').innerHTML += `<option value="${element.id}">${element.id} - ${element.name}</option>`
                        });
                    }
                });
            }
            else if(case4.value == 'EXP' || case4.value == 'HEALTH' || case4.value == 'MANA'){
                let inp = document.createElement('input')

                inp.id = 'selectItem4'
                inp.type = 'number'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'effect4')

                if(document.getElementById('selectItem4')){
                    document.getElementById('selectItem4').remove()
                }

                effect4.append(inp)

            }
            else if(case4.value == 'CHEST'){
                if(document.getElementById('selectItem4')){
                    document.getElementById('selectItem4').remove()
                }
            }
        })

        case5.addEventListener('change', () => {
            if(case5.value == 'ITEM'){
                let inp = document.createElement('select')

                inp.id = 'selectItem5'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'failed_eff')

                if(document.getElementById('selectItem5')){
                    document.getElementById('selectItem5').remove()
                }

                effect5.append(inp)

                $.ajax({
                    type: "POST",
                    url: "{{ route('data.item') }}",
                    success: function (response) {
                        let datas = response.data
                        datas.forEach(element => {
                            document.getElementById('selectItem5').innerHTML += `<option value="${element.id}">${element.id} - ${element.name}</option>`
                        });
                    }
                });
            }
            else if(case5.value == 'EXP' || case5.value == 'HEALTH' || case4.value == 'MANA'){
                let inp = document.createElement('input')

                inp.id = 'selectItem5'
                inp.type = 'number'
                inp.setAttribute('class', 'form-control')
                inp.setAttribute('name', 'failed_eff')

                if(document.getElementById('selectItem5')){
                    document.getElementById('selectItem5').remove()
                }

                effect5.append(inp)

            }
            else if(case5.value == 'CHEST'){
                if(document.getElementById('selectItem5')){
                    document.getElementById('selectItem5').remove()
                }
            }
        })

        function show(elem, arg){
            if(arg == 2){
                document.getElementById('second2').style.display = 'block';
                elem.remove()
            }
            else if(arg == 3){
                document.getElementById('tiga3').style.display = 'block';
                elem.remove()
            }
            else if(arg == 4){
                document.getElementById('empat4').style.display = 'block';
                elem.remove()
            }
        }
    </script>

@endsection

@section('contents')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Scenario Table</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Scenario</h6>
    </div>
    <div class="card-body">
        <div class="" style="width: 30%;">
            <form action="{{ url('admin/dash/scenarios') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Rarity</label>
                    <select class="form-control" name="rarity" id="">
                    <option disabled selected value> -- select an option -- </option>
                        <option value="COMMON">Common</option>
                        <option value="UNCOMMON">Uncommon</option>
                        <option value="RARE">Rare</option>
                        <option value="EPIC">Epic</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Story Text</label>
                    <textarea class="form-control" name="story_text" id="" rows="3" required></textarea>
                </div>

                <div id="satu1">
                <div class="form-group">
                    <label for="">Choice 1</label>
                    <input type="text" class="form-control" name="choice1" id="" aria-describedby="helpId" placeholder="" required>
                </div>
                
                <div class="form-group">
                    <label for="">Response 1</label>
                    <textarea class="form-control" name="response1" id="" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="">Requirements 1</label>
                    <select class="form-control" name="req1" required>
                    <option disabled selected value> -- select an option -- </option>
                        <option value="STR">STR</option>
                        <option value="INT">INT</option>
                        <option value="DEF">DEF</option>
                        <option value="CHAR">CHAR</option>
                        <option value="DEX">DEX</option>
                        <option value="LEVEL">level</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Min Req 1</label>
                    <input type="number" name="min1" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="">Cons 1</label>
                    <select class="form-control" name="cons1" id="cons1" required>
                    <option disabled selected value> -- select an option -- </option>
                        <option value="ITEM">Item</option>
                        <option value="EXP">EXP</option>
                        <option value="CHEST">Chest</option>
                        <option value="HEALTH">Health</option>
                        <option value="MANA">Mana</option>
                    </select>
                </div>

                <div class="form-group" id="effect1">
                    <label for="">Effect 1</label>
                    
                </div>

                    <button onclick="show(this, 2)" class="btn btn-info" style="margin-bottom: 20px;">Add Another Choice +</button>
                </div>


                <div id="second2" style="display: none;">
                    <hr>
    
                    <div class="form-group" >
                        <label for="">Choice 2</label>
                        <input type="text" class="form-control" name="choice2" id="choice2" aria-describedby="helpId" placeholder="">
                    </div>
    
                    <div class="form-group" >
                        <label for="">Response 2</label>
                        <textarea class="form-control" name="response2" id="" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                    <label for="">Requirements 2</label>
                    <select class="form-control" name="req2" id="" >
                    <option disabled selected value> -- select an option -- </option>
                        <option value="STR">STR</option>
                        <option value="INT">INT</option>
                        <option value="DEF">DEF</option>
                        <option value="CHAR">CHAR</option>
                        <option value="DEX">DEX</option>
                        <option value="LEVEL">level</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Min Req 2</label>
                    <input type="number" name="min2" class="form-control">
                </div>
    
                    <div class="form-group" >
                        <label for="">Cons 2</label>
                        <select class="form-control" name="cons2" id="cons2">
                        <option disabled selected value> -- select an option -- </option>
                            <option value="ITEM">Item</option>
                            <option value="EXP">EXP</option>
                            <option value="CHEST">Chest</option>
                            <option value="HEALTH">Health</option>
                            <option value="MANA">Mana</option>
                        </select>
                    </div>

    
                    <div class="form-group" id="effect2">
                        <label for="">Effect 2</label>
                        
                    </div>  
                    <button onclick="show(this, 3)" class="btn btn-info" style="margin-bottom: 20px;">Add Another Choice +</button>
                </div>

                <div id="tiga3" style="display: none;">

                    <hr>
    
                    <div class="form-group" >
                        <label for="">Choice 3</label>
                        <input type="text" class="form-control" name="choice3" id="" aria-describedby="helpId" placeholder="">
                    </div>
    
                    <div class="form-group" >
                        <label for="">Response 3</label>
                        <textarea class="form-control" name="response3" id="" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="">Requirements 3</label>
                    <select class="form-control" name="req3" id="" >
                    <option disabled selected value> -- select an option -- </option>
                        <option value="STR">STR</option>
                        <option value="INT">INT</option>
                        <option value="DEF">DEF</option>
                        <option value="CHAR">CHAR</option>
                        <option value="DEX">DEX</option>
                        <option value="LEVEL">level</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Min Req 3</label>
                    <input type="number" name="min3" class="form-control">
                </div>
                    
                    <div class="form-group" >
                        <label for="">Cons 3</label>
                        <select class="form-control" name="cons3" id="cons3">
                        <option disabled selected value> -- select an option -- </option>
                            <option value="ITEM">Item</option>
                            <option value="EXP">EXP</option>
                            <option value="CHEST">Chest</option>
                            <option value="HEALTH">Health</option>
                            <option value="MANA">Mana</option>
                        </select>
                    </div>


    
                    <div class="form-group" id="effect3">
                        <label for="">Effect 3</label>
                        
                    </div>
                    <button onclick="show(this, 4)" class="btn btn-info" style="margin-bottom: 20px;">Add Another Choice +</button>
                </div>

                <div id="empat4" style="display: none;">
                    <hr>
    
                    <div class="form-group" >
                        <label for="">Choice 4</label>
                        <input type="text" class="form-control" name="choice4" id="" aria-describedby="helpId" placeholder="">
                    </div>
    
                    <div class="form-group" >
                        <label for="">Response 4</label>
                        <textarea class="form-control" name="response4" id="" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                    <label for="">Requirements 4</label>
                    <select class="form-control" name="req4" id="">
                    <option disabled selected value> -- select an option -- </option>
                        <option value="STR">STR</option>
                        <option value="INT">INT</option>
                        <option value="DEF">DEF</option>
                        <option value="CHAR">CHAR</option>
                        <option value="DEX">DEX</option>
                        <option value="LEVEL">level</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Min Req 4</label>
                    <input type="number" name="min4" class="form-control">
                </div>
    
                    <div class="form-group" >
                        <label for="">Cons 4</label>
                        <select class="form-control" name="cons4" id="cons4">
                        <option disabled selected value> -- select an option -- </option>
                            <option value="ITEM">Item</option>
                            <option value="EXP">EXP</option>
                            <option value="CHEST">Chest</option>
                            <option value="HEALTH">Health</option>
                            <option value="MANA">Mana</option>
                        </select>
                    </div>
    
                    <div class="form-group" id="effect4">
                        <label for="">Effect 4</label>
                        
                    </div>
                </div>

                <div>
                    <hr>

                    <div class="form-group">
                        <label for="">Failed Text</label>
                        <textarea class="form-control" name="failed_text" id="" rows="3" required></textarea>
                    </div>

                    <div class="form-group" >
                        <label for="">Failed Cons</label>
                        <select class="form-control" name="failed_cons" id="failedCons">
                        <option disabled selected value> -- select an option -- </option>
                            <option value="ITEM">Item</option>
                            <option value="EXP">EXP</option>
                            <option value="CHEST">Chest</option>
                            <option value="HEALTH">Health</option>
                            <option value="MANA">Mana</option>
                        </select>
                    </div>

                    <div class="form-group" id="failedEff">
                        <label for="">Effect Failed</label>
                        
                    </div>
                </div>

                @if ($errors->any())
                <p style="color:red;">{{ $errors->first() }}</p>
                @else
                @endif

                <button type="reset" class="btn btn-warning p-2 w-25">Reset</button>

                <button type="submit" class="btn btn-primary ml-2 p-2 w-25">Submit</button>
            </form>
        </div>
    </div>
</div>

</div>
@endsection