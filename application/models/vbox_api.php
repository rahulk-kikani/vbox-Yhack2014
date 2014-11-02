<?php
class Vbox_api extends CI_Model {
	function __construct() {
		parent::__construct();
	}
    
    function get_brands(){
        $ch = curl_init();
        $url = "http://api.viacom.com/v12/brands?apiKey=vT4Aq18ANEmQFPZI4jxFpJFypuGrwmVK";
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result= curl_exec ($ch);
        $result = json_decode($result);
        curl_close ($ch);
        if(isset($result->response)){
            return $result->response->Brands;
        } else{
            return 0;
        }
    }
    
    function get_brand_info($brandID){
        if($brandID != "")
        {
                $ch = curl_init();
                $url = "http://api.viacom.com/v12/brands/".$brandID."?apiKey=vT4Aq18ANEmQFPZI4jxFpJFypuGrwmVK";
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result= curl_exec ($ch);
                $result = json_decode($result);
                curl_close ($ch);
                if(isset($result->response)){
                    if(count($result->response->Brands) > 0){
                        return $result->response->Brands;
                    }
                } else{
                    return 0;
                }
        }else{
            return 0;
        }
    }
    
    function get_show_info_byBrand($brandID){
        if($brandID != "")
        {
                $ch = curl_init();
                $url = "http://api.viacom.com/v12/brands/".$brandID."/shows?apiKey=vT4Aq18ANEmQFPZI4jxFpJFypuGrwmVK";
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result= curl_exec ($ch);
                $result = json_decode($result);
                curl_close ($ch);
                if(isset($result->response)){
                    if(count($result->response->Shows) > 0){
                        return $result->response->Shows;
                    }
                } else{
                    return 0;
                }
        }else{
            return 0;
        }
    }
    
    function get_allshow_info(){
                $ch = curl_init();
                $url = "http://api.viacom.com/v12/shows?apiKey=vT4Aq18ANEmQFPZI4jxFpJFypuGrwmVK";
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result= curl_exec ($ch);
                $result = json_decode($result);
                curl_close ($ch);
                if(isset($result->response)){
                    if(count($result->response->Shows) > 0){
                        return $result->response->Shows;
                    }
                } else{
                    return 0;
                }
    }
    
    function get_episodes_by_show($showId){
        if($showId != "")
        {
                $ch = curl_init();
                $url = "http://api.viacom.com/v12/shows/".$showId."/episodes?apiKey=vT4Aq18ANEmQFPZI4jxFpJFypuGrwmVK";
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result= curl_exec ($ch);
                $result = json_decode($result);
                //echo "<pre>";
                //print_r($result);
                curl_close ($ch);
                if(isset($result->response)){
                    if(count($result->response->Episodes) > 0){
                        return $result->response->Episodes;
                    }
                } else{
                    return 0;
                }
        }else{
            return 0;
        }
    }
    
    function get_showDetail($showId){
        if($showId != "")
        {
                $ch = curl_init();
                $url = "http://api.viacom.com/v12/shows/".$showId."?apiKey=vT4Aq18ANEmQFPZI4jxFpJFypuGrwmVK";
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result= curl_exec ($ch);
                $result = json_decode($result);
                //echo "<pre>";
                //print_r($result);
                curl_close ($ch);
                if(isset($result->response)){
                    if(count($result->response->Shows) > 0){
                        return $result->response->Shows;
                    }
                } else{
                    return 0;
                }
        }else{
            return 0;
        }
    }
    
    function get_episodeDetail($episodeId){
        if($episodeId != "")
        {
                $ch = curl_init();
                $url = "http://api.viacom.com/v12/episodes/".$episodeId."?apiKey=vT4Aq18ANEmQFPZI4jxFpJFypuGrwmVK";
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result= curl_exec ($ch);
                $result = json_decode($result);
                //echo "<pre>";
                //print_r($result);
                curl_close ($ch);
                if(isset($result->response)){
                    if(count($result->response->Episodes) > 0){
                        return $result->response->Episodes;
                    }
                } else{
                    return 0;
                }
        }else{
            return 0;
        }
    }
 }
 ?>