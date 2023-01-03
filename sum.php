<html>
    <title></title>
    <head>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



    </head>
    <body>
    <script type="text/javascript">

    $(document).ready(function () {
            $("#my-table").keyup(function (event) {
                calculateTotals();
            });

            calculateTotals();
        });
        var tax_amount = 0;
        function calculateTotals() {
            var sub = 0;
            $("#my-table .targetfields").each(function () {

                var qty = parseInt($(this).find(".quantity").val());
                var rate = parseInt($(this).find(".price").val());
                var tax_rate = parseInt($(this).find(".tax").val());
                if (isNaN(qty))
                    qty = 0;
                if (isNaN(rate))
                    rate = 0;
                if (isNaN(tax_rate))
                    tax_rate = 0;

                var subtotal = qty * rate;
                $(this).find(".total").val(subtotal);

                if (!isNaN(subtotal))
                    sub += subtotal;
                tax_amount = sub * tax_rate / 100;
                $(this).find(".taxation").val(tax_amount);
            });
            $(".sub").val(sub);
$(".grandtotal").val(sub+tax_amount);
        }
        </script>
<form>
<table id="my-table">
    <tr class="targetfields">
       <td><input type="text" class="common quantity" name="1" id="quant" value="40"></td>
       <td><input type="text" class="common price" name="2" id="units" value="125"></td>
       <td><input type="text" class="total" name="3" id="total" readonly></td>
    </tr>
    <tr class="targetfields">
       <td><input type="text" class="common quantity" name="1" id="quant" value="10"></td>
       <td><input type="text" class="common price" name="2" id="units" value="20"></td>
       <td><input type="text" class="total" name="3" id="total" readonly></td>
    </tr>
    <tr>
       <td colspan="2"><label class="form-control" style="box-shadow:none;border:0px solid black;">Subtotal</label></td>
       <td><input name="subtotal" readonly id="subtotal" class="sub" type="text" /></td>
</table>
</form>


    </html>
