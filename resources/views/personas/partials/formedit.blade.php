<div class="modal fade" id="modalEditPersona" tabindex="-1" role="dialog" aria-labelledby="modalEditPersona" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="personaedit" action="" method="POST" >
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" class="form-control" placeholder="" >

          <div class="form-group">
              <label for="textselectvotacion">votacion:</label>
              <select class="d-block w-100 p-1" name="votacion" id="votacion">
                <option value="NO">NO</option>
                <option value="SI">SI</option>
              </select>

          </div>
         

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="personaedit" >Actualizar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="botoncerrarmodal">Cerrar</button>
      </div>
    </div>
  </div>
</div>