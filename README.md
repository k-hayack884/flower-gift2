![logo](https://user-images.githubusercontent.com/85856269/155497267-ae42c747-4a14-4e7c-bd85-b0f0d4d64bef.png) 

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## flower-gift  
### URL:
https://flower-gift.herokuapp.com/
### プレビュー  

![demo](https://user-images.githubusercontent.com/85856269/155496576-4d659f10-1e73-43ba-95c3-866d912f829b.png)

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
- 違反商品、違反コメントを凍結し、ユーザーへ非表示にする機能
- 管理者側でサービスでのコミュニケーションを潤滑に行わせるためのパトロール機能

### 使用技術:
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

#### なぜその技術を使ったか  
- Vue.jsはユーザーが気軽に使いたいお気に入り登録やレビュー機能を画面遷移なしで快適にするために、 Ajax を利用して実装した。React という選択肢もあったが Laravel breezeのコンポーネントと使用感覚が近く、導入やメンテナンスが容易になるため Vue.js を選んだ。　
- TailwindCSS はユーティリティファーストのフレームワークだったので CSS をスクラッチで書くくらいの表現力を少ない記述量かつ自由に書けるため。ほかのフレームワークも検討したが Bootstrap やVuetify などはコンポーネントファーストだっため除外した。  
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
email barianbooks@gmail.com  
password sirokitate  
<br>
管理者側  
email barianshark@gmail.com  
password mazikkukonbo  

画像を登録したい場合、AWSのs3を利用する必要があります。  
AWSのs3でバケットを作成した後、envに  
AWS_ACCESS_KEY_ID=AWSのアクセスキー  
AWS_SECRET_ACCESS_KEY=AWSのシークレットアクセスキー  
AWS_DEFAULT_REGION=AWSのリージョン  
AWS_BUCKET=s3のバケット名  
AWS_URL=https://s3-(リージョン).amazonaws.com/（バケット名）/  
を追記してください

## データベース構成

![flower-gift-er](https://user-images.githubusercontent.com/85856269/155475282-e1024968-bf43-4233-b9cb-f9208f691350.png)

## ユーザに使ってもらって見つかった課題
- フッターがあればいい  
製作者のお問い合わせのリンク貼って、問合せしやすくする。  
  部分的に個人情報をやり取りするので、プライバシーポリシーを作成する必要がある。 
  サービスが大型化した場合、広告や別の自サービスに誘導したい。
 
- 取引メールを送った後に商品を取引終了すれば、ユーザーの手間が省けるのではないか。  
現状ではユーザーが手動で、取引終了に設定する必要があるため、取引終了の商品が検索に引っかかる可能性がある。  
あるいは、取引終了に設定するまでに、別の取引希望が入ってくる可能性もある。
トラブルの原因にもなりかねないので、修正の必要がある。  
近いうちに改善予定  

## 今後追加したい機能
- javascriptを利用した画像のプレビュー機能  
ユーザーが自分が登録しようとしている画像をサービス上でどのように表示されているか確認するため。  
また、画像を誤ってしまった場合、公開する前に出品を取り消すことができるから。  
- 一つの商品に対して複数の画像を追加する機能  
開花している花の状態と、枯れ始めている現在の状態の両方を載せておくことにより、取引後の商品の状態の相違によるトラブルを防ぐため。
- googleアカウントから新規登録、ログインする機能  
新規登録やログイン登録の手間を省き、気軽に利用できるようにするため
- 取引履歴をデータベースに保存して表示する機能  
取引後のトラブルに対して迅速に対応できるため  
近いうちに改善予定
## ライセンス
Copyright (c) [2022] [k-hayack884]
