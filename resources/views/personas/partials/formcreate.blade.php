<div class="modal fade" id="modalCreatePersona" tabindex="-1" role="dialog" aria-labelledby="modalCreatePersona" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="personacreate"  action="{{route('persona.import')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
              <label for="textInputfile">Importar Registros:</label>
              <input type="file" name="file" class="form-control" placeholder="">
              <div class="invalid-feedback" id="errorfile"></div>
          </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="personacreate" >Importar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="botoncerrarmodal">Cerrar</button>
      </div>
    </div>
  </div>
</div>