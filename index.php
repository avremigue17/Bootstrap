<?php
	/*include "config.php";
	//include "userController.php";

	$userController= new userController();

	echo $userController;
	*/

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<style type="text/css">
		section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: #007b5e !important;
}
#footer h5{
	padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
	font-size:25px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
	#footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}
	</style>
</head>
<body>
	<!-- Barra Cabecera -->
	<div class="container">
		<!-- Nav -->
		<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
		  	<a class="navbar-brand" href="#">CRUD</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		 	 </button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav mr-auto">
			      	<li class="nav-item active">
			        	<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			     	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="#">Link</a>
			      	</li>
			      	<li class="nav-item dropdown">
			        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Dropdown
			        	</a>
			        	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          	<a class="dropdown-item" href="#">Action</a>
			          	<a class="dropdown-item" href="#">Another action</a>
			          	<div class="dropdown-divider"></div>
			          	<a class="dropdown-item" href="#">Something else here</a>
			        	</div>
		    	</ul>
			    <form class="form-inline my-2 my-lg-0">
			      	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			      	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			    </form>
		  	</div>
		</nav>

		<!-- Cards Opciones-->
		<div class="card mt-5 text-center">
			<div class="card-header">
		    	OPCIONES DE USUARIO
		 	</div>

		<div class="row">
		  <div class="col-sm-3" align="center">
		    <div class="card">
		      <div class="card-body">
		        <button onclick="add()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				  CREAR
				</button>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-3">
		    <div class="card">
		      <div class="card-body">
		        <button type="button" class="btn btn-primary" id="mostrar_info" data-toggle="modal" data-target="#exampleModal2">
				  CONSULTAR
				</button>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-3">
		    <div class="card">
		      <div class="card-body">
		        <button onclick="edit(this)" type="button" class="btn btn-primary" id="mostrar_info" data-toggle="modal" data-target="#exampleModal">
				  MODIFICAR
				</button>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-3">
		    <div class="card">
		      <div class="card-body">
		        <button type="button" class="btn btn-primary">
				  ELIMINAR
				</button>
		      </div>
		    </div>
		  </div>
		</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
		      </div>

		      <!-- Form -->
		      <form action="" method="POST" onsubmit="return validateForm(this)">
			      <div class="modal-body">
			        <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputEmail4">Nombre</label>
					      <input type="email" class="form-control" id="inputEmail4">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputPassword4">Apellido</label>
					      <input type="password" class="form-control" id="inputPassword4">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputAddress">Correo</label>
					    <input type="text" class="form-control" id="email">
					  </div>
					  <div class="form-group">
					    <label for="inputAddress2">Fecha Nacimiento</label>
					    <input type="date" class="form-control" id="year">
					  </div>
					  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputCity">Password</label>
					      <input type="text" class="form-control" id="password">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputCity">Confirmar Password</label>
					      <input type="text" class="form-control" id="password2">
					    </div>
					  </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save changes</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>	

		<!-- Modal2 -->
		<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Usuarios</h5>
		      </div>

		      <!-- Form -->
		      
			      <div class="modal-body">
			        <div class="form-row" id="contenerTablas">
					    
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
		    </div>
		  </div>
		</div>	

		<!-- Footer -->
		<section id="footer" class="mt-5">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
						<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
						<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
					</div>
					<hr>
				</div>	
			</div>
		</section>
		<!-- ./Footer -->		
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
		function add(){
			$("#exampleModalLabel").text("CREAR USUARIO")
		}
		function edit(){
			$("#exampleModalLabel").text("EDITAR USUARIO")
		}


		function validateForm(target){
					var pwd=$("#password").val();
					var pwd2=$("#password2").val();
					if(pwd==pwd2 && pwd!=0){
						var operacion ="insertar";
						var correo= $("#email").val();
						var contra= $("#password").val();
						var fecha= $("#year").val();
						$('#email').val('');
						$('#password').val('');
						$('#year').val('');
						$.ajax({
							url:"http://localhost/bootstrap/file.php",
							data:{ operacion:operacion,correo:correo,contra:contra,fecha:fecha},
							type:"POST",
							dataType:"text",
						})
						return true;
					}else{
						swal({
						  title: "El Password Deben Coincidir",
						  icon: "error",
						  button: "volver",
						});
						return false;
					}
				}

	
		$("#mostrar_info").click(function(){
			var operacion="consultar";
			$( "table" ).remove();
			$.ajax({
				url:"http://localhost/ejercicio28/file.php",
				data:{ operacion:operacion},
				type:"POST",
				dataType:"json",
				success: function(r){
					$( "#contenerTablas" ).append( "<table> <tr><td style='color:blue;font-size:20px'>Email</td><td style='color:blue;font-size:20px'>Contraseña</td><td style='color:blue;font-size:20px'>Fecha de Nacimiento</td></tr></table>"); 
					for (var i = 0; i< r.length/3; i++) {
						$( "#contenerTablas" ).append( "<table> <tr><td>"+r[i]+"</td><td>"+r[i+r.length/3]+"</td><td>"+r[i+(r.length/3)*2]+"</td></tr></table>");
					}
				}
			})
		});
</script>
</body>
</html>