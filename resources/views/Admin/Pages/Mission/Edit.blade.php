@extends('Admin.Layouts.Index')

@section('Pages')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Misi</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('misi.update', $mission->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="body">Isi Misi</label>
                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" rows="4" required>{{ old('body', $mission->body) }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p></p>
                            <button type="submit" class="btn btn-primary">Perbarui Misi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
