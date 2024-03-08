@extends('Admin.Layouts.Index')

@section('Pages')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Visi</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('visi.update', $vision->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="body" style="text-align: center;">Isi Visi</label>
                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" rows="4" required>{{ old('body', $vision->body) }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p></p>
                            <button type="submit" class="btn btn-primary">Perbarui Visi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
