<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $uname;?></p>
                    <a href="dashboard"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
           
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
               
                <li>
                    <a href="dashboard">
                        <i class="fa fa-th"></i> <span>Dashboard</span>
                    </a>
                </li>
                
                 <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cube"></i>
                        <span>Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="categorylist"><i class="fa fa-circle-o"></i> All Category</a></li>
                        <li><a href="addcategory"><i class="fa fa-circle-o"></i> Add Category</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="managecolor">
                        <i class="fa fa-circle"></i> <span>Color Configuration</span>
                    </a>
                </li>
                
                <li>
                    <a href="managesize">
                        <i class="fa fa-signal"></i> <span>Size Configuration</span>
                    </a>
                </li>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Product Configuration</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="manageproduct"><i class="fa fa-plus-circle"></i> Add Product</a></li>
                        <li><a href="productlist"><i class="fa fa-dashboard"></i> Product List</a></li>
                    </ul>
                </li>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                        <span>Frontend Configuration</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="contact"><i class="fa fa-circle-o"></i> Contact Us</a></li>
                        <li><a href="managefaq"><i class="fa fa-circle-o"></i> FAQ</a></li>
                        <li><a href="manageslider"><i class="fa fa-circle-o"></i> Slider</a></li>
                    </ul>
                </li>
                
                
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>