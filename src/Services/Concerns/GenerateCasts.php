<?php

namespace TomatoPHP\TomatoPlugins\Services\Concerns;

trait GenerateCasts
{
    private function getCasts()
    {
        $casts = [];
        foreach ($this->cols as $key=>$column) {
            if ($column['type'] == 'boolean') {
                $casts[] = ($key!==0?'        ':"") .'\''.$column['name'].'\' => \'boolean\'';
            }
            elseif ($column['type'] == 'json') {
                $casts[] = ($key!==0?'        ':"") .'\''.$column['name'].'\' => \'json\'';
            }
        }
        return implode(",\n", $casts);
    }
}
