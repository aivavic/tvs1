
<b><?php echo CHtml::encode($user->getAttributeLabel('username')); ?>:</b>
<?php echo CHtml::encode($user->username); ?>
<br/>

<b><?php echo CHtml::encode($user->getAttributeLabel('email')); ?>:</b>
<?php echo CHtml::encode($user->email); ?>
<br/>
<b><?php echo CHtml::encode($user->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($user->created); ?>
<br/>
<b><?php echo CHtml::encode($user->getAttributeLabel('gender')); ?>:</b>
<?php echo CHtml::encode($user->gender); ?>
<br/>
<b><?php echo CHtml::encode($user->getAttributeLabel('dob')); ?>:</b>
<?php echo CHtml::encode($user->dob); ?>
<br/>