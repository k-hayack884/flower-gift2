<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## flower-gift  
### URL:
https://flower-gift.herokuapp.com/
### 概要：  
不要になった花を処分したい人と、その花を必要とする人をつなぐためのサイトです。  
レスポンシブ対応をしているため、スマートフォンからもご利用できます。  
### 制作の背景：  
私は処分される花を少しでも減らしたい思いから、このサービスを製作しました。  
お祝い事で各地から贈られることが多い胡蝶蘭ですが、花が終わったあとを考えたことがあるでしょうか。  
胡蝶蘭は多年草で、来年以降も花を咲かせるにもかかわらず、咲き終わった胡蝶蘭の大半は処分されます。  
一方で、胡蝶蘭を育ててみたい人がいるにもかかわらず、値段が高いため、安易に購入することができません。  
そして、胡蝶蘭以外の花に目を向けると、年間で１０億本以上の花が処分されています。  
私はこのサービスを通して、1本でも多くの花を救いたいです。  
### 機能:  
##### ユーザー側
 - 商品を出品する機能
 - 住所から取引場所の地図を表示する機能(Google MAP API)
 - 商品をカテゴリーごと、または用語を入力して検索する機能
 - 商品をお気に入り登録し、自分だけのお気に入りを表示する機能(axios)
 - ユーザーをレビューする機能(axios)
 - ページング機能
 - 画像登録、リサイズ機能(AWS:s3,InterventionImage)
 - 自動メール送信機能(sendgrid)
 - 違反商品、コメントを報告する機能

##### 管理者側
- ユーザーを編集、削除する機能
- 退会ユーザーを保存、完全削除する機能
- 違反商品、違反コメントを集積する機能
 -違反商品、違反コメントを凍結し、ユーザーへ非表示にする機能

### 仕様技術:
- PHP 8.1.2 
- Laravel Framework 8.83.1
- mysql 5.6.50
- tailwindcss 3.0.0
- vue.js 3.2.29
- axios 0.21
- alpinejs 3.4.2
- AWS(S3)
- xampp 3.3.0
- Google MAP API

## 利用方法
git clone https://github.com/k-hayack884/flower-gift2.git  
composer install
composer update
npm install
npm run dev

seederおよびfactoryがありますので、ダミーデータが必要な場合はコメントアウトを解除して、  
php artisan migrate::refresh  --seed  
を入力してください。   

php artisan key:generate   
と入力してキーを生成後、  
php artisan serve  
で簡易サーバーを立ち上げ、表示確認してください。
<br>
テストアカウント    
ユーザー側  
email barian@books  
password sirokitate  
<br>
管理者側  
email barian@shark  
password mazikkukonbo  

登録した画像を表示させたい場合AWSのs3を利用する必要があります。  
AWSのs3でバケットを作成した後、envに
AWS_ACCESS_KEY_ID=AWSのアクセスキー
AWS_SECRET_ACCESS_KEY=AWSのシークレットアクセスキー
AWS_DEFAULT_REGION=AWSのリージョン
AWS_BUCKET=s3のバケット名
AWS_URL=https://s3-(リージョン).amazonaws.com/（バケット名）/  
を追記してください


## データベース構成








Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**
- **[Romega Software](https://romegasoftware.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
