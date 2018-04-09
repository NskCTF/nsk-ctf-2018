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
                            <h1 class="page-title">My Orders</h1>
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
                        <div class="contact-details" style="width: 100%;">
                        	<?php

                        		if(isset($_SESSION['my_order'])){
                        			$orders = $_SESSION['my_order'];
                        			foreach ($orders as $value) {
                        			    if(!$Product->is_active_order($value)){
                                            unset($orders[$value]);
                                            continue;
                                        }
                        				$data = $Product->get_order_by_id($value);
                        				echo '
			                            <div class="contact-detail contact-detail1" data-id="'.$value.'">
			                                <div class="contact-detail-title">ORDER № '.$value.'   | <span class="dell" data-id="'.$value.'">DELETE</span><br>
			                                 E-mail:  '.duck::find($data['email']).' | <a href="/Find_order.php?order_id='.$value.'">MORE DETAILS</a></div>';
			                            echo '</div>';
                        			}

                        		}else {
									echo '<div class="contact-detail contact-detail1">
			                                <div class="contact-detail-title">You have no orders yet</div>
			                                <div class="contact-detail-content">
			                                    <p>Your orders will appear after payment.<br>Go to product selection?  <a href="menu.php" style="color: blue;">MENU</a> </p>
			                                </div>
		                            	</div>';

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
        <!-- end container-wrapper -->


    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script type="text/javascript">


	$('.dell').on('click',function(){
		var id = this.getAttribute('data-id');
		    var i= $.ajax({
                type:'post',
                url:'cart.php',
                cache: false,
                data:{'id':id,'dell_order':true},
                response:'text',
                async:true,
                success:function (data) {
                	if(data=='ok'){
                		$('div[data-id='+id+']').fadeOut();
                		setTimeout(function(){$('div[data-id='+id+']').remove();},3000)
                	}
            }
        });


	})
</script>

<?php
	include 'footer.php';
?>