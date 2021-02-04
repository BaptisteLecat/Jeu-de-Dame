<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Jeu de Dame</title>
</head>

<body>
    <div class="container">

        <?php foreach ($board->getList_Box() as $box) { ?>
            <?php if ($box->getBoxType() == 1) { ?>
                <div class='box-black' id="<?= $box->getId() ?>">
                </div>
            <?php } else { ?>
                <div class='box-white' id="<?= $box->getId() ?>">
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</body>

</html>