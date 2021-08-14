<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="The SimRacing Management">
        <meta name="author" content="Francisco Costa">
        <meta name="application-name" content="SimRacingWorld">
        <title>SimRacingWorld</title>

        <!-- Bootstrap core CSS -->
        <!-- Bootstrap CSS -->
        <link href="<?= ($BASE) ?>/styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= ($BASE) ?>/styles/js/bootstrap.bundle.min.js" type="text/javascript"></script>

        <!-- reference your copy Font Awesome here (from our CDN or by hosting yourself) -->
        <link href="<?= ($BASE) ?>/styles/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="<?= ($BASE) ?>/styles/fontawesome/css/brands.css" rel="stylesheet">
        <link href="<?= ($BASE) ?>/styles/fontawesome/css/solid.css" rel="stylesheet">

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

    </head>

    <body>  
        <header>
            <div class="collapse bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">About</h4>
                            <p class="text-muted">
                                Sim Racing World is all about bringing business management to simracing.
                                It's about managing your driver career, it's about managing your team.
                                <br/>It's about racing business...
                            </p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Signup</h4>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white">Signup as Driver</a></li>
                                <li><a href="#" class="text-white">Signup as Team Manager</a></li>
                                <li><a href="#" class="text-white">League administrator, register here </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <img src="<?= ($BASE) ?>/styles/logo.png" width="180" alt="SimRacingWorld">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>

        <main>
            <section class="py-5 text-center container" >
                <div class="row py-lg-5" style="background-image: url('<?= ($BASE) ?>/styles/background.jpg'); background-repeat: no-repeat; background-position: bottom; background-size: cover">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light text-light">Get to the  action!</h1>
                        <p class="lead text-light">
                            Choose you way.<br/>
                            Driver or Team Manager.<br/>
                            You can even be both a Driver and Team Manager.
                        </p>
                        <a  href="/racers/auth/showlogin"><button type="submit" class="btn btn-primary my-2">Drivers</button></a>
                        <a  href="/teams/auth/showlogin"><button type="submit" class="btn btn-primary my-2">Teams</button></a>
                    </div>
                </div>
            </section>
        </main>

        <footer class="text-muted py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
                <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
            </div>
        </footer>

        <script src="styles/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
