json:
	php -r 'echo json_encode(require "data/iso3166.php", JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);' > "data/iso3166.json"
