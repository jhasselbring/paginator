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
    public $reach = 2;
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
    public function set_reach($reach){
        $this->reach = $reach;
    }
    public function get_the_pagination()
    {
        $reachedArray = [1, $this->max];
        $reachCounter = 0;
        while($reachCounter <= $this->reach){

            array_push($reachedArray, $this->active - $reachCounter);
            array_push($reachedArray, $this->active + $reachCounter);
            $reachCounter++;
        }
        $payload = "";
        $i = 1;
        $payload = $payload . $this->paginationWrapperStart;
        while ($i <= $this->max) {
            if ($i == $this->active) {
                $payload = $payload . $this->activePageWrapperStart . '<a href="' . $this->base . $i . '">' . $i . "</a>" . $this->activePageWrapperEnd;
            } else {
                $dom = (in_array($i, $reachedArray)) ? $this->pageWrapperStart . '<a href="' . $this->base . $i . '">' . $i . "</a>" . $this->pageWrapperEnd : '.';
                $payload = $payload . $dom;
            }
            $i++;
        }

        $payload = $payload . $this->paginationWrapperEnd;
        return $payload;
    }
}
