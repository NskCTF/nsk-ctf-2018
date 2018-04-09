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
    <script type='text/javascript' src='js/contact-form.js'></script>
    <script type='text/javascript' src='js/custom-inline-js.js'></script>
    <script type='text/javascript' src='js/jquery.isotope.min.js'></script>

    <script type="text/javascript">
        $('#cart').on('keyup','input[name=number]',function(){setTimeout(upload_cart,2000);})
        $('#cart').on('click','#del_p',function(){var i= $.ajax({
                type:'post',
                url:'cart.php',
                cache: false,
                data:{'dell_from_cart':true,'id':this.getAttribute('data-id')},
                response:'text',
                async:true,
                success:function (data) {
                    update_cart();
                }
            })})
             
        function upload_cart(){
            var arr =$('#cart input[data-id]');
            var out='{';
            for(var i=0;i<arr.length;i++){
                if(i!=0){out+=',';}
                out+='"'+arr[i].getAttribute('data-id')+'":'+arr[i].value;
            }
            out+='}';
            var i= $.ajax({
                type:'post',
                url:'cart.php',
                cache: false,
                data:{'update':true,'data':out},
                response:'text',
                async:true,
                success:function (data) {
                    update_cart();
                }
            })    
        }

        function update_cart(){
                var i= $.ajax({
                type:'post',
                url:'cart.php',
                cache: false,
                data:{'get_orders':true},
                response:'text',
                async:true,
                success:function (data) {
                    if(data=='empty'){
                        $('#order').html('Your cart is empty');
                        return;
                    }
                    if(data!==''){
                        var goods = JSON.parse(data);
                        var string='';
                        var summ=0;
                        for(var i=0;i<goods.length;i++){
                            var str='<ul>';
                            str+='<li><lable>'+goods[i].title+'</lable></li>';
                            str+='<li><lable>$'+goods[i].price+'</lable></li>';
                            str+='<li><input data-id="'+goods[i].id+'" name = "number" size="1" name="coll" min="1" max="10" value="'+goods[i].quantity+'"></li>';
                            str+='<li><lable style="color: red" id="del_p" data-id="'+goods[i].id+'">X</lable></li>';
                            str+='</ul><hr>';
                            string+=str;
                            summ+=goods[i].quantity*goods[i].price;
                        }
                        string+='<hr>Итого: $'+summ+'<br>';

                        $('#order').html(string);
                        
                        //{id: 2, title: "FRESHNESS", quantity: 4, price: "8.4"}
                        //console.log(goods);
                    }
                }
            })
        }
    $('#cart').on('keypress','input',function(e) {

      e = e || event;

      if (e.ctrlKey || e.altKey || e.metaKey) return;

      var chr = getChar(e);

      // с null надо осторожно в неравенствах, т.к. например null >= '0' => true!
      // на всякий случай лучше вынести проверку chr == null отдельно
      if (chr == null) return;

      if (chr < '0' || chr > '9') {
        return false;
      }

    });

    function getChar(event) {
      if (event.which == null) {
        if (event.keyCode < 32) return null;
        return String.fromCharCode(event.keyCode) // IE
      }

      if (event.which != 0 && event.charCode != 0) {
        if (event.which < 32) return null;
        return String.fromCharCode(event.which) // остальные
      }

      return null; // специальная клавиша
    }

    $('#bimg ').on('click',function(){
        $(this).parent().toggleClass('open_cart');
    });


  
        update_cart();
    </script>
</body>
</html>