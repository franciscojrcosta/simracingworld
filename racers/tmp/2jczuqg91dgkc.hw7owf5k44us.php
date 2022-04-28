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
        <div class="container py-3">
            <div class="row align-items-start">
                <div class="col">
                    <image src="<?= ($DRIVERSIMG) ?><?= ($profiledata['photo']) ?>" class="shadow rounded p-2" alt="driver picture">
                </div>
                <div class="col border border-gray">
                    <h3><?= ($profiledata['firstname']) ?> <?= ($profiledata['middlename']) ?> <?= ($profiledata['lastname']) ?></h3>
                    <div><?= ($profiledata['nationality'])."
" ?>
                        <image src="<?= ($FLAGSIMG) ?><?= ($profiledata['flag']) ?>" class="border border-dark rounded" style="width:5%; height:5%" alt="flag">
                    </div>
                    <p><?= ($profiledata['email']) ?></p>
                    <p><?= ($profiledata['birthdate']) ?></p>    
                </div>                
            </div>

            <div class="row align-items-start">
                <div class="col">
                    <form name="imageUpload" action="uploadfile.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="formFile" class="form-label"><?= ($lang_photo) ?></label>
                            <input class="form-control" type="file" id="formFile" accept="image/*;capture=camera">
                            <input type="submit">
                        </div>
                    </form>
                </div>
                <div class="col">
                    <p><?= ($profiledata['birthdate']) ?></p>    
                </div>                
            </div>    

        </div>
        <!-- FOOTER -->
        <div>
            <?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?> 
        </div>
    </body>
</html>