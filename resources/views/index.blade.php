@extends('layouts.app')

@section('title', 'Home')

@section('content')
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img1.jpg" alt="">
						<div class="label">
							<div class="title">Barcelona</div>
							<div class="price">DESDE<span>$ 1000</span></div>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img2.jpg" alt="">
						<div class="label">
							<div class="title">GOA</div>
							<div class="price">DESDE<span>$ 1.500</span></div>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img3.jpg" alt="">
						<div class="label">
							<div class="title">PARIS</div>
							<div class="price">DESDE<span>$ 1.600</span></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="grid_6">
					<h3>Booking Form</h3>
					<form id="bookingForm">
						<div class="fl1">
							<div class="tmInput">
								<input name="Name" placeHolder="Name:" type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
							<div class="tmInput">
								<input name="Country" placeHolder="Country:" type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="fl1">
							<div class="tmInput">
								<input name="Email" placeHolder="Email:" type="text" data-constraints="@NotEmpty @Required @Email">
							</div>
							<div class="tmInput mr0">
								<input name="Hotel" placeHolder="Hotel:" type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="clear"></div>
						<strong>Check-in</strong>
						<label class="tmDatepicker">
							<input type="text" name="Check-in" placeHolder='10/05/2014' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						<strong>Check-out</strong>
						<label class="tmDatepicker">
							<input type="text" name="Check-out" placeHolder='20/05/2014' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						<div class="tmRadio">
							<p>Comfort</p>
							<input name="Comfort" type="radio" id="tmRadio0" data-constraints='@RadioGroupChecked(name="Comfort", groups=[RadioGroup])' checked/>
							<span>Cheap</span>
							<input name="Comfort" type="radio" id="tmRadio1" data-constraints='@RadioGroupChecked(name="Comfort", groups=[RadioGroup])' />
							<span>Standart</span>
							<input name="Comfort" type="radio" id="tmRadio2" data-constraints='@RadioGroupChecked(name="Comfort", groups=[RadioGroup])' />
							<span>Lux</span>
						</div>
						<div class="clear"></div>
						<div class="fl1 fl2">
							<em>Adultos</em>
							<select name="Adults" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>1</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select>
							<div class="clear"></div>
							<em>Habitaciones</em>
							<select name="Rooms" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>1</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select>
						</div>
						<div class="fl1 fl2">
							<em>Niños</em>
							<select name="Children" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>0</option>
								<option>0</option>
								<option>1</option>
								<option>2</option>
							</select>
						</div>
						<div class="clear"></div>
						<div class="tmTextarea">
							<textarea name="Message" placeHolder="Message" data-constraints='@NotEmpty @Required @Length(min=20,max=999999)'></textarea>
						</div>
						<a href="#" class="btn" data-type="submit">Submit</a>
					</form>
				</div>
				<div class="grid_5 prefix_1">
					<h3>Welcome</h3>
					<img src="images/page1_img1.jpg" alt="" class="img_inner fleft">
					<div class="extra_wrapper">
						<p>Lorem ipsum dolor sit ere amet, consectetur ipiscin.</p>
						In mollis erat mattis neque facilisis, sit ametiol
					</div>
					<div class="clear cl1"></div>
					<p>Find the detailed description of this <span class="col1"><a href="http://blog.templatemonster.com/free-website-templates/" rel="dofollow">freebie</a></span> at TemplateMonster blog.</p>
					<p><span class="col1"><a href="http://www.templatemonster.com/category/travel-website-templates/" rel="nofollow">Travel Website Templates</a></span> category offers you a variety of designs that are perfect for travel sphere of business.</p>
					Proin pharetra luctus diam, a scelerisque eros convallis
					<h4>Clients’ Quotes</h4>
					<blockquote class="bq1">
						<img src="images/page1_img2.jpg" alt="" class="img_inner noresize fleft">
						<div class="extra_wrapper">
							<p>Duis massa elit, auctor non pellentesque vel, aliquet sit amet erat. Nullam eget dignissim nisi, aliquam feugiat nibh. </p>
							<div class="alright">
								<div class="col1">Miranda Brown</div>
								<a href="#" class="btn">More</a>
							</div>
						</div>
					</blockquote>
				</div>
			</div>
		</div>
@endsection
