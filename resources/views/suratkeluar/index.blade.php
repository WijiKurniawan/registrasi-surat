@extends('master')

@section('title', 'Surat Keluar')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="mb-3">
        <a type="button" class="btn btn-primary btn-sm" href="{{ url('/buatsuratkeluar') }}">Tambah</a>
        {{-- <a type="button" class="btn btn-primary btn-sm">Tambah</a> --}}

    </div>


    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-side">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="col-md">
        <table class="table " id="myTable">
            <thead class="thead-light">
                <th>No</th>
                <th>Nomor surat</th>
                <th>Penerima</th>
                <th>Agenda</th>
                <th>Perihal</th>
                <th>Tanggal Surat </th>
                <th> Waktu Masuk </th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($suratkeluar as $index => $item)
                    @include('suratkeluar.show')
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nomor_surat }}</td>
                        <td>{{ $item->penerima }}</td>
                        <td>{{ $item->agenda }}</td>
                        <td>{{ $item->perihal }}</td>
                        <td>{{ $item->tgl_surat }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="row-col-md-3">
                                <a type="button" class="btn btn-primary mx-1" data-toggle="modal"
                                    data-target="#exampleModal-{{ $item->id }}">
                                    Lihat
                                </a>

                                <a class="btn btn-warning m-1" href="{{ url('suratkeluar/' . $item->id . '/edit') }}">
                                    </i> Ubah
                                </a>
                                <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $item->id }}"
                                    data-toggle="modal" data-target="#deleteModal">Hapus</button>
                                <a class="btn btn-info m-1" href="{{ url('/download', $item->dokumen) }}" download>
                                    <i class="fas fa-download"></i> Unduh
                                </a>
                            </div>
                            {{-- <div class="row-col-md-3">
                            <a class="btn btn-danger m-1" href="" onclick="return confirm('Apakah anda yakin untuk menghapus arsip ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                              <a class="btn btn-info m-1" href="" download>
                                <i class="fas fa-download"></i> Unduh</a>
                        </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <form action="" method="post" id="formDelete">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mb-konfirmasi">
                        {{-- anda yakin ingin menghapus data program studi ini ? --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-light">Hapus</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        //generate alamat url untuk hapus data program sudi
        $('.btn-hapus').click(function() {
            let id = $(this).attr('data-id');
            $('#formDelete').attr('action', '/suratkeluar/' + id);
            // get value attribute data-nama-nama_prodi
            // let nama_prodi = $(this).attr('data-nama-prodi');
            // set text div id mb-konfirmasi
            $("#mb-konfirmasi").text("apakah anda yakin ingin menghapus data surat ini ?");
        })

        $('#formDelete [type="submit"]').click(function() {
            $('#formDelete').submit();
        })
    </script>
@endsection
@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
