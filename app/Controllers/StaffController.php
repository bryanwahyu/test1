<?php

namespace App\Controllers;

use App\Models\Staff;
use CodeIgniter\Exceptions\PageNotFoundException;

class StaffController extends BaseController
{
    public function index()
    {

        $Staff= new Staff();

        $data['Staff'] = $Staff->findAll();

        echo view('Staff', $data);
    }
    public function preview($id)
	{
		$Staff = new Staff();
		$data['Staff'] = $Staff->where('id', $id)->first();
		
		if(!$data['Staff']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('Staff_detail', $data);
    }
    public function create() {
        $Staff= new Staff();
        $Staff->insert([
            "Staffname" => $this->request->getPost('Staffname'),
            "password" => $this->request->getPost('password'),
            "email" => $this->request->getPost('email'),
        ]);
    }
     public function edit($id)  {
            $Staff = new Staff();
            $data['Staff'] = $Staff->where('id', $id)->first();
            $Staff->update($id, [
                    "Staffname" => $this->request->getPost('Staffname'),
                    "password" => $this->request->getPost('password'),
                    "email" => $this->request->getPost('email')
                ]);
                return redirect('admin/Staff');       
    }
    public function delete($id){
        $Staff=New Staff();
        $Staff->delete($id);
    }

}
