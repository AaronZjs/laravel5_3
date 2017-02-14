@include('admin_default.header')
<?php 

use Illuminate\Support\Facades\Redis;
        $redis = Redis::connection();
 ?>
<div class="row" style="padding-top: 70px">
  <div class="container center-block">
    <div class="col-md-2"></div>
    <div class="col-md-8 col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">News <a href="{{url('admin/article/add')}}" style="float: right;border:1px solid black;">新增文章</a></h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>标题</td>
                    <td>属于</td>
                    <td>PV</td>
                    <td>发布时间</td>
                    <td>最后编辑</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $v) 
                <tr id="article_{{$v->id}}">
                    <td>{{$v->id}}</td>
                    <td>{{$v->title}}</td>
                    <td>{{$v->cate_name}}</td>
                    <td><?php $kv = Redis::get('article_pv_'.$v->id);echo $kv?$kv:0;?></td>
                    <td>{{$v->created_at}}</td>
                    <td>{{$v->updated_at}}</td>
                    <td>
                        [<a href="{{url('article')}}/{{$v->id}}" target="_blank;">查看</a>]
                        [<a href="{{url('admin/article/edit')}}/{{$v->id}}" target="_blank;">编辑</a>]
                        [<a href="javascript:;" onclick="del({{$v->id}});">删除</a>]
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

      </div>
    <?php echo $articles->render(); ?>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>
<script type="text/javascript">
    function del(id)
    {
        if (confirm('确定删除吗？')) { 
            $.ajax({
              type: "POST",
              url: "{{url('admin/article/del')}}",
              data: {id:id},
              dataType: "json",
              success: function(data){
                $("#article_"+id).hide();
              },
              error: function(msg){
                alert('删除失败，请重试..');
              }
            });
        }else{
            return false;
        };
    }
</script>
@include('admin_default.footer')