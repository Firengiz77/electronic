@foreach ($wishlists as $wishlist )
<tr>
    <td class="shoping__cart__item">
        <img src="{{  (!empty($wishlist['thumbnail'])? url('uploads/products/'.$wishlist['thumbnail']):asset('/admin/assets/img/avatars/1.png')  )}}" alt="">
    </td>
    <td class="shoping__cart__price">
        {!! json_decode($wishlist['name'])->{app()->getLocale()} !!} 
    </td>
    <td class="shoping__cart__quantity">
        <div class="quantity">
      {{ $wishlist['price'] }}
        </div>
    </td>
    <td class="shoping__cart__total">
     
    </td>
    <td class="shoping__cart__total">
     
    </td>
    <td class="shoping__cart__item__close">
     <a  onclick="removeWishlist({{$wishlist['id']}})">    <span class="icon_close"></span> </a>
    </td>
</tr>
@endforeach