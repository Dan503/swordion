
# The content folder and the loadContent() function

## BASIC USAGE

You call on content from these folders with the loadContent('filename.extension'); function. (eg. loadContent('intro.php');).

For php files it will include the contents of the specified file straight away (this can be overridden in the 3rd parameter, I'll get to that).

If you give it an ".img" extension (eg loadContent('intro.img');) then it will look for all of these file types before giving up: .jpg, .jpeg, .png, .svg, .gif.
By default, it will try to echo the image src path out to the page instantly.

For all other types of file, the function will just return with the file path from the root folder and not try to include it on the page.

### how the function operates

1. First it looks in the "0-pages" directory looking for a folder that matches the curent page location exactly. If found, it will then look for the specified file in that folder. if it exists, it will return with that file, else it will move to the next level of specificity

2. If nothing found in "0-pages", it will look in the "1-templates" folder. It is looking for a folder with the same name as what the curent page template is. If found it will look for the specified file name in that folder. If nothing found, it moves to the next level of specificity.

3. If nothing found in "0-pages" or "1-templates", it will look in "2-layouts". It is looking for a folder with the same name as what the curent page layout is. If found it will look for the specified file name in that folder. If nothing found, it moves to the next level of specificity.

4. If nothing found in "0-pages", "1-templates" or in "2-layouts", it will look in the "3-default" folder and look for the file name straight away. There should be one of every type of content in this folder so there is always some thing to default to.

## USING PATHS IN THE FIRST PARAMETER

For things like a accordions, it helps to be able to create a series of items in the content folder that all relate to the same area. In this case you create a series of numbered files under an "accordion" folder.

For this bit of code:

```````````php
<?php
for ($i = 0; $i < 5; $i++){
	loadContent('accordion/'.$i.'.php');
}
?>
``````````

If you wanted the content to appear in the "faqs" template, you could have a folder structure like this:

``````````
[root folder]
L content
  L 1-templates
    L faqs
      L accordion
	    L 0.php //first item (default for extra items)
	    L 1.php //second item
	    L 2.php //third item
  L 3-default
    L accordion
	  L 0.php (ensure that there is always a default to fall back on)
``````````

If there are more items than there is content in the folder, it will default to loading the "0" file. Ensure you always have a "0" file no matter how many items are actually needed

Using this for a gallary of images might be another good use case.

## THE SECOND PARAMETER

The second parameter is used to grab content that another page is using. This is extreamly useful for listings as you can retrieve the content used on the page the list item links to. It is specified using a location array. A location array is an array of either indexes or titles or any mixture of the 2. Indexes are always references to direct children of the previous item in the array where as titles will jump to the first matching title it comes by no matter how many children deep.

``````````````
loadContent('intro.php', ['news', 0]);
``````````````

That example above would look for a page in the nav map called "news" (not case sensitive) and then load the content related to the first subnav item instead of the content related to the current page. Note that this won't work if the page only has something in the layout folder. it will only work for content in the pages, templates and default folders.

The easiest way to retrive the content for a listing item would be by using "subnav" in the first array slot. this restricts the search to only sub items  (and sub sub items etc.) of the current page. Then apply the index to the second slot since the child items would most likely be in the navMap as subItems for this page:

```````````
//$i = index of the listing item
loadContent('intro.php', ['subnav', $i]);
``````````

## THE THIRD PARAMETER

``````````````
loadContent('intro.php', ['news', 0], 'return');
``````````````

The third parameter is used to force the loadContent() function to return only with the file path of the matching file instead of trying to include a php file into the page straight away. If you want the current page content to be returned in this way, parse "null" as the 2nd parameter like so:

``````````````
loadContent('intro.php', null, 'return');
``````````````