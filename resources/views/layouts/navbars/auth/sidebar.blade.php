
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps bg-white" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
        <img src="/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
        <span class="ms-3 font-weight-bold">Codelab - CMS</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard/inicio') ? 'active' : '') }}" href="{{ url('dashboard/inicio') }}">
          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-shop"></i>
          </div>
          <span class="nav-link-text ms-1">Inicio</span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Ajustes</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard/cabecera') ? 'active' : '') }} " href="{{ url('dashboard/cabecera') }}">
          <div class="icon  icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-user"></i>  
          </div>  
          <span class="nav-link-text ms-1">Cabecera</span>
        </a>
        <!-- <a class="nav-link {{ (Request::is('dashboard/menus') ? 'active' : '') }} " href="{{ url('dashboard/menus') }}">
          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-list"></i>  
          </div>    
          <span class="nav-link-text ms-1">Menús</span>
        </a> -->
        <a class="nav-link {{ (Request::is('dashboard/empresa') ? 'active' : '') }} " href="{{ url('dashboard/empresa') }}">
          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-info"></i>  
          </div> 
          <span class="nav-link-text ms-1">Empresa</span>
        </a>
      </li>
      
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Contenido</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ ( preg_match('/mensajes/', Request::path()) ? 'active' : '') }}" href="{{ url('dashboard/mensajes') }}">
          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-message"></i>
          </div>
          <span class="nav-link-text ms-1">Mensajes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ ( preg_match('/secciones/', Request::path()) ? 'active' : '') }}" href="{{ url('dashboard/secciones') }}">
          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-rug"></i>
          </div>
          <span class="nav-link-text ms-1">Secciones</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ ( preg_match('/planes/', Request::path()) ? 'active' : '') }}" href="{{ url('dashboard/planes') }}">
          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-table-list"></i>
          </div>
          <span class="nav-link-text ms-1">Planes y Servicios</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ ( preg_match('/testimonios/', Request::path()) ? 'active' : '') }}" href="{{ url('dashboard/testimonios') }}">
          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-user-check"></i>
          </div>
          <span class="nav-link-text ms-1">Testimonios</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ ( preg_match('/preguntas/', Request::path()) ? 'active' : '') }}" href="{{ url('dashboard/preguntas') }}">
          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-circle-question"></i>
          </div>
          <span class="nav-link-text ms-1">Preguntas Frecuentes</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
