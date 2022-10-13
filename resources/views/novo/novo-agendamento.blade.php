@extends('layouts.main')

@section('title', 'Agendamentos')

@section('content')
<h1>Agenda por dia</h1>

<form method="POST" action="/novo">
    <div class="formulario1">
        @csrf
        <label for="dur">Duração desejada para cada atendimento:</label>
        <input type="number" min = "1" max="60" id="dur">
        <label for="vagas">Vagas:</label>
        <input type="number" min="1" max="40" id="vagas">
        <label for="vagas">Simultaneos:</label>
        <input type="number" min="1" max="40" id="vag_hr"> <!--value="" disabled=""-->
        <p>
        <input type="submit" class="btn btn-primary" value="Criar" >
        </p>
    </div>
</form>

<h1>Dias que serão disponibilizados</h1>

<div id="event-create-container" class="formulario1">

    <form action="/novo" method="POST">
        @csrf
    <div class="form-group">
        <label for="title">Descrição</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Título">
    </div> <br>

    <div class="form-group">
        <label for="começo">Começo dos atendimentos: </label>
        <input type="datetime" class="form-control" id="começo" name="start" placeholder="começo">
    </div> <br>
    <div class="form-group">
        <label for="fim">Fim dos atendimentos: </label>
        <input type="datetime" class="form-control" id="fim" name="end" placeholder="fim" value="$fim" disabled=""> 
    </div>

        <p>
            <input type="submit" class="btn btn-primary" value="Criar" >
            <input type="reset" class="btn btn-primary" value="Limpar" >
        </p>
</div>
    </form>
@endsection  