<div id="outer-wrapper">
	<div id="wrap2">
		<div class="switch">
			<div class="switch-left">
				<span style="color: #aaa;">User</span> | <?php echo $user['first_name'] ?>
			</div>
		</div>
		<div class="post">
			<form action="">

				<div class="row-fluid">
					<div class="span3"><img src ="<?php echo base_url('data/').'/'.$user['image'] ?>" width="200"></div>
					<div class="span9">Email :<input type="text" value="<?php echo $user['email'] ?>"></div>
					<div class="span9">First Name :<input type="text" value="<?php echo $user['first_name'] ?>"></div>
					<div class="span9">Last Name :<input type="text" value="<?php echo $user['last_name'] ?>"></div>
					<div class="span9">Username :<input type="text" value="<?php echo $user['username'] ?>"></div>
					<!-- <div class="span5"><?php echo $user['first_name'] ?> <?php echo $user['last_name'] ?></div> -->
				</div>

			</form>
		</div>
	</div>
</div>