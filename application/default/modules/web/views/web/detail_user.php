<div id="body">
    <div class="container">
        <section class="detail profile">
            <div class="row">
                <h2 class="title req">Profile</h2>
                <div class="span-4">
                    <div class="image" style="background:url('<?php echo base_url('data/user/').'/'.$user['image'] ?>') center; background-size: cover;"></div>
                    <div class="edit profile">
                        <div class="download">
                            <a class="submit" href="<?php echo site_url('web/edit_profile/').'/'.$user['id'] ?>">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="span-8">
                    <div class="row">
                        <div class="span-12">
                            <div class="row">
                                <div class="span-2">
                                    <h6>Username</h6>
                                </div>
                                <div class="span-10 description">
                                    <p><?php echo $user['username'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span-2">
                                    <h6>Name</h6>
                                </div>
                                <div class="span-10 description">
                                    <p><?php echo $user['first_name'] ?> <?php echo $user['last_name'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span-2">
                                    <h6>Email</h6>
                                </div>
                                <div class="span-10 description">
                                    <p><?php echo $user['email'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>