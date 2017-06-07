@extends('admin.partials.master')

@section('content')
    <div class="product-list">
        <h2>Hey, I'm product list</h2>
        <a href="{{ route("admin.{$resource}.create") }}">
            <button class="btn btn-default">
                Adicionar item
            </button>
        </a>
        <ul class="products">
            @foreach($items as $item)
            <li><a href="{{ route("admin.{$resource}.edit", ['id' => $item->id]) }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection