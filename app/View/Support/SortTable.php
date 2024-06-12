<?php

namespace App\View\Support;

trait SortTable
{
  public $sortBy;
  public $sortType;

  public function mount(): void {
    $this->sortBy = '0';
    $this->sortType = 'desc';
  }
  
  abstract public function sortBy(): string;
}
