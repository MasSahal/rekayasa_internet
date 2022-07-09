<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Event</h5>
                <button type="button" class="close btn-transparent" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../proses/event_proses.php?mod=insert" method="post" class="formtambah" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="modal-body">
                    <p class="error"></p>
                    <div class="form-group row">
                        <label for="nama_event" class="col-sm-4 col-form-label">Nama Event</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_event" id="nama_event" placeholder="Masukan nama event" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_event" class="col-sm-4 col-form-label">Tanggal Event</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="tanggal_event" id="tanggal_event" placeholder="Masukan tanggal event" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam_awal" class="col-sm-4 col-form-label">Waktu Event</label>
                        <div class="col-sm-4">
                            <label for="jam_awal">Jam Mulai</label>
                            <input type="time" class="form-control" name="jam_awal" id="jam_awal" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="jam_akhir">Jam Selesai</label>
                            <input type="time" class="form-control" name="jam_akhir" id="jam_akhir" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lokasi_event" class="col-sm-4 col-form-label">Lokasi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="lokasi_event" id="lokasi_event" placeholder="Masukan lokasi e.g: Cirebon" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="banner_event" class="col-sm-4 col-form-label">Foto Banner Event</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="banner_event" id="banner_event" onchange="bacaimg(this)" required>
                            <small>Ukuran disarankan 450px x 850px</small>
                            <div id="res"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="detail_event" class="col-sm-4 col-form-label">Detail Event</label>
                        <div class="col-sm-8">
                            <textarea name="detail_event" id="detail_event" rows="3" class="form-control" required placeholder="Masukan detail event"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gmap_event" class="col-sm-4 col-form-label">Google Map</label>
                        <div class="col-sm-8">
                            <textarea name="gmap_event" id="gmap_event" rows="3" class="form-control" placeholder="Masukan lokasi"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm btnsimpan">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btnsimpan').click(function(e) {
            e.preventDefault();
            let form = $('.formtambah')[0];
            let data = new FormData(form);
            $.ajax({
                type: "post",
                url: '../proses/event_proses.php?mod=insert',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disable');
                    $('.btnsimpan').html('<span class="spinner-border spinner-grow-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable', 'disable');
                    $('.btnsimpan').html('<i class="mdi mdi-content-save-all"></i> Simpan');
                },
                success: function(response) {
                    if (response.status == "error") {
                        $('.error').html('<span class="text-danger">&bull; ' + response.message + '</span>');
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#modaltambah').modal('hide');
                        listdata();
                    }
                },
                error: function(xhr, ajaxOptions, thrownerror) {
                    Swal.fire({
                        title: "Maaf gagal proses data!",
                        html: `Silahkan Cek kembali Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
                        icon: "error",
                        showConfirmButton: false,
                        timer: 3100
                    })

                }
            });
        })
    });
</script>