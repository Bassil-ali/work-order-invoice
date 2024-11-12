<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('assets') }}/invoice/css/bootstrap.rtl.min.css" />
  <link rel="stylesheet" href="{{ url('assets') }}/invoice/css/style.css" />
  <title>أمر عمل </title>
  <style>
    input[type="checkbox"] {
        pointer-events: none;
    }
</style>
</head>

<body>
  <main>
    <!----------------------- top ----------------------------->
    <div class="font text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-9 d-flex align-items-stretch">
              <div class="w-100">
                <div class="logo mt-2 d-flex justify-content-between align-items-end">
                  <img
                    src="{{ asset('assets/invoice/image/logo.png') }}"
                    class="img-fluid"
                    style="width: 170px"
                    alt="main-logo"
                  />
                  <div class="title text-center">
                    <h3 class="mb-0" style="background-color: #acd8af">
                      أمر عمل JOB ORDER
                    </h3>
                  </div>
                </div>
                <div class="align-items-center mt-1 d-md-flex d-none">
                  <p class="mb-0">اسم&nbsp;العميل:</p>
                  <input readonly
                    type="text"
                    class="form-control-plaintext pb-0 pt-0 mb-2"
                    id="num"
                    value="{{ $jobOrder->customer_name }}"
                  />
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch" style="width:auto; max-width: 150px; height: 120px; overflow: hidden;">
              <div
                class="img-job w-100 d-flex flex-column align-items-center justify-content-center mt-1"
              >
               
                @if($jobOrder->photo)
                  <img src="{{ asset('storage/' . $jobOrder->photo) }}" alt="Job Order Image" class="img-fluid" style="width:auto; max-width: 150px; height: 120px; overflow: hidden;">
                @endif
              </div>
            </div>
            <div class="col-12">
              <div class="align-items-center mt-2 d-md-none d-flex">
                <p class="mb-0">اسم&nbsp;العميل:</p>
                <input readonly
                  type="text"
                  class="form-control-plaintext pb-0 pt-0 mb-2"
                  id="num"
                  value="{{ $jobOrder->customer_name }}"
                />
              </div>
              <div class="d-flex align-items-center mt-1">
                <p class="mb-0">اسم&nbsp;العمل:</p>
                <input readonly
                  type="text"
                  class="form-control-plaintext pb-0 pt-0 mb-2"
                  id="num"
                  value="{{ $jobOrder->business_name }}"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center mt-1">
                <p class="mb-0">اليوم/&nbsp;التاريخ:</p>
                <input readonly
                  type="text"
                  class="form-control-plaintext pb-0 pt-0 mb-2"
                  id="num"
                  value="{{ $jobOrder->day_date }}"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center mt-1">
                <p class="mb-0">موعد&nbsp;التسليم:</p>
                <input readonly
                  type="text"
                  class="form-control-plaintext pb-0 pt-0 mb-2"
                  id="num"
                  value="{{ $jobOrder->delivery_date }}"
                />
              </div>
            </div>
          </div>
        </div>
    </div>
  @if($userRole->user_role == "manager")
    <div class="container text-right mt-3">
        <div class="row">
          <div class="col-12">
            <div class="card-1 p-2">
              <div class="d-grid mb-3">
                <div class="d-flex align-items-center">
                  <label for="num" class="mx-2 font">السعر</label>
                  <input readonly
                    type="text"
                    class="form-control-plaintext pb-0 pt-0 mb-1"
                    id="num"
                    value="{{ $jobOrder->Price }}"
                  />
                </div>
                <div class="d-flex align-items-center">
                  <label for="num" class="mx-2 text-black">ملاحظات</label>
                  <input readonly
                    type="text"
                    class="form-control-plaintext pb-0 pt-0 mb-1"
                    id="num"
                    value="{{ $jobOrder->notes }}"
                  />
                </div>
              </div>
               <div class="d-grid align-items-center">
                    <p class="mb-0 font-2 text-black">وسيلة السداد :</p>
                    
                    <!-- Dynamically generate payment method checkboxes -->
                    @php
                        $paymentMethods = [
                            'Cash Instant Check' => 'نقدي(شيك فوري)',
                            'Receivables Account' => 'ذمم(بالحساب)',
                            'Receivables Checks' => 'ذمم(شيكات)',
                            'Electronic Transfer' => 'تحويل إلكتروني',
                            'Bank Card' => 'بطاقة بنكية',
                        ];
                    @endphp
                    
                    @foreach($paymentMethods as $method => $arabic)
                        <div class="form-check mb-0">
                            <input readonly 
                                class="form-check-input" 
                                type="checkbox" disabled
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
  @endif
    </div>
      

    
      

    <!-----------------------main  ----------------------------->
    <div class="container mt-3">
        <div class="title text-center">
          <h3 class="mb-0">المواصفات Description</h3>
        </div>
        <div class="custom-tabel mt-0 d-flex">
          <div class="d-flex align-items-stretch">
            <div class="thead d-flex align-items-center">
              <div class="first">مواصفات&nbsp;المطبوع</div>
            </div>
          </div>

          <div
            class="tbody w-100 d-flex justify-content-center align-items-stretch flex-column"
          >
          <div class="row g-0 align-items-center">
            <div class="col-2">
              <div class="th ms-1">نوع المطبوع</div>
            </div>
            <div class="col-10">
              <div class="row">
                <div class="col-12 br d-flex justify-content-between align-items-center">
                  <div class="form-check mb-0">
                    <input readonly
                      class="form-check-input"
                      type="checkbox"
                      value="Book"
                      id="flexCheckDefaultBook"
                      {{ $jobOrder->type_of_publication == 'Book' ? 'checked' : '' }}
                    />
                    <label class="form-check-label" for="flexCheckDefaultBook">كتاب</label>
                  </div>
                  <div class="d-flex align-items-center">
                    <label for="num" class="mx-2 pt-1">عدد&nbsp;الصفحات</label>
                    <input readonly
                      type="text"
                      class="form-control-plaintext pb-0 pt-0 mb-1"
                      id="num"
                      value="{{ $jobOrder->number_of_pages ?? '' }}"
                    />
                  </div>
                  <div class="form-check d-flex align-items-center ms-2">
                    <input readonly
                      class="form-check-input"
                      type="checkbox"
                      value="Other"
                      id="flexCheckDefaultOther"
                      {{ $jobOrder->type_of_publication == 'Other' ? 'checked' : '' }}
                    />
                    <label class="form-check-label mx-2 pt-1" for="flexCheckDefaultOther">أخرى</label>
                    <input readonly
                      type="text"
                      class="form-control-plaintext pt-0 mb-1 pb-0"
                      id="otherType"
                      value="{{ $jobOrder->other ?? '' }}"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          

          <div class="row g-0 align-items-center">
            <div class="col-2">
              <div class="th ms-1">القياس</div>
            </div>
            <div class="col-10">
              <div class="row">
                <!-- Commercial Size -->
                <div class="col-4 br">
                  <div class="form-check mt-1">
                    <input readonly
                      class="form-check-input"
                      type="checkbox"
                      value="20.5x28 Commercial"
                      id="flexCheckCommercial"
                      {{ $jobOrder->Measurement == 'Educational Offer Size 28x21' ? 'checked' : '' }}
                    />
                    <label class="form-check-label" for="flexCheckCommercial">
                      20.5ｘ28 قياس تجـــاري
                    </label>
                  </div>
                </div>
          
                <!-- Test Tender Size -->
                <div class="col-4 br-bl">
                  <div class="form-check mt-1">
                    <input readonly
                      class="form-check-input"
                      type="checkbox"
                      value="21x28 Test Tender"
                      id="flexCheckTender"
                      {{ $jobOrder->Measurement == 'Commercial Size 28x20.5' ? 'checked' : '' }}
                    />
                    <label class="form-check-label" for="flexCheckTender">
                      21ｘ28 قياس عطاء التجربة
                    </label>
                  </div>
                </div>
          
                <!-- Custom Size -->
                <div class="col-4">
                  <div class="d-flex">
                    <div class="form-check mt-1">
                      <input readonly
                        class="form-check-input"
                        type="checkbox"
                        value="Custom Measure"
                        id="flexCheckCustom"
                        {{ $jobOrder->Measurement == 'Special Size' ? 'checked' : '' }}
                      />
                      <label class="form-check-label" for="flexCheckCustom">
                        قياس&nbsp;خاص
                      </label>
                    </div>
                    <input readonly
                      type="text"
                      class="form-control-plaintext pt-0 mb-1 pb-0"
                      id="customMeasure"
                      value="{{ $jobOrder->Special_Size ?? '' }}"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row g-0 align-items-center">
            <div class="col-2">
              <div class="th ms-1">الكمية</div>
            </div>
            <div class="col-10">
              <div class="row">
                <!-- Number Input (بالأرقام) -->
                <div class="col-5 br-bl">
                  <div class="d-flex align-items-center">
                    <label for="numDigits" class="me-2">بالأرقام </label>
                    <input readonly
                      type="text"
                      class="form-control-plaintext pb-0 pt-0 mb-1"
                      id="numDigits"
                      value="{{ $jobOrder->Quantity_in_numbers ?? '' }}"
                    />
                  </div>
                </div>
          
                <!-- Words Input (كتابة) -->
                <div class="col-7">
                  <div class="d-flex align-items-center">
                    <label for="numWords" class="me-2">كتابة </label>
                    <input readonly
                      type="text"
                      class="form-control-plaintext pb-0 pt-0 mb-1"
                      id="numWords"
                      value="{{ $jobOrder->Quantity_Writing ?? '' }}"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row g-0 align-items-center">
            <div class="col-2">
              <div class="th ms-1">عدد الالوان</div>
            </div>
            <div class="col-10">
              <div class="row">
                <!-- Interior Colors (الداخلي) -->
                <div class="col-6 br-bl d-flex flex-wrap justify-content-between">
                  <div class="d-flex">
                    <label class="form-check-label mt-1 me-2" for="flexCheckDefaultInterior">الداخلي</label>
                    <div class="form-check mt-1">
                      <label class="form-check-label" for="flexCheckCMYKInterior">
                        <span style="color: #00adee">C</span>
                        <span style="color: #ed008c">M</span>
                        <span style="color: #fed400">Y</span>
                        <span style="color: #221e1f">K</span>
                      </label>
                      <input readonly class="form-check-input" type="checkbox" disabledvalue="CMYK" id="flexCheckCMYKInterior"
                        {{ in_array('CMYK', explode(',', $jobOrder->Number_of_interior_colors ?? '')) ? 'checked' : '' }} />
                    </div>
                  </div>
          
                  <!-- Individual Colors C, M, Y, K -->
                  <div class="d-flex">
                    @foreach(['C' => '#00adee', 'M' => '#ed008c', 'Y' => '#fed400', 'K' => '#221e1f'] as $color => $colorCode)
                      <div class="form-check mt-1 me-3">
                        <label class="form-check-label" for="flexCheck{{ $color }}Interior" style="color: {{ $colorCode }}">
                          {{ $color }}
                        </label>
                        <input readonly class="form-check-input" type="checkbox" disabledvalue="{{ $color }}" id="flexCheck{{ $color }}Interior"
                          {{ in_array($color, explode(',', $jobOrder->Number_of_interior_colors ?? '')) ? 'checked' : '' }} />
                      </div>
                    @endforeach
                  </div>
                </div>
          
                <!-- Cover or Commercial Colors (غلاف أو تجاري) -->
                <div class="col-6 d-flex flex-wrap justify-content-between">
                  <div class="d-flex">
                    <label class="form-check-label mt-1 me-2" for="flexCheckDefaultCover">غلاف (أو تجاري)</label>
                    <div class="form-check mt-1">
                      <label class="form-check-label" for="flexCheckCMYKCover">
                        <span style="color: #00adee">C</span>
                        <span style="color: #ed008c">M</span>
                        <span style="color: #fed400">Y</span>
                        <span style="color: #221e1f">K</span>
                      </label>
                      <input readonly class="form-check-input" type="checkbox" disabledvalue="CMYK" id="flexCheckCMYKCover"
                        {{ in_array('CMYK', explode(',', $jobOrder->Number_of_colors_Cover_or_commercial ?? '')) ? 'checked' : '' }} />
                    </div>
                  </div>
          
                  <!-- Individual Colors C, M, Y, K -->
                  <div class="d-flex">
                    @foreach(['C' => '#00adee', 'M' => '#ed008c', 'Y' => '#fed400', 'K' => '#221e1f'] as $color => $colorCode)
                      <div class="form-check mt-1 me-3">
                        <label class="form-check-label" for="flexCheck{{ $color }}Cover" style="color: {{ $colorCode }}">
                          {{ $color }}
                        </label>
                        <input readonly class="form-check-input" type="checkbox" disabledvalue="{{ $color }}" id="flexCheck{{ $color }}Cover"
                          {{ in_array($color, explode(',', $jobOrder->Number_of_colors_Cover_or_commercial ?? '')) ? 'checked' : '' }} />
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row g-0 align-items-center">
            <div class="col-2">
              <div class="th ms-1">ملاحظات</div>
            </div>
            <div class="col-10">
              <div class="row">
                <div class="col-12 br">
                  <input readonly
                    type="text"
                    class="form-control-plaintext mx-1 pb-0 pt-0 mb-1"
                    id="num"
                    value="{{ $jobOrder->notes ?? '' }}"
                  />
                </div>
              </div>
            </div>
          </div>
          
          </div>
        </div>
      </div>
    
      
   
   
    <!-----------------------main  ----------------------------->
    <div class="container">
        <div class="custom-tabel d-flex">
          <div class="d-flex align-items-stretch">
            <div class="thead d-flex align-items-center">
              <div class="first">التصميم&nbsp;والمونتاج</div>
            </div>
          </div>

          <div
            class="tbody w-100 d-flex justify-content-center align-items-stretch flex-column"
          >
            <div class="row g-0 align-items-center">
              <div class="col-2">
                <div class="th ms-1">الملازم</div>
              </div>
              <div class="col-10">
                <div class="row">
                    <div class="col-4 br d-flex align-items-center">
                        <label for="num" class="me-2">نوع&nbsp;الورق&nbsp;الداخلي</label>
                        <input readonly
                            type="text"
                            class="form-control-plaintext pb-0 pt-0 mb-1"
                            id="num"
                            value="{{ $jobOrder->Quantity_in_numbers ?? '' }}"
                        />
                    </div>
                    <div class="col-8 br ps-0">
                        <div
                            class="d-grid align-items-center justify-content-between"
                            style="grid-template-columns: auto auto auto"
                        >
                            <label class="form-check-label ps-1" for="flexCheckDefault">
                                قياس&nbsp;البليتات:&nbsp;
                            </label>
                            <div class="form-check mt-1 ms-2">
                                <label style="width: max-content" class="form-check-label" for="flexCheck70x100">
                                    70ｘ100
                                </label>
                                <input readonly
                                    class="form-check-input"
                                    type="checkbox"
                                    value="70x100"
                                    id="flexCheck70x100"
                                    {{ $jobOrder->Pallet_measuring_notes == '70x100' ? 'checked' : '' }}  
                                />
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="form-check mt-1">
                                    <label style="width: max-content" class="form-check-label" for="flexCheck50x70">
                                        50ｘ70
                                    </label>
                                    <input readonly
                                        class="form-check-input"
                                        type="checkbox"
                                        value="50x70"
                                        id="flexCheck50x70"
                                        {{ $jobOrder->Pallet_measuring_notes == '50x70' ? 'checked' : '' }}  
                                    />
                                </div>
                                <input readonly
                                    type="text"
                                    class="form-control-plaintext pb-0 pt-0 mb-1"
                                    id="num_internal_paper"
                                    value="{{ $jobOrder->The_notebook_is_the_type_of_internal_paper ?? '' }}"  
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>

            <div class="row g-0 align-items-center">
              <div class="col-2"></div>
              <div class="col-10">
                <div class="row">
                    <!-- Input for العدد -->
                    <div class="col-3 br d-flex align-items-center">
                        <label for="num" class="me-2">العدد</label>
                        <input readonly
                            type="text"
                            class="form-control-plaintext pb-0 pt-0 mb-1"
                            id="num"
                            value="{{ $jobOrder->Quantity_in_numbers ?? '' }}"  
                        />
                    </div>
                    
                    <!-- Half and Quarter Binding checkboxes -->
                    <div class="col-4 br-bl d-flex">
                        <div class="form-check mt-1">
                            <input readonly
                                class="form-check-input"
                                type="checkbox"
                                value="Half binding"
                                id="flexCheckHalfBinding"
                                {{ $jobOrder->number_type === 'Half binding' ? 'checked' : '' }} 
                            />
                            <label class="form-check-label" for="flexCheckHalfBinding">
                                نصف&nbsp;ملزمة
                            </label>
                        </div>
                        <div class="form-check mt-1 ms-3">
                            <input readonly
                                class="form-check-input"
                                type="checkbox"
                                value="Quarter of a notebook"
                                id="flexCheckQuarterBinding"
                                {{ $jobOrder->number_type === 'Quarter of a notebook' ? 'checked' : '' }}  
                            />
                            <label class="form-check-label" for="flexCheckQuarterBinding">
                                ربع&nbsp;ملزمة
                            </label>
                        </div>
                    </div>
                    
                    <!-- Book Folding checkboxes -->
                    <div class="col-5 d-flex justify-content-between pe-3">
                        <label class="form-check-label mt-1">طوي الكتاب</label>
                        @php
                            $foldValues = ['4', '8', '16', '32']; 
                            $selectedFold = $jobOrder->fold_the_book;  
                        @endphp
                        
                        @foreach ($foldValues as $fold)
                            <div class="form-check mt-1">
                                <label class="form-check-label" for="flexCheck{{ $fold }}">
                                    {{ $fold }}
                                </label>
                                <input readonly
                                    class="form-check-input  ps-0 pe-0 p-0"
                                    type="checkbox"
                                    value="{{ $fold }}"
                                    onclick="this.checked=!this.checked;"
                                    id="flexCheck{{ $fold }}"
                                    {{ in_array($fold, (array)json_decode($selectedFold)) ? 'checked' : '' }} 
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            </div>
            <div class="row g-0 align-items-center">
                <div class="col-2"></div>
                <div class="col-10">
                    <div class="row">
                        <!-- Mلاحظات field -->
                        <div class="col-7 br">
                            <div class="d-flex align-items-center">
                                <label for="notes" class="me-2">ملاحظات</label>
                                <input readonly
                                    type="text"
                                    class="form-control-plaintext pb-0 pt-0 mb-1"
                                    id="notes"
                                    value="{{ $jobOrder->notes ?? '' }}" 
                                />
                            </div>
                        </div>
                        
                        <!-- اعداد field -->
                        <div class="col-5">
                            <div class="d-flex align-items-center">
                                <label for="prepared_by" class="me-2">اعداد</label>
                                <input readonly
                                    type="text"
                                    class="form-control-plaintext pb-0 pt-0 mb-1"
                                    id="prepared_by"
                                    value="{{ $jobOrder->Lieutenant_Prepared_by ?? '' }}" 
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-0 align-items-center">
              <div class="col-2">
                <div class="th ms-1">غلاف الكتاب + عمل تجاري</div>
              </div>
              <div class="col-10">
                <div class="row">
                  <div class="col-3 br d-flex align-items-center">
                    <label for="num" class="me-2">نوع&nbsp;الورق </label>
                    <input readonly
                      type="text"
                      class="form-control-plaintext pb-0 pt-0 mb-1"
                      id="num"
                      value="{{ $jobOrder->Paper_type }}"
                    />
                  </div>
                  <div class="col-6 br">
                    <div class="d-grid align-items-center justify-content-between" style="grid-template-columns: auto auto auto">
                        <label class="form-check-label" for="flexCheckDefault">
                            قياس&nbsp;البليتات:&nbsp;
                        </label>
                        <div class="form-check mt-1">
                            <label style="width: max-content" class="form-check-label" for="flexCheckDefault">
                                70×100
                            </label>
                            <input readonly
                                class="form-check-input"
                                type="checkbox"
                                value="70x100"
                                id="flexCheck70x100"
                                {{ $jobOrder->cover_pallet_measurement == '70x100' ? 'checked' : '' }}
                            />
                        </div>
                        <div class="d-flex align-items-center">
                        <div class="form-check mt-1">
                            <label style="width: max-content" class="form-check-label" for="flexCheckDefault">
                                50×70
                            </label>
                            <input readonly
                                class="form-check-input"
                                type="checkbox"
                                value="50x70"
                                id="flexCheck50x70"
                                {{ $jobOrder->cover_pallet_measurement == '50x70' ? 'checked' : '' }}
                            />
                        </div>
                        <input readonly
                            type="text"
                            class="form-control-plaintext pb-0 pt-0 mb-1"
                            id="paper_type"
                            value="{{ $jobOrder->Paper_type ?? '' }}"
                        />
                        </div>
                    </div>
                </div>
                
                <div class="col-3 d-flex align-items-center">
                    <div class="form-check mt-1 me-3">
                        <label class="form-check-label" for="flexCheckFace">
                            وجه
                        </label>
                        <input readonly
                            class="form-check-input mt-1"
                            type="checkbox"
                            value="face"
                            id="flexCheckFace"
                            {{ $jobOrder->cover_pallet_measurement_type == 'face' ? 'checked' : '' }}
                        />
                    </div>
                    <div class="form-check mt-1">
                        <label class="form-check-label" for="flexCheckTwoFaces">
                            وجهان
                        </label>
                        <input readonly
                            class="form-check-input mt-1"
                            type="checkbox"
                            value="Two faces"
                            id="flexCheckTwoFaces"
                            {{ $jobOrder->cover_pallet_measurement_type == 'Two faces' ? 'checked' : '' }}
                        />
                    </div>
                </div>
                
                </div>
              </div>
            </div>
            <div class="row g-0 align-items-center">
              <div class="col-2"></div>
              <div class="col-10">
                <div class="row">
                  <div class="col-7 br">
                    <div class="d-flex align-items-center">
                      <label for="num" class="me-2">ملاحظات </label>
                      <input readonly
                        type="text"
                        class="form-control-plaintext pb-0 pt-0 mb-1"
                        id="num"
                        value="{{ $jobOrder->cover_notes }}"
                      />
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="d-flex align-items-center">
                      <label for="num" class="me-2">اعداد </label>
                      <input readonly
                        type="text"
                        class="form-control-plaintext pb-0 pt-0 mb-1"
                        id="num"
                        value="{{ $jobOrder->cover_created_by }}"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    
    <!-----------------------main  ----------------------------->
    <div class="container px-0">
        <div class="row">
          <div class="col-8 pe-0">
            <div class="container">
              <div class="custom-tabel d-flex">
                <div class="d-flex align-items-stretch">
                  <div class="thead d-flex align-items-center">
                    <div class="form-check d-flex align-items-center">
                      <input readonly
                        class="form-check-input mt-3"
                        type="checkbox"
                        value=""
                        id="flexCheckDefault"
                      />
                    </div>
                    <div class="first" style="top: 40%">
                      الطباعة&nbsp;(أوفست)
                    </div>
                  </div>
                </div>

                <div
                  class="tbody w-100 d-flex justify-content-center align-items-stretch flex-column"
                >
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <div class="th text-center">الملازم</div>
                    </div>
                    <div class="col-10">
                        <div class="row g-0">
                            <div class="col-12 br">
                                <div class="d-flex gap-lg-4 gap-1 align-items-center justify-content-center mt-2">
                                    <!-- 8 Color 70x100 Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="8 Color 70x100"
                                            id="color8"
                                            {{ $jobOrder->color_lieutenant === '8 Color 70x100' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="color8">
                                            70ｘ100 (8 color)
                                        </label>
                                    </div>
                                    <!-- 4 Color 70x100 Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="4 Color 70x100"
                                            id="color4"
                                            {{ $jobOrder->color_lieutenant === '4 Color 70x100' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="color4">
                                            70ｘ100 (4 color)
                                        </label>
                                    </div>
                                    <!-- 50x70 Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="70x100"
                                            id="normal"
                                            {{ $jobOrder->color_lieutenant === '50x70' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="normal">
                                            50x70
                                        </label>
                                    </div>
                                </div>
                                
                                <!-- Textarea for Lieutenant Text -->
                                <textarea  readonly
                                    class="form-control"
                                    id="exampleFormControlTextarea1"
                                    rows="2"
                                >{{ $jobOrder->lieutenant_text }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <div class="th text-center">غلاف الكتاب + عمل تجاري</div>
                    </div>
                    <div class="col-10">
                        <div class="row g-0">
                            <div class="col-12 br">
                                <div class="d-flex gap-lg-4 gap-1 flex-wrap align-items-center justify-content-center mt-2">
                                    <!-- 4 Color 70x100 Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="4 Color 70x100"
                                            id="cover4"
                                            {{ $jobOrder->cover_color === '4 Color 70x100' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="cover4">
                                            70ｘ100 (4 color)
                                        </label>
                                    </div>
                                    <!-- 70x100 Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="70x100"
                                            id="coverNormal"
                                            {{ $jobOrder->cover_color === '70x100' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="coverNormal">
                                            70ｘ100
                                        </label>
                                    </div>
                                    <!-- 50x70 Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="50x70"
                                            id="cover50"
                                            {{ $jobOrder->cover_color === '50x70' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="cover50">
                                            50x70
                                        </label>
                                    </div>
                                </div>
                    
                                <!-- Textarea for Cover Notes -->
                                <textarea  readonly
                                    class="form-control"
                                    id="exampleFormControlTextarea2"
                                    rows="2"
                                >{{ $jobOrder->cover_notes }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-4 ps-0">
            <div class="container ps-0">
              <div class="custom-tabel d-flex">
                <div class="d-flex align-items-stretch">
                  <div class="thead d-flex align-items-center">
                    <div class="form-check d-flex align-items-center">
                      <input readonly
                        class="form-check-input mt-3"
                        type="checkbox"
                        value=""
                        id="flexCheckDefault"
                      />
                    </div>
                    <div class="first" style="top: 40%">
                      الطباعة&nbsp;(ديجيتال)
                    </div>
                  </div>
                </div>

                <div
                  class="tbody w-100 d-flex justify-content-center align-items-stretch flex-column"
                >
                  <div class="row g-0 align-items-center">
                    <div class="col-12 p-2">
                      <textarea  readonly
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        style="height: 134px"
                      >{{ $jobOrder->Book_cover_text }}</textarea>

                      <div class="row justify-content-end">
                        <div class="col-8">
                          <div class="d-flex align-items-center">
                            <label for="num" class="mx-2">اعداد </label>
                            <input readonly
                              type="text"
                              class="form-control-plaintext pb-0 pt-0 mb-1"
                              id="num"
                              value="{{ $jobOrder->Printing_digital_ctreated_by }}"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    <!-----------------------main  ----------------------------->
    <div class="container px-0">
        <div class="row">
          <div class="col-8 pe-0">
            <div class="container">
              <div class="custom-tabel d-flex">
                <div class="d-flex align-items-stretch">
                  <div class="thead d-flex align-items-center">
                    <div class="first">التجليد&nbsp;و&nbsp;السلوفان</div>
                  </div>
                </div>

                <div
                  class="tbody w-100 d-flex justify-content-center align-items-stretch flex-column"
                >
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <div class="th text-center">الكعب</div>
                    </div>
                    <div class="col-10">
                        <div class="row g-0">
                            <div class="col-12 br">
                                <div class="d-flex gap-lg-4 gap-1 align-items-center justify-content-center mt-2">
                                    <!-- Horse Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="Horse"
                                            id="flexCheckHorse"
                                            {{ $jobOrder->The_heel == 'Horse' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="flexCheckHorse">
                                            شك حصان
                                        </label>
                                    </div>
                                    <!-- Sewing Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="Sewing"
                                            id="flexCheckSewing"
                                            {{ $jobOrder->The_heel == 'tailoring' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="flexCheckSewing">
                                            خياطة
                                        </label>
                                    </div>
                                    <!-- Cut Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="Cut"
                                            id="flexCheckCut"
                                            {{ $jobOrder->The_heel == 'brush' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="flexCheckCut">
                                            برش
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <div class="th text-center">السلوفان</div>
                    </div>
                    <div class="col-10">
                        <div class="row g-0">
                            <div class="col-12 br">
                                <div class="d-flex gap-lg-4 gap-1 flex-wrap align-items-center justify-content-center mt-2">
                                    <!-- Shiny Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="Shiny"
                                            id="flexCheckShiny"
                                            {{ $jobOrder->Slovenia == 'shiny' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="flexCheckShiny">
                                            لامع
                                        </label>
                                    </div>
                                    <!-- Matte Checkbox -->
                                    <div class="form-check d-flex align-items-center">
                                        <input readonly
                                            class="form-check-input"
                                            type="checkbox"
                                            value="Matte"
                                            id="flexCheckMatte"
                                            {{ $jobOrder->Slovenia == 'matte' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label mx-2" for="flexCheckMatte">
                                            مط
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="row g-0 align-items-center">
                    <div class="col-12">
                      <div class="row g-0">
                        <div class="col-12">
                          <div class="d-flex align-items-center w-100 p-2">
                            <label for="num" class="me-2">ملاحظات </label>
                            <textarea  readonly
                              class="form-control"
                              id="exampleFormControlTextarea1"
                              row="3"
                            >{{ $jobOrder->Slovenia_text }}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-4 ps-0">
            <div class="container ps-0">
              <div class="custom-tabel d-flex">
                <div class="d-flex align-items-stretch">
                  <div class="thead d-flex align-items-center">
                    <div class="first">مابعد&nbsp;الطباعة</div>
                  </div>
                </div>

                <div
                  class="tbody w-100 d-flex justify-content-center align-items-stretch flex-column"
                >
                  <div class="row g-0 align-items-center">
                    <div class="col-12 p-2">
                      <textarea  readonly
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        style="height: 131px"
                      >{{ $jobOrder->after_printing }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
  </main>

  <!-----------------------js----------------------------->

  <script src="{{ url('assets') }}/invoice/js/bootstrap.min.js"></script>
  </script>
</body>

</html>