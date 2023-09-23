@extends('admin.layout.admin_layouts')
@section('sec_halaman', 'HALAMAN BERITA')

@section('content_admin')
<div class="row">
    <section class="section dashboard">
        <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis' }}/tambah_berita" class="btn btn-primary mb-3">Tambah Berita</a>
        <div class="table-responsive card p-3">
          <table class="table table-hover table-bordered" id="tabelku">
            <thead class="bg-primary text-white text-center">
              <tr class="text-center align-items-center">
                <th class="text-center">No</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Judul Berita</th>
                <th class="text-center">Deskripsi</th>
                <th class="text-center">Gambar / Video</th>
                <th class="text-center">Waktu Publish</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Dilihat</th>
                <th class="text-center">Nama Publisher</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($berita as $row)
              <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $row->kategori->kategori }}</td>
                <td>{{ $row->judul }}</td>
                <td>{!! $row->isi !!}</td>
                <td>
                  <div class="text-center">
                    <img src="{{ asset('image/berita/'.$row->image) }}" class="rounded mb-3" alt="..." style="max-width: 300px;max-height: 200px ;">
                  </div>
                </td>
                <td>
                  {{ $row->waktu_publish }}
                </td>
                <td>
                  @if($row->keterangan == 'publish')
                  <span class="badge text-bg-success">Published</span>
                  @else
                  <span class="badge text-bg-warning">Pending</span>
                  @endif
                </td>
                <td>
                  {{ $row->dilihat }}
                </td>
                <td>
                  {{ $row->nama_publisher }}
                </td>
                <td class="text-center">
                    <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis' }}/lihat_berita/{{ $row->id_berita }}" class="btn btn-warning btn-sm mb-3">Lihat</a>
                    <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis' }}/ubah_berita/{{ $row->id_berita }}" class="btn btn-info btn-sm mb-3">Ubah</a>
                    <button class="btn btn-danger btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $row->id_berita }}">Hapus</button>
                    <div class="modal fade" id="modalHapus{{ $row->id_berita }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah Ingin Menghapus Data ini ?</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
                                  <form action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis' }}/hapus_berita/{{ $row->id_berita }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" >Hapus</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section>

      
</div>

<script>
    $(document).ready(function () {
        $('#tabelku').dataTable();
    });
</script>
@endsection