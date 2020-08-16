# WP estate agency

Create a theme having as subject a real estate agency

For this theme, I use the [Azenta](https://colorlib.com/wp/template/azenta/) template available on the [colorlib](https://colorlib.com/) site.
Some images are available on [Unsplash](https://unsplash.com/) by :
* [deborah cortelazzi](https://unsplash.com/@deborah_cortelazzi?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText)
* [Jarek Ceborski](https://unsplash.com/@jarson?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText)
* [Aw Creative](https://unsplash.com/@awcreativeut?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText)
* [Grillot edouard](https://unsplash.com/@edouard_grillot?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText)
* [JOHN TOWNER](https://unsplash.com/@heytowner?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText)
* [Leonardo Burgos ](https://unsplash.com/@leoburgos85?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText)




## Requirements

* PHP >= 7.1
* Composer - [Install](https://getcomposer.org/download/)
* Nodejs - [Install](https://nodejs.org/en/download/)
* Yarn - [Install](https://yarnpkg.com/en/docs/install)
* wp-cli (optional) - [install](https://wp-cli.org/#installing)



## In this theme : 

* ES6 for JavaScript
* SASS
* Webpack for managing, compiling and optimizing theme's asset files
* Bedrock. WordPress boilerplate with modern development tools, easier configuration, and an improved folder structure
* symfony/var-dumper & filp/whoops for debug



## Install all the dependencies :
```sh
$ cd web/app/themes/estateagency/
$ yarn install
$ composer install
```



## Generate the assets for static files

Go to resources folder
```sh
$ cd web/app/themes/estateagency/
```

Production mode :
```sh
$ yarn build
```

Production mode with the assets minified :
```sh
$ yarn build:production
```

Dev mode :
```sh
$ yarn start
```