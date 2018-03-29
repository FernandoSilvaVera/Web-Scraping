<?PHP

class AnimeYT{

	/**
	* Get the code of the page and remove the special characters
	*
	* @param string $anime
	* @return last chapter of the anime
	*/

	public function chapter($anime)
	{
		foreach(file("http://www.animeyt.tv/".$anime) as $line)
			$codeHTML .= htmlspecialchars($line);

		$codeUtil = explode ("http://www.animeyt.tv/ver/".$anime."-", $codeHTML)[1];
		return explode ("-", $codeUtil)[0];
	}

}

?>

