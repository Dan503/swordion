<?php

//work in progress, this will be an upgrade to the $getCurrent etc variables
function get($option, $parameter = null, $style = 'deep'){

	$location = $GLOBALS['location'];
	$lastIndex = end($location);

/*
	In relation to previous and next...

	if ($style == 'deep'){//default
		//will go to every possible page in the order they appear in the navMap
	} elseif ($style == 'strict'){
		//will skip over subnav and return NULL if a nav item doesn't exist
	} elseif ($style == 'lazy'){
		//will go up a level when hitting the edges and will skip over sub nav
	}
*/

	switch($option){
		case 'depth' :
			$returnValue = count($location);
		break;

		case 'parent' :
			if (get('depth') <= 1){
				return null;
			} else {
				$locationCopy = $location;
				array_pop($locationCopy);
				$returnValue = getNavMap($locationCopy);
			}
		break;

		case 'grandParent' :
			if (get('depth') <= 2){
				return null;
			} else {
				$locationCopy = $location;
				//use $style variable to tweak how far up the ancestry tree 'grandparent' goes
				//it defaults to 2 levels
				$style = $style == 'deep' ? 2 : $style;
				for($i = 0; $i < $style; $i++){
					array_pop($locationCopy);
				}
				$returnValue = getNavMap($locationCopy);
			}
		break;

		case 'siblings' ://siblings does include the current nav item
		//can be used like get('siblings', 1, 'title')
			$siblings = get('parent','subnav');
			if (is_int($parameter)){
				if($style != 'deep'){
					return $siblings[$parameter][$style];
				} else {
					return $siblings[$parameter];
				}
			} else {
				return $siblings;
			}
		break;

		case 'children' :
		//can be used like get('siblings', 1, 'title')
			$children = get('current','subnav');
			if (is_int($parameter)){
				if($style != 'deep'){
					return $children[$parameter][$style];
				} else {
					return $children[$parameter];
				}
			} else {
				return $children;
			}
		break;

		//prev is working
		case 'prev' :
	        //calculate what the previous location in relation to the nav map is
			$location = getPrevLocation($location, $style);
			$returnValue = getNavMap($location);
			//Note, linkGen screws the system up. I need safe guards for when linkGens are enabled.
		break;

		//next not available yet
		case 'next' :
	        //calculate what the next location in relation to the nav map is
			$location = getNextLocation($location, $style);
			$returnValue = getNavMap($location);
		break;

		case 'nextParent':
			$returnValue = getSiblingParent($location, 'next');
		break;

		case 'prevParent':
			$returnValue = getSiblingParent($location, 'prev');
		break;

        case 'current':
            $returnValue = getNavMap($location);
        break;

		case 'navMap':
			//an alternate way to do the getNavMap() function
			//get('navMap', [1,2,3], 'title');
			return getNavMap($parameter, $style);
		break;
	}

    if (isset($parameter)){
        return $returnValue[$parameter];
    } else {
        return $returnValue;
    }
};

?>