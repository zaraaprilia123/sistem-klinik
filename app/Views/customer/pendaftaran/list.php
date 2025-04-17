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
                            <a href="<?php base_url() ?>/pendaftaran/add" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Add Row
                            </a>
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
                                    <?php if ($row->id_customer == session()->get('id')) { ?>
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
                                                <a href="#DetailModal<?php echo $row->id ?>" data-bs-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-list"></i>Detail</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
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



<?= $this->endSection() ?>