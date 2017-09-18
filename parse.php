<?php

require_once(dirname(__FILE__) . '/lib.php');

//--------------------------------------------------------------------------------------------------
// From http://snipplr.com/view/6314/roman-numerals/
// Expand subtractive notation in Roman numerals.
function roman_expand($roman)
{
	$roman = str_replace("CM", "DCCCC", $roman);
	$roman = str_replace("CD", "CCCC", $roman);
	$roman = str_replace("XC", "LXXXX", $roman);
	$roman = str_replace("XL", "XXXX", $roman);
	$roman = str_replace("IX", "VIIII", $roman);
	$roman = str_replace("IV", "IIII", $roman);
	return $roman;
}
    
//--------------------------------------------------------------------------------------------------
// From http://snipplr.com/view/6314/roman-numerals/
// Convert Roman number into Arabic
function arabic($roman)
{
	$result = 0;
	
	$roman = strtoupper($roman);

	// Remove subtractive notation.
	$roman = roman_expand($roman);

	// Calculate for each numeral.
	$result += substr_count($roman, 'M') * 1000;
	$result += substr_count($roman, 'D') * 500;
	$result += substr_count($roman, 'C') * 100;
	$result += substr_count($roman, 'L') * 50;
	$result += substr_count($roman, 'X') * 10;
	$result += substr_count($roman, 'V') * 5;
	$result += substr_count($roman, 'I');
	return $result;
} 


$issn = '0035-9211';
$volume = '';


$ids = array(2444921, 2445266);

$ids = array(2318432); // vol 46, 1933

$ids=array(2535783); // vol 115, 2003

$ids=array(
2489865,
2489292,
2489292,
2490549,
2533875,
2534439,
2535132,
2535450,
2535783,
2536066,
2536654,
2537035,
2537551,
2538355,
2538886
);

//$ids=array(2538886);

$ids=array(
2454412,
2454580,
2454898,
2455162,
2485239,
2485737,
2486037,
2486334,
2486556,
2486895,
2487336,
2540340,
2540571,
2540898,
2541105,
2541384
);

$ids=array(2485239);  // vol 106

$ids=array(
2428033,
2429059,
2429794,
2440857,
2441355,
2441688,
2442141,
2444369,
2444921,
2445266,
2445677,
2446028,
2453296,
2453566,
2453893,
2454202
);

$ids=array(
2416690,
2416690,
2417194,
2417194,
2417884,
2417884,
2418112,
2418112,
2418418,
2418418,
2418865,
2418865,
2419483,
2419483,
2419873,
2419873,
2420512,
2420512,
2421082,
2421082,
2421481,
2421481,
2421733,
2421733,
2422525,
2422525,
2422969,
2422969,
2423302,
2423302,
2424196,
2424196,
2427363,
2427363,
2427840,
2427840
);

$ids=array(
2330699,
2330699,
2331023,
2331023,
2331458,
2331458,
2331797,
2331797,
2331977,
2331977,
2332163,
2332163,
2402392,
2402392,
2402605,
2402605,
2402899,
2402899,
2403130,
2403130,
2404234,
2404234,
2410633,
2410633,
2411461,
2411461,
2412322,
2412322,
2413612,
2413612,
2414098,
2414098,
2414509,
2414509,
2415358,
2415358
);

$ids=array(
2325965,
2325965,
2326649,
2326649,
2327135,
2327135,
2327537,
2327537,
2327810,
2327810,
2328086,
2328086,
2328317,
2328317,
2328506,
2328506,
2328692,
2328692,
2329001,
2329001,
2329460,
2329460,
2330015,
2330015,
2330429,
2330429,
2333308,
2333308
);

$ids=array(
2277256,
2277256,
2277256,
2277256,
2277856,
2277856,
2277856,
2277856,
2281003,
2281003,
2281003,
2281003,
2281522,
2281522,
2281522,
2281522,
2282530,
2282530,
2282530,
2282530,
2283391,
2283391,
2283391,
2283391,
2284483,
2284483,
2284483,
2284483,
2285128,
2285128,
2285128,
2285128,
2286196,
2286196,
2286457,
2286457,
2286553,
2286553,
2286922,
2286922,
2287417,
2287417,
2287807,
2287807,
2288275,
2288275,
2288872,
2288872,
2289292,
2289292,
2289475,
2289475,
2295069,
2295069,
2295069,
2295069,
2295579,
2295579,
2295579,
2295579,
2296320,
2296320,
2296620,
2296620,
2297289,
2297289,
2297910,
2297910,
2298549,
2298549,
2299641,
2299641,
2299956,
2299956,
2300097,
2300097,
2300346,
2300346,
2300430,
2300430,
2300664,
2300664,
2300976,
2300976,
2302254,
2302254,
2303028,
2303028,
2303400,
2303400,
2305328,
2305328,
2305553,
2305553,
2306531,
2306531,
2307434,
2307434,
2307693,
2307693,
2308609,
2308609,
2308981,
2308981,
2309317,
2309317,
2309584,
2309584,
2310172,
2310172,
2310622,
2310622,
2311102,
2311102,
2311852,
2311852,
2312044,
2312044,
2313872,
2313872,
2314043,
2314043,
2314280,
2314280,
2314877,
2314877,
2315108,
2315108,
2315747,
2315747,
2316080,
2316080,
2316596,
2316596,
2316959,
2316959,
2317616,
2317616,
2317745,
2317745,
2318432,
2318432,
2318816,
2318816,
2319434,
2319434,
2320040,
2320040,
2320580,
2320580,
2320988,
2320988,
2322257,
2322257,
2322674,
2322674,
2323040,
2323040,
2323499,
2323499,
2323859,
2323859,
2324381,
2324381,
2324930,
2324930,
2325449,
2325449,
2325668,
2325668,
2336591,
2336591,
2337239,
2337239,
2337773,
2337773,
2338349,
2338349,
2338652,
2338652,
2339006,
2339006,
2339399,
2339399,
2392061,
2392061,
2396302,
2396302,
2397580,
2397580,
2398330,
2398330,
2399284,
2399284,
2399911,
2399911,
2400541,
2400541,
2401243,
2401243,
2401882,
2401882,
2405862,
2405862,
2406441,
2406441,
2409552,
2409552
);

// Redo volume 39 part 1
$ids=array(
2311852
);

foreach ($ids as $id)
{
	$pdf_filename = '';
	$xml_filename = 'xml/' . $id . '.xml';
	
	if (!file_exists($xml_filename))
	{
		$url = 'http://cedric.slv.vic.gov.au/webclient/DeliveryManager?application=Staff&user=GUEST&metadata_request=true&pid=' . $id . '&GET_XML=1';
		$xml = get($url);
		
		if ($xml != '')
		{
			file_put_contents($xml_filename, $xml);
		}
	}
	else
	{
		$xml = file_get_contents($xml_filename);
	}

	if ($xml != '')
	{
	
		$process_id = 0;
		$sql = '';

		$xml = str_replace('undefined', '', $xml);

		$dom = new DOMDocument;
		$dom->loadXML($xml);
		$xpath = new DOMXPath($dom);
		
		$nodeCollection = $xpath->query ('//relations/relation/usage_type[text()="ARCHIVE"]');
		foreach ($nodeCollection as $node)
		{	
			$pid = 0;
			//echo "-----------\n";
			
			$nc = $xpath->query ('../pid', $node);
			foreach ($nc as $n)
			{	
				//echo $n->firstChild->nodeValue . "\n";
				$pid = $n->firstChild->nodeValue;
				
				if ($n->firstChild->nodeValue == '2445403')
				{
					//exit();
				}
				
			}
			$nc = $xpath->query ('../mime_type', $node);
			foreach ($nc as $n)
			{	
				if ($n->firstChild->nodeValue == 'application/pdf')
				{
					$process_id = $pid;
				}
				
			}
		
				
			
		}
		echo "process_id=$process_id\n";
		
		if ($process_id == 0) break;
		
		// Get PDF

		$pdf_filename = dirname(__FILE__) . '/pdf/' . $id . '.pdf';

		// PDF
		if (!file_exists($pdf_filename))
		{
			$command = "curl -L 'http://cedric.slv.vic.gov.au/webclient/DeliveryManager?application=DIGITOOL-3&application=DIGITOOL-3&metsId=" . $id . "&pid=" . $process_id . "' > " . $pdf_filename;

			echo $command . "\n";

			system($command);
		}
		
		
		
		$nodeCollection = $xpath->query ('//md/value');
		foreach ($nodeCollection as $node)
		//if (0)
		{	
			echo "-----------\n";
			//echo $node->textContent;
	
			$xml2 = trim($node->textContent);
	
			$dom2 = new DOMDocument;
			$dom2->loadXML($xml2);
			$xpath2 = new DOMXPath($dom2);
	
			// metadata
			if (preg_match('/http:\/\/purl.org\/dc\/elements\/1.1\//', $xml2))
			{	
				$xpath->registerNamespace('dc', 'http://purl.org/dc/elements/1.1/');
	
				$nc = $xpath2->query ('//dc:title');
				foreach ($nc as $n)
				{	
					//echo $n->firstChild->nodeValue . "\n";
				}

				$nc = $xpath2->query ('//dc:identifier');
				foreach ($nc as $n)
				{	
					//echo $n->firstChild->nodeValue . "\n";
				}
			}	
	
			// articles and PDF pages
	
			$x = simplexml_load_string($xml2, 'SimpleXMLElement');
			$xmlJson = json_encode($x);
			$xmlArr = json_decode($xmlJson, 1); 	
			//print_r($xmlArr);
			
			//exit();
			
			$year = '';
			$issue = '';	
			
			if (isset($xmlArr['@attributes']))
			//if (0)
			{
				if ($xmlArr['@attributes']['TYPE'] == 'PHYSICAL')
				{
					foreach ($xmlArr['div']['div'] as $div)
					{
						//print_r($div);
												
						$title = '';
											
						
						// title
						if (isset($div['@attributes']))
						{				
							echo $div['@attributes']['LABEL'] . "\n";
							$title = $div['@attributes']['LABEL'];
					
							if (preg_match('/Volume (?<volume>\d+)/',  $div['@attributes']['LABEL'], $m))
							{
								$volume = $m['volume'];
							}
							if (preg_match('/Volume (?<volume>[VXIL]+)/',  $div['@attributes']['LABEL'], $m))
							{
								$volume = $m['volume'];
								$volume = arabic($volume);
							}
							
							// Numbers 1/2
							if (preg_match('/Number[s]? (?<issue>\d+(\/\d+)?)/',  $div['@attributes']['LABEL'], $m))
							{
								$issue = $m['issue'];
							}

							if (preg_match('/Part (?<issue>\d+(\/\d+)?)/',  $div['@attributes']['LABEL'], $m))
							{
								$issue = $m['issue'];
							}
							
							if (preg_match('/Part (?<issue>[I]+)/',  $div['@attributes']['LABEL'], $m))
							{
								$issue = $m['issue'];
								$issue = arabic($issue);
							}
							
							 							
							if (preg_match('/\[(?<year>[0-9]{4})\]/',  $div['@attributes']['LABEL'], $m))
							{
								$year = $m['year'];
							}
							
						}
						if (isset($div['div']))
						{				
							//print_r($div['div']);
					
							$spage = 0;
							$epage = 0;
					
							$start_page = 0;
							$end_page = 0;
					
							foreach ($div['div'] as $d)
							{
								//echo "----\n";
								//echo $d['@attributes']['LABEL'] . "\n";
						
								$label = $d['@attributes']['LABEL'];
								if (preg_match('/Page (?<page>\d+)/', $label, $m))
								{
									if ($spage == 0)
									{
										$spage = $m['page'];
									}
									else
									{
										$epage = $m['page'];
									}
								}
						
								//echo $d['fptr'][0]['@attributes']['FILEID']  . "\n";
						
								$fileid = $d['fptr'][0]['@attributes']['FILEID'];
								if (preg_match('/PDF(?<page>\d+)/', $fileid, $m))
								{
									if ($start_page == 0)
									{
										$start_page = $m['page'];
									}
									else
									{
										$end_page = $m['page'];
									}
								}
						
						
							}
					
							/*
							echo "spage=$spage\n";
							echo "epage=$epage\n";
							echo "start_page=$start_page\n";
							echo "end_page=$end_page\n";
							*/
						
							if ($pdf_filename != '' && $spage != 0)
							{
								if ($volume != '')
								{
							
									$sql = 'UPDATE names SET pdf="http://bionames.org/archive/issn/' . $issn . '/' . $volume . '/' . $spage . '.pdf"'
									 . ' WHERE issn="' . $issn . '" AND volume=' . $volume . ' AND spage=' . $spage . ';' . "\n";
									 echo $sql;
									 
									file_put_contents(dirname(__FILE__) . '/pdf.sql', $sql, FILE_APPEND);
							
							
									$sql = 'REPLACE INTO publications(guid, pdf, journal, issn, title, volume, issue, spage, epage, year) VALUES ('
									. '"http://bionames.org/archive/issn/' . $issn . '/' . $volume . '/' . $spage . '.pdf",'
				                    . '"http://bionames.org/archive/issn/' . $issn . '/' . $volume . '/' . $spage . '.pdf",'
				                    . '"Proceedings of the Royal Society of Victoria","' . $issn . '",'
				                    . '"' . addcslashes($title, '"') . '",' . $volume . ',"' . $issue . '",' . $spage . ',' . $epage . ',' . $year . ');' . "\n";
				                    echo $sql;
				                    
				                    file_put_contents(dirname(__FILE__) . '/metadata.sql', $sql, FILE_APPEND);
										
							
									$basedir = dirname(__FILE__) . '/' . $issn . '/' . $volume;

									// Folder for HTML
									if (!file_exists($basedir))
									{
										$oldumask = umask(0); 
										mkdir($basedir, 0777);
										umask($oldumask);
									}						
						
					
									$article_pdf_filename = $basedir . '/' . $spage . '.pdf';
								
									if (!file_exists($article_pdf_filename))
									{								
						
										$command = 'gs -sDEVICE=pdfwrite -dNOPAUSE -dBATCH -dSAFER '
											. ' -dFirstPage=' . $start_page . ' -dLastPage=' . ($start_page + $end_page - $start_page)
											. ' -sOutputFile=\'' . $article_pdf_filename . '\' \'' .  $pdf_filename . '\'';
				
										echo $command . "\n";
			
										system($command);
									}
								}
							}
					
						}
					}
				}
	
			}
		}
	
	}
}

?>