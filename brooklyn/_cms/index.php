<?php
  /**
   * brooklyn cms
   * version: 0.1
   * http://brooklyncms.com/
   * created by David Nemes - @nmsdvid
  */
    class Cms
    {

        public $contentTxt = 'content.txt';
        public $contentSettings = 'settings.txt';
        public $contentPath = '../_content/';

        public static function getContent($arr, $type ='content'){
            $file = 'brooklyn/_content/content.txt';
            $handle = fopen($file, 'r');
            $data = fread($handle,filesize($file));
            $json = json_decode($data);
            foreach($json as $jsonData){
                if($jsonData->content->id == $arr){
                    echo $jsonData->content->meta->$type;
                }
            }
        }

        public static function getSiteMeta($arr){
            $file = 'brooklyn/_content/settings.txt';
            $handle = fopen($file, 'r');
            $data = fread($handle,filesize($file));
            $json = json_decode($data);
            foreach($json as $jsonData){
                echo $jsonData->settings->$arr;
            }
        }

        public function addData($array){
            $file = $this->contentPath.$this->contentTxt;
            $handle=fopen($file,'w') or die ('Cannot open file:  '.$file);
            $data = json_encode($array);
            fwrite($handle,$data);
        }

        public function getCurrentData(){
            $file = $this->contentPath.$this->contentTxt;
            $handle = fopen($file, 'r');
            $data = fread($handle,filesize($file));
            $json = json_decode($data);
            return $json;
        }

        public function getSettingsData(){
            $file = $this->contentPath.$this->contentSettings;
            $handle = fopen($file, 'r');
            $data = fread($handle,filesize($file));
            $json = json_decode($data);
            return $json;
        }

        public function delete($id){
            $file = $this->contentPath.$this->contentTxt;
            $handle = fopen($file, 'r');
            $data = fread($handle,filesize($file));
            $json = json_decode($data);
            $loop = 0;
            foreach($json as $jsonData){
                if($jsonData->content->id == $id){
                    unset($json[0]);
                }
                $loop ++;
            }
            $handle=fopen($file,'w') or die ('Cannot open file:  '.$file);
            $data = json_encode($json);
            fwrite($handle,$data);
        }

        public function login($username, $password){
            $file = $this->contentPath.$this->contentSettings;
            $handle = fopen($file, 'r');
            $data = fread($handle,filesize($file));
            $json = json_decode($data);
            foreach($json as $jsonData){
                if($jsonData->settings->username == $username){
                    if($jsonData->settings->password == $password){
                        $this->createCookie();
                        echo 0; //login ok
                    }else {
                        echo 2; //password error
                    }
                }else {
                    echo 1; //username error
                }
            }
        }

        public function saveSettings($array){
            $file = $this->contentPath.$this->contentSettings;
            $handle=fopen($file,'w') or die ('Cannot open file:  '.$file);
            $data = json_encode($array);
            fwrite($handle,$data);
        }

        private function createCookie(){
            //first check if cookie are set
            $file = $this->contentPath.$this->contentSettings;
            $handle = fopen($file, 'r');
            $data = fread($handle,filesize($file));
            $json = json_decode($data);
            foreach($json as $jsonData){
                if($jsonData->settings->cookie_token == 1){
                    $cookieVal = rand(10,100);
                    setcookie("brooklyn",$cookieVal, time()+86400*10, '/');
                    $this->createSalt($data, $cookieVal);
                }else{
                    $file = $this->contentPath.$this->contentSettings;
                    $handle = fopen($file, 'r');
                    $data = fread($handle,filesize($file));
                    $json = json_decode($data);
                    foreach($json as $jsonDataSettings){
                        $cookieToken = $jsonDataSettings->settings->cookie_token;
                        setcookie("brooklyn",$cookieToken, time()+86400*10, '/');
                    }

                }
            }

        }

        private function createSalt($array, $cookieVal){
            $file = $this->contentPath.$this->contentSettings;
            $handle=fopen($file,'w') or die ('Cannot open file:  '.$file);
            $data = json_decode($array);
            foreach($data as $jsonData){
                $jsonData->settings->cookie_token = $cookieVal;
            }
            $data = json_encode($data);
            fwrite($handle,$data);
        }

        public static function pageProtect(){
            $file = '../_content/settings.txt';
            $handle = fopen($file, 'r');
            $data = fread($handle,filesize($file));
            $json = json_decode($data);
            foreach($json as $jsonData){
                $cookieToken = $jsonData->settings->cookie_token;
                if(isset($_COOKIE['brooklyn']) && $_COOKIE['brooklyn'] == $cookieToken){
                    $actual_link = "$_SERVER[REQUEST_URI]";
                    if($actual_link == "/login/"){
                    header("Location: /panel/");
                    }
                }else{
                    $actual_link = "$_SERVER[REQUEST_URI]";
                    if($actual_link !="/login/"){
                       header("Location: /login/");
                    }
                }
            }

        }

        public function validateId($suggestid){
            $file = $this->contentPath.$this->contentTxt;
            $handle = fopen($file, 'r');
            $data = fread($handle,filesize($file));
            $json = json_decode($data);
            foreach($json as $jsonData){
                if($jsonData->content->id == $suggestid){
                    echo 1; //id already used
                }else {
                    echo 3; //id is free
                }
            }
        }

    }

$cms = new Cms();


?>