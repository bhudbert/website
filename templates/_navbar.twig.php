<navbar class="top-bar row">
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
            <li class="menu-navbar-item-last"><a href="{{   path('aboutme') }}">Qui suis-je</a></li>
        </ul>
    </div>
    <div class="columns width-25">
         <a href="{{   path('user_login') }}" id="connexion"  class="button float-right">Connexion</a>
    </div>
</navbar>