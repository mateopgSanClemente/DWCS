<?php 
/**Realiza los seguintes pasos:

1. Crea un fichero PHP a modo de librería con todas las funciones creadas, llámale utilidades.php. --HECHO--
2. Escribe la diferencia entre `include`, `include_once`, `require` y `require_once` dentro del código de la librería de funciones como un comentario del código fuente. --HECHO--
3. Divide el `index.php` de tal forma que tengas distintos recursos repartidos en ficheros:

Fichero         | Contiene el `div` con `id`
:-              |:-
`logo.php` |`id="logo"`
`menu.php` |`id="menu"`
`pictures.php` |`id="pictures"`
`content.php` |`id="content"`
`sidebar.php` |`id="sidebar"`
`footer.php` |`id="footer"`

Modifica el `index.php` para que cargue los recursos indicados en el paso anterior
*/
include("logo.php");
include("menu.php");
include("pictures.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
			<title>Web Portal - Includes and requires</title>
			<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
		</head>
		<body>

			<div id="header" class="container">

				<?php
					logo();
				?>
				<?php
					menu();
				?>
			</div>
			<!--Aquí va el contenido de "pictures"-->
				<?php
					pictures();
				?>

			<div id="page">
				<div id="bg1">
					<div id="bg2">
						<div id="bg3">
							<div id="content">
								<h2>Welcome to our website</h2>
								<p> This is the DIV with ID content</p>
							</div>
							<div id="sidebar">
								<h2>Paesent scelerisque</h2>
								<ul>
									<li>
										<a href="#">DIV with ID sidebar</a>
									</li>
									<li>
										<a href="#">Etiam rhoncus volutpat erat</a>
									</li>
									<li>
										<a href="#">Donec dictum metus in sapien</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div id="footer">
				<p>Copyright (c) 2012 meusitio.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>.
				</p>
			</div>
		</body>
	</html>