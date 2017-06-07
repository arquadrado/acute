@extends('admin.partials.master')

@section('content')
    <div class="product-list">
        <h2>Hey, I'm the product edit panel</h2>
        @if (isset($errors) && !$errors->isEmpty())
        {{ dd($errors) }}
        @endif
        <form action="{{ route('admin.'.$resource.'.store') }}" method="POST">
            {{ csrf_field() }}
            @foreach($model->getColumns() as $column)
                <label for="{{ $column }}">{{ $model->getColumnLabel($column) }}</label>
                <input type="text" name="{{ $column }}">
            @endforeach
            <button type="submit">Salvar</button>
        </form>
    </div>
@endsection