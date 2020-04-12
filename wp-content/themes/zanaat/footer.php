<style>
#mbar {
    color: white;
    position: fixed;
    background-color: #17c908;
	font-family: sans-serif;
    //position: absolute;
    width: 100%;
    z-index: 99999;
    //background: #000;
    text-align: center;
    //color: #fff;
    height: 23px;
    min-height: 20px;
    top: 0;
    left: 0;
	right:0;
    border-bottom: 3px solid #fff;
    -webkit-box-shadow: 0 8px 6px -6px black;
    -moz-box-shadow: 0 8px 6px -6px black;
    box-shadow: 0 8px 6px -6px black;
    font-size: 14px;
    line-height: 20px;
	}
.mbar-button{
    color: black;
    text-shadow: 0 -1px 0 rgba(255,255,255,0.25);
    background-color: white;
    display: inline-block;
    margin-left: 5px;
    font-family: sans-serif;
    padding: 2px 6px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    font-size: 10.998px;
    font-weight: bold;
    line-height: 14px;
    white-space: nowrap;
    vertical-align: baseline;
    //background-color: #999;
}
</style>
<script>
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
$("#mbar").css("height","45px");
//$(".inputcontent-layout .inputsidebar1").css("display","none");
}
</script>
                        </div>
                        <?php get_sidebar('secondary'); ?>
                    </div>
                </div>
            </div>
    </div>
<footer class="inputfooter">
  <div class="inputfooter-inner"><?php get_sidebar('footer'); ?></div>

</footer>

</div>


<div id="wp-footer">
	<?php wp_footer(); ?>
	<!-- <?php printf(__('%d queries. %s seconds.', THEME_NS), get_num_queries(), timer_stop(0, 3)); ?> -->
 
</div>

</body>
</html>


