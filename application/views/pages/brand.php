<?php
if(isset($brand_info))
{
    //print_r($brand_info);
    $title = $brand_info->Title;
    $shotId = $brand_info->shortId;
} else{
    $title = "ALL SHOWS";
}
?>
        <div id="page-wrapper">
            <div class="row" style="padding-top: 100px; ;background: url('<?php echo base_url();?>theme/img/free-love-wallpaper-17441-18173-hd-wallpapers.jpg');">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $title;?>
                        <?php 
                        
                            if($title != "ALL SHOWS"){
                                ?>
                                    <div style="float: right;">
                                <!-- LikeBtn.com BEGIN -->
                            <span class="likebtn-wrapper" data-show_dislike_label="true"></span>
                            <script type="text/javascript" src="//w.likebtn.com/js/w/widget.js" async="async"></script>
                            <!-- LikeBtn.com END -->
                        </div>
                                <?php
                            }
                        ?>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-lg-12">
                    <div class="col-lg-8">
                        <div class="headline"><h3>Show List</h3></div>
                        <div class="tag-box tag-box-v4 box-shadow shadow-effect-1" id="event_description">
                                <div class="table-responsive">
                                    <?php
                                        if(isset($brand_show_list))
                                        {
                                            ?>
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                            <tr>
                                                                <td></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                            <?php
                                                $i = 1 ;
                                                //echo count($brand_show_list);
                                                foreach($brand_show_list as $row){
                                                    //echo "<pre>";
                                                    //print_r($row);
                                                    if($i%2==0){
                                                        echo '<tr class="even">';
                                                    }
                                                    else{
                                                        echo '<tr class="odd">';
                                                    }
                                                    $thumb = "";
                                                    if(isset($row->Images)){
                                                         $img = $row->Images[0];
                                                            if(isset($img->ImageAssetRefs)){
                                                                $thumb = $img->ImageAssetRefs[0]->URI;
                                                                $thumb = str_replace('http://mtv.mtvnimages.com/uri',"",$thumb);
                                                            } else if(isset($img->URL)){
                                                                $thumb = $img->URL;
                                                                $thumb = str_replace('http://mtv.mtvnimages.com/uri',"",$thumb);
                                                            }
                                                    }
                                                    
                                                    echo '      <td><img style="width: 100px;float:left;" src="'.base_url().'timthumb.php?src=http://mtv.mtvnimages.com/uri'.$thumb.'&w=100&h=80"/> <div style="float: left;padding: 0px 10px;"> <a href="'.base_url().'show/'.$row->shortId.'" class="show_title">'.$row->Title.'</a><br />
                                                                <a style="color: #777;" href="'.$row->urls->url.'" target="_blank">External Website</a></div></td>';
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            ?>
                                                        </tbody>
                                                    </table>
                                            <?php
                                        } else {
                                            echo "No Show found for this tv channel.";
                                        }
                                    ?>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <?php
                        if($title != "ALL SHOWS"){
                            ?>
                                
                                    <div class="headline"><h3>General Information</h3></div>
                                            <div class="tag-box tag-box-v4 box-shadow shadow-effect-1" id="event_description">
                                                <div>
                                                    <?php
                                                        if(isset($brand_show_list)){
                                                            echo '<strong>'.count($brand_show_list).' Shows</strong>';
                                                        }
                                                        else{
                                                            echo "0 Show";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                    
                            <?php
                        }
                    ?>
                                
                                    <div class="headline"><h3>Place your comments</h3></div>
                                <div class="tag-box tag-box-v4 box-shadow shadow-effect-1">
                                    <div id="disqus_thread"></div>
                                        <script type="text/javascript">
                                            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                            var disqus_shortname = 'vboxyhack'; // required: replace example with your forum shortname
                                    
                                            /* * * DON'T EDIT BELOW THIS LINE * * */
                                            (function() {
                                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                            })();
                                        </script>
                                        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                        
                                </div>
                    </div>
                </div>
            </div>
<style>
.show_title{
    font-size: 17px;
}
 
.shadow-effect-1 {
box-shadow: 0 10px 6px -6px #bbb;
-moz-box-shadow: 0 10px 6px -6px #bbb;
-webkit-box-shadow: 0 10px 6px -6px #bbb;
}

.box-shadow {
background: #fff;
position: relative;
}

.tag-box-v4 {
border: dashed 1px #bbb;
}

.tag-box {
padding: 20px;
background: #fff;
margin-bottom: 30px;
}

.box-shadow:after, .box-shadow:before {
top: 80%;
left: 5px;
width: 50%;
z-index: -1;
content: "";
bottom: 15px;
max-width: 300px;
background: #999;
position: absolute;
}

.headline {
display: block;
margin: 10px 0 2px 0;
border-bottom: 1px dotted #e4e9f0;
}

.headline h2, .headline h3, .headline h4 {
border-bottom: 2px solid #72c02c;
}

.headline h2, .headline h3, .headline h4 {
margin: 0 0 -2px 0;
padding-bottom: 5px;
display: inline-block;
border-bottom: 2px solid #72c02c;
}

h1, h2, h3, h4, h5, h6 {
color: #585f69;
margin-top: 5px;
text-shadow: none;
font-weight: normal;
font-family: 'Open Sans', sans-serif;
}

h3 {
font-size: 17px;
line-height: 15px;
}

strong{
    color: #444;
}
thead{
    display: none;
}
</style>
            <script src="<?php echo base_url();?>theme/js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url();?>theme/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>