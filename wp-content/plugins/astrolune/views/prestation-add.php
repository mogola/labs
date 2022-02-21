<div class="wrap">
    <h1>Ajouter</h1>
    <hr class="wp-header-end" />

    <p>Créer une nouvelle prestation</p>

    <form method="post" name="createpestation">

        <input name="action" type="hidden" value="createpestation">

        <?php if( isset($_POST['has_error']) ) { ?>

            <ul>
                <li>Il y a des erreurs</li>
            </ul>

        <?php } ?>
        
        <div>
            <label for="title">Titre</label>
            <input name="title" type="text" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" />
            <?php if( isset($_POST['title_error']) && $_POST['title_error'] != '' ) { ?>
                <span><?php echo $_POST['title_error'] ?></span>
            <?php } ?>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description"rows="5" cols="33"><?php echo isset($_POST['description']) ? $_POST['desription'] : '' ?></textarea>
        </div>

        <div>
            <label for="price">Prix</label>
            <input name="price" type="text" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>" />
            <?php if( isset($_POST['price_error']) && $_POST['price_error'] != '' ) { ?>
                <span><?php echo $_POST['price_error'] ?></span>
            <?php } ?>
        </div>

        <div>
            <label for="published">Publié</label>
            <input name="published" type="checkbox" value="<?php echo isset($_POST['published']) ? $_POST['published'] : '' ?>" />
        </div>
        
        <div>
            <input type="submit" name="createpestation" id="createpestationsub" class="button button-primary" value="Ajouter la prestation">
        </div>
    </form>
</div>

<?php

    print_r($_POST);

?>