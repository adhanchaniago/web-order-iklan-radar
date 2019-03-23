<?php 
require_once "../functions.php"; require_once "../themes/header.php";

if (!ISSET($_SESSION['email'])) {
	header('location:'.getSite('url').'user/masuk.php');
}
?>

<main class="bs-docs-masthead" id="content" role="main">
  <div class="container">
    <p class="lead">
    Pilih Paket <B>IKLAN</B> ..<br>
    Untuk Masa <B>1 KALI TAYANG</B>
  </p> 
    </div>
   <div class="box-singup">
<div class="col-lg-offset-3 col-lg-6" id="box-form" style="margin-top: 150px">
	<form name="form_iklan" method="POST" action="checkout.php">
		<div class="row">
			<div class="col-md-12">
				<select class="form-control" name="jenis_iklan">
					<option selected="selected" disabled="disabled">- Pilih Jenis Iklan -</option>
					<?php foreach (getJenisIklan() as $_DATA) :?>
					<option  value="<?php echo $_DATA['kode_iklan'];?>"><?php echo $_DATA['jenis_iklan'];?> - 
					<?php
						if ($_DATA['jenis_warna'] == "BW") { 
							$_DATA['jenis_warna'] = "Hitam Putih";
						} elseif ($_DATA['jenis_warna'] == "FC") {
							$_DATA['jenis_warna'] = "Full Color";
						}
							echo $_DATA['jenis_warna'];
					?>
					</option>
					<?php endforeach;?>
				</select><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<select class="form-control" name="kolom">
					<option selected="selected" disabled="disabled">- Pilih Lebar (Kolom) -</option>
					<?php for ($i=1;$i<=6;$i++) :?>
					<option value="<?php echo $i;?>"><?php echo $i;?> Kolom</option>
					<?php endfor;?>
				</select>
			</div>
			<div class="col-md-6">
				<select class="form-control" name="mm">
					<option selected="selected" disabled="disabled">- Pilih Tinggi (mm) -</option>
					<?php for ($i=50;$i<=200;$i=$i+50) :?>
					<option value="<?php echo $i;?>"><?php echo $i;?> mm</option>
					<?php endfor;?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12"><br><br>
				<input type="submit" name="checkout" value="Checkout" class="btn btn-success" style="width: 100%;">
			</div>
		</div>
	</form>
</div>
</div>
</main>

<?php require_once "../themes/footer.php"; ?>