@extends('layouts.app')

@section('content')
    
    @component('components.container')
        @slot('content')
            @include('atendimentos.includes.menu')
            @include('atendimentos.includes.form', [
                'action' => route('atendimentos.update', $atendimento->id),
                'update' => true
            ])
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h4 class="alert-heading">Ops! Tivemos alguns problemas.</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endslot        
    @endcomponent

@endsection