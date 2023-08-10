<div class="modal fade" id="confirm-delete<?php echo $dataMiProd['tempId']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="deleteProduct.php" method="POST">
                <input type="text" name="id" value="<?php echo $dataMiProd['tempId']; ?>" hidden>
                <div class="modal-header text-center">
                    <h4 class="modal-title text-center">Eliminar Producto</h4>
                </div>
                <div class="modal-body text-center" style="border-bottom:1px solid #e9ecef;">
                    <label style="color: #333; font-weight:600;">
                        ¿Estás seguro de eliminar el Producto?
                    </label>
                </div>

                <div class="modal-body text-center">
                    <button type="submit" class="btn btn-primary" style="color:#fff; padding: 0px 50px; border-radius: 20px; margin: 0px 30px;" data-dismiss="modal">Sí</button>
                    <a class="btn btn-danger" onclick="salir_modal('<?php echo $dataMiProd['tempId']; ?>')" style="color:#fff; padding: 0px 50px; border-radius: 20px;" data-dismiss="modal">No
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>