<?php

namespace common\rbac\rules;

use yii\base\InvalidCallExeption;
use yii\rbac\Rule;

class ProfileOwnerRule extends Rule
{
    public $name = 'profileOwner';

    public function execute($userID, $item, $params)
    {
        if (empty(['user'])) {
          throw new InvalidCallExeption('Specify user.');
        }

        return $params['user']->id == $userID;
    }
}