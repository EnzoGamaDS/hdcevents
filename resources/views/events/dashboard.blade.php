@extends('layout.main')

@section('title', 'dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                    <td><a href="#">Editar</a></td>
                    <td><a href="#">Deletar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Você ainda não tem eventos, <a href="/events/create">criar eventos.</a></p>
    @endif
</div>

@endsection