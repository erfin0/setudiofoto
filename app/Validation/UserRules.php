<?php

namespace App\Validation;

class UserRules
{ 
    public function unique_email(string $value, string $fields, array $data): bool
    {
        return model(UserIdentityModel::class)
            ->where('user_id !=', $fields)
            ->where('type', 'email_password')
            ->where('secret', $value)
            ->countAllResults() === 0;
    }
}
