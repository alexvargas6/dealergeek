<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">

            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('showPaquetes') }}"><i class="menu-icon fa fa-calendar"></i>Paquetes</a>
                </li>
                <!-- <li>
                    <a href="{{ route('admin.panel') }}"><i class="menu-icon fa fa-user"></i>Panel del administrador</a>
                </li>-->
                <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="menu-icon fa fa-ban"></i>Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>  
            </li>
               
            </ul>

        </div>
    </nav>
</aside>
