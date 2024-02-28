
<fieldset>
    <legend>Informacion General</legend>
    <!-- titulo -->
    <label for="id">Codigo vendedor</label>
    <input type="number" id="id" name="vendedor[id]" placeholder="id" value="<?php echo s($vendedor->getAll('id')) ?>">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre" value="<?php echo s($vendedor->getNombre()) ?>">
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido" value="<?php echo s($vendedor->getApellido()) ?>">
    
</fieldset>

<fieldset>
    <legend>Informacion Extra</legend>
    <!-- titulo -->
    <label for="phone">Telefono Celular</label>
    <input type="number" id="phone" name="vendedor[phone]" placeholder="Celular empresa" value="<?php echo s($vendedor->getPhone()) ?>">
</fieldset>