@extends('master')

@section('title', 'Buat Surat Keluar')

@section('content')
    <form action="{{ route('suratkeluar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="exampleInputEmail1">Nomor surat</label>
            <input type="text" class="form-control" id="nomor-keluar" placeholder="" name="nomor_surat" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Penerima</label>
            <input type="text" class="form-control" id="penerima-keluar" placeholder="" required name="penerima">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Agenda</label>
            <input type="text" class="form-control" id="agenda-keluar" placeholder="" required name="agenda">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Perihal</label>
            <input type="text" class="form-control" id="perihal-keluar" placeholder="" required name="perihal">
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Bergabung :</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control" data-inputmask-inputformat="yy/mm/dd" data-mask required
                        name="tgl_surat">
                </div>
                <!-- /.input group -->
            </div>
        </div>


        <div class="form-group">
            <label for="dokumen">Upload file surat</label>
            <input type="file" name="dokumen" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
