# Blog.hu MediaDownloader
Blog.hu media downloader script Wordpress vagy egyéb rendszerbe való importáláshoz

A script segítségével könnyedén exportálhatjuk a Blog.hu blogunkról a media állományokat. A script command line-ból futtatható.
__
# Használat

A scriptet másoljuk abba a mappába, ahova a képeket letölteni szeretnénk.
WordPress esetén pl. `wp-content/uploads/` majd adjuk ki a következő parancsot:

`cd wp-content/uploads/`   
`php mediaDownloader.php`

A script automatikusan letölti a képeket, ha duplikációt talál akkor az adott képet átugorja. A letöltés folyamatát a command line-ban követhetjük, hiba esetén megjelenik a hiba oka `$e->getMessage()` és megáll a script futása.
