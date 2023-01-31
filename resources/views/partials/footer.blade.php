<footer class="footer">
    <section class="footer__container container">
        <nav class="nav nav--footer">
            <h2 class="footer__title">Codelab VE.</h2>

            <ul class="nav__link nav__link--footer">
                @foreach ($menus as $menu)
                    <li class="nav__items">
                        <a href="{{ $menu['url'] }}" class="nav__links">{{ $menu['text'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <form class="footer__form" action="https://formspree.io/f/mknkkrkj" method="POST">
            <h2 class="footer__newsletter">Suscribete a la newsletter</h2>
            <div class="footer__inputs">
                <input type="email" placeholder="Email:" class="footer__input" name="_replyto">
                <input type="submit" value="Registrate" class="footer__submit">
            </div>
        </form>
    </section>

    <section class="footer__copy container">
        <div class="footer__social">
            <a href="#" class="footer__icons"><img src="./images/facebook.svg" class="footer__img"></a>
            <a href="#" class="footer__icons"><img src="./images/twitter.svg" class="footer__img"></a>
            <a href="#" class="footer__icons"><img src="./images/youtube.svg" class="footer__img"></a>
        </div>

        <h3 class="footer__copyright">&copy; Codelab Venezuela, C.A.</h3>
    </section>
</footer>