<div class="modal fade editPontuacoe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Pontuação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= route('update.pontuacoe.details') ?>" method="post" id="update-pontuacoe-form">
                    @csrf
                    <input type="hidden" name="pid">
                    <div class="form-group">
                        <select name="oferta_id">
                            <option>-- Selecione uma Oferta --</option>
                            @foreach($ofertas as $oferta)
                            <option value="{{ $oferta->id }}" {{ ($pontuacoe->oferta_id ?? old('oferta_id')) ==
                                $oferta->id ? 'selected' : '' }} >{{ $oferta->curso }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text oferta_id_error"></span>
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
