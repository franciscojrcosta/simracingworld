<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SimRacingWorld</title>

        <!-- Bootstrap CSS -->
        <link href="<?= ($BASE) ?>/styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= ($BASE) ?>/styles/js/bootstrap.bundle.min.js" type="text/javascript"></script>
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
                                        <form id="loginform" name="login_form" action="/racers/login" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"><?= ($email) ?></label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword"><?= ($password) ?></label>
                                                <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" />
                                            </div>             
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="btn btn-info" href="signup"><?= ($signup) ?></a>
                                                <button type="submit" class="btn btn-primary"><?= ($login) ?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="#"><?= ($forgotpassword) ?></a></div>
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