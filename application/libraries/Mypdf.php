<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Mypdf
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($view, $data = array(), $filename = 'Laporan-Data-Agen', $paper = 'F4', $orientation = 'potrait')
    {

        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->load_html($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
    }

    public function generateDist($view, $data = array(), $filename = 'Laporan-Data-Distributor', $paper = 'F4', $orientation = 'potrait')
    {

        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->load_html($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
    }

    public function generatesubDist($view, $data = array(), $filename = 'Laporan-Data-Sub-Distributor', $paper = 'F4', $orientation = 'potrait')
    {

        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->load_html($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
    }
    public function generateSupplier($view, $data = array(), $filename = 'Laporan-Data-Supplier', $paper = 'F4', $orientation = 'potrait')
    {

        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->load_html($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
    }
}
