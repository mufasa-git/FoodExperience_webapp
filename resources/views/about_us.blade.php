@extends('layouts.app')

@section('title', 'About Us')
@section('css')
    <style>
        body {background-color: #F0F0F0;}
        .invalid-feedback {display: block;}
    </style>
@endsection

@section('content')
<section>
    <div class="page-banner">
        <div class="container">
            <div class="page-banner__tittle">                
                <h1>Once Upon a house</h1>
                <p> <span></span> </p>
            </div>
        </div>
    </div>
</section>

<section class="user_dashboard mt-3 mb-3">
    <div class="container p-3">
        <div class="row user_content">            
           <!-- <div class="col-12 p-4 text-right">
                <h3>عن حيهم</h3>
                <p>"حيّهم!" هكذا نرحب بالضيف في بيوتنا.</p>
                <p>نهدف عبر هذه المنصة إلى تقديم تجربة ثقافية فريدة من نوعها تتيح للزوار والمهتمين التعرف على ثقافة </p>
                <p>المنطقة من خلال زيارة أحد سكانها وتناول وجبة محلية مع أهلها.</p>
                <p>الرؤية: ان نكون المنصة الموثوقة العربية الأولى لتمكين المحليين من استقبال الضيوف وتعريفهم عن ثقافتهم</p>
                <p>المختلفة.</p>
                <p>المهمة:</p>
                <p>1- إعطاء صورة إيجابية عن المملكة بطريقة بسيطة وواقعية من خلال السعوديون أنفسهم.</p>
                <p>2- تعزيز ثقافة الحوار بين الثقافات في المجتمع.</p>
            </div>  -->
            <div class="col-12 p-4">
                <h3>@lang('messages.About_Us')</h3>
                <p>HiHome @lang('messages.Hihome_is_the_English_translation_to_welcome_in_Arabic')</p>
                <p>@lang('messages.We_aim_through_this_platform_to_introduce_our_culture_to_visitors_and_interested_persons_through_experiencing_Saudi_food_with_locals_at_their_homes')</p>
                <p><b> @lang('messages.Vision')</b></p>
                <p> @lang('messages.To_be_the_first_trusted_Arabic_platform_in_providing_cultural_experiences_through_empowering_locals_and_welcoming_guests_all_around_the_world')</p>
                <p><b>  @lang('messages.Mission')</b></p>
                <p> @lang('messages.To_show_the_real_culture_of_Saudi_in_an_authentic_way_through_the_Saudis_themselves') </p>
                <p>@lang('messages.To_promote_the_cross_cultural_dialogue_between_people_from_different_backgrounds')</p>
            </div>
        </div>
       
    </div>
</section>

@endsection

@section('script')
    
@endsection