<?php

namespace App\Models;

use App\Traits\Filterable;
use CodeIgniter\I18n\Time;

class UserFilter extends UserModel
{
    use Filterable;
    protected $filters = [
        'role' => [
            'title'   => 'User Role',
            'options' => 'getRoleFilters',
        ],
        'active' => [
            'title'   => 'Active?',
            'options' => [0 => 'Inactive', 1 => 'Active'],
        ],
        'last_active' => [
            'title'   => 'Last Active',
            'options' => [
                1   => '1 day',
                2   => '2 days',
                3   => '3 days',
                7   => '1 week',
                14  => '2 weeks',
                30  => '1 month',
                90  => '3 months',
                180 => '6 months',
                365 => '1 year',
                366 => '> 1 year',
            ],
        ],
    ];

    public function filter(?array $params = null)
    {
        // two ways to go; if we have to search by groups, we have
        // to perform two queries instead of one to avoid duplicates
        if (isset($params['role']) && count($params['role'])) {
            $secondQuery = true;
            $this->select('users.id');
            $this->join('auth_groups_users agu', 'agu.user_id = users.id')
                ->whereIn('agu.group', $params['role']);
        } else {
            $secondQuery = false;
            $this->select('users.*');
        }

        if (isset($params['active']) && count($params['active'])) {
            $this->whereIn('users.active', $params['active']);
        }

        if (isset($params['last_active']) && count($params['last_active'])) {
            // We only use the largest value
            $days = max($params['last_active']);
            $this->where('last_active >=', Time::now()->subDays($days)->toDateTimeString());
        }

        // if we need second query to avoid duplicates:
        if ($secondQuery) {
            $idList = $this->findAll();
            $in     = [];

            foreach ($idList as $v) {
                $in[] = $v->id;
            }
            $nodup = array_unique($in);
            $this->select('users.*');
            $this->whereIn('id', $nodup);
        }

        return $this;
    }

    /**
     * Returns a list of all roles in the system.
     */
    public function getRoleFilters(): array
    {
        helper('setting');
        $groups = setting('AuthGroups.groups');

        $use = [];

        foreach ($groups as $alias => $info) {
            $use[$alias] = $info['title'];
        }

        asort($use);

        return $use;
    }

    public function ggrub(  $params = null)
    {
        
        if (isset($params ) ) {
          
            $this->select('users.id');
            $this->join('auth_groups_users agu', 'agu.user_id = users.id')
                ->where('agu.group', $params);
        } else {
           
            $this->select('users.*');
        }

        return $this;
    }
   
}