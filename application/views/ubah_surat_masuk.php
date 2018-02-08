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
                ?>
            <form action="<?php echo base_url();?>index.php/surat_masuk/edit_surat/<?php echo $list->id_surat;?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control" value="<?php echo $list->nomor_surat; ?>"> 
                        </div>
                        <div class="form-group">
                            <label>Tgl.Kirim</label>
                            <input type="date" name="tgl_kirim" class="form-control" value="<?php echo $list->tgl_kirim; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tgl.Terima</label>
                            <input type="date" name="tgl_terima" class="form-control" value="<?php echo $list->tgl_terima; ?>">
                        </div>
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" name="pengirim" class="form-control" value="<?php echo $list->pengirim; ?>">
                        </div>
                        <div class="form-group">
                            <label>Penerima</label>
                            <input type="text" name="penerima" class="form-control" value="<?php echo $list->penerima; ?>">
                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" name="perihal" class="form-control" value="<?php echo $list->perihal; ?>">
                        </div>
                        <div class="form-group">
                              <label>Unggah Surat (*.pdf)</label>
                            <input type="file" name="file_surat" id="file_surat" class="form-control" value="<?php echo $list->file_surat;?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
        