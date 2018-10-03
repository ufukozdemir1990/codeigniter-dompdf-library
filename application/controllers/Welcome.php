<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Welcome extends CI_Controller {

        public function __construct (){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('file');
            $this->load->helper('download');
            $this->load->library('pdf');
        }

        public function index() {
            $this->load->view('welcome');
        }

        function create_download($paper = 'a4', $orientation = 'portrait') {
            //Set folder to save PDF to
            $this->pdf->folder('assets/pdf/');

            //Set the filename to save/download as
            $filename = $paper.'-'.$orientation.'.pdf';
            $this->pdf->filename($filename);

            //Set the paper defaults portrait/landscape
            $this->pdf->paper($paper, $orientation);

            //Load html view
            $data = array(
                'margin' => '40px',
                'title' => 'PDF Created '.ucfirst($paper).' '.ucfirst($orientation),
                'message' => 'Hello World!'
            );
            $this->pdf->html($this->load->view('exemple-pdf', $data, true));

            //PDF was successfully download and view
            if($this->pdf->create('download')) {
                redirect();
            }
        }

        function create_view($paper = 'a4', $orientation = 'portrait') {
            //Set folder to save PDF to
            $this->pdf->folder('assets/pdf/');

            //Set the filename to save/download as
            $filename = $paper.'-'.$orientation.'.pdf';
            $this->pdf->filename($filename);

            //Set the paper defaults portrait/landscape
            $this->pdf->paper($paper, $orientation);

            //Load html view
            $data = array(
                'margin' => '40px',
                'title' => 'PDF Created '.ucfirst($paper).' '.ucfirst($orientation),
                'message' => 'Hello World!'
            );
            $this->pdf->html($this->load->view('exemple-pdf', $data, true));

            //PDF was successfully saved and view
            if($this->pdf->create('save')) {
                $this->output->set_content_type('application/pdf')->set_output(file_get_contents('assets/pdf/'.$filename));
            }
        }
    }