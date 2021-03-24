<div class="card m-auto mt-5 shadow  rounded col-sm-10 col-md-5">
     <form method="post" class="">
         <div class="card-header">
             <h3>Registrar</h3>
         </div>
         <div class="card-body">
         <div class="form-group mt-1">
                 <input  class="form-control" id="name" name="name" placeholder="Nombre">
             </div>
             <div class="form-group mt-1">
                 <input type="number" class="form-control" id="rol" name="rol" placeholder="Rol">
             </div>
             <div class="form-group mt-1">
                 <input type="email" class="form-control" id="email" name="email" placeholder="Email">
             </div>
             <div class="form-group mt-1">
                 <input type="password" class="form-control" id="password" name="password" placeholder="Password">
             </div>
             <button type="submit" class="btn btn-primary mt-3">Ingresar</button>
         </div>
     </form>
     <?php
        $logup = new ControllerUser();
        $logup->logup();
        ?>


 </div>