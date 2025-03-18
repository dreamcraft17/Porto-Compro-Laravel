@extends('Admin.Layouts.Index')

@section('Pages')
<p></p>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Gambar</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('structures.update', $structure->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            </br>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Gambar</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control-file" name="image">
                                    @if ($structure->image)
                                        <img src="{{ asset($structure->image) }}" alt="structure Image" style="max-width: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
        <label for="message">Detail</label>
        <textarea class="form-control" name="message">{{ old('message', $structure->detail) }}</textarea>
    </div>
                            <p></p>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
