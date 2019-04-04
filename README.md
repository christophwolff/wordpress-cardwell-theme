# br-wordpress-boilerplate-theme

## Install using yarn or npm (Testet with Node v8.9.1)

`yarn`
or
`npm install`

## NPM Scripts

### Build Dev Version

Set `WP_DEBUG` in `wp-config.php` to `true`

`yarn run dev`
or
`npm run dev`

### Development with Browsersync

Set `WP_DEBUG` in `wp-config.php` to `true`

Create `proxyconfig.json`

Set your eviroment vars
i.E.
```
{
  "target": "https://br-boilerplate.dev",
}
```

`yarn run watch`
or
`npm run watch`

### Build a production version

Set `WP_DEBUG` in `wp-config.php` to `false` if you would like to check the Theme with production files

`yarn run prod`
or
`npm run prod`

### Release
Build a production version and then push the chaned dist folder to the master.

## Whats in the box

- [Swiper Slider](http://idangero.us/swiper/#.WJejT7aLRZ0)
- [Turbolinks](https://github.com/turbolinks/turbolinks)
- [Custom Modernizr](https://modernizr.com/download/)
- [Plyr](https://github.com/Selz/plyr)

### Turbolinks Details

[Turbolinks Events](https://github.com/turbolinks/turbolinks#full-list-of-events)

Load JS with
```
document.addEventListener("turbolinks:load", function() {
  //The JS here
})
```
