@include('home_default.header')

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
<form action="{{url('register')}}" method="post" name="form1">
E - Mail:<input type="text" name="email">
密码:<input type="password" name="password">
    {!! csrf_field() !!}
	<button>注册</button>
</form>
<script type="text/javascript">
	$('#login').form1.submit();
</script>
@include('home_default.footer')