<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Editais</title>
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
                        <div class="card-header">Editais</div>
                        <div class="card-body">
                            <table class="table table-hover table-condensed" id="editais-table">
                                <thead>
                                    <th>#</th>
                                    <th>Nome do Edital</th>
                                    <th>Data do início</th>
                                    <th>Data do fim</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Adicionar novo Edital</div>
                        <div class="card-body">
                            <form action="{{ route('add.edital') }}" method="post" id="add-edital-form" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nome do Edital</label>
                                    <input type="text" class="form-control" name="nome_edital" placeholder="Nome edital">
                                    <span class="text-danger error-text nome_edital_error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Data do início</label>
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

    </div>

     @include('edit-edital-modal')
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

                //ADD NEW EDITAL
                $('#add-edital-form').on('submit', function(e){
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
                                $('#editais-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                             }
                        }
                    });
                });

                //GET ALL EDITAIS
                $('#editais-table').DataTable({
                     processing:true,
                     info:true,
                     ajax:"{{ route('get.editais.list') }}",
                     "pageLength":5,
                     "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                     columns:[
                        //  {data:'id', name:'id'},
                         {data:'id_edital', name:'id_edital'},
                         {data:'nome_edital', name:'nome_edital'},
                         {data:'dt_inicio', name:'dt_inicio'},
                         {data:'dt_fim', name:'dt_fim'},
                         {data:'actions', name:'actions'},
                     ]
                });

                $(document).on('click','#editEditalBtn', function(){
                    var id_edital = $(this).data('id_edital');
                    $('.editEdital').find('form')[0].reset();
                    $('.editEdital').find('span.error-text').text('');
                    $.post('<?= route("get.edital.details") ?>',{id_edital:id_edital}, function(data){
                        //  alert(data.details.edital_name);
                        $('.editEdital').find('input[name="id_edital"]').val(data.details.id_edital);
                        $('.editEdital').find('input[name="nome_edital"]').val(data.details.nome_edital);
                        $('.editEdital').find('input[name="dt_inicio"]').val(data.details.dt_inicio);
                        $('.editEdital').find('input[name="dt_fim"]').val(data.details.dt_fim);
                        $('.editEdital').modal('show');
                    },'json');
                });


                //UPDATE EDITAL DETAILS
                $('#update-edital-form').on('submit', function(e){
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
                                  $('#editais-table').DataTable().ajax.reload(null, false);
                                  $('.editEdital').modal('hide');
                                  $('.editEdital').find('form')[0].reset();
                                  toastr.success(data.msg);
                              }
                        }
                    });
                });

                //DELETE EDITAL RECORD
                $(document).on('click','#deleteEditalBtn', function(){
                    var id_edital = $(this).data('id_edital');
                    var url = '<?= route("delete.edital") ?>';

                    swal.fire({
                         title:'Tem certeza?',
                         html:'Você deseja <b>excluir</b> este edital?',
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
                              $.post(url,{id_edital:id_edital}, function(data){
                                   if(data.code == 1){
                                       $('#editais-table').DataTable().ajax.reload(null, false);
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
