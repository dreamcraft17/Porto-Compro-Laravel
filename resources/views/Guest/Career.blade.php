@extends('Guest.Layouts.Index')
@section('Pages')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/machine.jpg') }}) center center no-repeat; background-size: cover;" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">{{ $title }}</h1>
    </div>
</div>
<div class=" my-5">
    <div class="container py-5">
    @if(count($careers)>0)
        <div class="row">
            @foreach ($careers as $career)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    @if ($career->image)
                    <img src="{{ asset($career->image) }}" class="card-img-top" alt="{{ $career->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $career->name }}</h5>
                        <p class="card-text text-center">{{ substr($career->detail, 0, 50) }}{{ strlen($career->detail) > 50 ? '...' : '' }}</p>
                        <div class="text-center">
                            <button class="btn btn-primary read-more" data-career-id="{{ $career->id }}" data-career-name="{{ $career->name }}" data-career-image="{{ asset($career->image) }}" data-bs-toggle="modal" data-bs-target="#careerModal">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-4 text-black animated slideInDown mb-3">No Job Available At this Time!</h1>
            </div>
        </div>
        @endif
       <div class="row">
            <div class="col-md-12 text-center">
                {{ $careers->links() }}
            </div>
        </div>
</div>

@endsection


<!-- modal for detail -->
<div class="modal fade" id="careerModal" tabindex="-1" aria-labelledby="careerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="careerModalLabel">career Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="careerDetailBody" style="width: 100%; overflow-y:auto; word-wrap:break-word;">

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.read-more').click(function() {
            var careerId = $(this).data('career-id');
            var careerName = $(this).data('career-name');
            var careerImage = $(this).data('career-image');
            var modalBody = $('#careerDetailBody');

            $.ajax({
                url: '/careers/' + careerId,
                type: 'GET',
                success: function(response) {
                    modalBody.html('<h5 class="card-title text-center">' + careerName + '</h5><img src="' + careerImage + '" class="img-fluid" alt="' + careerName + '"><p></p></p><p class="card-title text-center"><strong>' + ' DETAILS : '+ '</strong></p><p class="card-title text-center">' + response.detail + '</p>');
                    console.log(response.detail);
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Menangani kesalahan jika terjadi
                }
            });
        });
    });
</script>