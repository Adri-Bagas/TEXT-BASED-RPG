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

    <script>
        var uploadedGalleryMap = {}
            Dropzone.options.galleryDropzone = {
                url: "{{ url('admin/dash/store-img') }}",
                maxFilesize: 5, // MB
                maxFiles: 1,
                acceptedFiles: '.jpeg,.jpg,.png,.gif',
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (file, response) {
                    $('form').append('<input type="hidden" name="media[]" value="' + response.name + '">')
                    uploadedGalleryMap[file.name] = response.name

                    console.log(response)
                },
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                    } else {
                    name = uploadedGalleryMap[file.name]
                    }
                    $('form').find('input[name="media[]"][value="' + name + '"]').remove()
                },
                init: function () {
                @if(isset($data) && $data->media)
                    var files =
                    {!! json_encode($data->media) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.original_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="media[]" value="' + file.file_name + '">')
                    }
                @endif
                },
                error: function (file, response) {
                    if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                    } else {
                    var message = response.errors.file
                    }
                    file.previewElement.classList.add('dz-error')
                    _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                    _results = []
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                        }
                    return _results
                }
            }
    </script>
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
            <form action="{{ url('admin/dash/item/add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Type</label>
                    <select class="form-control" name="type" id="">
                        <option value="weapon">Weapon</option>
                        <option value="body">Body</option>
                        <option value="head">Head</option>
                        <option value="accessories">Accessories</option>
                        <option value="foot">Foot</option>
                        <option value="consum">Consumable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Str Boost</label>
                    <input type="number" class="form-control" name="str_boost" id="" aria-describedby="helpId" placeholder="" value="0">
                </div>

                <div class="form-group">
                    <label for="">Int Boost</label>
                    <input type="number" class="form-control" name="int_boost" id="" aria-describedby="helpId" placeholder="" value="0">
                </div>

                <div class="form-group">
                    <label for="">Dex Boost</label>
                    <input type="number" class="form-control" name="dex_boost" id="" aria-describedby="helpId" placeholder="" value="0">
                </div>

                <div class="form-group">
                    <label for="">Def Boost</label>
                    <input type="number" class="form-control" name="def_boost" id="" aria-describedby="helpId" placeholder="" value="0">
                </div>

                <div class="form-group">
                    <label for="">Health Boost</label>
                    <input type="number" class="form-control" name="health_boost" id="" aria-describedby="helpId" placeholder="" value="0">
                </div>

                <div class="form-group">
                    <label for="">Mana Boost</label>
                    <input type="number" class="form-control" name="mana_boost" id="" aria-describedby="helpId" placeholder="" value="0">
                </div>

                <div class="form-group">
                    <label for="">Char Boost</label>
                    <input type="number" class="form-control" name="char_boost" id="" aria-describedby="helpId" placeholder="" value="0">
                </div>

                <div class="form-group">
                    <label for="">IMG</label>
                    <div class="needsclick dropzone" id="gallery-dropzone"></div>
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