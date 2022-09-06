<section class="py-16 ">
    <a href="index.php" class="text-blue-500 text-sm">
        <- retour </a>
            <?php $main_title = "Ajouter un jeu";
            include("_h1.php")
            ?>
            <form action="" method="POST" class="grid place-items-center bg-gray-100 mx-96 py-10 my-16 gap-y-4 rounded-xl" enctype="multipart/form-data">
                <!--input name  -->
                <div class="mb-4">
                    <label for="name" class="font-semibold text-blue-500">name</label>
                    <input type="text" name="name" class="input input-bordered w-full max-w-xs block" value="<?php
                                                                                                                if (!empty($_POST["name"])) {
                                                                                                                    echo $_POST["name"];
                                                                                                                } ?>" />
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
                    <input type="number" step="0.01" name="price" class="input input-bordered w-full max-w-xs block" value="<?php
                                                                                                                            if (!empty($_POST["price"])) {
                                                                                                                                echo $_POST["price"];
                                                                                                                            } ?>" />
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
                    <input type="number" step="0.01" name="note" class="input input-bordered w-full max-w-xs block" value="<?php
                                                                                                                            if (!empty($_POST["note"])) {
                                                                                                                                echo $_POST["note"];
                                                                                                                            } ?>" />
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
                    <textarea name="description" class="textarea textarea-bordered block"><?php
                                                                                            if (!empty($_POST["description"])) {
                                                                                                echo $_POST["description"];
                                                                                            } ?></textarea>
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
                ]
                ?>
                <h2 class="font-semibold text-blue-500 ">Genre</h2>
                <div class="mb-4 flex space-x-6">
                    <?php foreach ($genreArray as $genre) : ?>
                        <div class="flex item-center space-x-3">
                            <label><?= $genre["name"] ?></label>
                            <input type="checkbox" class="checkbox checkbox-primary bg-white" name="genre[]" value="<?= $genre["name"] ?>" <?php if (!empty($_POST["genre"])) {
                                                                                                                                                if (in_array($genre["name"], $_POST["genre"])) echo "checked";
                                                                                                                                            } ?> />
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
                    ["name" => "PS3"],
                    ["name" => "PS4"],
                    ["name" => "Xbox"],
                ]
                ?>
                <h2 class="font-semibold text-blue-500 ">Plateform</h2>
                <div class="mb-4 flex space-x-6">
                    <?php foreach ($plateformArray as $plateform) : ?>
                        <div class="flex item-center space-x-3">
                            <label><?= $plateform["name"] ?></label>
                            <input type="checkbox" class="checkbox checkbox-primary bg-white" name="plateforms[]" value="<?= $plateform["name"] ?>" <?php if (!empty($_POST["plateforms"])) {
                                                                                                                                                        if (in_array($plateform["name"], $_POST["plateforms"])) echo "checked";
                                                                                                                                                    } ?> />
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
                            <option value="<?= $pegi["name"] ?>" <?php
                                                                    //je save en memoire ce que le user a choisi
                                                                    if (!empty($_POST["PEGI"])) {
                                                                        if ($_POST["PEGI"] == $pegi["name"]) echo 'selected= "selected" ';
                                                                    }
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
                    <input type="file" class="block pt-3" id="url_img" name="url_img">
                    <p>
                        <?php
                        if (!empty($error["url_img"])) {
                            echo $error["url_img"];
                        }
                        ?>
                    </p>
                </div>

                <!-- submit btn -->
                <div class="py-5">
                    <input type="submit" name="submited" value="Ajouter" class="btn btn-active btn-primary">
                </div>
            </form>
</section>