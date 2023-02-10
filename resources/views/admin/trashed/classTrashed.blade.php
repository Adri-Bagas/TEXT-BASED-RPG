@extends('admin.app')

@section('cssTambahan')
    <!-- Custom styles for this page -->
    <link href="{{ asset('') }}vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('jsTambahan')
    <!-- Page level plugins -->
    <script src="{{ asset('') }}vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('') }}js/demo/datatables-demo.js"></script>
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
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="card-body">
        <a href="" class="btn btn-info mb-4">RESTORE ALL</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Health Boost</th>
                        <th>Mana Boost</th>
                        <th>CHA Boost</th>
                        <th>Icon</th>
                        <th>User Count</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Health Boost</th>
                        <th>Mana Boost</th>
                        <th>Char Boost</th>
                        <th>Icon</th>
                        <th>User Count</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->health_boost }}</td>
                        <td>{{ $data->mana_boost }}</td>
                        <td>{{ $data->char_boost }}</td>
                        <td><img src="{{ $data->media->first() ? $data->media->first()->getUrl() : '' }}" alt=""></td>
                        <td>{{ $data->userChara->count() }}</td>
                        <td>
                            <a href="" class="btn btn-primary">RESTORE</a>
                        </td>
                    </tr>    
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection