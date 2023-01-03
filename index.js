
function calc() {         
    
    for(n=1;n<=n;n++){
        
        var txtqty = document.getElementById('txtqty'+n).value;
        var txtprice = document.getElementById('txtprice'+n).value;
        var result = parseInt(txtqty) * parseInt(txtprice);
         if (!isNaN(result)) {

            document.getElementById('txtresult'+n).value = result;

            } 
            var total = 0;
    var textboxes = document.querySelectorAll(".sum");
            textboxes.forEach(function(box) {
            var val;
            if (box.value == "") val = 0;
            else val = parseInt(box.value);
            total += val;
        });
    document.getElementById("total").value = total;

            }
            
        }
        
            
        
    
    


