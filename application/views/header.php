<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Rahul K Kikani">
    
    <?php
        if(isset($title))
        {
            ?>
            <meta name="description" content='<?php echo $desc;?>'/>
            <title><?php echo $title;?></title>
            <meta property="og:site_name" content="Viacom Box"/>
            <meta property="og:url" content="http://cscbanking.com/vbox"/>
            <meta property="og:title" content='<?php echo $title;?>'/>
            <meta property="og:disctiption" content='<?php echo $desc;?>'/>
            <meta property="og:image" content="<?php echo $img;?>"/>
            <?php
        }
        else{
            ?>
                <title>Viacom Box</title>
            <?php
        }
    ?>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>theme/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>theme/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url();?>theme/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>theme/css/sb-admin-2.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>theme/font-awesome-4.1.0/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery -->
    <script src="<?php echo base_url();?>theme/js/jquery.js"></script>
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>" style="text-align: center; width: 250px;">
                    <img src="<?php echo base_url();?>theme/img/vbox_logo.png" style="height: 34px;"/>
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-left">
                <li>
                    <a href="<?php echo base_url();?>all-show">
                         ALL SHOWS
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>all-episodes">
                         ALL EPISODES
                    </a>
                </li>
            </ul>
            
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <label>Channel</label>
                            <!-- /input-group -->
                        </li>
                        <?php
                            $ch = curl_init();
                            
                            $url = "http://api.viacom.com/v12/brands?apiKey=vT4Aq18ANEmQFPZI4jxFpJFypuGrwmVK";
                            curl_setopt($ch, CURLOPT_URL,$url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $result= curl_exec ($ch);
                            $result = json_decode($result);
                            //print_r($result);
                            curl_close ($ch);
                            if(isset($result->response)){
                                foreach($result->response->Brands as $row){
                                    $brandsID = $row->shortId;
                                    echo '<li>
                                            <a class="active" href="'.base_url().'brand/'.$row->shortId.'"><i class="fa fa-dashboard fa-fw"></i> '.$row->Title.'</a>
                                        </li>';
                                }
                            } else{
                                echo "Response Failure.";
                            }
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
