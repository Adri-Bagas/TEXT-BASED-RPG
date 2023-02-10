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
            <form>
                @csrf

                <div class="form-group">
                    <label for="">Rarity</label>
                    <select class="form-control" name="rarity" id="">
                    <option disabled selected value> {{ $data->rarity }} </option>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="story_text" id="" rows="3" readonly>{{ $data->story_text }}</textarea>
                </div>

                <div id="satu1">
                <div class="form-group">
                    <label for="">Choice 1</label>
                    <input type="text" class="form-control" name="choice1" id="" aria-describedby="helpId" placeholder="" value="{{ $data->choice1 }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="">Response 1</label>
                    <textarea class="form-control" name="response1" id="" rows="3" required readonly>{{ $data->response1 }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Requirements 1</label>
                    <select class="form-control" name="req1" id="cons1" required>
                    <option disabled selected value> {{ $data->req1 }} </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Min Req 1</label>
                    <input type="number" name="min1" class="form-control" value="{{ $data->min1 }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="">Cons 1</label>
                    <select class="form-control" name="cons1" id="" required disabled>
                    <option disabled selected value>{{ $data->cons1 }}</option>
                    </select>
                </div>

                <div class="form-group" id="effect1">
                    <label for="">Effect 1</label>
                    @if($data->cons1 == 'ITEM')
                        <select name="" id="" disabled class="form-control">
                        <option disabled selected value>{{ $item1->id }} - {{ $item1->name }}</option>
                        </select>
                    @else
                        <input type="number" name="" id="" value="{{ $data->effect1 }}" readonly class="form-control">
                    @endif
                    
                </div>

                </div>


                <div id="second2">
                    <hr>
    
                    <div class="form-group" >
                        <label for="">Choice 2</label>
                        <input type="text" class="form-control" name="choice2" id="choice2" aria-describedby="helpId" placeholder="" value="{{ $data->choice2 }}" readonly>
                    </div>
    
                    <div class="form-group" >
                        <label for="">Response 2</label>
                        <textarea class="form-control" name="response2" id="" rows="3" readonly>{{ $data->repsonse2 }}</textarea>
                    </div>

                    <div class="form-group">
                    <label for="">Requirements 2</label>
                    <select class="form-control" name="req2" id="" disabled>
                    <option disabled selected value> {{ $data->req2 }} </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Min Req 2</label>
                    <input type="number" name="min2" class="form-control" readonly value="{{ $data->min2 }}">
                </div>
    
                    <div class="form-group" >
                        <label for="">Cons 2</label>
                        <select class="form-control" name="cons2" id="cons2" disabled>
                        <option disabled selected value> {{ $data->cons2 }} </option>
                        </select>
                    </div>

    
                    <div class="form-group" id="effect2">
                        <label for="">Effect 2</label>
                        @if($data->cons2 == 'ITEM')
                        <select name="" id="" disabled class="form-control">
                        <option disabled selected value>{{ $item2->id }} - {{ $item2->name }}</option>
                        </select>
                        @else
                        <input type="number" name="" id="" value="{{ $data->effect2 }}" readonly class="form-control">
                        @endif
                    </div>
                </div>

                <div id="tiga3">

                    <hr>
    
                    <div class="form-group" >
                        <label for="">Choice 3</label>
                        <input type="text" class="form-control" name="choice3" id="" aria-describedby="helpId" placeholder="" readonly value="{{ $data->choice3 }}">
                    </div>
    
                    <div class="form-group" >
                        <label for="">Response 3</label>
                        <textarea class="form-control" name="response3" id="" rows="3" readonly>{{ $data->response3 }}</textarea>
                    </div>
                    <div class="form-group">
                    <label for="">Requirements 3</label>
                    <select class="form-control" name="req3" id="" disabled>
                    <option disabled selected value> {{ $data->req3 }} </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Min Req 3</label>
                    <input type="number" name="min3" class="form-control" value="{{ $data->min3 }}" readonly>
                </div>
                    
                    <div class="form-group" >
                        <label for="">Cons 3</label>
                        <select class="form-control" name="cons3" id="cons3" disabled>
                        <option disabled selected value> {{ $data->cons3 }} </option>
                        </select>
                    </div>


    
                    <div class="form-group" id="effect3">
                        <label for="">Effect 3</label>
                        @if($data->cons3 == 'ITEM')
                        <select name="" id="" disabled>
                        <option disabled selected value class="form-control">{{ $item3->id }} - {{ $item3->name }}</option>
                        </select>
                        @else
                        <input type="number" name="" id="" value="{{ $data->effect3 }}" readonly class="form-control">
                        @endif
                    </div>
                </div>

                <div id="empat4">
                    <hr>
    
                    <div class="form-group" >
                        <label for="">Choice 4</label>
                        <input type="text" class="form-control" name="choice4" id="" aria-describedby="helpId" placeholder="" readonly value="{{ $data->choice4 }}">
                    </div>
    
                    <div class="form-group" >
                        <label for="">Response 4</label>
                        <textarea class="form-control" name="response4" id="" rows="3" readonly>{{ $data->response4 }}</textarea>
                    </div>

                    <div class="form-group">
                    <label for="">Requirements 4</label>
                    <select class="form-control" name="req4" id="" disabled>
                    <option disabled selected value> {{ $data->req4 }} </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Min Req 4</label>
                    <input type="number" name="min4" class="form-control" readonly value="{{ $data->min4 }}">
                </div>
    
                    <div class="form-group" >
                        <label for="">Cons 4</label>
                        <select class="form-control" name="cons4" id="cons4" disabled>
                        <option disabled selected value> {{ $data->cons4 }} </option>
                        </select>
                    </div>
    
                    <div class="form-group" id="effect4">
                        <label for="">Effect 4</label>
                        @if($data->cons4 == 'ITEM')
                        <select name="" id="" disabled class="form-control">
                        <option disabled selected value>{{ $item4->id }} - {{ $item4->name }}</option>
                        </select>
                        @else
                        <input type="number" name="" id="" value="{{ $data->effect4 }}" readonly class="form-control">
                        @endif
                    </div>
                </div>

                <div>
                    <hr>

                    <div class="form-group">
                        <label for="">Failed Text</label>
                        <textarea class="form-control" name="failed_text" id="" rows="3" required readonly> {{ $data->failed_text }} </textarea>
                    </div>

                    <div class="form-group" >
                        <label for="">Failed Cons</label>
                        <select class="form-control" name="failed_cons" id="failedCons" disabled>
                        <option disabled selected value> {{ $data->failed_cons }} </option>
                        </select>
                    </div>

                    <div class="form-group" id="failedEff">
                        <label for="">Effect Failed</label>
                        @if($data->failed_cons == 'ITEM')
                        <select name="" id="" disabled class="form-control">
                        <option disabled selected value>{{ $item5->id }} - {{ $item5->name }}</option>
                        </select>
                        @else
                        <input type="number" name="" id="" value="{{ $data->failed_eff }}" disabled class="form-control">
                        @endif
                    </div>
                </div>

                @if ($errors->any())
                <p style="color:red;">{{ $errors->first() }}</p>
                @else
                @endif


            </form>
        </div>
    </div>
</div>

</div>
@endsection