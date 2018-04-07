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

	public static function information($id)
	{	
		$uri = "https://myanimelist.net/anime/$id";

		$codeHTML = null;
		foreach(file($uri) as $line)
			$codeHTML .= htmlspecialchars($line);
		
		$arrayUtil = explode ('Episodes:', $codeHTML);
		$information = explode ('&lt;/span&gt;', explode ('Broadcast', $arrayUtil[1])[0]);

		return [
			"chapter"	=> explode ('&', $information[1])[0],
			"episodes" 	=> explode ('&', $information[2])[0],
		    "aired"		=> explode ('&', $information[3])[0],
		    "premiered" => explode ('&', explode ('&gt;', $information[4])[1])[0]
		];

	}
}

/* Example */

$bokuNoHero = AnimeFLV::information('33486');

echo $bokuNoHero['chapter']		. "<br>";
echo $bokuNoHero['episodes']	. "<br>";
echo $bokuNoHero['aired']		. "<br>";
echo $bokuNoHero['premiered']	. "<br>";


?>
