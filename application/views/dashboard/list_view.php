<h3>Add a List</h3>
<p>Please fill out the form below to create a new todo list</p>

<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('dashboard/add'); ?>

<p>
    <?php echo form_label('List Name:'); ?>
    <?php
    $data = array(
        'name'        => 'list_name',
        'value'       => set_value('list_name')
    );
    ?>
    <?php echo form_input($data); ?>
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Add List",
    "name" => "submit",
    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>