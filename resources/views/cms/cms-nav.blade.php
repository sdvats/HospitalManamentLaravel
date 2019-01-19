<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/cms') }}">CMS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::path() == 'cms/add-caller' ? 'active' : '' }}"><a href="{{ url('/cms/add-caller') }}">Add Caller</a></li>
                <li class="{{ Request::path() == 'cms/search-caller' ? 'active' : '' }}"><a href="{{url('/cms/search-caller')}}">Search Caller</a></li>
                <li class="{{ Request::path() == 'cms/reports' ? 'active' : '' }}"><a href="{{ url('/cms/reports') }}">Generate Reports</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>