<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-primary text-light">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Información de Usuario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
                <div class="col">
                    {{-- @foreach ($datos as $dato)
                    <div class="">Usuario: {{$dato->name}}</div>
                    <div class="">correo: {{$dato->email}}</div>
                    @endforeach --}}
                    
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>