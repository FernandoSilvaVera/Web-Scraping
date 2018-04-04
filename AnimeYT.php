<?PHP

class AnimeYT{

	/**
	* Get the code of the page and remove the special characters
	*
	* @param string $anime
	* @return last chapter of the anime
	*/

	public static function lastChapter($anime)
	{
		foreach(file("http://www.animeyt.tv/".$anime) as $line){
			$codeHTML .= htmlspecialchars($line);

		}

		$codeUtil = explode ("https://www.animeyt.tv/ver/".$anime."-", $codeHTML)[1];
		return explode ("-", $codeUtil)[0];
	}

}

/*EXAMPLE*/

echo "18if last chapter => " . AnimeYT::lastChapter('18if');

?>

