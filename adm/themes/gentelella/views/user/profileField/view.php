<?php
$this->breadcrumbs = array(
    UserModule::t('Profile Fields') => array('admin'),
    UserModule::t($model->title),
);
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo UserModule::t('View Profile Field #') . $model->varname; ?></h2>
                <div class="clearfix"></div>
            </div>                

            <div class="x_content">
                <?php
                echo $this->renderPartial('_menu', array(
                    'list' => array(
                        CHtml::link(UserModule::t('Create Profile Field'), array('create')),
                        CHtml::link(UserModule::t('Update Profile Field'), array('update', 'id' => $model->id)),
                        CHtml::linkButton(UserModule::t('Delete Profile Field'), array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure to delete this item?')),
                    ),
                ));
                ?>

                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'id',
                        'varname',
                        'title',
                        'field_type',
                        'field_size',
                        'field_size_min',
                        'required',
                        'match',
                        'range',
                        'error_message',
                        'other_validator',
                        'widget',
                        'widgetparams',
                        'default',
                        'position',
                        'visible',
                    ),
                    'htmlOptions' => array(
                        'class' => 'table table-bordered table-striped table-hover th-right',
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>