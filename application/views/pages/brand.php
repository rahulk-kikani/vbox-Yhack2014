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
                                
                                echo '      <td><img style="width: 100px;float:left;" src="http://mtv.mtvnimages.com/uri'.$thumb.'"/> <div style="float: left;padding: 0px 10px;"> <a href="'.base_url().'show/'.$row->shortId.'" class="show_title">'.$row->Title.'</a><br />
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
<style>
.show_title{
    font-size: 17px;
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