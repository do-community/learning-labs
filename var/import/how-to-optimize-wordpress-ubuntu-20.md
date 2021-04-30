### Introduction

Optimizing Wordpress installations gives the clients and individuals who use your sites the performance, speed, and flexibility they’ve come to expect with WordPress. Whether you’re managing a personal site or a suite of installations for various clients, taking the time to optimize your WordPress installations increases efficiency and performance.

In this tutorial, you’ll explore how to optimize WordPress installations in a way that’s built for scale, including guidance on configuration, speed, and overall performance.


## Prerequisites

This is a **conceptual article** sharing different ways to approach optimization of a WordPress installation on Ubuntu 20.04. While this tutorial references the use of a managed solution via our [WordPress 1-Click App](https://marketplace.digitalocean.com/apps/wordpress), there are many different starting points, including:

- A [hosted solution](https://wordpress.org/hosting/) providing WordPress on Ubuntu 20.04
- [Manual installation](https://www.digitalocean.com/community/tutorials/how-to-install-wordpress-on-ubuntu-20-04-with-a-lamp-stack) on a Droplet
- A [1-Click App](https://marketplace.digitalocean.com/apps/wordpress) solution providing WordPress on Ubuntu 20.04

Whichever you choose, this tutorial will start with the assumption that you have or are prepared to install a fully-working WordPress installation configured with an administrative user on Ubuntu 20.04.


## Step 1 — Consider Your Installation

During the installation and creation of your WordPress installation there are a few variables to take into account, including the location of your potential users, the scope of your WordPress site or suite of sites, and the maintenance and security preferences set that allow your site to be continually optimized. Taking the time to dive into each thoughtfully before building out your site will save time and benefit your WordPress installation as it grows.

### Considering Your Site’s Potential

The first step in optimizing your WordPress site is to have a deep understanding of how you intend to use and grow your site. Will it be one site, or a network of sites? Is your site a static or dynamic website? Answering these questions before setting up your installation can inform some of your initial decisions regarding hosting, storage size, and performance.

For example, if you’d like to build a personal blog, [caching and optimizing images and visual content is important to consider.](https://www.digitalocean.com/community/tutorials/web-caching-basics-terminology-http-headers-and-caching-strategies) If you intend to create a community or ecommerce site with concurrent visitors and frequently changing data, [considerations for server resources should be made.](https://www.digitalocean.com/community/tutorials/how-to-set-up-a-remote-database-to-optimize-site-performance-with-mysql-on-ubuntu-18-04) Being thoughtful about your intention for your WordPress installation from the start will guide the usefulness of security and performance tweaks made to your site, and lend to an overall more efficient installation.

### Optimizing Installation Preferences

There are a few preferences that are important to consider while installing WordPress that can reduce latency and increase performance on your site.

#### Hosting and Included Software

First, select a hosting provider that provides the latest [WordPress](https://www.digitalocean.com/community/tags/wordpress), [Apache](https://www.digitalocean.com/community/tutorials/what-is-apache), [MySQL](https://www.digitalocean.com/community/tags/mysql), and [PHP](https://www.digitalocean.com/community/tags/php) software with firewall and SSL certificate capabilities. A reliable and modern hosting provider will give you the best start for your `LAMP` stack installation. With shared hosting, be aware of server usage and customers per server to ensure the best performance for your site. Choosing the right hosting provider for your needs will help you prevent downtime and performance errors.


#### Location and Latency

Be aware of the location of your servers or datacenters when starting a new WordPress installation, and choose the location that best suits the need of your site and general location of your visitors and users. Latency, the time it takes for data to be transmitted between your site and users, fluctuates based on location. The Wordpress documentation on [site analytic tools](https://wordpress.com/support/stats/) explains how to track visitor location data, as well as the number of visits to your site. Having an idea from the start about where your visitors are from can help determine where to host your site and provide them with a faster browsing experience.


## Step 2 — Consider Your Theme

There are a wide range of available themes that can be used or customized for WordPress. Many themes can be configured with user-friendly drag and drop interfaces, integrated with custom plugins and more. When setting up your WordPress site, it’s a good idea to initially consider **only** the essential features that you’ll use for the lifecycle of your site, adding more as you grow.

### Optimizing Theme Configuration

Starting with a lightweight theme can help your installation to load more efficiently. A theme will require fewer database calls and by keeping your site free of unnecessary code, your users will have fewer delays in site speed and performance.

For any theme selected, be sure to **turn off or disable** any features offered with the theme that you won’t need or use. These can be preferences offered in the **Appearance** section of the WordPress dashboard, typically under *Theme Editor* or *Customize*. Turning off features you don’t use reduces the number of requests and calls happening to query for data in the background.

While there are a number of free and paid options for WordPress themes available online, many use [page builders](https://wordpress.org/plugins/wp-pagebuilder/) that add excess shortcode and unused code that will affect the performance of your site. Consider your use case when deciding whether or not to use a page builder, as they typically include a lot of extra processes that will have an impact on your site’s speed.

### Considering Plugin Use

WordPress plugins offer extended functionality for WordPress installations through added code that allows users to customize their installations to suit their specific needs. There are over 56,000 currently available plugins, making them an appealing way to add additional features to a WordPress site.

While plugins can increase the efficiency of your site, care should be taken in selecting quality plugins that are maintained and updated regularly. Because many plugins not only add code to your site but entries to your WordPress installation’s database, using too many plugins may cause site speed issues over time.



## Step 3 — Optimize for Security and Performance

Once you have installed all of the plugins, widgets, and additional features you’d like to add to your WordPress installation, there are a few more optimization options to try within the WordPress dashboard that could positively impact your site’s speed and performance.

### Tweaking WordPress Settings

First, be sure to change your site’s login address. Because most WordPress administrative login pages end in `/wp-admin`, this page is often prone to attacks. There are a [number of tools available](https://wordpress.org/plugins/change-wp-admin-login/) that enable you to change your login URL — be sure to select the one that works best for your use case.

Next, consider the **Site Health** tool, located in the **Tools** section of your WordPress dashboard:

![picture of WordPress Site Health page](https://assets.digitalocean.com/articles/installWP/sitehealth.jpg)

Consider the results shown, and follow the instructions found in each dropdown on the **Status** tab to improve security or performance as mentioned within the tabs.

Using the built-in configuration offered in the WordPress dashboard ensures that you’ve covered all of the readily available configuration tweaks for your installation.

### Caching for Site Speed

Caching can also help improve your WordPress site’s performance and speed. [Caching](https://www.digitalocean.com/community/tutorials/web-caching-basics-terminology-http-headers-and-caching-strategies), a core design feature of the HTTP protocol meant to minimize network traffic while improving the perceived responsiveness of the system as a whole, can be used to help minimize load times when implemented on your site. WordPress offers a number of [caching plugins](https://wordpress.org/plugins/wp-super-cache/) that are helpful in maintaining a *snapshot* of your site to serve static HTML elements, reducing the amount of PHP calls and improving page load speed.


## Conclusion

In this tutorial you explored a number of different techniques that you can use to make your WordPress installation on Ubuntu 20.04 faster and more efficient. Following the suggestions in this tutorial will help ensure that your site’s performance isn’t an issue as you grow in users and content on your site.

To learn more about some of the security practices and WordPress optimization tips that are mentioned in this guide, visit our tutorial, [“How To Configure Secure Updates and Installations in WordPress on Ubuntu 20.04”](https://www.digitalocean.com/community/tutorials/how-to-configure-secure-updates-and-installations-in-wordpress-on-ubuntu-20-04).