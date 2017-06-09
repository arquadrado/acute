@extends('admin.partials.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Hey, I'm {{ $resource }} list</h4>
                        <a href="{{ route("admin.{$resource}.create") }}">
                            <button class="btn btn-default">
                                Adicionar item
                            </button>
                        </a>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                @if (Session::has('response'))
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> {{ Session::get('response.message') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <list
                            :items="{{ $items }}"
                            :resource="'{{ $resource }}'"
                            :token="'{{ $token }}'"
                        />

                        {{-- <div class="row">
                            <div class="col-xs-12">
                                <a href="#">
                                    <i class="material-icons">filter_list</i>
                                </a>
                                <a href="#">
                                    <i class="material-icons">sort</i>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="list-group">
                                    @if (count($items))
                                    @foreach($items as $item)
                                    <li class="list-group-item justify-content-between">
                                        {{ $item->designation }}
                                        <span class="pull-right">
                                            <a href="{{ route("admin.{$resource}.edit", ['id' => $item->id]) }}">
                                            <i class="material-icons">mode_edit</i>
                                            </a>
                                        </span>
                                        <span class="pull-right">
                                            <a href="{{ route("admin.{$resource}.show", ['id' => $item->id]) }}">
                                            <i class="material-icons">chevron_right</i>
                                            </a>
                                        </span>
                                        <span class="pull-right">
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.'.$resource.'.destroy', ['id' => $item->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a onclick="document.getElementById('delete-form-{{ $item->id }}').submit();"><i class="material-icons">delete_forever</i></a>
                                            </form>
                                        </span>
                                    </li>
                                    @endforeach
                                    @else
                                        <li class="list-group-item justify-content-between">
                                        There are no {{ $resource }}
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection