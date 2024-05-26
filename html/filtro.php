<div class="card">
  <div class="card-body">
    <h5 class="mb-3">Filtrar Proyectos</h5>
    <form method="POST" id="filtro" name="filtro">
    <div class="input-group">
      <select class="form-select mb-2" name="filtroArea" onchange="buscarprogramas(this)">
        <option value='' class="">Todas</option>
        <?php foreach ($resultado_area as $area): ?>
        <option value="<?php echo $area['id'] ?>" <?= @$filtroArea==$area['id'] ? 'Selected' : ''?> ><?php echo $area['area'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
     <div class="input-group">
      <select class="form-select mb-2" id="filtroPrograma" name="filtroPrograma"  onchange="buscarlineas(this)">
        <option value='' class="">Todas</option>
        <?php if(isset($filtroArea)){ ?>
            <?php foreach ($resultado_programa as $programa): ?>
            <option value="<?php echo $programa['id'] ?>" <?= @$filtroPrograma==$programa['id'] ? 'Selected' : ''?> ><?php echo $programa['programa'] ?></option>
            <?php endforeach ?>
        <?php } ?>
      </select>
    </div>
    <div class="input-group">
      <select class="form-select mb-2" id="filtroLinea" name="filtroLinea">
        <option value='' class="">Todas</option>
        <?php if(isset($filtroPrograma)){ ?>
            <?php foreach ($resultado_linea as $linea): ?>
            <option value="<?php echo $linea['id'] ?>" <?= @$filtroLinea==$linea['id'] ? 'Selected' : ''?> ><?php echo $linea['linea'] ?></option>
            <?php endforeach ?>
        <?php } ?>
      </select>
    </div>
   
    <div class="d-grid gap-2">
      <button name="filtro" onclick="$('#filtro').submit();"  class="btn btn-warning">Filtrar</button>    
    </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  function buscarprogramas(areas){
    var area=$(areas).val();
    $.getJSON('conexion/search.php',{'action':'buscarprogramas','id':area},function(data){
      var text="<option value='' class='d-none' selected>Elige un Programa...</option>";
      for(i in data){
        text +='<option value="'+data[i][0]+'">'+data[i][1]+'</option>';
      }
      $(areas).parents('form').find('#filtroPrograma').html(text).change();
    })
  }

  function buscarlineas(programas){
    var programa=$(programas).val();
    $.getJSON('conexion/search.php',{'action':'buscarlineas','id':programa},function(data){
      var text="<option value='' class='d-none' selected>Elige una Linea...</option>";
      for(i in data){
        text +='<option value="'+data[i][0]+'">'+data[i][1]+'</option>';
      }
      $(programas).parents('form').find('#filtroLinea').html(text).change();
    })
  }
</script>