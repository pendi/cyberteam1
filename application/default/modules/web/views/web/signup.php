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
<div id="body">
    <div class="container">
        <section class="register">
            <div class="row">
                <h2 class="title reg">Register</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="sso_facebook" value="<?php echo @$sess_user['id']; ?>">
                    <div class="wrapper">
                        <div class="row">
                            <div class="span-12">
                                <label>Email</label>
                                <input type="text" placeholder="Email" name="email" value="<?php echo @$sess_user['email']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Username</label>
                                <input type="text" placeholder="Username" name="username" value="<?php echo set_value('username') ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>First Name</label>
                                <input type="text" placeholder="First Name" name="first_name" value="<?php echo @$sess_user['first_name'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Last Name</label>
                                <input type="text" placeholder="Last Name" name="last_name" value="<?php echo @$sess_user['last_name'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Password</label>
                                <input type="password" placeholder="Password" name="password" value="<?php echo set_value('password') ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Retype Password</label>
                                <input type="password" placeholder="Password" name="password" value="<?php echo set_value('password') ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Avatar</label>
                                <input type="file" name="image">
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