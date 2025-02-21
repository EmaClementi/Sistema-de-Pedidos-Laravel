function mostrarModalConfirmacion(mensaje, pedidoId) {
    var modalBody = document.querySelector('#modalConfirmacion .modal-body');
    var modal = document.getElementById('modalConfirmacion');
    
    modalBody.textContent = mensaje;
    
    var bootstrapModal = new bootstrap.Modal(modal);
    bootstrapModal.show();

    document.getElementById('confirmarEliminacion').onclick = function() {
        document.querySelector(`#formEliminarPedido-${pedidoId}`).submit();
    };
}

