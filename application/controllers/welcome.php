<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
       {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('vbox_api');
       }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	   $data['page'] = "home";
       $data['title'] = "Viacom Box";
       $data['desc'] = "Viacom Box";
       $data['img'] = base_url()."theme/img/vbox_logo.png";
		$this->load->view('template',$data);
	}
    
    public function brandINFO($brand=null){
        $data['page'] = "brand";
        $temp = $this->vbox_api->get_brand_info($brand);
        $tempx = $this->vbox_api->get_show_info_byBrand($brand);
        if($temp != 0){
            $data['brand_info'] = $temp[0];
            $data['title'] =  $temp[0]->Title." | Brand - Viacom Box";
            $data['desc'] = "No Description | Brand - Viacom Box";
            $data['img'] = base_url()."theme/img/vbox_logo.png";
        }else{
            $data['title'] =  "Brand - Viacom Box";
            $data['desc'] = "No Description | Brand - Viacom Box";
            $data['img'] = base_url()."theme/img/vbox_logo.png";
        }
        
        if($tempx != 0){
            $data['brand_show_list'] = $tempx;
        }
        $this->load->view('template',$data);
    }
    
    public function allshow(){
        $data['page'] = "brand";
        $tempx = $this->vbox_api->get_allshow_info();
        if($tempx != 0){
            $data['brand_show_list'] = $tempx;
        }
            $data['title'] = "All Shows - Viacom Box";
            $data['desc'] = "All Shows - Viacom Box";
            $data['img'] = base_url()."theme/img/vbox_logo.png";
 
        $this->load->view('template',$data);
    }
    
    public function allepisode(){
        $data['page'] = "show";
        $tempx = $this->vbox_api->get_allepisode_info();
        //print_r($tempx);
        if($tempx != 0){
            $data['episode_list'] = $tempx;
        }
            $data['title'] = "All Episodes - Viacom Box";
            $data['desc'] = "All Episodes - Viacom Box";
            $data['img'] = base_url()."theme/img/vbox_logo.png";
        $this->load->view('template',$data);
    }
    
    public function showINFO($showId=null){
        $data['page'] = "show";
        $temp = $this->vbox_api->get_showDetail($showId);
        if($temp != 0){
            $data['show_info'] = $temp[0];
            
            $data['title'] = $temp[0]->Title." | Show - Viacom Box";
            if(isset($temp[0]->Description))
                $data['desc'] = trim($temp[0]->Description)." | Show - Viacom Box";
            else
                $data['desc'] = "No Description | Show - Viacom Box";
            
            if(isset($temp[0]->Images)){
                foreach($temp[0]->Images as $img){
                    $thumb = $img->ImageAssetRefs[0]->URI;
                    $thumb = str_replace('http://mtv.mtvnimages.com/uri',"",$thumb);
                    $data['img'] = base_url().'timthumb.php?src=http://mtv.mtvnimages.com/uri/'.$thumb.'&w=200&h=200';
                    break;
                }
            } else{
                $data['img'] = base_url()."theme/img/vbox_logo.png";
            }
            
        } else{
             $data['title'] = "Show - Viacom Box";
            $data['desc'] = "No Desctiption | Show - Viacom Box";
            $data['img'] = base_url()."theme/img/vbox_logo.png";
        }
        $tempx = $this->vbox_api->get_episodes_by_show($showId);
        if($temp != 0){
            $data['episode_list'] = $tempx;
        }
        $this->load->view('template',$data);
    }
    
    public function episodeINFO($episodeId=null){
        $data['page'] = "episode";
        $temp = $this->vbox_api->get_episodeDetail($episodeId);
        if($temp != 0){
            $data['show_info'] = $temp[0];
            $data['title'] = $temp[0]->Title." | Episode - Viacom Box";
            if(isset($temp[0]->Description))
                $data['desc'] = trim($temp[0]->Description)." | Episode - Viacom Box";
            else
                $data['desc'] = "No Description | Episode - Viacom Box";
            
            if(isset($temp[0]->Images)){
                foreach($temp[0]->Images as $img){
                    $thumb = $img->URL;
                    $thumb = str_replace('http://mtv.mtvnimages.com/uri',"",$thumb);
                    $data['img'] = base_url().'timthumb.php?src=http://mtv.mtvnimages.com/uri/'.$thumb.'&w=200&h=200';
                    break;
                }
            } else{
                $data['img'] = base_url()."theme/img/vbox_logo.png";
            }
            
        } else{
            $data['title'] = "Episode - Viacom Box";
            $data['desc'] = "Episode - Viacom Box";
            $data['img'] = base_url()."theme/img/vbox_logo.png";
        }
        $this->load->view('template',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */