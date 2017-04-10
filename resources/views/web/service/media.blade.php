@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">

    <div class="page-header">
        <h3>THUMBNAIL</h3>
    </div>

    <div class="row">
        <div class="col-xs-6 col-md-2">
            <a href="#" class="thumbnail">
                <img src="http://lorempixel.com/300/200/" alt="">
            </a>
        </div>

        <div class="col-xs-6 col-md-2">
            <a href="#">
                <img src="http://lorempixel.com/300/300/" alt="" class="img-circle img-responsive">
            </a>
        </div>


        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="http://lorempixel.com/300/200/" alt="">
                <div class="caption">
                    <h4>Thumbnail label</h4>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                    <div class="m-b-5">
                        <a href="#" class="btn btn-sm btn-default waves-effect" role="button">Button</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-header">
        <h3>LIGHTBOX</h3>
    </div>

    <div class="row">
        <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text" data-gallery="example-gallery" class="col-sm-2">
            <img src="https://unsplash.it/600.jpg?image=251" class="img-responsive">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
            <img src="https://unsplash.it/600.jpg?image=252" class="img-responsive">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
            <img src="https://unsplash.it/600.jpg?image=253" class="img-responsive">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
            <img src="https://unsplash.it/600.jpg?image=254" class="img-responsive">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
            <img src="https://unsplash.it/600.jpg?image=255" class="img-responsive">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
            <img src="https://unsplash.it/600.jpg?image=256" class="img-responsive">
        </a>
    </div>
    <br/>
    <div class="row">
        <a href="http://www.youtube.com/watch?v=k6mFF3VmVAs" data-toggle="lightbox" data-gallery="mixedgallery" class="col-sm-4">
            <img src="//i1.ytimg.com/vi/yP11r5n5RNg/mqdefault.jpg" class="img-responsive">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=257" data-toggle="lightbox" data-gallery="mixedgallery" class="col-sm-4">
            <img src="https://unsplash.it/600.jpg?image=257" class="img-responsive">
        </a>
        <a href="http://vimeo.com/80629469" data-remote="http://player.vimeo.com/video/80629469" data-toggle="lightbox" data-gallery="mixedgallery" class="col-sm-4">
            <img src="//b.vimeocdn.com/ts/458/070/458070637_200.jpg" class="img-responsive">
        </a>
    </div>
<!--
    <div class="page-header">
        <h3>MEDIA PLAYER</h3>
    </div>
    <div class="row">
        <div class="col-sm-6 m-b-20">
            <p class="f-500 m-b-20">Basic Example</p>

            <span class="mejs-offscreen">Video Player</span><div id="mep_0" class="mejs-container svg mejs-video" tabindex="0" role="application" aria-label="Video Player" style="width: 551px; height: 309px;"><div class="mejs-inner"><div class="mejs-mediaelement"><video style="height: 100%; width: 100%" poster="media/big_buck_bunny.jpg" preload="none" src="media/big_buck_bunny.mp4" width="551" height="309">  id could be any according to you 
                            <source type="video/mp4" src="media/big_buck_bunny.mp4">
                        </video></div><div class="mejs-layers"><div class="mejs-poster mejs-layer" style="background-image: url(&quot;media/big_buck_bunny.jpg&quot;); width: 100%; height: 100%;"><img width="100%" height="100%" alt="" src="media/big_buck_bunny.jpg"></div><div class="mejs-overlay mejs-layer" style="display: none; width: 100%; height: 100%;"><div class="mejs-overlay-loading"><span></span></div></div><div class="mejs-overlay mejs-layer" style="display: none; width: 100%; height: 100%;"><div class="mejs-overlay-error"></div></div><div class="mejs-overlay mejs-layer mejs-overlay-play" style="width: 100%; height: 100%;"><div class="mejs-overlay-button"></div></div></div><div class="mejs-controls"><div class="mejs-button mejs-playpause-button mejs-play"><button type="button" aria-controls="mep_0" title="Play" aria-label="Play"></button></div><div class="mejs-time mejs-currenttime-container" role="timer" aria-live="off"><span class="mejs-currenttime">00:00</span></div><div class="mejs-time-rail" style="width: 448px;"><span class="mejs-time-total mejs-time-slider" style="width: 448px;"><span class="mejs-time-buffering" style="display: none;"></span><span class="mejs-time-loaded"></span><span class="mejs-time-current"></span><span class="mejs-time-handle"></span><span class="mejs-time-float"><span class="mejs-time-float-current">00:00</span><span class="mejs-time-float-corner"></span></span></span></div><div class="mejs-time mejs-duration-container"><span class="mejs-duration">00:00</span></div><div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="mep_0" title="Mute" aria-label="Mute"></button><a href="javascript:void(0);" class="mejs-volume-slider" aria-label="volumeSlider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="80" aria-valuetext="80%" role="slider" tabindex="0" style="display: none;"><span class="mejs-offscreen">Use Up/Down Arrow keys to increase or decrease volume.</span><div class="mejs-volume-total"></div><div class="mejs-volume-current" style="height: 80px; top: 28px;"></div><div class="mejs-volume-handle" style="top: 25px;"></div></a></div><div class="mejs-button mejs-fullscreen-button"><button type="button" aria-controls="mep_0" title="Fullscreen" aria-label="Fullscreen"></button></div></div><div class="mejs-clear"></div></div></div>
        </div>

        <div class="col-sm-6 m-b-20">
            <p class="f-500 m-b-20">Multi-Codec with no JavaScript fallback player - Cross Browser</p>
            <span class="mejs-offscreen">Video Player</span><div id="mep_1" class="mejs-container svg mejs-video" tabindex="0" role="application" aria-label="Video Player" style="width: 551px; height: 309px;"><div class="mejs-inner"><div class="mejs-mediaelement"><video style="height: 100%; width: 100%" id="multiCodec" poster="media/big_buck_bunny.jpg" preload="none" src="media/big_buck_bunny.mp4" width="551" height="309">  id could be any according to you 
                             MP4 source must come first for iOS 
                            <source type="video/mp4" src="media/big_buck_bunny.mp4">
                             WebM for Firefox 4 and Opera 
                            <source type="video/webm" src="media/big_buck_bunny.webm">
                             OGG for Firefox 3 
                            <source type="video/ogg" src="media/big_buck_bunny.ogv">
                             Fallback flash player for no-HTML5 browsers with JavaScript turned off 
                            <object type="application/x-shockwave-flash" data="media/flashmediaelement.swf" style="width: 100%; height: 100%;">
                                <param name="movie" value="media/flashmediaelement.swf">
                                <param name="flashvars" value="controls=true&amp;poster=media/big_buck_bunny.jpg&amp;file=media/big_buck_bunny.mp4">
                                 Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed 
                                <img src="media/big_buck_bunny.jpg" alt="Media" title="No video playback capabilities" style="width: 100%; height: 100%;">
                            </object>
                        </video></div><div class="mejs-layers"><div class="mejs-poster mejs-layer" style="background-image: url(&quot;media/big_buck_bunny.jpg&quot;); width: 100%; height: 100%;"><img width="100%" height="100%" alt="" src="media/big_buck_bunny.jpg"></div><div class="mejs-overlay mejs-layer" style="display: none; width: 100%; height: 100%;"><div class="mejs-overlay-loading"><span></span></div></div><div class="mejs-overlay mejs-layer" style="display: none; width: 100%; height: 100%;"><div class="mejs-overlay-error"></div></div><div class="mejs-overlay mejs-layer mejs-overlay-play" style="width: 100%; height: 100%;"><div class="mejs-overlay-button"></div></div></div><div class="mejs-controls"><div class="mejs-button mejs-playpause-button mejs-play"><button type="button" aria-controls="mep_1" title="Play" aria-label="Play"></button></div><div class="mejs-time mejs-currenttime-container" role="timer" aria-live="off"><span class="mejs-currenttime">00:00</span></div><div class="mejs-time-rail" style="width: 448px;"><span class="mejs-time-total mejs-time-slider" style="width: 448px;"><span class="mejs-time-buffering" style="display: none;"></span><span class="mejs-time-loaded"></span><span class="mejs-time-current"></span><span class="mejs-time-handle"></span><span class="mejs-time-float"><span class="mejs-time-float-current">00:00</span><span class="mejs-time-float-corner"></span></span></span></div><div class="mejs-time mejs-duration-container"><span class="mejs-duration">00:00</span></div><div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="mep_1" title="Mute" aria-label="Mute"></button><a href="javascript:void(0);" class="mejs-volume-slider" aria-label="volumeSlider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="80" aria-valuetext="80%" role="slider" tabindex="0" style="display: none;"><span class="mejs-offscreen">Use Up/Down Arrow keys to increase or decrease volume.</span><div class="mejs-volume-total"></div><div class="mejs-volume-current" style="height: 80px; top: 28px;"></div><div class="mejs-volume-handle" style="top: 25px;"></div></a></div><div class="mejs-button mejs-fullscreen-button"><button type="button" aria-controls="mep_1" title="Fullscreen" aria-label="Fullscreen"></button></div></div><div class="mejs-clear"></div></div></div>
        </div>
        <div class="col-md-6 m-b-20">
            <p class="f-500 m-b-20">Youtube Video (Preview in server NOT local)</p>
            <span class="mejs-offscreen">Video Player</span><div id="mep_2" class="mejs-container svg mejs-video" tabindex="0" role="application" aria-label="Video Player" style="width: 100%; height: 270px;"><div class="mejs-inner"><div class="mejs-mediaelement"><iframe class="me-plugin" id="me_youtube_0_container" frameborder="0" allowfullscreen="1" title="YouTube video player" width="480" height="270" src="https://www.youtube.com/embed/cyohHyQl-kc?controls=0&amp;wmode=transparent&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fbyrushan.com&amp;widgetid=2"></iframe><video style="width: 100%; display: none;">
                            <source src="https://www.youtube.com/watch?v=cyohHyQl-kc" type="video/youtube">
                        </video></div><div class="mejs-layers"><div class="mejs-poster mejs-layer" style="display: none; width: 100%; height: 270px;"></div><div class="mejs-overlay mejs-layer" style="display: none; width: 100%; height: 270px;"><div class="mejs-overlay-loading"><span></span></div></div><div class="mejs-overlay mejs-layer" style="display: none; width: 100%; height: 270px;"><div class="mejs-overlay-error"></div></div><div class="mejs-overlay mejs-layer mejs-overlay-play" style="width: 100%; height: 270px;"><div class="mejs-overlay-button"></div></div></div><div class="mejs-controls"><div class="mejs-button mejs-playpause-button mejs-play"><button type="button" aria-controls="mep_2" title="Play" aria-label="Play"></button></div><div class="mejs-time mejs-currenttime-container" role="timer" aria-live="off"><span class="mejs-currenttime">00:00</span></div><div class="mejs-time-rail" style="width: 448px;"><span class="mejs-time-total mejs-time-slider" aria-label="Time Slider" aria-valuemin="0" aria-valuemax="190" aria-valuenow="0" aria-valuetext="00:00" role="slider" tabindex="0" style="width: 448px;"><span class="mejs-time-buffering" style="display: none;"></span><span class="mejs-time-loaded" style="width: 0px;"></span><span class="mejs-time-current" style="width: 0px;"></span><span class="mejs-time-handle" style="left: -5px;"></span><span class="mejs-time-float"><span class="mejs-time-float-current">00:00</span><span class="mejs-time-float-corner"></span></span></span></div><div class="mejs-time mejs-duration-container"><span class="mejs-duration">03:10</span></div><div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="mep_2" title="Mute" aria-label="Mute"></button><a href="javascript:void(0);" class="mejs-volume-slider" style="display: none;"><span class="mejs-offscreen">Use Up/Down Arrow keys to increase or decrease volume.</span><div class="mejs-volume-total"></div><div class="mejs-volume-current" style="height: 100px; top: 8px;"></div><div class="mejs-volume-handle" style="top: 5px;"></div></a></div><div class="mejs-button mejs-fullscreen-button"><button type="button" aria-controls="mep_2" title="Fullscreen" aria-label="Fullscreen"></button></div></div><div class="mejs-clear"></div></div></div>
        </div>
        <div class="col-md-6 m-b-20">
            <p class="f-500 m-b-20">Youtube Video (Preview in server NOT local)</p>
            <span class="mejs-offscreen">Video Player</span><div id="mep_3" class="mejs-container svg mejs-video" tabindex="0" role="application" aria-label="Video Player" style="width: 100%; height: 270px;"><div class="mejs-inner"><div class="mejs-mediaelement"><iframe class="me-plugin" id="me_youtube_1_container" frameborder="0" allowfullscreen="1" title="YouTube video player" width="480" height="270" src="https://www.youtube.com/embed/E_DGd7QN290?controls=0&amp;wmode=transparent&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fbyrushan.com&amp;widgetid=1"></iframe><video style="width: 100%; display: none;">
                            <source src="https://www.youtube.com/watch?v=E_DGd7QN290" type="video/youtube">
                        </video></div><div class="mejs-layers"><div class="mejs-poster mejs-layer" style="display: none; width: 100%; height: 270px;"></div><div class="mejs-overlay mejs-layer" style="display: none; width: 100%; height: 270px;"><div class="mejs-overlay-loading"><span></span></div></div><div class="mejs-overlay mejs-layer" style="display: none; width: 100%; height: 270px;"><div class="mejs-overlay-error"></div></div><div class="mejs-overlay mejs-layer mejs-overlay-play" style="width: 100%; height: 270px;"><div class="mejs-overlay-button"></div></div></div><div class="mejs-controls"><div class="mejs-button mejs-playpause-button mejs-play"><button type="button" aria-controls="mep_3" title="Play" aria-label="Play"></button></div><div class="mejs-time mejs-currenttime-container" role="timer" aria-live="off"><span class="mejs-currenttime">00:00</span></div><div class="mejs-time-rail" style="width: 448px;"><span class="mejs-time-total mejs-time-slider" aria-label="Time Slider" aria-valuemin="0" aria-valuemax="518" aria-valuenow="0" aria-valuetext="00:00" role="slider" tabindex="0" style="width: 448px;"><span class="mejs-time-buffering" style="display: none;"></span><span class="mejs-time-loaded" style="width: 0px;"></span><span class="mejs-time-current" style="width: 0px;"></span><span class="mejs-time-handle" style="left: -5px;"></span><span class="mejs-time-float"><span class="mejs-time-float-current">00:00</span><span class="mejs-time-float-corner"></span></span></span></div><div class="mejs-time mejs-duration-container"><span class="mejs-duration">08:38</span></div><div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="mep_3" title="Mute" aria-label="Mute"></button><a href="javascript:void(0);" class="mejs-volume-slider" style="display: none;"><span class="mejs-offscreen">Use Up/Down Arrow keys to increase or decrease volume.</span><div class="mejs-volume-total"></div><div class="mejs-volume-current" style="height: 100px; top: 8px;"></div><div class="mejs-volume-handle" style="top: 5px;"></div></a></div><div class="mejs-button mejs-fullscreen-button"><button type="button" aria-controls="mep_3" title="Fullscreen" aria-label="Fullscreen"></button></div></div><div class="mejs-clear"></div></div></div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6 m-b-20">
            <p class="f-500 m-b-20">4:3 Aspect Ratio</p>
            <div class="embed-responsive embed-responsive-4by3">
                <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/Kxe_RRonq0o"></iframe>
            </div>
        </div>
        <div class="col-sm-6">
            <p class="f-500 m-b-20">16:9 Aspect Ratio</p>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/aaZXDm3RXuo"></iframe>
            </div>
        </div>
    </div>-->
</div>
@endsection
