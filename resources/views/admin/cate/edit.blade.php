@include('admin_default.header')


<form action="{{url('admin/cate/edit')}}" method="post">
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
	分类名称:<input type="text" name="cate_name" value="{{$cate->cate_name or Null}}"> 


    {!! csrf_field() !!}


	    <input type="hidden" name="id" value="{{$cate->id}}">

		<input type="submit" value="更新">
	</div>
</form>
@include('admin_default.footer')