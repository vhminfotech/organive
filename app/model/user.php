<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class user extends Model {

    protected $table = 'users';

    public function addUser($request) {

        if ($request->file()) {
            $image = $request->file('userimg');
            $name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('uploads/User/');
            $image->move($destinationPath, $name);

            $newpass = Hash::make($request->input('password'));

            $objUser = new user();
            $objUser->userimg = $name;
            $objUser->username = $request->input('username');
            $objUser->firstname = $request->input('firstname');
            $objUser->lastname = $request->input('lastname');
            $objUser->email = $request->input('email');
            $objUser->phn = $request->input('phn');
            $objUser->country = $request->input('country');
            $objUser->state = $request->input('state');
            $objUser->city = $request->input('city');
            $objUser->password = $newpass;
            $objUser->created_at = date("Y-m-d h:i:s");
            $objUser->updated_at = date("Y-m-d h:i:s");

            return $objUser->save();
        } else {
            return false;
        }
    }

    public function register($request) {

        $newpass = Hash::make($request->input('password'));
        $objUser = new user();
        $objUser->username = $request->input('username');
        $objUser->firstname = $request->input('firstname');
        $objUser->lastname = $request->input('lastname');
        $objUser->email = $request->input('email');
        $objUser->usertype = 'user';
        $objUser->password = $newpass;
//        $random = Str::random(40);
//        $objUser->verifyToken = $random;
        $objUser->created_at = date("Y-m-d h:i:s");
        $objUser->updated_at = date("Y-m-d h:i:s");

        return $objUser->save();
    }

    public function passwordReset($email) {
        $result = user::select('*')->where('email', '=', $email)->get()->toArray();

        if ($result) {
            $newpassword = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzASLKJHGDMNBVCXZPOIUYTREWQ", 6)), 0, 6);

            $objUser = user::find($result[0]['id']);
            $objUser->password = Hash::make($newpassword);
            $objUser->created_at = date('Y-m-d H:i:s');
            $objUser->save();

            $mailData['subject'] = 'Forgot password';
            $mailData['attachment'] = array();
            $mailData['mailto'] = $result[0]['email'];

            $sendMail = new Sendmail;
            $mailData['data']['caller_email'] = $result[0]['email'];
            $mailData['data']['name'] = $result[0]['username'];
            $mailData['data']['password'] = $newpassword;
            $mailData['template'] = 'email.forgot-email';
            $res = $sendMail->sendSMTPMail($mailData);
            return true;
        }
        return false;
    }

    public function getUser() {
        $result = user::select('users.id', 'users.userimg', 'users.username', 'users.firstname', 'users.lastname', 'users.email', 'users.phn', 'cities.city', 'states.state', 'countries.country')
                ->leftjoin("countries", "countries.id", "=", "users.country")
                ->leftjoin("states", "states.id", "=", "users.state")
                ->leftjoin("cities", "cities.id", "=", "users.city")
                ->get();
        return $result;
    }

    public function editUser($request, $id) {
        $objUser = new user();
        $objUser = user::find($id);
        if ($request->file()) {
            $image = $request->file('userimg');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/User/');
            $image->move($destinationPath, $name);
            $objUser->userimg = $name;
        }
        $objUser->username = $request->input('username');
        $objUser->firstname = $request->input('firstname');
        $objUser->lastname = $request->input('lastname');
        $objUser->email = $request->input('email');
        $objUser->phn = $request->input('phn');
        $objUser->country = $request->input('country');
        $objUser->state = $request->input('state');
        $objUser->city = $request->input('city');
        $newpass = Hash::make($request->input('password'));
        $objUser->password = $newpass;
        $objUser->updated_at = date("Y-m-d h:i:s");
        return $objUser->save();
    }

    public function get($request, $id) {

        $result = user::select('users.id', 'users.userimg', 'users.username', 'users.firstname', 'users.phn', 'users.lastname', 'users.email', 'cities.city as cityname', 'states.state as statename', 'countries.country as countryname', 'users.country', 'users.state', 'users.city')
                ->leftjoin("countries", "countries.id", "=", "users.country")
                ->leftjoin("states", "states.id", "=", "users.state")
                ->leftjoin("cities", "cities.id", "=", "users.city")
                ->where('users.id', $id)
                ->get();
        return $result;
    }

    public function deleteUser($data) {
        $result = DB::table("users")
                ->where('id', $data['id'])
                ->delete();

        return $result;
    }

    public function getdatatable() {

        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'users.userimg',
            1 => 'users.username',
            2 => 'users.firstname', 'users.lastname',
            3 => 'users.email',
            4 => 'users.phn',
            5 => 'users.country', 'users.state', 'users.city',
        );

        $query = user::from('users')
                ->leftjoin("countries", "countries.id", "=", "users.country")
                ->leftjoin("states", "states.id", "=", "users.state")
                ->leftjoin("cities", "cities.id", "=", "users.city");

        if (!empty($requestData['search']['value'])) {
            // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                $flag = 0;
                foreach ($columns as $key => $value) {
                    $searchVal = $requestData['search']['value'];
                    if ($requestData['columns'][$key]['searchable'] == 'true') {
                        if ($flag == 0) {
                            $query->where($value, 'like', '%' . $searchVal . '%');
                            $flag = $flag + 1;
                        } else {
                            $query->orWhere($value, 'like', '%' . $searchVal . '%');
                        }
                    }
                }
            });
        }

        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());

        $resultArr = $query->skip($requestData['start'])
                ->take($requestData['length'])
                ->select('users.id', 'users.userimg', 'users.username', 'users.firstname', 'users.lastname', 'users.email', 'users.phn', 'cities.city as cityname', 'states.state as statename', 'countries.country as countryname')
                ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $i++;
            $imagepath = url('public/uploads/user/' . $row['userimg']);
            $id = $row['id'];
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $phn = $row['phn'];
            $country = $row['countryname'];
            $state = $row['statename'];
            $city = $row['cityname'];
            $actionhtml = '';

            $actionhtml = '<center><a href="' . route("updateuser", $id) . '"><button class="btn btn-xs btn-info"><i class="fa fa-edit"></i></button></a>  '
                    . '<a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-xs btn-danger deleteUser" data-id="' . $row["id"] . '"><i class="fa fa-trash"></i></a>'
                    . '</center>';

            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center><img src="' . $imagepath . '"  alt="user-img" title="user-img" class="rounded mr-3" height="50"></center>';
            $nestedData[] = '<center>' . $username . '</center>';
            $nestedData[] = '<center>' . $firstname . ' ' . $lastname . '</center>';
            $nestedData[] = '<center>' . $email . '</center>';
            $nestedData[] = '<center>' . $phn . '</center>';
            $nestedData[] = '<center>' . $city . ', ' . $state . ', ' . $country . '</center>';
            $nestedData[] = $actionhtml;
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }

}
