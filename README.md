# Swordion
A feature rich website boilerplate starter kit that makes life easy for front end developers

The idea with Swordion is to use it as a base for building a new website on. You need everything for this thing to work.

You can use the global mixins folder to use the Swordion mixins in an old project... but it's far from plug and play. The mixins need to have the IE seperation functionality removed from them before they will work in an old site. You will probably need the config files as well. So I wouldn't recomend it if you aren't strong in writing SASS.

---------------------

##Please note

This documentation (and this whole thing in general) is a __work in progress__ and is likely to change drastically without notice.

---------------------

##Dependancies

- Grunt
- SASS
- Local PHP server
- <a href="http://www.imagemagick.org/script/binary-releases.php">Image Magik</a>

--------------------

##Getting started

Step one is to clone a copy of Swordion onto your computer so you have a master copy that you can use in all future projects. After that, copy the Swordion files into the folder you want to build the site in. Use that copy as a base for your project.

###Local PHP server

Install a local php server on your computer.

I use <a href="http://www.easyphp.org/">EasyPHP Devserver</a> with the <a href="http://www.easyphp.org/save-module-virtualhostsmanager-vc9-latest.php">Virtual Host Manager</a> plugin. Once you've got it working it's great... but it uses port 80 by default which can make the initial install difficult. You need to manually change it to a different port (I use port 8080) in the appache file. Right click easyPHP icon in bottom right corner of screen > Configuration > Apache. Then find/replace all occurances of ":80" with ":8080".

####Installing Easy PHP local server (PC only)

1. Download it from <a href="http://www.easyphp.org/">The easy PHP website</a> (vc11 is preferable)
2. Open the program, right click the icon that appears in the bottom right corner of the screen.
3. select configuration > apache
4. replace all instances of `127.0.0.1:80` with `127.0.0.1:8080` then save the file
5. Download the <a href="http://www.easyphp.org/save-module-virtualhostsmanager-vc11-latest.php">virtual hosts manager</a> add on
6. I'd recomend dragging the program into your task bar for quick and easy access

####Seting up a new project with EasyPHP

1. right click the little EasyPHP icon in the bottom right of the screen again
2. click "administration"
3. click "add virtual host"
4. In the first text box that appears (under point 2) write the name of the projects (The name can only contain alpha-numeric characters, dots, underscores and hyphens. The name should all be in lowercase lettters)
5. Paste the path to the root folder of the project
6. Press "ok" (this action requires the program to have access to your hosts file, this may cause problems for you if your security settings don't allow this)
7. Click on the name of the project to take you to the localy hosted version of the site
8. Book mark the site for easy access

If you are on mac or you can't get EasyPHP to work, just Google "local php server" and you should find something that works for you pretty quick.

... lol "just google" are words that I probably shouldn't be putting in documentation :P

###Image Magik

This is needed for the auto-sprite functionality. You will need to install Image Magic before doing the npm install into your project folder (don't worry I'm going through that next).

The instructions found on the <a href="http://www.imagemagick.org/script/binary-releases.php">Image Magik website</a> are pretty clear.

###Getting Grunt and SASS working:

####First time use:

0. Download and install <a href="http://rubyinstaller.org/">rubyinstaller</a> *if you are on PC*.
0. Download and Install <a href="http://nodejs.org/">Node.js</a>
0. Open Start menu
0. Run as administrator: "start command prompt with ruby"
5. set the project directory:
  0. Type `cd ` in the console
  0. Paste the project folder directory into the console (using right click menu)
    - eg: `cd C:\Users\username\Documents\projects\PROJECT_NAME\website`
  0. Press `enter/return`
0. Paste this into the console (inculding the line break at the end):

````````````
gem install sass
npm install -g grunt-cli
npm install
grunt

````````````

####When starting work on someone elses project

The grunt node_module files should never be placed in source control. It hinders the process of committing and updating if those files are in the repository. Instead the files should be downloaded and installed using npm:

First set the current directory to your project root folder as stated in point 5

```````
cd C:\Path\To\Your\Project\Root\Folder
```````

Then paste this into a ruby and nodeJS enabled console window:

```````
npm install -g grunt-cli
npm install
grunt

```````

####When returning to a project you have been working on

All you need to do is set the project directory (as stated in point 5) then paste this into the ruby enabled console:

```````
grunt

```````

For this I recommend creating a "grunt-start-up.txt" file that you keep in your root folder and *out of source control* (It would be different for everyone). This is an example of what you would put in it:

```````
cd C:\Users\username\Documents\projects\PROJECT_NAME\website
grunt

``````

Ensure that it has a line break at the end.

Now when you are returning to a project, all you need to do is a select-all, copy, then paste it into the console. It will instantly start running grunt for you :)

--------------------

##Class system

There is a class system that permeates throughout the whole of Swordion... or at lest I try to make it run through the whole kit as best I can. It is a slightly altered version of the <a href="http://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/" title="learn more about BEM naming conventions">BEM</a> class naming convention.

This is basically how the naming system works:

````````````````````
//this type of class is given to the element that wraps around (or is in itself) a self contained module
.moduleName

//this type of class is added to the individual elements that make up a module
.moduleName__elementName

//if an elements state is in an alternate state from the default state (a *modified* element),
//it is given a class like this with 2 dashes before the modifier name
.moduleName__elementName--modifierName

//If a class is used by js, "-JS" goes at the end of the class. This makes it easier to understand where the class comes from and it goes at the end since it makes it easier to write rules for it that way in SASS
.moduleName__elementName--modifierName-JS

//"TK-" stands for "Tool Kit". These are functional classes that serve a specific purpose
.TK-functionName

//single dashes are miscellaneous and just used to help add grouping to class names that don't quite fit into the basic "module, element, modifier" structure.
//often used to separate a number from a word or add an extra detail to a modifier class
.moduleName__elementName-1
.moduleName__elementName--modifierName-typeName
```````````````````

This is pretty much the same as regular BEM syntax except it is using camel case instead of dashes to separate words.

`````
//classic BEM structure
.module-name__element-name--modifier-name
`````

I hope based off that one example you can see why I have chosen to make it camel case. Using camel case clearly groups the words that belong together under the same part of the class. Every dash and underscore clearly separates each segment of the class and it's clear what each bit represents. At a glance, the standard BEM structure is confusing with dashes and underscores all over the place. I think This method is simply easier to read.

Here is an example of how you would use the classes using my slightly altered method:

###HTML
```````````html
<div class="navMenu">
	<a id="navMenu__toggle" class="navMenu__toggle" href="#">Toggle menu</a>
	<ul id="navMenu__list" class="navMenu__list">
		<li class="navMenu__item"><a href="/page1" class="navMenu__link">Home</a></li>
		<li class="navMenu__item"><a href="/page2" class="navMenu__link navMenu__link--isActive">About</a></li>
		<li class="navMenu__item"><a href="/page3" class="navMenu__link">Contact</a></li>
	</ul>
</div>
````````````

###SASS
````````sass
.navMenu {
	&__list {
		list-style: none;
		text-align: center;
		padding: 0;
	}
	&__item {
		display: inline-block;
	}
	&__link {
		display: block;
		padding 10px;

		&--isActive {
			background: #000;
			color: #fff;
		}
	}
	&__toggle {
		display: block;
		padding: 10px 20px;
		background: #000;
		color: #fff;
	}
}
```````

###Generated CSS
````````````css
.navMenu__list { list-style: none; text-align: center; padding: 0; }

.navMenu__item { display: inline-block; }

.navMenu__link { display: block; padding: 10px; }

.navMenu__link--isActive { background: #000; color: #fff; }

.navMenu__toggle { display: block; padding: 10px 20px; background: #000; color: #fff; }
```````````

--------------------

##JavaScript system

Using the BEM naming convention in javascript is painful. For example take a look at this simple bit of code that replicates the jQuery toggleClass() method when clicking an element:

```````````html
<button class="moduleName__elementName">element</button>
````````````
```````javascript
//classic javascript
$('.moduleName__elementName').click(function(){
	if($(this).hasClass('moduleName__elementName--modifierName')){
		$(this).removeClass('moduleName__elementName--modifierName');
	} else {
		$(this).addClass('moduleName__elementName--modifierName');
	}
});
`````````````

Look at all that horrible repetition! So what is the easiest way to reduce the repetition in with javascript? variables!
So this is how that ends up looking if we save things into variables:

```````````html
<button class="moduleName__elementName">element</button>
````````````
```````javascript
//Using variables
var element = 'moduleName__elementName',
	element_modifier = 'moduleName__elementName--modifierName';

$('.'+element).click(function(){
	if($(this).hasClass(element_modifier)){
		$(this).removeClass(element_modifier);
	} else {
		$(this).addClass(element_modifier);
	}
});
`````````````

That&rsquo;s getting better but Swordion is all about keeping things modular. We want to be able to make a clear distinction between what is used in javascript and what is used in CSS. Targeting a class in our JS means that the thing we are using to trigger the JS is highly likely to be used for styling. If that happens, and later down the line we decide that we want .otherElement to trigger the js instead of .elementName, we have to go back and alter our code. That is why Swordion uses `data-jshook` attributes instead.

But targeting data attributes can be a bit annoying in JS:

```````````html
<button class="moduleName__elementName" data-jshook="moduleName__functionName">element</button>
````````````
```````javascript
//Using variables
var functionName = 'moduleName__functionName',
	element_modifier = 'moduleName__elementName--modifierName';

$('[data-jshook*="'+element+'"]').click(function(){
	if($(this).hasClass(element_modifier)){
		$(this).removeClass(element_modifier);
	} else {
		$(this).addClass(element_modifier);
	}
});
`````````````

That is why Swordion gives you tools for using these js hooks easily.

```````````html
<button class="moduleName__elementName" data-jshook="moduleName__functionName">element</button>
````````````
```````javascript
//The Swordion approach

var module_moduleName = 'moduleName'; //#1

module = module_moduleName; //#2

moduleTargets[module] = {//#3
	//js hooks
	functionName : module+'__functionName',//#4

	//class modifiers
	elementName_modifier: module+'__elementName--modifierName',//#5
};


$(Hook('functionName')).click(function(){ //#6
	module = module_moduleName;//#7
	if($(this).modHasClass('element_modifier')){//#8
		$(this).modRemoveClass('element_modifier');
	} else {
		$(this).modAddClass(element_modifier);
	}
});
`````````````

Firstly, you need to understand that this would typically go into it's own JS file under this directory: /assets/js/modules/constant/
Also this file would only hold the code for a single module and would be named after that module. So in this case the file would be called "moduleName.js".

Now here is a run down of the code above:

1. Sets the name of this module. This must be the same as the first portion of the data-jshook attribute.
2. "module" must be called "module" here. It is required for the targeting functions to work.
3. This line will always be the same in every module based JS file. It is essentially the thing that declares the list of hooks and classes that this particular module uses.
4. This is a hook name. This would be named after the function that hook is used for.
5. This is a class modifier name. These would be classes that can be used in both CSS and JS for changing an elements state
6. This line shows how to call for a js hook. The equivalent of this line in regular jQuery looks like this: `$('[data-jshook*="moduleName__functionName"]')`. See how much smaller it makes it? One thing to note though is that it uses `*=`. The strength of this is that you can place multiple jshooks on a single element... the downside is that it will sometimes target things you don't want it to target. eg. `$('[data-jshook*="moduleName__functionName"])` will also target `'<div data-jshook="moduleName__functionName--modifier"></div>`. So if you use a modifier in the name, all names need to have a modifier on them.
7. This needs to be re-declared inside any function that happens outside of the initial page load. It is how the targeting functions understand what module you are referring to. I realise that re-declaring this line all the time isn't all that nice but I haven't found a better way of doing it.
8. This is an example of using one of the mod class methods Swordion comes with. It works the same way as the jQuery class manipulator functions except it has "mod" (short for module) at the front and knows to expect something from the moduleTargets object instead of an exact match with the html.


`````````````````````````
//Swordion JS targeting functions:

//Returns a data-jshook attribute selector (needs to be like this so they are treated similarly to classes)
Hook('xxx') => '[data-jshook^="module__function "], [data-jshook*=" module__function "], [data-jshook$=" module__function"], [data-jshook="module__function"]'

//returns a CLASS (dot added)
Class('xxx') => ".module__element--modifier"

//returns a SPAN (nothing added)
Span('xxx') => "module__element--modifier"

//returns an ID (hash added)
id('xxx') => "#module__element"
``````````````````````````


``````````````````````````
//Swordion "mod" functions

//Adds a class
.modAddClass('xxx') = .addClass(Span('xxx'))

//Removes a class
.modRemoveClass('xxx') = .removeClass(Span('xxx'))

//Toggles a class on/off depending on if the class is already there or not
.modToggleClass('xxx') = .toggleClass(Span('xxx'))

//Checks if an element has the specified class
.modHasClass('xxx') = .hasClass(Span('xxx'))

//Checks if an element has the specified JS hook.
.modHasHook('xxx') = .attr('data-jshook').indexOf(Span('xxx')) > 0
``````````````````````````

--------------------

##Grid system

Swordion features a robust responsive grid system based on fractions. It uses flexbox styling with table styling as a backup for IE9 and bellow.

###Setting grid column widths

Here is a basic example of how to set a shared grid column width:

```````HTML
<!-- Setting a shared column width -->
<div class="grid grid--quarters">
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
</div>
```````

In this example, it would generate 4 columns of equal width across the page. At certain break points, the columns automatically alter their width to a more appropriate size. For example, if the grid is given the class "grid--quarters", currently at the "tablet" breakpoint (defined in the "break-points.scss" config file) the width of the columns change from 25% to 50%.

Here is a full list of available grid column width classes and what their break points are (all of this can be altered in the "columns.scss" config file):

- <strong>grid--full</strong>
  - Default column width: 100%;
  - Break points: none;
  - (Useful for when you still want access to the grid classes but you don't actually want any columns.)

- <strong>grid--halves</strong>
  - Default column width: 50%;
  - Break points:
     - breaks at 'mobile' (600px) to 100% width;

- <strong>grid--thirds</strong>
  - Default column width: 33.33333%;
  - Break points:
     - breaks at 'mobile' (600px) to 100% width;

- <strong>grid--quarters</strong>
  - Default column width: 25%;
  - Break points:
     - breaks at 'tablet' (960px) to 50% width;
     - breaks at 'mobile' (600px) to 100% width;

- <strong>grid--fiths</strong>
  - Default column width: 20%;
  - Break points:
     - breaks at 'mid' (770px) to 33% width;
     - breaks at 'mobile' (600px) to 50% width;
     - breaks at 'small' (480px) to 100% width;

- <strong>grid--sixths</strong>
  - Default column width: 16.66667%;
  - Break points:
     - breaks at 'mid' (770px) to 33.33% width;
     - breaks at 'mobile' (600px) to 50% width;
     - breaks at 'small' (480px) to 100% width;

####Colspan feature

<strong>(Columns that take up the space of more than 1 column)</strong>

Here is an example of how to use the colspan feature:

```````HTML
<!-- Adding an extra wide column -->
<div class="grid grid--quarters">
	<div class="grid__cell grid__cell--span-2"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
</div>
```````

In this example the first column will take up 50% of the width while the other two columns will take up only 25% of the width. That is the basic premise of using the `grid__cell--span-#` modifier.

The class works as you would expect. The grid set to thids only accepts `--span-2` where as a grid set to sixths can accept `grid__cell--span-2` all the way to `grid__cell--span-5`.

<strong>WARNING!</strong> Using the `grid__cell--span-#` feature doesn't scale well, extra module specific styling will be needed for smaller screen sizes. If you are using the `grid__cell--span-#` feature I'd recommend adding the `grid--disableMQs` class to the grid div. This will prevent the usual snapping at break points and allow you to add your own module based media queries in without interference from the default styles.

```````HTML
<!-- Disabling the default Media Queries to make module based Media Queries easier -->
<div class="grid grid--quarters grid--disableMQs">
	<div class="grid__cell grid__cell--span-2"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
</div>
```````

###Nesting grids

Disabling the media queries also really comes in handy when you need to nest grids inside one another.

```````HTML
<!-- Nesting grids inside one another and disabling the inner grid Media Queries -->
<div class="grid grid--halves">
	<div class="grid__cell">
		<div class="grid grid--thirds grid--disableMQs">
			<div class="grid__cell"><!-- grid content --></div>
			<div class="grid__cell"><!-- grid content --></div>
			<div class="grid__cell"><!-- grid content --></div>
		</div>
	</div>
	<div class="grid__cell"><!-- grid content --></div>
</div>
```````

###Enable wrapping (multiple rows)

Originally I had this turned on by default but it caused issues in IE so this needs to be enabled with the `grid--enableWrapping` class if you want multiple wrapping rows.

Don't worry, media queries still work if this isn't enabled. It only affects desktop sized screens.

```````HTML
<!-- Nesting grids inside one another and disabling the inner grid Media Queries -->
<div class="grid grid--halves grid--enableWrapping">
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
</div>
```````



###Using the grid system for horizontal nav bars

When you have horizontal navigation, there are a lot of common difficulties to overcome:
 - Longer items need more space than smaller items
 - Everything needs to look evenly spaced
 - If the text wraps, the smaller text should be vertically center aligned
 - It needs to be able to wrap elements to the next line so it doesn't break on mobile devices
 - links need to take up the full size of the box it is in for the best user experience.

Since the grid system is powered by the flexbox css property (in modern browsers) the grid classes are able to take care of most of this for us.

```````HTML
<!-- Example of how to use grid for navigation -->
<nav class="grid grid--padding-5 grid--vAlign navExample">
	<a href="#item0" class="grid__cell navExample__link">
		<span class="grid__vAlignHelper">Very long item that is probably too long for navigation</span>
	</a>
	<a href="#item1" class="grid__cell navExample__link">
		<span class="grid__vAlignHelper">short</span>
	</a>
	<a href="#item2" class="grid__cell navExample__link">
		<span class="grid__vAlignHelper">Normal sized item</span>
	</a>
	<a href="#item4" class="grid__cell navExample__link">
		<span class="grid__vAlignHelper">looooo ooooooooo ooooooooo oooong</span>
	</a>
</nav>
```````

A few things to note:

<strong>no grid--[width] class</strong><br>
Yep that's right, you don't need to set a `grid--halves` or a `grid--sixths` class for the grid to work. If no width class is provided then it will automatically determine how wide the columns should be based on the content inside the grid cell (which is perfect for a horisontal nav bar). I'd recommend setting widths with module based media queries for smaller screen sizes though.

<strong>grid--padding-#</strong><br>
To quickly and easily add padding to all the grid cells at once, you can use the `grid--padding-#` modifier class. This class is a bit more powerful than most classes though so depending on the situation, it might be better to add the padding using module based styling instead.<br>
Available Padding classes can be edited in the grid config file.

<strong>grid--vAlign</strong><br>
This is the part that vertically center aligns the text inside the link if the links around it have split to 2 lines already. You will notice that there is a "grid__vAlignHelper" span inside the `<a>` tags. These don't actually have any styling attatched to them but the `<a>` tags <em>need</em> an element inside them for the vertical alignment to work. I put the class on there to hint at why it's needed.

<strong>It's not in a list!?!</strong><br>
I hate how It's not inside a list but I couldn't find any way to make the links both center align the text and completely fill the available space in the column. When I put it inside a list, I basically had to decide between text that wasn't vertically center aligned, having links that didn't fill the entire space available, or resorting to javascript to force equal heights that way. Using javascript to force it felt excessive to me when a pure css approach is possible if you just leave the links out of a list. It's wrapped in a `<nav>` element, that should make it semantic enough I think.

<strong>navExample module classes</strong><br>
"navExample" and "navExample__link" aren't part of the grid class set. to add custom styling to the nav, you need the "navExample" and "navExample__link" module classes to target the nav properly in the SASS files.

###Adding gutters

(Feature creates white borders instead of transparent gutters in IE8)

A lot of the time you don't want your grid cells to be hard up against one another. In those scenarios, we want to add a gutter to our grid.

```````HTML
<!-- Adding a 20px gutter between the grid cells-->
<div class="grid grid--quarters grid--gutter-20">
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
	<div class="grid__cell"><!-- grid content --></div>
</div>
```````

The above example will add a 20px gutter between each column both horizontally and vertically.<br>
Available gutter classes can be edited in the grid config file.


###Adding borders to cells with a gutter

To make life easier, the grid system has a `grid--border-#` modifier class that can be applied to it. Available border widths can be set in the grid.scss config file in the `$cellBorders` variable.

I origionally did something clever with outline offset but IE11 doesn't support that so I had to go back to the drawing board. Now if you want to add a border to your grid cells you need to apply a `grid--hasInners` class to the main grid element and also add a `grid__inner` element inside the `grid__cell` element for the system to work.

```````HTML
ADDING A BORDER TO GRID CELLS THAT HAVE A GUTTER

<div class="grid grid--quarters grid--hasInners grid--gutter-20 grid--border-2">
	<div class="grid__cell">
		<div class="grid__inner"><!-- grid content --></div>
	</div>
	<div class="grid__cell">
		<div class="grid__inner"><!-- grid content --></div>
	</div>
	<div class="grid__cell">
		<div class="grid__inner"><!-- grid content --></div>
	</div>
	<div class="grid__cell">
		<div class="grid__inner"><!-- grid content --></div>
	</div>
</div>
```````


###Adding borders to cells WITHOUT gutters

If you don't need the gutters but you do want the borders (essentially making the grid look like a table) then you don't need to worry about adding the `grid__inner` stuff.

<strong>Note:</strong> To change the color of the border, you need to target both the grid__cell <em>AND</em> the grid itself

```````HTML
ADDING A BORDER TO GRID CELLS THAT DO NOT HAVE A GUTTER

<div class="grid grid--quarters grid--border-3 gridBorderExample">
	<div class="grid__cell gridBorderExample__cell"><!-- grid content --></div>
	<div class="grid__cell gridBorderExample__cell"><!-- grid content --></div>
	<div class="grid__cell gridBorderExample__cell"><!-- grid content --></div>
	<div class="grid__cell gridBorderExample__cell"><!-- grid content --></div>
</div>
```````
```````SASS
SASS:
.gridBorderExample {
	&-cell, & {
		border-color: #fff;
	}
}
```````

##SASS mixins guide

_(All my mixins start with "M-" because my preferred editor doesn&rsquo;t like ending keyboard shortcut code snippets with a space)_

All SASS mixins are stored here... unless they are module specific:
/assets/sass/02-mixins/


###The Media query mixin

**(@include M-mq(range, start-breakpoint, end-breakpoint){ @content })**

This is probably the number 1 most useful mixin in Swordion.

####Basic usage

`````````````SASS
SASS:

.element {
	background: red;

	@include M-mq(max, 600px){
		background: blue;
	}
}
`````````````
`````````````CSS
outputted CSS:

.element { background: red; }
@media screen and (max-width: 600px) {
	.element { background: blue; }
}
`````````````

In that example we have stated that we want the background of the element to be red by default but change to blue if the screen is less than 600px wide

It's just as easy to state a minimum width:<br>

`````````````SASS
SASS:

.element {
	background: red;

	@include M-mq(min, 600px){
		background: blue;
	}
}
`````````````
`````````````CSS
outputted CSS:

.element { background: red; }
@media screen and (min-width: 601px) {
	.element { background: blue; }
}
`````````````

Note that in the sass, we state the width as being 600px but it gets outputted as 601px in the CSS. This makes the mixin more intuitive to use and means you'll never have to worry about that ugly 1px cross over point where `min` and `max` ranges set to the same width display at the same time.

But what about IE8? It can't read media queries so those `min` styles won't appear in IE properly... except they will ;)

This is the primary reason for why IE8 gets it's own style sheet. There is a `$fix-mqs` variable in the `/assets/sass/output-files/style-lt-ie9.scss` file. The media query mixin uses this variable to determine if IE should recieve the styles or not. This variable should be set to the max-width of the design on desktop.

If you use a `min` range in the mixin and the value you give is less than the $fix-mqs variable, the styles will be dumped directly into the css without the media query wrapping.

`````````````SASS
SASS:

.element {
	background: red;

	@include M-mq(min, 600px){
		background: blue;
	}
	@include M-mq(max, 600px){
		background: blue;
	}
}
`````````````
`````````````CSS
outputted modern CSS:

.element { background: red; }
@media screen and (min-width: 601px) {
	.element { background: blue; }
}
@media screen and (max-width: 600px) {
	.element { background: green; }
}
`````````````
`````````````CSS
outputted IE8 CSS:

.element { background: red; background: blue; }
`````````````

But what about those times when you only want a style to be effective within a given range? Perhaps you only want something to be blue if it's a tablet sized screen? That is when the `inside` range type come in handy :)

`````````````SASS
SASS:

.element {
	background: red;

	@include M-mq(inside, 1024px, 600px){
		background: blue;
	}
}
`````````````
`````````````CSS
outputted CSS:

.element { background: red; }
@media screen and (max-width: 1024px) and (min-width: 601px) {
	.element { background: blue; }
}
`````````````

Again notice how min-width gets outputted as +1 the value given to avoid potential conflicts.

If you want something to be styled a certain way on mobiles and desktops but not tablets, we can use the `outside` range type:

`````````````SASS
SASS:

.element {
	background: red;

	@include M-mq(outside, 1024px, 600px){
		background: blue;
	}
}
`````````````
`````````````CSS
outputted CSS:

.element { background: red; }
@media not screen and (max-width: 1024px) and (min-width: 601px) {
	.element { background: blue; }
}
`````````````
`````````````CSS
outputted IE8 CSS:

.element { background: red; background: blue; }
`````````````

Yep that's right. If the $fix-mqs variable is higher than the max width of an `outside` range type, the styles will be dumped into the IE style sheet for IE compatibility. The same will also happen if using an `inside` range and the $fix-mqs variable is between the max and minimum width (I doubt that would happen very often though since $fix-mqs is meant to be the maximum width of the design)

####Using $MQ-xxxxx variables

It's a bit of a pain in the ass for maintainability writing the media query conditions inline like that all the time, so the media query mixin can also accept the queries in variable form.

`````````````SASS
SASS:

$MQ-example: inside, 1024px, 600px;

.element {
	background: red;

	@include M-mq($MQ-example){
		background: blue;
	}
}

.element2 {
	background: green;

	@include M-mq($MQ-example){
		background: grey;
	}
}
`````````````
`````````````CSS
outputted CSS:

.element { background: red; }
@media screen and (max-width: 1024px) and (min-width: 601px) {
	.element { background: blue; }
}
.element2 { background: green; }
@media screen and (max-width: 1024px) and (min-width: 601px) {
	.element { background: grey; }
}
`````````````

Ahhhhh!!! It's doubling up on Media queries!!! Think of all that extra weight your adding!!!

Don't worry. The Grunt for Swordion has CSS media query merging built into it's css minification stage. 90% of the time, if you use propper BEM technique to name your classes, this doesn't cause an issue. It does occasionally cause issues though so you will need to test your site after switching to the minified css to make sure there aren't any nasty surprises waiting for you.

The CSS doesn't get minified on save. It only minifies when initializing the Grunt task runner. This is to reduce save time.

####Media Query "or" statements

Media Query "or" statements are only possible using a `$MQ-xxxxx` variable.

`````````````SASS
SASS:

$MQ-example:
	(inside, 1024px, 980px),
	(max, 600px)
;

.element {
	background: red;

	@include M-mq($MQ-example){
		background: blue;
	}
}
`````````````
`````````````CSS
outputted CSS:

.element { background: red; }
@media screen and (max-width: 1024px) and (min-width: 981px), screen and (max-width: 600px) {
	.element { background: blue; }
}
`````````````

This technique is the most useful when you are targeting a module which is inside a container which is changing in width quite frequently. It's a bit harder to make a counter media query for these though since as long as just a single rule in the or statement is true, the styles will take effect. To effectively create a counter media query for one of these multi queries, you need to carefully target all the gaps in the original statement.

`````````````SASS
SASS:

$MQ-example:
	(inside, 1024px, 980px),
	(max, 600px)
;

$MQ-example--false:
	(min, 1024px),//$MQ-example doesn't go any higher than 1024px
	(inside, 980px, 600px)//$MQ-example doesn't target screen sizes between 980px and 600px.
	//$MQ-example covers all screen sizes below 600px so no further queries are needed for the counter query
;

.element {
	@include M-mq($MQ-example){
		background: blue;
	}
	@include M-mq($MQ-example--false){
		background: red;
	}
}
`````````````
`````````````CSS
outputted CSS:

@media screen and (max-width: 1024px) and (min-width: 981px), screen and (max-width: 600px) {
	.element { background: blue; }
}
@media screen and (min-width: 1025px), screen and (max-width: 980px) and (min-width: 601px) {
	.element { background: red; }
}
`````````````

####Media Query Break points

We're human, we hate using numbers instead of words so typing 600px all over the place is a pain in the ass and horrible for maintainability. That's why I've got a `break-points.scss` config file in the `/assets/sass/00-config/` folder. I've also got a handy `bp('breakPointName')` function for grabing them whenever you want.

`````````````SASS
SASS:

$MQ-example: inside, bp('tablet'), bp('mobile');

.element {
	background: red;

	@include M-mq($MQ-example){
		background: blue;
	}
}

`````````````
`````````````CSS
outputted CSS:

.element { background: red; }
@media screen and (max-width: 1024px) and (min-width: 601px) {
	.element { background: blue; }
}
`````````````


--------------------


###The animation mixins

####Transition animations

The absolute most basic and easiest way to add animation to your site is with this mixin:

`````````````SASS
@include M-animate;
```````````````````````

When a change in styles is detected, it will animate the change whenever possible. The default settings are a duration of 0.2s, no delay, eases in and out and will affect all css attributes. so in other words, this is the default output css:

```````````````````````CSS
/*CSS output*/
-webkit-transition: all 0.2s ease-in-out;
transition: all 0.2s ease-in-out;
```````````````````````


If you want to alter the timing so it has a different duration, it's as easy as:

`````````````SASS
//animation takes 0.5s to complete
@include M-animate(0.5s);
```````````````````````

Adding a delay can be done like this:

`````````````SASS
//animation takes 0.5s to complete and has a 0.2s delay
@include M-animate(0.5s 0.2s);
```````````````````````

To change the ease style you can do this

`````````````SASS
Changing the ease style

//using custom timing
@include M-animate(0.5s, linear);

//using default timing
@include M-animate($ease:linear);
```````````````````````

If you only want to animate particular CSS attributes you can do this:

`````````````SASS
Specifying attributes to animate

/*using custom settings*/
@include M-animate(0.5s, linear, background border);

/*using default settings*/
@include M-animate($attributes: background border);
```````````````````````

This is what the example above exports as CSS (using the default settings example)

```````````````````````CSS
/*CSS output*/
-webkit-transition: background 0.2s ease-in-out, border 0.2s ease-in-out;
transition: background 0.2s ease-in-out, border 0.2s ease-in-out;
```````````````````````

That's pretty cool but what about if we want to give the background and border animation a duration of 1s with a 0.5s delay and a linear ease, but on the same element we also want to animate the opacity with default settings? It's easy with Swordion :)

`````````````SASS
Advanced transition settings

$transition: (
	attributes: background border,
	duration: 1s,
	delay: 0.5s,
	ease: linear
), (
	attributes: opacity,
);
@include M-animate($transition);
```````````````````````
```````````````````````CSS
/*CSS output*/
-webkit-transition: background 1s 0.5s linear, border 0.2s 0.5s linear, opacity 0.2s 0s ease-in-out;
transition: background 1s 0.5s linear, border 0.2s 0.5s linear, opacity 0.2s 0s ease-in-out;
```````````````````````

See even the really complicated transitions are easy with Swordion! You can have as many of those groups as you want, it will just keep adding to the transition rule.


####Keyframe animations

The easiest way to use CSS keyframe animations is with the kf-animate mixin. Here is an example of how to do a simple animation of something fading in and out continuously (also the text is changing color).

`````````````SASS
//A simple SASS keyframe animation

.element {
	$fadeInOut:
		0% (opacity: 0, color: red),
		80% (opacity: 1, color: blue),
		100% (opacity: 0, color: red),
	;
	@include M-kf-animate(fadeInOut, $fadeInOut, 1s);
}
```````````````````````
```````````````````````CSS
/*CSS output*/
@-webkit-keyframes fadeInOut {
	0% { opacity: 0; color: red; }
	80% { opacity: 1; color: blue; }
	100% { opacity: 0; color: red; }
}
@keyframes fadeInOut {
	0% { opacity: 0; color: red; }
	80% { opacity: 1; color: blue; }
	100% { opacity: 0; color: red; }
}
.element {
	-webkit-animation: fadeInOut 1s infinite linear both;
	animation: fadeInOut 1s infinite linear both;
}
```````````````````````

It can get really tedious having to figure out what all the keyframe percentages need to be, especially if you just want them all to be evenly spaced and there's like 8 of them or something.

Well guess what! Swordion is able to take away all that pain and figure out the key frames for you! As long as you are happy with the keyframes all being evenly spaced, this is a perfectly fine way of writting your SASS animation code:

`````````````SASS
//Let Swordion calculate the keyframes for you!

.element {
	$fadeInOut:
		(opacity: 0, color: red),
		(opacity: 1, color: blue),
		(opacity: 0, color: red),
	;
	@include M-kf-animate(fadeInOut, $fadeInOut, 1s);
}
```````````````````````
```````````````````````CSS
/*CSS output*/
@-webkit-keyframes fadeInOut {
	0% { opacity: 0; color: red; }
	50% { opacity: 1; color: blue; }
	100% { opacity: 0; color: red; }
}
@keyframes fadeInOut {
	0% { opacity: 0; color: red; }
	50% { opacity: 1; color: blue; }
	100% { opacity: 0; color: red; }
}
.element {
	-webkit-animation: fadeInOut 1s infinite linear both;
	animation: fadeInOut 1s infinite linear both;
}
```````````````````````

If you want to maybe have a slow fade in while the background changes colors, you can do this:

`````````````SASS
//only animate the attributes you want to

.element {
	$fadeInOut:
		(background: red, opacity: 0),
		(background: blue),
		(background: green),
		(background: yellow),
		(background: orange),
		(background: grey),
		(background: black),
		(background: white, opacity: 1),
	;
	@include M-kf-animate(fadeInOut, $fadeInOut, 1s, 1);
}
```````````````````````

If you are wondering what that `1` at the end is, it's the number of loops the animation will play for. Most of the time you will want this to be either `1` or `infinite`, it defaults to infinite.

This is the order that the kf-animate attributes go in and their default settings:

`````````````SASS
@include M-kf-animate($name, $keyframes, $timing: 1s, $loops: infinite, $ease: linear, $fill: both)
```````````````````````

`$timing` is used for both duration and delay. Duration is always the first value and if you add a second value to the `$timing` variable it will be the delay.

If you are wondering what the `$fill` variable is, it's the `animation-fill-mode` property. If you're still confused, have a read of this excellent article: <a href="http://www.sitepoint.com/understanding-css-animation-fill-mode-property/" title="">Understanding the CSS animation-fill-mode Property</a>. You shouldn't need to worry about this setting too much though the default should work well in like 99% of circumstances.


Ok, now for another scenario. What if we want to apply the same effect to a range of different elements, possibly even with different timings? If we used the kf-animate mixin to do this, yes it would work but we'd also have a whole heap of duplicated css in our output file. What we really want to be able to do is state the keyframes once but refer back to it multiple times with different timings. This is when the `kf-definition` and `kf-predefined` mixins come in handy.

`````````````SASS
//define a set of keyframes and then refer back to it multiple times with different timings

.parent {
	&-child {
		$fadeInOut:
			(opacity: 0),
			(opacity: 1),
			(opacity: 0),
		;
		@include M-kf-definition(fadeInOut, $fadeInOut);
		&--anim1 {
			@include M-kf-predefined(fadeInOut, 1s);
		}
		&--anim2 {
			@include M-kf-predefined(fadeInOut, 2s);
		}
	}
}
```````````````````````
```````````````````````CSS
/*CSS output*/
@-webkit-keyframes fadeInOut {
	0% { opacity: 0; }
	50% { opacity: 1; }
	100% { opacity: 0; }
}
@keyframes fadeInOut {
	0% { opacity: 0; }
	50% { opacity: 1; }
	100% { opacity: 0; }
}
.parent__child--anim1 {
	-webkit-animation: fadeInOut 1s infinite linear both;
	animation: fadeInOut 1s infinite linear both;
}
.parent__child--anim2 {
	-webkit-animation: fadeInOut 2s infinite linear both;
	animation: fadeInOut 2s infinite linear both;
}
```````````````````````

The variables for `kf-definition` are simply the animation name, followed by the animation set. The variables for `kf-predefined` are the same as `kf-animate` except without the `$keyframes` variable.

--------------------

##Warning!

_*The notes below are out of date (and horribly formatted) but I want to put something up here to give an idea of what this thing can do. I'll update this later on to be more accurate (and prettier)._

--------------------


@include M-animate (time, attribute)
Add CSS animation to an element.

Stored in: _css3-shortening.scss
Usage:
@include M-animate;
Animate all values with a 0.5s animation time.

@include M-animate(0.7s);
Animate all values with a custom animation time

@include M-animate(0.7s, width);
Most of the time this isn't necessary but if you only want to animate one attribute and animating all attributes is causing problems for you, then you can define that one attribute in the second modifier slot.

@include M-mq (type, min-width, max-width) {content};
The easiest way to add media queries to a rule (one day I want to see if it's possible to merge all similar mq's together if they share the same values but at the moment it doesn't)

Stored in: media-queries.scss
Usage:
@include M-mq (max, $bp-mobile) { [content] }
This is the most common style you will be using. It will set a maximum browser width for the styles. Try to use one of the break point variables defined in the variables scss file as much as possible here but it will also accept pixel values.

@include M-mq (min, $bp-mobile) { [content] }
Same as above except it will set a minimum width for the styles. The mixin also adds +1 pixel to the value given in the second slot to avoid conflicts with max width mediaqueries.

@include M-mq (min-max, $bp-mobile, $bp-tablet) { [content] }
The least likely version you will use. It basically only applies styling within the given range.

@include M-centered(type);
This is the easiest way to vertically and/or horizontally centre align an element that has a fixed height and width. Extremely useful for icons and CSS triangles. What's extra cool is that it still centre aligns even if the containing box is smaller that the box you’re aligning :)

Stored in: _shortcuts.scss
Usage:
@include M-centered;
Centres an element that has a fixed height and width both horizontally and vertically

@include M-centred(v);
Only centre aligns the element vertically. This allows you to, for instance, right align an arrow 10px from the edge using right: 10px; while still retaining vertical centre alignment.

eg:

.parent {
   position: relative;

   .child {
       height: 20px:
       width: 20px;
       @include M-centered(v)
       right: 10px;
   }
}

@include M-centered(h);
Same as above except it only centres horizontally. This is useful for adding down arrow bits on tool tips when you want the arrow positioned top: 100% but horizontally centre aligned.

@include M-rotate(angle, origin);
This is the quickest and easiest way to rotate elements.

Usage:

@include M-rotate;
Rotates an element 90 degrees clockwise around the elements centre

@include M-rotate(45deg);
Most common way of rotating an element. It will rotate around the elements centre clockwise by the defined number of degrees.

@include M-rotate(45deg, bottom right);
Same as above except now it will rotate around the bottom right corner.
@include M-arrow(direction,colour,length, thickness, thickness2)
This is my CSS triangle mixin. If we had a triangle that was pointing up, Length would be the height of the triangle (the distance from the point of the triangle to the base of the triangle). Thickness would be half the width of the base of the triangle. Thickness2 is the other half of the base.
Direction accepts the values: up, down, left and right.

Stored in: _arrows.scss
Usage:

•	@include M-arrow(up, #000, 9px);
o	only  one pixel value given
o	creates an equilateral triangle (or at least really close to one)
o	Y = X * 0.75 (rounded to nearest pixel)
o	Z = Y
o	is equal to @include M-arrow(up, #e26c06, 9px, 7px, 7px );
•	@include M-arrow(up, #e26c06, 9px, 8px);
o	2 pixel values given
o	Not an equilateral triangle (or just giving you more control if not quite right)
o	The point of the triangle will always be equal distance from both corners
o	Z = Y
o	Is equivalent to @include M-arrow(up, #e26c06, 9px, 8px, 8px );

•	@include M-arrow(up, #e26c06, 9px, 8px, 5px);
o	3 pixel values given
o	Used when point of the triangle is not equal distance from both corners
o	X, Y, & Z all equal the values you give them

@include M-icon(icon, height, width, display, position){content}
Pretty simply, this gives quick and easy access to your icon-font icons. You don't put this mixin inside a :before or :after pseudo element. The mixin does that for you.

One thing to note is that this mixin doesn't work inside media queries. If you need to put an icon inside a media query, instead use: @include M-mq-icon(...){ [content] }; It does the same thing but it's self contained.

Stored in: _icons.scss
Usage:

@include M-icon($icon-icon_name, 20px){
   color: #000;
   ... (Any other styles)
};
This is how you are going to incorporate most icons. The pixel value given in slot 2 defines, the font-size, the height and the width of the box around the icon.
The default display for icons is inline-block and the default position is to use the :before psudo element.

@include M-icon($icon-icon_name, 20px, 10px){
   color: #000;
   ... (Any other styles)
};
The third slot can be used to adjust the width of the box around the icon. Use this if the width of the icon is significantly different to its height.

@include M-icon($icon-icon_name, 20px, $pos: after){
   color: #000;
   ... (Any other styles)
};
If you want the icon to appear in the :after pseudo element instead of the :before pseudo element, then set $pos to "after".

@include M-icon($icon-icon_name, 20px, $display: block){
   color: #000;
   ... (Any other styles)
};
If you don't want to have it display inline block, you can change it using the $display variable.

@include M-grad (colour1, colour2, type, stop1, stop2, backup);
I don't think this project uses gradients much but you might find this useful, particularly for difficult shadows.
view the _backgrounds.scss file in the mixins folder to see all available gradient types.
This mixin uses filter based gradients for IE8 so it will still appear there if it is either a vertical or horizontal gradient. The gradient will not appear in IE9 though. To get it to appear in IE9, you will need to also use @include M-ie-grad(…);

Stored in: _backgrounds.scss
Usage:
@include M-grad (#fff, #000);
Standard vertical gradient from top to bottom

@include M-grad (#fff, #000, h);
A gradient with a type modifier that makes it horizontal (colour goes left to right)

@include M-grad (#fff, #000, v, 25%, 85%);
A vertical gradient (that’s what the “v” is for) that incorporates colour stops.

@include M-grad (#fff, #000, $backup: #000);
A vertical gradient with a defined backup for browsers that don’t support gradients.
@include M-multi-grad(colour-array, type, backup)
This mixin has slightly less browser support than M-grad but it makes it easy to incorporate multi colour gradients. Don’t worry, it works in all modern browsers. It just doesn’t generate anything for IE8.

Stored in: backgrounds.scss
Usage:
$gradient:
   #000 0%,
   #ccc 50%,
   #fff 100%;

@include M-multi-grad($gradient, v)

Notice that the gradient is separate from the actual mixin. You could just put brackets around it but I think this method is cleaner.

The default type for the multi gradient is horizontal so a vertical multi-grad needs the type modifier.
@mixin M-ie-grad(colour1, colour2, type)
Creates a gradient for IE8 and 9 by using the filter method.
Defaults to a vertical gradient. Only accepts vertical or horizontal gradient types. I like using this to create a gradient back up for the multi-grad mixin.
(Warning: using a filter gradient in IE9 will prevent the element from displaying rounded corners)
Usage:
@include M-grad (#fff, #000, h);
Standard vertical gradient from left to right


Those are just my favourites. I have lots of other mixins that I use. Have a look through the mixins folder at all the mixins before starting so you know what tools you have at your disposal.


Columns
I have a system for dividing the page using column classes. Do not alter the base column styles.

•	.columns
o	This is an optional class you can add to the parent element of a series of columns. It basically adds clearfix as well as a couple other things

•	.column.halves
o	Makes the column take up half the width of the available area to fit 2 columns

•	.column.thirds
o	Splits the area into thirds to fit 3 columns

•	.column.thirds.colspan2
o	Creates one column that takes up 2 thirds of the available area

It follows this pattern for quarters, fiths and sixths. Check the Column styling section of the main scss file for all the available colspan classes.
How the two CSS Style Sheets Work

Whenever you save, two style sheets are compiled.

One is an IE8 and lower style sheet. The other is a modern browsers style sheet.

The style sheets will never interfere with each other. IE 8 will only load it's style sheet while modern browsers will only load the modern style sheet.

What this means is that IE won't have to load all the fancy (and often bloated) CSS3 stuff that it isn't even able to render while modern browsers don't have to bother loading any of the ugly IE hacks. It just helps keep the file sizes down a bit for both browsers instead of both having to read everything.

To make styles that are only for IE8 and lower, use this mixin:
@include M-lt-ie9 { [content] }

To make styles that are only to be read by modern browsers, use this mixin:
@include M-gt-ie8 { [content] }

Don't bother doing stuff like trying to only use the gradient mixin inside the gt-ie8 mixin. The mixins already handle that for you :)

In the /includes/header.php file, it uses the same technique as adding the IE classes to the html element to determine which css file to load.

style-lt-ie9.scss and style.scss are the files that set the variables that determine which file the css rules are sorted into.

_03-stitching-file.scss is the file that merges all the scss files together

_02-variables .scss holds all the global variables for the site including icon names, font names, break points, etc.

_01-MAIN-STYLES.scss is the file that holds all custom styling for the site. I don’t separate the main styles into modules like other people because I find that frustrating to maintain when trying to find the rule you’re looking for. The down side is that it makes the file REEEEAALLY long but I’d prefer that over having to worry about what file I’m looking in as well as the line number. This way, 99% of the time, the only thing I need to worry about is the line number.

Making the Icon-font

This project is using the icomoon app to generate the icon font. It's a rather slow way of doing it, so if you can find a way to get grunt to generate the icon font for us in a way THAT WORKS ON PC then that would be very helpful :)

There is a selection.json file here:
/assets/css/fonts/

Use that file to load up the current icons we are using in the icomoon app (use the big "import icons" button to do this)

The svg files for the icon font are stored here:
/assets/images/svg/icon-font/

When adding a new SVG icon to the icon font, these are the steps you take:

1.	Make sure the svg is icon-font ready before proceeding (only one flat layer, no stroke)

2.	Add the new svg to the .../svg/icon-font/ folder

3.	Import the svg into the icomoon app and add it to your selected icons

4.	Click "Font" and download the new font

5.	Replace the fonts found here with the new ones: /assets/css/fonts/

6.	Replace the selection.json file with the new one

7.	Open the variables.scss file

8.	Open the newly generated style.css file you downloaded

9.	Replace the bit in the variables file that looks the same as the bit in the styles.css file

10.	Add new variables for the new icons. Make sure to put $icon- at the front for consistency.

11.	Your done! The icon is now ready for use :)

It would be soooo much easier if we could get grunt to do it for us. All we would have to do is just drop the new svg file in the folder and BAM! icon is ready for use.

Javascript structure
Main files

My JS structure consists of a js-loader.js file, a main.js file, a set of plugins and a set of segments.

•	The js-loader file controls what js the page loads.

•	The main.js file holds the majority of the sites javascript.

•	The plugins are bits of code that extend javascript functionality and should never need to be edited (like .equalHeights() )

•	The segments are for large sections of code that are only needed for specific circumstances (like the code that controls a rotator for example). Or you might just want to section off a large bit of code that is self contained.

Other Notable files
_new-window.js
This file opens documents and external links in new windows. It also integrates with Google Analytics so it can track when people download documents or click on external links. It does this all based off the <a> tag href attribute.
_media-queries.js
This file contains the js media queries for the site (there is an example media query in the file already). To avoid the browser having to process more than it has to on page resize, please place all similar js media query code under the one js media query. By that I mean anything that happens for the mobile js media query, place it under the one mobile media query instead of making a new one for everything you want to happen when the page hits mobile.

To help with moving elements around the page into different positions, I’ve made a “moveTo” plugin. There is an example of how to use it in the js media query example.
_scroll_functionality.js
Anything to do with scroll based animation (other than most Skrollr stuff) goes into this file. Skrollr animations are using a skrollr stylesheet (/assets/sass/ SKROLLR_ANIMATIONS.css) read this documentation on how they work https://github.com/Prinzhorn/skrollr-stylesheets
Sprites
With the rise of icon fonts since the death of IE7, I practically never use sprites any more unless I absolutely have to. I’ve written a guide on how my sprite set up works (“Guide on how to use the sprites.docx”) but I don’t think it’s worth reading for you.

Because of all the site animation and paralaxy background image movement, I’m thinking that it’s not worth spriting the background images. It would make the animation more difficult and time consuming and we don’t really have the time to spare. Although if we end up doing the backgrounds with :before elements then maybe it might be worth spriting them… not sure :-/

Remember, background images are an absolute last resort.
