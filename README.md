# Upload-File

This package can be used to Upload and delete files

### Installation

#### Require Package

Require package in your composer.json:
```
  "repositories": {
    "mintellity/upload-file": {
      "url": "https://github.com/mintellity/upload-file.git",
      "type": "git"
    }
  },
```


#### Package installation 
```
composer require "mintellity/upload-file"
```

```
php artisan vendor:publish --tag=upload-file-components
```


### How to use it


#### Make sure Media Library is installed and ready to use.

#### bind the upload-file-component to your specific component.

```
<x-UploadFileComponent :object="$object" />
```
