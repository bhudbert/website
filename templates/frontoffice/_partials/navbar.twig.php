<navbar class="top-bar row" id="front">
    <div class="columns width-25 ">
        <a href="{{   path('home') }}" id="trademark" >
            <img id="logo" src="{{   asset("img/logo.png") }}">
            <span>&nbsp;Bruno HUDBERT</span>
        </a>
    </div>
    <div class="columns width-50 text-center">
        <ul class="menu">
            <li><a href="{{   path('blog_home') }}">Blog</a></li>
            <li><a href="{{   path('project_home') }}">Portfolio projets</a></li>
            <li><a href="{{   path('trainings_home') }}">Formations</a></li>
            <li class="menu-navbar-item-last"><a href="{{   path('aboutme') }}" class="me">Qui suis-je</a></li>
        </ul>
    </div>
    <div class="columns width-25">
        {% if app.user %}
        <a href="{{   path('user_logout') }}" id="logout"  class="button navbar-button alert float-right">Deconnexion</a>
        <a href="{{   path('admin') }}" id="administration"  class="button navbar-button  primary-light   float-right">Administration</a>
        {% else %}
        <a href="{{   path('user_login') }}" class="button white navbar-button primary float-right" id="login" >Connexion</a>
        <a href="{{   path('user_register') }}" id="register"  class="button primary-light  navbar-button float-right">S'inscrire</a>
        {% endif %}
    </div>
</navbar>