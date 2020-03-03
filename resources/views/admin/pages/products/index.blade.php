@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')
    


@section('content')
    <h1>Exibindo os produtos</h1> 
    <a href="{{route('products.create')}}">Cadastrar</a>
<hr>

    @component('admin.components.card')
        @slot('title')
            <h1>Título Card</h1>
        @endslot
        Um card de exemplo
    @endcomponent
    
    
    <hr>

    @include('admin.includes.alerts', ['content' => 'Alerta de preço de produtos'])

    @if(isset($products))
        @foreach ($products as $product)        
            <p class="@if ($loop->last) last @endif">{{$product}}</p>        
        @endforeach
    @endisset

    <hr>

    @forelse ($products as $product)
        <p class="@if ($loop->first) last @endif">{{$product}}</p>
    @empty
        <p>Não existem produtos cadastrados</p>
    @endforelse


    <hr>
    @if ($teste === '123')
        É igual
    @else
        É diferente
    @endif
<br>
    @unless ($teste === '123')
        É diferente
    @else 
        É igual    
    @endunless
<br>    
    @isset($teste2)
       <p>{{$teste2}}</p> 
    @endisset

    @empty($teste3)
        <p>Vazio...</p>
    @endempty

    @auth
        <p>Autenticado</p>
    @else 
        <p>Não Autenticado</p>    
    @endauth

    @guest
     <p>Não autenticado</p>   
    @endguest

    @switch($teste)
        @case(1)
            Igual a 1
            @break
        @case(2)
            Igual a 2
            @break
        @default
            Default
    @endswitch


@endsection


@push('styles')
    <style>
        .last {
            background-color: #ccc;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef'
    </script>
@endpush