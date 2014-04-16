<div id="body">
    <div class="container">
        <section class="register">
            <div class="row">
                <h2 class="title reg">Edit Profile</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="wrapper">
                        <div class="row">
                            <div class="span-12">
                                <label>First Name</label>
                                <input type="text" placeholder="First Name" name="first_name" value="<?php echo $user['first_name'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Last Name</label>
                                <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $user['last_name'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Username</label>
                                <input type="text" placeholder="Username" name="username" value="<?php echo $user['username'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <label>Email</label>
                                <input type="text" placeholder="Email" name="email" value="<?php echo $user['email'] ?>">
                            </div>
                        </div>
                        <!-- <div class="row">
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
                        </div> -->
                        <div class="row">
                            <div class="span-12">
                                <label>Avatar</label>
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="row submit-area">
                            <input type="submit" value="Submit" class="pull-right">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>