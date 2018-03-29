<?php

namespace App\Http\Controllers\Admin;
use App\Pic;
use App\Newuser;
use Exception;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use APP\Xpic;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
        //
    }

    public function login(Request $req){
        $username = $req['username'];
        $psw = $req['psw'];
        $obj = new Newuser();
        $re = $obj->where(['username'=>$username,'password'=>$psw])->get();
//        dd($re);exit;
        if(count($re)){
            $obj = new Pic();
            $data = $obj->all();
            return view('/admin/pic',['data'=>$data]);
        }else{
            return redirect('/admin/user');
        }
    }

    public function register(){
        return view('admin.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $obj = new Newuser();
        $obj->username = $req['username'];
        $obj->email = $req['email'];
        $obj->password = $req['psw'];
        $re = $obj->save();
        if($re){
            return view('/admin/wait')->with(
                [
                    'message'=>'你已经注册成功，请等待！',
                    'url' =>'/admin/user',
                    'jumpTime'=>8,
                ]
            );
        }else{
            return false;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function piclist()
    {
        $data =  Pic::all();
        return view("admin.pic",['data'=>$data]);
        //
    }

    public function picsave(Request $request){
        $obj = new Pic();
        $obj->title = $request->title;
        $obj->content = $_POST['content'];

        $res = Pic::where('title',$obj->title)->get();
        if(count($res))
            return redirect('admin/pic');

        $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $newStr = '';
        for($i=0;$i<14;$i++){
            $num = mt_rand(0,strlen($str)-1);
            $newStr .= substr($str,$num,1);
        }
        $newStr = $newStr.'.jpg';
        $request->file('picname')->move(public_path('uploads'),$newStr);
        $obj->pathname = $newStr;
        $re = $obj->save();
        if($re){
            $picobj = new Pic();
            $data = $picobj->all();
            return view('/admin/pic',['data'=>$data]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function picdelete($id)
    {
        $obj = Pic::find($id);
        $re = $obj->delete();
        if($re){
            return redirect('admin/pic');
        }
//        echo "<pre>";var_dump($id);
        //
    }

    public function piccontent($id){
        $res = Pic::where('id',$id)->get();
        return view('admin/piccontent',['res'=>$res]);
//        echo "<pre>";var_dump($res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
