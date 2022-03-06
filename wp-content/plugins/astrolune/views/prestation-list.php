<div class="wrap">
    <h1 class="wp-heading-inline">Liste des prestations</h1>
    <a href="<?php echo menu_page_url(AstroLune_Admin::$addPrestationSlug, false); ?>" class="page-title-action">Ajouter</a>

    <hr class="wp-header-end" />

    <?php if ( ! empty( $prestations ) ) { ?>

        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Publié</th>
                    <th>Page</th>
                    <th>Mise à jour</th>
                    <th>Action</th>    
                </tr>
            </thead>
            <tbody id="the-list">

            <?php foreach ( $prestations as $prestation ) { ?>
                
                <tr>
                    <th><?php echo $prestation->Title ?></th>
                    <th><?php echo $prestation->Price ?> &euro;</th>
                    <th><?php echo $prestation->Published ? "Publié" : "Non publié" ?></th>
                    <th>
                        <?php

                        $indexFound = AstroLune_Admin::page_exist($pages, $prestation->PageId); 
                        if($indexFound == -1) {
                            echo '&lt;&lt;Pas de page&gt;&gt;';
                        }
                        else {
                            echo $pages[$indexFound]->PostTitle;
                        }

                        ?>
                    </th>
                    <th><?php echo $prestation->UpdatedDate->format('Y-m-d H:i:s') ?></th>
                    <th><a href="<?php echo add_query_arg(array('prestationid' => $prestation->Id), menu_page_url(AstroLune_Admin::$addPrestationSlug, false)) ?>">Editer</a></th>
                </tr>

                <?php //Akismet::view( 'notice', $notice ); ?>
            <?php } ?>

            </tbody>
        </table>

    <?php } ?>
</div>