
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="fa fa-mail-forward"></span> Disposisi Surat</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                      <?php
                    $notif = $this->session->flashdata('notif');
                    if($notif != NULL){
                        echo '
                            <div class="alert alert-info">'.$notif.'</div>
                        ';
                    }
                ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add"><span class="fa fa-plus"></span> Tambah Disposisi</a> No. Surat : <?php echo $data_surat->nomor_surat; ?>

                            <a href="<?php echo base_url();?>index.php/surat_masuk/v_disposisi/<?php echo $data_surat->id_surat;?>" class="btn btn-success btn-sm" ><span class="fa fa-plus"></span> Tambah Disposisi VIEW</a>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>PENGIRIM</th>
                                        <th>TUJUAN UNIT</th>
                                        <th>TGL.DISPOSISI</th>
                                        <th>KETERANGAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1;?>
                                <?php foreach($data_disposisi as $row):?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><?php echo $row->nama_jabatan?></td>
                                        <td><?php echo $row->nama?></td>
                                        <td><?php echo $row->tgl_disposisi?></td>
                                        <td><?php echo $row->keterangan?></td>
                                        <td>
                                            <a href="<?php echo base_url();?>assets/uploads/<?php echo $row->file_surat ?>" class="btn btn-info btn-sm btn-block" target="_blank">Lihat Surat</a>
                                            <!-- Button ubah dan hapus hanya aktif bagi user yang membuat disposisi -->
                                           
                                            <a href="<?php echo base_url();?>index.php/surat_masuk/hapus_disposisi/<?php echo $this->uri->segment(3)?>/<?php echo $row->id_disposisi;?>" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Apakah anda yakin menghapus disposisi surat ? ')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++?>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!--  MODAL tambah surat -->
 <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url('index.php/surat_masuk/tambah_disposisi/'.$this->uri->segment(3)) ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Tambah Disposisi Surat</h4>
                    </div>
                    <div class="modal-body">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script type="text/javascript">

        function get_pegawai_by_jabatan(id_jabatan)
        {

            // empty - untuk hapus
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