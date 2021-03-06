@extends('layouts.admin2')
@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @section('titulo')<div class="card-header">Actualización de la clave</div>@stop

                <div class="card-body">
                <div>

                </form>
                    <form method="POST" action="{{route('usuarios.edit',['id'=>Auth::user()->id])}}">
                    @method('put')
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña anterior</label>

                            <div class="col-md-6">
                                <input id="oldpassword" maxlength="20" placeholder="Ingrese su contraseña" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="oldpassword"
                                required autocomplete="new-password">

                                    @if(session('errorcambio'))
                                        <div class="invalid-feedback">
                                        <strong>{{session('errorcambio')}}</strong>
                                        </div>
                                    @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" maxlength="20" placeholder="Ingrese su contraseña" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"  class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" maxlength="20" placeholder="Confirme su contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cambiocla">
                                    Guardar
                                </button>

                                <a class="btn btn-primary" type=button href="/home">Regresar</a>

                                <div class="modal" id="cambiocla"tabindex="-1" role="dialog" >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Guardar Cambios</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Desea guardar los cambios realizados?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary " href="/home">
                                    Aceptar
                                    </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
