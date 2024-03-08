@extends('Admin.Layouts.Index')

@section('Pages')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Struktur Perusahaan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company_structure.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Struktur</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="positions" class="col-md-4 col-form-label text-md-right">Posisi dalam Struktur</label>

                            <div class="col-md-6">
                                <select id="positions" class="form-control" name="positions[]" multiple required>
                                    @foreach($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">Foto</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control-file" name="photo">
                            </div>
                        </div>

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
