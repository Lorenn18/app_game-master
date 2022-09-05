<div class="">
    <a href="index.php" class="text-blue-500 text-sm">
        <- retour </a>

            <div class="text-center mb-16">
                <h1 class="text-blue-500 text-5xl  text-uppercase font-black pb-10 pt-16 "><?= $game["name"] ?></h1>
                <?php
                if ($game["url_img"] != null) { ?>
                    <img src="<?= $game["url_img"] ?>" alt="<?= $game["name"] ?>" class="mx-auto pb-5">
                <?php }
                ?>
                <p class="pb-5"><?= $game["description"] ?></p>
                <div class="">
                    <p>Genre : <?= $game["genre"] ?></p>
                    <p>Plateforms : <?= $game["plateforms"] ?></p>
                    <p>Note : <?= $game["note"] ?>/10</p>
                    <p>PEGI : <?= $game["PEGI"] ?></p>
                    <p>Prix : <?= $game["price"] ?>€</p>
                </div>
                <div class="pt-10">
                    <a href="modifier.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>" class="btn btn-success text-white">Modifier</a>
                    <?php include("partials/_modal.php") ?>
                </div>
            </div>
</div>