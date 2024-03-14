@extends('Site.layout.layout')

@section('body')
       <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form class="price" method="POST" id="filterForm">
                        @csrf
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input price" value="allprice" checked id="price_all"  name="price_all">
                            <label class="custom-control-label" for="price_all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input price" value="0_100" id="0_100" name="price_1">
                            <label class="custom-control-label" for="0_100">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input price" value="1000_2000" id="1000_2000" name="price_range[]">
                            <label class="custom-control-label" for="1000_2000">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input price" value="200_300" id="200_300" name="price_range[]">
                            <label class="custom-control-label" for="200_300">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input price" value="300_400" id="300_400" name="price_range[]">
                            <label class="custom-control-label" for="300_400">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input price" value="400_500" id="400_500" name="price_range[]">
                            <label class="custom-control-label" for="400_500">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                        {{-- <button class="form control"  type="submit" >submit</button> --}}
                    </form>
                </div>
                <!-- Price End -->

                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by color</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" value="allcolor" checked id="color_all">
                            <label class="custom-control-label color" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input color" id="color-1" value="black" name="color_1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input color" id="color-2" value="white" name="color_2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input color" id="color-3" value="red" name="color_3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input color" id="color-4" value="blue" name="color_4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input color" id="color-5" value="green" name="color_5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by size</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input size" checked id="size-all" >
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input size" id="size-1" value="xs">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input size" id="size-2" value="s">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input size" id="size-3" value="m">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input size" value="l" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input size" value="xl" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->





            <div class="col-lg-9 col-md-8">
                <div id="posts" class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->






        </div>
    </div>
    <!-- Shop End -->
    



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.price, .color, .size, .cat').change(function() {
            // Collect checked checkbox values for price
            var checkedValuesPrice = $('.price:checked').map(function() {
                return $(this).val() !== "on" ? $(this).val() : null;
            }).get();
            
            // Collect checked checkbox values for color
            var checkedValuesColor = $('.color:checked').map(function() {
                return $(this).val() !== "on" ? $(this).val() : null;
            }).get();

            // Collect checked checkbox values for size
            var checkedValuesSize = $('.size:checked').map(function() {
                return $(this).val() !== "on" ? $(this).val() : null;
            }).get();
            // Send AJAX request
            $.ajax({
                url: '{{ url("/Products_ajax_price") }}',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    checkedValuesPrice: checkedValuesPrice,
                    checkedValuesColor: checkedValuesColor,
                    checkedValuesSize: checkedValuesSize,
                    // checkedValuesCat: checkedValuesCat
                },
                success: function(response) {
                    console.log(response);
                    displayPosts(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
        // $('.cat').click(function(event) {
        //     event.preventDefault(); // Prevent the default action of the anchor tag
        
        //     // Collect checked checkbox values for price
        //     var checkedValuesPrice = $('.price:checked').map(function() {
        //         return $(this).val() !== "on" ? $(this).val() : null;
        //     }).get();
            
        //     // Collect checked checkbox values for color
        //     var checkedValuesColor = $('.color:checked').map(function() {
        //         return $(this).val() !== "on" ? $(this).val() : null;
        //     }).get();

        //     // Collect checked checkbox values for size
        //     var checkedValuesSize = $('.size:checked').map(function() {
        //         return $(this).val() !== "on" ? $(this).val() : null;
        //     }).get();
            
        //     // Collect checked checkbox values for cat
        //     // var checkedValuesCat = $('.cat').map(function() {
        //     //     return $(this).attr('href');
        //     // }).get();
            
        //     // Collect the category value from the clicked category link
        //     // var checkedValuesCat = $(this).data('cat');
        //     // console.log('Clicked category:', cat);
        //     var checkedValuesCat = $(this).data('category');
        //     console.log('Clicked category:', checkedValuesPrice);
        //     console.log('Clicked category:', checkedValuesColor);
        //     console.log('Clicked category:', checkedValuesSize);
        //     console.log('Clicked category:', checkedValuesCat);
        
        //     // Perform any further action with the collected values, such as sending them via AJAX
        //     $.ajax({
        //         url: '{{ url("/Products_ajax_price") }}',
        //         type: 'POST',
        //         data: {
        //             _token: $('meta[name="csrf-token"]').attr('content'),
        //             checkedValuesPrice: checkedValuesPrice,
        //             checkedValuesColor: checkedValuesColor,
        //             checkedValuesSize: checkedValuesSize,
        //             checkedValuesCat: checkedValuesCat
        //         },
        //         success: function(response) {
        //             console.log(response);
        //             displayPosts(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error:', error);
        //         }
        //     });    
        // });

    });

    function displayPosts(posts) {
        $('#posts').empty();
        // alert(data);
        $.each(posts, function (index, post) {
            $('#posts').append('<div class="col-lg-4 col-md-6 col-sm-6 pb-1"><div class="product-item bg-light mb-4"><div class="product-img position-relative overflow-hidden"><img class="img-fluid w-100" src="'+post.image+'" alt=""><div class="product-action"><a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a><a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a><a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a><a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a></div></div><div class="text-center py-4"><a class="h6 text-decoration-none text-truncate" href="">'+post.name+'</a><div class="d-flex align-items-center justify-content-center mt-2"><h5>'+post.discount_price+'</h5><h6 class="text-muted ml-2"><del>$'+post.price+'</del></h6></div><div class="d-flex align-items-center justify-content-center mb-1"><small class="fa fa-star text-primary mr-1"></small><small class="fa fa-star text-primary mr-1"></small><small class="fa fa-star text-primary mr-1"></small><small class="far fa-star text-primary mr-1"></small><small class="far fa-star text-primary mr-1"></small><small>('+post.quantity+')</small></div></div></div></div>');
        });
        
}

</script>
 
 


@endsection



