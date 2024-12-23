<?php
    class Info extends Controller {

        public function about() {
            
            $this->view('info/about');
        }

        public function deliveryAndPayment() {
            
            $this->view('info/deliveryAndPayment');
        }
    }