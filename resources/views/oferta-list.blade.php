<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Ofertas</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ofertas</div>
                    <div class="card-body">
                        <table class="table table-hover table-condensed" id="ofertas-table">
                            <thead>
                                <th>#</th>
                                <th>Edital</th>
                                <th>Curso</th>
                                <th>Disciplina</th>
                                <th>Carga horária</th>
                                <th>ID do Edital</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Adicionar nova Oferta</div>
                    <div class="card-body">
                        <form action="{{ route('add.oferta') }}" method="post" id="add-oferta-form" autocomplete="off">
                            @csrf
                            <select name="edital_id">
                                <option>-- Selecione um Edital --</option>
                                @foreach($editais as $edital)
                                <option value="{{ $edital->id }}" {{ ($oferta->edital_id ?? old('edital_id')) ==
                                    $edital->id ? 'selected' : '' }} >{{ $edital->nome_edital }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text edital_id_error"></span>
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
                                <input type="numeric" class="form-control" name="carga_horaria"
                                    placeholder="Carga horária">
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

    </div>

    @include('edit-oferta-modal')
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script>
        toastr.options.preventDuplicates = true;

         $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });


         $(function(){

                //ADD NEW oferta
                $('#add-oferta-form').on('submit', function(e){
                    e.preventDefault();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                             $(form).find('span.error-text').text('');
                        },
                        success:function(data){
                             if(data.code == 0){
                                   $.each(data.error, function(prefix, val){
                                       $(form).find('span.'+prefix+'_error').text(val[0]);
                                   });
                             }else{
                                 $(form)[0].reset();
                                //  alert(data.msg);
                                $('#ofertas-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                             }
                        }
                    });
                });

                //GET ALL ofertas
                $('#ofertas-table').DataTable({
                     processing:true,
                     info:true,
                     ajax:"{{ route('get.ofertas.list') }}",
                     "pageLength":5,
                     "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                     "language": {
                            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
		                },
                     columns:[
                        //  {data:'id', name:'id'},
                         {data:'DT_RowIndex', name:'DT_RowIndex'},
                         {data:'edital.nome_edital', name:'edital.nome_edital'},
                         {data:'curso', name:'curso'},
                         {data:'disciplina', name:'disciplina'},
                         {data:'carga_horaria', name:'carga_horaria'},
                         {data:'edital_id', name:'edital_id'},
                         {data:'actions', name:'actions'},

                     ]

                });

                $(document).on('click','#editOfertaBtn', function(){
                    var id = $(this).data('id');
                    $('.editOferta').find('form')[0].reset();
                    $('.editOferta').find('span.error-text').text('');
                    $.post('<?= route("get.oferta.details") ?>',{id:id}, function(data){
                          //alert(data.details.id);
                        $('.editOferta').find('input[name="oid"]').val(data.details.id);
                        $('.editOferta').find('input[name="curso"]').val(data.details.curso);
                        $('.editOferta').find('input[name="disciplina"]').val(data.details.disciplina);
                        $('.editOferta').find('input[name="carga_horaria"]').val(data.details.carga_horaria);
                        $('.editOferta').find('input[name="edital_id"]').val(data.details.edital_id);
                        $('.editOferta').modal('show');
                    },'json');
                });


                //UPDATE OFERTA DETAILS
                $('#update-oferta-form').on('submit', function(e){
                    e.preventDefault();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend: function(){
                             $(form).find('span.error-text').text('');
                        },
                        success: function(data){
                              if(data.code == 0){
                                  $.each(data.error, function(prefix, val){
                                      $(form).find('span.'+prefix+'_error').text(val[0]);
                                  });
                              }else{
                                  $('#ofertas-table').DataTable().ajax.reload(null, false);
                                  $('.editOferta').modal('hide');
                                  $('.editOferta').find('form')[0].reset();
                                  toastr.success(data.msg);
                              }
                        }
                    });
                });

                //DELETE OFERTA RECORD
                $(document).on('click','#deleteOfertaBtn', function(){
                    var id = $(this).data('id');
                    var url = '<?= route("delete.oferta") ?>';

                    swal.fire({
                         title:'Tem certeza?',
                         html:'Você deseja <b>excluir</b> esta oferta?',
                         showCancelButton:true,
                         showCloseButton:true,
                         cancelButtonText:'Cancelar',
                         confirmButtonText:'Sim, Excluir',
                         cancelButtonColor:'#d33',
                         confirmButtonColor:'#556ee6',
                         width:300,
                         allowOutsideClick:false
                    }).then(function(result){
                          if(result.value){
                              $.post(url,{id:id}, function(data){
                                   if(data.code == 1){
                                       $('#ofertas-table').DataTable().ajax.reload(null, false);
                                       toastr.success(data.msg);
                                   }else{
                                       toastr.error(data.msg);
                                   }
                              },'json');
                          }
                    });

                });
         });

    </script>
</body>

</html
