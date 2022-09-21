    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('front.index')}}"><img src="{{asset('/front/img/logo.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: {{ $contact->address }}</li>
                            <li>Phone: {{ $contact->phone }}</li>
                            <li>Email: {{ $contact->email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            @if($contact->fb_link !== null)
                            <a href="{{ $contact->fb_link }}"><i class="fa fa-facebook"></i></a>
                            @endif
                            @if($contact->insta_link !== null)
                            <a href="{{ $contact->insta_link }}"><i class="fa fa-instagram"></i></a>
                            @endif
                            @if($contact->wp_link !== null)
                            <a href="{{ $contact->wp_link }}"><i class="fa fa-whatsapp"></i></a>
                            @endif
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('/front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/front/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('/front/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/front/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('/front/js/mixitup.min.js')}}"></script>
    <script src="{{asset('/front/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/front/js/main.js')}}"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('/front/js/fetch.js') }}" > </script>




    <script>
   
        // Get the modal
        var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById(`#myBtn_${id}`);

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
// btn.onclick = function () {
  modal.style.display = "block";
// }

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
        

        </script>



<script>

    function addIttocart(id) {

        let size        = $('#sizes-cart .active').attr('id');
        let color       = $('#color').val();
        let quantity    = $('#quantity').val();
        let lang = window.location.href.split('/')[3];

      //      if(quantity > stock_count){
      //      $('#quantity').css("border", "2px solid red");
      //         if(lang == 'az'){
      //          toastr.warning('Mehsul Sayi duzgun deyil');
      //      }else if(lang == 'ru'){
      //          toastr.warning('Mehsul Sayi duzgun deyil');
      //      }else if(lang == 'en'){
      //          toastr.warning('Mehsul Sayi duzgun deyil')
      //      }
       //           }

        if (size == undefined) {
            $('#sizes-cart li').css("border", "2px solid red");
            if(lang == 'az'){
                toastr.warning('Ölçü seçimi etmədiniz');
            }else if(lang == 'ru'){
                toastr.warning('Пожалуйста выберите размер');
            }else if(lang == 'en'){
                toastr.warning('Please,select a size')
            }
        }else{
            $.get("/"+ lang +"/check-is-exists/" + id + '?size=' + size + '?quantity=' + quantity,
            {
                id: id,
                size: size,
                quantity: quantity
            },
            function (response) {
                if(response == 1){
                    $.get("/"+ lang +"/add-to-cart/" + id + '?size=' + size + '?quantity=' + quantity,
                    {
                        id: id,
                        size: size,
                        quantity: quantity
                    },
                    function (data, status) {
                        $('#cartHolder').html(data.html);
                       // $('#count_cart').html(data.count);
                        if(lang == 'az'){
                            toastr.success('Məhsul səbətə əlavə edildi');
                        }else if(lang == 'ru'){
                            toastr.success('Продукт был добавлен в корзину');
                        }else if(lang == 'en'){
                            toastr.success('Product added to the cart')
                        }
                        refreshCounts();
                    });
                }else{
                    if(lang == 'az'){
                        toastr.warning('Stokda yetərli qədər məhsul yoxdur');
                    }else if(lang == 'ru'){
                        toastr.warning('Недостаточно продуктов на складе');
                    }else if(lang == 'en'){
                        toastr.warning('There are not enough products in stock')
                    }
                    $('.doesnt_exists').css('display','block');
                    let size_id ;
                    if(size == 'small'){
                        size_id = 1;
                    }else if(size == 'medium'){
                        size_id = 2;
                    }else if(size == 'large'){
                        size_id = 3;
                    }else if(size == 'xlarge'){
                        size_id = 4;
                    }else if(size == 'xxlarge'){
                        size_id = 5;
                    }else if(size == 'xxxlarge'){
                        size_id = 6;
                    }
                    $('#size_id').val(size_id);
                }
            });
        }
    }

    // function add(getid){
    // $.post("/add-to-cart/"+getid+"/size",
    // {
    //   id: getid,

    // },
    // function(data,status){

    //     $('#cartHolder').html(data);
    // //   console.log(data);
    //   toastr.success('Məhsul səbətə atıldı')
    //     refreshCounts();

    // });

    // }
    function addtowishlist(getid) {
        let lang = window.location.href.split('/')[3];
        $.get("/add_to_wishlist/" + getid,
            {
                id: getid,
            },
            function (data, status) {
                $('#count234').html(data.count);
                alertify.set('notifier','position', 'bottom-right');
                alertify.notify(data.message,'custom', 2);
            });
    }

    // function addCompare(getid) {
    //     let lang = window.location.href.split('/')[3];
    //     console.log(lang);
    //     $.get("/"+ lang + "/add-to-compare/" + getid,
    //         {
    //             id: getid,
    //         },
    //         function (data, status) {
    //             if(lang == 'az'){
    //                 toastr.success('Müqayisə siyahısına göndərildi');
    //             }else if(lang == 'ru'){
    //                 toastr.success('Добавлено для сравнения');
    //             }else if(lang == 'en'){
    //                 toastr.success('Added to compare')
    //             }
    //             refreshCounts();
    //         });
    // }

    // function removeWishlist(getid) {
    //     let lang = window.location.href.split('/')[3];
    //     $.get("/remove_to_wishlist",
    //         {
    //             id: getid,
    //         },
    //         function (data, status) {
    //            console.log('silindi wishlistden');
    //         });
    // }

    function removeWishlist(getid) {
        let lang = window.location.href.split('/')[3];
        $.get("/remove_to_wishlist",
            {
                id: getid,
            },
            function (data, status) {
                $('#wishlist12').html(data.html);
                $('#count234').html(data.count);
                alertify.set('notifier','position', 'bottom-right');
                alertify.notify('Sevimlilerden Silindi','custom', 2);
            });

    }

    // function removeCompare(getid) {
    //     let lang = window.location.href.split('/')[3];

    //     $.get('/' + lang + "/remove-from-compare/" + getid,
    //         function (data, status) {
    //             console.log(data);
    //             refreshCounts();
    //             location.reload(true);
    //         });
    // }

    // $('#remove').click(function () {

        // $.post("/remove-from-cart/",
        // {
        //   id: $(this).attr("data-id"),
        // },
        // function(data,status){
        //     $('#cartContains').html(data);
        //     refreshCounts();
        //     refreshPrice();
        //     toastr.error('Məhsul səbətdən çıxarıldı')

        // });
    // });


    // function refreshCounts() {
    //     $.post("/gettotals",
    //         {
    //             id: "",
    //         },
    //         function (data, status) {
    //             $('#countCartItems').html(data.cart);
    //             $('#countWishlistItems').html(data.wishlist);
    //             $('#totalprice').html(data.price + " AZN");
    //         });
    // }

    // function refreshPrice(){
    //     $.post("/totalprice",
    // {
    //   id: "",
    // },
    // function(data,status){
    //
    // });
    // }
</script>

</body>

</html>