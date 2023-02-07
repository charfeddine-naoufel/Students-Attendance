<div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
    <ul class="navigation-left">
        <li class="nav-item  " data-item="dashboard">
            <a class="nav-item-hold" href="#">
                <i class="nav-icon i-Bar-Chart"></i>
                <span class="nav-text">Dashboard</span>
            </a>
            <div class="triangle"></div>
        </li>



        <li class="nav-item " data-item="forms">
            <a class="nav-item-hold" href="#">
                <i class="nav-icon i-File-Clipboard-File--Text"></i>
                <span class="nav-text">Forms</span>
            </a>
            <div class="triangle"></div>
        </li>

        <li class="nav-item" data-item="apps">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Computer-Secure"></i>
                    <span class="nav-text">Calendrier</span>
                </a>
                <div class="triangle"></div>
            </li>





    </ul>
</div>
<div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
    <i class="sidebar-close i-Close" (click)="toggelSidebar()"></i>
    <header>
        <div class="logo">
            <img src="{{asset('assets/images/logo.png')}}" alt="">
        </div>
    </header>
    <!-- Submenu Dashboards -->
    <div class="submenu-area" data-parent="dashboard">
        <header>
            <h6>Dashboard</h6>
            <p>Enseignant/Absence</p>
        </header>

    </div>
    <div class="submenu-area" data-parent="forms">
        <header>
            <h6>Classes</h6>

        </header>
        <ul class="childNav" data-parent="forms">

            <li class="nav-item">
                <a class="" href="{{route('prof.mesclasses')}} ">
                    <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                    <span class="item-name">Mes Classes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="" href="http://gull-html-laravel.ui-lib.com/forms/forms-basic">
                    <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                    <span class="item-name">Mes Elèves</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="submenu-area" data-parent="apps" style="display: none;">
            <header>
                <h6>Apps</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav" data-parent="apps">

    
                <li class="nav-item">
                    <a class="" href="http://gull-html-laravel.ui-lib.com/apps/calendar">
                        <i class="nav-icon i-Calendar-4"></i>
                        <span class="item-name">Calendrier</span>
                    </a>
                </li>
                
            </ul>
        </div>








</div>