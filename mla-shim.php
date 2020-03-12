<?php
/**
 * Plugin Name: MLA Shim
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

		foreach($values as $i => $value) {
			if ($a['columns'] != 0 && $i != 0 && $i % $a['columns'] == 0) $html .= '</div><div class="shim-column">';
			$val = explode($a['delimiter'], $value);
			$html .= "[{$a['shortcode']}";
			if (!empty($a['content'])) $content = array_pop($val);

			foreach($val as $j => $par) {
				$html .= " {$parameters[$j]}={$par}";
			}

			$html .= ']';
			if (!empty($content)) $html .= "{$content}[/{$a['shortcode']}]";
		}

		$html .= '</div>';
		return $html;
	}
}

add_shortcode('mla_shim', 'mla_shim_function');
