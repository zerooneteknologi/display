@section('title', 'Galeri')

@extends('layouts.main')

@section('content')
<div id="app-content">

    <div class="app-content-area">
        <div class="container-fluid">

            <div id="basicForm" class="mb-4">
                <h2 class="h3 mb-1">Tambah Galeri</h2>
            </div>
            <!-- Card -->
            <div class="mb-6 ">
                <div class="card">
                    <!-- Tab content -->
                    <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                        <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                            role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">

                            <form action="{{ route('gallery.store')}}" method="POST" enctype="multipart/form-data"
                                class="row">
                                @csrf
                                <div class="col-md-5">
                                    <label for="gallery_name" class="form-label">Nama</label>
                                    <div class="input-group has-validation">
                                        <input type="text"
                                            class="form-control @error('gallery_name') is-invalid @enderror"
                                            id="gallery_name" name="gallery_name" aria-describedby="inputGroupPrepend"
                                            value="{{ old('gallery_name') }}" required>
                                        @error('gallery_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <label for="gallery_path" class="form-label">File</label>
                                    <div class="input-group has-validation">
                                        <input type="file" onchange="imgPreview()"
                                            class="form-control @error('gallery_path') is-invalid @enderror"
                                            id="gallery_path" name="gallery_path" aria-describedby="gallery_path"
                                            required>
                                        @error('gallery_path')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Tambah Aparatur</button>
                                </div>

                                {{-- progress bar --}}
                                {{-- <div class="col-12 mt-3">
                                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-info">0%</div>
                                    </div>
                                </div> --}}
                                <!-- Modal -->
                                <div class="modal fade" id="uploadModal" tabindex="-1"
                                    aria-labelledby="uploadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content bg-transparent border-0">
                                            <div class="modal-body">
                                                <div class="progress" role="progressbar" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-info">0%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- preview --}}
                                <video id="videoPreview" controls class="img-fluid img-thumbnail d-none"></video>
                                <img id="imagePreview" src="" class="img-fluid img-thumbnail d-none">

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('script')
{{-- jquery form --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
</script>

<script>
    function imgPreview() {
        const file = document.querySelector('#gallery_path').files[0];
        const imgPreview = document.querySelector('#imagePreview');
        const videoPreview = document.querySelector('#videoPreview');
        imgPreview.classList.add('d-none')
        videoPreview.classList.add('d-none')

        if (file) {
            if (file.type.startsWith('video')) {
                videoPreview.classList.remove('d-none')
                const videoURL = URL.createObjectURL(file);
                videoPreview.src = videoURL;
            } else if (file.type.startsWith('image')) {
                imgPreview.classList.remove('d-none')
                const reader = new FileReader();
        
                reader.addEventListener("load", () => {
                    imgPreview.src = reader.result;
                }, false);
        
                if (file) {
                    reader.readAsDataURL(file);
                }
            } else {
                imgPreview.classList.add('d-none')
                videoPreview.classList.add('d-none')
                alert('Hanya file video dan gambar');
            }
        }

    }

    // progressbar
    var SITEURL = "{{URL('')}}";
    $(function() {
        $(document).ready(function() {

            var bar = $('.progress-bar')
            $('form').ajaxForm({
                beforeSend: function () {
                    var percenVal = '0%';
                    bar.width(percenVal);
                    bar.html(percenVal);
                },
                uploadProgress: function(event, position, total, percenComplite) {
                    $('#uploadModal').modal('show');
                    var percenVal = percenComplite + '%';
                    bar.width(percenVal);
                    bar.html(percenVal);
                },
                success: function (response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                }
            });
        })
    })
</script>
@endpush