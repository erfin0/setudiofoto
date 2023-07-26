<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserFilter;
use App\Models\UserModel;
use App\Entities\User;
use CodeIgniter\API\ResponseTrait;

class Admin extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $userModel = new UserFilter;
        $data['admin'] = $userModel->filter(['role' => ['admin']])->findAll();
        return view('Admin/AdminView', $data);
    }
    public function user()
    {
       /*  $userModel = new UserFilter;
        $data['admin'] = $userModel->ggrub('user')->findAll();
        d($data); */
        return view('Admin/UserView');
    }
    public function new()
    {
        return view('Admin/AdminaddView');
    }
    public function edit(int $userId)
    {
        $users = new UserModel();
        $user = $users->find($userId);
        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('user tidak di temukan');
        }
        $groups = setting('AuthGroups.groups');
        asort($groups);
        $data = [
            'user'   => $user,
            'groups' => $groups,
        ];

        return view('Admin/AdmineditView', $data);
    }
    public function create()
    {

        $users = new UserModel();
        /**
         * @var User
         */
        $user =  new User();

        /** @phpstan-ignore-next-line */
        if ($user === null) {
            return redirect()->back()->withInput()->with('error', 'resourceNotFound');
        }

        $rules = [
            'userfullname' => [
                'rules' => [
                    'required',
                    'max_length[255]',
                    'min_length[3]',
                ],
            ],
            'whatsapp' => [
                'rules' => [
                    'required',
                    'regex_match[/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/]',
                ],
            ],
            /* 'address' => [
                'rules' => [
                    'required', 'min_length[3]',
                ],
            ], */
            'username' => [
                'label' => 'Auth.username',
                'rules' => [
                    'required',
                    'max_length[30]',
                    'min_length[3]',
                    'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
                    'is_unique[users.username]',
                ],
            ],
            'email' => [
                'label' => 'Auth.email',
                'rules' => [
                    'required',
                    'max_length[254]',
                    'valid_email',
                    'is_unique[auth_identities.secret]',
                ],

            ],
            'password' => [
                'label' => 'Auth.password',
                'rules' => 'required|strong_password',
            ],

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $user->fill($this->request->getPost());
        $users->save($user);
        if ($user->id === null) {
            $user->id = $users->getInsertID();
        }

        if ($file = $this->request->getFile('avatar')) {
            if ($file->isValid()) {
                $avatarDir = FCPATH . '/uploads/avatars';
                $filename  = $user->id . '_avatar.' . $file->getExtension();

                if (!is_dir($avatarDir)) {
                    mkdir($avatarDir, 0755, true);
                }

                if ($file->move($avatarDir, $filename, true)) {
                    $users->update($user->id, ['avatar' => $filename]);
                }
            }
        }


        $password = $this->request->getPost('password');
        $identity = $user->getEmailIdentity();
        if ($identity === null) {
            helper('text');
            $user->createEmailIdentity([
                'email'    => $this->request->getPost('email'),
                'password' => !empty($password) ? $password : random_string('alnum', 12),
            ]);
        }
        // if (auth()->user()->can('users.edit')) {
        $user->syncGroups(...($this->request->getPost('groups') ?? []));
        // }
        return redirect()->to($user->adminLink('edit'))->with('message', 'tersimpan');
    }
    public function user_create()
    {
       
        $users = new UserModel();
        /**
         * @var User
         */
      
        $user =  new User();

        $rules = [
            'userfullname' => [
                'rules' => [
                    'required',
                    'max_length[255]',
                    'min_length[3]',
                ],
            ],
            'whatsapp' => [
                'rules' => [
                    'required',
                    'regex_match[/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/]',
                ],
            ],

            /* 'username' => [
                'label' => 'Auth.username',
                'rules' => [
                    'required',
                    'max_length[30]',
                    'min_length[3]',
                    'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
                    'is_unique[users.username]',
                ],
            ], */
            'email' => [
                'label' => 'Auth.email',
                'rules' => [
                    'required',
                    'max_length[254]',
                    'valid_email',
                    'is_unique[auth_identities.secret]',
                ],

            ],


        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }
        $data = [
            'userfullname' => $this->request->getPost('userfullname'),
            'whatsapp' =>     $this->request->getPost('whatsapp'),
            'username' => 'user' . uniqid(),
            'email' =>  $this->request->getPost('email'),
        ];
        $user->fill($data);
        $id = $users->insert($user);
        $dibuat = $users->find($id);
        return $this->respondCreated([
            'id' => $dibuat->id,
            'userfullname' => $dibuat->userfullname,
            'whatsapp' =>     $dibuat->whatsapp,
            'username' => $dibuat->username,
            'email' =>  $dibuat->email,
        ]);
    }
    public function update($userId = null)
    {
        // return redirect()->back()->withInput()->with('errors',json_encode( $this->request->getPost()));
        $users = new UserModel();
        /**
         * @var User
         */
        $user = $users->find($userId);

        /** @phpstan-ignore-next-line */
        if ($user === null) {
            return redirect()->back()->withInput()->with('error', 'resourceNotFound');
        }

        $rules = [
            'userfullname' => 'required|max_length[255]|min_length[3]',
            'whatsapp' =>  'required|regex_match[/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/]',
        ];


        $validationRule = [
            'avatar' => [
                'label' => 'Image File',
                'rules' => 'uploaded[avatar]'
                    . '|is_image[avatar]'
                    . '|mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[avatar,2000]'
                    . '|max_dims[avatar,1920,1080]',
            ],
        ];
        $rules =  ($this->request->getPost('username') !=  $user->username) ? array_merge($rules,  ['username'   => 'required|string|max_length[30]|min_length[3]|regex_match[/\A[a-zA-Z0-9\.]+\z/]|is_unique[users.username]']) : $rules;
        $rules =  ($this->request->getPost('email') !=  $user->email) ? array_merge($rules,  ['email'      => 'required|valid_email|is_unique[auth_identities.secret]']) : $rules;
        $rules =  ($this->request->getFile('avatar') != "") ? array_merge($rules,  $validationRule) : $rules;
        $rules = ($this->request->getPost('password') != "") ? array_merge($rules,  ['password' => 'required|strong_password']) : $rules;


        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $user->fill($this->request->getPost());
        $users->save($user);
        if ($user->id === null) {
            $user->id = $users->getInsertID();
        }

        if ($file = $this->request->getFile('avatar')) {
            if ($file->isValid()) {
                $avatarDir = FCPATH . '/uploads/avatars';
                $filename  = $user->id . '_avatar.' . $file->getExtension();

                if (!is_dir($avatarDir)) {
                    mkdir($avatarDir, 0755, true);
                }

                if ($file->move($avatarDir, $filename, true)) {
                    $users->update($user->id, ['avatar' => $filename]);
                }
            }
        }


        $identity = $user->getEmailIdentity();
        $identity->secret = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        if ($password !== '') {
            $identity->secret2 = service('passwords')->hash($password);
        }
        if ($identity->hasChanged()) {
            model(UserIdentityModel::class)->save($identity);
        }

        // if (auth()->user()->can('users.edit')) {
        $user->syncGroups(...($this->request->getPost('groups') ?? []));
        // }
        return redirect()->to($user->adminLink('edit'))->with('message', 'tersimpan');
    }
    public function tabel()
    {
        helper('number');
        $model = new UserModel();
        $lists = $model->getDatatables();
        $data = [];
        $no = $this->request->getPost('start');
        foreach ($lists as $list) {
            $no++;
            $row = [];
            $row[] = $list->email;
            $row[] = $list->userfullname;
            $row[] = $list->whatsapp;
            $row[] = $list->address;
            $row[] = '<button data-userfullname="' . $list->userfullname . '" data-email="' . $list->email . '" data-id="' . $list->id . '" data-wa="' . $list->whatsapp . '" onclick="terpilih(this)" class="btn btn-outline-dark"><i class="fa-solid fa-check"></i></button>';
            $data[] = $row;
        }
        $output = [
            'draw' => $this->request->getPost('draw'),
            'recordsTotal' => $model->countAll(),
            'recordsFiltered' => $model->countFiltered(),
            'data' => $data,
        ];
        echo json_encode($output);
    }
}
