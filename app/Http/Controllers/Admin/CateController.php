<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Articles;
use App\Cates;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

use DB;
/**
* Admin/Cate
*/
class CateController extends Controller
{
	function list()
	{
		$cates = with(new Cates)->get();
		$data = array(
			'title'=>'分类列表',
			'cates'=>$cates,
		);
		return view('admin.cate.list',$data);
	}

	function edit($id)
	{
		$cate = with(new Cates)->find($id);
		$data = array(
			'cate'=>$cate,
		);
		return view('admin.cate.edit',$data);
	}

	function post_edit(Request $request)
	{

		$data = array();
		$data['cate_name'] = $request->cate_name;
		$res = with(new Cates)->where('id',$request->id)->update($data);
    	return redirect()->back()->withErrors($res?'修改成功':'修改失败');
	}
}