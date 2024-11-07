<?php if($enabled): ?>
    <div id="<?php echo e($nameFieldName); ?>_wrap" style="display:none;">
        <input name="<?php echo e($nameFieldName); ?>" type="text" value="" id="<?php echo e($nameFieldName); ?>">
        <input name="<?php echo e($validFromFieldName); ?>" type="text" value="<?php echo e($encryptedValidFrom); ?>">
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/vendor/honeypot/honeypotFormFields.blade.php ENDPATH**/ ?>