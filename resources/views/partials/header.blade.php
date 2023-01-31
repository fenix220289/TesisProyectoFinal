<style>
    .hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(180deg, #0000008c 0%, #0000008c 100%), url(<?= $cabecera->imagen;?>);
        background-size: cover;
        clip-path: polygon(0 0, 100% 0, 100% 80%, 50% 95%, 0 80%);
        z-index: -1;
    }
</style>

<header class="hero">
    <nav class="nav container">
        <div class="nav__logo"> 
            <h2 class="nav__title" style="display: flex;"> <img src="./images/codelab.png" class="nav__img" style="display: block; width: 40px; margin-right: 10px;"> {{ $empresa->descripcion }}</h2>
        </div>

        <ul class="nav__link nav__link--menu">
            @foreach ($menus as $menu)
                <li class="nav__items">
                <a href="{{ $menu['url'] }}" class="nav__links">{{ $menu['text'] }}</a>
                </li>
            @endforeach
            <li class="nav_items">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard/inicio') }}" class="nav__links">Panel Admin</a>
                    @else
                        <a href="{{ route('login') }}" class="nav__links">Entrar</a>
                    @endauth
                @endif
            </li>
            <img src="./images/close.svg" class="nav__close">
        </ul>

        <div class="nav__menu">
            <img src="./images/menu.svg" class="nav__img">
        </div>
    </nav>

    <section class="hero__container container">
        <h1 class="hero__title">{{ $cabecera->titulo }}</h1>
        <p class="hero__paragraph">{{ $cabecera->descripcion }}</p>
    </section>
</header>