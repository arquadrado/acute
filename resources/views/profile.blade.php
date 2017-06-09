@extends('partials.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Perfil</h3></div>

                <div class="panel-body profile">
                    <div class="row field">
                        <div class="col-xs-12"><strong>Nome: </strong>{{ Auth::user()->name }}</div>
                    </div>
                    <div class="row field">
                        <div class="col-xs-12"><strong>Email: </strong>{{ Auth::user()->email }}</div>
                    </div>
                    <div class="row field">
                        <div class="col-xs-12"><strong>Membro desde: </strong>{{ Auth::user()->created_at }}</div>
                    </div>

                    <div class="row field">
                        <div class="col-xs-12"><strong>Tipo: </strong>{{ Auth::user()->display_type }}</div>
                    </div>

                    @if (Auth::user()->patology)
                    <div class="row field">
                        <div class="col-xs-12"><strong>Patologia: </strong>{{ Auth::user()->patology }}</div>
                    </div>
                    @endif

                    @if (Auth::user()->treatment)
                    <div class="row field">
                        <div class="col-xs-12"><strong>Tratamento: </strong>{{ Auth::user()->treatment }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
