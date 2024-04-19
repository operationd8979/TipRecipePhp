<?php
class CachingService{
    
    public static $instance = null;
    private $commonPath = './cache/';
    // private $legitKeys = ['ratingMT'];
    private $cacheLifetime = 3600;

    private function __construct(){
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new CachingService();
        }
        return self::$instance;
    }

    public function checkExistedCache($hotKey){
        $path = $this->commonPath.$hotKey;
        if (file_exists($path) && (time() - filemtime($path)) < $this->cacheLifetime) {
            $data = include $path;
            return $data;
        } else {
            return null;
        }
    }

    public function addCache($hotKey, $data){
        $path = $this->commonPath.$hotKey;
        if (file_exists($path) && (time() - filemtime($path)) < $this->cacheLifetime) {
            return false;
        }
        else{
            file_put_contents($path, '<?php return ' . var_export($data, true) . ';');
            return true;
        }
    }



}


?>