@extends('admin.layout.admin_layouts')
@if (Auth::user()->status == 'nonactive')
    @section('sec_halaman', 'KONFIRMASI PERSETUJUAN ADMIN')
@elseif(Auth::user()->status == 'active')
    @section('sec_halaman', 'DASHBOARD JURNALIS')
@endif
    
@section('content_admin')
<div class="row">
    <div class="col-lg-10">
        <div class="row">
            @if (Auth::user()->status == 'nonactive')
                <h5 class="text-center mt-3">
                    Harap tunggu, Admin segera mengkonfirmasi akun anda
                </h5>
            @elseif (Auth::user()->status == 'active' )
                <!-- Berita Saya Card -->
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Berita Saya</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-newspaper"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>12</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Berita Saya Card -->
            @endif
        </div>
    </div>
</div>
@endsection