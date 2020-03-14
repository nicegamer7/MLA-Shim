<?php
/**
 * Plugin Name:       MLA Shim
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       An intermediate plugin for MLA.
 * Version:           1.0.0
 * Author:            Kermina Awad
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 */

function mla_shim_function($atts) {
  $a = shortcode_atts(array(
    'shortcode' => '',
    'parameters' => '',
    'values' => '',
    'content' => '',
    'delimiter' => '|',
    'columns' => 0
  ), $atts);

  if (!empty($a['shortcode']) && !empty($a['parameters']) && !empty($a['values'])) {
    if ($a['columns'] < 0) $a['columns'] = 0;
    $parameters = explode(',', $a['parameters']);
    $values = explode(',', $a['values']);
    $html = '<div class="shim-column">';

    foreach ($values as $i => $val) {
      if ($a['columns'] != 0 && $i != 0 && $i % $a['columns'] == 0) $html .= '</div><div class="shim-column">';
      $val = explode($a['delimiter'], $val);
      $short = "[{$a['shortcode']}";
      if (!empty($a['content'])) $content = array_pop($val);

      foreach ($val as $j => $p) {
        $short .= " {$parameters[$j]}={$p}";
      }

      $short .= ']';
      if (!empty($content)) $short .= "{$content}[/{$a['shortcode']}]";
      $html .= do_shortcode($short);
    }

    $html .= '</div>';
    return $html;
  }
}

add_shortcode('mla_shim', 'mla_shim_function');
