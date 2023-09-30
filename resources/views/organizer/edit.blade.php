@section('title', 'Aparatur')

@extends('layouts.main')

@section('content')
<div id="app-content">

    <div class="app-content-area">
        <div class="container-fluid">

            <div id="basicForm" class="mb-4">
                <h2 class="h3 mb-1">Edit Aparatur Desa</h2>
            </div>
            <!-- Card -->
            <div class="mb-6 ">
                <div class="card">
                    <!-- Tab content -->
                    <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                        <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                            role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">

                            <form action="{{ route('organizer.update', $organizer->id)}}" method="POST"
                                enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <label for="organizer_name" class="form-label">Nama Lengkap</label>
                                    <div class="input-group has-validation">
                                        <input type="text"
                                            class="form-control @error('organizer_name') is-invalid @enderror"
                                            id="organizer_name" name="organizer_name"
                                            aria-describedby="inputGroupPrepend"
                                            value="{{ old('organizer_name', $organizer->organizer_name) }}" required>
                                        @error('organizer_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="organizer_position" class="form-label">Jabatan</label>
                                    <input type="text"
                                        class="form-control @error('organizer_position') is-invalid @enderror"
                                        id="organizer_position" name="organizer_position"
                                        value="{{ old('organizer_position', $organizer->organizer_position) }}"
                                        required>
                                    @error('organizer_position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="organizer_img" class="form-label">Foto</label>
                                    <div class="input-group has-validation">
                                        <input type="file"
                                            class="form-control @error('organizer_img') is-invalid @enderror"
                                            id="organizer_img" name="organizer_img" onchange="imgPreview()"
                                            aria-describedby="organizer_img" required>
                                        @error('organizer_img')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                @if ($organizer->organizer_img)
                                <div class="col-md-6">
                                    <img class="img-fluid mt-2 img-preview" width="100px"
                                        src="{{ asset('storage/' . $organizer->organizer_img)}}" alt="">
                                </div>
                                @else
                                <div class="col-md-6">
                                    <img class="img-fluid mt-2 img-preview" width="100px" src="" alt="">
                                </div>
                                @endif

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Edit Aparatur</button>
                                </div>
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
<script>
    function imgPreview() {
        const imgPreview = document.querySelector('.img-preview');
        const file = document.querySelector('#organizer_img').files[0];
        // console.log(file);
        const reader = new FileReader();

        reader.addEventListener("load", () => {
            imgPreview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush