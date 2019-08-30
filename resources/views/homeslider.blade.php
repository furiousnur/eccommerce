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