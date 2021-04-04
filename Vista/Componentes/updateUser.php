<div class="card m-auto mt-2 shadow  rounded col-sm-10 col-md-5">
    <form method="post" class="">
        <div class="card-header">
            <h3>Editar Usuario</h3>
        </div>
        <div class="card-body">

            <?php
            if(isset($_POST['editar'])){

                $valor = $_POST['editar'];
                $set = "idUsuario";
                $user = dbUser::query($set, $valor);
                
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
                $roles = dbRol::list();
                echo '<select id="rol" name="rol" class="form-select" >';
                foreach ($roles as $key => $value) {
                    if ($value[1] == $user[4]) {
                        echo '<option selected value="' . $user[4] . '">' . $user[6] . '</option>';
                    } else {
                        echo '<option value="' . $value[0] . '">' . $value[1] . '</option>';
                    }
                }
                echo '</select>';
                echo '</div>';
                
                echo ' <button type="submit" class="btn btn-primary mt-3">Actualizar</button>';
            }
                
            ?>
        </div>
    </form>
    <?php
    $logup = new ControllerUser();
    $logup->update();
    ?>


</div>