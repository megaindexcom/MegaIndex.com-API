<?php
class MegaIndex{
    private $key = null;
    private $url = 'http://api.megaindex.com/';
    function __construct($key = null) {
        $this->key = $key;
    }
    
    function get($controller = 'user/units', $param = array(), $post = array()){
        $param['key'] = $this->key;
        $content = $this->get_proxy($this->url.$controller.'?'.http_build_query($param), $post);      
        
        $return = json_decode($content, 1);
        if (!is_array($return)) {
            throw new Exception('Произошел сбой');
        }              
        return $return;
    }
    
    
    function get_proxy($string, $post = array()){
        $curler = curl_init();

        curl_setopt($curler, CURLOPT_URL, $string);
        curl_setopt($curler, CURLOPT_RETURNTRANSFER, 1);  
        curl_setopt($curler, CURLOPT_CONNECTTIMEOUT, 20); 
        curl_setopt($curler, CURLOPT_TIMEOUT, 20);  	    


        curl_setopt($curler, CURLOPT_FOLLOWLOCATION, 1);  
        curl_setopt($curler, CURLOPT_SSL_VERIFYPEER, FALSE);
        if(!empty($post)){
            curl_setopt($curler, CURLOPT_POST, 1);
            curl_setopt($curler, CURLOPT_POSTFIELDS, http_build_query($post));        
        }

        $content = curl_exec($curler);
        $code=curl_getinfo($curler,CURLINFO_HTTP_CODE);

        curl_close($curler);
        
        if (!$content) {
            throw new Exception('URL не доступен');
        }            
        return $content;
    }    
}