@extends('admin.layout.admin_layouts')
@section('sec_halaman', 'HALAMAN TAMBAH BERITA')

@section('content_admin')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="card p-3">
                <h5 class="text-center mb-4">FORM UPLOAD BERITA</h5>
                <form method="POST" action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis' }}/tambah_data_berita" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="kategori" class="col-md-4 col-form-label text-md-end">{{ __('Kategori') }}</label>

                        <div class="col-md-8">
                            <select class="form-select" aria-label="Default select example" autofocus name="kategori"
                            id="kategori" required>
                            <option value="">  --  Select Kategori  --  </option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}">{{ $kat->kategori }}</option>
                            @endforeach
                            </select>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Type Upload') }}</label>

                        <div class="col-md-8">
                            <select class="form-select" aria-label="Default select example" autofocus name="type"
                            id="type" required>
                            <option value="">  --  Select Type  --  </option>
                            <option value="foto">foto</option>
                            <option value="vidio">Vidio</option>
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Gambar / Video') }}</label>

                        <div class="col-md-8">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image[]" multiple required>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="judul_berita" class="col-md-4 col-form-label text-md-end">{{ __('Judul Berita') }}</label>

                        <div class="col-md-8">
                            <input id="judul_berita" type="text" class="form-control @error('judul_berita') is-invalid @enderror"
                                name="judul" value="" autocomplete="judul_berita" autofocus required>

                            @error('judul_berita')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="isi" class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi Berita') }}</label>

                        <div class="col-md-8">
                            @error('isi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input id="isi" value="" type="hidden" name="isi">
                            <trix-editor input="isi"></trix-editor>

                            {{-- <textarea id="message" name = "isi" rows="10" cols="50" 
                            onKeyPress class="form-control" required>
                            </textarea> --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="waktu_publish" class="col-md-4 col-form-label text-md-end">{{ __('Waktu Publish') }}</label>

                        <div class="col-md-8">
                            <input id="waktu_publish" type="datetime-local" class="form-control @error('waktu_publish') is-invalid @enderror"
                                name="waktu_publish" value="" autocomplete="waktu_publish" autofocus required>

                            @error('waktu_publish')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keterangan" class="col-md-4 col-form-label text-md-end">{{ __('Keterangan') }}</label>

                        <div class="col-md-8">
                            <select class="form-select" aria-label="Default select example" autofocus name="keterangan"
                                id="keterangan">
                                <option selected value="publish">Publish</option>
                                <option value="pending">Pending</option>
                            </select>
                            @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_publisher" class="col-md-4 col-form-label text-md-end">{{ __('Nama Publisher') }}</label>

                        <div class="col-md-8" >
                            <input id="nama_publisher" type="text" class="form-control @error('nama_publisher') is-invalid @enderror"
                                name="nama_publisher" value="{{ Auth::user()->name }}" autocomplete="nama_publisher" autofocus required disabled>

                            @error('nama_publisher')
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
@endsection