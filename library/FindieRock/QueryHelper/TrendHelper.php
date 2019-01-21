<?php

	class FindieRock_QueryHelper_TrendHelper
	{
		const ONE_WEEK = 7;
		const MAX_TREND = 10;
		
		/**
		 * Log a view of an album, venue, artist, or event. Only allow once per day per type (based on IP)
		 * Also filter out google and yahoo (hard coded atm).
		 * 
		 * @param int $type
		 * @param int $targetId
		 * @param string $ip
		 * @return int
		 */
		public static function SaveTrend($type, $targetId, $ip = null)
		{
			if ($ip)
            {
				// Googlebot
				if (strpos($ip, "66.249") === 0)
				{
					return 0;
				}
				// Yahoo
				if (strpos($ip, "67.195") === 0)
				{
					return 0;
				}
			}
			
                     	$trend = new Trend();
			$trend->setTrendtarget($targetId);
			$trend->setTrendtypeid($type);
			$trend->setSessionid($ip);
			$trend->setTimestamp(time());
			
			$saved = 0;
			try
			{
				$saved = $trend->save();
			}
			catch (Exception $e)
			{
				$log = Zend_Registry::get('log');
				$log->info("Duplicate entry for trend: {$type}/{$targetId}/{$sessId}");
			}
			return $saved;
		}
		
		public static function LoadTrend($type, $max = self::MAX_TREND, $days = self::ONE_WEEK)
		{
			return TrendQuery::create()
							->filterByTrendtypeid($type)
							->filterByTimestamp(Zend_Date::now()->subDay($days)->toString(Zend_Date::ISO_8601),
													Criteria::GREATER_EQUAL)
							->setLimit($max)
							->addDescendingOrderByColumn('TrendCount')
							->withColumn('COUNT(TrendTarget)', 'TrendCount')
							->find();
		}
	}
?>
