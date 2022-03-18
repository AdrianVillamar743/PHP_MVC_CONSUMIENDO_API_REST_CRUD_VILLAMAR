<!DOCTYPE html>
<html lang="en">
<head>
<?php include ('cabecera.php'); ?>
</head>
<body>

<div name="contenedor_central">

<center>
<div>
<header>
      <h1>CRUD LIBRO</h1>  
    </header>

<section>
    <div class="col-md-5">
        <form action="#" id="f">
            <div id='d1'></div>
         ID <input type="text" name="id" id="id" class="form-control" readonly="true">
         NOMBRE<input type="text" name="nombre" id="nombre" class="form-control" >  
         DESCRIPCION <input type="text" name="descripcion" id="descripcion" class="form-control" >  
        <br>
        <section>
        <input type="reset" class="btn btn-primary" value="Nuevo" onclick="$('#g').attr('disabled',false)">
         <input type="submit" name="insertar" id="g" value="Guardar" class="btn btn-primary" disabled="true">
         <input type="submit" name="modificar" value="Modificar" class="btn btn-primary">
         <input type="button" id="eliminar"  value="Eliminar" class="btn btn-primary">
        

        </section>
        
      
      </form>
    </div>
</section>
</div>



<div class="col-md-5">
    <br>
    <h3>Listado de libros</h3>
    <br>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
  
  <?php foreach ($librodevuelto as $libro) { 
        $id=$libro->getId();
        $nombre=str_replace(" ","&nbsp;",$libro->getNombre());
        $descripcion=str_replace(" ","&nbsp;",$libro->getDescripcion());

        echo"
        <tr>
        <td>$id</t>
        <td>$nombre</td>
        <td>$descripcion<td/>
        <button onclick=$('#id').val('$id');$('#nombre').val('$nombre');$('#descripcion').val('$descripcion') class='btn btn-success'>Editar</button>
             
        </tr>";
   } ?>
  </tbody>
</table>
</div>


</center>
</div>

</body>


</html>