<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]>
<html lang="$ContentLocale"
      class="ie ie6">
<![endif]-->
<!--[if IE 7 ]>
<html lang="$ContentLocale"
      class="ie ie7">
<![endif]-->
<!--[if IE 8 ]>
<html lang="$ContentLocale"
      class="ie ie8">
<![endif]-->
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %>
		&raquo; $SiteConfig.Title</title>
	<meta charset="utf-8">
	<meta name="viewport"
	      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="Content-Type"
	      content="text/html; charset=utf-8">
	$MetaTags(false)
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<% require themedCSS('style') %>
	<link rel="stylesheet"
	      href="javascript/flexslider/flexslider.css">
	<link rel="stylesheet"
	      href="css/fontawesome.css">
</head>
<body class="$ClassName.ShortName<% if not $Menu(2) %> no-sidebar<% end_if %>"
      <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>
	<% include Header %>
<div class="main"
     role="main">
	<div>
		<% if $URLSegment = "Security" %>
			<% if $Form %>
				<div class="block">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
								$Form
							</div>
						</div>
					</div>
				</div>
			<% end_if %>
		<% end_if %>
		$Layout
		<%--<div class="block">--%>
		<%--<div class="container">--%>
		<%--<div class="row">--%>
		<%--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">--%>
		<%--$Content--%>
		<%--</div>--%>
		<%--</div>--%>
		<%--</div>--%>
		<%--</div>--%>
		<div class="block-bg">
			<% include ContactField %>
		</div>
		<% include Footer %>
		<span id="back-to-top"><i
				class="fas fa-chevron-up fa-3x"></i></span>
	</div>
</div>


	<% require javascript('//code.jquery.com/jquery-3.3.1.min.js') %>
	<% require themedJavascript('flexslider/jquery.flexslider-min.js') %>
	<% require themedJavascript('fontawesome/all.js') %>
	<% require themedJavascript('script') %>

</body>
</html>
