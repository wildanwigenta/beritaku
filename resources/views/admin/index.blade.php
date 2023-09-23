@extends('admin.layout.admin_layouts')
@section('sec_halaman', 'DASHBOARD ADMIN')
    
@section('content_admin')
<div class="row">
    <div class="col-lg-10">
        <div class="row">
            <!-- Berita Terkini Card -->
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Berita Terkini</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-stopwatch"></i>
                            </div>
                            <div class="ps-3">
                                <h6>322</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Berita Terkini Card -->
            <!-- Berita Populer Card -->
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Berita Populer</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-newspaper"></i>
                            </div>
                            <div class="ps-3">
                                <h6>322</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Berita Populer Card -->
            <!-- Jurnalis Card -->
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Jurnalis</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-person-fill-gear"></i>
                            </div>
                            <div class="ps-3">
                                <h6>322</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Jurnalis Card -->
        </div>
    </div>
</div>
@endsection
