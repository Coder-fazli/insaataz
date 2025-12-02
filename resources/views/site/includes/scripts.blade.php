<script>
    {{--var urls={--}}
    {{--    'addToCart':{{route('addToCart')}}--}}
    {{--}--}}

</script>
{{--<!-- Plugins JS File -->--}}
<script src="/webcoder/assets/js/jquery.min.js"></script>

<script src="/webcoder/assets/js/bootstrap.bundle.min.js"></script>
<script src="/webcoder/assets/js/optional/isotope.pkgd.min.js"></script>
<script src="/webcoder/assets/js/plugins.min.js"></script>
<script src="/webcoder/assets/js/jquery.appear.min.js"></script>
<!-- Main JS File -->
<script src="/webcoder/assets/js/main.min.js?v=121"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function message(type, message) {
        Swal.fire({
            icon: type,
            title: '',
            text: message,
        })
    }
</script>

<script>
    let urls = {
        'addTOCart': "{{route('addToCart')}}",
        'updateCart': "{{route('updateCart')}}",
        'removeCart': "{{route('removeCart')}}",
        'getProducts': "{{route('getProducts')}}",
    }
</script>





@if($errors->any())
    <script>
        message("error", "{{$errors->all()[0]}}")
    </script>
@endif
@if(session('type'))
    <script>
        $(function () {
            message("{{session('type')}}", "{{session('message')}}")
        })
    </script>
@endif



<script>

    $(function () {
        reloadTouchSpin()
    })


    $(document).on('change', ".horizontal-quantity.touchInput", function () {
        let _that = $(this);
        let max = parseInt(_that.attr('max'));
        let val = parseInt(_that.val());
        if (val > max) {
            _that.val(max);
            return 0;
        }

    });


    let _timeout;
    $(document).on('change', ".horizontal-quantity.cartInput", function () {
        let _that = $(this);
        let max = parseInt(_that.attr('max'));
        let val = parseInt(_that.val());
        let _productId = _that.data('id')
        let _rowId = _that.data('row')

        let _cartBox = $('#cartBox')
        if (val > max) {
            _that.val(max);
            return 0;
        }

        if (_timeout) {
            clearTimeout(_timeout)
        }
        _timeout = setTimeout(function () {
            $.ajax({
                type: 'post',
                url: urls.updateCart,
                dataType: 'json',
                data: {
                    id: _productId,
                    qty: val,
                    row: _rowId
                },
                beforeSend: function () {
                    loadingSwal()
                },
                success: function (response) {
                    if (response.success) {
                        closeLoading()
                        _cartBox.html(response.cartBox)
                        reloadCartModalData(response.cartModal, response.count)

                        reloadTouchSpin()
                    } else {
                        message('error', response.message)
                    }
                },
                error: function (errors) {

                }
            });
        }, 1000)
    });

    $(document).on('click', ".btnRemove", function () {
        let _that = $(this);
        let _rowId = _that.data('row')
        let _cartCountBox = $('.cart-count')
        let _cartBox = $('#cartBox')


        if (_timeout) {
            clearTimeout(_timeout)
        }
        _timeout = setTimeout(function () {
            $.ajax({
                type: 'post',
                url: urls.removeCart,
                dataType: 'json',
                data: {
                    row: _rowId
                },
                beforeSend: function () {
                    loadingSwal()
                },
                success: function (response) {
                    if (response.success) {
                        closeLoading()
                        // message('success', response.message)
                        _cartBox.html(response.cartBox)
                        reloadCartModalData(response.cartModal, response.count)
                        try {
                            _that.parent().parent().remove()
                        } catch (e) {

                        }
                        reloadTouchSpin()
                        if (response.count == 0) {
                            _cartBox.hide()
                        }
                    } else {
                        message('error', response.message)
                    }
                },
                error: function (errors) {

                }
            });
        }, 1000)
    });




    $(document).on('click', ".btnAddToCart", function (e) {
        // $('.btnAddToCart').on('click', function (e) {
        e.preventDefault();
        let _that = $(this);
        let _productId = _that.data('id')
        let _qty = 1;
        try {
            _qty = _that.parent().find('.horizontal-quantity').val()
        } catch (e) {
            _qty = 1
        }
        $.ajax({
            type: 'post',
            url: urls.addTOCart,
            dataType: 'json',
            data: {
                id: _productId,
                qty: _qty,
            },
            beforeSend: function () {
                loadingSwal()
            },
            success: function (response) {
                if (response.success) {
                    closeLoading()
                    message('success', response.message)
                    reloadCartModalData(response.cartModal, response.count)
                    try {
                        $('.view-cart').removeClass('d-none');
                    } catch (e) {
                    }
                } else {
                    message('error', response.message)
                }
            },
            error: function (errors) {

            }
        });
    })


    function reloadCartModalData(cartModal, totalCount) {
        let _cartModalBox = $('.cart-box')
        _cartModalBox.html(cartModal)

        let _cartCountBox = $('.cart-count')
        _cartCountBox.html(totalCount)


        if (totalCount == 0) {
            if (!_cartCountBox.hasClass('d-none')) {
                _cartCountBox.addClass('d-none')
            }
        } else {
            if (_cartCountBox.hasClass('d-none')) {
                _cartCountBox.removeClass('d-none')
            }
        }
    }
    function reloadTouchSpin() {

        $(".horizontal-quantity").TouchSpin({
            verticalbuttons: !1,
            buttonup_txt: "",
            buttondown_txt: "",
            buttondown_class: "btn btn-outline btn-down-icon",
            buttonup_class: "btn btn-outline btn-up-icon",
            initval: 1,
            min: 1,

        });
    }

    function loadingSwal() {
        Swal.fire({
            title: 'Loading',
            html: '',
            timer: 1000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
            },
        })
    }

    function closeLoading() {
        Swal.close()
    }



</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>



