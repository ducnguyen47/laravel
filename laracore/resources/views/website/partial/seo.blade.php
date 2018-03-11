<title>{{ seo()->getTitle() }}</title>
<link rel="shortcut icon" href="{{ option('site_favicon') }}" type="image/x-icon">
<link rel="icon" href="{{ option('site_favicon') }}" type="image/x-icon">
<meta property="og:site_name" content="{{ option('site_name') }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ seo()->getTitle() }}" />
<meta property="og:description" content="{{ seo()->getDescription() }}" />
<meta property="og:url" content="{{ request()->url() }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ seo()->getTitle() }}" />
<meta name="twitter:description" content="{{ seo()->getDescription() }}" />
<meta name="twitter:url" content="{{ request()->url() }}" />