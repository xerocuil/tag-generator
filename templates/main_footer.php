  </div><!-- .column -->

  <?php
  if (isset($mid)){
  	include $DOCROOT.'/templates/mid_'.$mid.'.php';
  }

  if (isset($sidebar)){
    echo '<div class="column is-one-fifth">';
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
		<div class="column has-text-centered">Tag Generator</div>
		<div class="column">&nbsp;</div>
	</div>
</footer>

</body>
</html>
