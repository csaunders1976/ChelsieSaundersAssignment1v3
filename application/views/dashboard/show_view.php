<h4>Goal Lists</h4>

<?php if($this->session->flashdata('list_created')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('list_created') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('list_deleted')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('list_deleted') . '</p>'; ?>
<?php endif; ?>

<ul class="nav nav-tabs">

    <?php foreach ($lists as $listed) : ?>
        <li>
            <a href="<?php echo base_url(); ?>dashboard/show/<?php echo $listed->id; ?>"><?php echo $listed->list_name; ?></a>
        </li>
    <?php endforeach; ?>


</ul>

<div id="show">

<ul id="actions">
    <li><a href="<?php echo base_url(); ?>todos/add/<?php echo $list->id; ?>">Add Todo</a></li>
    <li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>dashboard/delete/<?php echo $list->id; ?>">Delete List</a></li>
</ul>
<h4><?php echo $list->list_name; ?></h4>

<?php if($this->session->flashdata('todo_deleted')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('todo_deleted') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('todo_created')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('todo_created') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('todo_updated')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('todo_updated') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('marked_complete')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('marked_complete') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('marked_new')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('marked_new') . '</p>'; ?>
<?php endif; ?>


<h4> Current Open Todos</h4>

<?php if($completed_todos) : ?>
    <ul>
        <?php foreach($completed_todos as $todo) : ?>
            <li><a href="<?php echo base_url(); ?>todos/show/<?php echo $todo->todo_id; ?>"><?php echo $todo->todo_name; ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>There are no current tasks</p>
<?php endif; ?>
<br />
<h4> Recently Completed</h4>
<?php if($uncompleted_todos) : ?>
    <ul>
        <?php foreach($uncompleted_todos as $todos) : ?>
        <li><a href="<?php echo base_url(); ?>todos/show/<?php echo $todos->todo_id; ?>"><?php echo $todos->todo_name; ?></li></a>
    <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>There are no completed tasks</p>
<?php endif; ?>
<hr />

</div>

<p><a href="<?=base_url(); ?>dashboard/add">Create a new list</a></p>
