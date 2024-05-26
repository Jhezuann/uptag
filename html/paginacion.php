<div class="d-flex justify-content-center">
  <div class="mt-3">
    <ul class="pagination">
      <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
        <a class="page-link" href="inicio.php?pagina=<?php echo max($_GET['pagina'] - 1, 1); ?>">Anterior</a>
      </li>
      
      <?php for ($i = 1; $i <= $totalProyectos; $i++): ?>
      <li class="page-item <?php echo $_GET['pagina'] == $i ? 'active' : '' ?>">
        <a class="page-link" href="inicio.php?pagina=<?php echo $i ?>"><?php echo $i ?></a>
      </li>
      <?php endfor ?>  
      
      <li class="page-item <?php echo $_GET['pagina'] >= $totalProyectos ? 'disabled' : '' ?>">
        <a class="page-link" href="inicio.php?pagina=<?php echo min($_GET['pagina'] + 1, $totalProyectos); ?>">Siguiente</a>
      </li>
    </ul>
  </div>
</div>
