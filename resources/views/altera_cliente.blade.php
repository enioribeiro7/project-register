@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    
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
<div class="container">
  <form method="POST" action="/cadastro-clientes">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
              <div class="panel-heading" style="background-color: #f87561;" >Cadastro</div>
              
              <div class="panel-body">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Nome do Cliente</label>
                            <input type="text" class="form-control" name="name" required="required" placeholder="Nome do Cliente"> 
                          </div>
                        </div>           
                      <div class="col-md-6">
                        <div class="form-group">
                            <label >Galc</label>
                            <input type="text" class="form-control" name="galc" required="required" placeholder="Galc" >
                          </div>
                        </div>           
                      </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                            <label >Porta </label>
                            <input type="text" id="password" name="door" class="form-control" required="required" placeholder="Porta">
                          </div>
                        </div>
                        <div class="col-md-7">
                          <div class="form-group">
                            <label >Endereço de instalação </label>
                            <input type="text" id="password" name="installation_address" class="form-control" required="required" placeholder="Endereço de instalação">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label >Velocidade </label>
                            <input type="text" id="password" name="velocity" class="form-control" required="required" placeholder="Porta">
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <button type="submit" class="btn btn-success pull-right">Salvar</button>
                          {{ csrf_field() }}
                        </div>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </form>
@endsection
