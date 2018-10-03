<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    require_once APPPATH.'libraries/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    class Pdf {

        var $html;
        var $path;
        var $filename;
        var $paper_size;
        var $orientation;

        /**
         * Constructor
         *
         * @access	public
         * @param	array	initialization parameters
         */
        function __construct($params = array()) {
            $this->CI =& get_instance();
            if (count($params) > 0) {
                $this->initialize($params);
            }
            log_message('debug', 'PDF Class Initialized');
        }

        // --------------------------------------------------------------------

        /**
         * Initialize Preferences
         *
         * @access	public
         * @param	array	initialization parameters
         * @return	void
         */
        function initialize($params)
        {
            $this->clear();
            if (count($params) > 0)
            {
                foreach ($params as $key => $value)
                {
                    if (isset($this->$key))
                    {
                        $this->$key = $value;
                    }
                }
            }
        }

        // --------------------------------------------------------------------

        /**
         * Set html
         *
         * @access	public
         * @return	void
         */
        function html($html = NULL)
        {
            $this->html = $html;
        }

        // --------------------------------------------------------------------

        /**
         * Set path
         *
         * @access	public
         * @return	void
         */
        function folder($path)
        {
            $this->path = $path;
        }

        // --------------------------------------------------------------------

        /**
         * Set path
         *
         * @access	public
         * @return	void
         */
        function filename($filename)
        {
            $this->filename = $filename;
        }

        // --------------------------------------------------------------------


        /**
         * Set paper
         *
         * @access	public
         * @return	void
         */
        function paper($paper_size = NULL, $orientation = NULL)
        {
            $this->paper_size = $paper_size;
            $this->orientation = $orientation;
        }

        // --------------------------------------------------------------------


        /**
         * Create PDF
         *
         * @access	public
         * @return	void
         */
        function create($mode = 'download')
        {

            if (is_null($this->html)) {
                show_error("HTML is not set");
            }

            if (is_null($this->path)) {
                show_error("Path is not set");
            }

            if (is_null($this->paper_size)) {
                show_error("Paper size not set");
            }

            if (is_null($this->orientation)) {
                show_error("Orientation not set");
            }

            $dompdf = new Dompdf();
            $dompdf->loadHtml($this->html);
            $dompdf->setPaper($this->paper_size, $this->orientation);
            $dompdf->render();

            if($mode == 'save') {
                $this->CI->load->helper('file');
                if(write_file($this->path.$this->filename, $dompdf->output())) {
                    return $this->path.$this->filename;
                } else {
                    show_error("PDF could not be written to the path");
                }
            }else{
                $dompdf->stream($this->filename);
            }
        }

    }