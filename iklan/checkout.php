<?php 
require_once "../functions.php"; require_once "../themes/header.php";

if (!ISSET($_SESSION['email'])) {
	header('location:'.getSite('url').'user/masuk.php');
}
?>

<main class="bs-docs-masthead" id="content" role="main">
  <div class="container">
    <p class="lead">
    Detail Order Iklan<br>
  </p> 
    </div>
</main>
<div class="container">
<div class="row"><br><br>
	<?php 
		$no_pelanggan = getNoPelanggan($_SESSION['user_id']);
		$kode_iklan = $_POST['jenis_iklan'];
		$ukuran = $_POST['kolom'] * $_POST['mm'];
	?>
	<div class="col-md-6 col-md-offset-3">
		<div class="table-responsive">
	Silahkan lakukan pembayaran melalui rekening yang tersedia, kemudian lakukan konfirmasi pembayaran.
	<br><p> </p><p> </p>
	<table class="table table-bordered">
	<?php foreach (getDetailIklan($kode_iklan) as $_DATA) :?>
		<tr>
			<th>No. Order</th><td><?php echo date('dmY').getLastNoOrder()+1;?></td>
		</tr>
		<tr>
			<th>Jenis</th><td><?php echo $_DATA['jenis_iklan'];?></td>
		</tr>
		<tr>
		<th>Warna</th><td><?php echo $_DATA['jenis_warna'];?></td>
		</tr>
		<tr>
			<th>Harga</th><td>Rp. <?php echo $_DATA['harga'];?>/MMK</td>
		</tr>
		<tr>
			<th>Ukuran</th><td><?php echo $ukuran;?>MMK</td>
		</tr>
		<tr class="success">
			<th>Total</th><td>Rp. <?php $total = $_DATA['harga']*$ukuran; echo $total;?>,-</td>
		</tr>
		<tr class="info">
			<th>Status Order</th><td>Menunggu Pembayaran</td>
		</tr>
	<?php endforeach;?>
	</table>
	<?php addOrderIklan($no_pelanggan, $kode_iklan, $total, $ukuran);?>
</div>
</div>
</div>
</div>
<?php require_once "../themes/footer.php"; ?>