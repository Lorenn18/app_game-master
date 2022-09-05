<div class="pt-16 wrap_content">
    <!-- head content -->
    <div class="wrap_content-head text-center">
        <?php $main_title = "App Game";
        include("partials/_h1.php")
        ?>
        <p class="pt-5">L'app qui repertorie vos jeux</p>

        <!--Add Game -->
        <div class="pt-16 pb-16">
            <a href="addGame.php" class="btn bg-blue-500">Ajouter un jeu</a>
        </div>

        <?php require_once("partials/_alert.php") ?>

    </div>
    <!-- table-->
    <div class="overflow-x-auto mt-16 mb-16">
        <table class="table w-full ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Plateform</th>
                    <th>prix</th>
                    <th>PEGI</th>
                    <th>Voir</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if (count($games) == 0) {
                    echo " <tr><td class='text-center'> Pas de jeux disponible actuellement</td> </tr>";
                } else { ?>
                    <?php foreach ($games as $game) : ?>
                        <tr class="hover:text-blue-500 ">
                            <th class="text-blue-500 font-black"> <?= $index++ ?> </th>
                            <td><a href="show.php?id=<?= $game['id'] ?>&name=<?= $game['name'] ?>"><?= $game['name'] ?></a></td>
                            <td><?= $game['genre'] ?></td>
                            <td><?= $game['plateforms'] ?></td>
                            <td><?= $game['price'] ?></td>
                            <td><?= $game['PEGI'] ?></td>
                            <td>
                                <a href="show.php?id=<?= $game['id'] ?>&name=<?= $game['name'] ?>">
                                    <img src="img/oeil.png" alt="eye" class="w-4">
                                </a>
                            </td>
                            <td><a href="modifier.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>" class="btn btn-success text-white">Modifier</a></td>
                            <td><?php include("partials/_modal.php") ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>