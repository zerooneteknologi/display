@include('display.start')

<section>
    {{-- header --}}
    <nav class="navbar mb-4 py-3 bg-dark text-light shadow">
        <img src="{{ asset('assets/images/pemda-garut.png') }}" class="" width="100px" alt="">
        <div class="container text-center text-uppercase d-block">
            <div class="h4">pemerintahan kabupaten garut</div>
            <div class="h4">kecamatan leles</div>
            <div class="h3">desa salamnunggal</div>
            <div class="text-capitalize fst-italic">alamat : jalan inpres no. 16 leles garut 44152</div>
        </div>
    </nav>

    {{-- media & staff --}}
    <section class="mt-3">
        <div class="row mx-auto">
            <div class="col-9" style="height: 800px">
                <div id="media" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($galleries as $key => $gallery)
                            @if ($gallery->gallery_type == 'video')
                                <div id="dur{{ $key }}" class="carousel-item {{ $key == 0 ? 'active' : '' }}"
                                    data-bs-interval="{{ $key == 0 ? '1104000' : '' }}">
                                    <video id="video{{ $key }}" autoplay class="d-block w-100">
                                        <source src="{{ asset('storage/' . $gallery->gallery_path) }}" type="video/mp4">
                                    </video>
                                </div>
                            @elseif($gallery->gallery_type == 'image')
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $gallery->gallery_path) }}"
                                        class="d-block w-100 img-fluid" data-bs-interval="5000">
                                </div>
                            @else
                                <div
                                    class="carousel-item
                                        {{ $key == 0 ? 'active' : '' }}">
                                    <iframe src="https://www.youtube.com/embed/{{ $gallery->gallery_path }}"
                                        width="100%" height="800vh"></iframe>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- aparat --}}
            </div>
            <div class="col-3">
                <div class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($organizers as $key => $organizer)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="card text-center">
                                    <div class="card-header bg-info text-center fs-3 fw-bold">
                                        Aparatur Desa
                                    </div>
                                    <div class="card-body text-capitalize fs-3">
                                        <img src="{{ asset('storage/' . $organizer->organizer_img) }}"
                                            class="d-block w-100 img-fluid">
                                        <div class="card-title mt-3"><strong>{{ $organizer->organizer_name }}</strong>
                                            |
                                            {{ $organizer->organizer_position }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="jam-digital">
                            <div id="jam"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- news --}}
    <nav class="fixed-bottom bg-body-tertiary mt-3">
        <div class="container-fluid fw-bold">
            <div class="row fs-4">
                <div class="col-2 h-1 text-center text-uppercase bg-warning">
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

</section>
@include('display.end')
