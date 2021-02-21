@extends('layouts.app')
<script type="text/javascript" src="//code.jquery.com/jquery-3.5.0.min.js"></script>
@section('content')
<form method="POST" action="{{route('Item.store')}}" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="tops">
  <div class="top">
    <div class="left">
      <div class="file-label">
        <label for="price">
          表
        </label>
        <label for="price">
          裏
        </label>
      </div>
      <div class="file-two">
        @for ($i = 0; $i < 2; $i++)
          <input type="file" name="img[{{$i}}]" id="myfile{{$i}}">
          <!-- <input type="file" name="img[]" id="myfile2"> -->
          <input type="hidden" name="nums[{{$i}}]">
        @endfor
      </div>
      <div class="preview">
        <img id="img0" style="width:290px;height:290px;" />
        <img id="img1" style="width:290px;height:290px;" />
      </div>
    </div>
    <div class="rights">
      <div class="right">
        <label for="item_name" class="lable-item_name">
            商品名
        </label>
        <input
            id="item_name"
            name="item_name"
            class="item_name {{ $errors->has('item_name') ? 'is-invalid' : '' }}"
            value="{{ old('item_name') }}"
            type="text"
        >
        <label for="price" class="lable-price">
            金額
        </label>
        <input
            id="item_price"
            name="item_price"
            class="item_price {{ $errors->has('item_price') ? 'is-invalid' : '' }}"
            value="{{ old('item_price') }}"
            type="text"
        >
        <a href="#" class="buy-button">購入</a>
      </div>
    </div>
  </div>
  <label for="delivery" class="lable-delivery">
      配達
  </label>
  <select name="delivery" class="delivery">
      <option value="あり">あり</option>
      <option value="なし">なし</option>
  </select>
  <label for="quantity" class="lable-quantity">
      配達
  </label>
  <select name="quantity" class="quantity">
      <option value="あり">あり</option>
      <option value="なし">なし</option>
  </select>
  <div class="bottom">
    <label for="price">
        商品説明
    </label>
    <textarea
        id="detail"
        name="detail"
        class="detail"
        rows="4"
    >{{ old('detail[]') }}</textarea>
  </div>
</div>
<div class="mt-5">
  <a class="btn btn-secondary" href="/">
      キャンセル
  </a>

  <button type="submit" class="btn btn-primary">
      登録する
  </button>
</div>
</form>
<div id="graydisplay"></div>
@endsection