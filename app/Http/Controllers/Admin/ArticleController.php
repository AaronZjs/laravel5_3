<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Articles;
use App\Cates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
/**
* Admin/Article
*/
class ArticleController extends Controller
{
	function list()
	{
		$articles = with(new Articles)
		->select('cates.cate_name','cates.id','articles.*')
		->leftJoin('cates','cates.id','=','articles.cate_id')
		->paginate(10);

		$cates = with(new Cates)->get();

		$data = array(
			'title'=>'文章列表',
			'articles'=>$articles,
			'cates'=>$cates,
		);
		// dump($articles);
		return view('admin.article.list',$data);
	}

	function edit($id)
	{
        $redis = Redis::connection();
		$pv = Redis::get('article_pv_'.$id);
		$article = with(new Articles)
		->select('cates.cate_name','cates.id','articles.*')
		->leftJoin('cates','cates.id','=','articles.cate_id')
		->find($id);
		$cates = with(new Cates)->get();
		$data = array(
			'article' => $article,
			'title'	  => '编辑 | '.$article->title,
			'cates'=>$cates,
			'pv'=>$pv,
		);
		return view('admin.article.edit',$data);
	}

	function post_edit(Request $request)
	{
		$data = array();
		$data['cate_id'] = $request->cate_id;
		$data['body'] = $request->content;
		$data['title'] = $request->title;
		$res = with(new Articles)->where('id',$request->id)->update($data);
    	return redirect()->back()->withErrors($res?'修改成功':'修改失败,请重试..');
	}

	function add()
	{

		$cates = with(new Cates)->get();
		$data = array(
			'title'	  => '新增文章',
			'cates'=>$cates,
		);
		return view('admin.article.add',$data);
	}

	function post_add(Request $request)
	{
		$data = array();
		$data['cate_id'] = $request->cate_id;
		$data['body'] = $request->content;
		$data['title'] = $request->title;
		$res = with(new Articles)->create($data);
    	return redirect()->back()->withErrors($res?'新增成功':'新增失败,请重试..');
	}

	function del(Request $request)
	{
		$id = $request->id;
		$res = with(new Articles)->where('id',$id)->delete();
		return $res?1:'err';
	}
}