<?php
    //vars
    $background = get_sub_field('slide_background');
?>
<!-- Image on Right Slide Basic -->
<div class="section">
    <div class="container k-full-width k-full-height">
        <div class="row k-full-height">
            <div class="col-sm-5 text-center">
                <div class="k-table k-full-height">
                    <div class="k-table-cell">
                        <div class="section-info-wrap text-sm-left">
                            <?php the_sub_field('slide_content'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 covered-bg reverse-col-sm empty-img-col" style="background-image: url(<?php echo $background; ?>);">
            </div>
        </div><!-- /.row -->
    </div>
</div>
<!-- /Image on Right Slide Basic -->
