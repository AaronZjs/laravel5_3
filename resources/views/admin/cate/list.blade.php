@include('admin_default.header')

<div class="row" style="padding-top: 70px">
  <div class="container center-block">
    <div class="col-md-2"></div>
    <div class="col-md-8 col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Cates</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>标题</td>
                    <td>文章数量</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                @foreach($cates as $v) 
                <tr id="article_{{$v->id}}">
                    <td>{{$v->id}}</td>
                    <td>{{$v->cate_name}}</td>
                    <td>12</td>
                    <td>
                        [<a href="{{url('admin/cate/edit')}}/{{$v->id}}" target="_blank;">编辑</a>]
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

      </div>
    <!-- <?php //echo $cates->render(); ?> -->
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>
@include('admin_default.footer')