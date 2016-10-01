<?php

require_once(dirname(__FILE__) . '/lib.php');

$issn = '0035-9211';
$volume = '';


$ids = array(2444921, 2445266);

foreach ($ids as $id)
{
	$pdf_filename = '';



	$url = 'http://cedric.slv.vic.gov.au/webclient/DeliveryManager?application=Staff&user=GUEST&metadata_request=true&pid=' . $id . '&GET_XML=1';
	$xml = get($url);
//	$xml = file_get_contents('xml/2445266.xml');

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
					echo $n->firstChild->nodeValue . "\n";
				}

				$nc = $xpath2->query ('//dc:identifier');
				foreach ($nc as $n)
				{	
					echo $n->firstChild->nodeValue . "\n";
				}
			}	
	
			// articles and PDF pages
	
			$x = simplexml_load_string($xml2, 'SimpleXMLElement');
			$xmlJson = json_encode($x);
			$xmlArr = json_decode($xmlJson, 1); 	
			//print_r($xmlArr);
	
			if (isset($xmlArr['@attributes']))
			//if (0)
			{
				if ($xmlArr['@attributes']['TYPE'] == 'PHYSICAL')
				{
					foreach ($xmlArr['div']['div'] as $div)
					{
						//print_r($div);
						// title
						if (isset($div['@attributes']))
						{				
							echo $div['@attributes']['LABEL'] . "\n";
					
							if (preg_match('/Volume (?<volume>\d+)/',  $div['@attributes']['LABEL'], $m))
							{
								$volume = $m['volume'];
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
					
							echo "spage=$spage\n";
							echo "epage=$epage\n";
							echo "start_page=$start_page\n";
							echo "end_page=$end_page\n";
						
							if ($pdf_filename != '' && $spage != 0)
							{
								if ($volume != '')
								{
							
									$sql = 'UPDATE names SET pdf="http://bionames.org/archive/issn/' . $issn . '/' . $volume . '/' . $spage . '.pdf"'
									 . ' WHERE issn="' . $issn . '" AND volume=' . $volume . ' AND spage=' . $spage . ';' . "\n";
									 echo $sql;
									 
									file_put_contents(dirname(__FILE__) . '/pdf.sql', $sql, FILE_APPEND);
							
							
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