<?php
    
    class Marvel{

        private $cUrl;
        private $cInit;
        private $result;

        private $timeStamp;
        private $publicKey;
        private $privateKey;
        public $hash;


        public function conectaApi(){

            $this->timeStamp =  (time()/1000);
            $this->publicKey = "5db702a0eaf230cab4c321b65c5005f6";
            $this->privateKey = "40af644b0b6d47d46508ef89c7c86db6f22bba97";
            $this->hash = md5($this->timeStamp.$this->privateKey.$this->publicKey);

            $this->cUrl = 'http://gateway.marvel.com/v1/public/characters?ts='.$this->timeStamp.'&apikey='.$this->publicKey.'&hash='.$this->hash.'';
            
            $this->cInit = curl_init($this->cUrl);
            curl_setopt($this->cInit, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->cInit, CURLOPT_SSL_VERIFYPEER, false);
        }



        public function getData(){

            $this->result = json_decode(curl_exec($this->cInit));

            return $this->result;
        }


    }



?>