<?php
namespace app\models;
use yii\db\ActiveRecord;

/**
 * This is the model for table "product"
 */
class Product extends ActiveRecord{
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    public static function tableName() {
        return 'product';
    }
    
    /**
     * 
     * @return ActiveQuery
     */
    public function getCategory() {
      return  $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
