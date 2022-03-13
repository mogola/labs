<div class="block-prestations">
    <h1>Liste des prestations</h1>
    <div class="list-prestations">
    <?php 
    
    // Juste une sécurité
    if (class_exists('AstroLune')) {

        global $wp_query;
        $pageId = $wp_query->post->ID;
        $prestations = AstroLune::getPagePrestations($pageId);
        
        foreach($prestations as $prestation) {

    ?>
        <div>
            Titre: <?php echo $prestation->Title ?><br/>
            Prix: <?php echo $prestation->Price ?> &euro;<br/>
            Description: <?php echo $prestation->Description ?><br/>
        </div>
    <?php
        }
    }
    ?>
    </div>
</div>