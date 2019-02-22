<?php
	function site ($item) {
		if ($item == "url") {
			echo SITE_URL;
		}
	}

	function getSite ($item) {
		if ($item == "url") {
			return SITE_URL;
		}
	}
?>