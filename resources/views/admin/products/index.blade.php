@extends('admin.partials.master')

@section('content')
    <div class="product-list">
        <h2>Hey, I'm product list</h2>
        <ul class="products">
            @foreach($items as $item)
            <li>{{ $item->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection