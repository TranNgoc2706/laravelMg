<?php
namespace App\Http\Services;

use App\Http\Requests\Product\CreateFormRequest;

use App\Http\Services\UploadService;
use App\Models\User;

class UserService{

    public function insert( $request)
    {
        try{
            $existingUser = User::where('name', $request->input('name'))->first();
            if ($existingUser) {
                $request->session()->flash('error', 'người dùng đã tồn tại');
                return false;
            }

            User::create($request->all());
            $request->session()->flash('success', 'Thêm thành công');
        } catch (\Exception $err) {
            $request->session()->flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function get()
    {
        return User::all();
     }
    public function update($request ,$user){
        try{
            $user->fill($request->input());
            $user->save();
            $request->session()->flash('success','cap nhat thanh cong');
        }catch(\Exception $err){
            $request->session()->flash('error','cap nhat thanh cong that bai');
            $err->getMessage();
            return false;
        }
        
      return true;
        
    }
    public function delete($request)
    {
        $user = User::where('id',$request->input('id'))->first();
        if($request){
            $user->delete();
            return true;
        }
        return false;
    }
}