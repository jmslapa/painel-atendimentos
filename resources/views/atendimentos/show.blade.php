@extends('layouts.app')

@section('content')
    
    @component('components.container')
        @slot('content')           
            @include('atendimentos.includes.menu')
            <div class="py-5">
                <h2>Atendimento: {{ $atendimento->id }}</h2>
                <hr>
                <h3>Cliente: {{ $atendimento->cliente }}</h3> 
                <hr>               
                <h3>Técnico: {{ $atendimento->user->name }}</h3> 
                <hr>               
                <h3>Tipo de atendimento: {{ $atendimento->tipo->name }}</h3>
                <hr>
                <h3>Observações:</h3>
                <h5 class="border  p-3">{{ $atendimento->observacao }}</h5>
                <br>
                <div class="d-flex justify-content-around">
                    <span class="h3">Primeiro contato: {{ date('d/m/Y', strtotime($atendimento->created_at))}}</span>
                    <span class="h3">Última atualização: {{ date('d/m/Y', strtotime($atendimento->created_at))}}</span>
                </div>
            </div>
        @endslot        
    @endcomponent

@endsection