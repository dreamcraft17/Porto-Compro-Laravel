@extends('Guest.Layouts.Index')
@section('Pages')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn"
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/logoPT.png') }}) center center no-repeat; background-size: cover;"
        data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">{{ $title }}</h1>
        </div>
    </div>

    <div class="container my-5 py-5">
        @if(count($structures) > 0)
            <div class="row d-flex justify-content-center">
                @foreach ($structures as $structure)
                    <div class="col-12 mb-4 text-center">
                        @if ($structure->image)
                            <img src="{{ asset($structure->image) }}" alt="{{ $structure->name }}"
                                 class="img-fluid" style="max-width: 60%;">

                                 
                        @endif
                    </div>
                    <div class="col-12 mb-4 text-center">
                        {{$structure->detail}}
                    </div>
                @endforeach
            </div>
        @else
            <div class="container text-center">
                <h1 class="display-4 text-black animated slideInDown mb-3">No structure Added Yet</h1>
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-12 text-center">
                {{ $structures->links() }}
            </div>
        </div>
    </div>
    
@endsection



<!-- modal for detail -->
<div class="modal fade" id="structureModal" tabindex="-1" aria-labelledby="structureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="structureModalLabel">structure Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="structureDetailBody" style="width: 100%; overflow-y:auto; word-wrap:break-word;">

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.read-more').click(function() {
            var structureId = $(this).data('structure-id');
            var structureName = $(this).data('structure-name');
            var structureImage = $(this).data('structure-image');
            var modalBody = $('#structureDetailBody');

            $.ajax({
                url: '/structures/' + structureId,
                type: 'GET',
                success: function(response) {
                    modalBody.html('<h5 class="card-title text-center">' + structureName + '</h5><img src="' + structureImage + '" class="img-fluid" alt="' + structureName + '"><p></p></p><p class="card-title text-center"><strong>' + ' DETAILS : '+ '</strong></p><p class="card-title text-center">' + response.detail + '</p>');
                    console.log(response.detail);
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Menangani kesalahan jika terjadi
                }
            });
        });
    });
</script>