@extends('Admin.Layouts.Index')

@section('Pages')
<p></p>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Posisi</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('positions.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row mb">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Posisi</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autofocus>
                                </div>
                            </div>
                            </br>
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