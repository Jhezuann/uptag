<?php foreach ($resultado_cantidad_proyectos as $p): ?>
  <div class="card mb-3">
    <div class="card-body shadow">
      <h5 class="card-title fw-bold mb-3 px-2"><?php echo $p['titulo']?></h5>
      <div class="row">
      	<div class="col-12">
  	      <p class="mb-2"><b>Trayecto: </b> <?php echo $p['trayecto']?></p>
          <p class="mb-2"><b>Area: </b> <?php echo $p['area']?><b> Programa: </b> <?php echo $p['programa']?></p>
  	      <p class="mb-2"><b>Linea: </b> <?php echo $p['linea']?></p>
  	      <p class="mb-2"><b>Profesor Tutor: </b> <?php echo $p['tutor']?><b> Año: </b><?php echo $p['ano']?><b> Codigo de Busqueda: </b> <?php echo $p['id']?></p>
      	</div> 
        <div class="col-12">
          <!-- <p class="d-flex mx-auto fw-normal">Opciones:</p> -->
          <?php if (isset($_SESSION['tipo']) && ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 1)): ?>
            <button id="opciones" type="button" class="btn btn-danger  px-3" data-bs-toggle="modal" data-bs-target="#elimpro" onClick='eliminar(<?php echo $p['id'] ?>)'>Eliminar</button>
  	        <button id="modaleditar" type="button" class="btn btn-info  px-3" data-bs-toggle="modal" data-bs-target="#e<?php echo $p['id'] ?>">Modificar</button>
          <?php endif; ?> 
          <a href="descargar.php?descargar=<?php echo $p['pdf']?>" class="btn btn-success  px-3">Descargar</a>
        </div>   
      </div>
    </div>
  </div>
<?php endforeach ?>

<script type="text/javascript">
  function eliminar(id){
    var btndelete= $("#elimpro").find('a.delete');
    btndelete.attr('href','controlador.php?idProyecto='+id);

  }


</script>