<?php foreach ($resultado_cantidad_proyectos as $w): ?>
  <div class="modal fade" id="e<?php echo $w['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Datos del Proyecto a Modificar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form method="POST" action="modificar.php" class="row g-3 needs-validation was-validated" id='formproyecto' novalidate enctype="multipart/form-data">
            <div class="col-12">
              <label for="tituloProyecto" class="form-label">Titulo del proyecto</label>
              <input type="text" class="form-control" name="titulo" minlength="5" maxlength="30" required 
              value="<?php echo $w['titulo']?>">
            </div>
            <div class="col-9">
              <label for="profTutor" class="form-label">Profesor Tutor</label>
              <input type="text" class="form-control" name="tutor" required
              value="<?php echo $w['tutor']?>">
            </div>
            <div class="col-3">
              <label for="ano" class="form-label">Año</label>
              <input type="text" class="form-control" name="ano" required
              value="<?php echo $w['ano']?>">
            </div>
            <div class="input-group">
              <label for="selectArea" class="input-group-text">Area</label>
              <select class="form-select" name="idarea" onchange="buscarprogramas(this)" required>
                <option value="<?php echo $w['idarea']?>" class="d-none"><?php echo $w['area']?></option>
                <?php foreach ($resultado_area as $area): ?>
                <option value="<?php echo $area['id'] ?>"><?php echo $area['area'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="input-group">
              <label for="selectPrograma" class="input-group-text">Programa</label>
              <select class="form-select" id="filtroPrograma" name="idprograma" onchange="buscarlineas(this)" required>
                <option value='<?php echo $w['idprograma']?>' class="d-none"><?php echo $w['programa']?></option>
              </select>
            </div>
            <div class="input-group">
              <label for="selectArea" class="input-group-text">Linea</label>
              <select class="form-select" id="filtroLinea" name="idlinea" required>
                <option value='<?php echo $w['idlinea']?>' class="d-none"><?php echo $w['linea']?></option>
              </select>
            </div>
            <div class="input-group">
              <label for="selectTrayecto" class="input-group-text">Trayecto</label>
              <select class="form-select" name="idtrayecto" required>
                <option value='<?php echo $w['idtrayecto']?>' class="d-none" selected><?php echo $w['trayecto']?></option>
                <?php foreach ($resultado_trayecto as $trayecto): ?>
                <option value="<?php echo $trayecto['id'] ?>"><?php echo $trayecto['trayecto'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div>
              <input type="file" name="document" id="pdf" value="<?php echo $w['pdf']?>" required></input>
              <input type="hidden" class="d-none" value="<?php echo $w['id']?>" name="id">
            </div>
            <input type="submit" class="btn btn-primary">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>