  </div><!-- .column -->

  <?php
  if (isset($mid)){
  	include $DOCROOT.'/templates/mid_'.$mid.'.php';
  }

  if (isset($sidebar)){
    echo '<div class="column is-one-fifth">';
    if ( $DEBUG ){
      include $DOCROOT.'/templates/sidebar_debug.php';
    }
    include $DOCROOT.'/templates/sidebar_'.$sidebar.'.php';
    echo '</div>';
  }
  ?> 
</div> <!-- end .columns -->


</article><!-- end article -->
</div><!-- end #content -->

<footer class="container">
	<div class="columns">
		<div class="column">&nbsp;</div>
		<div class="column has-text-centered"><?php echo $APPTITLE; ?></div>
		<div class="column">&nbsp;</div>
	</div>
</footer>

</body>
</html>
