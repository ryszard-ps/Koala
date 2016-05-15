   <div id="page-wrapper">
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Archivos cargados correctamente </h1>
           </div>
           <!-- /.col-lg-12 -->
       </div>
       <div class="row">
         <!-- El tipo de codificación de datos, enctype, DEBE especificarse como sigue -->
       </div>
     </br>

        <div class="panel-heading" id="_ajax_xml_esperando">

        </div>

        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Archivos asignados</h3>
          </div>
          <div class="panel-body">
            <div class="row" id="_ajax_xml_warning">

              <?php
              $Leer = new LeerArchivos();
              $rfc = $_SESSION['usuario']['rfc'];
              $Leer->archivosTemporales($rfc);
              ?>

            </div>
          </div>
        </div>

   </div>
   <!-- /#page-wrapper -->
  </div>
