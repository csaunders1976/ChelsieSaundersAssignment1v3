<ul id="actions">
    <h4>Todo Actions</h4>
    <li> <a href="<?php echo base_url(); ?>todos/add/<?php echo $todo->list_id; ?>">Add Todo</a></li>
    <li> <a href="<?php echo base_url(); ?>todos/edit/<?php echo $todo->id; ?>">Edit Todo</a></li>
    <?php if($is_completed) : ?>
        <li> <a href="<?php echo base_url(); ?>todos/mark_new/<?php echo $todo->id; ?>">Mark New</a></li>
    <?php else : ?>
        <li> <a href="<?php echo base_url(); ?>todos/mark_complete/<?php echo $todo->id; ?>">Mark Complete</a></li>
    <?php endif; ?>
    <li> <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>todos/delete/<?php echo $todo->list_id; ?>/<?php echo $this->uri->segment(3); ?>">Delete Todo</a></li>
</ul>
<h4><?php echo $todo->todo_name; ?></h4>
<ul id="info">

    <?php if($todo->is_completed == 0) : ?>
        <li>Status: <strong>Uncomplete</strong></li>
    <?php else : ?>
        <li>Status: <strong>Completed</strong></li>
    <?php endif; ?>

</ul>
<br /><hr />
<!--<- Go Back to <a href="<?php echo base_url(); ?>lists/show/<?php echo $todo->list_id; ?>"><?php echo $todo->list_name; ?></a>