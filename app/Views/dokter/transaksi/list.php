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
                            <a href="<?php base_url() ?>/transaksi/add" class="btn btn-primary btn-round ms-auto">
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
                                    <th>No Transaksi</th>
                                    <th>Customer</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($data_transaksi as $row) : ?>

                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row->no_transaski ?></td>
                                        <td><?php echo $row->nama_user ?></td>

                                        <td><?php echo date('d/M/Y', strtotime($row->tgl_transaksi)) ?></td>
                                        <td>
                                            <?php if ($row->status_transaksi == 'belum bayar') { ?>
                                                <div class="badge badge-sm badge-warning"><?php echo $row->status_transaksi ?></div>
                                            <?php } else { ?>
                                                <div class="badge badge-sm badge-success"><?php echo $row->status_transaksi ?></div>
                                            <?php } ?>
                                        </td>
                                        <td>

                                            <a href="<?php base_url() ?>/transaksi/detail/<?php $row->id  ?>" class="btn btn-sm btn-primary"><i class="fa fa-list"></i>Detail</a>

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


<?= $this->endSection() ?>