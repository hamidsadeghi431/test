<div>

    <table class="table table-bordered"  >
        <tr>
            <td style="width: 37mm;height: 26mm;" class="text-center"><img src="{{asset('admin/assets/icon/3.png')}}" style="width: 17mm"></td>
            <th colspan="3" style="width: 84mm;height: 26mm;" class="text-center"><h1>برچسب انرژی ساختمان مسکونی</h1></th>
        </tr>
        <tr>
            <td style="width: 37mm;height: 26mm;"  class="text-white text-center text-bold">
                @if($energyTags=='A') <div class="camera_captiont" >A</div>@else <br> @endif
                @if($energyTags=='B') <div class="camera_captiont" >B</div>@else <br><br><br> @endif
                @if($energyTags=='C') <div class="camera_captiont" >C</div>@else <br><br><br> @endif
                @if($energyTags=='D') <div class="camera_captiont" >D</div>@else <br><br><br><br> @endif
                @if($energyTags=='E') <div class="camera_captiont" >E</div>@else <br><br><br><br> @endif
                @if($energyTags=='F') <div class="camera_captiont" >F</div>@else <br><br> @endif
                @if($energyTags=='G') <div class="camera_captiont" >G</div>@else <br> @endif
            </td>
            <td colspan="4" style="width: 84mm;height: 26mm;" >
                <div style="height: 6mm;"> </div>
                <div class="camera_captiona" >A</div>
                <div style="height: 3mm;"></div>
                <div class="camera_captionb" >B</div>
                <div style="height: 3mm;"></div>
                <div class="camera_captionc" >C</div>
                <div style="height: 3mm;"></div>
                <div class="camera_captiond" >D</div>
                <div style="height: 3mm;"></div>
                <div class="camera_captione" >E</div>
                <div style="height: 3mm;"></div>
                <div class="camera_captionf" >F</div>
                <div style="height: 3mm;"></div>
                <div class="camera_captiong" >G</div>
                <div style="height: 6mm;"> </div>
            </td>
        </tr>
        <tr>
                    <th style="width: 73mm;height: 6mm;" class="text-center">تاریخ آعاز بهره برداری از ساختمان</th>
                    <td colspan="3" style="width: 48mm;height: 6mm;" class="text-center">{{substr($startDate,0,4)}}/{{substr($startDate,4,2)}}/{{substr($startDate,6,2)}}</td>
                </tr>
                <tr>
                    <th style="width: 73mm;height: 6mm;" class="text-center">دوره ارزیابی</th>
                    <td  colspan="3" style="width: 48mm;height: 6mm;" class="text-center">سال {{$fyear}} الی {{$lastyear}}</td>
                </tr>
        <tr>
            <th rowspan="3">مصرف حامل های انرژی ساختمان</th>
            <td rowspan="3">الکتریکی</td>
            <td > سال          {{$fyear}}</td><td style="direction: ltr"> {{number_format($pwrConsumFiYear)}}     kWh</td>
        </tr>
        <tr><td > سال          {{$fyear+1}}</td><td style="direction: ltr"> {{number_format($pwrConsumSeYear)}}     kWh</td></tr>
        <tr><td > سال          {{$fyear+2}}</td><td style="direction: ltr"> {{number_format($pwrConsumThYear)}}     kWh</td></tr>
        <tr>
            <th colspan="2" style="width: 73mm;height: 6mm;">شاخص مصرف ویژه انرژی اولیه ساختمان</th>
            <td colspan="2" style="width: 48mm;height: 6mm;" class="text-center">{{$sece}}</td>
        </tr>
        <tr>
            <th colspan="2" style="width: 73mm;height: 6mm;">شاخص مصرف ویژه انرژی اولیه ساختمان ایده آل</th>
            <td colspan="2" style="width: 48mm;height: 6mm;" class="text-center">{{$secIdeal}}</td>
        </tr>
        <tr>
            <th colspan="2" style="width: 73mm;height: 6mm;">نسبت انرژی ساختمان</th>
            <td colspan="2" style="width: 48mm;height: 6mm;" class="text-center">{{$r}}</td>
        </tr>
        <tr>
            <th colspan="2" style="width: 73mm;height: 6mm;">مساحت اعیان ساختمان</th>
            <td colspan="2" style="width: 48mm;height: 6mm;" class="text-center">{{$aianArea}}</td>
        </tr>
        <tr>
            <th colspan="2" style="width: 73mm;height: 6mm;">مساحت مفید ساختمان</th>
            <td colspan="2" style="width: 48mm;height: 6mm;" class="text-center">{{$mm2}}</td>
        </tr>
        <tr>
            <th colspan="2" style="width: 73mm;height: 6mm;">شهر محل استقرار ساختمان</th>
            <td colspan="2" style="width: 48mm;height: 6mm;" class="text-center">{{$city}}</td>
        </tr>
        <tr>
            <th colspan="2" style="width: 73mm;height: 6mm;">نیاز غالب و درجه انرژی سالانه شهر</th>
            <td colspan="2" style="width: 48mm;height: 6mm;" class="text-center">
                @if($region == 1)
                    گرمایش زیاد
                @elseif($region == 2)
                    سرمایش زیاد
                @elseif($region == 3)
                    گرمایش و یا سرمایش متوسط
                @elseif($region == 4)
                    گرمایش و یا سرمایش کم
                @endif
            </td>
        </tr>
        <tr>
            <th colspan="1" style="width: 73mm;height: 6mm;">نشانی</th>
            <td colspan="3" style="width: 48mm;height: 6mm;" class="text-center">{{$address}}</td>
        </tr>
        <tr>
            <th colspan="1" style="width: 73mm;height: 6mm;">کدپستی</th>
            <td colspan="3" style="width: 48mm;height: 6mm;" class="text-center">{{$postalCode}}</td>
        </tr>
        <tr>
            <th colspan="2">شناسه ملی ساختمان</th>
            <th>شماره برچسب</th>
            <th>تاریخ اعتبار برچسب</th>
        </tr>
        <tr>
            <td colspan="2">{{$InternationalIDBuldiing}}</td>
            <td>{{$tagsNO}}</td>
            <td>{{$fyear+6}}/{{substr($startDate,4,2)}}/{{substr($startDate,6,2)}}</td>
        </tr>


    </table>
    @push('css')
     <style>
         .camera_captiona{
             width: 20mm;
             height: 0.7cm;
             background: #009019;
             position: relative;
             left: 84mm;
             right: 128mm;
             bottom: 84mm;
             top: 0mm;
         }
         .camera_captiona:after {
             position: absolute;
             right: -40px;
             content: "";
             width: 0;
             height: 0;
             border-top: 14px solid transparent;
             border-bottom: 14px solid transparent;
             border-left: 40px solid #009019;
         }
         .camera_captionb{
             width: 30mm;
             height: 0.7cm;
             background: #C9DA5E;
             position: relative;
             left: 84mm;
             right: 118mm;
             bottom: 84mm;
             top: 0mm;
             /*margin: 0px 0cm 2mm 10px;*/

         }
         .camera_captionb:after {
             position: absolute;
             right: -40px;
             content: "";
             width: 0;
             height: 0;
             border-top: 14px solid transparent;
             border-bottom: 14px solid transparent;
             border-left: 40px solid #C9DA5E;
         }
         .camera_captionc{
             width: 40mm;
             height: 0.7cm;
             background: #C1D61F;
             position: relative;
             left: 84mm;
             right: 108mm;
             bottom: 84mm;
             top: 0mm;

         }
         .camera_captionc:after {
             position: absolute;
             right: -40px;
             content: "";
             width: 0;
             height: 0;
             border-top: 14px solid transparent;
             border-bottom: 14px solid transparent;
             border-left: 40px solid #C1D61F;
         }
         .camera_captiond{
             width: 50mm;
             height: 0.7cm;
             background: #FCF026;
             position: relative;
             left: 84mm;
             right: 98.5mm;
             bottom: 84mm;
             top: 0mm;

         }
         .camera_captiond:after {
             position: absolute;
             right: -40px;
             content: "";
             width: 0;
             height: 0;
             border-top: 14px solid transparent;
             border-bottom: 14px solid transparent;
             border-left: 40px solid #FCF026;
         }
         .camera_captione{
             width: 60mm;
             height: 0.7cm;
             background: #F3BE16;
             position: relative;
             left: 84mm;
             right: 88.5mm;
             bottom: 84mm;
             top: 0mm;

         }
         .camera_captione:after {
             position: absolute;
             right: -40px;
             content: "";
             width: 0;
             height: 0;
             border-top: 14px solid transparent;
             border-bottom: 14px solid transparent;
             border-left: 40px solid #F3BE16;
         }
         .camera_captionf{
             width: 70mm;
             height: 0.7cm;
             background: #EE7713;
             position: relative;
             left: 84mm;
             right: 78.5mm;
             bottom: 84mm;
             top: 0mm;

         }
         .camera_captionf:after {
             position: absolute;
             right: -40px;
             content: "";
             width: 0;
             height: 0;
             border-top: 14px solid transparent;
             border-bottom: 14px solid transparent;
             border-left: 40px solid #EE7713;
         }
         .camera_captiong{
             width: 80mm;
             height: 0.7cm;
             background: #CD000C;
             position: relative;
             left: 84mm;
             right: 68.5mm;
             bottom: 84mm;
             top: 0mm;

         }
         .camera_captiong:after {
             position: absolute;
             right: -40px;
             content: "";
             width: 0;
             height: 0;
             border-top: 14px solid transparent;
             border-bottom: 14px solid transparent;
             border-left: 40px solid #CD000C;
         }
         .camera_captiont{
             width: 31.9mm;
             height: 1cm;
             background: #000000;
             position: relative;
             left: 84mm;
             right: 20mm;
             bottom: 84mm;
             top: 0mm;

         }
         .camera_captiont:after {
             position: absolute;
             right: 120px;
             content: "";
             width: 0;
             height: 0;
             border-top: 18px solid transparent;
             border-bottom: 22px solid transparent;
             border-right: 39px solid #000000;
         }

     </style>
    @endpush
</div>
