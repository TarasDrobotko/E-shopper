<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }
     
    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'category_id' => 'Категория',
            'name' => 'Наименование',
            'content' => 'Контент',
            'price' => 'Цена',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета-описание',
            'image' => 'Фото',
            'gallery' => 'Галерея',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
        ];
    }
    
    /**
     * Upload image for product
     * @return boolean
     */
  public function upload() {
      if($this->validate()) {
          $patch = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
          $this->image->saveAs($patch);
          $this->attachImage($patch, true);
          @unlink($patch);
          return true;
      } else {
          return false;
      }
  }  
  
  /**
   * Upload images for gallery under image of product
   * @return boolean
   */
   public function uploadGallery() {
      if($this->validate()) {
          foreach($this->gallery as $file) {
          $patch = 'upload/store/' . $file->baseName . '.' . $file->extension;
          $file->saveAs($patch);
          $this->attachImage($patch);
          @unlink($patch);
          }
          return true;
      } else {
          return false;
      }
  }  
}
