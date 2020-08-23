<navbar class="top-bar row">
    <div class="columns width-25 ">
        <a href="{{   path('home') }}" id="trademark" >

            <span>&nbsp;Bruno HUDBERT</span>
        </a>
    </div>
    <div class="columns width-50 text-center">
        <ul class="menu">
            <li><a href="{{   path('admin_blog_home') }}">Blog</a></li>
            <li><a href="{{   path('admin_project_home') }}">Projets</a></li>
            <li><a href="{{   path('admin_trainings_home') }}">Formations</a></li>
        </ul>
    </div>
    <div class="columns width-25">
         <a href="{{   path('user_login') }}" id="connexion"  class="button float-right">Connexion</a>
    </div>
</navbar>