<?php
    //vars
    $background = get_sub_field('slide_background');
    $sectionShade = 'section-' . get_sub_field('shade_of_slide');
    $scrollDownArrow = get_sub_field('scroll_down_arrow');
?>
<!-- Full Slide -->
<div class="section">
    <div class="container k-full-width k-full-height">
        <div class="row k-full-height">
            <div class="col-lg-12 text-center <?php echo $sectionShade; ?> covered-bg" style="background-image: url(<?php echo $background; ?>);">
                <div class="k-table k-full-height">
                    <div class="k-table-cell">
                        <div class="section-info-wrap top-center-redline<?php if (get_sub_field('slide_content_width_restricted')) echo ' restricted-width';?>">
                            <?php the_sub_field('slide_content'); ?>
                        </div>
                    </div>
                </div>
                <div class="vertical-middle-band left-band">
                    <div class="left-marker-line"></div>
                </div>
                <?php
                    if( $scrollDownArrow ):
                    $scrollDownArrowText = get_sub_field('scroll_down_arrow_text');
                ?>
                        <div class="bottom-center-band text-center">
                            <a href="javascript:void(0);" class="text-uppercase section-explore-btn"><i class="angle-arrow-thin angle-arrow-down" aria-hidden="true"></i><br>&nbsp;<?php echo $scrollDownArrowText; ?></a>
                        </div>
                <?php endif; ?>
            </div>
        </div><!-- /.row -->
    </div>
</div>
<!-- /Full Slide -->
