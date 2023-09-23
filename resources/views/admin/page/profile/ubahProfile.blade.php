@extends('admin.layout.admin_layouts')
@section('sec_halaman', 'PROFILE')

@section('content_admin')
<div class="row justify-content-center">
    <div class="col-lg-4 text-center">
        <div class="card p-3 text-center py-3">
            <center><img src="{{ asset('/image/profile/default-img.png') }}" alt="Profile" class="rounded-circle img-thumbnail text-center mb-3" style="max-width: 200px"></center>
            <h3>{{ Auth::user()->name }}</h3>
            <p>{{ Auth::user()->level }}</p>
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="card p-3">
            <h5 class="text-center mb-4 pt-3">FORM UBAH PROFILE</h5>
            <form method="POST" action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis' }}/ubah_data_profile/{{ Auth::user()->id }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                    <div class="col-md-8">
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" value="{{ Auth::user()->name }} " autocomplete="nama">

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ Auth::user()->email }} " autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password_lama" class="col-md-4 col-form-label text-md-end">{{ __('Password Lama') }}</label>

                    <div class="col-md-8">
                        <input id="password_lama" type="hidden" class="form-control @error('password_lama') is-invalid @enderror"
                            name="password_lama" value="{{ Auth::user()->password }} " autocomplete="password_lama">
                        <input id="password_lama" type="password" class="form-control @error('password_lama') is-invalid @enderror"
                            name="password_lama" value="" autocomplete="password_lama">

                        @error('password_lama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password_baru" class="col-md-4 col-form-label text-md-end">{{ __('Password Baru') }}</label>

                    <div class="col-md-8">
                        <input id="password_baru" type="hidden" class="form-control @error('password_baru') is-invalid @enderror"
                            name="password_baru" value="{{ Auth::user()->password }} " autocomplete="password_baru">
                        <input id="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror"
                            name="password_baru" value="" autocomplete="password_baru">

                        @error('password_baru')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col text-end">
                        <a href="{{ URL::previous() }}" class="btn btn-danger">Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan Perubahan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
