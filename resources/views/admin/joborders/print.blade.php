<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('assets') }}/invoice/css/bootstrap.rtl.min.css" />
  <link rel="stylesheet" href="{{ url('assets') }}/invoice/css/style.css" />
  <title>أمر عمل </title>
 
</head>

<body>
  <main>
    <!----------------------- top ----------------------------->
    <div class="font text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-9 d-flex align-items-stretch">
              <div class="w-100">
                <div class="logo mt-3 d-flex justify-content-between align-items-end">
                  <img src="{{ url('assets') }}/invoice/image/logo.png" class="img-fluid" style="width: 200px" alt="main-logo" />
                  <div class="title text-center">
                    <h2 class="mb-0">أمر عمل JOB ORDER</h2>
                  </div>
                </div>
                <div class="align-items-center mt-1 d-md-flex d-none">
                  <p class="mb-0">اسم&nbsp;العميل:</p>
                  <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="{{ $jobOrder->customer_name }}" />
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch">
              <div class="img-job w-100 d-flex flex-column align-items-center justify-content-center mt-3">
                {{-- <h4>صورة</h4>
                <h6>(الغلاف / العمل)</h6> --}}
                <!-- Display the image if it exists -->
                @if($jobOrder->photo)
                  <img src="{{ asset('storage/' . $jobOrder->photo) }}" alt="Job Order Image" class="img-fluid">
                @endif
              </div>
            </div>
            <div class="col-12">
              <div class="align-items-center mt-3 d-md-none d-flex">
                <p class="mb-0">اسم&nbsp;العميل:</p>
                <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="{{ $jobOrder->customer_name }}" />
              </div>
              <div class="d-flex align-items-center mt-1">
                <p class="mb-0">اسم&nbsp;العمل:</p>
                <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="{{ $jobOrder->business_name }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center mt-1">
                <p class="mb-0">اليوم/&nbsp;التاريخ:</p>
                <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="{{ $jobOrder->day_date }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center mt-1">
                <p class="mb-0">موعد&nbsp;التسليم:</p>
                <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="{{ $jobOrder->delivery_date }}" />
              </div>
            </div>
          </div>
        </div>
      </div>
      

      <div class="container text-right mt-3">
        <div class="row">
          <div class="col-12">
            <div class="card-1 px-2 py-3">
              <div class="d-grid mb-3">
                <div class="d-flex align-items-center">
                  <label for="price" class="mx-2 font">السعر </label>
                  <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="price" value="{{ $jobOrder->Price }}" />
                </div>
                <div class="d-flex align-items-center">
                  <label for="notes" class="mx-2 text-black">ملاحظات </label>
                  <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="notes" value="{{ $jobOrder->notes }}" />
                </div>
              </div>
              <div class="d-grid">
                <p class="mb-0 font-2 text-black">وسيلة السداد :</p>
                
                @php
                $paymentMethods = [
                    'Cash Instant Check' => 'نقدي(شيك فوري)',
                    'Receivables Account' => 'ذمم(بالحساب)',
                    'Receivables Checks' => 'ذمم(شيكات)',
                    'Electronic Transfer' => 'تحويل الكتروني',
                    'Bank Card' => 'بطاقة بنكية',
                ];
            @endphp
            
            @foreach($paymentMethods as $method => $arabic)
                <div class="form-check mb-0">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="payment_methods[]" 
                        value="{{ $method }}" 
                        id="payment_{{ $method }}" 
                        {{ $jobOrder->Payment_method === $method ? 'checked' : '' }}
                    />
                    <label class="form-check-label" for="payment_{{ $method }}">
                        {{ $arabic }}
                    </label>
                </div>
            @endforeach
            
              </div>
            </div>
          </div>
        </div>
      </div>
      
      

    <!-----------------------main  ----------------------------->
   <div class="container text-right mt-2">
        <div class="row">
            <div class="col-12">
                <div class="table-1 table-responsive">
                    <div class="title text-center">
                        <h2 class="mb-0">المواصفات Description</h2>
                      </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="first">
                                <th rowspan="6" class="text-center">
                                    <span class="font">مواصفات&nbsp;المطبوع</span>
                                </th>
                            </tr>
                            <!-- نوع المطبوع -->
                            <tr>
                                <th scope="row" class="text-center text-black" style="vertical-align: middle">
                                    نوع المطبوع
                                </th>
                                <td colspan="3">
                                    <div class="cc d-grid gap-3 align-items-center">
                                        <div class="form-check mb-0">
                                            <label class="form-check-label" for="typeBook">كتاب</label>
                                            <input class="form-check-input" type="checkbox" value="Book" id="typeBook" {{
                                                $jobOrder->type_of_publication == 'Book' ? 'checked' : '' }} />
    
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label for="pageCount" class="mx-2">عدد&nbsp;الصفحات</label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="pageCount"
                                                value="{{ $jobOrder->number_of_pages ?? '' }}" />
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value="Other" id="typeOther" {{
                                                $jobOrder->type_of_publication == 'Other' ? 'checked' : '' }} />
                                            <label class="form-check-label mx-2" for="typeOther">أخرى</label>
                                            <input type="text" class="form-control-plaintext pt-0 mb-1 pb-0" id="otherType"
                                                value="{{ $jobOrder->other ?? '' }}" />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- القياس -->
                            <tr class="border-g">
                                <th scope="row" class="text-center text-black" style="vertical-align: middle">القياس</th>
                                <td>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" type="checkbox" value="20.5x28 Commercial"
                                            id="measureCommercial" {{ $jobOrder->Measurement == 'Educational Offer Size
                                        28x21' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="Educational Offer Size 28x21">20.5ｘ28 قياس
                                            تجـــاري</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check mt-1">
                                        <label class="form-check-label" for="measureTender">21ｘ28 قياس عطاء التجربة</label>
                                        <input class="form-check-input" type="checkbox" value="21x28 Test Tender"
                                            id="measureTender" {{ $jobOrder->Measurement == 'Commercial Size 28x20.5' ?
                                        'checked' : '' }} />
    
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" value="Custom Measure"
                                                id="measureCustom" {{ $jobOrder->Measurement == 'Special Size' ? 'checked' :
                                            '' }} />
                                            <label class="form-check-label" for="measureCustom">قياس&nbsp;خاص</label>
                                        </div>
                                        <input type="text" class="form-control-plaintext pt-0 mb-1 pb-0" id="customMeasure"
                                            value="{{ $jobOrder->Special_Size ?? '' }}" />
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-gray">
                                <th scope="row" class="text-center text-black" style="vertical-align: middle">
                                    الكمية
                                </th>
                                <td colspan="2">
                                    <div class="d-flex align-items-center">
                                        <label for="numDigits" class="mx-2">بالأرقام </label>
                                        <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="numDigits"
                                            value="{{ $jobOrder->Quantity_in_numbers ?? '' }}" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label for="numWords" class="mx-2">كتابة </label>
                                        <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="numWords"
                                            value="{{ $jobOrder->Quantity_Writing ?? '' }}" />
                                    </div>
                                </td>
                            </tr>
    
                            <!-- عدد الالوان -->
                            <!-- عدد الالوان -->
                            <tr class="border-gray">
                                <th scope="row" class="text-center text-black" style="vertical-align: middle">
                                    عدد الالوان
                                  </th>
                                  <td colspan="2">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check-label mt-1 me-3">الداخلي</label>
                                        
                                            <!-- Separate d-flex container for CMYK -->
                                            <div class="form-check d-flex ">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <span style="color: #00adee">C</span>
                                                    <span style="color: #ed008c">M</span>
                                                    <span style="color: #fed400">Y</span>
                                                    <span style="color: #221e1f">K</span>
                                                </label>
                                                <input class="form-check-input ms-2" type="checkbox" value="CMYK" id="flexCheckDefault"
                                                    {{ in_array('CMYK', explode(',', $jobOrder->Number_of_interior_colors ?? '')) ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                        
                                        <!-- Separate d-flex container for individual colors: C, M, Y, K -->
                                        <div class="d-flex">
                                            @foreach(['C' => '#00adee', 'M' => '#ed008c', 'Y' => '#fed400', 'K' => '#221e1f'] as $color => $colorCode)
                                                <div class="form-check mt-1 me-3">
                                                    <label class="form-check-label" for="flexCheck{{ $color }}" style="color: {{ $colorCode }}">
                                                        {{ $color }}
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="{{ $color }}" id="flexCheck{{ $color }}"
                                                        {{ in_array($color, explode(',', $jobOrder->Number_of_interior_colors ?? '')) ? 'checked' : '' }} />
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                    </div>
                                </td>
                                <td colspan="2">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check-label mt-1 me-3" for="flexCheckDefault">
                                                غلاف (أو تجاري)
                                            </label>
                                        
                                            <!-- Separate container for CMYK option -->
                                            <div class="form-check  d-flex">
                                                <label class="form-check-label" for="flexCheckCMYK">
                                                    <span style="color: #00adee">C</span>
                                                    <span style="color: #ed008c">M</span>
                                                    <span style="color: #fed400">Y</span>
                                                    <span style="color: #221e1f">K</span>
                                                </label>
                                                <input class="form-check-input ms-2" type="checkbox" value="CMYK" id="flexCheckCMYK"
                                                    {{ in_array('CMYK', explode(',', $jobOrder->Number_of_colors_Cover_or_commercial ?? '')) ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                        
                                        <!-- Separate container for individual colors: C, M, Y, K -->
                                        <div class="d-flex ">
                                            @foreach(['C' => '#00adee', 'M' => '#ed008c', 'Y' => '#fed400', 'K' => '#221e1f'] as $color => $colorCode)
                                                <div class="form-check mt-1 me-3">
                                                    <label class="form-check-label" for="flexCheck{{ $color }}" style="color: {{ $colorCode }}">
                                                        {{ $color }}
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="{{ $color }}" id="flexCheck{{ $color }}"
                                                        {{ in_array($color, explode(',', $jobOrder->Number_of_colors_Cover_or_commercial ?? '')) ? 'checked' : '' }} />
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
    
                            <!-- ملاحظات -->
                            <tr class="border-gray">
                                <th scope="row" class="text-center text-black" style="vertical-align: middle">ملاحظات</th>
                                <td colspan="3">
                                    <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="notes"
                                        value="{{ $jobOrder->notes ?? '' }}" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
   
    <!-----------------------main  ----------------------------->
    <div class="container text-right mt-3">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="first">
                                <th rowspan="10" class="text-center">
                                    <span class="font">التصميم&nbsp;و&nbsp;المونتاج</span>
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="4" class="text-center text-black" style="vertical-align: middle">
                                    الملازم
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="d-flex align-items-center">
                                        <label for="num" class="mx-2">نوع&nbsp;الورق&nbsp;الداخلي</label>
                                        <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="{{ $jobOrder->Quantity_in_numbers }}"  />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-grid align-items-center justify-content-between" style="grid-template-columns: auto auto auto">
                                        <label class="form-check-label">قياس&nbsp;البليتات:&nbsp;</label>
                                        <div class="form-check mt-1">
                                            <label style="width: max-content" class="form-check-label" for="flexCheck70x100">
                                                70ｘ100
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="70x100" id="flexCheck70x100" 
                                                   {{ $jobOrder->Pallet_measuring_notes == '70x100' ? 'checked' : '' }} />
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check mt-1">
                                                <label style="width: max-content" class="form-check-label" for="flexCheck50x70">
                                                    50ｘ70
                                                </label>
                                                <input class="form-check-input" type="checkbox" value="50x70" id="flexCheck50x70" 
                                                       {{ $jobOrder->Pallet_measuring_notes == '50x70' ? 'checked' : '' }} />
                                            </div>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="num" 
                                                   value="" placeholder="{{$jobOrder->The_notebook_is_the_type_of_internal_paper}}" />
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-g">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label for="num" class="mx-2">العدد </label>
                                        <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="{{ $jobOrder->Quantity_Writing }}"  />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-4">
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" value="" {{ $jobOrder->number_type === 'Half binding' ? 'checked' : '' }}  />
                                            <label class="form-check-label">نصف&nbsp;ملزمة</label>
                                        </div>
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" value="" {{ $jobOrder->number_type === 'Quarter of a notebook' ? 'checked' : '' }}  />
                                            <label class="form-check-label">ربع&nbsp;ملزمة</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-grid" style="grid-template-columns: auto auto auto auto auto">
                                        <label class="form-check-label mt-1">طوي الكتاب</label>
                                        @php
                                        $foldValues = ['32', '16', '8', '4']; // Define your enum values
                                        $selectedFold = $jobOrder->fold_the_book; // Assuming fold_the_book stores the single value
                                    @endphp
                                    
                                    @foreach ($foldValues as $fold)
                                        <div class="form-check mt-1">
                                            <label class="form-check-label">{{ $fold }}</label>
                                            <input class="form-check-input" type="checkbox" value="{{ $fold }}" 
                                                   {{ $selectedFold === $fold ? 'checked' : '' }} />
                                        </div>
                                    @endforeach
                                    
                                    
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="d-grid" style="grid-template-columns: 1fr auto">
                                        <div class="d-flex align-items-center">
                                            <label for="num" class="mx-2">ملاحظات </label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="{{ $jobOrder->notes }}"  />
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label for="num" class="mx-2">اعداد </label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="{{ $jobOrder->Lieutenant_Prepared_by }}"  />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th rowspan="3" class="text-black">غلاف الكتاب <br /> + <br /> عمل تجاري</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label for="num" class="mx-2">نوع&nbsp;الورق </label>
                                        <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="{{ $jobOrder->Paper_type }}"  />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check-label">قياس&nbsp;البليتات:&nbsp;</label>
                                            <div class="form-check mt-1">
                                                <label class="form-check-label">70x100</label>
                                                <input class="form-check-input" type="checkbox" value="" {{ $jobOrder->cover_pallet_measurement == '70x100' ? 'checked' : '' }}  />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check mt-1">
                                                <label class="form-check-label">50ｘ70</label>
                                                <input class="form-check-input" type="checkbox" value="" {{ $jobOrder->cover_pallet_measurement == '50x70' ? 'checked' : '' }}  />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-grid" style="grid-template-columns: auto auto">
                                        <div class="form-check mt-1">
                                            <label class="form-check-label">وجه</label>
                                            <input class="form-check-input" type="checkbox" value="" {{ $jobOrder->cover_pallet_measurement_type === 'face' ? 'checked' : '' }}  />
                                        </div>
                                        <div class="form-check mt-1">
                                            <label class="form-check-label">وجهان</label>
                                            <input class="form-check-input" type="checkbox" value="" {{ $jobOrder->cover_pallet_measurement_type === 'Two faces' ? 'checked' : '' }}  />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-gray">
                                <td colspan="4">
                                    <div class="d-grid" style="grid-template-columns: 1fr auto">
                                        <div class="d-flex align-items-center">
                                            <label for="num" class="mx-2">ملاحظات </label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="{{ $jobOrder->cover_notes }}"  />
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label for="num" class="mx-2">اعداد </label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="{{ $jobOrder->cover_created_by }}"  />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-----------------------main  ----------------------------->
    <div class="container text-right mt-3">
        <div class="row">
            <div class="col-md-8 col-12 d-flex align-items-stretch">
                <table class="table table-bordered">
                    <tbody>
                        <tr class="first">
                            <th rowspan="6" class="text-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <span class="font">الطباعة&nbsp;(أوفست)</span>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row" style="vertical-align: middle" class="text-center text-black">
                                نوع المطبوع
                            </th>
                            <td colspan="3">
                                <div class="d-flex gap-4 align-items-center justify-content-center mt-2">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="8 Color 70x100" id="color8" 
                                               {{ $jobOrder->color_lieutenant === '8 Color 70x100' ? 'checked' : '' }} />
                                        <label class="form-check-label mx-2" for="color8">
                                            70ｘ100 (8 color)
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="4 Color 70x100" id="color4" 
                                               {{ $jobOrder->color_lieutenant === '4 Color 70x100' ? 'checked' : '' }} />
                                        <label class="form-check-label mx-2" for="color4">
                                            70ｘ100 (4 color)
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="70x100" id="normal" 
                                               {{ $jobOrder->color_lieutenant === '50x70' ? 'checked' : '' }} />
                                        <label class="form-check-label mx-2" for="normal">
                                            50ｘ70
                                        </label>
                                    </div>
                                    
                                </div>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2">{{ $jobOrder->lieutenant_text }}</textarea>
                            </td>
                        </tr>
    
                        <tr>
                            <th scope="row" style="vertical-align: middle" class="text-center text-black">
                                غلاف الكتاب <br />
                                + <br />
                                عمل تجاري
                            </th>
                            <td colspan="3">
                                <div class="d-flex gap-2 align-items-center justify-content-center mt-2">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="4 Color 70x100" id="cover4" 
                                               {{ $jobOrder->cover_color === '4 Color 70x100' ? 'checked' : '' }} />
                                        <label class="form-check-label mx-2" for="cover4">
                                            70ｘ100 (4 color)
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="70x100" id="coverNormal" 
                                               {{ $jobOrder->cover_color === '70x100' ? 'checked' : '' }} />
                                        <label class="form-check-label mx-2" for="coverNormal">
                                            70ｘ100
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="50x70" id="cover50" 
                                               {{ $jobOrder->cover_color === '50x70' ? 'checked' : '' }} />
                                        <label class="form-check-label mx-2" for="cover50">
                                            50x70
                                        </label>
                                    </div>
                                    
                                </div>
                                <textarea class="form-control" id="exampleFormControlTextarea2" rows="2">{{ $jobOrder->cover_notes }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-12 d-flex align-items-stretch">
                <table class="table table-bordered">
                    <tbody>
                        <tr class="first">
                            <th rowspan="5" class="text-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" />
                                <span class="font">الطباعة&nbsp;(دجتال)</span>
                            </th>
                        </tr>
    
                        <tr>
                            <td colspan="3">
                                <textarea class="form-control" id="exampleFormControlTextarea3" rows="5">{{ $jobOrder->Book_cover_text }}</textarea>
    
                                <div class="d-flex align-items-center mt-2">
                                    <label for="num" class="mx-2">اعداد </label>
                                    <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="num" value="{{ $jobOrder->Printing_digital_ctreated_by }}"  />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-----------------------main  ----------------------------->
    <div class="container text-right mt-3">
        <div class="row">
            <div class="col-md-8 col-12 d-flex align-items-stretch">
                <table class="table table-bordered">
                    <tbody>
                        <tr class="first">
                            <th rowspan="6" class="text-center">
                                <span class="font" style="top: 27%">التجليد&nbsp;و&nbsp;السلوفان</span>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row" style="vertical-align: middle" class="text-center text-black">
                                الكعب
                            </th>
                            <td>
                                <div class="d-flex gap-4 align-items-center justify-content-center">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="Horse" id="flexCheckHorse" {{ $jobOrder->The_heel == 'Horse' ? 'checked' : '' }}  />
                                        <label class="form-check-label mx-2" for="flexCheckHorse">
                                            شك حصان
                                        </label>
                                        
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value="Sewing" id="flexCheckSewing" {{ $jobOrder->The_heel == 'tailoring' ? 'checked' : '' }}  />
                                            <label class="form-check-label mx-2" for="flexCheckSewing">
                                                خياطة
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value="Cut" id="flexCheckCut" {{ $jobOrder->The_heel == 'brush' ? 'checked' : '' }}  />
                                            <label class="form-check-label mx-2" for="flexCheckCut">
                                                برش
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>
    
                        <tr>
                            <th scope="row" style="vertical-align: middle" class="text-center text-black">
                                السلوفان
                            </th>
                            <td>
                                <div class="d-flex gap-2 align-items-center justify-content-center">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="Shiny" id="flexCheckShiny" {{ $jobOrder->Slovenia == 'shiny' ? 'checked' : '' }}  />
                                        <label class="form-check-label mx-2" for="flexCheckShiny">
                                            لامع
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="Matte" id="flexCheckMatte" {{ $jobOrder->Slovenia == 'matte' ? 'checked' : '' }}  />
                                        <label class="form-check-label mx-2" for="flexCheckMatte">
                                            مط
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="d-flex align-items-center">
                                    <label for="notes" class="mx-2">ملاحظات </label>
                                    <textarea class="form-control" id="notes" rows="2">{{ $jobOrder->Slovenia_text }}</textarea>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-12 d-flex align-items-stretch">
                <table class="table table-bordered">
                    <tbody>
                        <tr class="first">
                            <th rowspan="6" class="text-center">
                                <span class="font">مابعد&nbsp;الطباعة</span>
                            </th>
                        </tr>
    
                        <tr>
                            <td colspan="3">
                                <textarea class="form-control" id="postPrintingNotes" rows="6">{{ $jobOrder->after_printing }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
  </main>

  <!-----------------------js----------------------------->

  <script src="{{ url('assets') }}/invoice/js/bootstrap.min.js"></script>
</body>

</html>