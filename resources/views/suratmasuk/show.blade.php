<div class="modal fade" id="modalMasuk-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Detail surat</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <label>Nomor Surat Masuk</label>
                    </div>
                    <div class="col-8">
                        {{ $item->nomor_surat_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Pengirim</label>
                    </div>
                    <div class="col-8">
                        {{ $item->pengirim_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Agenda</label>
                    </div>
                    <div class="col-8">
                        {{ $item->agenda_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Perihal</label>
                    </div>
                    <div class="col-8">
                        {{ $item->perihal_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Tanggal Surat Masuk</label>
                    </div>
                    <div class="col-8">
                        {{ $item->tgl_surat_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Disposisi</label>
                    </div>
                    <div class="col-8">
                        {{ $item->disposisi }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Perintah</label>
                    </div>
                    <div class="col-8">
                        {{ $item->perintah }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Catatan KSOP</label>
                    </div>
                    <div class="col-8">
                        {{ $item->catatan_KSOP }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Catatan Kasie/Kasub. Bag.</label>
                    </div>
                    <div class="col-8">
                        {{ $item->catatan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Dokumen Masuk</label>
                    </div>
                    <div class="col-8">
                        <a href="{{ asset('/dokumen/suratmasuk/' . $item->dokumen_masuk) }}"
                            target="_blank">{{ $item->dokumen_masuk }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Status</label>
                    </div>
                    <div class="col-8">
                        @if ($item->status == 'Menunggu Tindakan')
                            <span class="badge bg-warning"> {{ $item->status }}</span>
                        @elseif($item->status == 'Sudah Disposisi')
                            <span class="badge bg-success"> {{ $item->status }}</span>
                        @elseif($item->status == 'Proses Disposisi')
                            <span class="badge bg-info"> {{ $item->status }}</span>
                        @elseif($item->status == 'Tidak DIsetujui')
                            <span class="badge bg-danger"> {{ $item->status }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <iframe src="{{ asset('/dokumen/suratmasuk/' . $item->dokumen_masuk) }}" id="myFrame" hidden>
                    </iframe> --}}
                    {{-- <button id="bt" onclick="print()"><i class="fas fa-print"></i></button>
                    <a onClick="window.print()" class="btn btn-primary"
                        href="{{ asset('/dokumen/suratmasuk/' . $item->dokumen_masuk) }}" target="_blank"><i
                            class="fas fa-print"></i></a> --}}
                    {{-- <button id="bt" onclick="print('{{ asset('/dokumen/suratmasuk/' . $item->dokumen_masuk) }}')" class="btn btn-primary"><i class="fas fa-print"></i></button> --}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // let print = () => {
    // 	let objFra = document.getElementById('myFrame');
    //     objFra.contentWindow.focus();
    //     objFra.contentWindow.print();
    // }

    // Using regular js features.

    // function print() {
    //     var objFra = document.getElementById('myFrame');
    //     objFra.contentWindow.focus();
    //     objFra.contentWindow.print();
    // }

    function print(e) {
        var objFra = document.createElement('iframe');
        objFra.style.visibility = 'hidden';
        objFra.src = e;
        document.body.appendChild(objFra);
        objFra.contentWindow.focus();
        objFra.contentWindow.print();
    }
</script>
