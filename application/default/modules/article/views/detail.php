<style type="text/css">
    .desktop {text-align: center;}
</style>
<fieldset>
	<legend><?php echo $article['title'] ?></legend>
	<div class="row-fluid">
		<div class="span2">
	       	<img src="<?php echo base_url() ?>data/<?php echo $article['cover']; ?>" width="150" height="" />
		</div>
		<div class="span8">
			<?php echo nl2br($article['description']) ?><br>
		</div>
		<div class="span2">
		</div>
	</div>
</fieldset>
<div class="action-buttons btn-group">
    <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Back') ?></a>
</div>