@extends('layouts.app')

@section('content')
    
    @component('components.container')
        @slot('content')           
            @include('atendimentos.includes.menu')
            
            <div class="mt-4">
                <form action="{{ route('atendimentos.search') }}">                    
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Search"
                        value="{{ $filter ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="fas fa-search    "></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive my-4">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Técnico</th>                
                            <th>Tipo</th>                                
                            <th>Inicio</th>                                                
                            <th>Último contato</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($atendimentos as $atendimento)
                            <tr>
                                <td scope="row">{{ $atendimento->id }}</td>
                                <td>{{ $atendimento->cliente }}</td>
                                <td>{{ $atendimento->user->name }}</td>                            
                                <td>{{ $atendimento->tipo->name }}</td>                            
                                <td>{{ date('d/m/Y', strtotime($atendimento->created_at)) }}</td>                           
                                <td>{{ date('d/m/Y', strtotime($atendimento->updated_at)) }}</td>
                                <td>
                                    <a class="text-info text-decoration-none" 
                                    href="{{ route('atendimentos.show', $atendimento->id) }}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    <a class="text-secondary text-decoration-none" 
                                    href="{{ route('atendimentos.edit', $atendimento->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @isset($filter)
                {{ $atendimentos->appends($filter)->links() }}
            @else
                {{ $atendimentos->links() }}
            @endisset
        @endslot        
    @endcomponent

@endsection