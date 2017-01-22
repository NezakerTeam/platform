<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
        <div <?= $options['wrapperAttrs'] ?> >
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
        <?= Form::customLabel($name, $options['label'], $options['label_attr']) ?>
    <?php endif; ?>

    <?php if ($showField): ?>
        <?php foreach ((array) $options['children'] as $child): ?>
            <?= $child->render($options, true, true, false) ?>
        <?php endforeach; ?>


    <?php endif; ?>

    <?php if ($showLabel && $showField): ?>
        <?php if ($options['wrapper'] !== false): ?>
        </div>
    <?php endif; ?>
<?php endif; ?>