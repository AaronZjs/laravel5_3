<?php 
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use App\Articles;
use App\Cates;
use Validator;
use Auth;
use Hash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
/**
* 首页
*/
class LoginController extends Controller
{
	function register(Request $request)
	{
		$email = $request->email;
		$password = $request->password;

	    $v = Validator::make($request->all(), [
	        'email' => 'required|string|email',
	        'password' => 'required'
	    ],[
	        'email.required' => '请填写E-Mail!',
	        'email.string' => 'E-Mail必须为字符串!',

	        'password.required' => '请填写登录密码！',
    	]);


	    // 验证
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors());
	    }

		$password = Hash::make($password);
		User::create(['email' => $email,'name'=>'test','password'=>$password,'role'=>1]);
	}

	function login(Request $request)
	{
		$email = $request->email;
		$password = $request->password;

	    $v = Validator::make($request->all(), [
	        'email' => 'required|string|email',
	        'password' => 'required'
	    ],[
	        'email.required' => '请填写E-Mail!',
	        'email.string' => 'E-Mail必须为字符串!',

	        'password.required' => '请填写登录密码！',
    	]);


	    // 验证
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors());
	    }

	    if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 1]))
	    {
	    	$user = User::where('email',$email)->first();
			Auth::loginUsingId($user->id);
			return redirect('admin');
	    }else{
	    	return redirect()->back()->withErrors('登录失败,请检查密码是否正确,或您无权访问!');
	    }

	}
}