<?php

    class ABanners extends Banners
    {
        CONST BANNER_ACTIVE   = 1;
        CONST BANNER_INACTIVE = 0;
        CONST TYPE_BANNER     = 'banner';
        CONST TYPE_SLIDER     = 'slider';
        CONST STACK_1         = 1;
        CONST STACK_2         = 2;
        CONST STACK_3         = 3;

        public $old_file;
        public $old_img_mobile;

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('title, status', 'required'),
                array('sort_order, status, stacks', 'numerical', 'integerOnly' => TRUE),
                array('title', 'length', 'max' => 255),
                array('file_name', 'length', 'max' => 500),
                array('file_ext', 'length', 'max' => 10),
                array('type', 'length', 'max' => 50),
                array('img_desktop, img_mobile, target_link', 'length', 'max' => 1000),
                array('content_html', 'safe'),
//                array('file, file_img_mobile', 'file', 'on'    => 'insert',
//                                                       'types' => 'jpg, jpeg, png, gif',
//                ),
//                array('file, file_img_mobile', 'file', 'on'         => 'update_file',
//                                                       'types'      => 'jpg, jpeg, png, gif',
//                                                       'allowEmpty' => TRUE,
//
//                ),
//                array('sort_order', 'unique', 'message' => 'The order already exists!'),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, title, file_name, file_ext, img_desktop, img_mobile, target_link, content_html, sort_order, status, type, stacks', 'safe', 'on' => 'search'),
            );
        }

        /**
         * @return array relational rules.
         */
        public function relations()
        {
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array();
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
            return array(
                'id'              => Yii::t('adm/label', 'id'),
                'title'           => Yii::t('adm/label', 'title'),
                'file_name'       => Yii::t('adm/label', 'file_name'),
                'file_ext'        => Yii::t('adm/label', 'file_ext'),
                'img_desktop'     => Yii::t('adm/label', 'img_desktop'),
                'img_mobile'      => Yii::t('adm/label', 'img_mobile'),
                'target_link'     => Yii::t('adm/label', 'target_link'),
                'content_html'    => Yii::t('adm/label', 'content_html'),
                'sort_order'      => Yii::t('adm/label', 'sort_order'),
                'status'          => Yii::t('adm/label', 'status'),
                'file'            => Yii::t('adm/label', 'file'),
                'file_img_mobile' => Yii::t('adm/label', 'file_img_mobile'),
                'type'            => Yii::t('adm/label', 'type'),
                'stacks'          => Yii::t('adm/label', 'stacks'),
            );
        }

        /**
         * Retrieves a list of models based on the current search/filter conditions.
         *
         * Typical usecase:
         * - Initialize the model fields with values from filter form.
         * - Execute this method to get CActiveDataProvider instance which will filter
         * models according to data in model fields.
         * - Pass data provider to CGridView, CListView or any similar widget.
         *
         * @return CActiveDataProvider the data provider that can return the models
         * based on the search/filter conditions.
         */
        public function search($type = NULL)
        {
            // @todo Please modify the following code to remove attributes that should not be searched.

            if (isset($type) && $type != '') {
                $this->type = $type;
            }

            $criteria = new CDbCriteria;

            $criteria->compare('id', $this->id, TRUE);
            $criteria->compare('title', $this->title, TRUE);
            $criteria->compare('file_name', $this->file_name, TRUE);
            $criteria->compare('file_ext', $this->file_ext, TRUE);
            $criteria->compare('img_desktop', $this->img_desktop, TRUE);
            $criteria->compare('img_mobile', $this->img_mobile, TRUE);
            $criteria->compare('target_link', $this->target_link, TRUE);
            $criteria->compare('content_html', $this->content_html, TRUE);
            $criteria->compare('sort_order', $this->sort_order);
            $criteria->compare('status', $this->status);
            $criteria->compare('type', $this->type, TRUE);
            $criteria->compare('stacks', $this->stacks, TRUE);

            return new CActiveDataProvider($this, array(
                'criteria'   => $criteria,
                'sort'       => array(
                    'defaultOrder' => 'id DESC',
                ),
                'pagination' => array(
                    'pageSize' => 30,
                )
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         *
         * @param string $className active record class name.
         *
         * @return Banners the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

        /**
         * delete exists
         *
         * @param $image
         */
        public function deleteImages($image)
        {
            $dir_root = '/../';
            if ($image) {
                unlink(realpath(Yii::app()->getBasePath() . $dir_root . $image));
            }
        }

        /**
         * get value status display index file
         *
         * @return string
         */
        public function getStatusLabel()
        {
            return ($this->status == 1) ? 'Active' : 'Inactive';
        }

        /**
         * @param $images
         *
         * @return string
         */
        public function getImageUrl($images)
        {
            $dir_root = Yii::app()->params->upload_dir_path;

            return CHtml::image($dir_root . $images, $this->title, array("width" => "100px", "height" => "60px", "title" => $this->title));
        }

        /**
         * @return array
         */
        public function getListBannerType()
        {
            return array(
                self::TYPE_BANNER => Yii::t('adm/label', 'banner'),
                self::TYPE_SLIDER => Yii::t('adm/label', 'slider'),
            );
        }

        /**
         * get label type
         *
         * @return string
         */
        public function getBannerTypeLabel()
        {
            $type = $this->getListBannerType();

            return (isset($type[$this->type])) ? $type[$this->type] : '';
        }

        /**
         * @return array
         */
        public function getListBannerStacks()
        {
            return array(
                self::STACK_1 => Yii::t('adm/label', 'stack_1'),
                self::STACK_2 => Yii::t('adm/label', 'stack_2'),
                self::STACK_3 => Yii::t('adm/label', 'stack_3'),
            );
        }

        /**
         * get label type
         *
         * @return string
         */
        public function getBannerStacksLabel()
        {
            $type = $this->getListBannerStacks();

            return (isset($type[$this->stacks])) ? $type[$this->stacks] : '';
        }
    }
