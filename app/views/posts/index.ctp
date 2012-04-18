[unittest_sample]
<?php echo $form->create("posts",array("id"=>"unittestform","name"=>"unittestform","type"=>"post","url"=>array("controller"=>"posts","action"=>"add")));?>
<?php if ($form->isFieldError("Entry.user")) echo $form->error( "Entry.user"); ?>
<br>
<?php echo "User" . $form->text( "Entry.user"); ?>
<input type="submit" name="submit" value="click"  alt="click">
<?php $form->end(); ?>