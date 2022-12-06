@extends('layouts.main')

@section('title', 'Agendar')

@section('content')    

    <div id="events-container" class="col-md-12">
        <h2>Próximas vagas livres</h2>

    
    @foreach($agendas as $agenda)
        @if($loop->first)                                                   <!-- Se for o primeiro loop, já criamos o card com o dia-->
            @php $day = date('d/m', strtotime($agenda -> start)) @endphp <!-- Igualando o primeiro dia com o dia atual, para comparar nos próximos loops-->
                      
            @php 
                $l_start = $agenda -> start;
                $l_assistido = $agenda -> assistido;
            @endphp 
            
                <div id="cards-container">                                      <!-- Container para os cards-->
                <div class="row d-flex justify-content-center">
                    <div class = "card col-md-4">
                        <div class="card-body">
                            <h5 class="card-date">{{$agenda -> dia}}<br>dia {{date('d/m', strtotime($agenda -> start))}}</h5><!-- Imprimindo o dia e mês-->
                            @if (($agenda -> assistido) == null)
                            <p class="datas"> de {{date('H:i', strtotime($agenda -> start))}} <br> até {{date('H:i', strtotime($agenda -> end))}} <br>  
                                <a href="{{ route('assistido.create', $agenda -> id) }}" class="btn btn-success"> {{$agenda -> vag_h}} vaga(s) </a></p>
                            @endif
            
        @endif
        @if($l_start != $agenda -> start || $l_assistido != $agenda -> assistido) <!-- Para mostrar apenas um evento por horario-->
            @if($day != date('d/m', strtotime($agenda -> start)))    <!-- Se for um novo dia, criaremos outro card com o próximo dia-->
                        </div>
                    </div>
                </div>
            </div>
            <div id="cards-container">
                <div class="row d-flex justify-content-center">
                    <div class = "card col-md-4">
                        <div class="card-body">
                            <h5 class="card-date">{{$agenda -> dia}}<br>dia {{date('d/m', strtotime($agenda -> start))}}</h5>
                            @endif
                           <!-- <p class="datas"> de {{date('H:i', strtotime($agenda -> start))}} <br> até {{date('H:i', strtotime($agenda -> end))}} <br>  Imprimindo o horario de atendimento-->
            
                @if (($agenda -> assistido) == null)                           <!-- Se o horario estiver vago, habilita link para cadastrar assistido -->
                    <p class="datas"> de {{date('H:i', strtotime($agenda -> start))}} <br> até {{date('H:i', strtotime($agenda -> end))}} <br>
                    <a href="{{ route('assistido.create', $agenda -> id) }}" class="btn btn-success"> {{$agenda -> vag_h}} vaga(s) </a></p>

                @endif
        
                @php $day = date('d/m', strtotime($agenda -> start))@endphp
            @php 
                $l_start = $agenda -> start;
                $l_assistido = $agenda -> assistido;
            @endphp 
        @endif
    @endforeach
    @if(count($agendas) == 0)
        <p>Não há agendamentos disponíveis</p>
    @endif
    


@endsection  