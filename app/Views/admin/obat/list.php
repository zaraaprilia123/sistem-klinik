<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title"><?php echo $title; ?></h4>
              <button
                class="btn btn-primary btn-round ms-auto"
                data-bs-toggle="modal"
                data-bs-target="#addRowModal">
                <i class="fa fa-plus"></i>
                Add Row
              </button>
            </div>
          </div>
          <div class="card-body">
            <!-- Modal -->
            <div
              class="modal fade modal-lg"
              id="addRowModal"
              tabindex="-1"
              role="dialog"
              aria-hidden="true">
              <div class="modal-dialog d-flex align-items-center" role="document">
                <div class="modal-content justify-content-center">
                  <div class="modal-header border-0">
                    <h5 class="modal-title text-center">
                      <span class="fw-mediumbold"> Create Data</span>
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
                  <div class="modal-body">
                    <form method="POST" action="<?= base_url(); ?>/obat/store" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" required />
                          </div>
                          <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Rp</span>
                              <input type="text" class="form-control" name="harga" placeholder="Harga" aria-label="Harga" aria-describedby="basic-addon1" required />
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Stok</label>
                            <div class="input-group mb-3">
                              <input type="number" class="form-control" name="stok" placeholder="Stok" aria-label="Stok" aria-describedby="basic-addon2" required />
                              <span class="input-group-text" id="basic-addon2">Pcs</span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" rows="5" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                          <i class="fa fa-trash p-2"></i>Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-save p-2"></i>Save
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="table-responsive">
              <table
                id="add-row"
                class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1;
                  foreach ($data_obat as $row) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row->nama_obat ?></td>
                      <td><?php echo $row->harga ?></td>
                      <td><?php echo $row->stok ?></td>
                      <td><?php echo $row->deskripsi ?></td>
                      <td>
                        <a href="#EditModal<?php echo $row->id ?>" data-bs-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
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


<?php foreach ($data_obat as $d) : ?>
  <div class="modal fade" id="EditModal<?php echo $d->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title text-center  ">
            <span class="fw-mediumbold"> Edit Data</span>
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
        <form method="POST" action="<?= base_url(); ?>/obat/<?php echo $d->id  ?>/edit" enctype="multipart/form-data">
          <?= csrf_field(); ?>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nama Obat</label>
                  <input type="text" class="form-control" value="<?php echo $d->nama_obat ?>" name="nama_obat" placeholder="Nama Obat" />
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control" value="<?php echo $d->harga ?>" name="harga" placeholder="Harga" aria-label="Harga" aria-describedby="basic-addon1" required />
                  </div>
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <div class="input-group mb-3">
                    <input type="Number" class="form-control" value="<?php echo $d->stok ?>" name="stok" placeholder="Stok" aria-describedby="basic-addon2" required />
                    <span class="input-group-text" id="basic-addon2">Pcs</span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" rows="5" required><?php echo $d->deskripsi ?></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer border-0">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<?php foreach ($data_obat as $c) : ?>
  <div class="modal fade" id="HapusModal<?php echo $c->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title text-center  ">
            <span class="fw-mediumbold"> Hapus Data</span>
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
        <form method="GET" action="<?= base_url(); ?>/obat/<?= $c->id ?>/destroy" enctype="multipart/form-data">
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