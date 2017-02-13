@include('admin_default.header')


<form action="{{url('admin/article/edit')}}" method="post">
	<div class="container center-block" style="margin-top: 100px;"><div class="page-header">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger" style="font-style: 16px;color: red;">
                            <!-- <strong>错误!</strong> 请检查你的输入.<br><br> -->
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

	  <h1>
	标题:<input type="text" name="title" value="{{$article->title or Null}}"> 分类:
	<small>
	<select id="cate_id" name="cate_id">
	@foreach($cates as $v)
		<option value="{{$v->id}}">{{$v->cate_name}}</option>
	@endforeach
	</select>
	</small>
	<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">
	$("#cate_id").val(2);
	</script>

	</h1>

	  <span style="color: #999;">修改时间 : <?php echo date('Y-m-d H:i:s',time()); ?></span>
	  <span style="color: #999;margin-left: 10px;">PV : {{ $pv or 0}}</span>
	</div>


	    <!-- 加载编辑器的容器 -->
	    <script id="container" name="content" type="text/plain">
	        <?php echo html_entity_decode($article->body); ?>
	    </script>
	    <!-- 配置文件 -->
	    <script type="text/javascript" src="{{asset('/')}}/admin-style/utf8-php/ueditor.config.js"></script>
	    <!-- 编辑器源码文件 -->
	    <script type="text/javascript" src="{{asset('/')}}/admin-style/utf8-php/ueditor.all.js"></script>
	    <!-- 实例化编辑器 -->
	    <script type="text/javascript">
	        var ue = UE.getEditor('container');
	    </script>

    {!! csrf_field() !!}


	    <input type="hidden" name="id" value="{{$article->id}}">

		<input type="submit" value="更新">
	</div>
</form>
@include('admin_default.footer')