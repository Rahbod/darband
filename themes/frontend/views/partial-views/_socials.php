<?php
$scl = SiteSetting::getOption('social_links')?:null;
if($scl):
    $scl = CJSON::decode($scl);
    $tl = isset($scl['telegram'])?$scl['telegram']:false;
    $tw = isset($scl['twitter'])?$scl['twitter']:false;
    $fb = isset($scl['facebook'])?$scl['facebook']:false;
    $wh = isset($scl['whatsapp'])?$scl['whatsapp']:false;
    $whn = isset($scl['whatsapp_number'])?$scl['whatsapp_number']:false;
    $in = isset($scl['instagram'])?$scl['instagram']:false;
    ?>
    <ul class="social-nav nav-left">
        <li><a><span>@darbandau</span></a></li>
        <?php if($fb): ?><li><a target="_blank" href="<?= $fb; ?>"><i class="facebook-icon"></i></a></li><?php endif; ?>
        <?php if($in): ?><li><a target="_blank" href="<?= $in; ?>"><i class="instagram-icon"></i></a></li><?php endif; ?>
        <?php if($wh): ?><li><a target="_blank" href="<?= $wh; ?>"><i class="whatsapp-icon"></i><?= $whn?"<span>$whn</span>":'' ?></a></li><?php endif; ?>
        <?php if($tl): ?><li><a target="_blank" href="<?= $tl; ?>"><i class="telegram-icon"></i></a></li><?php endif; ?>
    </ul>
<?php
endif;