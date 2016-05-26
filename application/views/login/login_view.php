<div class="row">

    <?php echo validation_errors('<div class="text-error">', '</div>');?>
    <?php if($this->session->flashdata('registered')) : ?>
        <p class="text-success"><?php echo $this->session->flashdata('registered'); ?></p>
    <?php endif;?>
    <div class="span6" id="login">

        <?php echo form_open('home/login_validation'); ?>
        <?php if($this->session->flashdata('login_failed')) : ?>
            <p class="text-error"><?php echo $this->session->flashdata('login_failed'); ?></p>
        <?php endif;?>




        <div id="login-form" class="form-horizontal">


            <div class="control-group">
                <label class="control-label">Login</label>
                <div class="controls">
                   <input type="text" name="login" class="input-large">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">

                    <input type="password" name="password" class="input-large">
                </div>
            </div>
            <div class="control-group">

                <div class="controls">
                    <input type="submit" value="login" class="btn btn-primary">

                    <!-------FACEBOOK LOGIN--------------------->

                    <?php if ( ! $this->facebook->is_authenticated()) : ?>

                       <!-- <div class="login">-->
                            <a  class='btn btn-primary' href="<?php echo $this->facebook->login_url(); ?>">Login with Facebook</a>
                        <!--</div>-->

                    <?php else : ?>

                     <!--   <div class="user-info">

                            <p><strong>User information</strong></p>

                            <ul>
                                <?php foreach ($user as $key => $value) : ?>

                                    <li><?php echo $key; ?> : <?php echo $value; ?></li>

                                <?php endforeach; ?>
                            </ul>

                            <p>
                                <a href="<?php echo $this->facebook->logout_url(); ?>">Logout</a>
                            </p>

                        </div>-->



                    <?php endif; ?>
                    <!-------FACEBOOK LOGIN END--------------------->


                </div>

            </div>
         </div>


<?php
        echo form_close();

        ?>
    </div>

    <div class="span6" >


        <?php

        echo form_open('user/register'); ?>

                    <div id="register_form" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">First Name</label>
                            <div class="controls">
                                <input type="text" name="firstname" class="input-large">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Last Name</label>
                            <div class="controls">
                                <input type="text" name="lastname" class="input-large">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Login</label>
                            <div class="controls">
                                <input type="text" name="login" class="input-large">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input type="text" name="email" class="input-large">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" name="password" class="input-large">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Confirm Password</label>
                            <div class="controls">
                                <input type="password" name="confirm_password" class="input-large">
                            </div>
                        </div>
                        <div class="control-group">

                            <div class="controls">
                                <input type="submit" value="register" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
        <?php
        echo form_close();

        ?>

                </div>
    </div>




