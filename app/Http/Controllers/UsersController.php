<?php

namespace App\Http\Controllers;

use App\User;
use App\Favorite;
use App\Block;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function get_all_contacts(){
        //$user = User::all();
        $user = db::table('users')
        ->orderBy('id', 'asc')
        ->get();
        if($user )
            return $this->sendResponse($user->toArray(), 'Berhasil');
     
        
    }

    public function delete_all_contacts(){
        User::truncate();
        $user = User::all();
        return $this->sendResponse($user->toArray(), 'Contact has been deleted successfully.');
    }

    public function delete_contact_by_id($id){
        $user = User::find($id);
        $user->delete();

            return $this->sendResponse($user->toArray(), 'Contact has been deleted successfully.');
           
    }

    public function getDetail($id){
        $user = User::find($id);
        return $this->sendResponse($user->toArray(),'Detail Contact');
    }

    public function create_contact(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'no_handphone' => 'required',
            'name' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $user = User::create($input);
        return $this->sendResponse($user->toArray(), 'Contact created successfully.');
    }

    public function create_favorite($id){
        $user = User::find($id);
        $favorit= new Favorite();
        $favorit->name=$user->name;
        $favorit->no_handphone= $user->no_handphone;
        $favorit->save();
        return "Data Berhasil";
    }

    public function get_all_favorite(){
        //$user = User::all();
        $user = db::table('favorite')
        ->orderBy('id', 'asc')
        ->get();
        if($user )
        return $this->sendResponse($user->toArray(), 'OK');
    }

    public function unfavorite_contact_by_id($id){
        $user = favorite::find($id);
        $user->delete();
    
        return $this->sendResponse($user->toArray(), 'Contact has been deleted successfully.');
    }

    public function create_block($id){
        $user = User::find($id);
        $block= new Block();
        $block->name=$user->name;
        $block->no_handphone= $user->no_handphone;
        $block->save();
        if($user )
        return "Data Berhasil";
        else($user);
        return $this->sendError($user->toArray(), 'Data tidak ditemukan');
    }

    public function get_all_block(){
        //$user = User::all();
        $user = db::table('blocks')
        ->orderBy('id', 'asc')
        ->get();
        if($user )
        return $this->sendResponse($user->toArray(), 'OK');
        
    }

    public function unblock_contact_by_id($id){
        $user = block::find($id);
        $user->delete();
    
        return $this->sendResponse($user->toArray(), 'Contact has been deleted successfully.');
        
    }

    public function update_contact(request $request, $id){
        
        $no_handphone = $request->no_handphone;
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        
        $user = User::find($id);
        $user->no_handphone = $no_handphone;
        $user->name = $name;
        $user->email = $email;
        $user->address = $address;

        $user->save();

        return "Data Berhasil";

        //echo $input['no_handphone'];
        //$user->no_handphone = $input['no_handphone'];
        //$user->name = $input['name'];
        //$user->save();

        //return $this->sendResponse($user->toArray(), 'Contact updated successfully.');
    }

    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    
    }
}
