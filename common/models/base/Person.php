<?php

namespace common\models\base;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $ic_no
 * @property string $email
 * @property string $address
 * @property string $phone_no
 * @property string $spm
 * @property integer $status
 * @property integer $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        [
        'class' => TimestampBehavior::className(),
        'createdAtAttribute' => 'created_at',
        'updatedAtAttribute' => 'updated_at',
        'value' => new Expression('NOW()'),
        ],
        ];
    }
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['type', 'status', 'deleted'], 'integer'],
        [['created_at', 'updated_at', 'deleted_at'], 'safe'],
        [['name', 'ic_no', 'email', 'address', 'phone_no', 'spm'], 'string', 'max' => 255],
        [['deleted'], 'default','value'=>false],
        [['ic_no'], 'unique'],
        [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'id' => 'ID',
        'type' => 'Type',
        'name' => 'Name',
        'ic_no' => 'Ic No',
        'email' => 'Email',
        'address' => 'Address',
        'phone_no' => 'Phone No',
        'spm' => 'Spm',
        'status' => 'Status',
        'deleted' => 'Deleted',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'deleted_at' => 'Deleted At',
        ];
    }
    public function getRelationsToParent()
    {
        return $this->hasMany(Relation::className(), ['student_id' => 'id']);
    }
    public function getRelationsToStudent()
    {
        return $this->hasMany(Relation::className(), ['student_id' => 'id']);
    }
    public function getParents()
    {
        return $this->hasMany(Person::className(), ['id' => 'parent_id'])->via('relationsToParent');
    }
    public function getStudents()
    {
        return $this->hasMany(Person::className(), ['id' => 'student_id'])->via('relationsToStudent');
//        return $this->hasMany(Person::className(), ['student_id' => 'id']);
    }

}
