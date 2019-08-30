    <?php 
            $all_published_slider=DB::table('tbl_sliders')
            ->where('publication_status',1)
            ->get(); 

        ?> 

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">

                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- indicators -->
                        <ol class="carousel-indicators">
                            @foreach( $all_published_slider as $v_slider)
                            <li data-target="#slider-example-generic" data-slide-to="{{$loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>

                        <!-- wrapper for slider -->
                        <div class="carousel-inner" role="listbox">
                            @foreach( $all_published_slider as $v_slider)
                                <div class="item {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ $v_slider->slider_image }}" style="width: 100%; height: 500px;" />
                                </div>
                            @endforeach
                        </div>


                        <!-- controls -->

                        <a href="#carousel-example-generic" class="left carousel-control" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <a href="#carousel-example-generic" class="right carousel-control" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>    
            </div>
        </div>
    </section><!--/slider-->

    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">

                            <?php 
                                $all_published_slider=DB::table('tbl_sliders')
                                ->where('publication_status',1)
                                ->get(); 

                                     $i=1;
                                foreach ($all_published_slider as $v_slider) {
                                    
                                   
                                    if ($i==1) {


                            ?> 
                            <div class="item active">
                                <?php }else{ ?>
                                    <div class="item">
                                 <?php } ?>       
                                <div class="col-sm-5">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-7">
                                    <img src="{{URL::to($v_slider->slider_image)}}" class="girl img-responsive" alt="" />
                                    <!-- <img src="{{URL::to('frontend/images/home/pricing.png')}}"  class="pricing" alt="" /> -->
                                </div>
                            </div>
                            <?php $i++; } ?>
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->