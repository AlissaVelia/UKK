    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><span class="fa fa-mail-forward"></span> Disposisi Keluar</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                      <?php
                    $notif = $this->session->flashdata('notif');
                    if($notif != NULL){
                        echo '<p class="alert alert-info">'.$notif.'</p>';
                    }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add"><span class="fa fa-plus"></span> Tambah Disposisi</a> | No. Surat : <?php echo $data_surat->nomor_surat; ?>

                         <a href="<?php echo base_url();?>index.php/dashboard_lain/v_disposisi_keluar/<?php echo $data_surat->id_surat?>" class="btn btn-success btn-sm" ><span class="fa fa-plus"></span> Tambah Disposisi View</a> | No. Surat : <?php echo $data_surat->nomor_surat; ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TUJUAN UNIT</th>
                                    <th>TUJUAN PEGAWAI</th>
                                    <th>TGL.DISPOSISI</th>
                                    <th>KETERANGAN</th>
                                    <th></th>
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
                                        <td><label class="label label-success">Disposisi keluar</label></td>
                                        <td>
                                            <a href="<?php echo base_url();?>/assets/uploads/<?php echo $row->file_surat;?>" class="btn btn-info btn-sm btn-block" target="_blank">Lihat Surat</a>
                               
                                            <a href="<?php echo base_url();?>index.php/dashboard_lain/disposisi_keluar/<?php echo $row->id_surat;?>" class="btn btn-danger btn-sm btn-block">   </span> Hapus</a>
                                        </td>
                                    </tr>
                                 <?php $no++; ?>
                             <?php endforeach;?>
                               <!--  <?php
                                    $no = 0;
                                    foreach ($data_disposisi as $disposisi) {
                                        echo '
                                            <tr>
                                                <td>'.++$no.'</td>
                                                <td>'.$disposisi->nama_jabatan.'</td>
                                                <td>'.$disposisi->nama.'</td>
                                                <td>'.$disposisi->tgl_disposisi.'</td>
                                                <td>'.$disposisi->keterangan.'</td>
                                            ';

                                        if($disposisi->id_pegawai_pengirim == $this->session->userdata('id_pegawai')){
                                            echo '<td><label class="label label-info">Disposisi Keluar</label></td>';
                                        }

                                        echo '
                                                <td>
                                                    <a href="'.base_url('uploads/'.$disposisi->file_surat).'" class="btn btn-info btn-sm btn-block" target="_blank">Lihat Surat</a>
                                    
                                                    <a href="'.base_url('index.php/surat/hapus_disposisi_keluar').'" class="btn btn-danger btn-sm btn-block">Hapus</a>
                                                </td>
                                            </tr>
                                        ';
                                    }

                                ?> -->
                                
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
    
    <!--  MODAL tambah disposisi surat -->
    <div class="modal fade" id="modal_add" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url('index.php/dashboard_lain/tambah_disposisi/'.$this->uri->segment(3)) ?>" method="post">
                    <div class="modal-header">
                        <h4>Tambah Disposisi Surat</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tujuan Unit</label>
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
            $('#tujuan_pegawai').empty();

            $.getJSON('<?php echo base_url() ?>index.php/dashboard_lain/get_pegawai_by_jabatan/'+id_jabatan, function(data){
                $.each(data, function(index,value){
                    $('#tujuan_pegawai').append('<option value="'+value.id_pegawai+'">'+value.nama+'</option>');
                })
            });
        }
    </script>