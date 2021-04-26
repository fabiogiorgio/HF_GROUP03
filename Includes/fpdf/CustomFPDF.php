<?php
    require_once 'fpdf/fpdf.php';


    class CustomFPDF extends FPDF
    {
        function __construct($orientation='P', $unit='mm', $size='A4')
        {


            // Initialization of properties
            $this->state = 0;
            $this->page = 0;
            $this->n = 2;

            $this->underline = false;
            $this->DrawColor = '1 G';
            $this->FillColor = '1 g';
            $this->TextColor = '1 g';

            $this->ws = 0;
            // Font path
            if(defined('FPDF_FONTPATH'))
            {
                $this->fontpath = FPDF_FONTPATH;
                if(substr($this->fontpath,-1)!='/' && substr($this->fontpath,-1)!='\\')
                    $this->fontpath .= '/';
            }
            elseif(is_dir(dirname(__FILE__).'/font'))
                $this->fontpath = dirname(__FILE__).'/font/';
            else
                $this->fontpath = '';
            // Core fonts
            $this->CoreFonts = array('courier', 'helvetica', 'times', 'symbol', 'zapfdingbats');
            // Scale factor
            if($unit=='pt')
                $this->k = 1;
            elseif($unit=='mm')
                $this->k = 72/25.4;
            elseif($unit=='cm')
                $this->k = 72/2.54;
            elseif($unit=='in')
                $this->k = 72;
            else
                $this->Error('Incorrect unit: '.$unit);
            // Page sizes
            $this->StdPageSizes = array('a3'=>array(841.89,1190.55), 'a4'=>array(595.28,841.89), 'a5'=>array(420.94,595.28),
                'letter'=>array(612,792), 'legal'=>array(612,1008));
            $size = $this->_getpagesize($size);
            $this->DefPageSize = $size;
            $this->CurPageSize = $size;
            // Page orientation
            $orientation = strtolower($orientation);
            if($orientation=='p' || $orientation=='portrait')
            {
                $this->DefOrientation = 'P';
                $this->w = $size[0];
                $this->h = $size[1];
            }
            elseif($orientation=='l' || $orientation=='landscape')
            {
                $this->DefOrientation = 'L';
                $this->w = $size[1];
                $this->h = $size[0];
            }
            else
                $this->Error('Incorrect orientation: '.$orientation);
            $this->CurOrientation = $this->DefOrientation;
            $this->wPt = $this->w*$this->k;
            $this->hPt = $this->h*$this->k;
            // Page rotation
            $this->CurRotation = 0;
            // Page margins (1 cm)
            $margin = 28.35/$this->k;
            $this->SetMargins($margin,$margin);
            // Interior cell margin (1 mm)
            $this->cMargin = $margin/10;
            // Line width (0.2 mm)
            $this->LineWidth = .567/$this->k;
            // Automatic page break
            $this->SetAutoPageBreak(true,2*$margin);
            // Default display mode
            $this->SetDisplayMode('default');
            // Enable compression
            $this->SetCompression(true);
            // Set default PDF version number
            $this->PDFVersion = '1.3';
        }

        function SetMargins($left, $top, $right=null)
        {
            // Set left, top and right margins
            $this->lMargin = $left;
            $this->tMargin = $top;
            if($right===null)
                $right = $left;
            $this->rMargin = $right;
        }

        function SetLeftMargin($margin)
        {
            // Set left margin
            $this->lMargin = $margin;
            if($this->page>0 && $this->x<$margin)
                $this->x = $margin;
        }
        function Footer()
        {
            require_once '../footer.php';
            echo '../footer.php';
        }
    }