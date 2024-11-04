<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="/website/assets/img/logo.svg" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                @foreach ($links as $link)
                <li><a href="{{ $link->link }}">{{ $link->name }}</a></li>    
                @endforeach
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>