<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div class="container ">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

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
                                    <th>No Pendaftaran</th>
                                    <th>Customer</th>
                                    <th>Tgl Pendaftaran</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($data_pendaftaran as $row) : ?>

                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row->no_pendaftaran ?></td>
                                        <td><?php echo $row->nama_user ?></td>

                                        <td><?php echo date('d/M/Y', strtotime($row->tgl_pendaftaran)) ?></td>
                                        <td>
                                            <?php if ($row->status_pendaftaran == 'menunggu') { ?>
                                                <div class="badge badge-sm badge-warning"><?php echo $row->status_pendaftaran ?></div>
                                            <?php } elseif ($row->status_pendaftaran == 'proses') { ?>
                                                <div class="badge badge-sm badge-primary"><?php echo $row->status_pendaftaran ?></div>
                                            <?php } elseif ($row->status_pendaftaran == 'selesai') { ?>
                                                <div class="badge badge-sm badge-success"><?php echo $row->status_pendaftaran ?></div>
                                            <?php } else { ?>
                                                <div class="badge badge-sm badge-danger"><?php echo $row->status_pendaftaran ?></div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->status_pendaftaran == "menunggu") { ?>
                                                <a href="#DetailModal<?php echo $row->id ?>" data-bs-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-list"></i>Detail</a>
                                                <a href="#DetailProses<?php echo $row->id ?>" data-bs-toggle="modal" class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i>Proses</a>
                                                <a href="#DetailTolak<?php echo $row->id ?>" data-bs-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down"></i>Batal</a>
                                            <?php  } else { ?>
                                                <a href="#DetailModal<?php echo $row->id ?>" data-bs-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-list"></i>Detail</a>
                                            <?php  } ?>
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

<?php foreach ($data_pendaftaran as $c) : ?>
    <div class="modal fade" id="DetailModal<?php echo $c->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-center  ">
                        <span class="fw-mediumbold"> Detail Data</span>
                        <span class="fw-light"> Pendaftaran </span>
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Keluhan</th>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $c->keluhan ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data_pendaftaran as $q) : ?>
    <div class="modal fade" id="DetailProses<?php echo $q->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-center  ">
                        <span class="fw-mediumbold"> Proses Data</span>
                        <span class="fw-light"> Pendaftaran </span>
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/pendaftaran/<?php echo $q->id  ?>/proses">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Apakah pendaftaran ini Ingin Diproses ?</h5>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-thumbs-up"></i>Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data_pendaftaran as $w) : ?>
    <div class="modal fade" id="DetailTolak<?php echo $w->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-center  ">
                        <span class="fw-mediumbold"> Dibatalkan Data</span>
                        <span class="fw-light"> Pendaftaran </span>
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/pendaftaran/<?php echo $w->id  ?>/tolak">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Apakah pendaftaran ini dibatalkan ?</h5>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger"><i class="fa fa-thumbs-down"></i>Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>




<?= $this->endSection() ?>