<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "relation".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $parent_id
 * @property string $relation
 * @property integer $status
 * @property integer $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Relation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'parent_id', 'status', 'deleted'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['relation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'parent_id' => 'Parent ID',
            'relation' => 'Relation',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\RelationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RelationQuery(get_called_class());
    }
}
