{{ $user->name}}様
<h1>取引の希望をしました</h1>
出品者からの発送を今しばらくお待ちください

<h1>注文情報</h1>

 <p>商品名:{{ $product->name}}</p>
 <p>出品者:{{ $product->user->name}}</p>
 <p>商品説明:{{ $product->comment}}</p>
<p>注文日時:<?php echo date( "Y/m/d" ) ;?></p>

<h1>入力情報</h1>
<p>名前:{{ $request->name }}</p>
<p>送り先:{{ $request->address }}</p>
<p>メッセージ:{{ $request->message }}</p>

<h1>取引後のお願い</h1>
<p>取引ユーザーを評価してください</p>
http://127.0.0.1:8000/profiles/show/{{ $product->user->id }}

<p> このメールはシステムにより自動送信されています。返信されても出品者との連絡はできません。</p>
またのご利用をお待ちしております。
今後ともよろしくお願いいたします。