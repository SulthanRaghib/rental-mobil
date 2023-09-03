
{{-- main homepage --}}

@include('partials.h_header')
@include('partials.h_banner')  

      <!-- car -->
      <div  class="car">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>VARIETY OF CARS </h2>
                     <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 padding_leri">
                  <div class="car_box">
                     <figure><img src="images/car_img1.png" alt="#"/></figure>
                     <h3>Hyundai</h3>
                  </div>
               </div>
               <div class="col-md-4 padding_leri">
                  <div class="car_box">
                     <figure><img src="images/car_img2.png" alt="#"/></figure>
                     <h3>Audi</h3>
                  </div>
               </div>
               <div class="col-md-4 padding_leri">
                  <div class="car_box">
                     <figure><img src="images/car_img3.png" alt="#"/></figure>
                     <h3>Bmw x5</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end car -->

      <!-- bestCar -->
      <div id="contact" class="bestCar">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="row">
                     <div class="col-md-6 offset-md-6">
                        <form class="main_form">
                           <div class="titlepage">
                              <h2>Find A  Best Car For Rent</h2>
                           </div>
                           <div class="row">
                              <div class="col-md-12 ">
                                 <select>
                                    <option value="0">Choose car Make</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                 </select>
                              </div>
                              <div class="col-md-12">
                                 <select>
                                    <option value="0">Choose Car Type </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                 </select>
                              </div>
                              <div class="col-md-12">
                                 <input class="contactus" placeholder="Search" type="Search" name="Search">                          
                              </div>
                              <div class="col-md-12">
                                 <select>
                                    <option value="0">Price of Rent</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                 </select>
                              </div>
                              <div class="col-sm-12">
                                 <button class="find_btn">Find Now</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end bestCar -->
      
      @include('partials.h_testi')

      <!-- choose  section -->
      <div class="choose ">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Why Choose Us</h2>
                     <span>It is a long established fact that a reader will be distracted by the readable content of a page when<br> looking at its layout. The point of using </span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="choose_box">
                     <span>01</span>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making </p>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="choose_box">
                     <span>02</span>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making </p>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="choose_box">
                     <span>03</span>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end choose  section -->

@include('partials.h_footer')