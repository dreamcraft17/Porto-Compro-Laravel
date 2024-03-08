@extends('Guest.Layouts.Index')
@section('Pages')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn"
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/machine.jpg') }}) center center no-repeat; background-size: cover;"
        data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">{{ $title }}</h1>
        </div>
    </div>
<div class=" my-5">
    <div class="container py-5">

        <div class="row">
        @foreach ($services as $service)
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                @if ($service->image)
                <img src="{{ asset($service->image) }}" class="card-img-top" alt="{{ $service->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $service->name }}</h5>
                    <p class="card-text text-center">{{ $service->detail }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    {{ $services->links() }} 
    </div>
</div>

@endsection
