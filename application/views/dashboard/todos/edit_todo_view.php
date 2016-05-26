<h3>Edit Todo</h3>
<p>List:<strong> <?php echo $list_name; ?></strong></p>

<!--Display Errors-->
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('todos/edit/'.$this->uri->segment(3).''); ?>

<p>
    <?php echo form_label('Todo Name:'); ?>
    <?php
    $data = array(
        'name'        => 'todo_name',
        'value'       => $this_todo->todo_name
    );
    ?>
    <?php echo form_input($data); ?>
</p>



<!--Submit Buttons-->
<?php $data = array("value" => "Update Todo",
    "name" => "submit",
    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>