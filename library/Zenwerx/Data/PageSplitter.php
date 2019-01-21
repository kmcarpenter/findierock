<?php

	class Zenwerx_Data_PageSplitter
	{
		const DEFAULT_PAGE_SIZE = 5;
		
		public static function SplitPages($data, $pageSize = self::DEFAULT_PAGE_SIZE)
		{
			$array = array();
			for($i=0;$i<count($data);$i++)
			{
				// I could do this inline, but this is for clarity
				$page = (int)($i/$pageSize);
				$idx = $i%$pageSize;
				$array[$page][$idx] = $data[$i];
			}
			return $array;
			
		}
	}
?>