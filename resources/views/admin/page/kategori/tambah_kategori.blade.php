@extends('admin.layout.admin_layouts')
@section('sec_halaman', 'HALAMAN TAMBAH KATEGORI')

@section('content_admin')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="card p-3">
            <h5 class="text-center mb-4">FORM TAMBAH KATEGORI</h5>
            <form method="POST" action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis' }}/tambah_data_kategori" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="kategori" class="col-md-4 col-form-label text-md-end">{{ __('Kategori Berita') }}</label>

                    <div class="col-md-8">
                        <input id="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror"
                            name="kategori" value="" autocomplete="kategori" autofocus required>

                        @error('kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col text-end">
                        <a href="{{ URL::previous() }}" class="btn btn-danger">Kembali</a>
                        <button class="btn btn-success" type="submit">Upload</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#tabelku').dataTable();
    });
</script>
@endsection