<?php require_once "../functions.php"; require_once "../themes/header.php"; ?>
	<!-- Page content of course! -->
<img src="<?php site('url');?>assets/images/header.jpg" style="margin-left: 250px; width: 60%; height: 200px;">
<main class="bs-docs-masthead" id="content" role="main">
  <div class="container">
    <p class="lead">
    Mau Order Iklan ? <br><b>DAFTAR Sekarang !</b>
  </p> 
    </div>
   <div class="box-singup">
<div class="col-lg-offset-3 col-lg-6" id="box-form" style="margin-top: 150px">
  <form method="POST" action="">
     <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="reg-email" class="control-label">Alamat Email *</label>
          <input type="email" name="email" class="form-control" required="required">
        </div>
        <div class="form-group">
          <label for="reg-password" class="control-label">Password *</label>
          <input type="password" name="password" required="required" class="form-control">
        </div>
        <div class="form-group">
          <label for="name" class="control-label">Nama Lengkap *</label>
          <input type="text" name="nama" class="form-control" required="required">
        </div>
        <div class="form-group">
          <label for="address_1" class="control-label">Alamat *</label>
          <input type="text" name="alamat_pemesan" class="form-control" maxlength="128" required="required">
        </div>
      </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="city" class="control-label">Perusahaan/Instansi *</label>
        <input type="text" name="nama_perusahaan" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="postcode" class="control-label">Alamat Kantor *</label>
        <input type="text" name="alamat_kantor" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="phone" class="control-label">Nomor Telepon *</label>
        <input type="text" name="telepon" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group text-center">
    <div class="mar_top2" style="margin-top: 50px"></div>
    <input name="daftar" type="submit" value="Daftar" class="btn btn-primary" />
  </div>
</form>
<?php
  if (ISSET($_POST['daftar'])) {
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    addUser($email, $password, 2);

    $user_id = getLastUserId();
    $nama = $_POST['nama'];
    $perusahaan = $_POST['nama_perusahaan'];
    $alamat_pemesan = $_POST['alamat_pemesan'];
    $alamat_kantor = $_POST['alamat_kantor'];
    $telepon = $_POST['telepon'];

    $data = array(
              'user_id'=>$user_id,
              'nama'=>$nama,
              'perusahaan'=>$perusahaan,
              'alamat_pemesan'=>$alamat_pemesan,
              'alamat_kantor'=>$alamat_kantor,
              'telepon'=$telepon
            );

    addPelanggan($data);

    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    
    header('location:'.getSite('url').'iklan/order.php');
  }
?>
</div>
  </div>
</main>

<?php require_once "../themes/footer.php"; ?>