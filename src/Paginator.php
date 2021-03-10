<?php

namespace jhasselbring;

class Paginator
{
    public $paginationWrapperStart = '<div class="pg">';
    public $paginationWrapperEnd = '</div>';
    public $pageWrapperStart = '<span>';
    public $pageWrapperEnd = '</span>';
    public $activePageWrapperStart = '<span class="active">';
    public $activePageWrapperEnd = '</span>';
    public $max = 10;
    public $active = 1;
    public $base = "/";

    function __construct($max = 10)
    {
        $this->max = $max;
    }
    public function set_pagination_wrapper($start, $end)
    {
        $this->paginationWrapperStart = $start;
        $this->paginationWrapperEnd = $end;
    }
    public function set_active($active){
        $this->active = $active;
    }
    public function set_page_wrapper($start, $end)
    {
        $this->pageWrapperStart = $start;
        $this->pageWrapperEnd = $end;
    }
    public function set_active_page_wrapper($start, $end)
    {
        $this->activePageWrapperStart = $start;
        $this->activePageWrapperEnd = $end;
    }
    public function set_base_url($base)
    {
        $this->base = $base;
    }
    public function get_the_pagination()
    {
        $payload = "";
        $i = 1;
        $payload = $payload . $this->paginationWrapperStart;
        while ($i <= $this->max) {
            if ($i == $this->active) {
                $payload = $payload . $this->activePageWrapperStart . '<a href="' . $this->base . $i . '">' . $i . "</a>" . $this->activePageWrapperEnd;
            } else {
                $payload = $payload . $this->pageWrapperStart . '<a href="' . $this->base . $i . '">' . $i . "</a>" . $this->pageWrapperEnd;
            }
            $i++;
        }

        $payload = $payload . $this->paginationWrapperEnd;
        return $payload;
    }
}
