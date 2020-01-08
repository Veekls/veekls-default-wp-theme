<form id="auto-listings-search" class="auto-listings-search s-1 " autocomplete="off" action="https://demo.wpautolistings.com/listings/" method="GET" role="search" _lpchecked="1">
	<div class="search-form__title">
		<p>Select your Vehicle options</p>
	</div>

	<div class="row condition-wrap">
		<div class="field condition">
			<span class="prefix">I'm looking for </span>
			<div class="SumoSelect sumo_condition" tabindex="0" role="button" aria-expanded="true">
				<select multiple="multiple" placeholder="condition" name="condition[]" class="SumoUnder">
					<option value="New">New</option>
					<option value="Used">Used</option>
				</select>
			</div>
		</div>
	</div>

	<div class="row price-wrap">
		<div class="field min-price">
			<span class="prefix">priced from</span>
			<div class="SumoSelect sumo_min_price" tabindex="0" role="button" aria-expanded="true">
				<select placeholder="min" name="min_price" class="SumoUnder" tabindex="-1">
					<option value="">min</option>
					<option value="3000">$3,000</option>
					<option value="5000">$5,000</option>
					<option value="10000">$10,000</option>
					<option value="15000">$15,000</option>
					<option value="20000">$20,000</option>
					<option value="25000">$25,000</option>
					<option value="30000">$30,000</option>
					<option value="35000">$35,000</option>
					<option value="40000">$40,000</option>
					<option value="45000">$45,000</option>
					<option value="50000">$50,000</option>
					<option value="60000">$60,000</option>
					<option value="80000">$80,000</option>
					<option value="100000">$100,000</option>
					<option value="125000">$125,000</option>
					<option value="150000">$150,000</option>
				</select>
			</div>
		</div>

		<div class="field max-price">
			<span class="prefix">to</span>
			<div class="SumoSelect sumo_max_price" tabindex="0" role="button" aria-expanded="true">
				<select placeholder="max" name="max_price" class="SumoUnder" tabindex="-1">
					<option value="">max</option>
					<option value="3000">$3,000</option>
					<option value="5000">$5,000</option>
					<option value="10000">$10,000</option>
					<option value="15000">$15,000</option>
					<option value="20000">$20,000</option>
					<option value="25000">$25,000</option>
					<option value="30000">$30,000</option>
					<option value="35000">$35,000</option>
					<option value="40000">$40,000</option>
					<option value="45000">$45,000</option>
					<option value="50000">$50,000</option>
					<option value="60000">$60,000</option>
					<option value="80000">$80,000</option>
					<option value="100000">$100,000</option>
					<option value="125000">$125,000</option>
					<option value="150000">$150,000</option>
				</select>
			</div>
		</div>
	</div>

	<div class="row area-wrap">
		<div class="field odometer">
			<div class="SumoSelect sumo_odometer" tabindex="0" role="button" aria-expanded="false">
				<select placeholder="Max Mileage" name="odometer" class="SumoUnder" tabindex="-1">
					<option value="">Max Mileage</option>
					<option value="10000">10,000 km or less</option>
					<option value="20000">20,000 km or less</option>
					<option value="30000">30,000 km or less</option>
					<option value="40000">40,000 km or less</option>
					<option value="50000">50,000 km or less</option>
					<option value="75000">75,000 km or less</option>
					<option value="100000">100,000 km or less</option>
					<option value="150000">150,000 km or less</option>
					<option value="200000">200,000 km or less</option>
				</select>
			</div>
		</div>

		<div class="field within">
			<div class="SumoSelect sumo_within" tabindex="0" role="button" aria-expanded="true">
				<select placeholder="within" name="within" class="SumoUnder" tabindex="-1">
					<option value="">within</option>
					<option value="10">10 km of</option>
					<option value="20">20 km of</option>
					<option value="30">30 km of</option>
					<option value="40">40 km of</option>
					<option value="50">50 km of</option>
					<option value="100">100 km of</option>
					<option value="150">150 km of</option>
					<option value="250">250 km of</option>
					<option value="500">500 km of</option>
				</select>
			</div>
		</div>

		<input class="field area" type="text" name="s" placeholder="State, Zip, Town" value="" />

		<button class="al-button" type="submit">Find My Car</button>

		<a class="refine">
			More Refinements
			<i class="fa fa-angle-down"></i>
		</a>

		<div class="row extras-wrap">
			<div class="field the-year">
				<div class="SumoSelect sumo_the_year" tabindex="0" role="button" aria-expanded="true">
					<select multiple="multiple" placeholder="Year" name="the_year[]" class="SumoUnder" tabindex="-1">
						<option value="2019">2019</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
						<option value="2016">2016</option>
					</select>
				</div>
			</div>

			<div class="field make">
				<div class="SumoSelect sumo_make" tabindex="0" role="button" aria-expanded="true">
					<select multiple="multiple" placeholder="Make" name="make[]" class="SumoUnder" tabindex="-1">
						<option value="Audi">Audi</option>
						<option value="BMW">BMW</option>
						<option value="Honda">Honda</option>
						<option value="Lexus">Lexus</option>
						<option value="Mazda">Mazda</option>
						<option value="Porsche">Porsche</option>
					</select>
				</div>
			</div>

			<div class="field model">
				<div class="SumoSelect sumo_model" tabindex="0" role="button" aria-expanded="false">
					<select multiple="multiple" placeholder="Model" name="model[]" class="SumoUnder" tabindex="-1">
						<option value="CX-5">CX-5</option>
						<option value="ES350">ES350</option>
						<option value="Launch Edition">Launch Edition</option>
						<option value="M3 Competition">M3 Competition</option>
						<option value="Mazda">Mazda</option>
						<option value="Panamera">Panamera</option>
						<option value="S3 Black Edition">S3 Black Edition</option>
						<option value="VTi-S LUXE">VTi-S LUXE</option>
					</select>
				</div>
			</div>

			<div class="field body-type">
				<div class="SumoSelect sumo_body_type" tabindex="0" role="button" aria-expanded="false">
					<select multiple="multiple" placeholder="Body Type" name="body_type[]" class="SumoUnder" tabindex="-1">
						<option value="sedan">SEDAN</option>
						<option value="suv">SUV</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</form>
