<?php

namespace common\models\query;

use yii\db\ActiveQuery;
use common\models\User;

class UserQuery extends ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['status' => User::STATUS_ACTIVE]);
    }
}