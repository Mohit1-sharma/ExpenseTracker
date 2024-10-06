<?php

namespace App\Controllers;
use App\Models\trackerModel;
use App\Models\Expensemodel;


class Home extends BaseController
{
    public function index(): string
    {
        //
        // $data['user'] = $model->findAll();
        return view('login.php');
    }


    public function register(): string
    {
        return view('register.php');
    }


    public function store()
    {
        $model = new trackerModel();
       // die("hello");
       $chkPassword = $this->request->getPost('password');
        $data = [
           // 'id'        => $this->request->getPost('id'),
            'fullname'    => $this->request->getPost('fullname'),
            'email'      => $this->request->getPost('email'),
            'moblie_no' => $this->request->getPost('mobile_no'),
            //'password'  => $this->request->getPost('password'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), 
            'reg_date'  => date('Y-m-d H:i:s'),
        ];

        log_message('error',$chkPassword);
        log_message('error',json_encode($data));
        // var_dump($data);
        // die;

       // echo("hello");


       // $model->insertUser($data);


        if ($model->insertUser($data)) {
            // Set a success message in session
            session()->setFlashdata('success', 'User registered successfully!');
        } else {
            // Set an error message in case of failure
            session()->setFlashdata('error', 'Failed to register user. Please try again.');
        }
         return redirect()->to('/home/register');
    }


    public function login()
    {
        $model = new TrackerModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Fetch user data from the database
        $user = $model->where('email', $email)->first();
        // var_dump($user); 
        // var_dump($password);
        //   die();
         

        log_message('error'," {$user['password']}, {$password}");
        // Check if user exists and password matches
        if ($user && password_verify($password, $user['password'])) {
            session()->set('uid', $user['id']); 
            session()->set('email', $user['email']);
           
            session()->setFlashdata('success', 'Login successful!');
            
            // Set session data or redirect to the dashboard
            return redirect()->to('/home/dashboard'); // Change to your intended redirect
        } else {
            session()->setFlashdata('error', 'Invalid credentials. Please try again.');
            return redirect()->back();
        }
    }





    public function dashboard()
    {
        // Example dashboard view, ensure the path is correct

        if (!session()->get('email')) {
            // Redirect to login page if email is not set in session
            session()->setFlashdata('error', 'Please log in to access the dashboard.');
            return redirect()->to('/home/login');
        }
    
        // Load the dashboard view
        
        return view('dashboard.php');
    }

    
    public function profile()
    {
        // Get the user ID from the session
        $uid = session()->get('uid');
    
        if (!$uid) {
            session()->setFlashdata('error', 'Please log in to view your profile.');
            return redirect()->to('/home/login');
        }
    
        // Load the TrackerModel to get user data
        $model = new TrackerModel();
    
        // Fetch the logged-in user's data
        $user = $model->find($uid);
    
        // Check if the user exists
        if (!$user) {
            session()->setFlashdata('error', 'User not found.');
            return redirect()->to('/home/login');
        }
    
        // Pass the user data to the profile view
        return view('profile', ['user' => $user]);
    }
    






public function addData(){
    return view('addExpense');
}


    public function Expenseadd()
    {
        $uid = session()->get('uid');
        if (!$uid) {
            session()->setFlashdata('error', 'User not logged in.');
            return redirect()->to('/home/login');  // Redirect to login if no user ID is found
        }
        
            $model = new Expensemodel();
           
            $data = [
               // 'id'        => $this->request->getPost('id'),
               'uid' => $uid,
                'expense_date'    => $this->request->getPost('expense_date'),
                'expense_Item'      => $this->request->getPost('expense_Item'),
                'expense_cost' => $this->request->getPost('expense_cost'),
               
            ];
       
    
    //changed name.
            if ($model->insertUser($data)) {
                // Set a success message in session
                session()->setFlashdata('success', 'Expense added successfully!');
            } else {
                // Set an error message in case of failure
                session()->setFlashdata('error', 'Failed to add Expense. Please try again.');
            }
             return redirect()->to('/home/expense_list');
        
        
    }



    public function expenseList()
{
    $uid = session()->get('uid');
    $model = new Expensemodel();
    
    // Fetch all the expense records
    $data['expenses'] = $model->where('uid',$uid)->findAll();
    
    // Pass data to the view
    return view('expense_list', $data);
}







public function editExpense($id)
{
    $model = new Expensemodel();
    
    // Fetch the expense details for editing
    $data['expense'] = $model->find($id);
    
    return view('edit_expense', $data);
}


public function updateExpense($id)
{
    $model = new Expensemodel();

    $data = [
        'expense_date'   => $this->request->getPost('expense_date'),
        'expense_Item'   => $this->request->getPost('expense_Item'),
        'expense_cost'   => $this->request->getPost('expense_cost'),
    ];

    if ($model->update($id, $data)) {
        session()->setFlashdata('success', 'Expense updated successfully!');
    } else {
        session()->setFlashdata('error', 'Failed to update Expense. Please try again.');
    }

    return redirect()->to('/home/expenseList'); // Redirect to the expense list after updating
}


public function deleteExpense($id)
{
    $model = new Expensemodel();
    
    if ($model->delete($id)) {
        session()->setFlashdata('success', 'Expense deleted successfully.');
    } else {
        session()->setFlashdata('error', 'Failed to delete expense.');
    }

    return redirect()->to('/home/expenseList');
}




    public function logout()
{
    // Remove the email from session
    session()->remove('email');
    session()->setFlashdata('success', 'Logged out successfully.');
    return redirect()->to('/home/login');
}



}
