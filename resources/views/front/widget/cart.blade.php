@php
    $total = 0;
@endphp

<div id="cart-drawer" class="block block-cart">
    <a href="javascript:void(0);" class="close-cart" data-dismiss="modal" aria-label="Close"><i
            class="anm anm-times-r"></i></a>
    <h4>{{ __('lang.cart_items') }} : {{ count($carts) }}</h4>
    @if (count($carts))
        <div class="minicart-content">
            <ul class="clearfix">
                @foreach ($carts as $key => $cart)
                    @php
                        if (Session::has('currency') && Session::get('currency') != 'AZN') {
                            Session::get('currency') == 'USD' ? $total += $cart['count'] * round($cart['price'] / 1.7, 1) : $total += $cart['count'] * round($cart['price'] / 1.73, 1);
                        } else {
                            $total += $cart['count'] * $cart['price'];
                        }
                    @endphp
                    <li class="item clearfix">
                        <a class="product-image" href="#">
                            <img src="{{ asset('uploads/products/' . $cart['image']) }}"
                                 style="height: 100px; object-fit:cover;" alt="" title="">
                        </a>
                        <div class="product-details">
                            <a href="/remove-from-cart/{{ $key }}" class="remove"><i class="anm anm-times-sql"
                                                                                     aria-hidden="true"></i></a>
                            <a class="product-title" href="">{{ $cart['name'] }}</a>
                            <div class="wrapQtyBtn">
                                <div class="qtyField">
                                    <a class="qtyBtn minus" data-id="{{ $key }}" href="javascript:void(0);"><i
                                            class="anm anm-minus-r" aria-hidden="true"></i></a>
                                    <input type="text" name="quantity" value="{{ $cart['count'] }}" class="qty">
                                    <a class="qtyBtn plus" data-id="{{ $key }}" href="javascript:void(0);"><i
                                            class="anm anm-plus-r" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="priceRow">
                                <div class="product-price">
                                    @if (Session::has('currency') && Session::get('currency') != 'AZN')
                                        <span class="money">{{ Session::get('currency') == 'EUR' ? 'Є' : '$' }}
                                            <span>{{ Session::get('currency') == 'USD' ? round($cart['price'] / 1.7, 1) : round($cart['price'] / 1.73, 1) }}</span>
                                        </span>
                                    @else
                                        <span class="money">₼
                                            <span>{{ $cart['price'] }}</span></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="minicart-bottom">
            {{-- <div class="subtotal list">
            <span>Shipping:</span>
            <span class="product-price">$10.00</span>
        </div> --}}
            <div class="subtotal">
                <span>{{ __('lang.total') }}:</span>
                <span
                    class="product-price">{{ Session('currency') == 'AZN' ? '₼' : (Session('currency') == 'EUR' ? 'Є' : '$') }}
                    <span class="cart-total">{{ $total }}</span>
                </span>
            </div>

        </div>
    @else

        <h3 class="text-center">{{ __('lang.no_product_cart') }}</h3>
    @endif
</div>

<script src="{{ asset('/front/js/vendor/jquery-min.js') }}"></script>
<script>
    $('.product-details .remove').on('click', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        fetch(url)
            .then(res => res.text())
            .then(data => {
                $('.modal-content').html(data);
                $('.site-cart-count').text($('.item.clearfix').length);
                toastr["success"]("Məhsul səbətdən silindi")

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            });
    });

    function qnt_incre() {
        $(".qtyBtn").on("click", function() {
            let qtyField = $(this).parent(".qtyField");
            let oldValue = $(qtyField).find(".qty").val();
            let newVal = 1;

            if ($(this).is(".plus")) {
                newVal = parseInt(oldValue) + 1;
            } else if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            }
            $(qtyField).find(".qty").val(newVal);
        });
    }
    qnt_incre();
    // update-cart
    $('.qtyBtn.minus').on('click', function(e) {
        e.stopPropagation();
        let count = $(this).siblings('[name="quantity"]').val();
        let url = `/update-cart/${$(this).data('id')}?count=${count}`;
        if (count >= 1) {
            fetch(url)
                .then(res => res.text())
                .then(data => {
                    $('.modal-content').html(data);
                });
        }
    });

    $('.qtyBtn.plus').on('click', function(e) {
        e.stopPropagation();
        let count = $(this).siblings('[name="quantity"]').val();
        let url = `/update-cart/${$(this).data('id')}?count=${count}`;
        fetch(url)
            .then(res => res.text())
            .then(data => {
                $('.modal-content').html(data);
            });
    });
</script>
