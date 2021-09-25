<!DOCTYPE html>
<html lang="<?= $lang ?>">
	<head>
		<meta charset="<?= $charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AdminLTE 3 | Starter</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="<?= base_url('assets/fontawesome-free/css/all.min.css') ?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.min.css') ?>">
	</head>
	<body class="hold-transition<?= $bodyClass ?>">
		<div class="wrapper">

			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light<?= $navbarClass ?>">

				<?= $this->include('template/navbar') ?>

			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4<?= $asideNavbarClass ?>">

				<?= $this->include('template/sidebar_menu') ?>

			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0">Starter Page</h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">

								<?= $breadcrumb ?>

							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->

				<!-- Main content -->
				<div class="content">
					<div class="container-fluid">

						<?= $this->renderSection('content') ?>

					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- /.content -->

			</div>
			<!-- /.content-wrapper -->

			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">

				<!-- Control sidebar content goes here -->
				<?= $this->include('template/sidebar_control') ?>

			</aside>
			<!-- /.control-sidebar -->

			<!-- Main Footer -->
			<?= $this->include('template/footer') ?>

		</div>
		<!-- ./wrapper -->

		<!-- REQUIRED SCRIPTS -->

		<!-- jQuery -->
		<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
		<!-- Bootstrap 4 -->
		<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
	</body>
</html>