{{-- Página inicial, apresenta as notícias visíveis --}}

    @extends('layouts.app')

    @section('conteudo')
    
    {{-- Caso não haja notícias no DB --}}
       
        @if(count($dados) == 0)
        
        <p class="alert alert-danger text-center">Não foram encontradas notícias</p>
         @else

        {{-- Apresentará as notícias armazenadas no DB --}} 

        {{-- criando uma variável contador de notícias no app --}}

            @php
                $total = 0;
            @endphp

        
            @foreach($dados as $noticia)

            {{-- Condição para verificar se a notícia está visível --}}

            @if($noticia->visivel == 1)

            {{-- Cabeçalho da notícia: [Autor,titulo, updated-at] --}}
            
            <div class="row bg-primary">               
                {{--Titulo --}}

                <div class="col-md-9">
                    <h2>{{ $noticia->titulo }}</h2>
                </div>

                {{-- Autor e hora de atualização --}}

                <div class="col-md-3 text-right" style="padding-top: 11px; font-size: 12px; ">
                    <span class="">Publicada por:</span> {{$noticia->autor}} 
                    <span class=""></span> {{$noticia->updated_at->diffForHumans() }}

                </div>
            </div>

            {{-- Texto ou corpo da noticia --}}


            <div class="row">
                <div class="col-md-12" style="padding-top: 5px">
                    {{$noticia->texto}}
                </div>
            </div>

            {{-- Separador  linha horizontal --}}
            <hr>

            {{-- Atualização do total de notícias --}}
               
                @php
                    $total++;
                @endphp

            @endif
            @endforeach

            {{-- Apresenta o número de notícias visíveis --}}

                <div class="row">
                    <div class="col-md-12 text-right">
                        <p><strong>Total de notícias: {{$total}} </strong></p>
                  
                    </div>
                </div>
                
               
     @endif 

        @endsection

   