@if(isset($open_pay) && $open_pay == 'true')
    <div class="pay">
        <div class="center">
            <p class="center-block">{{ $pay_description or '写的不错，赞助一下主机费'}}</p>
            <button class="btn btn-success center" type="button"
                    data-toggle="collapse" data-target="#pay-content">
                赞赏
            </button>
        </div>
        <div id="pay-content" class="collapse pay-content">
            @if(isset($zhifubao_pay_image_url) && !empty($zhifubao_pay_image_url) && isset($wechat_pay_image_url) && !empty($wechat_pay_image_url))
                <div class="btn-group btn-group-justified pay-buttons" role="group">
                    <a class="btn btn-default" href="#zhifubao" role="tab" data-toggle="tab"
                       aria-controls="zhifubao">
                        支付宝
                    </a>
                    <a class="btn btn-default" href="#wechat" role="tab" data-toggle="tab"
                       aria-controls="wechat">
                        微信
                    </a>
                </div>
                <div class="tab-content pay-images">
                    <div id="zhifubao" role="tabpanel" class="tab-pane fade in active">
                        <span class="center-block">扫一扫，用支付宝赞赏</span>
                        <img src="{{ $zhifubao_pay_image_url }}">
                    </div>
                    <div id="wechat" role="tabpanel" class="tab-pane fade">
                        <span class="center-block">扫一扫，用微信赞赏</span>
                        <img src="{{ $wechat_pay_image_url }}">
                    </div>
                </div>
            @elseif(isset($zhifubao_pay_image_url) && !empty($zhifubao_pay_image_url))
                <div class="tab-content pay-images" style="margin:0 auto;">
                    <div role="tabpanel" class="tab-pane fade in active">
                        <span class="center-block">扫一扫，用支付宝赞赏</span>
                        <img src="{{ $zhifubao_pay_image_url }}">
                    </div>
                </div>
            @elseif(isset($wechat_pay_image_url) && !empty($wechat_pay_image_url))
                <div class="tab-content pay-images" style="margin:0 auto;">
                    <div role="tabpanel" class="tab-pane fade in active">
                        <span class="center-block">扫一扫，用微信赞赏</span>
                        <img src="{{ $wechat_pay_image_url }}">
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif