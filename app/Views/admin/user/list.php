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
              class="modal fade "
              id="addRowModal"
              tabindex="-1"
              role="dialog"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title text-center  ">
                      <span class="fw-mediumbold"> Create Data</span>
                      <span class="fw-light"> User </span>
                    </h5>
                    <button
                      type="button"
                      class="close"
                      data-bs-dismiss="modal"
                      aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="<?= base_url(); ?>/user/store" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_user" placeholder="Nama Lengkap" />
                          </div>
                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" />
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" />
                          </div>
                          <div class="form-group">
                            <label>No Handphone</label>
                            <input type="number" class="form-control" name="nohp" placeholder="No Handphone" />
                          </div>
                          <div class="form-group">
                            <label>Tgl Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" placeholder="Tgl Lahir" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Role</label>
                          <select class="form-control" name="role" required>
                            <option value="" hidden>--Pilih Role--</option>
                            <option value="admin">Admin</option>
                            <option value="dokter">Dokter</option>
                            <option value="kasir">Kasir</option>
                            <option value="customer">customer</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer border-0 ">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-trash p-2"></i>Close</button>
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save p-2"></i>Save</button>
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
                  <th>Nama</th>
                  <th>Username</th>

                  <th>Email</th>
                  <th>No Handphone</th>
                  <th>Tgl Lahir</th>
                  <th>Role</th>

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
                    <td><?php echo $row->email ?></td>
                    <td><?php echo $row->nohp ?></td>
                    <td><?php echo $row->tgl_lahir ?></td>
                    <td><?php echo $row->role ?></td>
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


<?php foreach ($data_user as $d) : ?>
  <div class="modal fade" id="EditModal<?php echo $d->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title text-center  ">
            <span class="fw-mediumbold"> Edit Data</span>
            <span class="fw-light"> User </span>
          </h5>
          <button
            type="button"
            class="close"
            data-bs-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?= base_url(); ?>/user/<?php echo $d->id  ?>/edit" enctype="multipart/form-data">
          <?= csrf_field(); ?>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" value="<?php echo $d->nama_user ?>" name="nama_user" placeholder="Nama Lengkap" />
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" value="<?php echo $d->username ?>" name="username" placeholder="Username" />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" value="<?php echo $d->email ?>" name="email" placeholder="Email" />
                </div>
                <div class="form-group">
                  <label>No Handphone</label>
                  <input type="number" class="form-control" value="<?php echo $d->nohp ?>" name="nohp" placeholder="No Handphone" />
                </div>
                <div class="form-group">
                  <label>Tgl Lahir</label>
                  <input type="date" class="form-control" value="<?php echo $d->tgl_lahir ?>" name="tgl_lahir" placeholder="Tgl Lahir" />
                </div>
              </div>
              <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role" required>
                  <option value="" hidden>--Pilih Role--</option>
                  <option <?php if ($d->role == "admin") echo "selected"; ?> value="admin">Admin</option>
                  <option <?php if ($d->role == "dokter") echo "selected"; ?> value="dokter">Dokter</option>
                  <option <?php if ($d->role == "kasir") echo "selected"; ?> value="kasir">Kasir</option>

                </select>
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


<?php foreach ($data_user as $c) : ?>
  <div class="modal fade" id="HapusModal<?php echo $c->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title text-center  ">
            <span class="fw-mediumbold"> Hapus Data</span>
            <span class="fw-light"> User </span>
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