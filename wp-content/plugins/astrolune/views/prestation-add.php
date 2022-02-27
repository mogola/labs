<div class="wrap">
    <h1>Ajouter</h1>
    <hr class="wp-header-end" />

    <p>Créer une nouvelle prestation</p>

    <form method="post" name="createpestation">

        <input name="action" type="hidden" value="createpestation">

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
                    <input name="title" type="text" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" />
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
                    <input name="price" type="text" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>" />
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
                    <input name="published" type="checkbox" value="<?php echo isset($_POST['published']) ? $_POST['published'] : '' ?>" />
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
                    wp_editor(isset($_POST['description']) ? $_POST['desription'] : '', 'description', $settings); 
                    ?>
                </div>
            </div>
        </div>
        
        <div>
            <input type="submit" name="createpestation" id="createpestationsub" class="button button-primary" value="Ajouter la prestation">
        </div>
    </form>
</div>

<?php

    print_r($_POST);

?>