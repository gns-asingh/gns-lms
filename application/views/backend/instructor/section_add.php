<form action="<?php echo site_url('instructor/sections/'.$param2.'/add'); ?>" method="post">
    <div class="form-group">
        <label for="title"><?php echo get_phrase('title'); ?></label>
        <input class="form-control form_control_bg" type="text" name="title" id="title" required>
        <small class="text-muted"><?php echo get_phrase('provide_a_section_name'); ?></small>
    </div>
    <div class="text-right">
        <button class = "btn btn-primary shadow-none" type="submit" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>
