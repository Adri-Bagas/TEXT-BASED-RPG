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
<h1 class="h3 mb-2 text-gray-800">Starting Scenario Table</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Starting Scenario</h6>
    </div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="card-body">
        <a href="{{ url('admin/dash/start-scene/add') }}" class="btn btn-info mb-4">CREATE +</a>
        <a href="{{ url('admin/dash/start-scene/trashed') }}" class="btn btn-warning mb-4">TRASHED</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Race</th>
                        <th>Story Text</th>
                        <th>Choice</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Race</th>
                        <th>Story Text</th>
                        <th>Choice</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->races->name }}</td>
                        <td>{{ $data->story_text }}</td>
                        <td>{{ $data->choice }}</td>
                        <td>
                            <a href="{{ url('admin/dash/start-scene/edit', $data->id) }}" class="btn btn-primary">EDIT</a> | 
                            <form action="{{ url('admin/start-scene/race', $data->id) }}" method="POST" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-warning">DELETE</button>
                            </form>
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