<style>
   label{
      color: #000;
   }
</style>

<div id="login">
   <div class="title">
      <h2>
         Login
         <br>
         <strong>Xinix-Movie</strong>
      </h2>
   </div>
   <form action="" method="post">
      <div class="row">
         <?php if (!$CI->config->item('use_db')): ?>
         <div style="text-align: center; color: red; font-weight: bold">
             Database not ready!
         </div>
         <?php endif ?>
         <div class="span-12">
            <label>Username</label>
            <input type="text" name="login" value=""  placeholder="<?php echo l('Username/Email') ?>" />
         </div>
         <div class="span-12">
            <label>Password</label>
            <input type="password"name="password" value="" placeholder="<?php echo l('Password') ?>" />
            <!-- <input type="password" placeholder="Password"> -->
         </div>
         <!-- <div class="span-12">
            <label class="check-label">
               <input class="checkbox" type="checkbox">Remember me
            </label>
         </div> -->
         <div class="span-12">
            <input type="hidden" name="continue" value="" />
            <input type="submit" value="Login" />
         </div>
      </div>
   </form>
</div>