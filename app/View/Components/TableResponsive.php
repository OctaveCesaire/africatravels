<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableResponsive extends Component
{
    public $fields; // Modifier ici
            // <x-table-responsive :fields="$fields" :type="$type" :data="$data" />
    public $type;
    public $res;

    public function __construct($fields,$type, $res) // Changer $field en $fields
    {
        $this->fields = $fields; // Assurez-vous que vous assignez correctement $fields
        $this->type = $type;
        $this->res = $res;
    }

    public function render(): View|Closure|string
    {
        return view('components.table-responsive');
    }
}
