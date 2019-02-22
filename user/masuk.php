<?php require_once "../functions.php"; require_once "../themes/header.php"; ?>
<div class="container">
	<div clas="margs" style="margin-bottom: 100px;"></div>
	<div class="row">
		<div class="col-md-3 col-md-offset-5">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">
						Masuk
					</h1>
				</div>
				<div class="panel-body">
					<form method="POST" action="">
     					<div class="row">
     						<div class="col-md-12">
        						<div class="form-group">
          							<label for="reg-email" class="control-label">Email *</label>
          							<input type="email" name="email" class="form-control" required="required"></br>
          							<label for="reg-email" class="control-label">Password *</label>
          							<input type="password" name="password" class="form-control" required="required"></br>
          							Belum punya akun ? <a href="<?php site('url');?>user/daftar.php">Daftar</a></br></br>
          							<input type="submit" name="login" class="btn btn-primary" value="Masuk" style="width: 100%">
        						</div>
        					</div>
						</div>
					</form>
					<?php
							if (ISSET($_POST['login'])) {
								$email = $_POST['email'];
								$password = $_POST['password']; 
								
								if (userLogin($email,$password)) {
									session_start();
									$_SESSION['email'] = $email;
									$_SESSION['user_id'] = getUserId($email);

									header('location:'.getSite('url').'user');
								}
								else {
									echo "Email atau Password Salah !";
								}
							}
						?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once "../themes/footer.php"; ?>