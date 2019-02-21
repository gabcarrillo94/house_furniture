<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close"
          data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"
        id="favoritesModalLabel">Eliminar Elemento</h4>
      </div>
      <div class="modal-body">
        <br>
        <h3 class="text text-danger">Are you sure you want to delete the album # {{ session('idAlbum') }} ? </h3>
        <p>If you click and nothing happens, please try again by clicking on the button</p>
        <br><br>
        <button type="button"
           class="btn btn-default"
           data-dismiss="modal">Close</button>
        <span class="pull-right">
          <button type="button" class="btn btn-success delete-modal-btn">
            <a  href="{{ route('album/delete') }}">Delete</a>
          </button>
      </div>

    </div>
  </div>
</div>
