@extends('Guest.Layouts.Index')
@section('Pages')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/machine.jpg') }}) center center no-repeat; background-size: cover;" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">{{ $title }}</h1>
    </div>
</div>
<div class=" my-5">
    <div class="container py-5">
    @if(count($achievements)>0)
        <div class="row">
            @foreach ($achievements as $achievement)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    @if ($achievement->image)
                    <img src="{{ asset($achievement->image) }}" class="card-img-top" alt="{{ $achievement->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $achievement->name }}</h5>
                        <p class="card-text text-center">{{ substr($achievement->detail, 0, 50) }}{{ strlen($achievement->detail) > 50 ? '...' : '' }}</p>
                        <div class="text-center">
                            <button class="btn btn-primary read-more" data-achievement-id="{{ $achievement->id }}" data-achievement-name="{{ $achievement->name }}" data-achievement-image="{{ asset($achievement->image) }}" data-bs-toggle="modal" data-bs-target="#achievementModal">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-4 text-black animated slideInDown mb-3">No Achievement Added Yet</h1>
            </div>
        </div>
        @endif
       <div class="row">
            <div class="col-md-12 text-center">
                {{ $achievements->links() }}
            </div>
        </div>
</div>

@endsection


<!-- modal for detail -->
<div class="modal fade" id="achievementModal" tabindex="-1" aria-labelledby="achievementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="achievementModalLabel">achievement Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="achievementDetailBody" style="width: 100%; overflow-y:auto; word-wrap:break-word;">

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.read-more').click(function() {
            var achievementId = $(this).data('achievement-id');
            var achievementName = $(this).data('achievement-name');
            var achievementImage = $(this).data('achievement-image');
            var modalBody = $('#achievementDetailBody');

            $.ajax({
                url: '/achievements/' + achievementId,
                type: 'GET',
                success: function(response) {
                    modalBody.html('<h5 class="card-title text-center">' + achievementName + '</h5><img src="' + achievementImage + '" class="img-fluid" alt="' + achievementName + '"><p></p></p><p class="card-title text-center"><strong>' + ' DETAILS : '+ '</strong></p><p class="card-title text-center">' + response.detail + '</p>');
                    console.log(response.detail);
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Menangani kesalahan jika terjadi
                }
            });
        });
    });
</script>