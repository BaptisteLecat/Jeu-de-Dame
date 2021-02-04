<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>plateau</title>
</head>

<body>
    <div class="container">


        <?php

        for ($j = 0; $j < 10; $j++) {

            for ($i = 0; $i < 10; $i++) {
                if ($j % 2 == 0) {
                    if ($i % 2 == 0) { ?>
                        <div class="box-1">
                            <div id="1" class="pawn" onclick="selectBox(this);"></div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="box-2">
                            <div id="2" class="pawn" onclick="selectBox(this);"></div>
                        </div>
                    <?php
                    }
                } else {
                    if ($i % 2 == 0) { ?>
                        <div class="box-2">
                            <div id="2" class="pawn" onclick="selectBox(this);"></div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="box-1">
                            <div id="1" class="pawn" onclick="selectBox(this);"></div>
                        </div>
        <?php
                    }
                }
            }
        }

        ?>
    </div>
</body>
        <script src="test.js"></script>
</html>