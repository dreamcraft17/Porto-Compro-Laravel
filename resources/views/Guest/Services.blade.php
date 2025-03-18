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
                    <!-- <p class="card-text text-center">{{ $service->detail }}</p> -->
                    <p class="card-text text-center">{{ substr($service->detail, 0, 50) }}{{ strlen($service->detail) > 50 ? '...' : '' }}</p>
                    <div class="text-center">
                        <button class="btn btn-primary read-more" data-service-id="{{$service->id}}" data-service-name="{{$service->name}}" data-service-image="{{asset($service->image)}}" data-bs-toggle="modal" data-bs-target="#serviceModal">Read More</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    {{ $services->links() }} 
    </div>
</div>

@endsection

<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Service Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="serviceDetailBody" style="width: 100%; overflow-y:auto; word-wrap:break-word;"></div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.read-more').click(function() {
            var serviceId = $(this).data('service-id');
            var serviceName = $(this).data('service-name');
            var serviceImage = $(this).data('service-image');
            var modalBody = $('#serviceDetailBody');

            $.ajax({
                url: '/services/' + serviceId,
                type: 'GET',
                success: function(response) {
                    modalBody.html('<h5 class="card-title text-center">' + serviceName + '</h5><img src="' + serviceImage + '" class="img-fluid" alt="' + serviceName + '"><p></p></p><p class="card-title text-center"><strong>' + ' DETAILS : '+ '</strong></p><p class="card-title text-center">' + response.detail + '</p>');
                    console.log(response.detail);
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Menangani kesalahan jika terjadi
                }
            });
        });
    });
</script>