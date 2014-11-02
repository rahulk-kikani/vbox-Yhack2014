<?php
    if(isset($page))
    {
            $this->load->view('pages/'.$page);
    }
    else
    {
        echo "Error : 404 Page Not Found.";
    }
?>