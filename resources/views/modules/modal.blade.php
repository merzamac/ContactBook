<div id="modelConfirm" class="modal " tabindex="-1" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.85); z-index: 1050; display: none; overflow-y: auto;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow border-0">
            <div class="d-flex justify-content-end p-2">
                <button type="button" class="btn-close" onclick="closeModal('modelConfirm')" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center px-4 pb-4 pt-0">
                <svg class="text-danger mx-auto mb-3" style="width: 5rem; height: 5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                
                <h3 class="fs-5 fw-normal text-secondary mb-4">¿Estas seguro que quieres eliminar este contacto ?</h3>
                
                <form id="deleteForm" action="" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-3 py-2 me-2" onclick="closeModal('modelConfirm')">
                        Sí, estoy seguro
                    </button>
                </form>
                <input 
                    type="button"
                    onclick="closeModal('modelConfirm')" 
                    class="btn btn-light border text-dark px-3 py-2"
                    value="No, cancelar"
                />
            </div>
        </div>
    </div>
</div>