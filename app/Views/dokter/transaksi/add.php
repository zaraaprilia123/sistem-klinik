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
                    <form method="POST" action="<?= base_url(); ?>/transaksi/store" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">

                                <input type="hidden" name="tgl_transaksi" value="<?= date('Y-m-d');  ?>">
                                <input type="hidden" name="status_transaksi" value="belum bayar">

                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i>Tambah Obat</button>
                                <hr />

                                <table class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Obat</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>Action</th>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <td colspan="5"><b>Total</b></td>
                                            <td>Rp. 10000</td>
                                        </tr>
                                    </table>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Pendaftaran</label>
                                        <select class="form-control" name="id_pendaftaran" required>
                                            <option value="" hidden>--pilih No Pendaftaran--</option>
                                            <option>asasasa</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Customer</label>
                                        <input type="text" class="form-control" placeholder="Nama Customer..." readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Keluhan</label>
                                        <textarea class="form-control" rows="5" placeholder="Keluhan" readonly></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Transaksi</label>
                                        <input type="text" class="form-control" readonly name="no_transaksi" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Tgl Transaksi</label>
                                        <input type="text" class="form-control" value="<?= date('d-m-Y');  ?>" readonly required />
                                    </div>
                                    <div class="form-group">
                                        <label>Biaya Pengobatan</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input type="number" name="biaya_pengobatan" class="form-control" placeholder="Biaya Pengobatan..." required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Biaya Pengobatan</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input type="number" name="biaya_pengobatan" class="form-control" placeholder="Biaya Pengobatan..." required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0 ">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save p-2"></i>Save</button>
                            <a href="<?= base_url(); ?>/transaksi" class="btn btn-danger"><i class="fa-fa-undo"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-center  ">
                    <span class="fw-mediumbold"> Tambah Data</span>
                    <span class="fw-light"> Obat </span>
                </h5>
                <button
                    type="button"
                    class="close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" action="<?= base_url(); ?>/transaksi/keranjang" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <select class="form-control" name="id_obat" id="id_obat" required>
                            <option value="" hidden>--pilih Obat--</option>
                            <option>asasasa</option>
                        </select>
                    </div>
                    <div id="tampil_obat"></div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>







<?= $this->endSection() ?>