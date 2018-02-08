    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="fa fa-envelope"></span> Surat Keluar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add"><span class="fa fa-plus"></span> Tambah Surat Keluar</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NO.SURAT</th>
                                        <th>TUJUAN</th>
                                        <th>TGL.KIRIM</th>
                                        <th>PERIHAL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>SMKTELKOM/001/10/JAN/2018</td>
                                        <td>Inagata, Inc.</td>
                                        <td>12 Januari 2018</td>
                                        <td>Kerjasama</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_ubah">Ubah</a>
                                            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>SMKTELKOM/001/10/JAN/2018</td>
                                        <td>Inagata, Inc.</td>
                                        <td>12 Januari 2018</td>
                                        <td>Kerjasama</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_ubah">Ubah</a>
                                            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
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

    <!--  MODAL tambah surat keluar -->
    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Tambah Surat Keluar</h4>
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
                            <label>Tujuan</label>
                            <input type="text" name="tujuan" class="form-control">
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

    <!--  MODAL ubah surat keluar -->
    <div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="modal_ubahLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_ubahLabel">Ubah Surat Keluar</h4>
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
                            <label>Tujuan</label>
                            <input type="text" name="tujuan" class="form-control">
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