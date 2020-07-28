<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Workspace</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Atendimentos</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="{{ route('atendimentos.index') }}">Todos</a>
                    <a class="dropdown-item" href="{{ route('atendimentos.create') }}">Novo</a>
                </div>
            </li>
        </ul>
    </div>
</nav>