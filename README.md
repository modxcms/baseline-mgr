baseline-mgr
============

#Sass in the MODX 2.3 Manager & MODX Cloud


> Written by [Wayne Roddy](wayne@modx.com) and [Ryan Thrash](ryan@modx.com). July 7, 2014

## Overview

The MODX Manager theme is straightforward to customize and change to suit your preferences. Drastic alterations for branding are relatively quick, because the Manager has been rebuilt in 2.3 and above using Sass for its styling. This readme file provides an overview of the files that make up a Manager theme, and the files you need to adjust in order to create a custom MODX Manager theme. 

In order to work with Manager themes, you typically have to clone the project from the MODX Github repository and to be able to have Ruby and Node.js running for the dependencies. However, there is an alternate way to work on Manager themes without having to install additional dependencies on your server or in your local dev machine by using MODX Cloud, as outlined below. 

---

###Manager Theme Files
Manager Themes can be highly customized, replacing every file in the Default theme, or you can just use a few styles and make selective overrides. You can even change the way the Manager works by including custome ExtJS files, but that is beyond the scope of this introductory overview. Manager themes are located in the `manager/templates/` directory, and the MODX Manager automatically scans the `manager/templates/` directory and lists any directories located there in the Manager Theme System Setting. 

A custom Manager theme will usually contains the following directories:

* `sass/` – the baseline Sass files used to build the custom styling
* `css/` – where `index.css` and `login.css` stylesheets are generated
* `images/` – a copy of all images needed for the theme
* `js/` (optional) – overrides for the overall layout of the MODX Manager, for instance to use a full-height tree menu, instead of it being nested underneath the top navigation. (see below)

There are many other directories located in the `default` manager theme, most of them being the layout templates, ending in `.tpl`. You can create custom .tpl files should you wish, but it's not needed most of the time.

###The `sass` Directory

The Sass files are probably the most imortant files when it comes to creating a custom theme. For example, a clients might want branded colors and their logo in their Manager. This is where those changes would get made. The main Sass files you'll modify are as follows:

* `index.scss` – the styles for the MODX Manager after logging in. This includes the majority of the _xxx.scss files inside.
* `login.scss` – the styles for the MODX Manager login
* `_colors-and-vars.scss` – probably the first starting point for your MODX Manager theming work. This is where all your baseline colors, font sets and other baseline styles are set that are used throughout the other Sass files.

The additional Sass files that you may also wish to work with include:

* `_buttons.scss` – the button styles used throughout the Manager 
* `_forms.scss` – the styles that control how forms appear
* `_help.scss` – the styles for the MODX help page inside the Manager
* `_navbar.scss` – the styles for the top navigation
* `_tabs.scss` – the styles for tabs, both horizontal and vertical
* `_tree.scss` – the styles for the trees
* `_uberbar.scss` – the styling for the überbar search and keyboard navigation tool
* `_xtheme-modx.scss` – a custom version of the default ExtJS 3.x styles (in which we'd love your assistance in performing additional cleanup and purging of unused styles)

In addition, there are a few mixin and helper/utility Sass files:

* `_box-sizing.scss` – a simple box sizing mixin helper file
* `_image-set.scss` – a mixin used to create multiple background images
* `_utility.scss` – mixins that don't output directly, but that can be used as helpers for things like image replacement, Font Awesome calls, hiding things visually, etc., via Sass extends functions.


##Manager Theming with Sass in MODX Cloud

By adjusting a few variables, you can make significant changes in how it looks. While the steps that follow may seem intimidating, they're actually quite simple and fast to do. In fact, getting ready to create a custom MODX Manager theme consists of just four steps:

1. Get Sass running in your MODX Cloud instance
2. Bootstrap the starting point for your Custom Theme and pick a name for your theme
3. Start `compass watch` to compile your Sass changes into new CSS files
4. Selecting your new theme in the System Settings and making changes to the Sass files

That's all it takes before you can start seeing your Sass changes in a live MODX Manager just by hitting `⌘R` or `⇧F5` to see your changes in near real time.  

---

###1. Request Sass in your MODX Cloud Account

1. Create a new MODX 2.3 project in MODX Cloud. 
2. Note the name of the internal Cloud URL where you would like to work on a Manager theme. It will look like **cNNNN.paas1.tx.modxcloud.com** where **NNNN** is actually a 4-digit number. _Note: "paas1" might be "paas2", and "tx" might be "ams"._ 
3. Open a ticket from the MODX Cloud Dashboard, by clicking the Green “Help” button, substituting the real location from step 2 above for "cNNNN.paas1.tx.modxcloud.com".  
  - For the question: Sassify Me
  - Details:  I'm ready to create a new Manager theme, and need Sass installed in cNNNN.paas1.tx.modxcloud.com
4. Wait for your Ticket Reply confirming your Cloud is ready.

---

###2. Bootstrapping Manager Themes

Use the following steps once your site is ready for Sass, to bootstrap your theme. 

1. SSH into your site using the credentials from your Dashboard. Change **cNNNN** to your cloud number
   
  ```
  ssh cNNNN@paas1.tx.modxcloud.com
  ```
  - Say Yes to continue connecting (if prompted)
  - Enter the cloud SSH password
2. Clone the [baseline Manager theme repo](https://github.com/modxcms/baseline-mgr) into a new `baseline` directory inside your `manager/` directory. The baseline repo contains 3 versions for starting points on custom Manager themes.
  - **baseline**—a clone of the MODX default theme
  - **baseline-full-tree**—a version of the MODX default theme, but with a full-height left bar for the tree menus
  - **baseline-full-tree-dark**—a dark version of full tree, inspired by [Sterc's original Manager redesign mockup](http://f.cl.ly/items/1P2Y3I2t3X1r3G1Y0l2D/modx-23-2II.png)
   
  ```
  cd www/manager
  git clone git://github.com/modxcms/baseline-mgr.git baseline
  ```
3. Duplicate your chosen starting point into a new theme name directory of your choosing. For example, to create a theme based on the dark full height leftbar called **mytheme** you would use a `mytheme` directory: 
   
  ```
  cp -r baseline/baseline-full-tree-dark templates/mytheme
  ```
4. Install Bourbon into the Sass folder; you can also optionally install Neat in the same way, too:
  
  ```
  cd templates/mytheme/sass
  bourbon intstall
  ```

---

###3. Set Your Compass

You can now use Compass to automatically compile the chnages into new CSS files anytime the Sass files are updated.

1. Set up Compass:
   
  ```
  cd templates/mytheme
  compass create --bare --sass-dir "sass" --css-dir "css" --images-dir "images"
  ```
2. Make sure you get "Congratulations"
3. Type `compass watch`
4. You should see it compile Sass and create **index.css** with the notification:
  `Compass is polling for changes. Press Ctrl-C to Stop.`
5. Compass will now update your theme's CSS files anytime you save a change to the Sass files.

---

###4. See Your New Theme in Action

1. Login to the Manager for your theming project
2. Go to System Settings
3. "Filter by Area" -> Back-end Manager
4. Scroll Down to "Manager Theme" and choose your theme from the select list options

---

###Making Changes to the Sass Files

If you want to purely use MODX for editing your Manager Sass files, we'd suggest installing the  [Ace MODX Extra](http://modx.com/extras/package/ace), the same editor used by Github and self-proclaimed high performance code editor for the web. Find out more information about [how to work with Ace at its website](http://ace.c9.io/#nav=about), but definitely try it out. It even provides helpful hints about things that you might consider changing next to lin numbers, and a lot more.

1. Install Ace like you would other Extras, using the Package Manager
2. Move to the Files tab in the Manager Tree panel
3. Navigate to the `manager/templates/mytheme/sass` directory
4. Click the files you wish to load to make changes
5. Edit the files using syntax-highlighted editing, optionally clicking the upper-right expand icons for a full-window editing experience.
6. To save changes to the files, get out of fullscreen mode if you're in it and simply press the save button in the Manager. As long as you have not closed your terminal session that started `compass watch` it should see the changes and compile new login.css and/or index.css files for you.

You can also use tools like Transmit to mount your `www/manager/templates/mytheme/sass/` directory to your desktop to use your favorite text editor, or other FTP programs to edit the file remotely.

###Returning to Existing Manage Theme Projects in Progress

Chances are, you'll work on your theme over a few sessions. If you've already installed everything, ssh into your project using the instructions above, then enter the following commands:

```
cd www/manager/templates/mytheme
compass watch
```

---

###Installing Your Theme in Other Projects

To use your theme on another MODX instance, you download the `manager/templates/mytheme/` directory, and upload it to the new installation, inside its `manager/templates/` directory. Then follow the steps above in _See Your New Theme in Action_  to change the System Settings to use your custom theme. Please note that your final Manager theme should go through a proper build process, which involves some additional dependencies to properly optimize the theme for distribution, but that is outside the scope of this document.

