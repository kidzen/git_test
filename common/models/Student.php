<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\base\Person as BasePerson;
use common\components\Enum;

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
class Student extends BasePerson
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),[
            // [['name', 'ic_no', 'email', 'created_at', 'updated_at'], 'required'],
            [['name', 'ic_no', 'email'], 'required'],
            ]
            );
    }


    /**
     * @inheritdoc
     * @return \common\models\query\StudentQuery the active query used by this AR class.
     */
    public  function getParents()
    {
        return parent::getParents();
    }
    public function getRelations()
    {
        return parent::getRelations();
        // return $this->hasMany(Relation::className(), ['id' => 'parent_id']);
    }
    public static function find()
    {
        return new \common\models\query\StudentQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
        // Place your custom code here
            $this->type = Enum::PERSON_STUDENT;
            return true;
        } else {
            return false;
        }
    }
}
