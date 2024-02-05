<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{ url('/dashboard') }}">
                <div class="logo-img">

                </div>
                <span class="text">Klinik</span>
            </a>

        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">

                    <div class="nav-item active">
                        <a href="{{ url('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Tableau de Bord</span></a>
                    </div>


                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Heure de Rendez-Vous</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{ route('appointment.create') }}" class="menu-item">Créer</a>
                            <a href="{{ route('appointment.index') }}" class="menu-item">Voir</a>

                        </div>
                    </div>



                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-heart"></i><span>Prescriptions</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{ route('patient.today') }}" class="menu-item">Aujourd'hui</a>
                            <a href="{{ route('all.prescriptions') }}" class="menu-item">Tout
                                Patients  Prescrits</a>
                        </div>
                    </div>

                    @if (auth()->user()->role_id == 2)
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Departement</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{ route('department.create') }}" class="menu-item">Créer</a>
                                <a href="{{ route('department.index') }}" class="menu-item">Voir</a>

                            </div>
                        </div>

                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-file-text"></i><span>Docteur</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{ route('doctor.create') }}" class="menu-item">Créer</a>
                                <a href="{{ route('doctor.index') }}" class="menu-item">Voir</a>

                            </div>
                        </div>


                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-monitor"></i><span>Rendez-Vous Patients</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{ route('patients') }}" class="menu-item">Rendez-Vous du Jour</a>
                                <a href="{{ route('all.appointments') }}" class="menu-item">Tous les Rendez-Vous</a>

                            </div>
                        </div>

                    @endif

                    <div class="nav-item active">
                        <a onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                            href="{{ route('logout') }}"><i
                                class="ik ik-power dropdown-icon"></i><span>Déconnexion</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
