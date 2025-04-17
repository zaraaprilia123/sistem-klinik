<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div class="container ">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?php echo $title; ?></h4>
                        </div>
                    </div>
                    <form method="POST" action="<?= base_url(); ?>/pendaftaran/store" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="id_customer" value="<?= session()->get('id');  ?>">
                                <input type="hidden" name="tgl_pendaftaran" value="<?= date('Y-m-d');  ?>">
                                <input type="hidden" name="status_pendaftaran" value="menunggu">

                                <div class="form-group">
                                    <label>No Pendaftaran</label>
                                    <input type="text" class="form-control" value=" <?php echo $no_pendaftaran ?>" name="no_pendaftaran" placeholder="No Pendaftaran" required />
                                </div>
                                <div class="form-group">
                                    <label>Nama Customer</label>
                                    <input type="text" class="form-control" value="<?= session()->get('nama_user');  ?>" readonly required />
                                </div>
                                <div class="form-group">
                                    <label>Tgl Pendaftaran</label>
                                    <input type="text" class="form-control" value="<?= date('d-m-Y');  ?>" readonly required />
                                </div>
                                <div class="form-group">
                                    <label>Keluhan</label>
                                    <input class="form-control" rows="5" name="keluhan" placeholder="Keluhan" required />
                                </div>
                            </div>
                            <div class="card-footer border-0 ">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-save p-2"></i>Save</button>
                                <a href="<?= base_url(); ?>/pendaftaran" class="btn btn-danger"><i class="fa-fa-undo"></i>Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>