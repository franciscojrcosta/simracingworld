<!DOCTYPE html>
<!--
Copyright (C) 2021 <?= ($lang_myappname) ?> <?= ($lang_myappversion) ?> by Francisco Costa

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="The SimRacing Management">
        <meta name="author" content="Francisco Costa">
        <meta name="application-name" content="<?= ($lang_myappname) ?> <?= ($lang_myappversion) ?>">
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
    <body>

        <!-- NAVIGATION MENU -->
        <div>
            <?php echo $this->render('nav.html',NULL,get_defined_vars(),0); ?>
        </div>

        <!-- MAIN -->
        <div class="container">
            <form>
                <fieldset class="form-group border p-3">
                    <legend class="float-none w-auto p-3"><?= ($lang_currentlic) ?></legend>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control username" id="username" placeholder="Username..." name="username">
                    </div>
                </fieldset>
            </form>
            teste
        </div>
        <!-- FOOTER -->
        <div>
            <?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?>
        </div>
    </body>
</html>