@extends('admin.partials.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{ $resource }} - {{ $model->designation }}</h1></div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                @if (isset($errors) && !$errors->isEmpty())
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-warning">
                                            <strong>Warning!</strong> {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                @if (Session::has('response'))
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> {{ Session::get('response.message') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('admin.'.$resource.'.'.$action, ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xs-8">
                                    {{ csrf_field() }}
                                    @if (!is_null($model->id))
                                         <input type="hidden" name="_method" value="PUT">
                                    @endif

                                    @foreach($model->getColumns() as $column => $type)
                                        @component("admin.partials.components.input-{$type}", [
                                            'column' => $column,
                                            'label' => $model->getColumnLabel($column),
                                            'value' => $model->$column
                                        ])
                                        @endcomponent
                                    @endforeach
                                </div>
                                <div class="col-xs-4">
                                    @if ($model->isMediable())
                                        <media-box :media="{{ $model->media }}"></media-box>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-default">Salvar</button>
                                </div>
                            </div>
                        </form>




                        <form action="{{ route('admin.'.$resource.'.destroy', ['id' => $model->id]) }}" method="POST">
                            {{ csrf_field() }}
                            @if (!is_null($model->id))
                                 <input type="hidden" name="_method" value="DELETE">
                            @endif
                            <button type="submit" class="btn btn-default">Apagar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection