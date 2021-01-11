<!-- Modal -->
<div class="modal fade" id="modal_practicas" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar prácticas</h5>
                <input type = "text" id = "id_turno_practicas" hidden>
            </div>
            <div class="modal-body">
                <div class = "row">
                    <div class = "col-sm-3">
                        <p>Código</p>
                        <input type = "number" class = "form-control" id = "codigo_practica">
                    </div>
                    <div class = "col-sm-9">
                        <p>Práctica</p>
                        <input type = "text" class = "form-control" id = "practica">    
                    </div>
                </div>
                <div class = "table-responsive mt-2">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th nowrap>Cod.</th>
                                <th nowrap>Práctica</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>