@extends('admin.app')

@section('cssTambahan')
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
<h1 class="h3 mb-2 text-gray-800">Class Table</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Class</h6>
    </div>
    <div class="card-body">
        <div class="" style="width: 30%;">
            <form action="{{ url('admin/dash/start-scene/add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Race</label>
                    <select class="form-control" name="races_id" id="">
                        @foreach($races as $race)
                        <option value="{{ $race->id }}">{{ $race->id }} - {{ $race->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Story Text</label>
                    <textarea class="form-control" name="story_text" id="" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Choice</label>
                    <input type="text" class="form-control" name="choice" id="" aria-describedby="helpId" placeholder="">
                </div>

                @if ($errors->any())
                <p style="color:red;">{{ $errors->first() }}</p>
                @else
                @endif

                <button type="reset" class="btn btn-warning p-2 w-25">Reset</button>

                <button type="submit" class="btn btn-primary ml-2 p-2  w-25">Submit</button>
            </form>
        </div>
    </div>
</div>

</div>
@endsection