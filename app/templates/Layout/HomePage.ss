<% if $SliderItems %>
	<div class="flexslider"
	     id="flexslider-with-bg">
		<ul class="slides">
			<% loop $SliderItems.sort('SortOrder ASC') %>
				$renderToTemplate()
			<% end_loop %>
		</ul>
	</div>
<% end_if %>

<% if $KnowHowPages %>
	<div class="block first-block block-primary-border-top">
		<div class="container container-knowhowfields">
			<% include KnowHowFields %>
		</div>
	</div>
<% end_if %>

<% if $Content %>
	<div class="block">
		<div class="container">
			<div class="row justify-content-center center">
				<div class="col-xl-9 col-lg-9 col-md-10 col-sm-10">
					$Content
				</div>
			</div>
		</div>
	</div>
<% end_if %>

<% if $TextVideoTeasers %>
	<div class="block-medium no-mt no-pt no-mb no-pb">
		<div class="flexslider"
		     id="flexslider-video-teaser">
			<ul class="slides line-height-0">
				<% loop $TextVideoTeasers %>
					$renderToTemplate()
				<% end_loop %>
			</ul>
		</div>
	</div>
<% end_if %>

<% if $Branches %>
	<div class="block">
		<% include BranchesFields %>
	</div>
<% end_if %>

<% if $Machines %>
	<div class="block">
		<div class="container">
			<% loop $Machines.Limit(1) %>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<img class="fitting"
						     src="$Image.URL"
						     alt="">
					</div>
					<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
						<h2 class="center">
							Neu
							im
							Maschinenpark
						</h2>
						<h3>$Name</h3>
						<p>$Description</p>
					</div>
				</div>
			<% end_loop %>
		</div>
	</div>
<% end_if %>

<% if $News %>
	<div class="block block-news">
		<% include NewsFields %>
	</div>
<% end_if %>

<% if $Customers %>
	<div class="block">
		<% include Customers %>
	</div>
<% end_if %>
