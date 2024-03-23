@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="section__title">
        <h2>Confirm</h2>
    </div>
<!-- <?php print_r($item) ?> -->
    <div class="confirm__heading">
        <h2>お問い合わせ内容確認</h2>
    </div>
    <form action="/thanks" method="post">
        @csrf
        <div class="confirm__table">
            <table>
                <tr>
                    <th>お名前</th>
                    <td>
                        {{ $item['last_name'] . ' ' . $item['first_name'] }}
                        <input type="hidden" name="last_name" value="{{$item['last_name']}}">
                        <input type="hidden" name="first_name" value="{{$item['first_name']}}">
                    </td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        @if($item['gender'] == 1)
                        男性
                        @elseif($item['gender'] == 2)
                        女性
                        @elseif($item['gender'] == 3)
                        その他
                        @endif
                        <input type="hidden" name="gender" value="{{$item['gender']}}">
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        {{$item['email']}}
                        <input type="hidden" name="email" value="{{$item['email']}}">
                    </td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{$item['tel1']}}{{$item['tel2']}}{{$item['tel3']}}
                        <input type="hidden" name="tell" value="{{$tell}}">
                    </td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{$item['address']}}
                        <input type="hidden" name="address" value="{{$item['address']}}">
                    </td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{$item['building']}}
                        <input type="hidden" name="building" value="{{$item['building']}}">
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{$categoryContent}}
                        <input type="hidden" name="category_id" value="{{$category_id}}">
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{$item['detail']}}
                        <input type="hidden" name="detail" value="{{$item['detail']}}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="confirm__box">
            <button type="submit">送信</button>
        </div>
        <div class="confirm__modify">
            <button type="submit" name="back" value="back">戻る</button>
        </div>
    </form>
</div>
@endsection