<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="RedeVoluntariado">
        <meta name="author" content="Francisco Costa">
        <meta name="application-name" content="Sim Racing World">
        <title><?= ($lang_myappname) ?> <?= ($lang_myappversion) ?></title>

        <!-- Bootstrap core CSS -->
        <!-- Bootstrap CSS -->
        <link href="/styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="/styles/js/bootstrap.bundle.min.js" type="text/javascript"></script>

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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?= ($lang_login) ?></h3></div>
                                    <div class="card-body">
                                        <form id="loginform" name="login_form" action="doLogin" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"><?= ($lang_email) ?></label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" required placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword"><?= ($lang_password) ?></label>
                                                <input class="form-control py-4" id="inputPassword" name="password" type="password" required placeholder="Enter password" />
                                            </div>
                                            <?php if ($loginError==true): ?>
                                                
                                                    <div class="alert alert-danger" role="alert">
                                                        <?= ($lang_loginMsg1) ?><?= ($lang_loginMsg2)."
" ?>
                                                    </div>
                                                
                                            <?php endif; ?>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="btn btn-info" href="showsignup"><?= ($lang_signup) ?></a>
                                                <button type="submit" class="btn btn-primary"><?= ($lang_login) ?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="showforgotpass"><?= ($lang_forgotpassword) ?></a></div>
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
                                <a href="#"><?= ($lang_privacy) ?></a>
                                &middot;
                                <a href="#"><?= ($lang_termsconditions) ?></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>