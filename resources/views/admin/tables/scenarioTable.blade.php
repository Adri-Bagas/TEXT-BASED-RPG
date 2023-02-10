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
<h1 class="h3 mb-2 text-gray-800">Scenario Table</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Scenario</h6>
    </div>
    <div class="card-body">
    <a href="{{ url('admin/dash/scenarios/add') }}" class="btn btn-info mb-4">CREATE +</a>
        <a href="{{ url('admin/dash/scenarios/trashed') }}" class="btn btn-warning mb-4">TRASHED</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Rarity</th>
                        <th>Story Text</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Rarity</th>
                        <th>Story Text</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->rarity }}</td>
                        <td>{{ $data->story_text }}</td>
                        <td>
                        <a class="btn btn-primary">EDIT</a> | 
                        <a class="btn btn-info" href="{{ url('admin/dash/scenarios', $data->id) }}">DETAILS</a> | 
                        <button class="btn btn-warning">DELETE</button>
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