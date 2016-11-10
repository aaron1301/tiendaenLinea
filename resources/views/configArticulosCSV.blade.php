@extends('layouts.administrar')

@section('contenido_administrar')
<div class="panel panel-default">
    <div class="panel-heading">Generar Articulos Desde CSV</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{url('/generarArticulosCSV')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="nombre" class="col-md-4 control-label">Archivo</label>
                <div class="col-md-6">
                    <input name="archivo" type="file" class="form-control" accept=".csv" required>                                
                </div>
            </div>        

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Generar Articulos</button>
                    <a href="{{url('/administrar')}}" class="btn btn-primary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
