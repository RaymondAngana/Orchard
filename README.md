# Orchard


PHP: 8.1.23

DB: MYsql 8.0.16

CMS: Wordpress 6.5.3

## Task 1 Config:
```
var imagea = "<?php echo get_template_directory_uri() . '/images/imagea.png'; ?>";
var imageb = "<?php echo get_template_directory_uri() . '/images/imageb.png'; ?>";
var menu_config = {
	'#menu-item-8952': imagea,
	'#menu-item-8953': imageb
}
var text_config = {
	'root a': imagea,
	'root b': imageb
}
var mode = 'text'; // If you want to compare based on text, change value to "text"
```
**mode**: (text|menu). Let's you choose between image-based comparison or text-based. 
If value is set to "menu", it will look for the ID of the menu item - so this needs to be configured within the code.
If value is set to "text", it will simply look for the key text in the code above, "root a" and "root b".

**imagea** and **imageb** are variables configurable for the image background of submenu a/b

