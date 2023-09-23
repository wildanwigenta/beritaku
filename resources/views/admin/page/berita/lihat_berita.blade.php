@extends('admin.layout.admin_layouts')
@section('sec_halaman', 'HALAMAN LIHAT BERITA')


@section('content_admin')
<div class="container">
<img src="{{ asset('image/berita/'.$berita->image) }}" width="100px" class="img-fluid" alt="...">

<p class="text-justify">{!! $berita->isi !!}</p>
</div>
<div class="row mb-3">
    <div class="col text-end">
        <a href="{{ URL::previous() }}" class="btn btn-danger">Kembali</a>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#tabelku').dataTable();
    });

</script>
@endsection
