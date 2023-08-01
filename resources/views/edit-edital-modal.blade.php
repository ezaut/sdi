<div class="modal fade editEdital" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Edital</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('update.edital.details') ?>" method="post" id="update-edital-form">
                    @csrf
                     <input type="hidden" name="id_edital">
                     <div class="form-group">
                         <label for="">Nome do edital</label>
                         <input type="text" class="form-control" name="nome_edital" placeholder="Nome do edital">
                         <span class="text-danger error-text nome_edital_error"></span>
                     </div>
                     <div class="form-group">
                         <label for="">Data de início</label>
                         <input type="date" class="form-control" name="dt_inicio" placeholder="Data de início">
                         <span class="text-danger error-text dt_inicio_error"></span>
                     </div>
                     <div class="form-group">
                        <label for="">Data do fim</label>
                        <input type="date" class="form-control" name="dt_fim" placeholder="Data do fim">
                        <span class="text-danger error-text dt_fim_error"></span>
                    </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-block btn-success">SALVAR</button>
                     </div>
                 </form>


            </div>
        </div>
    </div>
</div>
