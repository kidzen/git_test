<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Student]].
 *
 * @see \common\models\Student
 */
class StudentQuery extends \yii\db\ActiveQuery
{
    public function init()
    {
//        $this->andOnCondition(['type' => 1]);
        // $this->andOnCondition(['deleted' => false]);
        parent::init();
    }

    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * @inheritdoc
     * @return \common\models\Student[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Student|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
