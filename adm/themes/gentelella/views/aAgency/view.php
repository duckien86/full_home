<?php
    /* @var $this AAgencyController */
    /* @var $model AAgency */

    $this->breadcrumbs = array(
        Yii::t('adm/label', 'agency') => array('admin'),
        $model->title,
    );

    $this->menu = array(
        array('label' => Yii::t('adm/label', 'create'), 'url' => array('create')),
        array('label' => Yii::t('adm/label', 'update'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('adm/label', 'manage_agency'), 'url' => array('admin')),
    );
?>

<h1><?= Yii::t('adm/label', 'view') ?> #<?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'       => $model,
    'attributes' => array(
        'id',
        'title',
        'address',
        'phone_number',
        'target_link',
        'sort_order',
        array(
            'name'  => 'folder_path',
            'type'  => 'raw',
            'value' => $model->getImageUrl($model->folder_path)
        ),
        array(
            'name'  => 'status',
            'type'  => 'raw',
            'value' => $model->getStatusLabel(),
        ),
    ),
)); ?>
