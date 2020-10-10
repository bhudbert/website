<navbar class="top-bar row" id="admin">
    <div class="columns width-25 ">
        <a href="{{   path('home') }}" id="trademark" >
            <img id="logo" src="{{   asset("img/logo.png") }}">
            <span>&nbsp;
                Bruno HUDBERT
            </span>
        </a>
    </div>
    <div class="columns width-50 text-center">
        <ul class="menu">
            <li><a href="{{   path('admin_blog_home') }}">Blog</a></li>
            <li><a href="{{   path('admin_project_home') }}">Projets</a></li>
            <li><a href="{{   path('admin_trainings_home') }}">Formations</a></li>
            <li><a href="{{   path('admin_medias_home') }}">Medias</a></li>
            <li class="menu-navbar-item-last"><a href="{{   path('admin_global_settings') }}">Général</a></li>
        </ul>
    </div>
    <div class="columns width-25">
        {% if app.user %}
        <a href="{{   path('user_logout') }}" id="logout"  class="button navbar-button alert float-right">Deconnexion</a>
        <a href="{{   path('home') }}" id="administration"  class="button navbar-button  primary-light   float-right">Site Web</a>

        {% else %}
        <a href="{{   path('user_login') }}" class="button white navbar-button primary float-right" id="login" >Connexion</a>
        <a href="{{   path('user_register') }}" id="register"  class="button primary-light  navbar-button float-right">S'inscrire</a>
        {% endif %}
    </div>
</navbar>
{% set route_name=app.request.get('_route')   %}
{% set route_name_parts =  route_name |split('_') %}
 {% if 'global' in route_name_parts %}
    <navbar class="top-bar row" id="sub-admin">
        <div class="columns width-100 text-center">
            <ul class="submenu">
                <li class=""><a href="{{   path('admin_global_technology_home') }}">Technologies</a></li>
                <li class=""><a href="{{   path('admin_global_category_home') }}">Categories</a></li>
            </ul>
        </div>

    </navbar>
{% elseif 'medias' in route_name_parts %}
<navbar class="top-bar row" id="sub-admin">
    <div class="columns width-100 text-center">
        <ul class="submenu">
            <li class=""><a href="{{   path('admin_medias_gallery_home') }}">Images</a></li>
            <li class=""><a href="{{   path('admin_medias_gallery_home') }}">Videos</a></li>
            <li class=""><a href="{{   path('admin_medias_gallery_home') }}">Documents</a></li>
        </ul>
    </div>

</navbar>
{% endif %}


