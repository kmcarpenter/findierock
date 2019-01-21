<?php

	class FindieRock_Helper_FilterHelper
	{
		const A = 65;
		const Z = 90;
		public static function MakeAlphaFilter($selected = "", $urlRoot = "", $separator = " | ", $otherLink = true, $otherText= "Other", $otherVal = "_")
		{
			$out = "";
			for ($i=self::A;$i<=self::Z;$i++)
			{
				if ($selected != chr($i))
				{
					$out .= ($i > self::A ? $separator : "") . "<a href='$urlRoot" . chr($i) . "'>" .  chr($i) . "</a>";
				}
				else
				{
					$out .= ($i > self::A ? $separator : "") .  chr($i);
				}
			}
			if ($otherLink)
			{
				if ($selected != $otherVal)
				{
					$out .= "$separator <a href='{$urlRoot}{$otherVal}'>$otherText</a>";
				}
				else
				{
					$out .= "$separator $otherText";
				} 
			}
			
			return $out;
		}
		
		public static function MakePager($collection, $pageRoot, $currentPage = "", $numLinks = 5, $separator = " | ")
		{
			$out = "";
			if ($collection->haveToPaginate())
			{
				$first = $collection->getFirstPage();
				$prev = $collection->getPreviousPage();
				$prev = $prev != $first ? $prev : ""; 
				$next = $collection->getNextPage();
				$last  = $collection->getLastPage();
				$next = $next != $last ? $last : "";
				$out .= "<a href='{$pageRoot}{$first}'>First</a> ";

				if ($prev)
					$out .= "<a href='{$pageRoot}{$prev}'>Prev</a> ";
				
				$otherPages = $collection->getLinks($numLinks);
				
				foreach($otherPages as $page)
				{
					if ($page != $currentPage)
					{
						$out .= "$separator <a href='{$pageRoot}{$page}'>$page</a> ";
					}
					else
					{
						$out .= "$separator $page";
					}
				}
			
				
				if ($next)
					$out .= "<a href='{$pageRoot}{$next}'>Next</a> ";
					
				$out .= "$separator <a href='{$pageRoot}{$last}'>Last</a> ";
			}
			return $out;
		}
	}