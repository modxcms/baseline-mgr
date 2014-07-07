baseline-mgr
============

##Getting Started with Sass for the MODX Manager in MODX Cloud


> Written by [Wayne Roddy](wayne@modx.com). June 19, 2014

### Overview

The MODX Manager theme is straightforward to customize and change to suit your preferences. Even drastic alterations are relatively quick, because the Manager has been rebuilt in 2.3 and above using Sass for its styling. By adjusting a few variables, you can make significant changes in how it looks. While the steps that follow may seem intimidating, they're actually quite simple and fast to do. In fact, getting ready to create a custom MODX Manager theme consists of just four steps:

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

If you want to purely use MODX for editing your Manager Sass files, we'd suggest installing the  (Ace MODX Extra)[http://modx.com/extras/package/ace], the same editor used by Github. Install it like you would other Extras, using the Package Manager.

###Returning to Existing Manage Theme Projects in Progress

Chances are, you'll work on your theme over a few sessions. If you've already installed everything, ssh into your project using the instructions above, then enter the following commands:

```
cd www/manager/templates/mytheme
compass watch
```

---

###Installing Your Theme in Other Projects

To use your theme on another MODX instance, you download the `manager/templates/mytheme/` directory, and upload it to the new installation, inside its `manager/templates/` directory. Then follow the steps above in _See Your New Theme in Action_  to change the System Settings to use your custom theme. This works because the MODX Manager automatically scans the `manager/templates/` directory for themes. 

