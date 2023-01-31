@extends('layouts.web')

@section('content')

<section class="secciones container" style="width: 100%; max-width: 100% !important;">
    @foreach ($secciones as $seccion)
        <?= $seccion->contenido; ?>
    @endforeach
</section>

<section id="price" class="price container">
    <h2 class="subtitle">Elije el plan que mas se adapte a tus necesidades</h2>

    <div class="price__table">
        
        @foreach ($planes as $plan)
            @if($plan->especial) 
            <div class="price__element price__element--best">
            @else
                <div class="price__element">
            @endif
                <p class="price__name">{{ $plan->nombre }}</p>
                <h3 class="price__price">
                    {{ ($plan->precio > 0)? "$".(int)$plan->precio."/" : "" }} {{ $plan->tipoPlan->descripcion }}
                </h3>
                <div class="price__items">
                    @foreach ($plan->detalles as $detalle)
                        <p class="price__features">{{ $detalle->servicio->descripcion }}</p>
                    @endforeach
                </div>

                <a href="#" class="price__cta">Empieza ahora</a>
            </div>
        @endforeach
    </div>
</section>

<section class="testimony">
    <div class="testimony__container container">
        <img src="./images/leftarrow.svg" class="testimony__arrow" id="before">

        @foreach ($testimonios as $key => $testimonio)
            <section class="testimony__body @if($key == 1) testimony__body--show @endif" data-id="{{ ($key+1) }}">
                <div class="testimony__texts">
                    <h2 class="subtitle">Mi nombre es {{ $testimonio->persona }}, 
                        <span class="testimony__course">{{ $testimonio->cargo }}.</span>
                    </h2>
                    <p class="testimony__review">{{ $testimonio->testimonio }}</p>
                </div>

                <figure class="testimony__picture">
                    <img src="{{ $testimonio->foto }}" class="testimony__img">
                </figure>
            </section>
        @endforeach
        <img src="./images/rightarrow.svg" class="testimony__arrow" id="next">
    </div>
</section>

<section class="questions container">
    <h2 class="subtitle">Preguntas frecuentes</h2>
    <p class="questions__paragraph">Tienes preguntas? aca te dejamos las respuestas</p>

    <section class="questions__container">
        @foreach ($preguntas as $pregunta)
            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">{{ $pregunta->pregunta }}
                        <span class="questions__arrow">
                            <img src="./images/arrow.svg" class="questions__img">
                        </span>
                    </h3>
                    <div class="questions__show"><?php echo html_entity_decode($pregunta->respuesta); ?></div>
                </div>
            </article>
        @endforeach        
    </section>
</section>

<section id="contact" class="contact">
    <div class="contact__container container">
        @if (Session::get('message'))
            <div class="mensaje__enviado">
                {{ Session::get('message') }}
            </div>
        @endif
        <h2 class="subtitle">Contáctanos</h2>
        <form method="POST" action="{{ route('mensaje.send') }}">
            @csrf
            <div class="row mt-2">
            <label class="@error('nombre') text-danger @enderror">Nombre</label>
                <input 
                    type="text" 
                    name="nombre"
                    value="{{ old('nombre') }}"
                    placeholder="Nombre:" 
                    class="form_input @error('nombre') border-danger @enderror" >
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label class="@error('contacto') text-danger @enderror">Teléfono / Correo electrónico</label>
                <input 
                    type="text" 
                    name="contacto"
                    value="{{ old('contacto') }}"
                    placeholder="Telf / Email:" 
                    class="form_input @error('contacto') border-danger @enderror" >
                @error('contacto')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
            <label class="@error('asunto') text-danger @enderror">Asunto</label>
                <input 
                    type="text" 
                    name="asunto"
                    value="{{ old('asunto') }}"
                    placeholder="Asunto:" 
                    class="form_input @error('mensaje') border-danger @enderror">
                @error('asunto')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
            <label class="@error('mensaje') text-danger @enderror">Mensaje</label>
                <textarea 
                    name="mensaje"
                    rows="15" 
                    placeholder="Mensaje:" 
                    class="form_text_area @error('mensaje') border-danger @enderror" 
                    >{{ old('mensaje') }}</textarea>
                @error('mensaje')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <input type="submit" value="Enviar formulario" class="footer__submit mt-2">
            </div>
        </form>
    </div>
</section>
@endsection