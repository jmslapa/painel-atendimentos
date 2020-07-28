@extends('layouts.app')

@section('content')
    
    @component('components.container')
        @slot('content')           
            @include('atendimentos.includes.menu')
            <div class="alert alert-{{$responseData['type']}} my-5" role="alert">
                <h4 class="alert-heading">{{ $responseData['type'] == 'success' ? 'Sucesso!' : 'Ops! Tivemos um problema' }}</h4>
                <p>{{ $responseData['message'] }}</p>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg btn-block">Retornar</a>
        @endslot        
    @endcomponent

@endsection