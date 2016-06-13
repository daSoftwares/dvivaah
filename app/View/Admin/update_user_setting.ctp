<?php $user = $user[0];?>
<div class="form-group">
    <label>First Name</label>
    <input type="text" name="full-name" class="form-control" value="<?php echo $user->first_name;?>">
</div>
<div class="form-group">
    <label>E-mail</label>
    <input type="text" name="Email" class="form-control" value="<?php echo $user->email;?>">
</div>
<div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" <?php echo $user->user_name;?>>
</div>
<div class="form-group">
    <label>Mobile Number</label>
    <input type="text" name="mobile-number" class="form-control" <?php echo $user->mob_no;?>>
</div>
<div class="form-group">
    <label>Subscription End Date</label>
    <input type="text" name="subscription-end-date" class="form-control" <?php echo $user->date_created;?>>
</div>
<div class="checkbox">
    <label><input type="checkbox" name="delete-user">Delete User</label>
</div>