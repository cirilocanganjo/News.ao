{{-- Outra parte da gestão de notícias --}}

<div class="row">

{{-- Titulo--}}
    <div class="col-md-6">
        <strong>{{ $noticia->titulo }} </strong>
    </div>


{{-- Autor--}}
    <div class="col-md-3">
    {{ $noticia->autor }} 
    </div>


{{-- Icones --}}
<div class="col-md-3 text-right">

    {{-- Visibilidade --}}
  
    @if($noticia->visivel == 1)
    <a href="tornar_invisivel/{{ $noticia->id_noticia }}">
        <span class="glyphicon glyphicon-eye-open" style="margin-left: 10px; margin-right: 50px;" ><strong>visivel</strong></span>
    </a>
    
    @else
    <a href="tornar_visivel/{{ $noticia->id_noticia }}">
        <span class="glyphicon glyphicon-eye-open" style="margin-left: 10px; margin-right: 50px; color: #ddd;"><strong>invisivel</strong></span>
    </a>



@endif
    {{-- Editar --}}

    <a href="editar/{{ $noticia->id_noticia }}" class="btn btn-primary">
        <span class="glyphicon glyphicon-pencil" style="margin-left: 10px;"><strong>editar</strong></span>
    </a>

    {{-- Eliminar dados--}}

    <a href="apagar/{{ $noticia->id_noticia }}"  class="btn btn-danger">
        <span class="glyphicon glyphicon-trash" style="margin-left: 10px;"></span>
    </a>

    </div>

</div>