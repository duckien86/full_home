<?php

    class WCategories extends Categories
    {
        const  CATEGORY_ACTIVE   = 1;
        const  CATEGORY_INACTIVE = 0;

        public $name;

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         *
         * @param string $className active record class name.
         *
         * @return WCategories the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

        /**
         * @return static[]
         */
        public static function getParentCategories()
        {
            $criteria            = new CDbCriteria();
            $criteria->select    = 't.id, cd.name as name';
            $criteria->join      = 'INNER JOIN tbl_categories_detail cd on cd.categories_id=t.id';
            $criteria->condition = '(parent_id = 0 OR parent_id IS NULL) AND status=:status';
            $criteria->params    = array(':status' => self::CATEGORY_ACTIVE);

            $results = self::model()->findAll($criteria);

            return $results;
        }

        /**
         * @param $parent_id
         *
         * @return static[]
         */
        public static function getCategoriesByParentId($parent_id)
        {
            $criteria            = new CDbCriteria();
            $criteria->select    = 't.id, cd.name as name';
            $criteria->join      = 'INNER JOIN tbl_categories_detail cd on cd.categories_id=t.id';
            $criteria->condition = 'parent_id =:parent_id AND status=:status';
            $criteria->params    = array(':status' => self::CATEGORY_ACTIVE, ':parent_id' => $parent_id);

            $results = self::model()->findAll($criteria);

            return $results;
        }

        /**
         * @param $id
         *
         * @return static
         */
        public static function getCategoryDetail($id)
        {
            $criteria            = new CDbCriteria();
            $criteria->select    = 't.*, cd.name as name';
            $criteria->join      = 'INNER JOIN tbl_categories_detail cd on cd.categories_id=t.id';
            $criteria->condition = 't.id =:id';
            $criteria->params    = array(':id' => $id);

            $results = self::model()->find($criteria);

            return $results;
        }
    }
