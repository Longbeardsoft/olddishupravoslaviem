<?php
global $theme_sidebars;
$places = array();
foreach ($theme_sidebars as $sidebar){
    if ($sidebar['group'] !== 'footer')
        continue;
    $widgets = theme_get_dynamic_sidebar_data($sidebar['id']);
    if (!is_array($widgets) || count($widgets) < 1)
        continue;
    $places[$sidebar['id']] = $widgets;
}
$place_count = count($places);
$needLayout = ($place_count > 1);
if (theme_get_option('theme_override_default_footer_content')) {
    if ($place_count > 0) {
        $centred_begin = '<div class="inputcenter-wrapper"><div class="inputcenter-inner">';
        $centred_end = '</div></div><div class="clearfix"> </div>';
        if ($needLayout) { ?>
<div class="inputcontent-layout">
    <div class="inputcontent-layout-row">
        <?php 
        }
        foreach ($places as $widgets) { 
            if ($needLayout) { ?>
            <div class="inputlayout-cell inputlayout-cell-size<?php echo $place_count; ?>">
            <?php 
            }
            $centred = false;
            foreach ($widgets as $widget) {
                 $is_simple = ('simple' == $widget['style']);
                 if ($is_simple) {
                     $widget['class'] = implode(' ', array_merge(explode(' ', theme_get_array_value($widget, 'class', '')), array('inputfooter-text')));
                 }
                 if (false === $centred && $is_simple) {
                     $centred = true;
                     echo $centred_begin;
                 }
                 if (true === $centred && !$is_simple) {
                     $centred = false;
                     echo $centred_end;
                 }
                 theme_print_widget($widget);
            } 
            if (true === $centred) {
                echo $centred_end;
            }
            if ($needLayout) {
           ?>
            </div>
        <?php 
            }
        } 
        if ($needLayout) { ?>
    </div>
</div>
        <?php 
        }
    }
?>
<div class="inputfooter-text">
<?php
global $theme_default_options;
echo do_shortcode(theme_get_option('theme_override_default_footer_content') ? theme_get_option('theme_footer_content') : theme_get_array_value($theme_default_options, 'theme_footer_content'));
} else { 
?>
<div class="inputfooter-text">
<?php theme_ob_start() ?>
  
<p><br /></p>

<p>© 2015-2020. dishupravoslaviem.ru. Все права защищены.</p>
<!--<span id="art-footnote-links"><a href="http://zanaat.ru/" target="_blank">Разработка сайта — студия Zanaat</a></span>-->

<p><br /></p>
<p style="text-align: center;">Статистика просмотров сайта</p>
<p><br /></p>

<!-- GoStats JavaScript Based Code -->

<script type="text/javascript" src="http://gostats.ru/js/counter.js"></script>
<script type="text/javascript">_gos='c4.gostats.ru';_goa=395452;
_got=2;_goi=80;_gol='счетчик посещений';_GoStatsRun();</script>
<!-- End GoStats JavaScript Based Code -->

<!-- GoStats Simple HTML Based Code -->
<!--<a target="_blank" title="счетчики" href="http://gostats.ru"><img alt="счетчики" 
src="http://c4.gostats.ru/bin/count/a_395452/t_2/i_80/counter.png" 
style="border-width:0" /></a>-->
<!-- End GoStats Simple HTML Based Code -->

<!-- Top100 (Kraken) Widget -->
<span id="top100_widget"></span>
<!-- END Top100 (Kraken) Widget -->

<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=48744038&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/48744038/3_0_FFFFFFFF_EFEFEFFF_0_uniques"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="48744038" data-lang="ru" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48744038 = new Ya.Metrika2({
                    id:48744038,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48744038" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<?php echo do_shortcode(theme_ob_get_clean()) ?>
<?php } ?>
<p class="inputpage-footer">

<!-- Top100 (Kraken) Widget -->
<span id="top100_widget"></span>
<!-- END Top100 (Kraken) Widget -->

<!-- Top100 (Kraken) Counter -->
<script>
    (function (w, d, c) {
    (w[c] = w[c] || []).push(function() {
        var options = {
            project: 3119782,
            element: 'top100_widget',
        };
        try {
            w.top100Counter = new top100(options);
        } catch(e) { }
    });
    var n = d.getElementsByTagName("script")[0],
    s = d.createElement("script"),
    f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src =
    (d.location.protocol == "https:" ? "https:" : "http:") +
    "//st.top100.ru/top100/top100.js";

    if (w.opera == "[object Opera]") {
    d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(window, document, "_top100q");
</script>
<noscript>
  <img src="//counter.rambler.ru/top100.cnt?pid=3119782" alt="Топ-100" />
</noscript>
<!-- END Top100 (Kraken) Counter -->
       
    </p>
</div>