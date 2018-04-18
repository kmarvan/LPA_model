<head>
    <title>
        <?= $title;?>
    </title>
    <base href="<?= base_url();?>">
    <link rel="shortcut icon" href='favicon.ico'>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/flatly.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/nv.d3.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/style.css">
    
     <script src="<?= base_url(); ?>js/jquery-3.1.1.min.js"></script> 
    <script type="text/javascript">
        base_url = '<?= base_url() ?>';
    </script>

</head>
<body>
    <!-- menu bar start -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Experimental Nonlinear Population Dynamics</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Research Topics <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">People</a></li>
					<li><a href="#">Publications</a></li>
					<li><a href="#">Datasets</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Educational Materials <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">LPA model simulator</a></li>
                            <li><a href="#">Population essays</a></li>
                            <li><a href="#">Flour beetles in the classroom</a></li>
                            <li><a href="#">Beetle Art</a></li>
                           
                        </ul>
                    </li>
					<li><a href="#">Sitemap</a></li>
                </ul>
                
                <!--<ul class="nav navbar-nav navbar-left">
                    <li><a href="#">Link</a></li>
                </ul>-->
				<form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input class="form-control" placeholder="Search" type="text">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- menu bar end -->