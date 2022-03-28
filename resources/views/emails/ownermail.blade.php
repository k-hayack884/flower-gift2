{{ $product->user->name }}様
<h1>相手から取引のリクエストがありました</h1>
<p>希望相手の送付先へ商品を発送してください</p>

<h1>注文情報</h1>

<p>商品名:{{ $product->name }}</p>
<p>商品説明:{{ $product->comment }}</p>
<p>注文日時:<?php echo date('Y/m/d'); ?></p>

<h1>送り先情報</h1>
<p>名前:{{ $request->name }}</p>
<p>送り先:{{ $request->address }}</p>
<p>メッセージ:{{ $request->message }}</p>

<h1>取引後のお願い</h1>
<p>取引ユーザーを評価してください</p>
{{ env('APP_URL') }}/profiles/show/{{ $user->id }}
<p>商品状態を取引終了にしてください</p>

<p> このメールはシステムにより自動送信されています。返信されても出品者との連絡はできません。</p>
またのご利用をお待ちしております。
今後ともflower-giftをよろしくお願いいたします。
