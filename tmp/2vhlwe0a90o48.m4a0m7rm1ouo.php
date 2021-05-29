<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SRW</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbars" style="">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <i class="fas fa-laptop-house"></i>
                        <?= ($dashboard)."
" ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <i class="fas fa-envelope"></i>
                        <?= ($mailbox)."
" ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <i class="fas fa-id-card"></i>
                        <?= ($license)."
" ?>
                    </a>
                </li>  
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <i class="fas fa-warehouse"></i>
                        <?= ($teams)."
" ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <i class="fas fa-comments-dollar"></i>
                        <?= ($sponsors)."
" ?>
                    </a>
                </li>  
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <i class="fas fa-chart-pie"></i>
                        <?= ($finance)."
" ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <i class="fas fa-trophy"></i>
                        <?= ($championships)."
" ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <i class="fas fa-user-cog"></i>
                        <?= ($profile)."
" ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <i class="fas fa-power-off"></i>
                        <?= ($logout)."
" ?>
                    </a>
                </li>      
            </ul>
        </div>
    </div>
</nav>