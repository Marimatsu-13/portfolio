<footer>

    </footer>
    <?php 
    // Requête pour récupérer des publications de type 'projets'
    $args = array(
        'post_type' => 'projets',
        'posts_per_page' => 12,
        'paged' => 1,);
 $my_query = new WP_Query($args);

// Vérifie si la requête a des posts
if ($my_query->have_posts()) : ?>
<div class= "publication-list">
<?php
// on parcours touts les posts
    while ($my_query->have_posts()) : $my_query->the_post();
   // Récupère et affiche le lien de la publication
    $url= get_permalink(get_the_ID());

    ?>
        <div class= "lightbox_eye hidden">     
             <?php
             // on Récupère  le lien de la photo pour l'oeil
             $page_url= get_permalink();
              ?>
            <script>
                let urlpage = "<?php echo $page_url; ?>";
            </script>
        </div>   
         </div>
         
    </div>
    
        <?php endwhile;?>
      
</div>
<?php endif;
?>
<?php wp_footer() ?>
</body>
</html>