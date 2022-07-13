	$(function(){
        $i=0;

        $('#add_item').click(function(){
          addnewrow();
       });

        $('body').delegate('#delete','click',function(){             
               $(this).parent(true).parent(true).remove();       
       });

       $('body').delegate('.item_name,.no_of_items,.price,.total','keyup',function(){
              
               var tr=$(this).parent().parent();
               var num=tr.find('.no_of_items').val();
               var price=tr.find('.price').val();
                amount=num*price;
               tr.find('.total').val(amount);              
               subTotal();
           });
           $('body').delegate('.tax','keyup',function(){
               grandTotal();
           }); 

           function addnewrow(){           
           var n=$i++;
           var tr='<tr>'+
                '<td><input class="input item_name" type="text" name="item_name[]" id="item_name"></td>'+
                '<td><input class="input no_of_items" type="text" name="no_of_items[]" id="no_of_items"></td>'+
                '<td><input class="input price" type="text" name="price[]" id="price"></td>'+
                '<td><input class="input total" name="total[]" id="total"></td>'+
                '<td><b id="delete" class="button is-danger">Delete</b></td>'+
                '<tr>';
          $('.myTable').append(tr);   
       };

       function subTotal(){ 
          var subTotal=0;
        $('.total').each(function(){
           var result=$(this).val()-0;            
            subTotal+=result;               
        });
       
       $('.sub_total').val(subTotal);
       
    } 
       function grandTotal(){
           var tax=$('.tax').val()-0;
           var sTotal=$('.sub_total').val()-0;
           // var gTotal=tax+sTotal;
           var gTotal=sTotal-(sTotal*(tax/100));
           $('.grand_total').val(gTotal);
       } 
   });

           