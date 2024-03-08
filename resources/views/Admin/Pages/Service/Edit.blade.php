@extends('Admin.Layouts.Index')

@section('Pages')
<p></p>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Produk</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('services.update', $service->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $service->name }}" required autofocus>
                                </div>
                            </div>
</br>
                            <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">Detail</label>

                                <div class="col-md-6">
                                    <textarea id="message" class="form-control" name="detail" required>{{ $service->detail }}</textarea>
                                </div>
                            </div>
                            </br>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Gambar</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control-file" name="image">
                                    @if ($service->image)
                                        <img src="{{ asset($service->image) }}" alt="service Image" style="max-width: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </div>
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
