<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Card extends Model
{
    public function get_svg_for_name($name)
    {
        return <<<SVG
<?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg
    width="850"
    height="550"
    style="background-color: #{$this->bg_color};"
    xmlns="http://www.w3.org/2000/svg">

    <text x="20" y="300" font-size="80px">{$name}</text>
</svg>
SVG;
    }
}
