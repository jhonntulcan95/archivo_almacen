<div id="div_table_registros" class="row">
    <table id="table_archivo" class="bordered striped centered responsive-table">
        <thead>
            <th>Codigo</th>
            <th width='150px'>Fecha/A-m-d</th>
            <th width='350px'>Asunto</th>
            <th>Destinatario</th>
            <th>Cargo/Dependencia</th>
            <th>Remitente</th>
            <th>Cargo/Dependencia</th>
            <th>N° Hojas</th>
            <th><i class='zmdi zmdi-edit'></i></th>
            <th><i class='zmdi zmdi-close'></i></th>
            <th>Ver Imagen</th>
            </thead>
            <?php
                foreach ($documentos as $row) {
    echo "<tr>";
    echo "<td>".$row['codigo']."</td><td>".$row['fecha']."</td><td>".$row['asunto']."</td><td>".$row['destinatario']."</td>
          <td>".$row['cargo_dependencia_destinatario']."</td><td>".$row['remitente']."</td><td>".$row['cargo_dependencia_remitente']."</td><td>".$row['numero_hojas']."</td>";
      echo "<td>";
      ?>
      <form method="post" action="<?php echo base_url();?>inicio/modificar_registro/<?php echo $row['codigo']?>">
        <button title="Modificar" type="submit"><i class='zmdi zmdi-edit'></i></button>
      </form>
          <?php
      echo "</td>";
      echo "<td>";
      ?>
          <a title="Eliminar Documento" onclick="eliminar_documento('<?php echo $row['codigo'];?>');">
          <?php
      echo "<i class='zmdi zmdi-close'></i></a>";
      echo "</td>";
      echo "<td>";
          ?>
          <a title="Ver Fotografia" onclick="ver_imagen('<?php echo $row['codigo'];?>');">
          <?php
      echo "<i class='zmdi zmdi-eye'></i></a></td>";
      echo "</tr>";
  }
            ?>
    </table>
</div>
        