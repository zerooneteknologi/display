@include('display.start')

{{-- header --}}
<nav class="bg-dark text-light shadow">
    <div class="container py-3 text-center">
        <h2 class="text-uppercase">salamnunggal</h2>
        <div>Salamnunggal adalah desa di kecamatan Leles, Garut, Jawa Barat, Indonesia.</div>
        <div>Kontak : 02654687484</div>
    </div>
</nav>

{{-- media & staff --}}
<section class="mt-3">
    <div class="row mx-auto">
        <div class="col-9">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <iframe src="https://www.youtube.com/embed/JnWqhQ9OSBU?autoplay=1" class="w-100"
                            height="880"></iframe>
                    </div>
                    {{-- @foreach ($galleries as $gallerry)
                        <div class="carousel-item active">
                            <img src="{{ $gallerry->gallery_path }}" class="d-block w-100">
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($organizers as $organizer)
                        <div class="carousel-item active">
                            <div class="card">
                                <div class="card-header text-center">
                                    Perangkat Desa
                                </div>
                                <div class="card-body">
                                    <img src="{{ $organizer->organizer_img }}" class="d-block w-100">
                                    <h5 class="card-title mt-3">{{ $organizer->organizer_name }}</h5>
                                    <p class="card-text">{{ $organizer->organizer_position }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-10">
                <div class="col">
                    <div class="jam-digital">
                        <div id="jam" class="justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- news --}}
<nav class="fixed-bottom bg-body-tertiary">
    <div class="container-fluid">
        <div class="row fs-4">
            <div class="col-2 text-center text-uppercase bg-warning">
                Berita Terkini
            </div>
            <div class="col-10 bg-info">
                <marquee>
                    @foreach ($newses as $news)
                        {{ $news->news_description }}
                        <i class="bi bi-star-fill mx-3 text-warning"></i>
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</nav>

@include('display.end')
