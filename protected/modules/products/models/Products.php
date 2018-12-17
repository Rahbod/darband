<?php

/**
 * This is the model class for table "{{products}}".
 *
 * The followings are the available columns in table '{{products}}':
 * @property string $id
 * @property string $title
 * @property string $price
 * @property string $description
 * @property string $image
 * @property string $image_full
 * @property string $date
 * @property string $cat_id
 * @property integer $type
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property ProductCategories $cat
 */
class Products extends SortableCActiveRecord
{
    const TYPE_PRODUCT = 0;
    const TYPE_PROJECT = 1;

    public static $typeLabels = [
        self::TYPE_PRODUCT => 'محصول',
        self::TYPE_PROJECT=> 'پروژه',
    ];

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{products}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('date', 'default', 'value' => time(), 'on' => 'insert'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('title, image, image_full', 'length', 'max'=>255),
			array('description', 'length', 'max'=>255),
			array('price', 'length', 'max'=>3),
			array('date', 'length', 'max'=>20),
			array('cat_id,order', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, price, description, image, image_full, date, cat_id, type,order', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cat' => array(self::BELONGS_TO, 'ProductCategories', 'cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'شناسه',
			'title' => 'عنوان',
			'price' => 'قیمت',
			'description' => 'توضیحات',
			'image' => 'تصویر',
			'image_full' => 'تصویر',
			'date' => 'تاریخ ثبت',
			'cat_id' => 'دسته بندی',
			'type' => 'Type',
			'order' => 'ترتیب',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('image_full',$this->image_full,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('cat_id',$this->cat_id,true);
        $criteria->compare('type', self::TYPE_PRODUCT);

        $criteria->order = 't.order';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => false
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * @return CDbCriteria
     */
    public static function validQuery($limit = false)
    {
        $criteria = (new CDbCriteria())->compare('type', self::TYPE_PRODUCT);
        if ($limit)
            $criteria->limit = $limit;
        $criteria->order = 't.order';
        return $criteria;
    }
}
