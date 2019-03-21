<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
            <p class="centered"><a href="profile.html"><img src="{{asset('assets/img/ui-sam.jpg')}}" class="img-circle" width="60"></a></p>
            @if(Auth::check())
                <h5 class="centered">{{Auth::user()->name}}</h5>
            @endif
              
            <li class="mt">
                <a class="active" href="/">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Categories</span>
                </a>
                <ul class="sub">
                    <li><a  href="/category">show all Categories</a></li>
                    <li><a  href="/category/create">add new category</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>News</span>
                </a>
                <ul class="sub">
                    <li><a  href="/news">show all news</a></li>
                    <li><a  href="/news/create">add news</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href='/logout' >
                    <i class="fa fa-cogs"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>