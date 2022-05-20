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

        <script src="/js/licences.js" type="text/javascript"></script>


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

    <body onload="setStartDate()">
        <!-- NAVIGATION MENU -->
        <div>
            <?php echo $this->render('nav.html',NULL,get_defined_vars(),0); ?>
        </div>

        <!-- MAIN -->
        <div class="container">
            <form name="licence_form" id="licenceform" action="buylicence" method="POST">
                <!-- CURRENT LICENCE --> 
                <fieldset class="form-group border">  
                    <legend class="float-none w-auto p-2"><?= ($lang_currentlic) ?></legend>
                    <div class="form-group p-2">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control username" id="username" placeholder="Username..." name="username">
                    </div>
                </fieldset>

                <!-- NEW LICENCE -->
                <fieldset class="form-group border">
                    <legend class="float-none w-auto p-2"><?= ($lang_newlic) ?></legend>

                    <!-- DATE FIELDS -->
                    <div class="row align-items-start m-2">
                        <div class="col-md-auto p-3">
                            <label for="txtstartdate" class="form-label"><?= ($lang_startdate) ?></label>
                            <input class="form-control" id="txtstartdate" type="date" onchange="calculateTotalPrice()" onblur="setEndDate()" required>
                        </div>
                        <div class="col-md-auto p-3">
                            <label for="txtenddate" class="form-label"><?= ($lang_enddate) ?></label>
                            <input id="txtenddate" class="form-control" type="date" onchange="calculateTotalPrice()" required>
                        </div>
                    </div>
                    <!-- END DATE FIELDS -->

                    <!-- <?= ($availablelicences[0]['licencetype']) ?> <?= ($availablelicences[0]['licenceprice'])."
" ?>
                    <?php foreach (($availablelicences?:[]) as $key=>$licences): ?>
                        <?= ($key)."
" ?>
                        <?php foreach (($licences?:[]) as $licence): ?>
                            <strong> <?= ($licence) ?> </strong>
                        <?php endforeach; ?>
                    <?php endforeach; ?> -->

                    <!-- LICENCE TYPE RADIO SELECT -->
                    <div class="row m-2">
                        <label class="p-2"><?= ($lang_licencetype) ?></label>
                        <?php foreach (($availablelicences?:[]) as $columns): ?>
                            <div class="form-check" onclick="calculateTotalPrice()">
                                <input class="form-check-input" type="radio" name="lstlicences" id="<?= ($columns['licencetype']) ?>" value="<?= ($columns['licenceprice']) ?>" required>
                                <label class="form-check-label" for="<?= ($columns['licencetype']) ?>">
                                    <?= ($columns['licencetype']) ?> - <?= ($columns['licenceprice']) ?> CR&dollar;
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- END LICENCE TYPE RADIO SELECT -->

                    <!-- VALUE CONFIRMATION AND SUBMIT BUTTON-->
                    <div class="row align-items-start m-2">
                        <div class="col-md-auto p-2">
                            <h5><label class="form-control-label" for="txtoutput"><?= ($lang_total) ?></label></h5>
                        </div>
                        <div class="col-md-auto p-2">
                            <input class="form-control" name="txtoutput_form" id="txtoutput" type="text" readonly="true">
                        </div>
                        <div class="col-md-auto p-2">
                            <button id="btnsubmit" class="form-control btn btn-primary">
                                <?= ($lang_submit)."
" ?>
                            </button>
                        </div>
                    </div>
                    <!-- END OF VALUE CONFIRMATION AND SUBMIT BUTTON-->
                </fieldset>
            </form>
        </div>
    </body>
</html>