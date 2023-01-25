<nav class="navbar navbar-expand-xl navbar-withe bg-withe shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fs-5" href="#"><b>PsicolAcademy</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars fa-lg"></i>
        </button>
        <div class="collapse navbar-collapse d-xl-flex justify-content-xl-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @if (Auth::user()->rol_id != 3)
                    {{-- Dashboard --}}
                    <a class="btn btn-outline-primary btn-sm mx-xl-1 my-1 my-xl-0  {{ request()->is('admin/dashboard') ? 'active' : 'border-0' }}"
                        href="{{ url('admin/dashboard') }}">
                        <i class="fa-solid fa-chart-line"></i> Dashboard
                    </a>
                    {{-- Asignaturas --}}
                    <a class="btn btn-outline-primary border-0 btn-sm mx-xl-1 my-1 my-xl-0 {{ request()->is('admin/asignaturas') || request()->is('admin/asignaturas/*') ? 'active' : '' }}"
                        href="{{ route('admin.asignaturas.index') }}">
                        <i class="fa-solid fa-book"></i> Asignaturas
                    </a>
                    {{-- Profesores --}}
                    <a class="btn btn-outline-primary border-0 btn-sm mx-xl-1 my-1 my-xl-0 {{ request()->is('admin/profesores') || request()->is('admin/profesores/*') ? 'active' : '' }}"
                        href="{{ route('admin.profesores.index') }}">
                        <i class="fa-solid fa-chalkboard-user"></i> Profesores
                    </a>
                    {{-- Estudiantes --}}
                    <a class="btn btn-outline-primary border-0 btn-sm mx-xl-1 my-1 my-xl-0 {{ request()->is('admin/estudiantes') || request()->is('admin/estudiantes/*') ? 'active' : '' }}"
                        href="{{ route('admin.estudiantes.index') }}">
                        <i class="fa-solid fa-graduation-cap"></i> Estudiantes
                    </a>
                    {{-- Matriculas --}}
                    <a class="btn btn-outline-primary border-0 btn-sm mx-xl-1 my-1 my-xl-0 {{ request()->is('admin/matriculas') || request()->is('admin/matriculas/*') ? 'active' : '' }}"
                        href="{{ route('admin.matriculas.index') }}">
                        <i class="fa-solid fa-school"></i> Matriculas
                    </a>
                    {{-- clases --}}
                    <a class="btn btn-outline-primary border-0 btn-sm mx-xl-1 my-1 my-xl-0 {{ request()->is('admin/clases') || request()->is('admin/clases/*') ? 'active' : '' }}"
                        href="{{ route('admin.clases.index') }}">
                        <i class="fa-solid fa-chalkboard"></i> Clases
                    </a>
                    {{-- Usuarios --}}
                    <a class="btn btn-outline-primary border-0 btn-sm mx-xl-1 my-1 my-xl-0 {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <i class="fa-solid fa-user"></i> Usuarios
                    </a>
                @else
                    {{-- Usuarios --}}
                    <a class="btn btn-outline-primary border-0 btn-sm mx-xl-1 my-1 my-xl-0 {{ request()->is('admin/semestres') || request()->is('admin/semestres/*') ? 'active' : '' }}"
                        href="{{ url('admin/semestres') }}">
                        <i class="fa-solid fa-calendar-days"></i> Semestre
                    </a>
                @endif

                {{-- LogOut --}}

                <form id="logout-form" action="{{ url('login/out') }}" method="POST">
                    @csrf
                    <div class="ml-auto d-grid">

                        <button class="btn btn-outline-danger border-0 btn-sm mx-1" type="submit" id="btn-salir">
                            Salir <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>
