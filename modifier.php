<!-- header -->
<?php
// start session
session_start();
$title = "modifier"; //title for current page
include('partials/_header.php');
include("helpers/functions.php");
// include PDO pour la connexion BDD
require_once("helpers/pdo.php");
// debug_array($_GET)

//1-verifie id existant et que c'est un int
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    // 2- je nettoie mon id contre xss
    $id = clear_xss($_GET['id']);
    // 3- requette (query in english) vers BDD
    $sql = "SELECT * FROM jeux WHERE id=:id";
    // 4- préparation de la requette
    $query = $pdo->prepare($sql);
    // 5- securiser la requette contre injection sql
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // 6- executer la requette vers la BDD
    $query->execute();
    // 7- on stock tout ds une variable
    $game = $query->fetch();
    // debug_array($game);
    // $game = [];

    if (!$game) {
        $_SESSION["error"] = "Ce jeu n'est pas disponible.";
        header("Location: index.php");
    }
} else {
    $_SESSION["error"] = "URL invalide";
    header("Location: index.php");
}

// creation array error
$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";
// variable success
$success = false;
// 1-je verifie si le formulaire est soumis
if (!empty($_POST["submited"])) {
    //2-je fais les failles xss
    //3-validation de chaque input
    require_once("validation-formulaire/include.php");

    // //4- if no error
    if (count($error) == 0) {
        require_once("sql/updateGame-sql.php");
    }
}
?>


<div class="pt-10">
    <a href="index.php" class="text-blue-500 text-sm">
        <- retour </a>
            <?php $main_title = "Modifier le jeu";
            include("partials/_h1.php")
            ?>
            <form action="" method="POST" class="grid place-items-center bg-gray-100 mx-96 py-10 my-16 gap-y-4 rounded-xl">
                <!--input name  -->
                <div class="mb-4">
                    <label for="name" class="font-semibold text-blue-500">name</label>
                    <input type="text" name="name" class="input input-bordered w-full max-w-xs block" value="<?= $game["name"]
                                                                                                                ?>" />
                    <p>
                        <?php
                        if (!empty($error["name"])) {
                            echo $error["name"];
                        }
                        ?>
                    </p>
                </div>
                <!--input price  -->
                <div class="mb-4">
                    <label for="price" class="font-semibold text-blue-500">Prix</label>
                    <input type="number" step="0.01" name="price" class="input input-bordered w-full max-w-xs block" value="<?=
                                                                                                                            $game["price"]  ?>" />
                    <p>
                        <?php
                        if (!empty($error["price"])) {
                            echo $error["price"];
                        }
                        ?>
                    </p>
                </div>
                <!--input note  -->
                <div class="mb-4">
                    <label for="note" class="font-semibold text-blue-500">Note</label>
                    <input type="number" step="0.01" name="note" class="input input-bordered w-full max-w-xs block" value="<?=
                                                                                                                            $game["note"]  ?>" />
                    <p>
                        <?php
                        if (!empty($error["note"])) {
                            echo $error["note"];
                        }
                        ?>
                    </p>
                </div>
                <!--input description  -->
                <div class="mb-4 ">
                    <label for="description" class="font-semibold text-blue-500">Description</label>
                    <textarea name="description" class="textarea textarea-bordered block"><?=
                                                                                            $game["description"] ?></textarea>
                    <p>
                        <?php
                        if (!empty($error["description"])) {
                            echo $error["description"];
                        }
                        ?>
                    </p>
                </div>
                <!-- checkbox genre -->
                <?php
                $genreArray = [
                    ["name" => "Aventure", "checked" => "checked"],
                    ["name" => "Fantasy"],
                    ["name" => "RPG"],
                    ["name" => "FPS"],
                ];
                // new array avec explode 
                $arr_genre = explode("|", $game["genre"]);
                ?>

                <h2 class="font-semibold text-blue-500 ">Genre</h2>
                <div class="mb-4 flex space-x-6">
                    <?php foreach ($genreArray as $genre) : ?>
                        <div class="flex item-center space-x-3">
                            <label><?= $genre["name"] ?></label>
                            <input type="checkbox" class="checkbox checkbox-primary bg-white" name="genre[]" value="<?= $genre["name"] ?>" <?php
                                                                                                                                            if (in_array($genre["name"], $arr_genre)) echo "checked";
                                                                                                                                            ?> />
                        </div>
                    <?php endforeach ?>
                </div>
                <p>
                    <?php
                    if (!empty($error["genre"])) {
                        echo $error["genre"];
                    }
                    ?>
                </p>
                <!-- checkbox Plateform -->
                <?php
                $plateformArray = [
                    ["name" => "Switch", "checked" => "checked"],
                    ["name" => "Ps3"],
                    ["name" => "Ps4"],
                    ["name" => "Xbox"],
                ];
                // new array avec explode 
                $arr_plateforms = explode("|", $game["plateforms"]);
                ?>
                <h2 class="font-semibold text-blue-500 ">Plateform</h2>
                <div class="mb-4 flex space-x-6">
                    <?php foreach ($plateformArray as $plateform) : ?>
                        <div class="flex item-center space-x-3">
                            <label><?= $plateform["name"] ?></label>
                            <input type="checkbox" class="checkbox checkbox-primary bg-white" name="plateforms[]" value="<?= $plateform["name"] ?>" <?php
                                                                                                                                                    if (in_array($plateform["name"], $arr_plateforms)) echo "checked";
                                                                                                                                                    ?> />
                        </div>
                    <?php endforeach ?>
                </div>
                <p>
                    <?php
                    if (!empty($error["plateforms"])) {
                        echo $error["plateforms"];
                    }
                    ?>
                </p>
                <!-- select PEGI -->
                <?php
                $pegiArray = [
                    ["name" => 3],
                    ["name" => 7],
                    ["name" => 12],
                    ["name" => 16],
                    ["name" => 18],
                ]
                ?>
                <h2 class="font-semibold text-blue-500 ">PEGI</h2>
                <div class="mb-4">
                    <select name="PEGI" class="select select-bordered w-full max-w-xs">
                        <option disabled selected>choisi un PEGI</option>
                        <?php foreach ($pegiArray as $pegi) : ?>
                            <option value="<?= $pegi["name"] ?>" <?php if ($game["PEGI"] == $pegi["name"]) echo 'selected="selected"';
                                                                    ?>><?= $pegi["name"] ?></option>
                        <?php endforeach ?>
                    </select>
                    <p>
                        <?php
                        if (!empty($error["PEGI"])) {
                            echo $error["PEGI"];
                        }
                        ?>
                    </p>
                </div>
                <!-- upload image -->
                <div class="py-3 text-center">
                    <label for="url_img" class="text-blue-500 font-semibold ">Votre image</label>
                    <input type="file" class="block pt-3" id="url_img" name="url_img" value="<?=
                                                                                                $game["url_img"]  ?>">
                    <p>
                        <?php
                        if (!empty($error["url_img"])) {
                            echo $error["url_img"];
                        }
                        ?>
                    </p>
                </div>
                <!-- input id -->
                <input type="hidden" name="id" value="<?= $game["id"] ?>">
                <!-- submit btn -->
                <div class="py-5">
                    <input type="submit" name="submited" value="Modifier" class="btn btn-active btn-primary">
                </div>
            </form>
</div>