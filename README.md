# Hyde
A php template system based on Jekyll

## ABOUT
This project was inspired by the RubyGem Jekyll.  It works similarly to Jekyll in that it uses front-matter and has a similar file structure.

## HOW TO USE
To setup a Hyde project, place the Hyde source in your root project folder.

### TO ADD PAGES
To add pages to your project, open index.php and add the following:
```php
$app->addPage('/path', 'name');
```
Where /path is the URL request path (after domain) and the name of the page file (exluding extension).

Then in the _pages folder create a php file for the page.  At the top of the page include the following:
```php
<?php
$layout = 'default';
$title = 'home'
?>
```

Layout is the layout file to apply to this page and title is the page title (will show on the browser tab).

### TO ADD LAYOUTS
To add a layout simply create a php file in the _layouts folder with the HTML structure for the layout.

### INCLUDES
To use includes create a php file in the _includes folder and include it in your layouts/pages using
```php
getInclude($name);
```

## PLANS
This is just the start of this project.  I plan to add the following features:
- A way to create blog posts
- A GUI for managing content