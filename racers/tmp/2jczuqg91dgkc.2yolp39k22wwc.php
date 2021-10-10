<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="The Sim Racing World">
        <meta name="author" content="Francisco Costa">
        <meta name="application-name" content="Sim Racing World">
        <title><?= ($myappname) ?> <?= ($myappversion) ?></title>

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

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?= ($login) ?></h3></div>
                                    <div class="card-body">
                                        <form id="forgotpassform" name="forgotpass_form" action="forgotPass" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"><?= ($email) ?></label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" required placeholder="Enter email address" />
                                            </div>
                                            <button type="submit" class="btn btn-primary"><?= ($ok) ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div>&nbsp;</div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Sim Racing World</div>
                        <div>
                            <a href="#"><?= ($privacy) ?></a>
                            &middot;
                            <a href="#"><?= ($termsconditions) ?></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </body>
</html>