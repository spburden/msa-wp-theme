<?php
    //vars
    $wide_image = get_sub_field('wide_image');
?>
<!-- Wide Image Two Column Slide -->
<div class="section">
    <div class="container k-full-width k-full-height">
        <div class="row k-full-height">
            <div class="col-lg-12 section-dark k-sm-no-padding">
                <div class="k-half-block covered-bg" style="background-image: url(<?php echo $wide_image; ?>);"></div>
                <div class="k-half-block k-table block-padding-col">
                    <div class="k-table-cell">
                        <div class="row">
                            <div class="col-sm-12"><p class="half-cell-header text-uppercase">
                                <?php the_sub_field('slide_header'); ?>
                            </div>
                            <div class="col-sm-6">
                               <?php the_sub_field('left_content'); ?>
                            </div>
                            <div class="col-sm-6">
                                <?php the_sub_field('right_content'); ?>
                            </div>
                            <div class="col-sm-12 text-center">
                                <?php the_sub_field('centered_bottom_content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
</div>
<!-- /Wide Image Two Column Slide -->
