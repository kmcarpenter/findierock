<?php
	class FindieRock_View_Helper_Rating extends Zend_View_Helper_Partial {
		
		public function rating($rating, $name, $readonly = true, $strings = array(), $id = "rating", $max = 5) {
			$out = "<div id=\"$id\">";
			$readonly = ($readonly ? "disabled=\"disabled\"" : "");
			for ($i = 0; $i < $max; $i++ ) {
				$val = $i+1;
				$checked = ($rating == $val ? "checked=\"checked\"" : "");
				$title = isset($strings[$i]) ? $strings[$i] : "";
				$out .= "<input name=\"$name\" type=\"radio\" title=\"$title\" value=\"$val\" $readonly $checked />";
			}
			$out .= "</div>";
			return $out;
		}
	}
?>