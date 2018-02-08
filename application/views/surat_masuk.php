

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                  
                    <h1 class="page-header"><span class="fa fa-envelope"></span> Surat Masuk</h1>
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
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add"><span class="fa fa-plus"></span> Tambah Surat</a>

                            <a href="<?php echo base_url();?>index.php/dashboard/surat" class="btn btn-primary" ><span class="fa fa-plus"></span> Tambah Surat View</a>
                            

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NO.SURAT</th>
                                        <th>PENGIRIM</th>
                                        <th>TGL.KIRIM</th>
                                        <th>TGL.TERIMA</th>
                                        <th>PERIHAL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                        <?php $no = 1;?>
                        <?php foreach ($list as $row):?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><?php echo $row->nomor_surat?></td>
                                        <td><?php echo $row->pengirim?></td>
                                        <td><?php echo $row->tgl_kirim?></td>
                                        <td><?php echo $row->tgl_terima?></td>
                                        <td><?php echo $row->perihal?></td>
                                        <td>
                                            <a href="<?php echo base_url();?>assets/uploads/<?php echo $row->file_surat ?>" class="btn btn-info btn-sm" target="_blank">Lihat</a>
                                          <!--   <a href="<?php echo base_url();?>index.php/surat_masuk/ubah_file/<?php echo $row->id_surat; ?>" class="btn btn-info btn-sm" >file</a>
 -->
                                            <a href="<?php echo base_url();?>index.php/surat_masuk/lihat/<?php echo $row->id_surat?>" class="btn btn-warning btn-sm">Ubah</a>
                                          <!--   <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_ubah_surat" onclick="prepare_update_surat(<?php echo $row->id_surat ?>)">Ubah Surat</a> -->
                                            <a href="<?php echo base_url();?>index.php/surat_masuk/ubah_file/<?php echo $row->id_surat;?>" class="btn btn-success btn-sm">Ubah Surat</a>

                                            <a href="<?php echo base_url();?>index.php/surat_masuk/disposisi/<?php echo $row->id_surat?>" class="btn btn-primary btn-sm">Disposisi</a>

                                            <a href="<?php echo base_url();?>index.php/surat_masuk/hapus?del=<?php echo $row->id_surat?>"  onclick="return confirm('Are you sure want to delete this file?')" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>

                                    </tr>
                          <?php $no++; ?>
                        <?php endforeach; ?>
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
                <form action="<?php echo base_url();?>index.php/surat_masuk/tambah_surat_masuk" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Tambah Surat Masuk</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tgl.Kirim</label>
                            <input type="date" name="tgl_kirim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tgl.Terima</label>
                            <input type="date" name="tgl_terima" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" name="pengirim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Penerima</label>
                            <input type="text" name="penerima" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" name="perihal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Unggah Surat (*.pdf)</label>
                            <input type="file" name="file_surat" class="form-control">
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

    <!--  MODAL ubah surat -->
    <div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="modal_ubahLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_ubahLabel">Ubah Surat Masuk</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tgl.Kirim</label>
                            <input type="date" name="tgl_kirim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tgl.Terima</label>
                            <input type="date" name="tgl_terima" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" name="pengirim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Penerima</label>
                            <input type="text" name="penerima" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" name="perihal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Unggah Surat (*.pdf)</label>
                            <input type="file" name="file_surat" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!--  MODAL ubah file surat -->
    <div class="modal fade" id="modal_ubah_surat" tabindex="-1" role="dialog" aria-labelledby="modal_ubah_suratLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url();?>index.php/surat_masuk/ubah_file_surat_masuk" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_ubahsuratLabel">Ubah File Surat</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="edit_file_surat" id="edit_file_surat">
                        <div class="form-group">
                            <label>Unggah Surat (*.pdf)</label>
                            <input type="file" name="edit_file_surat" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <script type="text/javascript">
        function prepare_update_surat(id_surat)
        {
            $('#edit_file_surat').empty();

            $.getJSON('<?php echo base_url(); ?>index.php/surat_masuk/get_surat_masuk_by_id/' + id_surat, function(data){
                $('#edit_file_surat').val(data.id_surat);
            });
        }

    </script>
