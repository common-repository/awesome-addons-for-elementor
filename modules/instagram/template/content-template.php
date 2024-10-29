<#
        var image2 = {
                         id: settings.image2.id,
                         url: settings.image2.url,
                 };
        var image_url2 = elementor.imagesManager.getImageUrl( image2 );
        #>
        <# if (settings.style === 'style1') { #>
               <div class="advanced_addons_testimonial_card type-1 text-center position-relative single-testi">
			 					<#
                  if ( settings.image.url || settings.image.id ) {
                      var image = {
                         id: settings.image.id,
                         url: settings.image.url,
                         size: settings.thumbnail_size,
                         dimension: settings.thumbnail_custom_dimension,
                         model: view.getEditModel()
                        };
                        var image_url = elementor.imagesManager.getImageUrl( image );
                     #>
                        <img src="{{ image_url }}" alt="" class="img-fluid rounded-circle">
                    <# } #>
								<div class="block-body position-relative">
									<p class="ad-desc">
										{{ settings.desc }}
									</p>
											
								</div>
							<h6 class="position-relative d-inline-block mb-0 client ad-client"> {{ settings.client_name }}</h6>
				</div>
        <# } #> 

        <# if (settings.style === 'style2') { #>
                <div class="advanced_addons_testimonial_card type-2 rounded-20 text-center position-relative bg-white ">
					    <div class="block-body position-relative">
							<p class="mb-0 text-left ad-desc">
                              {{ settings.desc }}
							</p>
						</div>
						<div class="block-footer position-absolute">
							<img src="{{ settings.image.url }}" class="img-fluid rounded-circle" alt="">
							<h6 class="position-relative fz-20  mb-0 ad-client">{{ settings.client_name }}</h6>
							<span class="text-6e6e6e ad-c-p">{{ settings.position }}</span>
						</div>
    					
				</div>
        <# } #>

        <# if (settings.style === 'style3') { #>
                <div class="advanced_addons_testimonial_card type-2 bg-fafafa boxed  rounded-0 text-center position-relative mb-100 ">
					    <div class="block-body position-relative">
							<p class="mb-0 text-left ad-desc">
								 {{ settings.desc }}
                            </p>
						</div>
						<div class="block-footer position-absolute">
							<img src="{{ settings.image.url }}" class="img-fluid rounded-circle" alt="">
							<div>
								<h6 class="position-relative fz-20  mb-0 ad-client">{{ settings.client_name }}</h6>
								<span class="text-uppercase text-6e6e6e ad-c-p">{{ settings.position }}</span>
							</div>
						</div>
					</div>
        <# } #>

        <# if (settings.style === 'style4') { #>
        <!-- Testimonial Blocks -->
            <div class=" pt-120 pb-120 advanced_addons_testimonial_card_area type-2 transparent set-bg position-relative" data-bg='{{{ settings.image2.url }}}'>
                <div class="overlay position-absolute"></div>
                <div class="container">
                    <div class="row" data-find="_5">
                        <div class="col-md-10 offset-md-1" data-find="_4">
                            <div class="advanced_addons_testimonial_card type-2 shadow-none  boxed transparent  text-left position-relative  " data-find="_3">
                                <div class="block-body position-relative" data-find="_2">
                                    <p class="mb-0 text-left ad-desc" data-find="_1">
                                       {{ settings.desc }}
                                    </p>
                                </div>
                                <div class="block-footer position-absolute">
                                    <img src="{{ settings.image.url }}" class="img-fluid rounded-circle" alt="">
                                    <div>
                                        <h6 class="position-relative fz-20 m-0  mb-0 ad-client">{{ settings.client_name }}</h6>
                                        <span class="text-6e6e6e ad-c-p">{{ settings.position }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial Blocks -->
        <# } #>

         <# if (settings.style === 'style5') { #>
            <!-- Testimonial Blocks -->
                <div class="set-bg position-relative"  data-bg='{{ image_url }}'>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="advanced_addons_testimonial_card type-3   text-center position-relative pt-120 pb-120">
                                    <div class="block-body position-relative">
                                            <div class="row no-gutters">
                                                <div class="col-md-10 offset-md-1">
                                                    <img src="{{ settings.image.url }}" class="img-fluid rounded-circle" alt="">
                                                    <p class="mb-0 text-center font-italic">{{ settings.desc }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-footer ">
                                            <h6 class="position-relative fz-20  mb-0 ad-client">{{ settings.client_name }}</h6>
                                                <span class="text-6e6e6e ad-c-p">{{ settings.position }}</span>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                </div>
            <!-- Testimonial Blocks -->
        <# } #>