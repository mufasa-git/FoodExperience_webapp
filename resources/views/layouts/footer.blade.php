<footer id="footer-1">
    <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div>
    <div class="container">        
        <div class="row">
            <div class="col-lg-6 col-md-5">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="footer-widget-1 footer-widget-1--margin ">
                            <a href="{{ asset('/') }}"><img src="{{asset('img/logo1.png')}}" width="80" alt="footerlogo"></a>
                            <div class="footer-widget-1__text">
                                <p>
                                         
                                </p>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <div id="remove-padding" class="col-lg-6 col-md-7">
                <div class="footer-widget-1">
                    <div class="footer-widget-1__lists">
                                                
                        <div class="footer-widget-1__list">
                            <div class="footer-widget-1__tittle">
                                <h5>quick links</h5>
                                <div class="footer-widget-1__tittle__line-under"></div>                   
                            </div>
                            <ul>
                                <li><a href="{{route('welcome')}}">@lang('messages.Home')
</a></li>
                                <li><a href="{{route('about_us')}}">@lang('messages.About_Us')</a>  </li>
                                <li><a href="{{route('contact_us')}}">  @lang('messages.Contact_Us')</a></li>
                                @guest
                                    <li>
                                        <a href="{{ route('login') }}">  @lang('messages.Login')</a>
                                    </li>                                                         
                                @else
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOG OUT</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            </ul>
                        </div>

                        <div class="footer-widget-1__list">
                            <div class="footer-widget-1__tittle">
                                <h5>resources</h5>
                                <div class="footer-widget-1__tittle__line-under"></div>                   
                            </div>
                            <ul>
                                <li><a href="{{route('terms')}}">  @lang('messages.Terms_And_Conditions')    </a></li> 
                                <li><a href="{{route('privacy')}}">@lang('messages.Privacy_Policy')   </a></li> 
                                <li><a href="{{route('faq')}}"> @lang('messages.FAQ')</a></li>
                                 <li><a href="{{route('testimonial')}}"> @lang('messages.Testimonial') </a></li>
                                {{-- <li><a href="#"></a></li> --}}
                            </ul>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="copyright__area">
                <div class="copyright__license">
                      <i class="far fa-copyright"></i>   @lang('messages.Copyright_2019_Hihome._All_Rights_Reserved.')  
                </div>
                <div class="copyright__social">
                    <a href="https://www.instagram.com/hihome.sa/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/hihome.sa/"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/Hihome_sa"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
        
</footer>