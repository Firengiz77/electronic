$(".btn-addto-cart").on("click", function (a) {
        a.preventDefault();
        console.log('clicked');
        let b = $(this).attr("href");
        fetch(b)
            .then((a) => a.text())
            .then((a) => {
                0 == a
                    ? (toastr.warning("Stokda yet\u0259rli q\u0259d\u0259r m\u0259hsul yoxdur"),
                        (toastr.options = {
                            closeButton: !1,
                            debug: !1,
                            newestOnTop: !1,
                            progressBar: !1,
                            positionClass: "toast-top-right",
                            preventDuplicates: !1,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            timeOut: "2000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                        }))
                    : ($(".modal-content").html(a), $(".site-cart-count").text($(".item.clearfix").length), $(".btn-minicart").trigger("click"));
            });
    });
