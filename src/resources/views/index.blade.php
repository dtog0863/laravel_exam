@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="contact__content">
    <div class="section__title">
        <h2>Contact</h2>
    </div>
    <form action="/confirm" method="post">
        @csrf
        <table class="confirm__table">
            <tr>
                <th class="confirm__table-header">お名前<span style="color:rgb(220,80,80)">※</span></th>
                <td> <div><input type="text" class="confirm__table-last_name" name="last_name" placeholder="例:山田" value="{{old('first_name')}}"></div></td>
                <td> <div><input type="text" class="confirm__table-first_name" name="first_name" placeholder="例:太郎" value="{{old('last_name')}}"></div></td>
            </tr>
            <tr>
                <div class="form__error">
                    @if($errors->has('first_name') ||$errors->has('last_name'))
                    <th></th>
                    <td>{{$errors->first('first_name')}}</td>
                    <td>{{$errors->first('last_name')}}</td>
                    @endif
                </div>
            </tr>
            <tr>
                <th class="confirm__table-header">性別<span style="color:rgb(220,80,80)">※</span></th>
                <td><input id="man" type="radio" class="confirm__table-radio" name="gender" value="1" checked>
                    <label for="man">男性</label>
                </td>
                <td><input id="woman" type="radio" class="confirm__table-radio" name="gender" value="2">
                    <label for="woman">女性</label>
                </td>
                <td><input id="other" type="radio" class="confirm__table-radio" name="gender" value="3">
                    <label for="other">その他</label>
                </td>
            </tr>
            <tr>
                <div class="form__error">
                    @error('gender')
                    <th></th>
                    <td>{{$errors->first('gender')}}</td>
                    @enderror
                </div>
            </tr>
            <tr>
                <th class="confirm__table-header">メールアドレス<span style="color:rgb(220,80,80)">※</span></th>
                <td><input type="email" name="email" placeholder="例:test@example.com" value="{{old('email')}}"></td>
            </tr>
            <tr>
                <div class="form__error">
                    @error('email')
                    <th></th>
                    <td colspan=3>{{$errors->first('email')}}</td>
                    @enderror
                </div>
            </tr>
            <tr>
                <th class="confirm__table-header">電話番号<span style="color:rgb(220,80,80)">※</span></th>
                    <td><input type="tel" name="tel1" placeholder="080" value="{{old('tel1')}}"></td>
                    <td><input type="tel" name="tel2" placeholder="1234" value="{{old('tel2')}}"></td>
                    <td><input type="tel" name="tel3" placeholder="5678" value="{{old('tel3')}}"></td>
                    <!-- tellの文字入力機能は後ほど実装する -->
            </tr>
            <tr>
                <div class="form__error">
                    <th></th>
                     @if($errors->has('tel1') ||$errors->has('tel2') ||$errors->has('tel3'))
                        <td>{{ $errors->first('tel1') }} </td>
                        <td>{{ $errors->first('tel2') }}</td>
                        <td>{{ $errors->first('tel3') }}</td>
                       <!-- 理想はどれかにエラーがあれば一括してエラーを表示したい（２列分を表示） -->
                    @endif
                </div>
            </tr>
            <tr>
                <th class="confirm__table-header">住所<span style="color:rgb(220,80,80)">※</span></th>
                <td colspan="3"><input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}"></td>
            </tr>
            <tr>
                <div class="form__error">
                   @error('address')
                    <th></th>
                    <td colspan=3>{{$errors->first('address')}}</td>
                    @enderror
                </div>
            </tr>
            <tr>
                <th class="confirm__table-header">建物名</th>
                <td colspan="3"><input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{old('building')}}"></td>
            </tr>
            <tr>
                <th class="confirm__table-header">お問い合わせの種類<span style="color:rgb(220,80,80)">※</span></th>
                <td colspan="3">
                    <select name="category_id">
                        <option value="" style="color:rgb(135, 113, 113)" disabled {{ session('selected_category') ? '' : 'selected' }}>
                            選択してください
                        </option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}" {{ old('category_id', session('selected_category')) == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                        @foreach($categories as $category)
                             <input type="hidden" name="category_content_{{$category['id']}}" value="{{$category['content']}}">
                        @endforeach
                </td>
            </tr>
            <tr>
                <div class="form__error">
                   @error('category_id')
                    <th></th>
                    <td colspan=3>{{$errors->first('category_id')}}</td>
                    @enderror
                </div>
            </tr>
            <tr>
                <th class="confirm__table-header">お問い合わせ内容<span style="color:rgb(220,80,80)">※</span></th>
                <td colspan="3"><textarea name="detail" id="" cols="50" rows="3" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea></td>
            </tr>
            <tr>
                <div class="form__error">
                    <th></th>
                    <td colspan=3>
                    @if($errors->has('detail'))
                        {{ $errors->first('detail') }}
                    @endif
                    </td>
                </div>
            </tr>
        </table>
        <div class="confirm__submit">
            <input type="submit" name="" value="確認画面">
        </div>
    </form>
</div>
@endsection