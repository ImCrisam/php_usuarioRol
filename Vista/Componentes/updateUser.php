<div class="card m-auto mt-5 shadow  rounded col-sm-10 col-md-5">
    <form method="post" class="">
        <div class="card-header">
            <h3>Editar Usuario</h3>
        </div>
        <div class="card-body">

            <?php
            $rute = $_SERVER['REQUEST_URI'];
            $valor = explode('?', $rute);
            $valor = explode('=', $rute);
            $set = "idUsuario";
            $user = dbUser::query($set, $valor[1]);
            echo '<div class="form-group mt-1">';
            echo '<label>ID</label>';
            echo '<input  class="form-control" id="id" name="id"  readonly   value="' . $user[0] . '">';
            echo '</div>';
            echo '<div class="form-group mt-1">';
            echo '<label>Nombre</label>';
            echo '<input  class="form-control" id="name" name="name"    value="' . $user[1] . '">';
            echo '</div>';
            echo '<div class="form-group mt-1">';
            echo '<label>Correo</label>';
            echo '<input  class="form-control" id="email" name="email"    value="' . $user[3] . '">';
            echo '</div>';
            echo '<div class="form-group mt-1">';
            echo '<label>Nueva Contraseña </label>';
            echo '<input  type="password" class="form-control" id="password" name="password">';
            echo '</div>';
            echo '<div class="form-group mt-1">';
            echo '<label>Rol</label>';
            echo '<input  type="number" class="form-control" id="rol" name="rol"    value="' . $user[4] . '">';
            echo '</div>';
            echo ' <button type="submit" class="btn btn-primary mt-3">Actualizar</button>'

            ?>
        </div>
    </form>
    <?php
    $logup = new ControllerUser();
    $logup->update();
    ?>


</div>