<!-- Modal -->
<div class="modal fade" id="modal_practicas" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class = "col-sm-2">
                    <h5 class="modal-title" id="exampleModalLabel"><input type = "text" class = "form-control" id = "id_obra_social" style = "border:none;background-color:transparent;"></h5>
                </div>
                <input type = "text" id = "id_turno_practicas" hidden>
            </div>
            <div class="modal-body">
                <div class = "row">
                    <input type = "number" class = "form-control" id = "nomenclador_practicas">
                    <input type = "number" class = "form-control" id = "id_practica" hidden>
                    <div class = "col-sm-3">
                        <p>Código</p>
                        <input type = "number" class = "form-control" id = "codigo_practica">
                    </div>
                    <div class = "col-sm-9">
                        <p>Práctica</p>
                        <input type = "text" class = "form-control" id = "practica"> 
                    </div>
                </div>
                <div id = "tabla_agregados">
                <div class = "table-responsive mt-2">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th nowrap>Cod.</th>
                                <th nowrap>Práctica</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class = "tabla_agregado" id = "tabla_agregado">
                           
                        </tbody>
                    </table>
                </div>
                </div>
                <div id = "tabla_busquedas" style = "display:none;">
                <div class = "table-responsive mt-2">
                    <table class = "table">
                        <thead>
                            <tr>    
                                <th nowrap>Cod.</th>
                                <th nowrap>Práctica</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class = "tabla_busqueda" id = "tabla_busqueda">
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/modales/modal_practicas.blade.php ENDPATH**/ ?>