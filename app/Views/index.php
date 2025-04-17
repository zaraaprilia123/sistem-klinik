<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php $title ?></title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link rel="stylesheet" href="/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
 </head>
  <body>
   <div class="wrapper">
    <span class="bg-animate" ></span>
    <span class="bg-animate2" ></span>
    <div class="form-box login">
        <h2 class="animation" style="--i:0; --j:21;">Login</h2>
        <form action="<?= base_url(); ?>/cek_login" method="POST">
            <?= csrf_field(); ?>
            <div class="input-box animation" style="--i:1; --j:22;">
                <input type="text" name="username" required>
                <label>Username</label>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box animation" style="--i:2; --j:23;">
                <input type="password" name="password" required>
                <label>Password</label>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <button type="submit" class="btn animation" style="--i:3; --j:24;">Login</button>
            <div class="logreg-link animation" style="--i:4; --j:25;">
                <p>blablabla <a href="#"  class="register-link"> Sign Up</a></p>
            </div>
        </form>
    </div>
    <div class="info-text login">
      <h2 class="animation" style="--i:0; --j:20;">Welcome Back!!</h2>
      <p class="animation" style="--i:1; --j:21; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
    </div>


    <div class="form-box register " >
        <h2 class="animation" style="--i:17; --j:0;">Register</h2>
        <form action="<?= base_url(); ?>/tambah_user" method="POST">
        <?= csrf_field(); ?>
            <div class="input-box animation" style="--i:18; --j:1;">
                <input type="text" name="nama_user" required>
                <label>Nama User</label>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box animation" style="--i:19; --j:2;">
                <input type="email" name="email" required>
                <label>Email</label>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box animation" style="--i:20; --j:3;">
                <input type="text" name="username" required>
                <label>Username</label>
                <i class='bx bxs-user'></i>
            </div>
            
            <div class="input-box animation" style="--i:21; --j:4;">
                <input type="password" name="password" required>
                <label>Password</label>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="input-box animation" style="--i:22; --j:5;">
                <input type="number" name="nohp" required>
                <label>No HP</label>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="input-box animation" style="--i:23; --j:6;">
                <input type="date" name="tgl_lahir" required>
                <label>Tanggal Lahir</label>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="input-box animation" style="--i:23; --j:6;">
                <input type="hidden" name="role" required>
            </div>
            <button type="submit" class="btn animation" style="--i:24; --j:7;">Sign Up</button>
            <div class="logreg-link animation" style="--i:25; --j:8;">
                <p>blablabla <a href="<?= base_url(); ?>/" class="login-link">Login</a></p>
            </div>
        </form>
    </div>
    <!-- <div class="info-text register">
      <h2 class="animation" style="--i:17; --j:0;">Welcome Back!!</h2>
      <p class="animation" style="--i:18; --j:1;">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
    </div> -->
   </div>
   <script src="script.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <?php if(!empty(session()->getFlashdata('success'))) : ?>
    <script>
        swal({
            title: "<?php echo session()->getFlashdata('success'); ?>",
            text: "<?php echo session()->getFlashdata('success'); ?>",
            icon: "success",
            button: "Confirm Me!",
        });
    </script>
    <?php endif; ?>

   <?php if(!empty(session()->getFlashdata('error'))) : ?>
    <script>
        swal({
            title: "<?php echo session()->getFlashdata('error'); ?>",
            text: "<?php echo session()->getFlashdata('error'); ?>",
            icon: "error",
            button: "Confirm Me!",
        });
    </script>
    <?php endif; ?>
  </body>
</html>
