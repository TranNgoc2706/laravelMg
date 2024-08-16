<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreataFromRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    // Type-hint đúng cách cho UserService
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->get();
        return view('list', [
            'title' => 'Danh sách người dùng',
            'users' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $user =  $this->userService->get();
        return view('add', [
            'title' => 'thêm người dùng mới ',
            'users'=> $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreataFromRequest $request )
    {
        $this->userService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user )
    {
        return view('edit',[
            'title'=>'chinh sua sản phẩm: '.$user->name,
            'users'=>$user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $user)
    // {
    //     $this->userService->update($request,$user);
    //     return redirect('/list');
    // }

    // public function destroy(Request $request)
    // {
    //     $result = $this->userService->delete($request);
    //     if($result){
    //         return response()->json([
    //             'error'=>false,
    //             'message' => 'xoa thanh cong'
    //         ]);
    //     }
    //     return response()->json([
    //         'error'=>true]);
    // }
}
