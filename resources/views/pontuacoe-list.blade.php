<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pontuacoes</title>
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
                    <div class="card-header">Pontuações</div>
                    <div class="card-body" >
                        <table class="table table-hover table-condensed" id="pontuacoes-table">
                            <thead>
                                <th>#</th>
                                <th>Oferta</th>
                                <th>Grupo</th>
                                <th>Pontos</th>
                                <th>Pontuação máxima</th>
                                <th>Descrição</th>
                                <th>ID do Oferta</th>
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
                    <div class="card-header">Adicionar nova Pontuação</div>
                    <div class="card-body">
                        <form action="{{ route('add.pontuacoe') }}" method="post" id="add-pontuacoe-form" autocomplete="off">
                            @csrf
                            <select name="oferta_id">
                                <option>-- Selecione uma Oferta --</option>
                                @foreach($ofertas as $oferta)
                                <option value="{{ $oferta->id }}" {{ ($pontuacoe->oferta_id ?? old('oferta_id')) ==
                                    $oferta->id ? 'selected' : '' }} >{{ $oferta->curso }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text oferta_id_error"></span>
                            <div class="form-group">
                                <label for="">Grupo</label>
                                <input type="text" class="form-control" name="grupo" placeholder="Nome do grupo">
                                <span class="text-danger error-text grupo_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Pontos</label>
                                <input type="numeric" class="form-control" name="pontos" placeholder="Pontos">
                                <span class="text-danger error-text pontos_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Pontuação máxima</label>
                                <input type="numeric" class="form-control" name="pontuacao_max" placeholder="Pontuação máxima">
                                <span class="text-danger error-text pontuacao_max_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Descrição</label>
                                <textarea name="descricao" id="" cols="40" rows="5">

                                </textarea>
                                <span class="text-danger error-text descricao_error"></span>
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

    @include('edit-pontuacoe-modal')
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

                //ADD NEW PONTUAÇÕES
                $('#add-pontuacoe-form').on('submit', function(e){
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
                                $('#pontuacoes-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                             }
                        }
                    });
                });

                //GET ALL PONTUAÇÕES
                $('#pontuacoes-table').DataTable({
                     processing:true,
                     info:true,
                     ajax:"{{ route('get.pontuacoes.list') }}",
                     "pageLength":5,
                     "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                     columns:[
                        //  {data:'id', name:'id'},
                         {data:'DT_RowIndex', name:'DT_RowIndex'},
                         {data:'oferta.curso', name:'oferta.curso'},
                         {data:'grupo', name:'grupo'},
                         {data:'pontos', name:'pontos'},
                         {data:'pontuacao_max', name:'pontuacao_max'},
                         {data:'descricao', name:'descricao'},
                         {data:'oferta_id', name:'oferta_id'},
                         {data:'actions', name:'actions'},

                     ]

                });

                $(document).on('click','#editPontuacoeBtn', function(){
                    var id = $(this).data('id');
                    $('.editPontuacoe').find('form')[0].reset();
                    $('.editPontuacoe').find('span.error-text').text('');
                    $.post('<?= route("get.pontuacoe.details") ?>',{id:id}, function(data){
                          //alert(data.details.id);
                        $('.editPontuacoe').find('input[name="pid"]').val(data.details.id);
                        $('.editPontuacoe').find('input[name="grupo"]').val(data.details.grupo);
                        $('.editPontuacoe').find('input[name="pontos"]').val(data.details.pontos);
                        $('.editPontuacoe').find('input[name="pontuacao_max"]').val(data.details.pontuacao_max);
                        $('.editPontuacoe').find('input[name="descricao"]').val(data.details.descricao);
                        $('.editPontuacoe').find('input[name="oferta_id"]').val(data.details.oferta_id);
                        $('.editPontuacoe').modal('show');
                    },'json');
                });


                //UPDATE PONTUAÇÃO DETAILS
                $('#update-pontuacoe-form').on('submit', function(e){
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
                                  $('#pontuacoes-table').DataTable().ajax.reload(null, false);
                                  $('.editPontuacoe').modal('hide');
                                  $('.editPontuacoe').find('form')[0].reset();
                                  toastr.success(data.msg);
                              }
                        }
                    });
                });

                //DELETE PONTUAÇÃO RECORD
                $(document).on('click','#deletePontuacoeBtn', function(){
                    var id = $(this).data('id');
                    var url = '<?= route("delete.pontuacoe") ?>';

                    swal.fire({
                         title:'Tem certeza?',
                         html:'Você deseja <b>excluir</b> esta pontuacão?',
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
                                       $('#pontuacoes-table').DataTable().ajax.reload(null, false);
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
