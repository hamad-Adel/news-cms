<header class="header black-bg">
      <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
    <!--logo start-->
    <a href="/" class="logo"><b>DASHBOARD</b></a>

    <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-user"></i>
                            <span>{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li class="external">
                                <a href="#">Account</a>
                            </li>
                            <li class="external">
                                <a href="#">Change Password</a>
                            </li>
                            <li class="external">
                                <a href="/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--  notification end -->
            </div>
    <!--logo end-->
     <div class="col-md-3 col-md-offset-4">
        <form action="{{route('search')}}" method='get' class="form-inline" style="margin-top:10px;">
          <div class="form-group">
              <input type="search" name="query" class="form-control"
              value="{{old('query')}}">
              <input class="btn btn-theme02" type="submit"  value="Search">
          </div>
      </form>
   </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="/logout">Logout</a></li>
        </ul>
    </div>
</header>