<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap2.min.css">

	<title>Disnaker Kota Cirebon</title>
</head>

<body>
	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-dark bg-info">
			<a class="navbar-brand" href="#">Ms Tech</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pricing</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="row">
			<div class="col-6">
				<div class="card border-0">
					<div class="card-body">

						<h4 class="text-center">Form Mahasiswa</h4>
						<form>
							<div class="form-group">
								<label for="NIM">NIM</label>
								<input type="number" class="form-control" id="NIM" placeholder="Masukan nim anda">
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" placeholder="Masukan nama anda">
							</div>
							<div class="form-group">
								<label for="prodi">Program Studi</label>
								<input type="text" class="form-control" id="prodi" placeholder="Masukan prodi anda">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Masukan email anda">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success px-3">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card border-0 ">
					<div class="card-body">
						<h4 class="text-center">Form Mahasiswa</h4>

						<table class="table ">
							<tr>
								<th>#</th>
								<th>NIM</th>
								<th>Nama</th>
								<th>Program Studi</th>
								<th>Email</th>
							</tr>
							<tr>
								<td>1</td>
								<td>200100211</td>
								<td>Ilham</td>
								<td>Teknik Informatika</td>
								<td>ilham@mail.com</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>



	<script src="js/jquery.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>