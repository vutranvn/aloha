<?php wp_footer(); ?>
	<div class="footer row">
			<div class="col-md-3 col-md-offset-1 col-sm-4 info sidebar">
				<?php dynamic_sidebar( 'leftfooter' ); ?>
			</div>
			<div class="col-md-3 col-md-offset-1 col-sm-4 info sidebar">
				<?php dynamic_sidebar( 'middlefooter' ); ?>
			</div>
			<div class="col-md-3 col-md-offset-1 col-sm-4 info sidebar">
				<?php dynamic_sidebar( 'rightfooter' ); ?>
			</div>
	</div>
	<div class="siteinfo row">
		<div class="col-xs-10 col-xs-offset-1">
		<p><?php printf( __( 'Copyright &copy; %1$s <a href="%2$s">Vu Tran</a> Powered by <a href="%3$s">WordPress</a> &amp; Host by <a href="%4$s">DigitalOcean</a>. Based on Romangie Theme'), date('Y'), home_url(), 'http://www.wordpress.org/', 'https://www.digitalocean.com/?refcode=03a67c41a8d1' ); ?></p>
		</div>
	</div>
</div> <!-- /footer -->
<?php wp_footer(); ?>
<script>
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  	ga('create', 'UA-57941330-1', 'auto');
  	ga('send', 'pageview');

</script>
</body>
</html>
