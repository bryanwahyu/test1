<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    public function index()
    {

        $user= new User();

        $data['user'] = $user->findAll();

        echo view('User', $data);
    }
    public function preview($id)
	{
		$User = new User();
		$data['User'] = $User->where('id', $id)->first();
		
		if(!$data['User']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('User_detail', $data);
    }
    public function create() {
        $User= new User();
        $User->insert([
            "username" => $this->request->getPost('username'),
            "password" => $this->request->getPost('password'),
            "email" => $this->request->getPost('email'),
        ]);
    }
     public function edit($id)  {
            $User = new User();
            $data['User'] = $User->where('id', $id)->first();
            $User->update($id, [
                    "username" => $this->request->getPost('username'),
                    "password" => $this->request->getPost('password'),
                    "email" => $this->request->getPost('email')
                ]);
                return redirect('admin/User');       
    }
    public function delete($id){
        $user=New User();
        $user->delete($id);
    }

}
