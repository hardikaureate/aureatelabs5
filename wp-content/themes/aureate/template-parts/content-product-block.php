<div class="taxo-blocks ffff">
<?php
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
?>
<div class="category-thumb category-thumb-custom" id="<?php echo 'category_'.$category_id; ?>">

    <div class="cat-up-block">
        </div>
        <div class="description">
            <h4><a href="<?php the_permalink();?>">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full' );} ?>
            <?php echo the_title(); ?></a></h4>
            <div><?php the_date( 'M jS, Y' ); ?> .
            <?php echo reading_time() .' to read'; ?></div>
        </div>
    </div>
</div>
</div>