@extends('Guest.Layouts.Index')
@section('Pages')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/machine.jpg') }}) center center no-repeat; background-size: cover;" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">{{ $title }} for '{{ $searchQuery }}'</h1>
    </div>
</div>

@if ($searchResults->isEmpty())
    <p>No results found.</p>
@else
<div class="container my-5">
    <div class="row">
        @foreach ($searchResults as $result)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    @if ($result instanceof App\Models\Product && $result->image)
                        <img src="{{ asset($result->image) }}" class="card-img-top" alt="{{ $result->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $result->name }}</h5>
                        <p class="card-text text-center">{{ substr($result->detail, 0, 50) }}{{ strlen($result->detail) > 50 ? '...' : '' }}</p>
                        <div class="text-center">
                            <button class="btn btn-primary read-more" data-product-id="{{ $result->id }}" data-product-name="{{ $result->name }}" data-product-image="{{ $result instanceof App\Models\Product ? asset($result->image) : '' }}" data-bs-toggle="modal" data-bs-target="#productModal">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $searchResults->links() }}
</div>
@endif

@endsection
