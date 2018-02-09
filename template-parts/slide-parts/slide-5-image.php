<!-- 5 Image Slide -->
<div class="section">
<?php
    // check if the flexible content field has rows of data
    if( have_rows('larger') ):

        // loop through the rows of data
        while ( have_rows('larger') ) : the_row();

        //vars
        $background = get_sub_field('larger_image');
        $sectionContent = get_sub_field('larger_image_content');
        $pageUrl = get_sub_field('page_url');
?>
        <div class="container k-full-width k-full-height">
            <div class="row k-full-height">
                <div class="col-sm-6 covered-bg section-gallery-col" style="background-image:url(<?php echo $background; ?>);">
                    <div class="k-table k-full-height">
                        <div class="k-table-cell k-bottom section-gallery-cell">
                            <div class="section-info-wrap">

                            <?php if($pageUrl): ?>
                                <a href="<?php echo $pageUrl; ?>">
                            <?php endif; ?>

                                    <?php echo $sectionContent; ?>

                            <?php if($pageUrl): ?>
                                </a>
                            <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="vertical-middle-band left-band">
                            <div class="left-marker-line"></div>
                    </div>
                </div>
<?php
        endwhile;
    endif;
?>

<?php
    // check if the flexible content field has rows of data
    if( have_rows('smaller') ):
?>
                <div class="col-sm-6 four-tile-block section-gallery-col">
                    <table class="k-table k-full-height">
                        <tbody>
                            <tr>
                            <?php
                                $count = 0;

                                // loop through the rows of data
                                while ( have_rows('smaller') ) : the_row();
                                    $count++;
                                    $background = get_sub_field('smaller_image');
                                    $sectionContent = get_sub_field('smaller_image_content');
                                    $pageUrl = get_sub_field('page_url');
                            ?>
                                <?php if($count == 3): ?>
                                    </tr>
                                    <tr>
                                <?php endif; ?>

                                    <td class="covered-bg k-bottom section-gallery-cell" style="background-image:url(<?php echo $background; ?>);">
                                        <div class="section-info-wrap">

                                        <?php if($pageUrl): ?>
                                            <a href="<?php echo $pageUrl; ?>">
                                        <?php endif; ?>

                                                <?php echo $sectionContent; ?>

                                        <?php if($pageUrl): ?>
                                            </a>
                                        <?php endif; ?>

                                        </div>
                                    </td>
                            <?php
                                endwhile;
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
<?php
    endif;
?>
<!-- /5 Image Slide -->
