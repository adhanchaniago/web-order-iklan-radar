<?php require_once "../functions.php"; require_once "../themes/header.php";
if (!ISSET($_SESSION['email'])) {
	header('location:'.getSite('url').'user/masuk.php');
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">
						Profil Pelanggan
					</h1>
				</div>
				<div class="panel-body">
					<table class="table">
						<tr>
							<th>Nama</th>
							<td>:</td>
							<td><?=getPelangganItems('nama', $_SESSION['user_id']);?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td>:</td>
							<td><?=getPelangganItems('alamat', $_SESSION['user_id']);?></td>
						</tr>
						<tr>
							<th>No. Telepon</th>
							<td>:</td>
							<td><?=getPelangganItems('telepon', $_SESSION['user_id']);?></td>
						</tr>
						<tr>
							<th>Perusahaan</th>
							<td>:</td>
							<td><?=getPelangganItems('perusahaan', $_SESSION['user_id']);?></td>
						</tr>
						<tr>
							<th>Alamat Kantor</th>
							<td>:</td>
							<td><?=getPelangganItems('alamat-kantor', $_SESSION['user_id']);?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">
						Daftar Order
					</h1>
				</div>
				<div class="panel-body">
					<table class="table">
						<tr>
							<th>No. Order</th>
							<th>Jenis Iklan</th>
							<th>Ukuran</th>
							<th>Total Harga</th>
							<th>Status Order</th>
						</tr>
						<?php foreach (getPelangganOrderList($_SESSION['user_id']) as $_) :?>
						<tr>
							<td><b><?php echo date('Ym').$_['no_order'];?></b></td>
							<td><?=getIklanItems('jenis-iklan', $_['kode_iklan']);?> - <?=getIklanItems('warna-iklan', $_['kode_iklan']);?></td>
							<td><?=$_['ukuran'];?> MMK</td>
							<td>Rp. <?=$_['total_harga'];?></td>
							<td><button class="btn btn-primary btn-sm"><?=getStatusOrder($_['konfirmasi']);?></button></td>
						</tr>
					<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once "../themes/footer.php"; ?>