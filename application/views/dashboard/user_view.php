<?php echo validation_errors();?>
<?php echo form_open('user/update_firstname');?>


<?php echo validation_errors('<div class="alert alert-danger">', '</div>');?>
<?php if($this->session->flashdata('update_success')) : ?>
    <p class="alert alert-success"><?php echo $this->session->flashdata('update_success'); ?></p>
<?php endif;?>
<div id="fname" class="form-horizontal" >
            <div class="form-group">
                <label> First Name</label>
                <input  type="text" class="form-control" name="firstname" class="input-large" value="<?php echo $user[0]['firstname'];?>"/>
                <button type="submit" class="btn btn-primary">Update First Name</button>
            </div>
    </div>
    <?php echo form_close();?>

<?php echo form_open('user/update_lastname');?>

<div id="lname" class="form-horizontal" >
    <div class="form-group">
        <label> Last Name</label>
        <input  type="text" class="form-control" name="lastname" class="input-large" value="<?php echo $user[0]['lastname'];?>"/>
        <button type="submit" class="btn btn-primary">Update Last Name</button>
    </div>
</div>
<?php echo form_close();?>

<?php echo form_open('user/update_email');?>

<div id="email" class="form-horizontal" >
    <div class="form-group">
        <label> Email  </label>
        <input  type="text" class="form-control" name="email" class="input-large" value="<?php echo $user[0]['email'];?>"/>

        <button type="submit" class="btn btn-primary">Update Email</button>
    </div>
</div>
<?php echo form_close();?>

<?php echo form_open('user/update_login');?>

<div id="username" class="form-horizontal">
    <div class="form-group">
        <label> Username  </label>
        <input  type="text" class="form-control" name="login" class="input-large" value="<?php echo $user[0]['login'];?>"/>
        <button type="submit" class="btn btn-primary">Update Username</button>
    </div>
</div>
<?php echo form_close();?>

<?php echo form_open('user/update_password');?>

<div id="password" class="form-horizontal" >
    <div class="form-group">
        <div class="control-group">
        <label> Password  </label>
        <input  type="password" class="form-control" name="password" class="input-large"/>
            </div>
        <div class="control-group">
        <label >Confirm Password</label>
        <input type="password" name="confirm_password" class="input-large">
        <button type="submit" class="btn btn-primary">Update password</button>
        </div>
    </div>
</div>
<?php echo form_close();?>