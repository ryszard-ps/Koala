<body>
  <div class="tab-content col-lg-12">
    <form action="?vista=reporte" method="POST">
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="rfc_receptor" name="datos[]" checked="checked">RFC Empleado</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="nombre_xml" name="datos[]" checked="checked">UUID</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="fecha_pago" name="datos[]" checked="checked">Fecha de pago</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="fecha_visto" name="datos[]" checked="checked">Visto</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="fecha_descarga" name="datos[]" checked="checked">Descargado</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="rfc_responsable" name="datos[]" checked="checked">RFC Responsable</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="nombres" name="datos[]" checked="checked">Nombre del Empleado</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="apellido_p" name="datos[]" checked="checked">Apellido paterno</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="apellido_m" name="datos[]" checked="checked">Apellido materno</label>
      </div>

      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="curp" name="datos[]" checked="checked">CURP</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="nss" name="datos[]" checked="checked">No. de Seguro Social</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="puesto" name="datos[]" checked="checked">Puesto</label>
      </div>
      <div class="checkbox">
        <label class="checkbox-inline"><input type="checkbox" value="departamento" name="datos[]" checked="checked">Departamento</label>
      </div>


      <br>
      <br>
      <div class="radio">
        <label>
          <input type="radio" name="option" id="1" value="1" checked>
            Todos
        </label>
        <label>
          <input type="radio" name="option" id="2" value="2" >
            Vistos y Descargados
        </label>
        <label>
          <input type="radio" name="option" id="3" value="3" >
            Vistos
        </label>
        <label>
          <input type="radio" name="option" id="4" value="4" >
            Descargados
        </label>
        <label>
          <input type="radio" name="option" id="5" value="5" >
            Sin acciones
        </label>
      </div>
      <br>
      <br>
      <input type="submit" class="btn btn-danger"  name="reporte_pdf" value="PDF">
      <input type="submit" class="btn btn-success" name="reporte_excel"  value="EXCEL">
      <input type="submit" class="btn btn-info" name="reporte_word"  value="WORD">
      <br>
      <br>
      <br>
      <br>
    </form>
  </div>
</body>
