<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Articles;
use App\Cates;
use Auth;
use Illuminate\Support\Facades\Redis;
/**
* Admin
*/
class AdminController extends Controller
{
	function index()
	{
		return view('admin.index');
	}

	function logout()
	{
		Auth::logout();
		return redirect('/');
	}
}