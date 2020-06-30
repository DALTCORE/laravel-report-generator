<?php

namespace SamuelTerra22\ReportGenerator\ReportMedia;

use SamuelTerra22\ReportGenerator\ReportGenerator;
use App\Support\ERP\PDFView;

class PdfReport extends ReportGenerator
{
    public function make()
    {
        $headers = $this->headers;
        $query = $this->query;
        $columns = $this->columns;
        $limit = $this->limit;
        $groupByArr = $this->groupByArr;
        $orientation = $this->orientation;
        $editColumns = $this->editColumns;
        $showTotalColumns = $this->showTotalColumns;
        $styles = $this->styles;
        $showHeader = $this->showHeader;
        $showMeta = $this->showMeta;
        $showNumColumn = $this->showNumColumn;
        $applyFlush = $this->applyFlush;

        if ($this->withoutManipulation) {
            $pdf = new PDFView('laravel-report-generator::without-manipulation-pdf-template', compact('headers', 'columns', 'showTotalColumns', 'query', 'limit', 'groupByArr', 'orientation',
                'showHeader', 'showMeta', 'applyFlush', 'showNumColumn'));
        } else {
            $pdf = new PDFView('laravel-report-generator::general-pdf-template', compact('headers', 'columns', 'editColumns', 'showTotalColumns', 'styles', 'query', 'limit',
                'groupByArr', 'orientation', 'showHeader', 'showMeta', 'applyFlush', 'showNumColumn'));
        }

        return $pdf;
    }

    public function getString()
    {
        return $this->make()->getString();
    }
}
