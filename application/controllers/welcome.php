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
		$this->load->view('template',$data);
	}
    
    public function brandINFO($brand=null){
        $data['page'] = "brand";
        $temp = $this->vbox_api->get_brand_info($brand);
        $tempx = $this->vbox_api->get_show_info_byBrand($brand);
        if($temp != 0){
            $data['brand_info'] = $temp[0];
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
        $this->load->view('template',$data);
    }
    
    public function showINFO($showId=null){
        $data['page'] = "show";
        $temp = $this->vbox_api->get_showDetail($showId);
        if($temp != 0){
            $data['show_info'] = $temp[0];
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
        }
        $this->load->view('template',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */