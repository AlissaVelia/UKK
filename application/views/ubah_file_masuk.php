  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">

                    <h1 class="page-header"><span class="fa fa-envelope"></span> Ubah File Masuk</h1>

                </div>
<?php 
                    $notif = $this->session->flashdata('notif');
                    if($notif != NULL){
                        echo '
                            <div class="alert alert-info">'.$notif.'</div>
                        ';
                    }
                ?>
            <form action="<?php echo base_url();?>index.php/surat_masuk/ubah_file_masuk/<?php echo $list->id_surat; ?>" method="post" enctype="multipart/form-data">
                 
                    </div>
                    <div class="modal-body">
              
                        <div class="form-group">

                            <label>Unggah Surat (*.pdf)</label>
                            <input type="file" name="file_surat"  class="form-control" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
        