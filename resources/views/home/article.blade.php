@include('home_default.header')

<nav class="navbar navbar-default navbar-fixed-top" style="opacity: .9" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">Test新闻站</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            @foreach($cates as $v)
                <li><a href="{{url('cate')}}/{{$v->id}}">{{$v->cate_name}}</a></li>
            @endforeach
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container center-block" style="margin-top: 100px;"><div class="page-header">
  <h1>{{$article->title}} <small><span class="label label-default" style="font-size: 12px;" >{{$article->cate_name}}</span></small></h1>

  <span style="color: #999;">发布时间 : {{$article->created_at}}</span>
  <span style="color: #999;margin-left: 10px;">PV : {{ $pv or 0}}</span>
</div>
{{$article->body}}
</div>

@include('home_default.footer')