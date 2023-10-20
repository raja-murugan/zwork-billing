<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script src="{{ asset('assets/backend/js/jquery-3.7.0.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/feather.min.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/bootstrap-datetimepicker.min.js') }}"></script>


<script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/apexchart/chart-data.js') }}"></script>

<script src="{{ asset('assets/backend/js/script.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    var i = 1;
    var j = 1;
        $(document).ready(function() {
            $('.js-example-basic-single').select2();


            $(".vendor_phoneno").keyup(function() {
                var query = $(this).val();

                if (query != '') {

                    $.ajax({
                        url: "{{ route('vendor.checkduplicate') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            query: query
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response['data']);
                            if(response['data'] != null){
                                alert('Vendor Already Existed');
                                $('.vendor_phoneno').val('');
                            }
                        }
                    });
                }

            });



            $(".customer_phoneno").keyup(function() {
                var query = $(this).val();

                if (query != '') {

                    $.ajax({
                        url: "{{ route('customer.checkduplicate') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            query: query
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response['data']);
                            if(response['data'] != null){
                                alert('Customer Already Existed');
                                $('.customer_phoneno').val('');
                            }
                        }
                    });
                }

            });



            $(document).on('click', '.addproductfields', function() {
                ++i;

                let  rowIndex = $('.auto_num').length+1;
                let  rowIndexx = $('.auto_num').length+1;

                $(".product_fields").append(
                    '<tr>' +
                    '<td><input class="auto_num form-control"  type="text" readonly value="'+rowIndexx+'"/></td>' +
                    '<td class=""><input type="hidden" id="quotation_detail_id" name="quotation_detail_id[]" />' +
                    '<select class="form-control js-example-basic-single product_id select"name="product_id[]" id="product_id' + i + '"required>' +
                    '<option value="" selected hidden class="text-muted">Select Product</option></select>' +
                    '</td>' +
                    '<td><input type="text" class="form-control width" id="width" name="width[]" value="1" required /></td>' +
                    '<td><input type="text" class="form-control height" id="height" name="height[]" value="1" required /></td>' +
                    '<td><input type="text" class="form-control qty" id="qty" name="qty[]" value="" required /></td>' +
                    '<td><input type="text" class="form-control areapersqft" id="areapersqft" name="areapersqft[]"  value="1" readonly /></td>' +
                    '<td><input type="text" class="form-control rate" id="rate" name="rate[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control product_total" readonly id="product_total"style="background-color: #e9ecef;" name="product_total[]" placeholder="Total" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn remove-tr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );


                $.ajax({
                    url: '/getProducts/',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response['data']);
                        var len = response['data'].length;

                        var selectedValues = new Array();

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {

                                    var id = response['data'][i].id;
                                    var name = response['data'][i].name;
                                    var option = "<option value='" + id + "'>" + name +
                                        "</option>";
                                    selectedValues.push(option);
                            }
                        }
                        ++j;
                        $('#product_id' + j).append(selectedValues);
                        //add_count.push(Object.keys(selectedValues).length);
                    }
                });


            });


            $(document).on('click', '.remove-tr', function() {
                $(this).parents('tr').remove();
                regenerate_auto_num();

                var sum = 0;
                $(".product_total").each(function(){
                    sum += +$(this).val();
                });
                $(".subq_total").val(sum);
                $('.sub_total').text('₹ ' + sum);

                $('.totalq_amount').val(sum);
                $('.total_amount').text('₹ ' + sum);


                var tax_percentage = $( "#tax_percentage option:selected" ).val();
                if(tax_percentage != '0'){
                    var subq_total = $(".subq_total").val();
                    var tax_amount = (tax_percentage / 100) * subq_total;
                    $('.taxq_amount').val(tax_amount.toFixed(2));
                    $('.tax_amount').text('₹ ' + tax_amount.toFixed(2));

                    var totsl = Number(subq_total) + Number(tax_amount);
                    $('.totalq_amount').val(totsl.toFixed(2));
                    $('.total_amount').text('₹ ' + totsl.toFixed(2));

                    var extracostq_amount = $('.extracostq_amount').val();
                    var discountq_price = $('.discountq_price').val();
                    var overall = Number(totsl) - Number(discountq_price);
                    $('.overall').val(overall);

                    var grand_total = Number(overall) + Number(extracostq_amount);
                    $('.grandq_total').val(grand_total.toFixed(2));
                    $('.grand_total').text('₹ ' + grand_total.toFixed(2));
                }


                var discount_type = $("#discount_type").val();

                if(discount_type == 'fixed'){

                    var discount = $('.discount').val();
                    $('.discountq_price').val(discount);
                    $('.discount_price').text('₹ ' + discount);

                    var totalq_amount = $(".totalq_amount").val();
                    var discountq_price = Number(totalq_amount) - Number(discount);
                    $('.overall').val(discountq_price);

                }else if(discount_type == 'percentage'){

                    var discount = $('.discount').val();
                    var totalq_amount = $(".totalq_amount").val();
                    var discountPercentageAmount = (discount / 100) * totalq_amount;
                    $('.discountq_price').val(discountPercentageAmount);
                    $('.discount_price').text('₹ ' + discountPercentageAmount);

                    var total_amount = Number(totalq_amount) - Number(discountPercentageAmount);
                    $('.overall').val(total_amount);

                }else if(discount_type == 'none'){
                    $('.discount').val(0);
                    $('.discountq_price').val(0);
                    $('.discount_price').text('₹ ' + 0);
                    var totalq_amount = $(".totalq_amount").val();
                    $('.overall').val(totalq_amount);
                }




                var overall = $('.overall').val();
                var extracostq_amount = $('.extracostq_amount').val();


                var grand_total = Number(overall) + Number(extracostq_amount);
                $('.grandq_total').val(grand_total.toFixed(2));
                $('.grand_total').text('₹ ' + grand_total.toFixed(2));


            });





            function regenerate_auto_num(){
                let count  = 1;
                $(".auto_num").each(function(i,v){
                $(this).val(count);
                count++;
              })
            }


            $(document).on('click', '.addextranotefields', function() {
                $(".extracost_tr").append(
                    '<tr>' +
                    '<td colspan="4"></td>' +
                    '<td colspan="3"><input type="text" class="form-control"id="extracost_note" placeholder="Note" value=""name="extracost_note[]" /></td>' +
                    '<td><input type="hidden" name="extracost_id[]"/><input type="number" class="form-control extracost" id="extracost"placeholder="Extra Cost"  name="extracost[]"value="" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn remove-extratr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );
            });
            $(document).on('click', '.remove-extratr', function() {
                $(this).parents('tr').remove();


                var sum = 0;
                $(".extracost").each(function(){
                    sum += +$(this).val();
                });
                $(".extracostq_amount").val(sum);
                $('.extracost_amount').text('₹ ' + sum);



                var tax_percentage = $( "#tax_percentage option:selected" ).val();
                if(tax_percentage != '0'){
                    var subq_total = $(".subq_total").val();
                    var tax_amount = (tax_percentage / 100) * subq_total;
                    $('.taxq_amount').val(tax_amount.toFixed(2));
                    $('.tax_amount').text('₹ ' + tax_amount.toFixed(2));

                    var totsl = Number(subq_total) + Number(tax_amount);
                    $('.totalq_amount').val(totsl.toFixed(2));
                    $('.total_amount').text('₹ ' + totsl.toFixed(2));

                    var extracostq_amount = $('.extracostq_amount').val();
                    var discountq_price = $('.discountq_price').val();
                    var overall = Number(totsl) - Number(discountq_price);
                    $('.overall').val(overall);

                    var grand_total = Number(overall) + Number(extracostq_amount);
                    $('.grandq_total').val(grand_total.toFixed(2));
                    $('.grand_total').text('₹ ' + grand_total.toFixed(2));
                }


                var discount_type = $("#discount_type").val();

                if(discount_type == 'fixed'){

                    var discount = $('.discount').val();
                    $('.discountq_price').val(discount);
                    $('.discount_price').text('₹ ' + discount);

                    var totalq_amount = $(".totalq_amount").val();
                    var discountq_price = Number(totalq_amount) - Number(discount);
                    $('.overall').val(discountq_price);

                }else if(discount_type == 'percentage'){

                    var discount = $('.discount').val();
                    var totalq_amount = $(".totalq_amount").val();
                    var discountPercentageAmount = (discount / 100) * totalq_amount;
                    $('.discountq_price').val(discountPercentageAmount);
                    $('.discount_price').text('₹ ' + discountPercentageAmount);

                    var total_amount = Number(totalq_amount) - Number(discountPercentageAmount);
                    $('.overall').val(total_amount);

                }else if(discount_type == 'none'){
                    $('.discount').val(0);
                    $('.discountq_price').val(0);
                    $('.discount_price').text('₹ ' + 0);
                    var totalq_amount = $(".totalq_amount").val();
                    $('.overall').val(totalq_amount);
                }




                var overall = $('.overall').val();
                var extracostq_amount = $('.extracostq_amount').val();


                var grand_total = Number(overall) + Number(extracostq_amount);
                $('.grandq_total').val(grand_total.toFixed(2));
                $('.grand_total').text('₹ ' + grand_total.toFixed(2));



            });

            $(document).on('click', '.addexpensenote', function() {
                $(".expensenote_tr").append(
                    '<tr>' +
                    '<td><input type="text" class="form-control" id="note" placeholder="Note" value="" name="note[]"/></td>' +
                    '<td><input type="hidden" name="expense_details_id[]"/><input type="text" class="form-control expense_price" id="expense_price" placeholder="Cost" name="expense_price[]" value=""/></td>' +
                    '<td><button class="btn btn-danger form-plus-btn remove-expensenote" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );
            });
            $(document).on('click', '.remove-expensenote', function() {
                $(this).parents('tr').remove();
            });


        });

    $(document).on("keyup", "input[name*=qty]", function() {
        var qty = $(this).val();
        var height = $(this).parents('tr').find('.height').val();
        var width = $(this).parents('tr').find('.width').val();
        var total = height * width;
        var areapersqft = total * qty;
        $(this).parents('tr').find('.areapersqft').val(areapersqft);

    });

    $(document).on("keyup", "input[name*=height]", function() {

        var height = $(this).val();
        var width = $(this).parents('tr').find('.width').val();
        var total = height * width;

        var qty = $(this).parents('tr').find('.qty').val();
        var areapersqft = total * qty;
        $(this).parents('tr').find('.areapersqft').val(areapersqft);

    });

    $(document).on("keyup", "input[name*=width]", function() {

        var width = $(this).val();
        var height = $(this).parents('tr').find('.height').val();
        var total = height * width;

        var qty = $(this).parents('tr').find('.qty').val();
        var areapersqft = total * qty;
        $(this).parents('tr').find('.areapersqft').val(areapersqft);

    });


    $(document).on("blur", "input[name*=rate]", function() {
        var rate = $(this).val();
        var areapersqft = $(this).parents('tr').find('.areapersqft').val();
        var total = areapersqft * rate;
        $(this).parents('tr').find('.product_total').val(total);


                var sum = 0;
                $(".product_total").each(function(){
                    sum += +$(this).val();
                });
                $(".subq_total").val(sum);
                $('.sub_total').text('₹ ' + sum);

                $('.totalq_amount').val(sum);
                $('.total_amount').text('₹ ' + sum);



                var tax_percentage = $( "#tax_percentage option:selected" ).val();
                if(tax_percentage != '0'){
                    var subq_total = $(".subq_total").val();
                    var tax_amount = (tax_percentage / 100) * subq_total;
                    $('.taxq_amount').val(tax_amount.toFixed(2));
                    $('.tax_amount').text('₹ ' + tax_amount.toFixed(2));

                    var totsl = Number(subq_total) + Number(tax_amount);
                    $('.totalq_amount').val(totsl.toFixed(2));
                    $('.total_amount').text('₹ ' + totsl.toFixed(2));

                    var extracostq_amount = $('.extracostq_amount').val();
                    var discountq_price = $('.discountq_price').val();
                    var overall = Number(totsl) - Number(discountq_price);
                    $('.overall').val(overall);

                    var grand_total = Number(overall) + Number(extracostq_amount);
                    $('.grandq_total').val(grand_total.toFixed(2));
                    $('.grand_total').text('₹ ' + grand_total.toFixed(2));
                }



                var discount_type = $("#discount_type").val();

                if(discount_type == 'fixed'){

                    var discount = $('.discount').val();
                    $('.discountq_price').val(discount);
                    $('.discount_price').text('₹ ' + discount);

                    var totalq_amount = $(".totalq_amount").val();
                    var discountq_price = Number(totalq_amount) - Number(discount);
                    $('.overall').val(discountq_price);

                }else if(discount_type == 'percentage'){

                    var discount = $('.discount').val();
                    var totalq_amount = $(".totalq_amount").val();
                    var discountPercentageAmount = (discount / 100) * totalq_amount;
                    $('.discountq_price').val(discountPercentageAmount);
                    $('.discount_price').text('₹ ' + discountPercentageAmount);

                    var total_amount = Number(totalq_amount) - Number(discountPercentageAmount);
                    $('.overall').val(total_amount);

                }else if(discount_type == 'none'){
                    $('.discount').val(0);
                    $('.discountq_price').val(0);
                    $('.discount_price').text('₹ ' + 0);
                    var totalq_amount = $(".totalq_amount").val();
                    $('.overall').val(totalq_amount);
                }



                var overall = $('.overall').val();
                var extracostq_amount = $('.extracostq_amount').val();


                var grand_total = Number(overall) + Number(extracostq_amount);
                $('.grandq_total').val(grand_total.toFixed(2));
                $('.grand_total').text('₹ ' + grand_total.toFixed(2));


    });


    $("#discount_type").on('change', function() {
        var discount_type = this.value;
        if(discount_type == 'fixed'){
            $('#discount').val('');
            $('.discountq_price').val(0);
            $('.discount_price').text('₹ ' + 0);
        }else if(discount_type == 'percentage'){
            $('#discount').val('');
            $('.discountq_price').val(0);
            $('.discount_price').text('₹ ' + 0);
        }else if(discount_type == 'none'){
            $('#discount').val('');
            $('.discountq_price').val(0);
            $('.discount_price').text('₹ ' + 0);

            var totalq_amount = $(".totalq_amount").val();
            var extracost_amount = $(".extracostq_amount").val();
            $(".overall").val(totalq_amount);

            var grand_total = Number(totalq_amount) + Number(extracost_amount);
            $('.grandq_total').val(grand_total);
            $('.grand_total').text('₹ ' + grand_total);
        }
    });



    $(document).on("keyup", 'input.discount', function() {
        var discount = $(this).val();
        var discount_type = $("#discount_type").val();

        if(discount_type == 'fixed'){

            $('.discountq_price').val(discount);
            $('.discount_price').text('₹ ' + discount);

            var totalq_amount = $(".totalq_amount").val();
            var total_amount = Number(totalq_amount) - Number(discount);
            $('.overall').val(total_amount);


            var extracost_amount = $(".extracostq_amount").val();
            var grand_total = Number(total_amount) + Number(extracost_amount);
            $('.grandq_total').val(grand_total);
            $('.grand_total').text('₹ ' + grand_total);

        }else if(discount_type == 'percentage'){

            var totalq_amount = $(".totalq_amount").val();
            var discountPercentageAmount = (discount / 100) * totalq_amount;
            $('.discountq_price').val(discountPercentageAmount);
            $('.discount_price').text('₹ ' + discountPercentageAmount);

            var total_amount = Number(totalq_amount) - Number(discountPercentageAmount);
            $('.overall').val(total_amount);


            var extracost_amount = $(".extracostq_amount").val();
            var grand_total = Number(total_amount) + Number(extracost_amount);
            $('.grandq_total').val(grand_total);
            $('.grand_total').text('₹ ' + grand_total);
        }else if(discount_type == 'none'){
                    $('.discount').val(0);
                    $('.discountq_price').val(0);
                    $('.discount_price').text('₹ ' + 0);
                    var totalq_amount = $(".totalq_amount").val();
                    $('.overall').val(totalq_amount);

            var extracost_amount = $(".extracostq_amount").val();
            var grand_total = Number(totalq_amount) + Number(extracost_amount);
            $('.grandq_total').val(grand_total);
            $('.grand_total').text('₹ ' + grand_total);
        }
    });



    $("#tax_percentage").on('change', function() {
        var tax_percentage = $(this).val();
        var subq_total = $(".subq_total").val();
        var tax_amount = (tax_percentage / 100) * subq_total;
        $('.taxq_amount').val(tax_amount.toFixed(2));
        $('.tax_amount').text('₹ ' + tax_amount.toFixed(2));



        var totsl = Number(subq_total) + Number(tax_amount);
        $('.totalq_amount').val(totsl.toFixed(2));
        $('.total_amount').text('₹ ' + totsl.toFixed(2));

        var extracostq_amount = $('.extracostq_amount').val();
         var discountq_price = $('.discountq_price').val();
         var overall = Number(totsl) - Number(discountq_price);
         $('.overall').val(overall);


        var grand_total = Number(overall) + Number(extracostq_amount);
        $('.grandq_total').val(grand_total.toFixed(2));
        $('.grand_total').text('₹ ' + grand_total.toFixed(2));
    });









    $(document).on("blur", "input[name*=extracost]", function() {
        var extracost = $(this).val();


                var sum = 0;
                $(".extracost").each(function(){
                    sum += +$(this).val();
                });
                $(".extracostq_amount").val(sum);
                $('.extracost_amount').text('₹ ' + sum);


                var overall = $('.overall').val();
                var extracostq_amount = $('.extracostq_amount').val();


                var grand_total = Number(overall) + Number(extracostq_amount);
                $('.grandq_total').val(grand_total.toFixed(2));
                $('.grand_total').text('₹ ' + grand_total.toFixed(2));
    });










    var k = 1;
    var l = 1;
        $(document).ready(function() {
            $(document).on('click', '.addbillproductfields', function() {
                ++k;

                let  rowIndex = $('.auto_num').length+1;
                let  rowIndexx = $('.auto_num').length+1;

                $(".billproduct_fields").append(
                    '<tr>' +
                    '<td><input class="auto_num form-control"  type="text" readonly value="'+rowIndexx+'"/></td>' +
                    '<td class=""><input type="hidden" id="bill_detail_id" name="bill_detail_id[]" />' +
                    '<select class="form-control js-example-basic-single bill_product_id select"name="bill_product_id[]" id="bill_product_id' + k + '"required>' +
                    '<option value="" selected hidden class="text-muted">Select Product</option></select>' +
                    '</td>' +
                    '<td><input type="text" class="form-control bill_width" id="bill_width" name="bill_width[]" value="" required /></td>' +
                    '<td><input type="text" class="form-control bill_height" id="bill_height" name="bill_height[]" value="" required /></td>' +
                    '<td><input type="text" class="form-control bill_qty" id="bill_qty" name="bill_qty[]" value="" required /></td>' +
                    '<td><input type="text" class="form-control bill_areapersqft" id="bill_areapersqft" name="bill_areapersqft[]"  value="" readonly /></td>' +
                    '<td><input type="text" class="form-control bill_rate" id="bill_rate" name="bill_rate[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control bill_product_total" readonly id="bill_product_total"style="background-color: #e9ecef;" name="bill_product_total[]" placeholder="Total" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn billremove-tr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );


                $.ajax({
                    url: '/getProducts/',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response['data']);
                        var len = response['data'].length;

                        var selectedValues = new Array();

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {

                                    var id = response['data'][i].id;
                                    var name = response['data'][i].name;
                                    var option = "<option value='" + id + "'>" + name +
                                        "</option>";
                                    selectedValues.push(option);
                            }
                        }
                        ++l;
                        $('#bill_product_id' + l).append(selectedValues);
                        //add_count.push(Object.keys(selectedValues).length);
                    }
                });


            });


            $(document).on('click', '.addbillextranotefields', function() {
                $(".billextracost_tr").append(
                    '<tr>' +
                    '<td colspan="4"></td>' +
                    '<td colspan="3"><input type="text" class="form-control"id="bill_extracost_note" placeholder="Note" value=""name="bill_extracost_note[]" /></td>' +
                    '<td><input type="hidden" name="billextracost_detail_id[]"/><input type="number" class="form-control bill_extracost" id="bill_extracost"placeholder="Extra Cost"  name="bill_extracost[]"value="" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn remove-billextratr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );
            });




            $(document).on('click', '.billremove-tr', function() {
                $(this).parents('tr').remove();
                billregenerate_auto_num();



                var sum = 0;
                $(".bill_product_total").each(function(){
                    sum += +$(this).val();
                });
                $(".bill_sub_total").val(sum);
                $('.billsub_total').text('₹ ' + sum);

                $('.bill_total_amount').val(sum);
                $('.billtotal_amount').text('₹ ' + sum);




                var bill_tax_percentage = $( "#bill_tax_percentage option:selected" ).val();
                if(bill_tax_percentage != '0'){

                    var bill_sub_total = $(".bill_sub_total").val();
                    var bill_tax_amount = (bill_tax_percentage / 100) * bill_sub_total;
                    $('.bill_tax_amount').val(bill_tax_amount.toFixed(2));
                    $('.billtax_amount').text('₹ ' + bill_tax_amount.toFixed(2));


                    var totsl = Number(bill_sub_total) + Number(bill_tax_amount);
                    $('.bill_total_amount').val(totsl.toFixed(2));
                    $('.billtotal_amount').text('₹ ' + totsl.toFixed(2));

                    var bill_extracost_amount = $('.bill_extracost_amount').val();
                    var bill_discount_price = $('.bill_discount_price').val();
                    var overall = Number(totsl) - Number(bill_discount_price);
                    $('.overall').val(overall);

                    var grand_total = Number(overall) + Number(bill_extracost_amount);
                    $('.grandq_total').val(grand_total.toFixed(2));
                    $('.grand_total').text('₹ ' + grand_total.toFixed(2));
                }


                var bill_discount_type = $("#bill_discount_type").val();

                if(bill_discount_type == 'fixed'){

                    var bill_discount = $('.bill_discount').val();
                    $('.bill_discount_price').val(bill_discount);
                    $('.billdiscount_price').text('₹ ' + bill_discount);

                    var bill_total_amount = $(".bill_total_amount").val();
                    var discountq_price = Number(bill_total_amount) - Number(bill_discount);
                    $('.overall').val(discountq_price);

                }else if(bill_discount_type == 'percentage'){

                    var bill_discount = $('.bill_discount').val();
                    var bill_total_amount = $(".bill_total_amount").val();
                    var discountPercentageAmount = (bill_discount / 100) * bill_total_amount;
                    $('.bill_discount_price').val(discountPercentageAmount);
                    $('.billdiscount_price').text('₹ ' + discountPercentageAmount);

                    var discountq_price = Number(bill_total_amount) - Number(discountPercentageAmount);
                    $('.overall').val(discountq_price);

                }else if(bill_discount_type == 'none'){
                        $('.bill_discount').val(0);
                        $('.bill_discount_price').val(0);
                        $('.billdiscount_price').text('₹ ' + 0);
                        var bill_total_amount = $(".bill_total_amount").val();
                        $('.overall').val(bill_total_amount);
                    }







                var overall = $('.overall').val();
                var billextracostamount = $('.bill_extracost_amount').val();


                var grand_total = Number(overall) + Number(billextracostamount);
                $('.bill_grand_total').val(grand_total.toFixed(2));
                $('.billgrand_total').text('₹ ' + grand_total.toFixed(2));

                var bill_paid_amount = $('.bill_paid_amount').val();
                //alert(bill_paid_amount);
                var bill_balance_amount = Number(grand_total) - Number(bill_paid_amount);
                $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
                $('.billbalance_amount').text('₹ ' + bill_balance_amount.toFixed(2));

            });

            function billregenerate_auto_num(){
                let count  = 1;
                $(".auto_num").each(function(i,v){
                $(this).val(count);
                count++;
              })
            }

            $(document).on('click', '.remove-billextratr', function() {
                $(this).parents('tr').remove();

                var sum = 0;
                $(".bill_extracost").each(function(){
                    sum += +$(this).val();
                });
                $(".bill_extracost_amount").val(sum);
                $('.billextracost_amount').text('₹ ' + sum);





                var bill_tax_percentage = $( "#bill_tax_percentage option:selected" ).val();
                if(bill_tax_percentage != '0'){

                    var bill_sub_total = $(".bill_sub_total").val();
                    var bill_tax_amount = (bill_tax_percentage / 100) * bill_sub_total;
                    $('.bill_tax_amount').val(bill_tax_amount.toFixed(2));
                    $('.billtax_amount').text('₹ ' + bill_tax_amount.toFixed(2));


                    var totsl = Number(bill_sub_total) + Number(bill_tax_amount);
                    $('.bill_total_amount').val(totsl.toFixed(2));
                    $('.billtotal_amount').text('₹ ' + totsl.toFixed(2));

                    var bill_extracost_amount = $('.bill_extracost_amount').val();
                    var bill_discount_price = $('.bill_discount_price').val();
                    var overall = Number(totsl) - Number(bill_discount_price);
                    $('.overall').val(overall);

                    var grand_total = Number(overall) + Number(bill_extracost_amount);
                    $('.grandq_total').val(grand_total.toFixed(2));
                    $('.grand_total').text('₹ ' + grand_total.toFixed(2));
                }


                var bill_discount_type = $("#bill_discount_type").val();

                if(bill_discount_type == 'fixed'){

                    var bill_discount = $('.bill_discount').val();
                    $('.bill_discount_price').val(bill_discount);
                    $('.billdiscount_price').text('₹ ' + bill_discount);

                    var bill_total_amount = $(".bill_total_amount").val();
                    var discountq_price = Number(bill_total_amount) - Number(bill_discount);
                    $('.overall').val(discountq_price);

                }else if(bill_discount_type == 'percentage'){

                    var bill_discount = $('.bill_discount').val();
                    var bill_total_amount = $(".bill_total_amount").val();
                    var discountPercentageAmount = (bill_discount / 100) * bill_total_amount;
                    $('.bill_discount_price').val(discountPercentageAmount);
                    $('.billdiscount_price').text('₹ ' + discountPercentageAmount);

                    var discountq_price = Number(bill_total_amount) - Number(discountPercentageAmount);
                    $('.overall').val(discountq_price);

                }else if(bill_discount_type == 'none'){
                        $('.bill_discount').val(0);
                        $('.bill_discount_price').val(0);
                        $('.billdiscount_price').text('₹ ' + 0);
                        var bill_total_amount = $(".bill_total_amount").val();
                        $('.overall').val(bill_total_amount);
                    }







                var overall = $('.overall').val();
                var billextracostamount = $('.bill_extracost_amount').val();


                var grand_total = Number(overall) + Number(billextracostamount);
                $('.bill_grand_total').val(grand_total.toFixed(2));
                $('.billgrand_total').text('₹ ' + grand_total.toFixed(2));

                var bill_paid_amount = $('.bill_paid_amount').val();
                //alert(bill_paid_amount);
                var bill_balance_amount = Number(grand_total) - Number(bill_paid_amount);
                $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
                $('.billbalance_amount').text('₹ ' + bill_balance_amount.toFixed(2));


            });


        });




    $(document).on("keyup", "input[name*=bill_qty]", function() {
        var bill_qty = $(this).val();
        var bill_height = $(this).parents('tr').find('.bill_height').val();
        var bill_width = $(this).parents('tr').find('.bill_width').val();
        var total = bill_height * bill_width;
        var bill_areapersqft = total * bill_qty;
        $(this).parents('tr').find('.bill_areapersqft').val(bill_areapersqft);

    });

    $(document).on("keyup", "input[name*=bill_height]", function() {

        var bill_height = $(this).val();
        var bill_width = $(this).parents('tr').find('.bill_width').val();
        var total = bill_height * bill_width;

        var bill_qty = $(this).parents('tr').find('.bill_qty').val();
        var areapersqft = total * bill_qty;
        $(this).parents('tr').find('.bill_areapersqft').val(areapersqft);

    });

    $(document).on("keyup", "input[name*=bill_width]", function() {

        var bill_width = $(this).val();
        var bill_height = $(this).parents('tr').find('.bill_height').val();
        var total = bill_height * bill_width;

        var bill_qty = $(this).parents('tr').find('.bill_qty').val();
        var areapersqft = total * bill_qty;
        $(this).parents('tr').find('.bill_areapersqft').val(areapersqft);

    });




    $("#bill_discount_type").on('change', function() {
        var bill_discount_type = this.value;

        if(bill_discount_type == 'fixed'){
            $('#bill_discount').val('');
            $('.bill_discount_price').val(0);
            $('.billdiscount_price').text('₹ ' + 0);
        }else if(bill_discount_type == 'percentage'){
            $('#bill_discount').val('');
            $('.bill_discount_price').val(0);
            $('.billdiscount_price').text('₹ ' + 0);
        }else if(bill_discount_type == 'none'){
            $('#bill_discount').val('');
            $('.bill_discount_price').val(0);
            $('.billdiscount_price').text('₹ ' + 0);




            var bill_total_amount = $('.bill_total_amount').val();
            $(".overall").val(bill_total_amount);
            var bill_extracost_amount = $(".bill_extracost_amount").val();

            var bill_grand_total = Number(bill_total_amount) + Number(bill_extracost_amount);
            $('.bill_grand_total').val(bill_grand_total.toFixed(2));
            $('.billgrand_total').text('₹ ' + bill_grand_total.toFixed(2));

            var bill_paid_amount = $('.bill_paid_amount').val();
            //alert(bill_paid_amount);
            var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
            $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
            $('.billbalance_amount').text('₹ ' + bill_balance_amount);
        }
    });



    $(document).on("keyup", 'input.bill_discount', function() {
        var bill_discount = $(this).val();
        var bill_discount_type = $("#bill_discount_type").val();

        if(bill_discount_type == 'fixed'){

            $('.bill_discount_price').val(bill_discount);
            $('.billdiscount_price').text('₹ ' + bill_discount);

            var bill_total_amount = $(".bill_total_amount").val();
            var overall = Number(bill_total_amount) - Number(bill_discount);
            $('.overall').val(overall);


            var bill_extracost_amount = $(".bill_extracost_amount").val();
            var bill_grand_total = Number(overall) + Number(bill_extracost_amount);
            $('.bill_grand_total').val(bill_grand_total);
            $('.billgrand_total').text('₹ ' + bill_grand_total);


            var bill_paid_amount = $('.bill_paid_amount').val();
            //alert(bill_paid_amount);
            var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
            $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
            $('.billbalance_amount').text('₹ ' + bill_balance_amount);


        }else if(bill_discount_type == 'percentage'){

            var bill_total_amount = $(".bill_total_amount").val();
            var discountPercentageAmount = (bill_discount / 100) * bill_total_amount;
            $('.bill_discount_price').val(discountPercentageAmount);
            $('.billdiscount_price').text('₹ ' + discountPercentageAmount);

            var overall = Number(bill_total_amount) - Number(discountPercentageAmount);
            $('.overall').val(overall);



            var bill_extracost_amount = $(".bill_extracost_amount").val();
            var bill_grand_total = Number(overall) +  Number(bill_extracost_amount);
            $('.bill_grand_total').val(bill_grand_total.toFixed(2));
            $('.billgrand_total').text('₹ ' + bill_grand_total.toFixed(2));

            var bill_paid_amount = $('.bill_paid_amount').val();
            //alert(bill_paid_amount);
            var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
            $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
            $('.billbalance_amount').text('₹ ' + bill_balance_amount);


        }else if(bill_discount_type == 'none'){

                    $('.bill_discount').val(0);
                    $('.bill_discount_price').val(0);
                    $('.billdiscount_price').text('₹ ' + 0);
                    var bill_total_amount = $(".bill_total_amount").val();
                    $('.overall').val(bill_total_amount);

            var bill_extracost_amount = $(".bill_extracost_amount").val();
            var grand_total = Number(bill_total_amount) + Number(bill_extracost_amount);
            $('.grandq_total').val(grand_total);
            $('.grand_total').text('₹ ' + grand_total);

            var bill_paid_amount = $('.bill_paid_amount').val();
            //alert(bill_paid_amount);
            var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
            $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
            $('.billbalance_amount').text('₹ ' + bill_balance_amount);
        }
    });



    $("#bill_tax_percentage").on('change', function() {
        var bill_tax_percentage = $(this).val();
        var bill_sub_total = $(".bill_sub_total").val();
        var bill_tax_amount = (bill_tax_percentage / 100) * bill_sub_total;
        $('.bill_tax_amount').val(bill_tax_amount.toFixed(2));
        $('.billtax_amount').text('₹ ' + bill_tax_amount.toFixed(2));

        //console.log(bill_total_amount);


                var totsl = Number(bill_sub_total) + Number(bill_tax_amount);
                    $('.bill_total_amount').val(totsl.toFixed(2));
                    $('.billtotal_amount').text('₹ ' + totsl.toFixed(2));


                    var bill_discount_price = $('.bill_discount_price').val();
                    var overall = Number(totsl) - Number(bill_discount_price);
                    $('.overall').val(overall);

                    var bill_extracost_amount = $('.bill_extracost_amount').val();

                    var grand_total = Number(overall) + Number(bill_extracost_amount);
                    $('.bill_grand_total').val(grand_total.toFixed(2));
                    $('.billgrand_total').text('₹ ' + grand_total.toFixed(2));


                    var bill_paid_amount = $('.bill_paid_amount').val();
                    //alert(bill_paid_amount);
                    var bill_balance_amount = Number(grand_total) - Number(bill_paid_amount);
                    $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
                    $('.billbalance_amount').text('₹ ' + bill_balance_amount);
    });



    $(document).on("blur", "input[name*=bill_rate]", function() {
        var bill_rate = $(this).val();
        var bill_areapersqft = $(this).parents('tr').find('.bill_areapersqft').val();
        var total = bill_areapersqft * bill_rate;
        $(this).parents('tr').find('.bill_product_total').val(total);

                    var sum = 0;
                $(".bill_product_total").each(function(){
                    sum += +$(this).val();
                });
                $(".bill_sub_total").val(sum);
                $('.billsub_total').text('₹ ' + sum);

                $('.bill_total_amount').val(sum);
                $('.billtotal_amount').text('₹ ' + sum);




                var bill_tax_percentage = $( "#bill_tax_percentage option:selected" ).val();
                if(bill_tax_percentage != '0'){

                    var bill_sub_total = $(".bill_sub_total").val();
                    var bill_tax_amount = (bill_tax_percentage / 100) * bill_sub_total;
                    $('.bill_tax_amount').val(bill_tax_amount.toFixed(2));
                    $('.billtax_amount').text('₹ ' + bill_tax_amount.toFixed(2));


                    var totsl = Number(bill_sub_total) + Number(bill_tax_amount);
                    $('.bill_total_amount').val(totsl.toFixed(2));
                    $('.billtotal_amount').text('₹ ' + totsl.toFixed(2));

                    var bill_extracost_amount = $('.bill_extracost_amount').val();
                    var bill_discount_price = $('.bill_discount_price').val();
                    var overall = Number(totsl) - Number(bill_discount_price);
                    $('.overall').val(overall);

                    var grand_total = Number(overall) + Number(bill_extracost_amount);
                    $('.bill_grand_total').val(grand_total.toFixed(2));
                    $('.billgrand_total').text('₹ ' + grand_total.toFixed(2));
                }



            var bill_discount_type = $("#bill_discount_type").val();

            if(bill_discount_type == 'fixed'){

                var bill_discount = $('.bill_discount').val();
                $('.bill_discount_price').val(bill_discount);
                $('.billdiscount_price').text('₹ ' + bill_discount);

                var bill_total_amount = $(".bill_total_amount").val();
                var discountq_price = Number(bill_total_amount) - Number(bill_discount);
                $('.overall').val(discountq_price);

            }else if(bill_discount_type == 'percentage'){

                var bill_discount = $('.bill_discount').val();
                var bill_total_amount = $(".bill_total_amount").val();
                var discountPercentageAmount = (bill_discount / 100) * bill_total_amount;
                $('.bill_discount_price').val(discountPercentageAmount);
                $('.billdiscount_price').text('₹ ' + discountPercentageAmount);

                var discountq_price = Number(bill_total_amount) - Number(discountPercentageAmount);
                $('.overall').val(discountq_price);

            }else if(bill_discount_type == 'none'){
                    $('.bill_discount').val(0);
                    $('.bill_discount_price').val(0);
                    $('.billdiscount_price').text('₹ ' + 0);
                    var bill_total_amount = $(".bill_total_amount").val();
                    $('.overall').val(bill_total_amount);
                }



                var overall = $('.overall').val();
                var billextracostamount = $('.bill_extracost_amount').val();


                var grand_total = Number(overall) + Number(billextracostamount);
                $('.bill_grand_total').val(grand_total.toFixed(2));
                $('.billgrand_total').text('₹ ' + grand_total.toFixed(2));

                var bill_paid_amount = $('.bill_paid_amount').val();
                //alert(bill_paid_amount);
                var bill_balance_amount = Number(grand_total) - Number(bill_paid_amount);
                $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
                $('.billbalance_amount').text('₹ ' + bill_balance_amount.toFixed(2));
    });



    $(document).on("blur", "input[name*=bill_extracost]", function() {
        var bill_extracost = $(this).val();

        var sum = 0;
                $(".bill_extracost").each(function(){
                    sum += +$(this).val();
                });
                $(".bill_extracost_amount").val(sum);
                $('.billextracost_amount').text('₹ ' + sum);


        var overall = $('.overall').val();
        var bill_extracost_amount = $(".bill_extracost_amount").val();


        var bill_grand_total = Number(overall) + Number(bill_extracost_amount);
        $('.bill_grand_total').val(bill_grand_total.toFixed(2));
        $('.billgrand_total').text('₹ ' + bill_grand_total.toFixed(2));


        var bill_paid_amount = $('.bill_paid_amount').val();
        //alert(bill_paid_amount);
        var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
        $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
        $('.billbalance_amount').text('₹ ' + bill_balance_amount.toFixed(2));
    });



    $(document).on("keyup", 'input.bill_paid_amount', function() {
        var bill_paid_amount = $(this).val();
        var bill_grand_total = $(".bill_grand_total").val();
        //alert(bill_paid_amount);
        var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
        $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
        $('.billbalance_amount').text('₹ ' + bill_balance_amount.toFixed(2));
    });





    var f = 1;
    var b = 1;
        $(document).ready(function() {
            $(document).on('click', '.addpurchaseproductfields', function() {
                ++b;

                let  rowIndex = $('.auto_num').length+1;
                let  rowIndexx = $('.auto_num').length+1;

                $(".purchaseproduct_fields").append(
                    '<tr>' +
                    '<td><input class="auto_num form-control"  type="text" readonly value="'+rowIndexx+'"/></td>' +
                    '<td colspan="2" class=""><input type="hidden" id="purchase_detail_id" name="purchase_detail_id[]" />' +
                    '<select class="form-control js-example-basic-single purchase_productid select"name="purchase_productid[]" id="purchase_productid' + b + '"required>' +
                    '<option value="" selected hidden class="text-muted">Select Product</option></select>' +
                    '</td>' +
                    '<td><input type="text" class="form-control purchase_quantity" id="purchase_quantity" name="purchase_quantity[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control purchase_rateperquantity" id="purchase_rateperquantity" name="purchase_rateperquantity[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control purchase_producttotal" readonly id="purchase_producttotal"style="background-color: #e9ecef;" name="purchase_producttotal[]" placeholder="Total" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn purchaseremove-tr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );


                $.ajax({
                    url: '/getProducts/',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response['data']);
                        var len = response['data'].length;

                        var selectedValues = new Array();

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {

                                    var id = response['data'][i].id;
                                    var name = response['data'][i].name;
                                    var option = "<option value='" + id + "'>" + name +
                                        "</option>";
                                    selectedValues.push(option);
                            }
                        }
                        ++f;
                        $('#purchase_productid' + f).append(selectedValues);
                        //add_count.push(Object.keys(selectedValues).length);
                    }
                });


            });


            $(document).on('click', '.addpurchaseextranotefields', function() {
                $(".purchaseextracost_tr").append(
                    '<tr>' +
                    '<td colspan="2"></td>' +
                    '<td colspan="3"><input type="text" class="form-control"id="purchase_extracostnote" placeholder="Note" value=""name="purchase_extracostnote[]" /></td>' +
                    '<td><input type="hidden" name="purchaseextracost_detail_id[]"/><input type="number" class="form-control purchase_extracost" id="purchase_extracost"placeholder="Extra Cost"  name="purchase_extracost[]"value="" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn remove-purchaseextratr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );
            });




            $(document).on('click', '.purchaseremove-tr', function() {
                $(this).parents('tr').remove();
                purchaseregenerate_auto_num();

                var sum = 0;
                $(".purchase_producttotal").each(function(){
                    sum += +$(this).val();
                });
                $(".purchase_subtotal").val(sum);
                $('.purchasesubtotal').text('₹ ' + sum);

                var purchase_discounttype = $("#purchase_discounttype").val();

                if(purchase_discounttype == 'fixed'){

                    var purchase_discount = $('.purchase_discount').val();
                    $('.purchase_discountprice').val(purchase_discount);
                    $('.purchasediscountprice').text('₹ ' + purchase_discount);

                    var purchase_subtotal = $(".purchase_subtotal").val();
                    var purchase_totalamount = Number(purchase_subtotal) - Number(purchase_discount);
                    $('.purchase_totalamount').val(purchase_totalamount);
                    $('.purchasetotalamount').text('₹ ' + purchase_totalamount);

                }else if(purchase_discounttype == 'percentage'){

                    var purchase_discount = $('.purchase_discount').val();
                    var purchase_subtotal = $(".purchase_subtotal").val();
                    var discountPercentageAmount = (purchase_discount / 100) * purchase_subtotal;
                    $('.purchase_discountprice').val(discountPercentageAmount);
                    $('.purchasediscountprice').text('₹ ' + discountPercentageAmount);

                    var purchase_totalamount = Number(purchase_subtotal) - Number(discountPercentageAmount);
                    $('.purchase_totalamount').val(purchase_totalamount);
                    $('.purchasetotalamount').text('₹ ' + purchase_totalamount);

                }


                var purchase_taxpercentage = $( "#purchase_taxpercentage option:selected" ).val();
                var purchase_totalamount = $(".purchase_totalamount").val();
                var purchase_taxamount = (purchase_taxpercentage / 100) * purchase_totalamount;
                $('.purchase_taxamount').val(purchase_taxamount.toFixed(2));
                $('.purchasetaxamount').text('₹ ' + purchase_taxamount.toFixed(2));

                var purchase_extracostamount = $(".purchase_extracostamount").val();
                var purchase_grandtotal = Number(purchase_totalamount) + Number(purchase_taxamount) + Number(purchase_extracostamount);
                $('.purchase_grandtotal').val(purchase_grandtotal.toFixed(2));
                $('.purchasegrandtotal').text('₹ ' + purchase_grandtotal.toFixed(2));


                var purchase_paidamount = $('.purchase_paidamount').val();
                //alert(bill_paid_amount);
                var purchase_balanceamount = Number(purchase_grandtotal) - Number(purchase_paidamount);
                $('.purchase_balanceamount').val(purchase_balanceamount.toFixed(2));
                $('.purchasebalanceamount').text('₹ ' + purchase_balanceamount.toFixed(2));

            });

            function purchaseregenerate_auto_num(){
                let count  = 1;
                $(".auto_num").each(function(i,v){
                $(this).val(count);
                count++;
              })
            }

            $(document).on('click', '.remove-purchaseextratr', function() {
                $(this).parents('tr').remove();


                var sum = 0;
                $(".purchase_extracost").each(function(){
                    sum += +$(this).val();
                });
                $(".purchase_extracostamount").val(sum);
                $('.purchaseextracostamount').text('₹ ' + sum);




                                    var purchase_discounttype = $("#purchase_discounttype").val();

                                    if(purchase_discounttype == 'fixed'){

                                        var purchase_discount = $('.purchase_discount').val();
                                        $('.purchase_discountprice').val(purchase_discount);
                                        $('.purchasediscountprice').text('₹ ' + purchase_discount);

                                        var purchase_subtotal = $(".purchase_subtotal").val();
                                        var purchase_totalamount = Number(purchase_subtotal) - Number(purchase_discount);
                                        $('.purchase_totalamount').val(purchase_totalamount);
                                        $('.purchasetotalamount').text('₹ ' + purchase_totalamount);

                                    }else if(purchase_discounttype == 'percentage'){

                                        var purchase_discount = $('.purchase_discount').val();
                                        var purchase_subtotal = $(".purchase_subtotal").val();
                                        var discountPercentageAmount = (purchase_discount / 100) * purchase_subtotal;
                                        $('.purchase_discountprice').val(discountPercentageAmount);
                                        $('.purchasediscountprice').text('₹ ' + discountPercentageAmount);

                                        var purchase_totalamount = Number(purchase_subtotal) - Number(discountPercentageAmount);
                                        $('.purchase_totalamount').val(purchase_totalamount);
                                        $('.purchasetotalamount').text('₹ ' + purchase_totalamount);

                                    }



                var purchase_taxpercentage = $( "#purchase_taxpercentage option:selected" ).val();
                var purchase_totalamount = $(".purchase_totalamount").val();
                var purchase_taxamount = (purchase_taxpercentage / 100) * purchase_totalamount;
                $('.purchase_taxamount').val(purchase_taxamount.toFixed(2));
                $('.purchasetaxamount').text('₹ ' + purchase_taxamount.toFixed(2));

                var purchase_extracostamount = $(".purchase_extracostamount").val();
                var purchase_grandtotal = Number(purchase_totalamount) + Number(purchase_taxamount) + Number(purchase_extracostamount);
                $('.purchase_grandtotal').val(purchase_grandtotal.toFixed(2));
                $('.purchasegrandtotal').text('₹ ' + purchase_grandtotal.toFixed(2));

                var purchase_paidamount = $('.purchase_paidamount').val();
                //alert(bill_paid_amount);
                var purchase_balanceamount = Number(purchase_grandtotal) - Number(purchase_paidamount);
                $('.purchase_balanceamount').val(purchase_balanceamount.toFixed(2));
                $('.purchasebalanceamount').text('₹ ' + purchase_balanceamount.toFixed(2));


            });


        });


        $(document).on("blur", "input[name*=purchase_quantity]", function() {
            var purchase_quantity = $(this).val();
            var purchase_rateperquantity = $(this).parents('tr').find('.purchase_rateperquantity').val();
            var total = purchase_quantity * purchase_rateperquantity;
            $(this).parents('tr').find('.purchase_producttotal').val(total);


            var sum = 0;
                $(".purchase_producttotal").each(function(){
                    sum += +$(this).val();
                });
                $(".purchase_subtotal").val(sum);
                $('.purchasesubtotal').text('₹ ' + sum);

                $('.purchase_totalamount').val(sum);
                $('.purchasetotalamount').text('₹ ' + sum);



                var purchase_taxpercentage = $( "#purchase_taxpercentage option:selected" ).val();
                if(purchase_taxpercentage != '0'){

                    var purchase_subtotal = $(".purchase_subtotal").val();
                    var purchase_taxamount = (purchase_taxpercentage / 100) * purchase_subtotal;
                    $('.purchase_taxamount').val(purchase_taxamount.toFixed(2));
                    $('.purchasetaxamount').text('₹ ' + purchase_taxamount.toFixed(2));


                    var totsl = Number(purchase_subtotal) + Number(purchase_taxamount);
                    $('.purchase_totalamount').val(totsl.toFixed(2));
                    $('.purchasetotalamount').text('₹ ' + totsl.toFixed(2));


                    var purchase_extracostamount = $('.purchase_extracostamount').val();
                    var purchase_discountprice = $('.purchase_discountprice').val();
                    var overall = Number(totsl) - Number(purchase_discountprice);
                    $('.overall').val(overall);

                    var grand_total = Number(overall) + Number(purchase_extracostamount);
                    $('.purchase_grandtotal').val(grand_total.toFixed(2));
                    $('.purchasegrandtotal').text('₹ ' + grand_total.toFixed(2));

                }


                                    var purchase_discounttype = $("#purchase_discounttype").val();

                                    if(purchase_discounttype == 'fixed'){

                                        var purchase_discount = $('.purchase_discount').val();
                                        $('.purchase_discountprice').val(purchase_discount);
                                        $('.purchasediscountprice').text('₹ ' + purchase_discount);

                                        var purchase_totalamount = $(".purchase_totalamount").val();
                                        var discountq_price = Number(purchase_totalamount) - Number(purchase_discount);
                                        $('.overall').val(discountq_price);

                                    }else if(purchase_discounttype == 'percentage'){

                                        var purchase_discount = $('.purchase_discount').val();
                                        var purchase_totalamount = $(".purchase_totalamount").val();
                                        var discountPercentageAmount = (purchase_discount / 100) * purchase_totalamount;
                                        $('.purchase_discountprice').val(discountPercentageAmount);
                                        $('.purchasediscountprice').text('₹ ' + discountPercentageAmount);

                                        var discountq_price = Number(purchase_totalamount) - Number(discountPercentageAmount);
                                        $('.overall').val(discountq_price);

                                    }else if(purchase_discounttype == 'none'){
                                        $('.purchase_discount').val(0);
                                        $('.purchase_discountprice').val(0);
                                        $('.purchasediscountprice').text('₹ ' + 0);
                                        var totalq_amount = $(".purchase_totalamount").val();
                                        $('.overall').val(totalq_amount);
                                    }







                var overall = $('.overall').val();
                var purchaseextracostamount = $('.purchase_extracostamount').val();


                var grand_total = Number(overall) + Number(purchaseextracostamount);
                $('.purchase_grandtotal').val(grand_total.toFixed(2));
                $('.purchasegrandtotal').text('₹ ' + grand_total.toFixed(2));



                $('.purchasebalanceamount').text('₹ ' + grand_total.toFixed(2));
                $('.purchase_balanceamount').val(grand_total.toFixed(2));



                var purchase_paidamount = $('.purchase_paidamount').val();
                //alert(bill_paid_amount);
                var purchasebalance_amount = Number(grand_total) - Number(purchase_paidamount);
                $('.purchase_balanceamount').val(purchasebalance_amount.toFixed(2));
                $('.purchasebalanceamount').text('₹ ' + purchasebalance_amount.toFixed(2));
        });


        $("#purchase_discounttype").on('change', function() {
            var purchase_discounttype = this.value;
            if(purchase_discounttype == 'fixed'){
                $('#purchase_discount').val('');
                $('.purchase_discountprice').val(0);
                $('.purchasediscountprice').text('₹ ' + 0);
            }else if(purchase_discounttype == 'percentage'){
                $('#purchase_discount').val('');
                $('.purchase_discountprice').val(0);
                $('.purchasediscountprice').text('₹ ' + 0);

            }else if(purchase_discounttype == 'none'){

            $('#purchase_discount').val('');
            $('.purchase_discountprice').val(0);
            $('.purchasediscountprice').text('₹ ' + 0);

            var purchase_totalamount = $(".purchase_totalamount").val();
            var purchase_extracostamount = $(".purchase_extracostamount").val();
            $(".overall").val(purchase_totalamount);

            var purchase_grandtotal = Number(purchase_totalamount) + Number(purchase_extracostamount);
            $('.purchase_grandtotal').val(purchase_grandtotal.toFixed(2));
            $('.purchasegrandtotal').text('₹ ' + purchase_grandtotal.toFixed(2));

            var purchase_paidamount = $('.purchase_paidamount').val();
            //alert(bill_paid_amount);
            var purchase_balanceamount = Number(purchase_grandtotal) - Number(purchase_paidamount);
            $('.purchase_balanceamount').val(purchase_balanceamount.toFixed(2));
            $('.purchasebalanceamount').text('₹ ' + purchase_balanceamount);
        }
        });




        $(document).on("keyup", 'input.purchase_discount', function() {
            var purchase_discount = $(this).val();
            var purchase_discounttype = $("#purchase_discounttype").val();

            if(purchase_discounttype == 'fixed'){

                $('.purchase_discountprice').val(purchase_discount);
                $('.purchasediscountprice').text('₹ ' + purchase_discount);

                var purchase_totalamount = $(".purchase_totalamount").val();
                var discountq_price = Number(purchase_totalamount) - Number(purchase_discount);
                $('.overall').val(discountq_price);

                var purchase_extracostamount = $(".purchase_extracostamount").val();
                var purchase_grandtotal = Number(discountq_price) + Number(purchase_extracostamount);
                $('.purchase_grandtotal').val(purchase_grandtotal.toFixed(2));
                $('.purchasegrandtotal').text('₹ ' + purchase_grandtotal.toFixed(2));


                var purchase_paidamount = $('.purchase_paidamount').val();
                //alert(bill_paid_amount);
                var purchase_balanceamount = Number(purchase_grandtotal) - Number(purchase_paidamount);
                $('.purchase_balanceamount').val(purchase_balanceamount.toFixed(2));
                $('.purchasebalanceamount').text('₹ ' + purchase_balanceamount.toFixed(2));

            }else if(purchase_discounttype == 'percentage'){

                var purchase_totalamount = $(".purchase_totalamount").val();
                var discountPercentageAmount = (purchase_discount / 100) * purchase_totalamount;
                $('.purchase_discountprice').val(discountPercentageAmount);
                $('.purchasediscountprice').text('₹ ' + discountPercentageAmount);

                var discountq_price = Number(purchase_totalamount) - Number(discountPercentageAmount);
                $('.overall').val(discountq_price);


                var purchase_extracostamount = $(".purchase_extracostamount").val();
                var purchase_grandtotal = Number(discountq_price) +  Number(purchase_extracostamount);
                $('.purchase_grandtotal').val(purchase_grandtotal.toFixed(2));
                $('.purchasegrandtotal').text('₹ ' + purchase_grandtotal.toFixed(2));

                var purchase_paidamount = $('.purchase_paidamount').val();
                //alert(bill_paid_amount);
                var purchase_balanceamount = Number(purchase_grandtotal) - Number(purchase_paidamount);
                $('.purchase_balanceamount').val(purchase_balanceamount.toFixed(2));
                $('.purchasebalanceamount').text('₹ ' + purchase_balanceamount.toFixed(2));

            }else if(purchase_discounttype == 'none'){

                    $('.purchase_discount').val(0);
                    $('.purchase_discountprice').val(0);
                    $('.purchasediscountprice').text('₹ ' + 0);
                    var purchase_totalamount = $(".purchase_totalamount").val();
                    $('.overall').val(purchase_totalamount);


                    var purchase_extracostamount = $(".purchase_extracostamount").val();
                var purchase_grandtotal = Number(purchase_totalamount) +  Number(purchase_extracostamount);
                $('.purchase_grandtotal').val(purchase_grandtotal.toFixed(2));
                $('.purchasegrandtotal').text('₹ ' + purchase_grandtotal.toFixed(2));

                var purchase_paidamount = $('.purchase_paidamount').val();
                //alert(bill_paid_amount);
                var purchase_balanceamount = Number(purchase_grandtotal) - Number(purchase_paidamount);
                $('.purchase_balanceamount').val(purchase_balanceamount.toFixed(2));
                $('.purchasebalanceamount').text('₹ ' + purchase_balanceamount.toFixed(2));

                }
        });



    $("#purchase_taxpercentage").on('change', function() {
        var purchase_taxpercentage = $(this).val();
        var purchase_subtotal = $(".purchase_subtotal").val();
        var purchase_taxamount = (purchase_taxpercentage / 100) * purchase_subtotal;
        $('.purchase_taxamount').val(purchase_taxamount.toFixed(2));
        $('.purchasetaxamount').text('₹ ' + purchase_taxamount.toFixed(2));

        //console.log(bill_total_amount);


        var totsl = Number(purchase_subtotal) + Number(purchase_taxamount);
                    $('.purchase_totalamount').val(totsl.toFixed(2));
                    $('.purchasetotalamount').text('₹ ' + totsl.toFixed(2));


                    var purchase_extracostamount = $('.purchase_extracostamount').val();
                    var purchase_discountprice = $('.purchase_discountprice').val();
                    var overall = Number(totsl) - Number(purchase_discountprice);
                    $('.overall').val(overall);

                    var grand_total = Number(overall) + Number(purchase_extracostamount);
                    $('.purchase_grandtotal').val(grand_total.toFixed(2));
                    $('.purchasegrandtotal').text('₹ ' + grand_total.toFixed(2));


        var purchase_paidamount = $('.purchase_paidamount').val();
        //alert(bill_paid_amount);
        var purchase_balanceamount = Number(grand_total) - Number(purchase_paidamount);
        $('.purchase_balanceamount').val(purchase_balanceamount.toFixed(2));
        $('.purchasebalanceamount').text('₹ ' + purchase_balanceamount.toFixed(2));
    });




    $(document).on("blur", "input[name*=purchase_rateperquantity]", function() {
        var purchase_rateperquantity = $(this).val();
        var purchase_quantity = $(this).parents('tr').find('.purchase_quantity').val();
        var total = purchase_quantity * purchase_rateperquantity;
        $(this).parents('tr').find('.purchase_producttotal').val(total);



        var sum = 0;
                $(".purchase_producttotal").each(function(){
                    sum += +$(this).val();
                });
                $(".purchase_subtotal").val(sum);
                $('.purchasesubtotal').text('₹ ' + sum);

                $('.purchase_totalamount').val(sum);
                $('.purchasetotalamount').text('₹ ' + sum);


                var purchase_taxpercentage = $( "#purchase_taxpercentage option:selected" ).val();
                if(purchase_taxpercentage != '0'){

                    var purchase_subtotal = $(".purchase_subtotal").val();
                    var purchase_taxamount = (purchase_taxpercentage / 100) * purchase_subtotal;
                    $('.purchase_taxamount').val(purchase_taxamount.toFixed(2));
                    $('.purchasetaxamount').text('₹ ' + purchase_taxamount.toFixed(2));


                    var totsl = Number(purchase_subtotal) + Number(purchase_taxamount);
                    $('.purchase_totalamount').val(totsl.toFixed(2));
                    $('.purchasetotalamount').text('₹ ' + totsl.toFixed(2));


                    var purchase_extracostamount = $('.purchase_extracostamount').val();
                    var purchase_discountprice = $('.purchase_discountprice').val();
                    var overall = Number(totsl) - Number(purchase_discountprice);
                    $('.overall').val(overall);

                    var grand_total = Number(overall) + Number(purchase_extracostamount);
                    $('.purchase_grandtotal').val(grand_total.toFixed(2));
                    $('.purchasegrandtotal').text('₹ ' + grand_total.toFixed(2));

                }


                                    var purchase_discounttype = $("#purchase_discounttype").val();

                                    if(purchase_discounttype == 'fixed'){

                                        var purchase_discount = $('.purchase_discount').val();
                                        $('.purchase_discountprice').val(purchase_discount);
                                        $('.purchasediscountprice').text('₹ ' + purchase_discount);

                                        var purchase_totalamount = $(".purchase_totalamount").val();
                                        var discountq_price = Number(purchase_totalamount) - Number(purchase_discount);
                                        $('.overall').val(discountq_price);

                                    }else if(purchase_discounttype == 'percentage'){

                                        var purchase_discount = $('.purchase_discount').val();
                                        var purchase_totalamount = $(".purchase_totalamount").val();
                                        var discountPercentageAmount = (purchase_discount / 100) * purchase_totalamount;
                                        $('.purchase_discountprice').val(discountPercentageAmount);
                                        $('.purchasediscountprice').text('₹ ' + discountPercentageAmount);

                                        var discountq_price = Number(purchase_totalamount) - Number(discountPercentageAmount);
                                        $('.overall').val(discountq_price);

                                    }else if(purchase_discounttype == 'none'){
                                        $('.purchase_discount').val(0);
                                        $('.purchase_discountprice').val(0);
                                        $('.purchasediscountprice').text('₹ ' + 0);
                                        var totalq_amount = $(".purchase_totalamount").val();
                                        $('.overall').val(totalq_amount);
                                    }







                var overall = $('.overall').val();
                var purchaseextracostamount = $('.purchase_extracostamount').val();


                var grand_total = Number(overall) + Number(purchaseextracostamount);
                $('.purchase_grandtotal').val(grand_total.toFixed(2));
                $('.purchasegrandtotal').text('₹ ' + grand_total.toFixed(2));



                $('.purchasebalanceamount').text('₹ ' + grand_total.toFixed(2));
                $('.purchase_balanceamount').val(grand_total.toFixed(2));



                var purchase_paidamount = $('.purchase_paidamount').val();
                //alert(bill_paid_amount);
                var purchasebalance_amount = Number(grand_total) - Number(purchase_paidamount);
                $('.purchase_balanceamount').val(purchasebalance_amount.toFixed(2));
                $('.purchasebalanceamount').text('₹ ' + purchasebalance_amount.toFixed(2));

    });



    $(document).on("blur", "input[name*=purchase_extracost]", function() {
        var purchase_extracost = $(this).val();


        var sum = 0;
                $(".purchase_extracost").each(function(){
                    sum += +$(this).val();
                });
                $(".purchase_extracostamount").val(sum);
                $('.purchaseextracostamount').text('₹ ' + sum);

                var overall = $('.overall').val();
                var purchase_extracostamount = $('.purchase_extracostamount').val();


                var grand_total = Number(overall) +  Number(purchase_extracostamount);
                $('.purchase_grandtotal').val(grand_total.toFixed(2));
                $('.purchasegrandtotal').text('₹ ' + grand_total.toFixed(2));

                var purchase_paidamount = $('.purchase_paidamount').val();
                //alert(bill_paid_amount);
                var purchasebalance_amount = Number(grand_total) - Number(purchase_paidamount);
                $('.purchase_balanceamount').val(purchasebalance_amount.toFixed(2));
                $('.purchasebalanceamount').text('₹ ' + purchasebalance_amount.toFixed(2));
    });



    $(document).on("keyup", 'input.purchase_paidamount', function() {
        var purchase_paidamount = $(this).val();
        var purchase_grandtotal = $(".purchase_grandtotal").val();
        //alert(bill_paid_amount);
        var purchase_balanceamount = Number(purchase_grandtotal) - Number(purchase_paidamount);
        $('.purchase_balanceamount').val(purchase_balanceamount.toFixed(2));
        $('.purchasebalanceamount').text('₹ ' + purchase_balanceamount.toFixed(2));
    });









    function quotationubmitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }

    function billubmitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }

    function purchseubmitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }




    $(document).on("keyup", "input[name*=expense_price]", function() {
        var tota_expense = 0;
        $("input[name='expense_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        tota_expense = Number(tota_expense) +
                                            Number($(this).val());
                                        $('.total_expense_amount').val(tota_expense.toFixed(2));
                                        $('.total_expense').text('₹ ' + tota_expense.toFixed(2));
                                    });
    });



    $(document).ready(function() {
        $('.customerpayment_customer_id').on('change', function() {
            var customerid = this.value;
            $('.customerpayment_oldblance').val('');
                $.ajax({
                    url: '/oldbalanceforCustomerPayment/',
                    type: 'get',
                    data: {
                            _token: "{{ csrf_token() }}",
                            customerid: customerid
                        },
                    dataType: 'json',
                    success: function(response) {
                        //
                        console.log(response);
                        var len = response.length;
                        for (var i = 0; i < len; i++) {
                            $(".customerpayment_oldblance").val(response[i].payment_pending);
                            $('.customerpayment_totalamount').val(response[i].payment_pending);
                        }
                    }
                });
        });

            $(document).on("keyup", 'input.customerpayment_discount', function() {
                var customerpayment_discount = $(this).val();
                var oldblance = $(".customerpayment_oldblance").val();
                var Totalbillpayment = Number(oldblance) - Number(customerpayment_discount);
                $('.customerpayment_totalamount').val(Totalbillpayment);

                var customerpayment_paidamount = $(".customerpayment_paidamount").val();
                var payment_pending_amount = Number(Totalbillpayment) - Number(customerpayment_paidamount);
                $('.customerpayment_paymentpending').val(payment_pending_amount.toFixed(2));

            });

            $(document).on("keyup", 'input.customerpayment_paidamount', function() {
                var customerpayment_paidamount = $(this).val();
                var customerpayment_totalamount = $(".customerpayment_totalamount").val();
                var payment_pending_amount = Number(customerpayment_totalamount) - Number(customerpayment_paidamount);
                $('.customerpayment_paymentpending').val(payment_pending_amount.toFixed(2));
            });



        $('.vendorpayment_vendorid').on('change', function() {
            var vendorid = this.value;
            $('.vendorpayment_oldblance').val('');
                $.ajax({
                    url: '/oldbalanceforvendorPayment/',
                    type: 'get',
                    data: {
                            _token: "{{ csrf_token() }}",
                            vendorid: vendorid
                        },
                    dataType: 'json',
                    success: function(response) {
                        //
                        console.log(response);
                        var len = response.length;
                        for (var i = 0; i < len; i++) {
                            $(".vendorpayment_oldblance").val(response[i].payment_pending);
                            $('.vendorpayment_totalamount').val(response[i].payment_pending);
                        }
                    }
                });
        });



            $(document).on("keyup", 'input.vendorpayment_discount', function() {
                var vendorpayment_discount = $(this).val();
                var oldblance = $(".vendorpayment_oldblance").val();
                var Totalbillpayment = Number(oldblance) - Number(vendorpayment_discount);
                $('.vendorpayment_totalamount').val(Totalbillpayment);

                var vendorpayment_paidamount = $(".vendorpayment_paidamount").val();
                var payment_pending_amount = Number(Totalbillpayment) - Number(vendorpayment_paidamount);
                $('.vendorpayment_paymentpending').val(payment_pending_amount.toFixed(2));

            });

            $(document).on("keyup", 'input.vendorpayment_paidamount', function() {
                var vendorpayment_paidamount = $(this).val();
                var vendorpayment_totalamount = $(".vendorpayment_totalamount").val();
                var payment_pending_amount = Number(vendorpayment_totalamount) - Number(vendorpayment_paidamount);
                $('.vendorpayment_paymentpending').val(payment_pending_amount.toFixed(2));
            });
    });

</script>
