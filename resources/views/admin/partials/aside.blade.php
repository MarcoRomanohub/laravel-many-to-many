<aside class="bg-dark navbar-dark text-white ">
    <nav>
        <ul>
            <li>
                <a href="{{ route('admin.home') }}">
                    <i class="fa-solid fa-house"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-diagram-project"></i>
                    Progetti
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Nuovo Progetto
                </a>
            </li>
            <li>
                <a href="{{ route('admin.technologies.index') }}">
                    <i class="fa-brands fa-codepen"></i>
                    Tecnologie
                </a>
            </li>
            <li>
                <a href="{{ route('admin.types.index') }}">
                    <i class="fa-solid fa-list"></i>
                    Tipologie
                </a>
            </li>
            <li>
                <a href="{{ route('admin.technology_projects') }}">
                    <i class="fa-solid fa-list"></i>
                    Elenco tech/projects
                </a>
            </li>
        </ul>
    </nav>
</aside>
