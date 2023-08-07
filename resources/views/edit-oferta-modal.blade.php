<div class="modal fade editOferta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Oferta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= route('update.oferta.details') ?>" method="post" id="update-oferta-form">
                    @csrf
                    <input type="hidden" name="oid">
                    <div class="form-group">
                        <select name="edital_id">
                            <option>-- Selecione um Edital --</option>
                            @foreach($editais as $edital)
                            <option value="{{ $edital->id }}" {{ ($produto->edital_id ?? old('edital_id')) ==
                                $edital->id ? 'selected' : '' }} >{{ $edital->nome_edital }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text edital_id_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Nome do curso</label>
                        <input type="text" class="form-control" name="curso" placeholder="Nome do curso">
                        <span class="text-danger error-text curso_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Disciplina</label>
                        <input type="text" class="form-control" name="disciplina" placeholder="Disciplina">
                        <span class="text-danger error-text disciplina_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Carga horária</label>
                        <input type="number" class="form-control" name="carga_horaria" placeholder="Carga horária">
                        <span class="text-danger error-text carga_horaria_error"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">SALVAR</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
