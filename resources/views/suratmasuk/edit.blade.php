@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Disposisi Surat</b>
        </div>
        <div class="card-body">
            <?php $jabatan = Auth::user()->jabatan; ?>
            <form action="{{ url('suratmasuk/update/' . $suratmasuk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
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
                    <input type="text" class="form-control" id="nomor_surat_masuk" name="nomor_surat_masuk"
                        @if ($jabatan != 'ARSIPARIS') readonly @endif value="{{ $suratmasuk->nomor_surat_masuk }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pengirim</label>
                    <input type="text" class="form-control" id="penerima-masuk"
                        name="pengirim_masuk"@if ($jabatan != 'ARSIPARIS') readonly @endif
                        value="{{ $suratmasuk->pengirim_masuk }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputtext1">Agenda</label>
                    <input type="text" class="form-control" id="agenda-masuk"
                        name="agenda_masuk"@if ($jabatan != 'ARSIPARIS') readonly @endif
                        value="{{ $suratmasuk->agenda_masuk }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputtext1">Perihal</label>
                    <input type="text" class="form-control" id="perihal-masuk"
                        name="perihal_masuk"@if ($jabatan != 'ARSIPARIS') readonly @endif
                        value="{{ $suratmasuk->perihal_masuk }}">
                </div>
                <div class="form-group" style="padding-right: 980px">
                    <label for="exampleInputtext1">Tanggal Surat</label>
                    <input type="date" class="form-control" id="tgl-surat-masuk"
                        name="tgl_surat_masuk"@if ($jabatan != 'ARSIPARIS') readonly @endif
                        value="{{ $suratmasuk->tgl_surat_masuk }}">
                </div>

                @if ($jabatan == 'KASUB BAG. TATA USAHA')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"
                            value="Proses Disposisi">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Lanjut Disposisi
                        </label>
                    </div>
                @endif

                @if ($jabatan == 'KEPALA KSOP')
                    <div class="form-group">
                        <label for="" id="disposisi-ksop">Disposisi KSOP</label>
                        <div class="form-check">
                            <input type="checkbox" name="disposisi[]" value="KASIE LALA DAN USAHA KEPELABUHAN"
                                id="" class="form-check-input">
                            <label for="" class="form-check-label">KASIE LALA DAN USAHA KEPELABUHAN</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="disposisi[]"
                                value="KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN PATROLI" id=""
                                class="form-check-input">
                            <label for="" class="form-check-label">KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN
                                PATROLI</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="disposisi[]" value="KASUB BAG. TATA USAHA" id=""
                                class="form-check-input">
                            <label for="" class="form-check-label">KASUB BAG. TATA USAHA</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="disposisi[]" value="KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI KAPAL"
                                id="" class="form-check-input">
                            <label for="" class="form-check-label">KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI
                                KAPAL</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="class col-sm-6">
                            <div class="form-group">
                                <label for="" id="perintah">Perintah</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Aksi Sesuai dengan ketentuan">
                                    <label class="form-check-label">Aksi Sesuai dengan ketentuan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Segera di proses">
                                    <label class="form-check-label">Segera di proses</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Menghadap ke saya">
                                    <label class="form-check-label">Menghadap ke saya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Dibahas Bersama">
                                    <label class="form-check-label">Dibahas Bersama</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Dibuatkan konsep/dijawab">
                                    <label class="form-check-label">Dibuatkan konsep/dijawab</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Koordinasi dengan yang terkait">
                                    <label class="form-check-label">Koordinasi dengan yang terkait</label>
                                </div>
                            </div>
                        </div>
                        <div class="class col-sm-6">
                            <div class="form-group">
                                <label for=""></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Segera disampaikan ke ybs">
                                    <label class="form-check-label">Segera disampaikan ke ybs</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Dilaporkan">
                                    <label class="form-check-label">Dilaporkan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Untuk menjadi perhatian">
                                    <label class="form-check-label">Untuk menjadi perhatian</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Untuk diketahui">
                                    <label class="form-check-label">Untuk diketahui</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perintah[]"
                                        value="Pengawasan">
                                    <label class="form-check-label">Pengawasan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Catatan Kepala KSOP</label>
                        <textarea name="catatan_KSOP" class="form-control" rows="3" placeholder="Enter ..."
                            @if ($jabatan != 'KEPALA KSOP') readonly @endif></textarea>
                        <input type="text" class="form-control" name="status" hidden value="Sudah Disposisi">
                    </div>
                @endif
                {{-- @if ($jabatan != 'ARSIPARIS')
                @if ($jabatan != 'KEPALA KSOP') --}}
                @if ($jabatan != 'KASUB BAG. TATA USAHA' && $jabatan != 'KEPALA KSOP' && $jabatan != 'ARSIPARIS')
                    <div class="form-group">
                        <label>Catatan Kasie/Kasub. Bag</label>
                        <textarea name="catatan" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                @endif
                {{-- @endif
                @endif --}}
                <div class="d-flex justify-content-end">
                    @if ($jabatan == 'ARSIPARIS')
                        <button type="submit" class="btn btn-warning" style="width: 150px"><i class="fas fa-edit"></i>
                            Edit Surat</button>
                    @else
                        <button type="submit" class="btn btn-primary" style="width: 150px"><i
                                class="fas fa-share-square"></i>
                            Kirim Surat</button>
                    @endif
                </div>
            </form>
        </div>
    </div>


@endsection
