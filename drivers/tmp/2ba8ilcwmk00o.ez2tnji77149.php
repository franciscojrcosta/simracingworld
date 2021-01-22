<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SimRacingWorld</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="<?= ($BASE) ?>/ui/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= ($BASE) ?>/ui/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">SimRacingWorld</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><?= ($home) ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="drivers"><?= ($drivers) ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="teams"><?= ($teams) ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="aboutus"><?= ($aboutus) ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

    </body>
</html>