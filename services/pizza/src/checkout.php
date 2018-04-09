<?php
	include 'header.php';
?>


 <div class="container-wrapper">
            <div class="page-bg" style=" background-image: url(upload/bg-pizza.jpg); "></div>
            <div id="container" class="template-contact-container" style="width:  1000px;">
                <!-- start container -->
                <div class="page-title-wrapper">
                    <div class="page-title-outher">
                        <div class="page-title-inner">
                            <span class="page-title-icon flaticon-pizza-slice"></span>
                            <h1 class="page-title">Checkout</h1>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="page-wrapper">
                    <div class="contact-maps">
                        <div id="map_canvas" class="mapStyleClass"></div>
                    </div>
                    <div class="contact-info-wrapper">
                        <div class="contact-details" style="width: 60%;">
                        	<?php
                        		if(isset($_SESSION['order'])){
                        			$order = $_SESSION['order'];
                        			foreach ($order as $key => $value) {
                                        $data = $Product->get_product_by_id($key);
                        				echo '
			                            <div class="contact-detail contact-detail1">
			                                <div class="contact-detail-title">'.$data['title'].'   |   $'.$data['price']*$value.'</div>
			                                <div class="contact-detail-content">
			                                    <p>$'.$data['price'].' * '.$value.' </p>
			                                </div>
			                            </div>
			                            ';
                        			}

                        		}else {
									echo '<div class="contact-detail contact-detail1">
			                                <div class="contact-detail-title">Ваша корзина пуста</div>
			                                <div class="contact-detail-content">
			                                    <p>Для начала добавьте нужный товар,<br /> затем перейдите на страницу оплаты</p>
			                                </div>
		                            	</div>';

                        		}
                        		
                        	?>

                        </div>
						<p>Your balance: $<?php echo $_SESSION['balance']; ?></p>
                        <div class="contact-form-wrapper" style="width: 40%;float: right;">
                            <div role="form" class="wpcf7" id="wpcf7-f49-p15-o1" lang="en-US" dir="ltr">
                                <div class="screen-reader-response"></div>

                                <form id="contact-form" action="#">
                                    <div class="albertos-contact-form">
                                        <div class="contact-detail-title">Payment details</div>
                                        <div class="app-name"><span class="wpcf7-form-control-wrap name-input">
                                            <input name="name" id="name" type="text" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name" /></span></div>
                                        <div class="app-phone"><span class="wpcf7-form-control-wrap email-input">
                                            <input name="mail" id="mail" type="text"  value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email" /></span></div>
                                        <p><span class="wpcf7-form-control-wrap appointment-message">
                                            <textarea name="comment" id="comment"  cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Message"></textarea></span> </p>
                                        <div class="clear"></div>
                                        <div class="contact-submit"><input type="submit" value="Сonfirm order" class="wpcf7-form-control wpcf7-submit"  id="submit_contact" /><div id="msg" class="message"></div></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- end page wrapper -->
            </div>
            <!-- end container -->
            <div class="clear"></div>
        </div>
        <!-- end container-wrapper -->


    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">



<script>

	$('#submit_contact').on('click',function(){
		$("#status").fadeIn();
		$("#preloader").fadeIn();
		var name = $('#name').val();
		var Email = $('#mail').val();
		var message = $('#comment').val();
		var er=0;
        if(name==''){er=1}
        if(Email==''){er=1}
        if(message==''){er=1}

		if(er==0){
			var i= $.ajax({
	            type:'post',
	            url:'pay.php',
	            cache: false,
	            data:{'dstAccountId':name,'amonAcsdId':Email,'srcAccountId':message},
	            response:'text',
	            async:true,
	            success:function (data) {

	            	
					$('.contact-details').html('<div class="contact-detail contact-detail1"><div class="contact-detail-title">'+data+
						'</div><div class="contact-detail-content"><p></p></div></div>');
                    $('#name').val('');
                    $('#mail').val('');
                    $('#comment').val('');
	            }
	        });
            update_cart();
		}


		$("#status").fadeOut();
		$("#preloader").fadeOut();
	})
</script>
<?php
	include 'footer.php';
?>