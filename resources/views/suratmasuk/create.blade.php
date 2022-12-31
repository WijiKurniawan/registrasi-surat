@extends('master')

@section('title', 'Buat Surat Masuk')

@section('content')
    <form action="{{ route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1">Pengirim</label>
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
                <label>Tanggal surat :</label>

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
            <label for="" id="disposisi-ksop">Disposisi KSOP</label>
            <div class="form-check">
                <input type="checkbox" name="" id="" class="form-check-input">
                <label for="" class="form-check-label">KASIE LALA DAN USAHA KEPELABUHAN</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="" id="" class="form-check-input">
                <label for="" class="form-check-label">KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN PATROLI</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="" id="" class="form-check-input">
                <label for="" class="form-check-label">KASUB BAG. TATA USAHA</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="" id="" class="form-check-input">
                <label for="" class="form-check-label">KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI
                    KAPAL</label>
            </div>

        </div>
        <div class="row">

            <div class="class col-sm-6">
                <div class="form-group">
                    <label for="" id="perintah">Perintah</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Aksi Sesuai dengan ketentuan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Segera di proses</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Menghadap ke saya</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Dibahas Bersama</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Dibuatkan konsep/dijawab</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Koordinasi dengan yang terkait</label>
                    </div>
                </div>
            </div>
            <div class="class col-sm-6">
                <div class="form-group">
                    <label for=""></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Segera disampaikan ke ybs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Dilaporkan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Untuk menjadi perhatian</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Untuk diketahui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Pengawasan</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Catatan Pak KSOP</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>
        <div class="form-group">
            <label>Catatan Kasie/kasub.bag</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>
        <div class="form-group">
            <label for="dokumen">Upload file surat</label>
            <input type="file" name="dokumen" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
