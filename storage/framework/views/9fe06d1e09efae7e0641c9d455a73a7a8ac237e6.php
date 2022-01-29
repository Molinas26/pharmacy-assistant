<?php $__env->startSection('contenido'); ?>


  <?php $__env->startSection('titulo'); ?><h2 class="text-center">Datos de <?php echo e(Auth::user()->name); ?></h2><?php $__env->stopSection(); ?>

    <!--Mensajes de error-->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php echo e($error); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>


    <br><br>
    <form method="post" action="<?php echo e(route('usuarios.show',['id'=>$empleados->id])); ?>">
        <!--Inicio de formulario--> <!--recibimos el id para mostrar los datos del empleado seleccionado-->

        <?php echo method_field('put'); ?>
        <?php echo csrf_field(); ?>

        <br>
        <div class="form-group row">
            <label for="Nombre" class="col-md-2 col-form-label text-md-right">Nombre</label>

            <div class="col-md-6">
                <input id="Nombre" type="text" class="form-control" name="Nombre" required readonly
                value="<?php echo e($empleados->primer_nombre); ?> <?php echo e($empleados->segundo_nombre); ?> <?php echo e($empleados->primer_apellido); ?> <?php echo e($empleados->segundo_apellido); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="NombreUser" class="col-md-2 col-form-label text-md-right">Nombre de usuario</label>

            <div class="col-md-6">
                <input id="NombreUser" type="text" maxlength="50" class="form-control" name="NombreUser" required readonly
                value="<?php echo e(Auth::user()->username); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Identidad" class="col-md-2 col-form-label text-md-right">Identidad</label>

            <div class="col-md-6">
                <input id="Identidad" type="text" maxlength="13" class="form-control" name="Identidad" required readonly
                value="<?php echo e($empleados->identidad); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Fecha_Nacimiento" class="col-md-2 col-form-label text-md-right">Fecha de nacimiento</label>

            <div class="col-md-6">
                <input id="Fecha_Nacimiento" type="text" class="form-control" name="Fecha_Nacimiento" required readonly
                value="<?php echo e($empleados->fecha_nacimiento); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Fecha_entrada" class="col-md-2 col-form-label text-md-right">Fecha de entrada</label>

            <div class="col-md-6">
                <input id="Fecha_entrada" type="text" class="form-control" name="Fecha_entrada" required readonly
                value="<?php echo e($empleados->fecha_entrada); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Cargo" class="col-md-2 col-form-label text-md-right">Cargo</label>

            <div class="col-md-6">
                <input id="Cargo" type="text" class="form-control" name="Cargo" required readonly
                value="<?php echo e($empleados->cargo); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Telefono"  class="col-md-2 col-form-label text-md-right">Teléfono</label>

            <div class="col-md-6">
                <input id="numero_telefono" maxlength="9" type="number" class="form-control" name="numero_telefono" required
                onkeyup="mensajeChange()" value="<?php echo e($empleados->numero_telefono); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Telefono_emergencia"  class="col-md-2 col-form-label text-md-right">Teléfono de emergencia</label>

            <div class="col-md-6">
                <input id="numero_emergencia" maxlength="9" type="number" class="form-control" name="numero_emergencia" required onkeyup="mensajeChange()"
                value="<?php echo e($empleados->numero_emergencia); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Correo_electronico" class="col-md-2 col-form-label text-md-right">Correo electrónico</label>

            <div class="col-md-6">
                <input id="correo_electronico" maxlength="50" type="email" class="form-control" name="correo_electronico" required onkeyup="mensajeChange()"
                value="<?php echo e($empleados->correo_electronico); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Direccion" class="col-md-2 col-form-label text-md-right">Dirección</label>

            <div class="col-md-6">
                <input id="direccion" type="text" maxlength="100" class="form-control" name="direccion" required onkeyup="mensajeChange()"
                value="<?php echo e($empleados->direccion); ?>">
            </div>
        </div>

        <?php
        $a = $empleados->numero_telefono;
        $b = $empleados->numero_emergencia;
        $c = $empleados->correo_electronico;
        $d = $empleados->direccion;
        ?>


        <script>

        function mensajeChange() {
          const tel = document.getElementById("numero_telefono");
          const emer = document.getElementById("numero_emergencia");
          const dir = document.getElementById("direccion");
          const corr = document.getElementById("correo_electronico");
          const boton1 = document.getElementById("save");
          const boton2 = document.getElementById("limp");

          if (tel.value.trim() !== '<?php echo $a; ?>'||emer.value.trim() !== '<?php echo $b; ?>'||
          dir.value.trim() !== '<?php echo $d; ?>'||corr.value.trim() !== '<?php echo $c; ?>') {
            boton1.removeAttribute('disabled')
            boton2.removeAttribute('disabled')
          } else {
            boton1.setAttribute('disabled', "true");
            boton2.setAttribute('disabled', "true");
          }
        }

      </script>

        <a class="btn btn-primary" type=button href="/home">Regresar</a>

        <button id="limp" type="reset" class="btn btn-primary" disabled>
            Reestablecer
        </button>

        <button id="save" type="button" class="btn btn-primary" data-toggle="modal" data-target="#cambioper" disabled>
           Guardar
        </button>

        <div class="modal" id="cambioper"tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Cambios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea guardar los cambios realizados?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary " href="/home">
            Aceptar
            </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>



    </form><!--Final de formulario-->

<?php $__env->stopSection(); ?><!--Final del contenido-->

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/showUsuario.blade.php ENDPATH**/ ?>