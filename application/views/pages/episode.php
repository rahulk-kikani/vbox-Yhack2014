<?php
if(isset($show_info))
{
    //print_r($brand_info);
    $title = $show_info->Title;
    $shotId = $show_info->shortId;
}
?>
        <div id="page-wrapper">
            <div class="row" style="padding-top: 100px; ;background: url('<?php echo base_url();?>theme/img/free-love-wallpaper-17441-18173-hd-wallpapers.jpg');">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $title;?>
                        <div style="float: right;">
                                <!-- LikeBtn.com BEGIN -->
                            <span class="likebtn-wrapper" data-show_dislike_label="true"></span>
                            <script type="text/javascript" src="//w.likebtn.com/js/w/widget.js" async="async"></script>
                            <!-- LikeBtn.com END -->
                        </div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="margin-top: 10px;">
                
                <?php
                    //print_r($show_info);
                    if(isset($show_info))
                    {
                        ?>
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="headline"><h3>General Information</h3></div>
                                <div class="tag-box tag-box-v4 box-shadow shadow-effect-1" id="event_description">
                                    <div>
                                        <?php
                                            if(isset($show_info->Description) && $show_info->Description != ""){
                                                echo '<strong>Description: </strong>'.$show_info->Description;
                                            }else{
                                                echo '<strong>Description: </strong> None';
                                            }
                                        ?>
                                    </div>
                                    <hr />
                                    <div>
                                        <?php
                                            echo '<strong>Episode Number: </strong>'.$show_info->EpisodeNumber;
                                        ?>
                                    </div>
                                    <div>
                                        <?php
                                            echo '<strong>Website Link: </strong><a href="'.$show_info->urls->url.'" target="_blank" /> Link</a>';
                                        ?>
                                    </div>
                                </div>
                                
                                <?php
                                if(isset($show_info->Season)){
                                ?>
                                        <div class="headline"><h3>Season Detail</h3></div>
                                        <div class="tag-box tag-box-v4 box-shadow shadow-effect-1" id="event_description">
                                            <div>
                                                <?php
                                                    echo '<strong>Title: </strong>'.$show_info->Season->Title;
                                                ?>
                                            </div>
                                            <div>
                                                <?php
                                                    echo '<strong>Season Number: </strong>'.$show_info->Season->SeasonNumber;
                                                ?>
                                            </div>
                                        </div>
                                <?php
                                    } 
                                ?>
                                <?php
                                if(isset($show_info->people)){
                                ?>
                                <div class="headline"><h3>People</h3></div>
                                <div class="tag-box tag-box-v4 box-shadow shadow-effect-1" id="event_description">
                                    <?php
                                        
                                            foreach($show_info->people as $people){
                                                ?>
                                                    <div>
                                                    <?php
                                                        echo '<strong>Name: </strong>'.$people->Name;
                                                    ?>
                                                </div>
                                                <div>
                                                    <?php
                                                        echo '<strong>Role: </strong>'.$people->role;
                                                    ?>
                                                </div>
                                                <hr />
                                                <?php
                                            }
                                        ?>
                                </div>
                                <?php
                                    } 
                                ?>
                            </div>
                            <div class="col-lg-6">
                                <?php
                                    if(isset($show_info->Images)){
                                ?>
                                <div class="headline"><h3>Gallary</h3></div>
                                <div class="tag-box tag-box-v4 box-shadow shadow-effect-1">
                                    <?php
                                        
                                            foreach($show_info->Images as $img){
                                                $thumb = $img->URL;
                                                $thumb = str_replace('http://mtv.mtvnimages.com/uri',"",$thumb);
                                                ?>
                                                    <img src="http://mtv.mtvnimages.com/uri<?php echo $thumb; ?>" style="width: 100%;" />
                                                <?php
                                            }
                                        ?>
                                </div>
                                <?php
                                    } 
                                ?>
                                <div class="headline"><h3>Share on Social Networks</h3></div>
                                <div class="tag-box tag-box-v4 box-shadow shadow-effect-1">
                                    <div class="addthis_sharing_toolbox"></div>
                                </div>
                                
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
                         <div class="col-lg-12"></div>
                        <?php
                    }
                    else{
                        echo "No Episode found for this show.";
                    }
                ?>
            </div>
<style>
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
</style>