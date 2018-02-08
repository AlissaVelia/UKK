  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">

                    <h1 class="page-header"><span class="fa fa-envelope"></span> Ubah Surat Masuk</h1>

                </div>
<?php 
                    $notif = $this->session->flashdata('notif');
                    if($notif != NULL){
                        echo '
                            <div class="alert alert-info">'.$notif.'</div>
                        ';
                    }
                ?><!-- 
                <?php echo base_url();?>index.php/surat_masuk/tambah_v_disposisi/<?php echo $this->uri->segment(3);?> -->
            <form action="<?php echo base_url();?>index.php/dashboard_lain/tambah_v_disposisi_keluar/<?php echo $this->uri->segment(3);?>" method="post">
                    <div class="modal-header">
                        <h4 class="title"></h4>
                    </div>
                       <div class="body">
                        <div class="form-group">
                            <label>Tujuan Unit</label>
                            //  ketika pilihan berubah maka menjalankan script get_pegawai_by_
                            <select class="form-control" name="tujuan_unit" onchange="get_pegawai_by_jabatan(this.value)">
                                <option value="">-- Pilih Tujuan Unit --</option>
                                <?php
                                    foreach ($drop_down_jabatan as $jabatan) {
                                        if($jabatan->id_jabatan != $this->session->userdata('id_jabatan') && $jabatan->id_jabatan > $this->session->userdata('id_jabatan')){
                                            echo '
                                                <option value="'.$jabatan->id_jabatan.'">'.$jabatan->nama_jabatan.'</option>
                                            ';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tujuan Pegawai</label>
                            <select class="form-control" name="tujuan_pegawai" id="tujuan_pegawai">
                                <option value="">-- Pilih Nama Pegawai --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="10"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
        
 <script type="text/javascript">

        function get_pegawai_by_jabatan(id_jabatan)
        {

            // empty - untuk hapus di tujuan pegawai biar 
            $('#tujuan_pegawai').empty();
            // append untuk nambah di tujuan pegawai

            //<option value="'+value.id_pegawai+'">'+value.nama+'</option> ini dari controller get_pegawai
            //+id_jabatan adalah parameter
            $.getJSON('<?php echo base_url(); ?>index.php/surat_masuk/get_pegawai_by_jabatan/'+id_jabatan, function(data){
                $.each(data, function(index,value){
                    $('#tujuan_pegawai').append('<option value="'+value.id_pegawai+'">'+value.nama+'</option>');
                })
            });
        }
    </script>