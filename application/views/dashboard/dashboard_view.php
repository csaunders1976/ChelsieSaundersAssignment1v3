<h4>Goal Lists</h4>

<?php if($this->session->flashdata('list_created')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('list_created') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('list_deleted')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('list_deleted') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('todo_created')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('todo_created') . '</p>'; ?>
<?php endif; ?>

    <ul class="nav nav-tabs">

        <?php foreach ($lists as $list) : ?>
            <li>
                <a href="<?php echo base_url(); ?>dashboard/show/<?php echo $list->id; ?>"><?php echo $list->list_name; ?></a>
            </li>
        <?php endforeach; ?>


    </ul>








<p><a href="<?=base_url(); ?>dashboard/add">Create a new list</a></p>







