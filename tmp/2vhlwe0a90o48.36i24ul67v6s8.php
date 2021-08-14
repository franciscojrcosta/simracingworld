<!DOCTYPE html>
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
        <link href="/styles/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="/styles/fontawesome/css/brands.css" rel="stylesheet">
        <link href="/styles/fontawesome/css/solid.css" rel="stylesheet">

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
                                        <form id="loginform" name="login_form" action="/racers/doLogin" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"><?= ($email) ?></label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" required placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword"><?= ($password) ?></label>
                                                <input class="form-control py-4" id="inputPassword" name="password" type="password" required placeholder="Enter password" />
                                                <!--<h5 style="color: red"><?= ($loginMsg1) ?></h5>
                                                <h5 style="color: red"><?= ($loginMsg2) ?></h5> -->
                                            </div>
                                            <?php if ($loginError==true): ?>
                                                
                                                    <div class="alert alert-danger" role="alert">
                                                        <?= ($loginMsg1) ?><?= ($loginMsg2)."
" ?>
                                                    </div>
                                                
                                            <?php endif; ?>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="btn btn-info" href="/racers/auth/showsignup"><?= ($signup) ?></a>
                                                <button type="submit" class="btn btn-primary"><?= ($login) ?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="forgotpass"><?= ($forgotpassword) ?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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
        </div>
    </body>
</html>