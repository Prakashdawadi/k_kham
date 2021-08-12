
@include('frontend.header')

 <link  href="{{asset('product_list/style.css')}}" rel="stylesheet" media="all">
	
	<div class="body">
		<div>
			<div class="header">
				<ul>
					<li>
							@foreach($data as $datas)
						MenuName: {{$datas->menu_name}}
					</li>
					
				</ul>
			</div>
			<div class="body">
				<div id="content">
					<div>
						<div>
						
							<h3>
								Ingredients:
							</h3>
						
							<p>
							{{$datas->ingredients}}
							</p>
							<img src="{{asset('images/menu/'.$datas->menu_image)}}">
								
							<p>
								<h3>Directions:</h3>
								<br>

								{{$datas->direction}}

							</p>
							
								
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div>
@endforeach				
				<span>Vegetable &amp; Rice Topping</span>
			</div>
			<div>
				<h3>Featured Images</h3>

				@foreach($banner as $data1)
				<ul id="featured">

					
					<li>
						<img src="{{asset('images/banner/'.$data1->bans_image)}}" height="150" alt="Image">
					
							
						
					</li>

					
					
				</ul>
				@endforeach
			</div>
			<div>
				<!-- <h3>Blog</h3>
				<ul id="blog">
					<li>
						<a href="blog.html">This is just a place holder, so you can see what the site would look like.</a>
						<span class="date">Jan 9, by Liza</span>
					</li>
					<li>
						<a href="blog.html">This is just a place holder, so you can see what the site would look like.</a>
						<span class="date">Feb 16, by Myk</span>
					</li>
					<li>
						<a href="blog.html">This is just a place holder, so you can see what the site would look like.</a>
						<span class="date">March 15, by Xaxan</span>
					</li>
				</ul> -->
			</div>
			
		</div>
	</div>
	

@include('frontend.footer')