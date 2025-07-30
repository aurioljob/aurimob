
    <nav class="navbar navbar-expand-lg navbar-light text-white" style="background-color: #f2f0ec;">
        <div class="container-fluid">
            <img src="{{ asset('images/monLogo.png') }}" alt="AURIMOB" height="50" style="border-radius: 50%;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @php
                $route = request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.properties.index') }}" @class(['nav-link','active'=>str_contains($route,'property.')])>Dashbord</a>
                    </li>
                    <li class="nav-item">
                        <a  @class(['nav-link','active'=>str_contains($route,'option.')]) href="{{route ('admin.option.index') }}">Options</a>
                    </li>
                    <li class="nav-item">
                        <a  @class(['nav-link','active'=>str_contains($route,'category.')]) href="{{route ('admin.category.index') }}">Categories</a>
                    </li>
                </ul>
                <div class="ms-auto">
                    @auth
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="nav-link" >Se deconnecter</button>
                                </form>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

