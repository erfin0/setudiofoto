<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;
use App\Entities\User ;
class UserModel extends ShieldUserModel
{
  
    protected function initialize(): void
    {
       
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,

            // 'first_name',
            'userfullname','whatsapp','address','avatar'
        ];
       
    }
    protected $returnType    = User::class;
   
}
