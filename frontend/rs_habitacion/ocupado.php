<?php
   session_start();
  
  if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../login.php');
  }
?>
<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Hotel MI CIELO">
		<meta name="author" content="Hotel">
		<link rel="shortcut icon" href="../../backend/img/ico.png" />

		<!-- Title -->
		<title>Reservaciones | Hotel "MI CIELO"</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="../../backend/css/bootstrap.min.css">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="../../backend/fonts/style.css">
		<!-- Main css -->
		<link rel="stylesheet" href="../../backend/css/main.css">

		<!-- Data Tables -->
		<link rel="stylesheet" href="../../backend/vendor/datatables/dataTables.bs4.css" />
		<link rel="stylesheet" href="../../backend/vendor/datatables/dataTables.bs4-custom.css" />
		<link href="../../backend/vendor/datatables/buttons.bs.css" rel="stylesheet" />

	</head>

	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->


		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			<nav id="sidebar" class="sidebar-wrapper">
				
				<!-- Sidebar brand start  -->
				<div class="sidebar-brand">
					<a href="../administrador/escritorio.php" class="logo">
						<img src="../../backend/img/rt.png" alt="Hotel mi cielo" />
					</a>
				</div>
				<!-- Sidebar brand end  -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

					<!-- sidebar menu start -->
					<div class="sidebar-menu">
						<ul>
							<li class="header-menu">General</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-devices_other"></i>
									<span class="menu-text">Dashboards</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="../administrador/escritorio.php">Admin Dashboard</a>
										</li>
										
									</ul>
								</div>
							</li>
							
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-briefcase"></i>
									<span class="menu-text">Gestión</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="../recepcion/mostrar.php">Recepción</a>
										</li>
										<li>
											<a href="../salida/mostrar.php">Salida</a>
										</li>
										
									</ul>
								</div>
							</li>


							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-archive"></i>
									<span class="menu-text">Tienda</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="../venta/mostrar.php">Vender</a>
										</li>
										<li>
											<a href="../productos/mostrar.php">Productos</a>
										</li>
										<li>
											<a href="../categorias/mostrar.php">Categorias</a>
										</li>
										
									</ul>
								</div>
							</li>

							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-settings1"></i>
									<span class="menu-text">Mantenimieto</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="../habitacion/mostrar.php">Habitación</a>
										</li>
										<li>
											<a href="../h_categoria/mostrar.php">Categoria</a>
										</li>
										<li>
											<a href="../pisos/mostrar.php">Pisos</a>
										</li>
										
									</ul>
								</div>
							</li>

							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-bar-chart"></i>
									<span class="menu-text">Reportes</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="../r_recepcion/mostrar.php">Recepción</a>
										</li>
										<li>
											<a href="../r_productos/mostrar.php">Productos</a>
										</li>
										
										
									</ul>
								</div>
							</li>


							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-user1"></i>
									<span class="menu-text">Usuarios</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="../usuarios/mostrar.php">Usuarios</a>
										</li>
										<li>
											<a href="../clientes/mostrar.php">Clientes</a>
										</li>
										
										
									</ul>
								</div>
							</li>


							<li class="sidebar-dropdown active">
								<a href="#">
									<i class="icon-calendar"></i>
									<span class="menu-text">Reservas</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="#" class="current-page">Habitaciones</a>
										</li>
										
									</ul>
								</div>
							</li>

							
						</ul>
					</div>
					<!-- sidebar menu end -->

				</div>
				<!-- Sidebar content end -->
				
			</nav>
			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Header start -->
				<header class="header">
					<div class="toggle-btns">
						<a id="toggle-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
						<a id="pin-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
					</div>
					<div class="header-items">
						<!-- Custom search start -->
						<div class="custom-search">
							<input type="text" class="search-query" placeholder="Search here ...">
							<i class="icon-search1"></i>
						</div>
						<!-- Custom search end -->

						<!-- Header actions start -->
						<ul class="header-actions">
							
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									<span class="user-name"><?php echo $_SESSION['nombre']; ?></span>
									<span class="avatar">
										<img src="../../backend/img/user24.png" alt="avatar">
										<span class="status busy"></span>
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="../../backend/img/user24.png" alt="Admin Template">
											</div>
											<h5>Julie Sweet</h5>
											<p>Admin</p>
										</div>
										<a href="../perfil/mostrar.php"><i class="icon-user1"></i> Mi Perfil</a>
										<a href="../cuenta/mostrar.php"><i class="icon-settings1"></i> Configuración de la cuenta</a>
										<a href="../pages-logout.php"><i class="icon-log-out1"></i> Salir</a>
									</div>
								</div>
							</li>
						</ul>						
						<!-- Header actions end -->
					</div>
				</header>
				<!-- Header end -->

				
				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active">Reservaciones</li>
					</ol>
				</div>
				<!-- Page header end -->
				<!-- Main container start -->

<div class="main-container">

					<!-- Row start -->
					<div class="row gutters">
						<?php 
require '../../backend/config/Conexion.php';
 $id = $_GET['id'];
 $sentencia = $connect->prepare("SELECT habitaciones.idhab, habitaciones.numiha, habitaciones.detaha, habitaciones.precha, pisos.idps, pisos.nompis, hcate.idhc, hcate.nomhc, habitaciones.estadha FROM habitaciones INNER JOIN pisos ON habitaciones.idps =pisos.idps INNER JOIN hcate ON habitaciones.idhc =hcate.idhc  WHERE idhab= '$id';");
 $sentencia->execute();

$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
   ?>
   <?php if(count($data)>0):?>
        <?php foreach($data as $d):?>
						<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
							<div class="card h-100">
								<div class="card-body">
									<div class="account-settings">
										<div class="user-profile">
											<div class="user-avatar">
												<img src="../../backend/img/room.svg" alt="Room" />
											</div>
											<h5 class="user-name"><?php echo $d->numiha; ?></h5>
											<h6 class="user-email"><?php echo $d->detaha; ?></h6>
										</div>
										<div class="list-group">
											<a href="#" class="list-group-item"><?php echo $d->nompis; ?></a>
											<a href="#" class="list-group-item"><?php echo $d->nomhc; ?></a>
										</div>
							</div>
						</div>
					</div>
				</div>

						<?php endforeach; ?>
  
    <?php else:?>
      <p class="alert alert-warning">No hay datos</p>
    <?php endif; ?>

						<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
							<div class="card h-100">
								<div class="card-header">
									<div class="card-title">Detalle de la reserva</div>
								</div>
								
								<?php 

 $id = $_GET['id'];
 $sentencia = $connect->prepare("SELECT reservar.idrese, reservar.state,habitaciones.idhab, habitaciones.numiha,habitaciones.precha ,habitaciones.detaha,habitaciones.estadha, clientes.iddn, clientes.dnic, clientes.numc, clientes.nomc, clientes.apec, clientes.corrc, reservar.feentra, reservar.fesal, reservar.adel, reservar.observac, GROUP_CONCAT(pisos.idps, '..', pisos.nompis, '..' SEPARATOR '__') AS pisos , GROUP_CONCAT(hcate.idhc, '..', hcate.nomhc, '..' SEPARATOR '__') AS hcate FROM reservar INNER JOIN habitaciones ON reservar.idhab = habitaciones.idhab  INNER JOIN pisos ON habitaciones.idps =pisos.idps INNER JOIN hcate ON habitaciones.idhc = hcate.idhc INNER JOIN clientes ON  reservar.iddn =clientes.iddn WHERE habitaciones.idhab= '$id' GROUP BY habitaciones.estadha;");
 $sentencia->execute();

$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
   ?>
   <?php if(count($data)>0):?>
        <?php foreach($data as $d):?>
								<div class="card-body">
						<form method="POST" action="" enctype="multipart/form-data">
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="fullName">DNI del cliente</label>
												<input type="text" maxlength="8" class="form-control" id="documentodni" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $d->numc; ?>" readonly required name="rxdn" placeholder="DNI del cliente">
												
												<input type="hidden" name="rxha" value="<?php echo $d->idhab; ?>">
												<input type="hidden" name="rxre" value="<?php echo $d->idrese; ?>">
												<input type="hidden" name="rxcli" value="<?php echo $d->iddn; ?>">
												<input type="hidden" name="rxnomcli" value="<?php echo $d->nomc; ?>">
												<input type="hidden" name="rxnumha" value="<?php echo $d->numiha; ?>">
												<input type="hidden" name="rxdeha" value="<?php echo $d->detaha; ?>">
												<input type="hidden" name="rxprha" value="<?php echo $d->precha; ?>">
											</div>
											<div class="form-group">
												<label for="eMail">Nombre del cliente</label>
												<input type="text" class="form-control" required value="<?php echo $d->nomc; ?>" readonly name="rxnam" id="nombres" placeholder="Nombre del cliente">
											</div>
											<div class="form-group">
												<label for="phone">Apellido del cliente</label>
												<input type="text" value="<?php echo $d->apec; ?>" readonly class="form-control" required  name="rxape" id="apellidoPaterno" placeholder="Apellido del cliente">
											</div>

												<div class="form-group">
												<label for="sTate">Adelanto</label>
												<input type="number" min="0" value="0" value="<?php echo $d->adel; ?>" readonly class="form-control" name="rxade">
											</div>
											
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="addRess">Fecha entrada</label>
												<input type="date" class="form-control" name="rxent" value="<?php echo $d->feentra; ?>" readonly>
											</div>
											<div class="form-group">
												<label for="ciTy">Fecha salida</label>
												<input type="date" class="form-control"  value="<?php echo $d->fesal; ?>" readonly required name="rxsal">
											</div>
											<div class="form-group">
												<label for="sTate">Precio</label>
												<input type="text" class="form-control" value="<?php echo $d->precha; ?>" readonly>
											</div>


											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<label for="sTate">Observaciones</label>
													<textarea class="form-control" value="<?php echo $d->observac; ?>" readonly name="rxobs"  rows="3"><?php echo $d->observac; ?></textarea>
													                  
												</div>
											</div>
											
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="text-right">
												
												<button type="submit" name="upd_fin" class="btn btn-primary">Finalizar recepción</button>
											</div>
										</div>
									</div>
							</form>
								</div>
<?php endforeach; ?>
  
    <?php else:?>
      <p class="alert alert-warning">No hay datos</p>
    <?php endif; ?>
							</div>
						</div>
						


					</div>
					<!-- Row end -->

				</div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->

<!-- MODAL-ELIMINAR -->

		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="../../backend/js/jquery.min.js"></script>
		<script src="../../backend/js/bootstrap.bundle.min.js"></script>
		<script src="../../backend/js/moment.js"></script>


		<!-- Main JS -->
		<script src="../../backend/js/main.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

		<?php
    include_once '../../backend/php/upd_fin.php'
?>

	</body>
</html>
				