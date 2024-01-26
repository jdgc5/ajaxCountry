<div class="modal" id="deleteMovieModal" tabindex="-1"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete movie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" id="code" maxlength="3" placeholder="Código del país."/>
        <input type="text" id="name" maxlength="100" placeholder="Nombre del país."/>
      </div>
        <form id="formDeleteV3" action="{{ url('/') }}" method="post">
            @csrf
            @method('delete')
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="btnCrearPais" class="btn btn-primary">Crear pais</button>
      </div>
    </div>
  </div>
</div>