
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 <?php
                    $notif = $this->session->flashdata('notif');
                    if($notif != NULL){
                        echo '<p class="alert alert-info">'.$notif.'</p>';
                    }
                ?>
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
                                        <th>Disposisi</th>
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
                                        <td><label class="label label-success">Disposisi Masuk</label></td>
                                        <td>
                                            <a href="<?php echo base_url();?>/assets/uploads/<?php echo $row->file_surat;?>" class="btn btn-info btn-sm btn-block" target="_blank">Lihat Surat</a>
                                            <a href="<?php echo base_url();?>index.php/dashboard_lain/disposisi_keluar/<?php echo $row->id_surat;?>" class="btn btn-primary btn-sm btn-block" "><span class="fa fa-plus"></span> Tambah Disposisi</a>
                                        </td>
                                    </tr>
                                 <?php $no++; ?>
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
                <form action="#" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Tambah Disposisi Surat</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tujuan Unit</label>
                            <select class="form-control" name="tujuan_unit">
                                <option value="">-- Pilih Tujuan Unit --</option>
                                <option value="Direktur">Direktur</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="10"></textarea>
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

    <!--  MODAL edit surat -->
    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_editLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="post">
                    <input type="hidden" name="id_disposisi">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_editLabel">Ubah Disposisi Surat</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tujuan Unit</label>
                            <select class="form-control" name="tujuan_unit">
                                <option value="">-- Pilih Tujuan Unit --</option>
                                <option value="Direktur">Direktur</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="10"></textarea>
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

    <!--  MODAL tambah tanggapan disposisi -->
    <div class="modal fade" id="modal_tanggapan" tabindex="-1" role="dialog" aria-labelledby="modal_tanggapanLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="post">
                    <input type="hidden" name="id_disposisi">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_tanggapanLabel">Tambah Tanggapan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggapan</label>
                            <textarea class="form-control" name="keterangan" rows="10"></textarea>
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

    