@extends('admin.layout.admin_layouts')
@section('sec_halaman', 'KELOLA JURNALIS')

@section('content_admin')
<div class="row">
    <section class="section dashboard">
        {{-- <a href="/ad/tambah_berita" class="btn btn-primary mb-3">Tambah Berita</a> --}}
        <div class="table-responsive card p-3">
          <table class="table table-hover table-bordered" id="tabelku">
            <thead class="bg-primary text-white text-center">
              <tr class="text-center align-items-center">
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($jurnalis as $row)
              <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td class="text-center">
                  <form action="/admin/confirm_status_jurnalis/{{ $row->id }}" method="post">
                    @csrf
                    <button class="btn btn-{{ $row->status == 'nonactive' ? 'primary' : 'secondary disabled'}}" onclick="" value="{{ $row->status }}" name="status" type="submit">
                      @if ($row->status == 'nonactive')
                          Aktifkan
                      @else
                          Aktif
                      @endif
                    </button>
                  </form>
                  <button class="btn btn-danger btn-sm mt-2 mb-3" data-bs-toggle="modal"
                    data-bs-target="#modalHapus{{ $row->id }}">Hapus</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section>
      <div class="modal fade" id="modalHapus{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah Ingin Menghapus Data ini ?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
                  <form action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis' }}/hapus_jurnalis/{{ $row->id }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" >Hapus</button>
                  </form>
              </div>
          </div>
      </div>
</div>

<script>
    $(document).ready(function () {
        $('#tabelku').dataTable();
    });
</script>
@endsection