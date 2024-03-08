<!-- <style>
    .wrapper-img-banner {
        max-width: 100%;
        max-height: 400px;

    }

    .img-banner {
        width: 100%;
    }
</style> -->

@extends('Guest.Layouts.Index')
@section('Pages')

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <!-- <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="wrapper-img-banner">
                <img src="/assets/img/machine.jpg" class="img-banner" alt="gambar">

            </div>

            <div class="container">
                <div class="carousel-caption text-start" style="color: white;">
                    <h1>PT SOHOU KIKAKU INDONESIA</h1>
                    <p>Discover Our Pinnacle Innovations in Manufacturing Excellence.</p>
                    <p><a class="btn btn-lg btn-primary" href="/about/">Learn more</a></p>
                </div>
            </div>

        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
    </div>

    <div class="container mt-5">
    <div class="row">
            <div class="col-md-5">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/assets/img/SKI.jpg" width="100%" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/cnc.jpg" width="100%" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/produksi.jpg" width="100%" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/machine2.jpg" width="100%" alt="">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
            <div class="col-md-7">
                <h2>Selamat Datang di PT SOHOU KIKAKU INDONESIA!</h2>
                <strong>PT. SOHOU KIKAKU INDONESIA</strong> adalah mitra terpercaya dalam menyediakan solusi yang tepat dan efisien untuk kebutuhan industri Anda.
                <p></p>
                <p>Kami adalah perusahaan yang berdedikasi di bidang Manufacturing Metal Products & Assembly.</p>
                <p>Sebagai pemimpin industri, kami bangga pada produksi berkualitas tinggi dan layanan unggul kami.</p>
                <p>Dengan komitmen kami terhadap inovasi dan keunggulan, kami telah membangun reputasi yang kuat di pasar.</p>
                
            </div>


        </div>

    </div>

    <div class="bg-secondary my-5">
    <div class="container py-5">
        <div class="text-white" style="text-align: center;">
            <h5>Learn About Us</h5>
            <p>Sebagai perusahaan yang berdedikasi pada Manufacturing Metal Products & Assembly, kami percaya bahwa transparansi dan keterbukaan merupakan kunci dalam membangun hubungan yang kuat dengan pelanggan dan mitra bisnis.</p>
            <p>Kunjungi kami dan temukan bagaimana PT SOHOU KIKAKU INDONESIA dapat menjadi mitra terpercaya Anda dalam memenuhi kebutuhan manufaktur metal dan perakitan. Hubungi kami untuk informasi lebih lanjut atau kerja sama potensial. Terima kasih atas kepercayaan Anda kepada kami.</p>
        </div>
        <div class="text-center mt-3">
            <a href="/about" class="btn btn-primary">More <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<div class="my-5">
<div class="container">
    <div class="text-center mb-5">
        <h4 class="">Services</h4>
    </div>

    <div class="row justify-content-center">
            @php $counter = 0; @endphp
            @foreach ($services as $service)
                @if ($counter < 4)
                    <div class="col-md-3">
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
                @endif
                @php $counter++; @endphp
            @endforeach
        </div>
        {{ $services->links() }} <!-- Pagination links -->
    </div>
    <div class="text-center mt-3">
    <a href="{{ route('guest.services') }}" class="btn btn-primary">More <i class="fas fa-arrow-right"></i></a>
    </div>
</div>
<div class="bg-secondary py-5">
    <div class="container">
        <div class="text-center">
            <h4 class="">Product</h4>
            <p style="color: white;"> Our Company Products</p>
        </div>

        <div class="row justify-content-center">
            @php $counter = 0; @endphp
            @foreach ($products as $product)
                @if ($counter < 4)
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-4">
                            @if ($product->image)
                                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $product->name }}</h5>
                                <p class="card-text text-center">{{ $product->detail }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @php $counter++; @endphp
            @endforeach
        </div>
        
        {{ $products->links() }} <!-- Pagination links -->
    </div>
    <div class="text-center mt-3">
    <a href="{{ route('guest.products') }}" class="btn btn-primary">More <i class="fas fa-arrow-right"></i></a>
</div>

</div>


<div class="container my-4">
    <div class="text-center">
        <h4 class="">Testimony</h4>
        <!-- <p>Client Testimony</p> -->
    </div>

    @if ($testimonies->isEmpty())
        <p class="text-center">No Testimony</p>
    @else
        <div class="row">
            @foreach ($testimonies as $testimony)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    @if ($testimony->image)
                    <img src="{{ asset($testimony->image) }}" class="card-img-top" alt="{{ $testimony->name }}">

                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $testimony->name }}</h5>
                        <p class="card-text text-center">{{ $testimony->message }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $testimonies->links() }} <!-- Pagination links -->
    @endif
</div>


@endsection