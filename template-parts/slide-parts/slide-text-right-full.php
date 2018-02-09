<?php
    //vars
    $background = get_sub_field('slide_background');
    $sectionShade = 'section-' . get_sub_field('shade_of_slide');
    $scrollDownArrow = get_sub_field('scroll_down_arrow');
?>
<!-- Text Right Full Slide -->
<div class="section">
    <div class="container k-full-width k-full-height">
        <div class="row k-full-height covered-bg" style="background-image: url(<?php echo $background; ?>);">
            <div class="col-sm-6 col-sm-offset-6 text-center section-dark">
                <div class="k-table k-full-height">
                    <div class="k-table-cell">
                        <div class="section-info-wrap">
                            <?php the_sub_field('slide_content'); ?>
                        </div>
                <?php
                    if( $scrollDownArrow ):
                    $scrollDownArrowText = get_sub_field('scroll_down_arrow_text');
                ?>
                        <div class="text-center">
                            <a href="javascript:void(0);" class="text-uppercase section-explore-btn"><i class="angle-arrow-thin angle-arrow-down" aria-hidden="true"></i><br>&nbsp;<?php echo $scrollDownArrowText; ?></a>
                        </div>
                <?php endif; ?>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
</div>
<!-- /Text Right Full Slide -->
