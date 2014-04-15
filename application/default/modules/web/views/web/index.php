<style type="text/css">
	select { height: 35px;}
</style>
<div id="outer-wrapper">
	<div id="wrap2">
		<div class="switch">
			<div class="switch-left">
				<span style="color: #aaa;">Recent</span> Movies				
			</div>
		</div>
		<div class="row">
			<div style="float: right; width: 200px; margin: 10px 20px 0 0">
				<?php echo xform_lookup("sortby"); ?>
			</div>
			<div class="span7">&nbsp;</div>
		</div>
		<?php foreach ($film as $item):?>
		<div class="post bar hentry">
			<h2 class="post-title entry-title">
				<a href="<?php echo site_url('web/detail_film/'.$item['id'])?>"><?php echo $item['title']?></a>
			</h2>
			<div class="post-body entry-content">
				<a href="<?php echo site_url('web/detail_film/'.$item['id'])?>">
		            <img src ="<?php echo base_url('data/').'/'.$item['cover'] ?>">
				</a>
			</div>
		</div>
		<?php endforeach;?>
		<div class="clear"></div>
        <div>
            <?php echo $this->pagination->create_links() ?>
        </div>
	</div>
	<div class="clear"></div>
</div>