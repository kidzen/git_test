<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\StudentParent]].
 *
 * @see \common\models\StudentParent
 */
class StudentParentQuery extends \yii\db\ActiveQuery
{
    public function init()
    {
        $this->andOnCondition(['type' => 2]);
        // $this->andOnCondition(['deleted' => false]);
        parent::init();
    }
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\StudentParent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\StudentParent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
