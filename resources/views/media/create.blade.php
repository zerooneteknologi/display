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

                            <form id="upload" action="{{ route('gallery.store')}}" method="POST"
                                enctype="multipart/form-data" class="row">
                                @csrf
                                <div class="col-md-5">
                                    <input type="hidden" id="fileName" name="file_name">
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
                                    <!-- Select Option -->
                                    <div class="mb-3">
                                        <label class="form-label" for="gallery_type">Pilih Type</label>
                                        <select name="gallery_type" id="gallery_type" class="form-select"
                                            aria-label="Default select example" required>
                                            <option value="">Pilih tipe galeri</option>
                                            <option value="image">Gambar</option>
                                            <option value="video">Video</option>
                                            <option value="link">Link</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- file -->
                                <div class="mb-3 gallery_path">
                                    <label for="gallery_path" class="form-label">File</label>
                                    <div class="input-group has-validation">
                                        <input type="file" onchange="imgPreview()"
                                            class="form-control @error('gallery_path') is-invalid @enderror"
                                            id="gallery_path" name="gallery_path" aria-describedby="gallery_path"
                                            required disabled>
                                        @error('gallery_path')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- link -->
                                <div class="mb-3 link ">
                                    <label class="form-label" for="link">Link</label>
                                    <input name="link" type="text" id="link" class="form-control"
                                        placeholder="Input Text" disabled required>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Tambah Aparatur</button>
                                </div>

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

@include('media.js')