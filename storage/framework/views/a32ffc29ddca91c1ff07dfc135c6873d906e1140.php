<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/invoice/css/bootstrap.rtl.min.css" />
  <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/invoice/css/style.css" />
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
                  <img src="<?php echo e(url('assets')); ?>/invoice/image/logo.png" class="img-fluid" style="width: 200px" alt="main-logo" />
                  <div class="title text-center">
                    <h2 class="mb-0">أمر عمل JOB ORDER</h2>
                  </div>
                </div>
                <div class="align-items-center mt-1 d-md-flex d-none">
                  <p class="mb-0">اسم&nbsp;العميل:</p>
                  <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="<?php echo e($jobOrder->customer_name); ?>" />
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch">
              <div class="img-job w-100 d-flex flex-column align-items-center justify-content-center mt-3">
                
                <!-- Display the image if it exists -->
                <?php if($jobOrder->photo): ?>
                  <img src="<?php echo e(asset('storage/' . $jobOrder->photo)); ?>" alt="Job Order Image" class="img-fluid">
                <?php endif; ?>
              </div>
            </div>
            <div class="col-12">
              <div class="align-items-center mt-3 d-md-none d-flex">
                <p class="mb-0">اسم&nbsp;العميل:</p>
                <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="<?php echo e($jobOrder->customer_name); ?>" />
              </div>
              <div class="d-flex align-items-center mt-1">
                <p class="mb-0">اسم&nbsp;العمل:</p>
                <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="<?php echo e($jobOrder->business_name); ?>" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center mt-1">
                <p class="mb-0">اليوم/&nbsp;التاريخ:</p>
                <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="<?php echo e($jobOrder->day_date); ?>" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center mt-1">
                <p class="mb-0">موعد&nbsp;التسليم:</p>
                <input type="text" class="form-control-plaintext pb-0 pt-0 mb-2" id="num" value="<?php echo e($jobOrder->delivery_date); ?>" />
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
                  <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="price" value="<?php echo e($jobOrder->Price); ?>" />
                </div>
                <div class="d-flex align-items-center">
                  <label for="notes" class="mx-2 text-black">ملاحظات </label>
                  <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="notes" value="<?php echo e($jobOrder->notes); ?>" />
                </div>
              </div>
              <div class="d-grid">
                <p class="mb-0 font-2 text-black">وسيلة السداد :</p>
                
                <?php
                $paymentMethods = [
                    'Cash Instant Check' => 'نقدي(شيك فوري)',
                    'Receivables Account' => 'ذمم(بالحساب)',
                    'Receivables Checks' => 'ذمم(شيكات)',
                    'Electronic Transfer' => 'تحويل الكتروني',
                    'Bank Card' => 'بطاقة بنكية',
                ];
            ?>
            
            <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $arabic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check mb-0">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="payment_methods[]" 
                        value="<?php echo e($method); ?>" 
                        id="payment_<?php echo e($method); ?>" 
                        <?php echo e($jobOrder->Payment_method === $method ? 'checked' : ''); ?>

                    />
                    <label class="form-check-label" for="payment_<?php echo e($method); ?>">
                        <?php echo e($arabic); ?>

                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
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
                                            <input class="form-check-input" type="checkbox" value="Book" id="typeBook" <?php echo e($jobOrder->type_of_publication == 'Book' ? 'checked' : ''); ?> />
    
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label for="pageCount" class="mx-2">عدد&nbsp;الصفحات</label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="pageCount"
                                                value="<?php echo e($jobOrder->number_of_pages ?? ''); ?>" />
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value="Other" id="typeOther" <?php echo e($jobOrder->type_of_publication == 'Other' ? 'checked' : ''); ?> />
                                            <label class="form-check-label mx-2" for="typeOther">أخرى</label>
                                            <input type="text" class="form-control-plaintext pt-0 mb-1 pb-0" id="otherType"
                                                value="<?php echo e($jobOrder->other ?? ''); ?>" />
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
                                            id="measureCommercial" <?php echo e($jobOrder->Measurement == 'Educational Offer Size
                                        28x21' ? 'checked' : ''); ?> />
                                        <label class="form-check-label" for="Educational Offer Size 28x21">20.5ｘ28 قياس
                                            تجـــاري</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check mt-1">
                                        <label class="form-check-label" for="measureTender">21ｘ28 قياس عطاء التجربة</label>
                                        <input class="form-check-input" type="checkbox" value="21x28 Test Tender"
                                            id="measureTender" <?php echo e($jobOrder->Measurement == 'Commercial Size 28x20.5' ?
                                        'checked' : ''); ?> />
    
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" value="Custom Measure"
                                                id="measureCustom" <?php echo e($jobOrder->Measurement == 'Special Size' ? 'checked' :
                                            ''); ?> />
                                            <label class="form-check-label" for="measureCustom">قياس&nbsp;خاص</label>
                                        </div>
                                        <input type="text" class="form-control-plaintext pt-0 mb-1 pb-0" id="customMeasure"
                                            value="<?php echo e($jobOrder->Special_Size ?? ''); ?>" />
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
                                            value="<?php echo e($jobOrder->Quantity_in_numbers ?? ''); ?>" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label for="numWords" class="mx-2">كتابة </label>
                                        <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="numWords"
                                            value="<?php echo e($jobOrder->Quantity_Writing ?? ''); ?>" />
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
                                      <div class="d-flex">
                                            <label class="form-check-label mt-1">الداخلي</label>
                                            <?php $__currentLoopData = ['C', 'M', 'Y', 'K', 'CMYK']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check mt-1 me-3">
                                                <label class="form-check-label" for="flexCheckDefault"
                                                for="flexCheckDefault"
                                                    style="color: <?php echo e($color == 'C' ? '#00adee' : ($color == 'M' ? '#ed008c' : ($color == 'Y' ? '#fed400' : '#221e1f'))); ?>">
                                                    <?php if($color === 'CMYK'): ?>
                                                    <span style="color: #00adee">C</span><span
                                                        style="color: #ed008c">M</span><span
                                                        style="color: #fed400">Y</span><span style="color: #221e1f">C</span>
                                                    <?php else: ?>
                                                    <?php echo e($color); ?>

                                                    <?php endif; ?>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value="<?php echo e($color); ?>"
                                                    iid="flexCheckDefault" <?php echo e(in_array($color, explode(',',
                                                    $jobOrder->Number_of_interior_colors ?? '')) ? 'checked' : ''); ?> />
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                          <label class="form-check-label mt-1" for="flexCheckDefault">
                                            غلاف (أو تجاري)
                                          </label>
                                            <?php $__currentLoopData = ['C', 'M', 'Y', 'K', 'CMYK']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check mt-1 me-3">
                                                <label class="form-check-label" for="flexCheckDefault"
                                                for="flexCheckDefault"
                                                    style="color: <?php echo e($color == 'C' ? '#00adee' : ($color == 'M' ? '#ed008c' : ($color == 'Y' ? '#fed400' : '#221e1f'))); ?>">
                                                    <?php if($color === 'CMYK'): ?>
                                                    <span style="color: #00adee">C</span><span
                                                        style="color: #ed008c">M</span><span
                                                        style="color: #fed400">Y</span><span style="color: #221e1f">C</span>
                                                    <?php else: ?>
                                                    <?php echo e($color); ?>

                                                    <?php endif; ?>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value="<?php echo e($color); ?>"
                                                    id="flexCheckDefault" <?php echo e(in_array($color, explode(',',
                                                    $jobOrder->Number_of_colors_Cover_or_commercial ?? '')) ? 'checked' : ''); ?> />
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
    
                            <!-- ملاحظات -->
                            <tr class="border-gray">
                                <th scope="row" class="text-center text-black" style="vertical-align: middle">ملاحظات</th>
                                <td colspan="3">
                                    <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="notes"
                                        value="<?php echo e($jobOrder->notes ?? ''); ?>" />
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
                                        <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="<?php echo e($jobOrder->Quantity_in_numbers); ?>"  />
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
                                                   <?php echo e($jobOrder->Pallet_measuring_notes == '70x100' ? 'checked' : ''); ?> />
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check mt-1">
                                                <label style="width: max-content" class="form-check-label" for="flexCheck50x70">
                                                    50ｘ70
                                                </label>
                                                <input class="form-check-input" type="checkbox" value="50x70" id="flexCheck50x70" 
                                                       <?php echo e($jobOrder->Pallet_measuring_notes == '50x70' ? 'checked' : ''); ?> />
                                            </div>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="num" 
                                                   value="" placeholder="<?php echo e($jobOrder->The_notebook_is_the_type_of_internal_paper); ?>" />
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-g">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label for="num" class="mx-2">العدد </label>
                                        <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="<?php echo e($jobOrder->Quantity_Writing); ?>"  />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-4">
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" value="" <?php echo e($jobOrder->number_type === 'Half binding' ? 'checked' : ''); ?>  />
                                            <label class="form-check-label">نصف&nbsp;ملزمة</label>
                                        </div>
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" value="" <?php echo e($jobOrder->number_type === 'Quarter of a notebook' ? 'checked' : ''); ?>  />
                                            <label class="form-check-label">ربع&nbsp;ملزمة</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-grid" style="grid-template-columns: auto auto auto auto auto">
                                        <label class="form-check-label mt-1">طوي الكتاب</label>
                                        <?php
                                        $foldValues = ['32', '16', '8', '4']; // Define your enum values
                                        $selectedFold = $jobOrder->fold_the_book; // Assuming fold_the_book stores the single value
                                    ?>
                                    
                                    <?php $__currentLoopData = $foldValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check mt-1">
                                            <label class="form-check-label"><?php echo e($fold); ?></label>
                                            <input class="form-check-input" type="checkbox" value="<?php echo e($fold); ?>" 
                                                   <?php echo e($selectedFold === $fold ? 'checked' : ''); ?> />
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="d-grid" style="grid-template-columns: 1fr auto">
                                        <div class="d-flex align-items-center">
                                            <label for="num" class="mx-2">ملاحظات </label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="<?php echo e($jobOrder->notes); ?>"  />
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label for="num" class="mx-2">اعداد </label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="<?php echo e($jobOrder->Lieutenant_Prepared_by); ?>"  />
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
                                        <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="<?php echo e($jobOrder->Paper_type); ?>"  />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check-label">قياس&nbsp;البليتات:&nbsp;</label>
                                            <div class="form-check mt-1">
                                                <label class="form-check-label">70x100</label>
                                                <input class="form-check-input" type="checkbox" value="" <?php echo e($jobOrder->cover_pallet_measurement == '70x100' ? 'checked' : ''); ?>  />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check mt-1">
                                                <label class="form-check-label">50ｘ70</label>
                                                <input class="form-check-input" type="checkbox" value="" <?php echo e($jobOrder->cover_pallet_measurement == '50x70' ? 'checked' : ''); ?>  />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-grid" style="grid-template-columns: auto auto">
                                        <div class="form-check mt-1">
                                            <label class="form-check-label">وجه</label>
                                            <input class="form-check-input" type="checkbox" value="" <?php echo e($jobOrder->cover_pallet_measurement_type === 'face' ? 'checked' : ''); ?>  />
                                        </div>
                                        <div class="form-check mt-1">
                                            <label class="form-check-label">وجهان</label>
                                            <input class="form-check-input" type="checkbox" value="" <?php echo e($jobOrder->cover_pallet_measurement_type === 'Two faces' ? 'checked' : ''); ?>  />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-gray">
                                <td colspan="4">
                                    <div class="d-grid" style="grid-template-columns: 1fr auto">
                                        <div class="d-flex align-items-center">
                                            <label for="num" class="mx-2">ملاحظات </label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="<?php echo e($jobOrder->cover_notes); ?>"  />
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label for="num" class="mx-2">اعداد </label>
                                            <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" value="<?php echo e($jobOrder->cover_created_by); ?>"  />
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
                                               <?php echo e($jobOrder->color_lieutenant === '8 Color 70x100' ? 'checked' : ''); ?> />
                                        <label class="form-check-label mx-2" for="color8">
                                            70ｘ100 (8 color)
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="4 Color 70x100" id="color4" 
                                               <?php echo e($jobOrder->color_lieutenant === '4 Color 70x100' ? 'checked' : ''); ?> />
                                        <label class="form-check-label mx-2" for="color4">
                                            70ｘ100 (4 color)
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="70x100" id="normal" 
                                               <?php echo e($jobOrder->color_lieutenant === '50x70' ? 'checked' : ''); ?> />
                                        <label class="form-check-label mx-2" for="normal">
                                            50ｘ70
                                        </label>
                                    </div>
                                    
                                </div>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"><?php echo e($jobOrder->lieutenant_text); ?></textarea>
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
                                               <?php echo e($jobOrder->cover_color === '4 Color 70x100' ? 'checked' : ''); ?> />
                                        <label class="form-check-label mx-2" for="cover4">
                                            70ｘ100 (4 color)
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="70x100" id="coverNormal" 
                                               <?php echo e($jobOrder->cover_color === '70x100' ? 'checked' : ''); ?> />
                                        <label class="form-check-label mx-2" for="coverNormal">
                                            70ｘ100
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="50x70" id="cover50" 
                                               <?php echo e($jobOrder->cover_color === '50x70' ? 'checked' : ''); ?> />
                                        <label class="form-check-label mx-2" for="cover50">
                                            50x70
                                        </label>
                                    </div>
                                    
                                </div>
                                <textarea class="form-control" id="exampleFormControlTextarea2" rows="2"><?php echo e($jobOrder->cover_notes); ?></textarea>
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
                                <textarea class="form-control" id="exampleFormControlTextarea3" rows="5"><?php echo e($jobOrder->Book_cover_text); ?></textarea>
    
                                <div class="d-flex align-items-center mt-2">
                                    <label for="num" class="mx-2">اعداد </label>
                                    <input type="text" class="form-control-plaintext pb-0 pt-0 mb-1" id="num" value="<?php echo e($jobOrder->Printing_digital_ctreated_by); ?>"  />
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
                                        <input class="form-check-input" type="checkbox" value="Horse" id="flexCheckHorse" <?php echo e($jobOrder->The_heel == 'Horse' ? 'checked' : ''); ?>  />
                                        <label class="form-check-label mx-2" for="flexCheckHorse">
                                            شك حصان
                                        </label>
                                        
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value="Sewing" id="flexCheckSewing" <?php echo e($jobOrder->The_heel == 'tailoring' ? 'checked' : ''); ?>  />
                                            <label class="form-check-label mx-2" for="flexCheckSewing">
                                                خياطة
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value="Cut" id="flexCheckCut" <?php echo e($jobOrder->The_heel == 'brush' ? 'checked' : ''); ?>  />
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
                                        <input class="form-check-input" type="checkbox" value="Shiny" id="flexCheckShiny" <?php echo e($jobOrder->Slovenia == 'shiny' ? 'checked' : ''); ?>  />
                                        <label class="form-check-label mx-2" for="flexCheckShiny">
                                            لامع
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="Matte" id="flexCheckMatte" <?php echo e($jobOrder->Slovenia == 'matte' ? 'checked' : ''); ?>  />
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
                                    <textarea class="form-control" id="notes" rows="2"><?php echo e($jobOrder->Slovenia_text); ?></textarea>
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
                                <textarea class="form-control" id="postPrintingNotes" rows="6"><?php echo e($jobOrder->after_printing); ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
  </main>

  <!-----------------------js----------------------------->

  <script src="<?php echo e(url('assets')); ?>/invoice/js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/joborders/print.blade.php ENDPATH**/ ?>