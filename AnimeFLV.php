<?PHP

namespace Trackime\Utils;

class AnimeFLV{

	/**
	* Get the url of the videos
	*
	* @param string $anime
	* @param int $chapter
	* @return url video
	*/

	public static function rapiVideo($anime, $chapter)
	{	
		$uri = "https://animeflv.net/ver/48459/$anime-$chapter";

		$codeHTML = null;
		foreach(file($uri) as $line)
			$codeHTML .= htmlspecialchars($line);
	
		$arrayUtil = explode ("https://www.rapidvideo.com/e/", $codeHTML);

		return isset($arrayUtil[1]) ? explode ('&', $arrayUtil[1])[0] : "fail";

	}
}

/* Example */
$video = AnimeFLV::rapiVideo("no-game-no-life", "12");
echo "<a href='https://www.rapidvideo.com/e/$video&q=720p'>Go Video</a>"

?>
