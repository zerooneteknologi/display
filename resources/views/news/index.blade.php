@section('title', 'Berita')

@extends('layouts.main')

@section('content')
<div id="app-content">

    <div class="app-content-area">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="responsive-tables" class="mb-4 row">
                        <h2 class="h3 mb-1 col-sm-6">Daftar Aparatur Desa</h2>

                        <!-- Button Block -->
                        <div class="col-sm-6 d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('news.create') }}" class="btn btn-primary"><i data-feather="plus-square"
                                    class="me-3 icon-xxs"></i>
                                Tambah Aparatur</a>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card mb-10">
                        <!-- Content -->
                        <div class="tab-content p-4" id="pills-tabContent-responsive-tables">
                            <div class="tab-pane tab-example-design fade show active"
                                id="pills-responsive-tables-design" role="tabpanel"
                                aria-labelledby="pills-responsive-tables-design-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">No</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($newses as $news)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('news.edit', $news->id )}}"
                                                        class="badge rounded-pill bg-warning" data-bs-toggle="tooltip"
                                                        data-placement="top" title="Edit">
                                                        <i data-feather="edit-3"></i>
                                                    </a>
                                                    <form action="{{ route('news.destroy', $news->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit"
                                                            class="badge rounded-pill bg-danger border-0"
                                                            data-bs-toggle="tooltip" data-placement="top"
                                                            title="Hapus"><i data-feather="trash-2"
                                                                onclick="return confirm(`apakah yakin menghapus {{ $news->news_title }}?`)"></i></button>
                                                    </form>
                                                </td>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $news->news_title }}</td>
                                                <td>{{ $news->news_description }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- has session toats--}}
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast align-items-center toats-example text-white bg-success" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toast-body"></div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')
    const toastBody = document.getElementById('toast-body')
    console.log(toastBody);
    const span = `<span>{{ session('success') }}</span>`

    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    @if (session()->has('success'))
        $('.toast-body').html( `{{ session('success') }}` );
        toastBootstrap.show()
    @endif

</script>
@endpush