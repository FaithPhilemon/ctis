<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.php"><i class="fa fa-fw fa-book"></i>Crime Tracking Information System</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="index.php">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="New Case">
                    <a class="nav-link" href="manage-cases.php?source=side_bar">
                        <i class="fa fa-fw fa-plus-circle"></i>
                        <span class="nav-link-text">New Case</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="All Cases">
                    <a class="nav-link" href="index.php#list">
                        <i class="fa fa-fw fa-list"></i>
                        <span class="nav-link-text">All Cases</span>
                    </a>
                </li>

                 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="New User">
                    <a class="nav-link" href="signup.php?source=sidebar">
                        <i class="fa fa-fw fa-user-plus"></i>
                        <span class="nav-link-text">New User</span>
                    </a>
                </li>
                
                <!--
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                    <a class="nav-link" href="#">
                        <i class="fa fa-fw fa-link"></i>
                        <span class="nav-link-text">Manage Courts</span>
                    </a>
                </li> -->
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
    <!-- <li class="nav-item">
        <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for...">
                <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
    </li> -->
    <li class="nav-item">
         <form action="logout.php" method="post" class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
                <span class="input-group-append">
                <button class="btn btn-link" type="submit" name="btnLogOut">
                <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </button>
              </span>
            </div>
        </form>
    </li>
</ul>
</div>
</nav>