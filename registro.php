<?php
	//conexion con la base de datos y el servidor
	$link = mysql_connect("localhost","id16738941_registro","") or die("<h2>No se encuentra el servidor</h2>");
	$db = mysql_select_db("id16738941_registro",$link) or die("<h2>Error de Conexion</h2>");

	//obtenemos los valores del formulario
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$id = $_POST['id'];
    $birthdate = $_POST['birthdate'];
	$email = $_POST['email'];
	$picture = $_POST['picture'];


	//Obtiene la longitus de un string
	$req = (strlen($name)*strlen($surname)*strlen($id)*strlen($birthdate)*strlen($email)*strlen($picture)) or die("No se han llenado todos los campos");



	//ingresamos la informacion a la base de datos
	mysql_query("INSERT INTO datos VALUES('','$name','$surname','$id','$birthdater','$email','$foto')",$link) or die("<h2>Error Guardando los datos</h2>");
	echo'
		<script>
			alert("Registro Exitoso");
			location.href="index.html";
		</script>
	'


?>