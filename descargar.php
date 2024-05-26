<?php 

	if (isset($_GET['descargar'])) {

		$nombreArchivoPdf = $_GET['descargar'];  

		$ubicacionArchivo = "PDF/".$nombreArchivoPdf;

		if (file_exists($ubicacionArchivo)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($ubicacionArchivo).'"');
			header('Expires: 0');
			header('Pragma: public');
			header('Content-Length:'. filesize($ubicacionArchivo));
			flush();
			readfile($ubicacionArchivo);
			die();
		}else {
			http_response_code(404);
			die();
		}	
	}




?>