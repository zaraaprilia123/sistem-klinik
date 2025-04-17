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
                    <div class="card-body">

                    </div>
                    <div class="table-responsive">
                        <table
                            id="add-row"
                            class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>No Handphone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($data_user as $row) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row->nama_user ?></td>
                                        <td><?php echo $row->username ?></td>
                                        <td><?php echo $row->nohp ?></td>
                                        <td>
                                            <a href="#HapusModal<?php echo $row->id ?>" data-bs-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php foreach ($data_user as $c) : ?>
    <div class="modal fade" id="HapusModal<?php echo $c->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-center  ">
                        <span class="fw-mediumbold"> Hapus Data</span>
                        <span class="fw-light"> Customer </span>
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="GET" action="<?= base_url(); ?>/user/<?= $c->id ?>/destroy" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Apakah anda ingin menghapus data ini??</h5>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?= $this->endSection() ?>