<?php

function digForLastLocation($prevOrNext, $location){

	$subNav = getNavMap($location, 'subnav');

	if ($prevOrNext == 'prev'){
		if(hasSubnav($location)){
			array_push($location, count($subNav) - 1);
			return digForLastLocation($prevOrNext, $location);
		} else {
			return $location;
		}
	} else {

		$locationCopy = $location;

		$siblingCount = count(get('parent','subnav')) - 1;

		$lastDigit = end($location);

		$notRootLevel = count($location)  > 1;

		$isLastSibling = $lastDigit == $siblingCount;

		if ($notRootLevel && $isLastSibling){
			array_pop($locationCopy);//[1,1]

			$nextSiblingLocation = $locationCopy;

			$nextSiblingLocation = update_last($nextSiblingLocation, $lastDigit + 1);//[1,2]

			$hasNextSibling = getNavMap($nextSiblingLocation) != NULL;

			if ($hasNextSibling){
				return $nextSiblingLocation;
			} else {
				return digForLastLocation($prevOrNext, $locationCopy)
			}
		};
	}
}

?>