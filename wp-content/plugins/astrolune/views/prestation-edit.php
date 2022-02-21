<div class="wrap">
    <h1>Mise à jour</h1>
    <hr class="wp-header-end" />

    <p>Mise à jour de la prestation</p>

    <form method="post" name="updateprestation">

        <input name="action" type="hidden" value="updatepestation">
        <input name="prestation_id" type="hidden" value="<?php echo $_POST['prestation_id'] ?>" />

        <?php if( isset($_POST['has_error']) ) { ?>

            <ul>
                <li>Il y a des erreurs</li>
            </ul>

        <?php } ?>
        
        <div>
            <label for="title">Titre</label>
            <input name="title" type="text" value="<?php echo $_POST['title'] ?>" />
            <?php if( isset($_POST['title_error']) && $_POST['title_error'] != '' ) { ?>
                <span><?php echo $_POST['title_error'] ?></span>
            <?php } ?>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" rows="5" cols="33"><?php echo $_POST['description'] ?></textarea>
        </div>

        <div>
            <label for="price">Prix</label>
            <input name="price" type="text" value="<?php echo $_POST['price'] ?>" />
            <?php if( isset($_POST['price_error']) && $_POST['price_error'] != '' ) { ?>
                <span><?php echo $_POST['price_error'] ?></span>
            <?php } ?>
        </div>

        <div>
            <label for="published">Publié</label>
            <input name="published" type="checkbox" value="<?php echo $_POST['published'] ?>" />
        </div>
        
        <div>
            <input type="submit" name="updatepestation" id="updatepestationsub" class="button button-primary" value="Mettre à jour">
        </div>
    </form>
</div>

<div>
<?php

    print_r($_POST);
?>
</div>