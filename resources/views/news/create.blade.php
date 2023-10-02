@section('title', 'Berita')

@extends('layouts.main')

@section('content')
<div id="app-content">

    <div class="app-content-area">
        <div class="container-fluid">

            <div id="basicForm" class="mb-4">
                <h2 class="h3 mb-1">Tambah Berita</h2>
            </div>
            <!-- Card -->

            <div class="mb-6 ">
                <div class="card">
                    <!-- Tab content -->
                    <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                        <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                            role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">

                            <form action="{{ route('news.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="news_title" class="form-label">Judul</label>
                                <div class="input-group has-validation mb-3">
                                    <input type="text" class="form-control @error('news_title') is-invalid @enderror"
                                        id="news_title" name="news_title" aria-describedby="inputGroupPrepend"
                                        value="{{ old('news_title') }}" required>
                                    @error('news_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label for="news_description" class="form-label">Deskripsi</label>
                                <div class="input-group has-validation mb-3">
                                    <textarea class="form-control @error('news_description') is-invalid @enderror"
                                        id="news_description" name="news_description" required
                                        rows="5">{{ old('news_description')}}</textarea>
                                    @error('news_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Tambah Aparatur</button>
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