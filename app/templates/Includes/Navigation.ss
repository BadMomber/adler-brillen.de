<div id="mobile-logo-holder">
	<a href="$BaseHref"
	   style="background-image: url('public/images/Logo-mi-technologies.png');"></a>
</div>

<nav class="main-navigation main-navigation-hidden"
     id="mobile-nav">
	<ul class="menu"
	    id="mobile-menu">
		<div id="logo-holder">
			<a href="$BaseHref"
			   style="background-image: url('public/images/Logo-mi-technologies.png');"></a>
		</div>
		<% loop $Menu(1) %>
			<span class="hover-menu-item">
				<li <% if $Children %>
				class="menu-item-has-children">
					<a class="menu-link-with-children"
					   href="$Link"
					   title="Go to the $Title page">$MenuTitle</a>
				<% else %>
					class="menu-item-no-children">
					<a class="menu-link-no-children"
					   href="$Link"
					   title="Go to the $Title page">$MenuTitle</a>
				<% end_if %>
					<% if $Children %>
						<ul class="sub-menu arrow-box">
							<% loop $Children %>
								<li class="secondary-nav-link
							<% if $isCurrent %>current<% else_if $isSection %>section<% end_if %>">
									<a href="$Link">$MenuTitle</a></li>
							<% end_loop %>
						</ul>
					<% end_if %>
				</li>
			</span>
		<% end_loop %>
		<ul id="social-menu">
			<li id="search-icon">
				<i class="fas fa-search"></i>
			</li>
			<li id="facebook-icon">
				<i class="fab fa-facebook-f"></i>
			</li>
			<li class="lang-switch">
				<a class="lang-switch-link"
				   href="#">DE</a>
				<span class="lang-switch"> | </span>
				<a class="lang-switch-link"
				   href="#">EN</a>
			</li>
		</ul>
	</ul>
</nav>

<div id="burger">
	<div class="burger-line"
	     id="bar1"></div>
	<div class="burger-line"
	     id="bar2"></div>
	<div class="burger-line"
	     id="bar3"></div>
</div>
