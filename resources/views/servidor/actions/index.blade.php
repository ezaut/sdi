<!DOCTYPE html>
<html lang="pt_BR">
<head>
<meta charset="UTF-8">
<title>Laravel 10 Ajax DataTables CRUD (Create Read Update and Delete) - Cairocoders</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<link  href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Inscrição </h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Criar Inscrição</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
        <table class="table table-bordered" id="ajax-crud-datatable">
            <thead>
                <tr>
                    <th>inscricao_id</th>
                    <th>vaga_escolhida</th>
                    <th>dt_inscricao</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- boostrap inscrição model -->
<div class="modal fade" id="inscricao-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inscrição</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="InscricaoForm" name="InscricaoForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="inscricao_id" id="inscricao_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Vaga escolhida</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="vaga_escolhida" name="vaga_escolhida" placeholder="Escolha a vaga" maxlength="50">
                            </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10"><br/>
                        <button type="submit" class="btn btn-primary" id="btn-save">Salvar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
<script type="text/javascript">
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#ajax-crud-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('ajax-crud-datatable') }}",
        columns: [
            { data: 'inscricao_id', name: 'inscricao_id' },
            { data: 'vaga_escolhida', name: 'vaga_escolhida' },
            { data: 'dt_inscricao', name: 'dt_inscricao' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
});

function add(){
    $('#InscricaoForm').trigger("reset");
    $('#InscricaoModal').html("Add Inscricao");
    $('#inscricao-modal').modal('show');
    $('#id').val('');
}

function editFunc(inscricao_id){
    $.ajax({
        type:"POST",
        url: "{{ url('edit') }}",
        data: { inscricao_id: inscricao_id },
        dataType: 'json',
        success: function(res){
            $('#InscricaoModal').html("Edit Inscricao");
            $('#inscricao-modal').modal('show');
            //$('#inscricao_id').val(res.inscricao_id);
            $('#vaga_escolhida').val(res.vaga_escolhida);
            //$('#address').val(res.address);
            //$('#email').val(res.email);
        }
    });
}

function deleteFunc(inscricao_id){
    if (confirm("Delete Record?") == true) {
        var inscricao_id = inscricao_id;
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete') }}",
            data: { inscricao_id: inscricao_id },
            dataType: 'json',
            success: function(res){
                var oTable = $('#ajax-crud-datatable').dataTable();
                oTable.fnDraw(false);
            }
        });
    }
}

$('#InscricaoForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: "{{ url('store')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            $("#inscricao-modal").modal('hide');
            var oTable = $('#ajax-crud-datatable').dataTable();
            oTable.fnDraw(false);
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
        },
        error: function(data){
            console.log(data);
        }
    });
});
</script>
</body>
</html>
