@extends('Guest.Layouts.Index')

@section('Pages')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/machine.jpg') }}) center center no-repeat; background-size: cover;" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">{{ $title }}</h1>
    </div>
</div>

<div class="container">
    <!-- Konten visi -->
    <div class="card p-5">
        <h1 class="text-center">Visi</h1>
        <br/>
        <div class="text-center"> 
            @foreach ($visions as $vision)
            <div>{!! $vision->body !!}</div>
            @endforeach
        </div>
    </div>


    <!-- Konten misi -->
    <div class="card p-5 mt-5">
        <h1 class="text-center">Misi</h1>
        <br/>
        <ol>
            {{-- Loop through mision to display the body content --}}
            @foreach ($missions as $mission)
            <li>{!! $mission->body !!}</li>
            @endforeach
        </ol>
    </div>
</div>
<p></p>

@endsection