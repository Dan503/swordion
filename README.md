# Swordion
A feature rich website boilerplate starter kit that makes life easy for front end developers

These notes are going to be out of date but I want to put something up here to give an idea of what this thing does. I'll update this later on to be more accurate.

--------------------

Super useful SASS mixins guide

(All my mixins start with "M-" because my editor doesn't like ending keyboard shortcut code snippets with a space)

Read this section carefully! I don’t want to catch you styling something without the mixin if there is a mixin that can do it.

All SASS mixins are stored here:
/assets/sass/mixins/

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