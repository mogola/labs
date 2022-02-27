<div class="wrap">
    <h1>Mise à jour</h1>
    <hr class="wp-header-end" />

    <p>Mise à jour de la prestation</p>

    <form method="post" name="updateprestation">

        <input name="action" type="hidden" value="updatepestation">
        <input name="prestation_id" type="hidden" value="<?php echo $_POST['prestation_id'] ?>" />

        <?php if( isset($_POST['has_error']) ) { ?>
            <div class="summary-error">
                Le formulaire est invalide.
            </div>
        <?php } ?>
        
        <div class="line">
            <div class="form-line">
                <div class="label">
                    <label for="title">Titre</label>
                </div>
                <div class="input">
                    <input name="title" type="text" value="<?php echo $_POST['title'] ?>" />
                    <?php if( isset($_POST['title_error']) && $_POST['title_error'] != '' ) { ?>
                        <span class="error"><?php echo $_POST['title_error'] ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="line">
            <div class="form-line">
                <div class="label">
                    <label for="price">Prix</label>
                </div>
                <div class="input">
                    <input name="price" type="text" value="<?php echo $_POST['price'] ?>" />
                    <?php if( isset($_POST['price_error']) && $_POST['price_error'] != '' ) { ?>
                        <span class="error"><?php echo $_POST['price_error'] ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="line">
            <div class="form-line">
                <div class="label">
                    <label for="published">Publié</label>
                </div>
                <div class="input checkbox">
                    <input name="published" type="checkbox" value="<?php echo $_POST['published'] ?>" />
                </div>
            </div>
        </div>
        
        <div class="line">
            <div class="form-line">
                <div class="label">
                    <label for="description">Description</label>
                </div>
                <div class="input description">
                    <?php 
                    $settings = array( 
                        'editor_height' => 200,
                        'textarea_rows' => 20
                    );
                    wp_editor($_POST['description'], 'description', $settings);
                    ?>
                </div>
            </div>
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