# WP estate agency

Create a theme having as subject a real estate agency

For this theme, I use the [Azenta](https://colorlib.com/wp/template/azenta/) template available on the [colorlib](https://colorlib.com/) site.



## Requirements

* PHP >= 7.1
* Composer - [Install](https://getcomposer.org/download/)
* Nodejs - [Install](https://nodejs.org/en/download/)
* Yarn - [Install](https://yarnpkg.com/en/docs/install)



## Install all the dependencies :
```sh
$ cd web/app/themes/estateagency/ressources
$ yarn install
$ composer install
```



## Generate the assets for static files

Set the proxyTarget property in web/app/themes/estateagency/ressources/compiler/config.js:
```js
module.exports = {
    ...
    proxyTarget: 'http://localhost:8000/',
    ...
}
```

Go to resources folder
```sh
$ cd web/app/themes/estateagency/ressources
```

Production mode :
```sh
$ yarn run build
```

Dev mode :
```sh
$ yarn run start
```