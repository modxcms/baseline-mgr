baseline-mgr
============


> Written by [Wayne Roddy](wayne@modx.com). June 19, 2014


###Cloud & Compass Setup

1. Create a new MODX 2.3 project in MODX Cloud. 
2. Note the name of the internal Cloud URL where you would like to work on a Manager theme. It will look like **cNNNN.paas1.tx.modxcloud.com** where **NNNN** is actually a 4-digit number. _Note: "paas1" might be "paas2", and "tx" might be "ams"._ 
3. Open a ticket from the MODX Cloud Dashboard, by clicking the Green “Help” button, substituting the real location from step 2 above for "cNNNN.paas1.tx.modxcloud.com".  
  - For the question: Sassify Me
  - Details:  I'm ready to create a new Manager theme, and need Sass installed in cNNNN.paas1.tx.modxcloud.com
4. Wait for your Ticket Reply confirming your Cloud is ready.

---

###Theme Folder Setup

Even before you've received a confirmation that your project is ready to use Sass, you can get prepare to start working on your theme. Follow these steps to get your theme set up.

1. SSH into your site using the credentials from your Dashboard. Change **cNNNN** to your cloud number
  ```ssh cNNNN@paas1.tx.modxcloud.com```
  - Say Yes to continue connecting (if prompted)
  - Enter the cloud SSH password
2. Go to the Manager templates folder and set up your new theme. For example to create a theme named **mytheme** enter the following command to create an empty `mytheme/` directory inside your `manager/templates/` directory:
  ```mkdir www/manager/templates/mytheme```
3. Clone the [baseline Manager theme repo](https://github.com/modxcms/baseline-mgr) into a new `baseline` directory inside your `manager/` directory. The baseline repo contains 3 versions for starting points on custom Manager themes.
  - **baseline**—a clone of the MODX default theme
  - **baseline-full-tree**—a version of the MODX default theme, but with a full-height left bar for the tree menus
  - **baseline-full-tree-dark**—a dark version of full tree, inspired by [Sterc's original Manager redesign mockup](http://f.cl.ly/items/1P2Y3I2t3X1r3G1Y0l2D/modx-23-2II.png)
  ```
  cd www/manager
  git clone git://github.com/modxcms/baseline-mgr.git baseline
  ```
4. Duplicate the your chosen starting point into your `mytheme` directory. For example, to start from the dark full tree version: 
  ```cp -r baseline/baseline-full-tree-dark mytheme```


---

###Set your Compass

Once you've received confirmation that you Sass is functioning in your project, you can now use Compass to automatically compile the chnages into new CSS files anytime your Sass files are updated.

1. Create your compass setup:
   
  ```
  cd mytheme
  compass create --bare --sass-dir "sass" --css-dir "css" --images-dir "images"
  ```
2. Make sure you get "Congratulations"
3. Type `compass watch`
4. You should see it compile SASS and create **index.css** with the notification:
  `Compass is polling for changes. Press Ctrl-C to Stop.`
5. Compass will now update your theme's CSS files anytime you save a change to the Sass files.

---

###Working with Existing Projects

Chances are, you'll be working on your theme over a few sessions. If you've already installed everything, ssh into your project using the instructions above, then enter the following commands:
```
cd www/manager/templates/mytheme
compass watch
```

---

###See Your New Theme in Action

1. Login to the Manager for your theming project
2. Go to System Settings
3. "Filter by Area" -> Back-end Manager
4. Scroll Down to "Manager Theme" and choose your theme from the select list options

---

###Installing Your Theme in Other Projects

To copy your theme into another project, you simply download the `manager/templates/mytheme/` directory, and upload it to the new istallation. Then follow the steps in the previous section to change to the new theme.
