<?php
	include 'header.php';
?>


        <div class="container-wrapper">
            <div class="page-bg" style=" background-image: url(upload/bg-pizza.jpg); "></div>
            <div id="container">
                <!-- start container -->
                <div class="page-title-wrapper">
                    <div class="page-title-outher">
                        <div class="page-title-inner">
                            <span class="page-title-icon flaticon-pizza-slice"></span>
                            <h1 class="page-title">Menu</h1>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="page-wrapper">
                    <div class="offer-menu-wrapper">
                        <ul id="filters" class="single-offer-category-filter option-set" data-option-key="filter">
                            <?php
                                $categories = $Product->get_categories();
                                $index=0;
                                foreach ($categories as $val) {
                                    echo '<li class="filter-cat"><a ';
                                    if($index===0){$index++;echo 'class="selected"';}
                                    echo '" href="#filter" data-option-value=".cat'.$val["id"].'">'.$val["title"].'</a>';
                                }
                                unset($categories,$val,$index);
                            ?>
                        </ul>

                        <div class="offer-menu-items">
                            
                                <?php
                                    $categories = $Product->get_categories();
                                    foreach ($categories as $value) {
                                        $value=$value['id'];
                                        echo '<div class="single-offer-category-item isotope-item cat'.$value.'">';
                                        $products = $Product->get_products_by_category_id($value);
                                        foreach ($products as $val) {

                                            echo '<div class="single-offer-item">
                                                    <div class="single-offer-details">
                                                        <div class="single-offer-title">'.$val['title'].'</div>
                                                        <div class="single-offer-content">
                                                            <p>'.$val['description'].'</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-offer-price">$'.$val['price'].'</div>
                                                    <div class="number">
                                                        <span class="minus">-</span>
                                                        <input type="text" id ="qbp_'.$val['id'].'" value="1" size="5"/>
                                                        <span class="plus">+</span>
                                                     </div>
                                                    <input type="submit" value="buy" class="wpcf7-form-control wpcf7-submit" data_pid="'.$val['id'].'" id="add_to_cart" style="display: inline-block;width: 50px;">

                                                    <div class="clear"></div>
                                                  </div>';

                                        }
                                        echo '</div>';

                                    }
                                    
                                ?>


                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <!-- end page wrapper -->
            </div>
            <!-- end container -->
            <div class="clear"></div>
        </div>
        <!-- end container-wrapper -->



        <div class="footer2">
            <div class="footer-socials">
                <ul class="socials-sh">
                    <li>
                        <a class="fa sh-socials-url fa-twitter" href="#" title="Twitter" target="_blank"></a>
                    </li>
                    <li>
                        <a class="fa sh-socials-url fa-facebook" href="#" title="Facebook" target="_blank"></a>
                    </li>
                    <li>
                        <a class="fa sh-socials-url fa-linkedin" href="#" title="LinkedIn" target="_blank"></a>
                    </li>
                    <li>
                        <a class="fa sh-socials-url fa-google-plus" href="#" title="Google Plus" target="_blank"></a>
                    </li>
                </ul>
            </div>
            <div class="footer-content">
                @ 2017 Alberto's. Made by <a href="http://themeforest.net/user/max-themes/portfolio" title="Pego HTML Themes">Pego</a> &amp; <a href="https://HTML.org/" title="HTML Themes">HTML</a>. </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.offer-menu-items').on("click",'#add_to_cart',function(){
            var id = this.getAttribute('data_pid');
            var i= $.ajax({
                type:'post',
                        url:'cart.php',
                        cache: false,
                        data:{'id':id,'quantity':$('#qbp_'+id).val()},
                    response:'text',
                        async:true,
                        success:function (data) {
                        update_cart();
                }
            });

        })

    </script>

    <script type='text/javascript' src='js/jquery/jquery.js'></script>
    <script type='text/javascript' src='js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='rs-slider/js/jquery.themepunch.tools.min.js'></script>
    <script type='text/javascript' src='rs-slider/js/jquery.themepunch.revolution.min.js'></script>
    <script type='text/javascript' src='http://maps.google.com/maps/api/js?key=AIzaSyD3rVzWhxb6EGiqAD9HSrKb22gTo2HTqoA&amp;ver=1.0'></script>

    <script type='text/javascript' src='js/modernizr.custom.js'></script>
    <script type='text/javascript' src='js/jquery.animsition.min.js'></script>
    <script type='text/javascript' src='js/superfish.js'></script>
    <script type='text/javascript' src='js/waypoints.min.js'></script>
    <script type='text/javascript' src='js/jquery.mobilemenu.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>
    <script type='text/javascript' src='js/custom-inline-js.js'></script>
    <script type='text/javascript' src='js/jquery.isotope.min.js'></script>

    <script type="text/javascript">
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
    </script>

<?php
	include 'footer.php';
?>