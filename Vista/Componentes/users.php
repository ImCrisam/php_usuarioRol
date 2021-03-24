<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">

                <div class="card mt-2">
                    <div class="card-header">
                        <a class="btn btn-primary" href="logup">
                            Nuevo Perfil
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered tablaPerfiles" id="tablaPerfiles">
                            <thead>
                                <tr>
                                    <th style="width:10px">ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $users = dbUser::list();

                                foreach ($users as $key => $value) {

                                    echo ' <tr>
                          <td>' . $value["idUsuario"] . '</td>
                          <td>' . $value["nombreUsuario"] . '</td>
                          <td>' . $value["correoUsuario"] . '</td>
                          <td>' . $value["idRol"] . '</td>';

                                    echo '<td>

                          <div class="btn-group">

                            <a class="btn btn-warning"  href="updateUser?id=' . $value["idUsuario"] . '">Editar</a>
                            <a class="btn btn-danger"  href="deleteUser?id=' . $value["idUsuario"] . '">Eliminar</a>


                          </div>

                        </td>

                      </tr>';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>