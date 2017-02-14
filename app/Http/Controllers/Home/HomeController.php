<?php 
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use App\Articles;
use App\Cates;
// use Redis;
use Illuminate\Support\Facades\Redis;
/**
* 首页
*/
class HomeController extends Controller
{
	// function 
	function index()
	{
		$articles = with(new Articles)
		->leftJoin('cates','cates.id','=','articles.cate_id')
		->paginate(10);
		$cates = with(new Cates)->get();

		$data = array(
			'title'=>'首页',
			'articles'=>$articles,
			'cates'=>$cates,
		);
		return view('home.index',$data);
	}

	function article($id)
	{
		$article = with(new Articles)
		->select('articles.*','cates.cate_name')
		->leftJoin('cates','cates.id','=','articles.cate_id')->findOrfail($id);

		$redis = Redis::connection();

		Redis::incr('article_pv_'.$id);
		$pv = Redis::get('article_pv_'.$id);

		$cates = with(new Cates)->get();

		$data = array(
			'title'=>$article->title,
			'article'=>$article,
			'cates' => $cates,
			'pv'=>$pv,
		);
		// dump($data);
		return view('home.article',$data);
	}

	function cate($id)
	{
		$cate = with(new Cates)->findOrfail($id);
		$cates = with(new Cates)->get();
		$articles = with(new Articles)
		->select('articles.*','cates.cate_name')
		->where('cate_id',$id)
		->leftJoin('cates','cates.id','=','articles.cate_id')
		->paginate(10);

		$data = array(
			'title'=>$cate->cate_name,
			'articles'=>$articles,
			'cates'=>$cates,
		);
		// dump($data);
		return view('home.index',$data);
	}
}
 ?>