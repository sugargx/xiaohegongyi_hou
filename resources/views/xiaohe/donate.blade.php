@extends('layouts.layout1')
@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>公益项目详情</h2>
                <ul class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">公益项目</a></li>
                    <li class="active">公益项目详情</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="d-help-blog-grid">
        <div class="container">
            <div class="col-md-8">
                <div class="d-help-causes-detail">
                    <figure class="hover-overlay">
                        <img src="{{ url('static/extra-images/causes-detail.jpg') }}" alt="">
                    </figure>
                    <!--Causes Thumb Start-->
                    <div class="d-help-causes detail">
                        <!--Causes Thumb Text Start-->
                        <div class="text">
                            <div class="d-relf-chart" data-percent="89"><h5>89%</h5></div>
                        </div>
                        <!--Causes Thumb Text End-->
                        <!--Causes Thumb Footer Start-->
                        <div class="d-help-causes-footer">
									<span>
										<em>目标：</em>
										<em>¥9500 </em>
									</span>
									<span>
										<em>已筹：</em>
										<em>¥79000</em>
									</span>
									<span>
										<em>捐赠人数</em>
										<em>155 </em>
									</span>
                        </div>
                        <!--Causes Thumb Footer End-->
                        <!--<div class="btn_donate">-->
                        <!--<a class="btn-d-help" href="#">Donate</a>-->
                        <!--</div>-->
                    </div>
                    <!--Causes Thumb End-->

                    <!--D HELP CAUSES DTL TEXT START-->
                    <div class="d-help-causes-dtl-text">
                        <h2>“点亮心灯”助学公益项目简介</h2>
                        <p>点亮心灯”助学公益项目是由岱岳区扶贫办、泰山三美音频公社、山东文友书店、小荷公益共同发起的一个公益项目，主要是服务于岱岳区的建档立卡贫困青少年，帮助他们改善目前的生活学习现状，让孩子们身心健康的成长。主要服务方式是善款支持、各类的助学活动跟进等。
                            怀着一颗感恩的心去生活，人生会变得更加幸福，让我们用心去聆听生活的美好，用爱点亮心灯!

                        </p>
                        <p>每一个孩子都会感恩您的爱心奉献，祝好人一生平安幸福！

                            本次活动主要是针对“泰山三美音频公社”的听众专门设置的二维码，其他爱心人士要想捐款或者资助贫困孩子，请致电18653856011贾老师咨询相关事宜。
                            听众请长按下方二维码，点识别图中二维码，然后输入捐款金额，捐款成功次日到账!</p>
                    </div>
                    <!--D HELP CAUSES DTL TEXT END-->

                    <!--D HELP CAUSES DTL CONTENT START-->
                    <div class="d-help-causes-dtl-content">
                        <div class="h-delp-detail-fig">
                            <figure id="plate-inverse4" class="hover-overlay">
                                <img src="{{ url('static/extra-images/qcode.jpg') }}" alt="">
                            </figure>
                        </div>
                        <div class="d-help-detail-link">
                            <h2>感谢您的爱心！</h2>
                            <p>集齐善款后，主办方将每个季度组织送达善款，请关注网站活动通知，欢迎各位爱心人士一起送达善款！ </p>
                            <!--<div class="d-help-detail-list">-->
                            <!--<ul>-->
                            <!--<li><a href="#">Volunteers needed for this charity activity</a></li>-->
                            <!--<li><a href="#">We aggregate in the city center at 8:00 pm</a></li>-->
                            <!--<li><a href="#">Everyone will get items and we divided into 2</a></li>-->
                            <!--<li><a href="#">We will go to the place where homeless</a></li>-->
                            <!--<li><a href="#">We will go to the place where homeless usually</a></li>-->
                            <!--</ul>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <!--D HELP CAUSES DTL CONTENT END-->

                    <!--D HELP LEAVE COMMENT PDF START-->
                    <div class="d-help-leave-comment pdf">
                        <h2 class="comment-title">下面是您和所有爱心朋友一起捐款后要资助的第一批孩子的信息资料

                            （保护隐私有所删减）</h2>
                        <img src="{{ url('static/extra-images/project1.jpg') }}">
                    </div>
                    <!--D HELP LEAVE COMMENT PDF END-->

                    <!--D HELP SHARE META START-->
                    <div class="h-delp-share-meta social">
                        <div class="h-delp-social-share">
                            <h6>分享文章将爱传递</h6>
                            <ul class="d-help-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                            </ul>
                        </div>
                        <div class="btn_donate">
                            作者：天翊　录入：天翊
                            <!--<a class="btn-d-help" href="#">作者：天翊　录入：天翊</a>-->
                        </div>
                    </div>
                    <!--D HELP SHARE META END-->

                    <!--D HELP AUTHOR START-->
                    <div class="d-help-author">
                        <figure id="plate-inverse397" class="hover-overlay">
                            <img src="{{ url('static/extra-images/author.jpg') }}" alt="">
                        </figure>
                        <div class="d-help-author-content">
                            <div class="d-help-author-head">
                                <h4>天翊</h4>

                            </div>
                            <p>介绍，因为看到原网站有此功能</p>
                        </div>
                    </div>
                    <!--D HELP AUTHOR END-->

                </div>
            </div>
            <div class="col-md-4">
                <!--SIDEBAR START-->
                <div class="sidebar">
                    <!--D HELP SIDE WIDGET START-->
                    <div class="d-help-side-widget">
                        <h4 class="side-widget-tittle">查找</h4>
                        <div class="d-help-commet-field">
                            <input placeholder="查找" name="author" type="text" value="" data-default="Name*" size="30" required>
                            <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <!--D HELP SIDE WIDGET END-->

                    <!--D HELP SIDE WIDGET START-->
                    <div class="d-help-side-widget">
                        <h4 class="side-widget-tittle">公益活动推荐</h4>
                        <div class="d-help-side-categoires">
                            <ul>
                                <li><a href="#">“我想有个家”助学活动<span>07-28</span></a></li>
                                <li><a href="#">“我想有个家”助学活动<span>07-28</span></a></li>
                                <li><a href="#">“我想有个家”助学活动<span>07-28</span></a></li>
                                <li><a href="#">“我想有个家”助学活动<span>07-28</span></a></li>
                                <li><a href="#">“我想有个家”助学活动<span>07-28</span></a></li>
                                <li><a href="#">“我想有个家”助学活动<span>07-28</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--D HELP SIDE WIDGET END-->

                    <!--D HELP SIDE WIDGET START-->
                    <div class="d-help-side-widget">
                        <h4 class="side-widget-tittle">公益项目推荐</h4>
                        <div class="d-help-side-categoires latest">
                            <ul>
                                <li>
                                    <div class="d-help-side-latest">
                                        <a href="#">
                                            <figure class="hover-overlay">
                                                <img src="{{ url('static/extra-images/latest.jpg') }}" alt="">
                                            </figure>
                                        </a>

                                        <div class="d-help-latest-text">
                                            <h6>“点亮心灯”助学项目</h6>
                                            <!--<a href="#"><i class="fa fa-user"></i>By Admin</a>-->
                                            <span>项目简介</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-help-side-latest">
                                        <a href="#">
                                            <figure class="hover-overlay">
                                                <img src="{{ url('static/extra-images/latest.jpg') }}" alt="">
                                            </figure>
                                        </a>

                                        <div class="d-help-latest-text">
                                            <h6>“点亮心灯”助学项目</h6>
                                            <!--<a href="#"><i class="fa fa-user"></i>By Admin</a>-->
                                            <span>项目简介</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-help-side-latest">
                                        <a href="#">
                                            <figure class="hover-overlay">
                                                <img src="{{ url('static/extra-images/latest.jpg') }}" alt="">
                                            </figure>
                                        </a>

                                        <div class="d-help-latest-text">
                                            <h6>“点亮心灯”助学项目</h6>
                                            <!--<a href="#"><i class="fa fa-user"></i>By Admin</a>-->
                                            <span>项目简介</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--D HELP SIDE WIDGET END-->

                </div>
                <!--SIDEBAR END-->
            </div>
        </div>
    </section>
@endsection