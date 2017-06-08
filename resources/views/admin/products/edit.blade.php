@extends('admin.partials.master')

@section('content')
    <div class="product-list">
        <h2>Hey, I'm the product edit panel</h2>
        @if (isset($errors) && !$errors->isEmpty())
        {{ dd($errors) }}
        @endif
        @if (Session::has('response'))
            <div class="message"><span>{{ Session::get('response.message') }}</span></div>
        @endif
        <form action="{{ route('admin.'.$resource.'.'.$action, ['id' => $model->id]) }}" method="POST">
            {{ csrf_field() }}
            @if (!is_null($model->id))
                 <input type="hidden" name="_method" value="PUT">
            @endif
            @foreach($model->getColumns() as $column)
                <label for="{{ $column }}">{{ $model->getColumnLabel($column) }}</label>
                <input type="text" name="{{ $column }}" value="{{ $model->$column }}">
            @endforeach
            <button type="submit" class="btn btn-default">Salvar</button>
        </form>
        <form action="{{ route('admin.'.$resource.'.destroy', ['id' => $model->id]) }}" method="POST">
            {{ csrf_field() }}
            @if (!is_null($model->id))
                 <input type="hidden" name="_method" value="DELETE">
            @endif
            <button type="submit" class="btn btn-default">Apagar</button>
        </form>

    </div>
@endsection