<?php if (empty($id)): ?>
<script type="text/javascript">
    $(function() {
        $('input[name=email], input[name=first_name], input[name=last_name]').blur(function() {
            var $username = $('input[name=username]');
            var $email = $('input[name=email]');

            if ($email.val() != '') {
                $username.val($email.val().trim().toLowerCase().split('@')[0]);
            } else {
                var $fname = $('input[name=first_name]');
                var $lname = $('input[name=last_name]');

                var names = [];
                if ($fname.val() != '') {
                    names.push($fname.val().toLowerCase());
                }
                if ($lname.val() != '') {
                    names.push($lname.val().toLowerCase());
                }
                $username.val(names.join('.'));
            }

        });

        $('#btn-generate-password').click(function(evt) {
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var string_length = 8;
            var randomstring = '';
            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            $('input[type=password]').val(randomstring);
            return evt.preventDefault();
        });
    });
</script>
<?php endif ?>
<!-- <div id="outer-wrapper">
	<div id="wrap2">
		<div class="switch">
			<div class="switch-left">
				<span style="color: #aaa;">Sign</span>Up
            </div>
		</div>
		<form action="" method="POST" enctype="multipart/form-data">
            <?php echo xview_error() ?>
            <div class="post">
                <div class="row-fluid">
                    <div class="span2">
                        <label><?php echo l('Email') ?></label>
                    </div>
                    <div class="span9"><input type="text" name="email" value="<?php echo set_value('email') ?>"></div>
                </div>
				<div class="row-fluid">
					<div class="span2">
						<label><?php echo l('First Name') ?></label>
					</div>
					<div class="span9"><input type="text" name="first_name" value="<?php echo set_value('first_name') ?>"></div>
				</div>
				<div class="row-fluid">
					<div class="span2">
						<label><?php echo l('Last Name') ?></label>
					</div>
					<div class="span9"><input type="text" name="last_name" value="<?php echo set_value('last_name') ?>"></div>
				</div>
				<div class="row-fluid">
					<div class="span2">
						<label><?php echo l('Username') ?></label>
					</div>
					<div class="span9"><input type="text" name="username" value="<?php echo set_value('username') ?>"></div>
				</div>
				<div class="row-fluid">
					<div class="span2">
						<label><?php echo l('Password') ?></label>
					</div>
					<div class="span9"><input type="password" name="password" value="<?php echo set_value('password') ?>"></div>
				</div>
				<div class="row-fluid">
					<div class="span2">
						<label><?php echo l('Re-type Password') ?></label>
					</div>
					<div class="span9"><input type="password" name="password" value="<?php echo set_value('password') ?>"></div>
				</div>
				<div class="row-fluid">
					<div class="span2">
						<label><?php echo l('Image') ?></label>
					</div>
					<div class="span9">
						<input type='file' name='image' />
					</div>
				</div>
    			<input type="submit"/>
			</div>
		</form>
	</div>
	<div class="clear"></div>
</div> -->

<div id="body">
    <div class="container">
        <section class="register">
            <div class="row">
                <h2 class="title reg">Register</h2>
                <form action="">
                    <div class="wrapper">
                        <div class="row">
                            <div class="span-12">
                                <label>First Name</label>
                                <input type="text" placeholder="First Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Last Name</label>
                                <input type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Username</label>
                                <input type="text" placeholder="Username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Email</label>
                                <input type="text" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Password</label>
                                <input type="text" placeholder="Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Retype Password</label>
                                <input type="text" placeholder="Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Avatar</label>
                                <input type="file">
                            </div>
                        </div>
                        <div class="row submit-area">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>