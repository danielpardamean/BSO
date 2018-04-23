<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('landing') }}">
        <img src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        {{ config('app.name') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    @if (!auth('mahasiswa')->check() AND !auth('pegawai')->check())
        <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">
            <button type="button" class="btn btn-primary">Login</button>
        </a>
        </li>
    @else
        <li class="nav-item dropdown" id="profile" :class="{ show: isShowing }">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" :aria-expanded="isShowing" @click.prevent="toggleDropdown">{{ auth('mahasiswa')->check() ? auth('mahasiswa')->user()->name : auth('pegawai')->user()->name . " - " . auth('pegawai')->user()->tipe->name }}</a>
            <div class="dropdown-menu" :class="{ show: isShowing }" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </li>
        <script>
            profile = new Vue({
                el: '#profile',
                data() {
                    return {
                        isShowing: false
                    }
                },
                methods: {
                    toggleDropdown(){
                        this.isShowing = !this.isShowing;
                    }
                }
            })
        </script>
    @endif
        
    </ul>
    </div>
</nav>