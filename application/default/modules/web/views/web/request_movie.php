		<div class="container">
            <section class="detail">
                <div class="row">
                    <h2 class="title req">Request Movie</h2>
                    <div class="span-4 request">
						<form method="POST" action="" enctype="multipart/form-data">
	                        <h6>Request your movie</h6>
							<textarea name="content" id="" rows="5"><?php echo set_value('content') ?></textarea>
	                        <div class="row">
	                            <div class="span-12">
	                                <input value="Submit" type="submit" class="submit">
	                            </div>
	                        </div>
                    	</form>
                    </div>
                    <div class="span-8">
						<?php foreach ($request as $req):?>
	                        <div class="row request-field">
	                            <div class="span-12">
	                                <div class="row">
	                                    <div class="span-2">
	                                        <div class="avatar" style="background: url(<?php echo base_url() ?>data/<?php echo format_model_param($req['user_id'],'user','','',array('image')) ?>) center no-repeat; background-size: cover;"></div>
	                                    </div>
	                                    <div class="span-10">
	                                        <div class="username">
	                                            <h6>
	                                                <a href="<?php echo site_url('web/detail_user')?>"><?php echo format_model_param($req['user_id'],'user','','',array('username')); ?></a>
	                                                Request
	                                            </h6>
	                                        </div>
	                                        <div class="date">
	                                            <span><?php echo $req['created_time']; ?></span>
	                                        </div>
	                                        <div class="content-req">
	                                            <p><?php echo $req['content']; ?></p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
						<?php endforeach;?>
                    </div>
                </div>
            </section>
        </div>