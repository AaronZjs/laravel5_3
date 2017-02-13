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

<div class="row" style="padding-top: 70px">
  <div class="container center-block">
    <div class="col-md-2"></div>
    <div class="col-md-8 col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">News</h3>
        </div>
        <ul class="list-group">
          @foreach($articles as $v) 
          <a href="{{url('article')}}/{{$v->id}}">
            <li class="list-group-item title">
             <?php echo str_limit($v->title, $limit = 100, $end = '...'); ?><span class="label label-default" style="font-size: 12px;float: right;" >{{$v->cate_name}}</span>
            </li>
          </a>
          @endforeach
                  
        </ul>
      </div>
    <?php echo $articles->render(); ?>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


@include('home_default.footer')