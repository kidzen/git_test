<?php

namespace common\models;

use Yii;
use common\models\base\Person as BasePerson;
use yii\helpers\ArrayHelper;
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
class StudentParent extends BasePerson
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),[
            [['name', 'ic_no', 'email'], 'required'],
            ]);
    }

    public function attributeLabels()
    {
        return parent::attributeLabels();
    }


    /**
     * @inheritdoc
     * @return \common\models\query\StudentParentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\StudentParentQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
        // Place your custom code here
            $this->type = Enum::PERSON_PARENT;
            return true;
        } else {
            return false;
        }
    }

}
