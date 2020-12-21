</script>
@extends('layouts.app')

@section('pageScripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $('#tabela-clientes').DataTable({
        "language": {
          "paginate": {
              "first":      "Primeira",
              "last":       "Última",
              "next":       "Próxima",
              "previous":   "Anterior"
          },
          "info": "Mostrar _START_ de _END_ de _TOTAL_ linhas",
          "lengthMenu":     "Mostrar _MENU_ Linhas",
          "search":         "Procurar:",
          "infoEmpty":      "Mostrando 0 para 0 de 0 linhas",
          "emptyTable":     "Nenhum dado para mostrar",
        }
      });
  }); 
  $( ".botaoExcluir" ).click(function() {
      $('#id_customer').val($(this).attr("data-id"));
  });
</script>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12">
    
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    @if (session('error_message'))
        <div class="alert alert-danger">
            {{ session('error_message') }}
        </div>
    @endif
    @if (session('warning_message'))
        <div class="alert alert-warning">
            {!! session('warning_message') !!}
        </div>
    @endif
    @if (session('info_message'))
        <div class="alert alert-info">
            {{ session('info_message') }}
        </div>
    @endif
  </div>
</div>
<div class="col-lg-12">
  <!-- general form elements -->
  <div class="box box-solid box-primary">
    <div class="box-header with-border" style="background-color: #f87561;">
      <h3 class="box-title">{{ $title }}</h3>
      <a href="{{ url('/register') }}"><button type="submit" class="btn btn-success pull-right">CADASTRAR NOVO</button></a>
    </div>

      <div class="box-body">
          <div class="table-responsive">
            <table class="display tabela-sku" id="tabela-clientes" style="font-size: 13px;">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Galc</th>
                  <th>Endereço de Instalação</th>
                  <th>Porta</th>
                  <th>Velocidade</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customers as $customer)
                  <tr>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->galc}}</td>
                    <td>{{$customer->installation_address}}</td>
                    <td>{{$customer->door}}</td>
                    <td>{{$customer->velocity}}</td>
                    <td><button class="label label-danger botaoExcluir" data-id="{{ $customer->id }}" data-toggle="modal" data-target="#modalExclusao"><i class="glyphicon glyphicon-remove" title="Excluir" data-toggle="modal" data-target="#exampleModal"></i></button>
                      <a href="{{ url('alterar-cliente/'.$customer->id) }}"><span class="label label-primary"><i class="glyphicon glyphicon-edit" title="Editar"></i></span></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
  </div>  
</div>          
<!-- Modal -->
<div class="modal fade modal-danger" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Exclusão de Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3><p align="center">Tem certeza que deseja excluir o Cliente??</p></h3>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ url('/excluir-cliente') }}">
          <input type="hidden" name="id_customer" id="id_customer" value="">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Excluir</button>
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>
</div> 
@endsection
