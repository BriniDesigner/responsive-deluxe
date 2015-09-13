    </div>

</div> <!-- /container -->

<footer id="main-footer" class="bg-primary">
	<div id="footer-widgets" class="container">
		<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
        	<?php dynamic_sidebar( 'footer-widgets' ); ?>
		<?php endif; ?>
    </div>
    <div class="container text-center">
        &copy; <?php _e('Copyright', 'responsive-deluxe'); ?> <?php echo date("Y"); ?> <?php _e('All rights reserved', 'responsive-deluxe'); ?>
        <?php bloginfo('name'); ?>.<br />
        <span class="text-muted" style="font-size: 8pt;"><?php _e('Responsive Deluxe developed by', 'responsive-deluxe');?> <a href="http://brinidesigner.com">BriniDesigner</a></span>
    </div>
</footer>

<?php wp_footer(); ?>

<script type="text/javascript">
(function() {
  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement("style");
    msViewportStyle.appendChild(
      document.createTextNode("@-ms-viewport{width:auto!important}")
    );
    document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
  }
})();

var collapsed = false;
jQuery( document ).ready(function($) {
    $('.navbar-toggle').click(function(){
        console.log(collapsed);
        if(collapsed) {
            $('.navbar-header > button').html('<i class="fa fa-bars"></i>');
        } else {
            $('.navbar-header > button').html('<i class="fa fa-times"></i>');
        }
        $('.navbar-collapse').toggle(200);
        collapsed = !collapsed;
    });
});
</script>
	
</body>

</html>
