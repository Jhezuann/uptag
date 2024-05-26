<div class="modal fade" id="modalAnadir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Datos del Proyecto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="agregar.php" class="row g-3 needs-validation was-validated" id='formproyecto' novalidate enctype="multipart/form-data">
          <div class="col-12">
            <label for="tituloProyecto" class="form-label">Titulo del proyecto</label>
            <input type="text" class="form-control" name="tituloProyecto" minlength="5" maxlength="30" required>
          </div>
          <div class="col-9">
            <label for="profTutor" class="form-label">Profesor Tutor</label>
            <input type="text" class="form-control" name="profTutor" required>
          </div>
          <div class="col-3">
            <label for="ano" class="form-label">Año</label>
            <input type="text" class="form-control" name="ano" required>
          </div>
          <div class="input-group">
            <label for="selectArea" class="input-group-text">Area</label>
            <select class="form-select" name="selectArea" onchange="buscarprogramas(this)" required>
              <option value='' class="d-none">Elige un area...</option>
              <?php foreach ($resultado_area as $area): ?>
              <option value="<?php echo $area['id'] ?>"><?php echo $area['area'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="input-group">
            <label for="selectPrograma" class="input-group-text">Programa</label>
            <select class="form-select" id="filtroPrograma" name="selectPrograma" onchange="buscarlineas(this)" required>
              <option value='' class="d-none">Elige un Programa...</option>
            </select>
          </div>
          <div class="input-group">
            <label for="selectArea" class="input-group-text">Linea</label>
            <select class="form-select" id="filtroLinea" name="selectLinea" required>
              <option value='' class="d-none">Elige una linea...</option>
            </select>
          </div>
          <div class="input-group">
            <label for="selectTrayecto" class="input-group-text">Trayecto</label>
            <select class="form-select" name="selectTrayecto" required>
              <option value='' class="d-none" selected>Elige un trayecto...</option>
              <?php foreach ($resultado_trayecto as $trayecto): ?>
              <option value="<?php echo $trayecto['id'] ?>"><?php echo $trayecto['trayecto'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div>
            <input type="file" name="document" id="document"></input>
          </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="enviar" class="btn btn-primary" onclick="validate('#formproyecto')">Terminar</button>
      </div>
    </div>
  </div>
</div>


 
<div class="modal" id="elimpro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-4" id="staticBackdropLabel">Seguro que desea eliminar?</h1>
      </div>
      <div class="modal-body d-grid gap-2">
        <a href="javascript:void(0)" class="btn btn-success delete">Si</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
