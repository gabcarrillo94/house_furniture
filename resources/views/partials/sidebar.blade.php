<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) --
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <br>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>Home</span></a></li> -->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Banners</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('banner/add') }}">Add banner</a></li>
                    <li><a href="{{ route('banner/show') }}">Show all banner</a></li>
                </ul>
            </li>
            <li><a href="{{ route('aboutus/add') }}"><i class='fa fa-link'></i> <span>About Us</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Portfolio</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('album/add') }}">Create new album</a></li>
                    <li><a href="{{ route('albums/show') }}">Show portfolio</a></li>
                    <li><a href="{{ route('video/add') }}">Create a video</a></li>
                    <li><a href="{{ route('videos/show') }}">Show videos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Product</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('product/add') }}">Add product</a></li>
                    <li><a href="{{ route('product/show') }}">Show all product</a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Product Category</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('category/add') }}">Add category</a></li>
                    <li><a href="{{ route('category/show') }}">Show all categories</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span> ShowRoom </span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('showromm-add-image') }}">Add image</a></li>
                    <li><a href="{{ route('showrooms/show') }}">Show all images</a></li>
                </ul>
            </li>
            <li><a href="{{ route('company/add') }}"><i class='fa fa-link'></i> <span>Company profile</span></a></li>
            <li><a href="{{ url('settings/site') }}"><i class='fa fa-link'></i> <span style="margin-right: 20px!important;">Settings</span> <span class='new'>new</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
