@include('display.start')

<section>
    {{-- header --}}
    <nav class="navbar mb-2 pt-2 bg-dark text-light shadow">
        <img src="{{ asset('assets/images/pemda-garut.png') }}" width="70px" alt="">
        <div class="container text-center text-uppercase d-block" style="line-height: 10pt">
            <div class="h6">pemerintahan kabupaten garut</div>
            <div class="h6">kecamatan leles</div>
            <div class="h6">desa salamnunggal</div>
            <div class="text-capitalize fst-italic">alamat : jalan inpres no. 16 leles garut 44152</div>
        </div>
    </nav>

    {{-- media & staff --}}
    <section>
        <div class="row mx-auto">
            <div class="col-9">
                <div id="videoCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" style="max-height:380px; min-height: 380px">
                        @foreach ($galleries as $key => $gallery)
                        @if ($gallery->gallery_type == 'video')
                        <div class="video carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <video class="d-block w-100 rounded" {{ $key==0 ? 'autoplay' : '' }}>
                                <source src="{{ asset('storage/' . $gallery->gallery_path) }}" type="video/mp4">
                            </video>
                        </div>
                        @elseif($gallery->gallery_type == 'image')
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $gallery->gallery_path) }}"
                                class="d-block rounded img-fluid mx-auto my-auto">
                        </div>
                        {{-- @else
                        <div class="carousel-item
                                        {{ $key == 0 ? 'active' : '' }}">
                            <iframe allow="autoplay; encrypted-media" class="rounded"
                                src="https://www.youtube.com/embed/{{ $gallery->gallery_path }}" width="100%"
                                height="800vh"></iframe>
                        </div> --}}
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- aparat --}}
            <div class="col-3">
                <div class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($organizers as $key => $organizer)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="card text-center">
                                <div class="card-header bg-info text-center fs-6 fw-bold">
                                    Aparatur Desa
                                </div>
                                <div class="card-body text-capitalize fs-3">
                                    <img class="d-block w-80 overflow-hidden mx-auto"
                                        src="{{ asset('storage/' . $organizer->organizer_img) }}"
                                        style="max-height: 195px">
                                    <div class="card-title mt-3">
                                        <div class="fs-6 fw-bold">{{ $organizer->organizer_name }}</div>
                                        <div class="fs-6 fw-bold">{{ $organizer->organizer_position }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col mt-2 jam-digital">
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
            <div class="row fs-6">
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