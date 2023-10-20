<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <!-- Site Title -->
    <title>Zwork Technology - Custom Billing Sysytem</title>
    <link rel="stylesheet" href="{{ asset('assets/bill/css/style.css') }}">
</head>


<body>
    <div class="tm_container">
        <div class="tm_invoice_wrap">
            <div class="tm_invoice tm_style2" id="tm_download_section">
                <div class="tm_note tm_font_style_normal tm_text_center" style="margin-top: 0px">
                    <p><b class="tm_primary_color">Estimate Bill</b>
                </div>

                <div style="display: flex; width: 100%;">
                    <div style="width: 50%;">
                        <div style="border: 1px #e6e9f0; border-style: solid solid solid solid;">
                            <p style="margin-bottom: 45px; padding-right: 5px; padding-left: 5px;" class="tm_accent_color"><b>Anand Traders</b>
                            </p>
                            <p style="margin-bottom: 1px; padding-right: 5px; padding-left: 5px;">#14, Ganesh Complex,
                                Vayalur Road, Kumaran Nager, Trichy -
                                620 017.</p>
                            {{-- <p style="margin-bottom: 1px; padding-right: 5px; padding-left: 5px;">GSTIN/UIN :</p>
                            <p style="margin-bottom: 1px; padding-right: 5px; padding-left: 5px;">State Name : Tamil
                                Nadu, Code : 33</p> --}}
                            <p style="margin-bottom: 5px; padding-right: 5px; padding-left: 5px;">E-mail :
                                sales@anandupvcwindow.com</p>
                        </div>
                    </div>
                    <div style="width: 50%;">
                        <div style="display: flex;">
                            <div style="width: 50%;">
                                <div style="border: 1px #e6e9f0; border-style: solid solid none none;">
                                    <p style="margin-bottom: 1px; padding: 10px;" class="tm_primary_color"><b>Invoice
                                            No : </b> <span>#{{$QuotationData->quotation_number}}</span></p>
                                </div>
                            </div>
                            <div style="width: 50%;">
                                <div style="border: 1px #e6e9f0; border-style: solid solid none none;">
                                    <p style="margin-bottom: 1px; padding: 10px;" class="tm_primary_color"><b>Date : </b><span>{{ date('d M Y', strtotime($QuotationData->date)) }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div style="border: 0.5px #e6e9f0;  border-style: solid solid solid none;">
                            <p style="margin-bottom: 1px; padding-right: 5px; padding-left: 5px;" class="tm_primary_color"><b>Buyer ( Invoice to )</b></p>
                            <p style="margin-bottom: 1px; padding-right: 5px; padding-left: 5px;">{{$customer->name}}
                            </p>
                            <p style="margin-bottom: 1px; padding-right: 5px; padding-left: 5px;">{{$customer->address}}</p>
                            <p style="margin-bottom: 5px; padding-right: 5px; padding-left: 5px;">Phone No :
                                {{$customer->phone_number}}</p>
                        </div>
                    </div>
                </div>
                <div class="tm_table tm_style1">
                        <div class="tm_table_responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="tm_width_1 tm_semi_bold" style="border: 1px #e6e9f0; border-style: none solid solid solid;">S.No</th>
                                        <th class="tm_width_4 tm_semi_bold" style="border: 1px #e6e9f0; border-style: none solid solid none;">Descriptions</th>
                                        <th class="tm_width_1 tm_semi_bold" style="border: 1px #e6e9f0; border-style: none solid solid none;">Width</th>
                                        <th class="tm_width_1 tm_semi_bold" style="border: 1px #e6e9f0; border-style: none solid solid none;">Height</th>
                                        <th class="tm_width_1 tm_semi_bold" style="border: 1px #e6e9f0; border-style: none solid solid none;">Qty</th>
                                        <th class="tm_width_1 tm_semi_bold" style="border: 1px #e6e9f0; border-style: none solid solid none;">Area/Sq.ft</th>
                                        <th class="tm_width_1 tm_semi_bold" style="border: 1px #e6e9f0; border-style: none solid solid none;">Rate</th>
                                        <th class="tm_width_2 tm_semi_bold tm_text_right" style="border: 1px #e6e9f0; border-style: none solid solid none;">Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($productsdata as $index => $productsdata_arr)
                                    <tr class="tm_gray_bg">
                                        <td class="tm_width_1" style="border: 1px #e6e9f0; border-style: none solid solid solid;">{{ ++$index }}</td>
                                        <td class="tm_width_4" style="border: 1px #e6e9f0; border-style: none solid solid none;">
                                            <p class="tm_m0 tm_f16 tm_primary_color">{{$productsdata_arr['product_name']}}</p>
                                        </td>
                                        <td class="tm_width_1" style="border: 1px #e6e9f0; border-style: none solid solid none;">{{$productsdata_arr['width']}}</td>
                                        <td class="tm_width_1" style="border: 1px #e6e9f0; border-style: none solid solid none;">{{$productsdata_arr['height']}}</td>
                                        <td class="tm_width_1" style="border: 1px #e6e9f0; border-style: none solid solid none;">{{$productsdata_arr['qty']}}</td>
                                        <td class="tm_width_1" style="border: 1px #e6e9f0; border-style: none solid solid none;">{{$productsdata_arr['areapersqft']}}</td>
                                        <td class="tm_width_1" style="border: 1px #e6e9f0; border-style: none solid solid none;">{{$productsdata_arr['rate']}}</td>
                                        <td class="tm_width_2 tm_text_right" style="border: 1px #e6e9f0; border-style: none solid solid none;">₹ {{$productsdata_arr['product_total']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <div class="tm_invoice_footer tm_mb15 tm_m0_md">
                        <div class="tm_left_footer">
                            {{-- <div class="tm_card_note tm_ternary_bg tm_white_color"><b>In Words: </b>Credit Card
                                - 236***********928</div> --}}
                            <p class="tm_mb2"><b class="tm_primary_color">Important Note:</b></p>
                            <p class="tm_m0">{{$QuotationData->add_on_note}}</p>
                        </div>
                        <div class="tm_right_footer">
                            <table class="tm_mb15">
                                <tbody>
                                    <tr>
                                        <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtoal</td>
                                        <td
                                            class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                            ₹ {{$QuotationData->sub_total}}</td>
                                    </tr>
                                    @if ($QuotationData->tax_amount == 0)

                                    @else
                                    <tr>
                                        <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">GST {{$QuotationData->tax_percentage}}%</td>
                                        <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_pt0">
                                        ₹ {{$QuotationData->tax_amount}}</td>
                                    </tr>
                                    @endif
                                    @if ($QuotationData->discount_price == 0)

                                    @else
                                    <tr>
                                        <td class="tm_width_3 tm_danger_color tm_border_none tm_pt0">

                                        Discount
                                        </td>
                                        <td class="tm_width_3 tm_danger_color tm_text_right tm_border_none tm_pt0">
                                        ₹ {{$QuotationData->discount_price}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">Extracost </td>
                                        <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_pt0">
                                        ₹ {{$QuotationData->extracost_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="tm_width_3 tm_border_top_0 tm_bold tm_f16" style="border: 1px #e6e9f0; border-style: solid none solid none;">
                                            Grand Total </td>
                                        <td
                                            class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right" style="border: 1px #e6e9f0; border-style: solid none solid none;">
                                            ₹ {{$QuotationData->grand_total}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tm_invoice_footer tm_type1">
                        <div class="tm_left_footer"></div>
                        <div class="tm_right_footer">
                            <div class="tm_sign tm_text_center">
                                <br><br>
                                <br><br>
                                <p class="tm_m0 tm_f16 tm_primary_color">Anand Traders</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tm_note tm_font_style_normal tm_text_left">
                    <hr class="tm_mb15">
                    <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p>
                    <p class="tm_m0">1. Payment : 50% Advance along with purchase Order, 40 % before delivery the meterial, 10 % Completion works.<br>
                        2. Delivery : Maximium 10 days from the date of purchase order. <br>
                        3. Validity : This quotation validity 10 days.
                    </p>
                </div><!-- .tm_note -->
                <div class="tm_note tm_font_style_normal tm_text_center">
                    <hr class="tm_mb15">
                    <p class="tm_mb2"><b class="tm_primary_color">Thanks you for your business!</b>
                </div><!-- .tm_note -->
            </div>



            <div class="tm_invoice_btns tm_hide_print">
                <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <rect x="128" y="240" width="256" height="208" rx="24.32"
                                ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round"
                                stroke-width="32" />
                            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                                stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <circle cx="392" cy="184" r="24" fill='currentColor' />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Print</span>
                </a>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/bill/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bill/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('assets/bill/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('assets/bill/js/main.js') }}"></script>
</body>

</html>
