<?php
include 'header.php';
require_once ('log.php');
?>

<div class="container-wrapper">
    <div class="page-bg" style=" background-image: url(upload/bg-pizza.jpg); "></div>
    <div id="container" class="template-contact-container" >
        <!-- start container -->
        <div class="page-title-wrapper">
            <div class="page-title-outher">
                <div class="page-title-inner">
                    <span class="page-title-icon flaticon-pizza-slice"></span>
                    <h1 class="page-title">Find Order</h1>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="page-wrapper">




            <div class="contact-maps">
                <div id="map_canvas" class="mapStyleClass">

                </div>
            </div>
            <form method="get">
                <lable>Enter your order ID: <input name="order_id" type="text"></lable></lable>
                <input type="submit" value="Search">

            </form>

            <div class="contact-info-wrapper">
                <div class="contact-details" style="width: 100%;">
                    <?php



                    if(isset($_GET['order_id']) && $_GET['order_id']!=''){
                        echo '<hr>';
                        $order = $_GET['order_id'];


                            $data = $Product->get_order_by_id($order);
                            if(isset($data['email'])){
                                echo '
                                            <div class="contact-detail contact-detail1" data-id="'.$order.'">
                                                <div class="contact-detail-title">ORDER № '.$order.' <br> E-mail:  '.duck::find($data['email']).'</div>';
                                echo $Product->print_report(json_decode(duck::find($data['goods'])));
                                echo '<div class="contact-detail-title"><!--Your secret key: '.$data['id'].'--></div>';
                                echo '</div>';
                            }else{
                                echo 'Such order does not exist';
                            }
                    }



                    ?>

                </div>

            </div>
            <div class="clear"></div>
        </div>
        <!-- end page wrapper -->
    </div>
    <!-- end container -->
    <div class="clear"></div>
</div>



<?php
include 'footer.php';
?>