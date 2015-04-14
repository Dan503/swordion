﻿
/*********************\
  TARGETING FUNCTIONS
\*********************/

//sets up the default module targets variable that gets overwritten in every module
var moduleTargets = {};

//returns a CLASS (dot added) eg. ".module-element--modifier-JS"
var c = function (key,classSet){
	classSet = typeof classSet != 'undefined' ?  classSet : moduleTargets;
	return '.'+classSet[key];
}

//returns a SPAN (nothing added) eg. "module-element--modifier-JS"
var s = function (key,classSet){
	classSet = typeof classSet != 'undefined' ?  classSet : moduleTargets;
	return classSet[key];
};

//returns a HOOK (an attribute selector)
var h = function(key,classSet){
	classSet = typeof classSet != 'undefined' ?  classSet : moduleTargets;
	return '[data-JShook="'+classSet[key]+'"]';
}

//returns an ID (hash added) eg. "#js-module-element"
var id = function (key,classSet){
	classSet = typeof classSet != 'undefined' ?  classSet : moduleTargets;
	return '#'+classSet[key];
};