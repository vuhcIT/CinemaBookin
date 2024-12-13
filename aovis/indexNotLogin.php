<?php
session_start();
require_once("connect.php");

$result1 = $conn->query("select * from phim");
$result2 = $conn->query("SELECT p.IDPhim, p.TenPhim,p.AnhChinh,p.TheLoai,p.ThoiLuong
FROM phim p
INNER JOIN buoichieu bc ON p.IDPhim = bc.IDPhim
WHERE DATE(bc.BuoiChieu) = CURDATE();");

$result3 = $conn->query("SELECT *
FROM phim p
INNER JOIN buoichieu bc ON p.IDPhim = bc.IDPhim
WHERE DATE(bc.BuoiChieu) > CURDATE();");

$resultTrailer = $conn->query("select * from phim");

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="profile" href="//gmpg.org/xfn/11">
	<link rel="pingback" href="https://chonloc/aovis/xmlrpc.php">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Aovis &#8211; Film &amp; Movie Booking WordPress Theme &#8211; Film &amp; Movie Booking WordPress Theme
	</title>
	<meta name='robots' content='noindex, nofollow'>
	<link rel='dns-prefetch' href='//chonloc'>
	<link rel='dns-prefetch' href='//fonts.googleapis.com'>
	<link rel="alternate" type="application/rss+xml" title="Aovis - Film &amp; Movie Booking WordPress Theme &raquo; Feed" href="feed/index.htm">
	<link rel="alternate" type="application/rss+xml" title="Aovis - Film &amp; Movie Booking WordPress Theme &raquo; Comments Feed" href="comments/feed/index.htm">
	<script type="text/javascript">
		/* <![CDATA[ */
		window._wpemojiSettings = {
			"baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
			"ext": ".png",
			"svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
			"svgExt": ".svg",
			"source": {
				"concatemoji": "https:\/\/chonloc\/aovis\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.4.1"
			}
		};
		/*! This file is auto-generated */
		! function(i, n) {
			var o, s, e;

			function c(e) {
				try {
					var t = {
						supportTests: e,
						timestamp: (new Date).valueOf()
					};
					sessionStorage.setItem(o, JSON.stringify(t))
				} catch (e) {}
			}

			function p(e, t, n) {
				e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
				var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
					r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data));
				return t.every(function(e, t) {
					return e === r[t]
				})
			}

			function u(e, t, n) {
				switch (t) {
					case "flag":
						return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");
					case "emoji":
						return !n(e, "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff", "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff")
				}
				return !1
			}

			function f(e, t, n) {
				var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : i.createElement("canvas"),
					a = r.getContext("2d", {
						willReadFrequently: !0
					}),
					o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
				return e.forEach(function(e) {
					o[e] = t(a, e, n)
				}), o
			}

			function t(e) {
				var t = i.createElement("script");
				t.src = e, t.defer = !0, i.head.appendChild(t)
			}
			"undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
				everything: !0,
				everythingExceptFlag: !0
			}, e = new Promise(function(e) {
				i.addEventListener("DOMContentLoaded", e, {
					once: !0
				})
			}), new Promise(function(t) {
				var n = function() {
					try {
						var e = JSON.parse(sessionStorage.getItem(o));
						if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
					} catch (e) {}
					return null
				}();
				if (!n) {
					if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
						var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));",
							r = new Blob([e], {
								type: "text/javascript"
							}),
							a = new Worker(URL.createObjectURL(r), {
								name: "wpTestEmojiSupports"
							});
						return void(a.onmessage = function(e) {
							c(n = e.data), a.terminate(), t(n)
						})
					} catch (e) {}
					c(n = f(s, u, p))
				}
				t(n)
			}).then(function(e) {
				for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]);
				n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function() {
					n.DOMReady = !0
				}
			}).then(function() {
				return e
			}).then(function() {
				var e;
				n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
			}))
		}((window, document), window._wpemojiSettings);
		/* ]]> */
	</script>
	<style id='wp-emoji-styles-inline-css' type='text/css'>
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 0.07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>
	<link rel='stylesheet' id='wp-block-library-css' href='wp-includes/css/dist/block-library/style.min.css?ver=6.4.1' type='text/css' media='all'>
	<style id='classic-theme-styles-inline-css' type='text/css'>
		/*! This file is auto-generated */
		.wp-block-button__link {
			color: #fff;
			background-color: #32373c;
			border-radius: 9999px;
			box-shadow: none;
			text-decoration: none;
			padding: calc(.667em + 2px) calc(1.333em + 2px);
			font-size: 1.125em
		}

		.wp-block-file__button {
			background: #32373c;
			color: #fff;
			text-decoration: none
		}
	</style>
	<style id='global-styles-inline-css' type='text/css'>
		body {
			--wp--preset--color--black: #000000;
			--wp--preset--color--cyan-bluish-gray: #abb8c3;
			--wp--preset--color--white: #ffffff;
			--wp--preset--color--pale-pink: #f78da7;
			--wp--preset--color--vivid-red: #cf2e2e;
			--wp--preset--color--luminous-vivid-orange: #ff6900;
			--wp--preset--color--luminous-vivid-amber: #fcb900;
			--wp--preset--color--light-green-cyan: #7bdcb5;
			--wp--preset--color--vivid-green-cyan: #00d084;
			--wp--preset--color--pale-cyan-blue: #8ed1fc;
			--wp--preset--color--vivid-cyan-blue: #0693e3;
			--wp--preset--color--vivid-purple: #9b51e0;
			--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
			--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
			--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
			--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
			--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
			--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
			--wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
			--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
			--wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
			--wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
			--wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
			--wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
			--wp--preset--font-size--small: 13px;
			--wp--preset--font-size--medium: 20px;
			--wp--preset--font-size--large: 36px;
			--wp--preset--font-size--x-large: 42px;
			--wp--preset--spacing--20: 0.44rem;
			--wp--preset--spacing--30: 0.67rem;
			--wp--preset--spacing--40: 1rem;
			--wp--preset--spacing--50: 1.5rem;
			--wp--preset--spacing--60: 2.25rem;
			--wp--preset--spacing--70: 3.38rem;
			--wp--preset--spacing--80: 5.06rem;
			--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
			--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
			--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
		}

		:where(.is-layout-flex) {
			gap: 0.5em;
		}

		:where(.is-layout-grid) {
			gap: 0.5em;
		}

		body .is-layout-flow>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		body .is-layout-flow>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		body .is-layout-flow>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-constrained>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		body .is-layout-constrained>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		body .is-layout-constrained>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
			max-width: var(--wp--style--global--content-size);
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-constrained>.alignwide {
			max-width: var(--wp--style--global--wide-size);
		}

		body .is-layout-flex {
			display: flex;
		}

		body .is-layout-flex {
			flex-wrap: wrap;
			align-items: center;
		}

		body .is-layout-flex>* {
			margin: 0;
		}

		body .is-layout-grid {
			display: grid;
		}

		body .is-layout-grid>* {
			margin: 0;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		.has-black-color {
			color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-color {
			color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-color {
			color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-color {
			color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-color {
			color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-color {
			color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-color {
			color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-color {
			color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-color {
			color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-color {
			color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-color {
			color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-color {
			color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-background-color {
			background-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-background-color {
			background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-background-color {
			background-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-background-color {
			background-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-background-color {
			background-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-background-color {
			background-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-background-color {
			background-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-background-color {
			background-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-background-color {
			background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-background-color {
			background-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-border-color {
			border-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-border-color {
			border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-border-color {
			border-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-border-color {
			border-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-border-color {
			border-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-border-color {
			border-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-border-color {
			border-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-border-color {
			border-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-border-color {
			border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-border-color {
			border-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-vivid-cyan-blue-to-vivid-purple-gradient-background {
			background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
		}

		.has-light-green-cyan-to-vivid-green-cyan-gradient-background {
			background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
		}

		.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-orange-to-vivid-red-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
		}

		.has-very-light-gray-to-cyan-bluish-gray-gradient-background {
			background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
		}

		.has-cool-to-warm-spectrum-gradient-background {
			background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
		}

		.has-blush-light-purple-gradient-background {
			background: var(--wp--preset--gradient--blush-light-purple) !important;
		}

		.has-blush-bordeaux-gradient-background {
			background: var(--wp--preset--gradient--blush-bordeaux) !important;
		}

		.has-luminous-dusk-gradient-background {
			background: var(--wp--preset--gradient--luminous-dusk) !important;
		}

		.has-pale-ocean-gradient-background {
			background: var(--wp--preset--gradient--pale-ocean) !important;
		}

		.has-electric-grass-gradient-background {
			background: var(--wp--preset--gradient--electric-grass) !important;
		}

		.has-midnight-gradient-background {
			background: var(--wp--preset--gradient--midnight) !important;
		}

		.has-small-font-size {
			font-size: var(--wp--preset--font-size--small) !important;
		}

		.has-medium-font-size {
			font-size: var(--wp--preset--font-size--medium) !important;
		}

		.has-large-font-size {
			font-size: var(--wp--preset--font-size--large) !important;
		}

		.has-x-large-font-size {
			font-size: var(--wp--preset--font-size--x-large) !important;
		}

		.wp-block-navigation a:where(:not(.wp-element-button)) {
			color: inherit;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		.wp-block-pullquote {
			font-size: 1.5em;
			line-height: 1.6;
		}
	</style>
	<link rel='stylesheet' id='contact-form-7-css' href='wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.8.2' type='text/css' media='all'>
	<link rel='stylesheet' id='mb_frontend-css' href='wp-content/plugins/movie-booking/assets/css/frontend/style.css?ver=6.4.1' type='text/css' media='all'>
	<link rel='stylesheet' id='event-frontend-css' href='wp-content/plugins/ova-events/assets/css/frontend/event.css' type='text/css' media='all'>
	<style id='event-frontend-inline-css' type='text/css'>
		#sidebar-event .widget_feature_event .event-feature .item .date-event .date,
		.single_event .content-event .tab-Location ul.event_nav li.event_nav-item.active:after,
		.single_event .content-event .tab-Location ul.event_nav li.event_nav-item a:after,
		.single_event .content-event .event-related .archive_event .ovaev-content.content-grid .date-event .date,
		#sidebar-event .widget ul li a:hover:before,
		.type1 .desc .event_post .button_event .view_detail:hover,
		.type2 .desc .event_post .button_event .view_detail:hover,
		#sidebar-event .widget_feature_event .event-feature .item .desc .event_post .button_event .view_detail:hover,
		#sidebar-event .widget_list_event .button-all-event a:hover,
		.single_event .content-event .event_intro .wrap-event-info .wrap-booking-links a:hover .single_event .content-event .ova-next-pre-post .pre:hover .num-1 .icon,
		.single_event .content-event .ova-next-pre-post .next:hover .num-1 .icon,
		.single_event .content-event .ova-next-pre-post .pre:hover .num-1 .icon,
		.single_event .content-event .ova-next-pre-post .next:hover .num-1 .icon,
		.single_event .content-event .event-related .archive_event .ovaev-content.content-grid .desc .event_post .button_event .view_detail:hover,
		.single_event .content-event .event_intro .wrap-event-info .wrap-booking-links a:hover,
		.ovaev-event-element.ovaev-event-slide .owl-nav button:hover,
		.ovapo_project_slide .grid .owl-nav button:hover,
		.search_archive_event form .wrap-ovaev_submit .ovaev_submit,
		.ovaev-event-element.version_2 .wp-content .ovaev-content.content-grid .date-event .date,
		.ovaev-event-element.version_2 .wp-content .ovaev-content.content-grid .desc .event_post .button_event .view_detail:hover,
		.blog_pagination .pagination li.active a,
		.blog_pagination .pagination li a:hover,
		.blog_pagination .pagination li a:focus,
		.ovaev-event-element.ovaev-event-slide .owl-dots .owl-dot.active span,
		.ovapo_project_grid .btn_grid .btn_grid_event:hover,
		.events_pagination .page-numbers li span,
		.events_pagination .page-numbers li a:hover,
		.ovaev-wrapper-search-ajax .search-ajax-pagination ul li .page-numbers.current,
		.ovaev-wrapper-search-ajax .search-ajax-pagination ul li .page-numbers:hover {
			background-color: lime;
		}

		.type1 .desc .event_post .button_event .view_detail:hover,
		.type2 .desc .event_post .button_event .view_detail:hover,
		#sidebar-event .widget_feature_event .event-feature .item .desc .event_post .button_event .view_detail:hover,
		#sidebar-event .widget_list_event .button-all-event a:hover,
		.single_event .content-event .event_intro .wrap-event-info .wrap-booking-links a:hover,
		.single_event .content-event .ova-next-pre-post .pre:hover .num-1 .icon,
		.single_event .content-event .ova-next-pre-post .next:hover .num-1 .icon,
		.single_event .content-event .event-related .archive_event .ovaev-content.content-grid .desc .event_post .button_event .view_detail:hover,
		.search_archive_event form .wrap-ovaev_submit .ovaev_submit,
		.ovaev-event-element.version_2 .wp-content .ovaev-content.content-grid .desc .event_post .button_event .view_detail:hover,
		.blog_pagination .pagination li.active a,
		.blog_pagination .pagination li a:hover,
		.blog_pagination .pagination li a:focus,
		.ovapo_project_grid .btn_grid .btn_grid_event:hover,
		.events_pagination .page-numbers li a:hover,
		.events_pagination .page-numbers li span,
		.ovaev-wrapper-search-ajax .search-ajax-pagination ul li .page-numbers.current,
		.ovaev-wrapper-search-ajax .search-ajax-pagination ul li .page-numbers:hover,
		.ovaev-booking-btn a:hover {
			border-color: lime;
		}

		.type1 .date-event .month-year,
		.type1 .desc .event_post .post_cat .event_type,
		.type1 .desc .event_post .event_title a:hover,
		.icon_event,
		.type2 .date-event .month-year,
		.type2 .desc .event_post .post_cat .event_type,
		.type2 .desc .event_post .event_title a:hover,
		#sidebar-event .widget_feature_event .event-feature .item .date-event .month-year,
		#sidebar-event .widget_feature_event .event-feature .item .desc .event_post .post_cat .event_type,
		#sidebar-event .widget_feature_event .event-feature .item .desc .event_post .event_title a:hover,
		#sidebar-event .widget_list_event .list-event .item-event .ova-content .title a:hover,
		#sidebar-event .widget ul li:hover a,
		#sidebar-event .widget ul li:hover,
		.single_event .content-event .event_intro .wrap-event-info .wrap-info .wrap-pro i,
		.single_event .content-event .event_intro .wrap-event-info .wrap-info .ovaev-category i,
		.single_event .content-event .ova-next-pre-post .pre .num-2 .title:hover,
		.single_event .content-event .ova-next-pre-post .next .num-2 .title:hover,
		.single_event .content-event .event-related .archive_event .ovaev-content.content-grid .date-event .month-year,
		.single_event .content-event .event-related .archive_event .ovaev-content.content-grid .desc .event_post .post_cat .event_type,
		.single_event .content-event .event-related .archive_event .ovaev-content.content-grid .desc .event_post .event_title a:hover,
		.single_event .content-event .event_tags_share .event-tags a:hover,
		#sidebar-event .widget .tagcloud a:hover,
		.ovapo_project_grid .button-filter button.active,
		.ovapo_project_grid .button-filter button:hover,
		.more_date_text,
		.ovaev-event-element.version_2 .wp-content .ovaev-content.content-grid .date-event .month-year,
		.ovaev-event-element.version_2 .wp-content .ovaev-content.content-grid .desc .event_post .event_title a:hover,
		.ovaev-event-element.version_2 .wp-content .ovaev-content.content-grid .desc .event_post .time-event .time .more_date_text span,
		.ovaev-event-element.version_2 .title-readmore .read-more,
		.ovaev-event-element .item .title a:hover,
		.single_event .content-event .event_intro .wrap-event-info .ovaev-category a:hover,
		#sidebar-event .widget_list_event .list-event .item-event .ova-content .time .more_date_text span,
		.ovaev-shortcode-title a:hover,
		.ovaev-shortcode-date i,
		.ovaev-shortcode-time i,
		.ovaev-shortcode-location i,
		.ovaev-shortcode-categories i,
		.ovaev-shortcode-categories span.event-category a:hover,
		.ovaev-shortcode-tags .ovaev-tag:hover {
			color: lime;
		}

		#sidebar-event .widget .widget-title {
			border-bottom-color: lime;
		}

		.ovapo_project_grid .wrap_loader .loader circle,
		.ovaev-wrapper-search-ajax .ovaev-search-ajax-container .wrap_loader .loader circle {
			stroke: lime;
		}
	</style>
	<link rel='stylesheet' id='woocommerce-layout-css' href='wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=8.2.1' type='text/css' media='all'>
	<link rel='stylesheet' id='woocommerce-smallscreen-css' href='wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=8.2.1' type='text/css' media='only screen and (max-width: 768px)'>
	<link rel='stylesheet' id='woocommerce-general-css' href='wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=8.2.1' type='text/css' media='all'>
	<style id='woocommerce-inline-inline-css' type='text/css'>
		.woocommerce form .form-row .required {
			visibility: visible;
		}
	</style>
	<link rel='stylesheet' id='aovis-style-css' href='wp-content/themes/aovis/style.css?ver=1.0.2' type='text/css' media='all'>
	<style id='aovis-style-inline-css' type='text/css'>
		:root {
			--primary: lime;
			--heading: #000000;
			--text: #737373;
			--light: #E0E0E0;
			--primary-font: Space Grotesk;
			--font-size: 16px;
			--line-height: 1.86em;
			--letter-spacing: 0px;
			--secondary-font: Space Grotesk;
			--width-sidebar: 370px;
			--main-content: calc(100% - 370px);
			--container-width: 1190px;
			--boxed-offset: 20px;
			--woo-layout: layout_1c;
			--woo-width-sidebar: 320px;
			--woo-main-content: calc(100% - 320px);
		}

		@media (min-width: 1024px) and (max-width: 1250px) {

			body .row_site,
			body .elementor-section.elementor-section-boxed>.elementor-container {
				max-width: 100%;
				padding-left: 30px;
				padding-right: 30px;
			}
		}
	</style>
	<link rel='stylesheet' id='child-style-css' href='wp-content/themes/aovis-child/style.css?ver=1.0.0' type='text/css' media='all'>
	<link rel='stylesheet' id='ova-google-fonts-css' href='../css?family=Space+Grotesk%3A300%2Cregular%2C500%2C600%2C700%7CSpace+Grotesk%3A300%2Cregular%2C500%2C600%2C700' type='text/css' media='all'>
	<link rel='stylesheet' id='carousel-css' href='wp-content/themes/aovis/assets/libs/carousel/assets/owl.carousel.min.css' type='text/css' media='all'>
	<link rel='stylesheet' id='ovaicon-css' href='wp-content/themes/aovis/assets/libs/ovaicon/font/ovaicon.css' type='text/css' media='all'>
	<link rel='stylesheet' id='flaticon-aovis-css' href='wp-content/themes/aovis/assets/libs/flaticon/font/flaticon_aovis.css' type='text/css' media='all'>
	<link rel='stylesheet' id='elementor-icons-css' href='wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.23.0' type='text/css' media='all'>
	<link rel='stylesheet' id='elementor-frontend-css' href='wp-content/plugins/elementor/assets/css/frontend-lite.min.css?ver=3.17.2' type='text/css' media='all'>
	<style id='elementor-frontend-inline-css' type='text/css'>
		.elementor-kit-6 {
			--e-global-color-primary: #6EC1E4;
			--e-global-color-secondary: #54595F;
			--e-global-color-text: #7A7A7A;
			--e-global-color-accent: #61CE70;
			--e-global-typography-primary-font-family: "Roboto";
			--e-global-typography-primary-font-weight: 600;
			--e-global-typography-secondary-font-family: "Roboto Slab";
			--e-global-typography-secondary-font-weight: 400;
			--e-global-typography-text-font-family: "Roboto";
			--e-global-typography-text-font-weight: 400;
			--e-global-typography-accent-font-family: "Roboto";
			--e-global-typography-accent-font-weight: 500;
		}

		.elementor-section.elementor-section-boxed>.elementor-container {
			max-width: 1140px;
		}

		.e-con {
			--container-max-width: 1140px;
		}

		.elementor-widget:not(:last-child) {
			margin-block-end: 20px;
		}

		.elementor-element {
			--widgets-spacing: 20px 20px;
		}

		h1.entry-title {
			display: var(--page-title-display);
		}

		@media(max-width:1024px) {
			.elementor-section.elementor-section-boxed>.elementor-container {
				max-width: 1024px;
			}

			.e-con {
				--container-max-width: 1024px;
			}
		}

		@media(max-width:767px) {
			.elementor-section.elementor-section-boxed>.elementor-container {
				max-width: 767px;
			}

			.e-con {
				--container-max-width: 767px;
			}
		}

		.elementor-24 .elementor-element.elementor-element-1dd1e82:not(.elementor-motion-effects-element-type-background),
		.elementor-24 .elementor-element.elementor-element-1dd1e82>.elementor-motion-effects-container>.elementor-motion-effects-layer {
			background-color: #000000;
		}

		.elementor-24 .elementor-element.elementor-element-1dd1e82 {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
			margin-top: -100px;
			margin-bottom: 0px;
		}

		.elementor-24 .elementor-element.elementor-element-1dd1e82>.elementor-background-overlay {
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-2d77ec2 img {
			width: 100%;
			height: 10px;
		}

		.elementor-24 .elementor-element.elementor-element-905823c>.elementor-container {
			max-width: 1440px;
		}

		.elementor-24 .elementor-element.elementor-element-905823c>.elementor-background-overlay {
			background-image: url("wp-content/uploads/2023/03/big-bg-film.png");
			background-position: top left;
			background-repeat: no-repeat;
			opacity: 0.03;
			mix-blend-mode: luminosity;
		}

		.elementor-24 .elementor-element.elementor-element-d5d8fde>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
			margin-bottom: 30px;
		}

		.elementor-24 .elementor-element.elementor-element-26d7b60 {
			margin-top: 40px;
			margin-bottom: 0px;
		}

		.elementor-24 .elementor-element.elementor-element-8b471e9 {
			padding: 110px 0px 110px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-0788966 .ova-heading {
			text-align: center;
		}

		.elementor-24 .elementor-element.elementor-element-8733e3a:not(.elementor-motion-effects-element-type-background),
		.elementor-24 .elementor-element.elementor-element-8733e3a>.elementor-motion-effects-container>.elementor-motion-effects-layer {
			background-color: #F3F3F3;
		}

		.elementor-24 .elementor-element.elementor-element-8733e3a>.elementor-background-overlay {
			background-image: url("wp-content/uploads/2023/03/seat-bg.png");
			background-position: bottom center;
			background-repeat: no-repeat;
			background-size: cover;
			opacity: 0.1;
			mix-blend-mode: luminosity;
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-8733e3a {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
			padding: 110px 0px 110px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-a0eba18 {
			margin-top: 0px;
			margin-bottom: 30px;
		}

		.elementor-24 .elementor-element.elementor-element-56907dd .ova-heading {
			text-align: left;
		}

		.elementor-bc-flex-widget .elementor-24 .elementor-element.elementor-element-8656789.elementor-column .elementor-widget-wrap {
			align-items: center;
		}

		.elementor-24 .elementor-element.elementor-element-8656789.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
			align-content: center;
			align-items: center;
		}

		.elementor-24 .elementor-element.elementor-element-eff0d64 p {
			margin: 0px 0px 0px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-f9fd67c>.elementor-widget-container {
			margin: 0px 0px 20px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-4715833>.elementor-container {
			max-width: 622px;
		}

		.elementor-bc-flex-widget .elementor-24 .elementor-element.elementor-element-bf458f1.elementor-column .elementor-widget-wrap {
			align-items: center;
		}

		.elementor-24 .elementor-element.elementor-element-bf458f1.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
			align-content: center;
			align-items: center;
		}

		.elementor-24 .elementor-element.elementor-element-bf458f1.elementor-column>.elementor-widget-wrap {
			justify-content: center;
		}

		.elementor-24 .elementor-element.elementor-element-bf458f1>.elementor-element-populated {
			border-style: solid;
			border-width: 2px 2px 2px 2px;
			border-color: #000000;
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
			padding: 10px 0px 10px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-bf458f1>.elementor-element-populated>.elementor-background-overlay {
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-8a3ee06 .ova-counter {
			justify-content: center;
		}

		.elementor-24 .elementor-element.elementor-element-8a3ee06 .ova-counter .icon {
			justify-content: center;
		}

		.elementor-24 .elementor-element.elementor-element-8a3ee06 .ova-counter .counter-content {
			padding: 0px 0px 0px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-8a3ee06 .ova-counter .odometer {
			font-size: 20px;
			line-height: 1em;
			color: lime;
		}

		.elementor-24 .elementor-element.elementor-element-8a3ee06 {
			width: auto;
			max-width: auto;
		}

		.elementor-24 .elementor-element.elementor-element-4c26a0e p {
			margin: 0px 0px 0px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-4c26a0e>.elementor-widget-container {
			margin: 0px 30px 0px 10px;
		}

		.elementor-24 .elementor-element.elementor-element-4c26a0e {
			width: auto;
			max-width: auto;
		}

		.elementor-24 .elementor-element.elementor-element-a58769b .elementor-button {
			font-size: 13px;
			line-height: 2.3em;
			padding: 2px 20px 2px 20px;
		}

		.elementor-24 .elementor-element.elementor-element-a58769b {
			width: auto;
			max-width: auto;
		}

		.elementor-24 .elementor-element.elementor-element-4349105>.elementor-container>.elementor-column>.elementor-widget-wrap {
			align-content: center;
			align-items: center;
		}

		.elementor-24 .elementor-element.elementor-element-4349105:not(.elementor-motion-effects-element-type-background),
		.elementor-24 .elementor-element.elementor-element-4349105>.elementor-motion-effects-container>.elementor-motion-effects-layer {
			background-color: transparent;
			background-image: linear-gradient(90deg, #000000 0%, #FFFFFF 100%);
		}

		.elementor-24 .elementor-element.elementor-element-4349105>.elementor-background-overlay {
			background-image: url("wp-content/uploads/2023/02/background-documentary-home1.jpg");
			background-position: center center;
			background-repeat: no-repeat;
			background-size: cover;
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-4349105 {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
			padding: 110px 0px 110px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-777c035 .ova-heading .title,
		.elementor-24 .elementor-element.elementor-element-777c035 .ova-heading .title a,
		.elementor-24 .elementor-element.elementor-element-777c035 .ova-heading .top-heading .title {
			color: #FFFFFF;
		}

		.elementor-24 .elementor-element.elementor-element-777c035 .ova-heading .sub-title {
			color: #999999;
		}

		.elementor-24 .elementor-element.elementor-element-777c035 .ova-heading .description {
			color: #999999;
		}

		.elementor-24 .elementor-element.elementor-element-071c160 img {
			opacity: 0.5;
		}

		.elementor-24 .elementor-element.elementor-element-071c160>.elementor-widget-container {
			margin: 12px 20px 40px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-071c160 {
			width: auto;
			max-width: auto;
		}

		.elementor-24 .elementor-element.elementor-element-df0f64e img {
			opacity: 0.5;
		}

		.elementor-24 .elementor-element.elementor-element-df0f64e>.elementor-widget-container {
			margin: 12px 0px 40px 20px;
		}

		.elementor-24 .elementor-element.elementor-element-df0f64e {
			width: auto;
			max-width: auto;
		}

		.elementor-24 .elementor-element.elementor-element-1617fb1 .elementor-button {
			fill: #000000;
			color: #000000;
			background-color: #FFFFFF;
		}

		.elementor-24 .elementor-element.elementor-element-1617fb1 .elementor-button:hover,
		.elementor-24 .elementor-element.elementor-element-1617fb1 .elementor-button:focus {
			color: #FFFFFF;
			background-color: #D96D2C;
		}

		.elementor-24 .elementor-element.elementor-element-1617fb1 .elementor-button:hover svg,
		.elementor-24 .elementor-element.elementor-element-1617fb1 .elementor-button:focus svg {
			fill: #FFFFFF;
		}

		.elementor-24 .elementor-element.elementor-element-7cdb4f2.elementor-column>.elementor-widget-wrap {
			justify-content: flex-end;
		}

		.elementor-24 .elementor-element.elementor-element-cdf8cb1 .ova-video .icon-content-view .content:after {
			background-color: #0000006B;
		}

		.elementor-24 .elementor-element.elementor-element-cdf8cb1 .ova-video .text {
			font-family: "Covered By Your Grace", Sans-serif;
		}

		.elementor-24 .elementor-element.elementor-element-cdf8cb1 {
			width: auto;
			max-width: auto;
		}

		.elementor-24 .elementor-element.elementor-element-b0a0ff3 {
			width: auto;
			max-width: auto;
			bottom: 100px;
		}

		body:not(.rtl) .elementor-24 .elementor-element.elementor-element-b0a0ff3 {
			left: 40px;
		}

		body.rtl .elementor-24 .elementor-element.elementor-element-b0a0ff3 {
			right: 40px;
		}

		.elementor-24 .elementor-element.elementor-element-12c3dab>.elementor-background-overlay {
			background-image: url("wp-content/uploads/2023/03/bg-ticket-decoration.png");
			background-position: center center;
			background-repeat: no-repeat;
			opacity: 0.1;
			mix-blend-mode: screen;
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-12c3dab {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
			margin-top: 0px;
			margin-bottom: 50px;
		}

		.elementor-24 .elementor-element.elementor-element-12c3dab>.elementor-shape-bottom svg {
			width: calc(100% + 1.3px);
			height: 15px;
		}

		.elementor-24 .elementor-element.elementor-element-a1ad230 {
			text-align: center;
			color: #FFFFFF;
			font-size: 40px;
			font-weight: 700;
			line-height: 1.2em;
		}

		.elementor-24 .elementor-element.elementor-element-a1ad230>.elementor-widget-container {
			padding: 45px 0px 45px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-cbff3c2>.elementor-container {
			max-width: 1645px;
		}

		.elementor-24 .elementor-element.elementor-element-1e773e4>.elementor-container>.elementor-column>.elementor-widget-wrap {
			align-content: center;
			align-items: center;
		}

		.elementor-24 .elementor-element.elementor-element-1e773e4:not(.elementor-motion-effects-element-type-background),
		.elementor-24 .elementor-element.elementor-element-1e773e4>.elementor-motion-effects-container>.elementor-motion-effects-layer {
			background-image: url("wp-content/uploads/2023/03/bg-black-popcorn.jpg");
			background-position: center right;
			background-repeat: no-repeat;
			background-size: 36.8% auto;
		}

		.elementor-24 .elementor-element.elementor-element-1e773e4>.elementor-background-overlay {
			background-image: url("wp-content/uploads/2023/03/background-event-home-1.png");
			background-position: top left;
			background-repeat: no-repeat;
			background-size: contain;
			opacity: 0.15;
			mix-blend-mode: luminosity;
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-1e773e4 {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
			margin-top: 100px;
			margin-bottom: 100px;
			padding: 80px 0px 80px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-a8f0a50>.elementor-widget-container {
			margin: 0px 0px 20px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-a589e16>.elementor-element-populated {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-a589e16>.elementor-element-populated>.elementor-background-overlay {
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-3d81305 {
			margin-top: 0px;
			margin-bottom: 60px;
		}

		.elementor-24 .elementor-element.elementor-element-b546227 .ova-images-slider .item-images-slider img {
			opacity: 1;
		}

		.elementor-24 .elementor-element.elementor-element-b546227 .ova-images-slider .item-images-slider:hover img {
			opacity: 0.7;
		}

		.elementor-24 .elementor-element.elementor-element-aedc756:not(.elementor-motion-effects-element-type-background),
		.elementor-24 .elementor-element.elementor-element-aedc756>.elementor-motion-effects-container>.elementor-motion-effects-layer {
			background-color: #F3F3F3;
			background-image: url("wp-content/uploads/2023/02/background-people-feedback-home-1.png");
			background-position: 770px 90px;
			background-repeat: no-repeat;
			background-size: auto;
		}

		.elementor-24 .elementor-element.elementor-element-aedc756>.elementor-background-overlay {
			background-image: url("wp-content/uploads/2023/02/background-feedback-home-1.png");
			background-position: center center;
			background-repeat: no-repeat;
			background-size: cover;
			opacity: 0.1;
			mix-blend-mode: luminosity;
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-aedc756 {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
			padding: 110px 0px 70px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-62a5c17 .elementor-button {
			background-color: #000000;
		}

		.elementor-24 .elementor-element.elementor-element-62a5c17 .elementor-button:hover,
		.elementor-24 .elementor-element.elementor-element-62a5c17 .elementor-button:focus {
			background-color: #D96D2C;
		}

		.elementor-24 .elementor-element.elementor-element-56817db>.elementor-container {
			max-width: 1500px;
		}

		.elementor-24 .elementor-element.elementor-element-56817db {
			padding: 110px 0px 110px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-5eb3c6b>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
			margin-bottom: 30px;
		}

		.elementor-24 .elementor-element.elementor-element-d7a3f7b .ova-heading {
			text-align: center;
		}

		.elementor-bc-flex-widget .elementor-24 .elementor-element.elementor-element-a451da2.elementor-column .elementor-widget-wrap {
			align-items: center;
		}

		.elementor-24 .elementor-element.elementor-element-a451da2.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
			align-content: center;
			align-items: center;
		}

		.elementor-24 .elementor-element.elementor-element-a451da2.elementor-column>.elementor-widget-wrap {
			justify-content: space-between;
		}

		.elementor-24 .elementor-element.elementor-element-a451da2:not(.elementor-motion-effects-element-type-background)>.elementor-widget-wrap,
		.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-widget-wrap>.elementor-motion-effects-container>.elementor-motion-effects-layer {
			background-image: url("wp-content/uploads/2023/03/background-reel-cta-1.png");
			background-position: -70px 0px;
			background-repeat: no-repeat;
			background-size: auto;
		}

		.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-element-populated>.elementor-background-overlay {
			background-image: url("wp-content/uploads/2023/03/bg-discount-for-student.png");
			background-position: center center;
			background-repeat: no-repeat;
			opacity: 0.6;
		}

		.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-element-populated>.elementor-background-overlay {
			mix-blend-mode: luminosity;
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-element-populated {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
			padding: 63px 60px 63px 70px;
		}

		.elementor-24 .elementor-element.elementor-element-2b260a3 {
			color: #FFFFFF;
			font-size: 36px;
			font-weight: 700;
			line-height: 1.2em;
			width: auto;
			max-width: auto;
		}

		.elementor-24 .elementor-element.elementor-element-2b260a3 p {
			margin: 0px 0px 0px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-fd99c8e .elementor-button {
			background-color: #000000;
		}

		.elementor-24 .elementor-element.elementor-element-fd99c8e .elementor-button:hover,
		.elementor-24 .elementor-element.elementor-element-fd99c8e .elementor-button:focus {
			color: lime;
			background-color: #FFFFFF;
		}

		.elementor-24 .elementor-element.elementor-element-fd99c8e .elementor-button:hover svg,
		.elementor-24 .elementor-element.elementor-element-fd99c8e .elementor-button:focus svg {
			fill: lime;
		}

		.elementor-24 .elementor-element.elementor-element-fd99c8e {
			width: auto;
			max-width: auto;
		}

		.elementor-24 .elementor-element.elementor-element-036b97f>.elementor-background-overlay {
			background-image: url("wp-content/uploads/2023/03/background-blog-home-1.png");
			background-position: center center;
			background-repeat: no-repeat;
			background-size: cover;
			opacity: 0.5;
		}

		.elementor-24 .elementor-element.elementor-element-036b97f {
			padding: 110px 0px 280px 0px;
		}

		.elementor-24 .elementor-element.elementor-element-2989fcc .ova-heading {
			text-align: center;
		}

		.elementor-24 .elementor-element.elementor-element-d6d3eaf {
			margin-top: -245px;
			margin-bottom: 120px;
		}

		.elementor-24 .elementor-element.elementor-element-91c0e0c>.elementor-element-populated>.elementor-background-overlay {
			mix-blend-mode: luminosity;
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-91c0e0c>.elementor-element-populated {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-57aa9d8 .ova-icon-box {
			border-style: solid;
			border-width: 0px 0px 2px 0px;
			border-color: #FFFFFF;
		}

		.elementor-24 .elementor-element.elementor-element-57aa9d8 .ova-icon-box.template2 .background {
			mix-blend-mode: luminosity;
		}

		.elementor-24 .elementor-element.elementor-element-05d5c30>.elementor-element-populated>.elementor-background-overlay {
			mix-blend-mode: luminosity;
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-05d5c30>.elementor-element-populated {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-aa4c5a8 .ova-icon-box {
			border-style: solid;
			border-width: 0px 2px 2px 2px;
			border-color: #FFFFFF;
		}

		.elementor-24 .elementor-element.elementor-element-aa4c5a8 .ova-icon-box .overlay {
			background-color: #D96D2C;
		}

		.elementor-24 .elementor-element.elementor-element-aa4c5a8 .ova-icon-box.template2 .background {
			mix-blend-mode: luminosity;
		}

		.elementor-24 .elementor-element.elementor-element-0c68123>.elementor-element-populated>.elementor-background-overlay {
			mix-blend-mode: luminosity;
			transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-0c68123>.elementor-element-populated {
			transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
		}

		.elementor-24 .elementor-element.elementor-element-783e939 .ova-icon-box {
			border-style: solid;
			border-width: 0px 0px 2px 0px;
			border-color: #FFFFFF;
		}

		.elementor-24 .elementor-element.elementor-element-783e939 .ova-icon-box.template2 .background {
			mix-blend-mode: luminosity;
		}

		@media(min-width:768px) {
			.elementor-24 .elementor-element.elementor-element-3edd1e7 {
				width: 42%;
			}

			.elementor-24 .elementor-element.elementor-element-a746694 {
				width: 58%;
			}
		}

		@media(max-width:1024px) and (min-width:768px) {
			.elementor-24 .elementor-element.elementor-element-2a1753b {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-85abf28 {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-92303ed {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-f270593 {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-7cdb4f2 {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-981a74e {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-a589e16 {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-3edd1e7 {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-a746694 {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-91c0e0c {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-05d5c30 {
				width: 100%;
			}

			.elementor-24 .elementor-element.elementor-element-0c68123 {
				width: 100%;
			}
		}

		@media(min-width:1025px) {

			.elementor-24 .elementor-element.elementor-element-1e773e4:not(.elementor-motion-effects-element-type-background),
			.elementor-24 .elementor-element.elementor-element-1e773e4>.elementor-motion-effects-container>.elementor-motion-effects-layer {
				background-attachment: fixed;
			}
		}

		@media(max-width:1024px) {
			.elementor-24 .elementor-element.elementor-element-1dd1e82 {
				margin-top: -75px;
				margin-bottom: 0px;
			}

			.elementor-24 .elementor-element.elementor-element-8b471e9 {
				padding: 80px 0px 80px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-8733e3a {
				padding: 80px 0px 80px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-4349105 {
				padding: 80px 0px 80px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-f270593>.elementor-element-populated {
				margin: 0px 0px 30px 0px;
				--e-column-margin-right: 0px;
				--e-column-margin-left: 0px;
			}

			.elementor-24 .elementor-element.elementor-element-b0a0ff3 {
				bottom: 0px;
			}

			.elementor-24 .elementor-element.elementor-element-12c3dab>.elementor-shape-bottom svg {
				width: calc(100% + 1.3px);
			}

			.elementor-24 .elementor-element.elementor-element-1e773e4:not(.elementor-motion-effects-element-type-background),
			.elementor-24 .elementor-element.elementor-element-1e773e4>.elementor-motion-effects-container>.elementor-motion-effects-layer {
				background-size: 0% auto;
			}

			.elementor-24 .elementor-element.elementor-element-1e773e4 {
				margin-top: 0px;
				margin-bottom: 0px;
			}

			.elementor-24 .elementor-element.elementor-element-981a74e>.elementor-element-populated {
				margin: 0px 0px 50px 0px;
				--e-column-margin-right: 0px;
				--e-column-margin-left: 0px;
			}

			.elementor-24 .elementor-element.elementor-element-aedc756:not(.elementor-motion-effects-element-type-background),
			.elementor-24 .elementor-element.elementor-element-aedc756>.elementor-motion-effects-container>.elementor-motion-effects-layer {
				background-position: 0px 0px;
				background-size: 0px auto;
			}

			.elementor-24 .elementor-element.elementor-element-aedc756 {
				padding: 80px 0px 50px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-3edd1e7>.elementor-element-populated {
				margin: 0px 0px 40px 0px;
				--e-column-margin-right: 0px;
				--e-column-margin-left: 0px;
			}

			.elementor-24 .elementor-element.elementor-element-56817db {
				padding: 80px 0px 80px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-92615d1 {
				padding: 0px 10px 0px 10px;
			}

			.elementor-24 .elementor-element.elementor-element-a451da2:not(.elementor-motion-effects-element-type-background)>.elementor-widget-wrap,
			.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-widget-wrap>.elementor-motion-effects-container>.elementor-motion-effects-layer {
				background-position: 0px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-element-populated>.elementor-background-overlay {
				background-size: contain;
			}

			.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-element-populated {
				padding: 70px 60px 50px 60px;
			}

			.elementor-24 .elementor-element.elementor-element-2b260a3 {
				font-size: 30px;
			}

			.elementor-24 .elementor-element.elementor-element-2b260a3>.elementor-widget-container {
				margin: 0px 40px 15px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-fd99c8e>.elementor-widget-container {
				margin: 0px 0px 15px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-036b97f {
				padding: 80px 0px 40px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-d6d3eaf {
				margin-top: 0px;
				margin-bottom: 80px;
				padding: 0px 10px 0px 10px;
			}

			.elementor-24 .elementor-element.elementor-element-57aa9d8 .ova-icon-box {
				border-width: 0px 0px 0px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-aa4c5a8 .ova-icon-box {
				border-width: 0px 0px 0px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-783e939 .ova-icon-box {
				border-width: 0px 0px 0px 0px;
			}
		}

		@media(max-width:767px) {
			.elementor-24 .elementor-element.elementor-element-1dd1e82 {
				margin-top: -55px;
				margin-bottom: 0px;
			}

			.elementor-24 .elementor-element.elementor-element-bf458f1>.elementor-element-populated {
				padding: 20px 0px 20px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-4c26a0e {
				text-align: center;
			}

			.elementor-24 .elementor-element.elementor-element-4c26a0e>.elementor-widget-container {
				margin: 10px 15px 10px 15px;
			}

			.elementor-24 .elementor-element.elementor-element-4349105>.elementor-background-overlay {
				background-position: center left;
			}

			.elementor-24 .elementor-element.elementor-element-12c3dab>.elementor-shape-bottom svg {
				width: calc(200% + 1.3px);
			}

			.elementor-24 .elementor-element.elementor-element-1e773e4:not(.elementor-motion-effects-element-type-background),
			.elementor-24 .elementor-element.elementor-element-1e773e4>.elementor-motion-effects-container>.elementor-motion-effects-layer {
				background-size: 0% auto;
			}

			.elementor-24 .elementor-element.elementor-element-aedc756:not(.elementor-motion-effects-element-type-background),
			.elementor-24 .elementor-element.elementor-element-aedc756>.elementor-motion-effects-container>.elementor-motion-effects-layer {
				background-position: 0px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-a451da2:not(.elementor-motion-effects-element-type-background)>.elementor-widget-wrap,
			.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-widget-wrap>.elementor-motion-effects-container>.elementor-motion-effects-layer {
				background-position: 0px 0px;
			}

			.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-element-populated>.elementor-background-overlay {
				background-size: cover;
			}

			.elementor-24 .elementor-element.elementor-element-a451da2>.elementor-element-populated {
				padding: 55px 20px 35px 25px;
			}
		}
	</style>
	<link rel='stylesheet' id='swiper-css' href='wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=8.4.5' type='text/css' media='all'>
	<link rel='stylesheet' id='font-awesome-5-all-css' href='wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min.css?ver=3.17.2' type='text/css' media='all'>
	<link rel='stylesheet' id='font-awesome-4-shim-css' href='wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min.css?ver=3.17.2' type='text/css' media='all'>
	<link rel='stylesheet' id='google-fonts-1-css' href='../css-1?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CCovered+By+Your+Grace%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.4.1' type='text/css' media='all'>
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
	<script type="text/javascript" src="wp-includes/js/jquery/jquery.min.js?ver=3.7.1" id="jquery-core-js"></script>
	<script type="text/javascript" src="wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1" id="jquery-migrate-js"></script>
	<script type="text/javascript" src="wp-content/plugins/elementor/assets/lib/font-awesome/js/v4-shims.min.js?ver=3.17.2" id="font-awesome-4-shim-js"></script>
	<link rel="https://api.w.org/" href="wp-json/index.htm">
	<link rel="alternate" type="application/json" href="wp-json/wp/v2/pages/24">
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc.php?rsd">
	<meta name="generator" content="WordPress 6.4.1">
	<meta name="generator" content="WooCommerce 8.2.1">
	<link rel="canonical" href="index.htm">
	<link rel='shortlink' href='index.htm'>
	<link rel="alternate" type="application/json+oembed" href="wp-json/oembed/1.0/embed?url=https%3A%2F%2Fchonloc%2Faovis%2F">
	<link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embed-1?url=https%3A%2F%2Fchonloc%2Faovis%2F&#038;format=xml">
	<noscript>
		<style>
			.woocommerce-product-gallery {
				opacity: 1 !important;
			}
		</style>
	</noscript>
	<meta name="generator" content="Elementor 3.17.2; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading; settings: css_print_method-internal, google_font-enabled, font_display-swap">
	<link rel="icon" href="wp-content/uploads/2023/02/cropped-favicon-32x32.png" sizes="32x32">
	<link rel="icon" href="wp-content/uploads/2023/02/cropped-favicon-192x192.png" sizes="192x192">
	<link rel="apple-touch-icon" href="wp-content/uploads/2023/02/cropped-favicon-180x180.png">
	<meta name="msapplication-TileImage" content="https://chonloc/aovis/wp-content/uploads/2023/02/cropped-favicon-270x270.png">
</head>

<body class="home page-template page-template-elementor_header_footer page page-id-24 wp-embed-responsive theme-aovis woocommerce-no-js group-blog layout_2r woo_layout_1c elementor-default elementor-template-full-width elementor-kit-6 elementor-page elementor-page-24">


	<div class="wrap-fullwidth">
		<div class="inside-content">

			<style id="elementor-post-34">
				.elementor-34 .elementor-element.elementor-element-453658a>.elementor-container>.elementor-column>.elementor-widget-wrap {
					align-content: center;
					align-items: center;
				}

				.elementor-34 .elementor-element.elementor-element-453658a {
					border-style: solid;
					border-width: 0px 0px 1px 0px;
					border-color: #FFFFFF26;
					transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
					padding: 30px 40px 30px 40px;
					z-index: 9999;
				}

				.elementor-34 .elementor-element.elementor-element-453658a>.elementor-background-overlay {
					transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
				}

				.elementor-34 .elementor-element.elementor-element-2a25ff3.elementor-column>.elementor-widget-wrap {
					justify-content: center;
				}

				.elementor-34 .elementor-element.elementor-element-9fa20ed ul li a {
					font-size: 16px;
					font-weight: 400;
					text-transform: capitalize;
					line-height: 1.2em;
					padding: 10px 24px 10px 24px;
				}

				.elementor-34 .elementor-element.elementor-element-9fa20ed ul {
					padding: 0px 0px 0px 0px;
				}

				.elementor-34 .elementor-element.elementor-element-9fa20ed ul.menu>li>a {
					color: #FFFFFF;
				}

				.elementor-34 .elementor-element.elementor-element-9fa20ed ul.menu>li>a:hover {
					color: lime;
				}

				.elementor-34 .elementor-element.elementor-element-9fa20ed ul.menu>li.current-menu-item>a {
					color: lime;
				}

				.elementor-34 .elementor-element.elementor-element-9fa20ed {
					width: auto;
					max-width: auto;
				}

				.elementor-34 .elementor-element.elementor-element-a4c2dd9 .menu-canvas {
					text-align: right;
				}

				.elementor-34 .elementor-element.elementor-element-a4c2dd9>.elementor-widget-container {
					margin: 0px 0px 0px 20px;
				}

				.elementor-34 .elementor-element.elementor-element-a4c2dd9 {
					width: auto;
					max-width: auto;
				}

				.elementor-34 .elementor-element.elementor-element-3e65c79.elementor-column>.elementor-widget-wrap {
					justify-content: flex-end;
				}

				.elementor-34 .elementor-element.elementor-element-947ac0b .ova_wrap_search_popup i {
					font-size: 24px;
					color: #FFFFFF;
				}

				.elementor-34 .elementor-element.elementor-element-947ac0b>.elementor-widget-container {
					padding: 0px 25px 0px 0px;
					border-style: none;
				}

				.elementor-34 .elementor-element.elementor-element-947ac0b {
					width: auto;
					max-width: auto;
				}

				.elementor-34 .elementor-element.elementor-element-417694b.elementor-view-stacked .elementor-icon {
					background-color: #FFFFFF;
				}

				.elementor-34 .elementor-element.elementor-element-417694b.elementor-view-framed .elementor-icon,
				.elementor-34 .elementor-element.elementor-element-417694b.elementor-view-default .elementor-icon {
					color: #FFFFFF;
					border-color: #FFFFFF;
				}

				.elementor-34 .elementor-element.elementor-element-417694b.elementor-view-framed .elementor-icon,
				.elementor-34 .elementor-element.elementor-element-417694b.elementor-view-default .elementor-icon svg {
					fill: #FFFFFF;
				}

				.elementor-34 .elementor-element.elementor-element-417694b .elementor-icon {
					font-size: 24px;
				}

				.elementor-34 .elementor-element.elementor-element-417694b .elementor-icon svg {
					height: 24px;
				}

				.elementor-34 .elementor-element.elementor-element-417694b>.elementor-widget-container {
					margin: 0px 0px -10px 0px;
				}

				.elementor-34 .elementor-element.elementor-element-417694b {
					width: auto;
					max-width: auto;
				}

				@media(max-width:1024px) {
					.elementor-34 .elementor-element.elementor-element-453658a {
						padding: 20px 20px 20px 20px;
					}

					.elementor-34 .elementor-element.elementor-element-2a25ff3.elementor-column>.elementor-widget-wrap {
						justify-content: flex-end;
					}
				}

				@media(max-width:767px) {
					.elementor-34 .elementor-element.elementor-element-453658a {
						padding: 10px 20px 10px 20px;
					}

					.elementor-34 .elementor-element.elementor-element-2aa6835 {
						width: 50%;
					}

					.elementor-34 .elementor-element.elementor-element-2a25ff3 {
						width: 50%;
					}

					.elementor-34 .elementor-element.elementor-element-3e65c79 {
						width: 100%;
					}
				}

				@media(min-width:768px) {
					.elementor-34 .elementor-element.elementor-element-2aa6835 {
						width: 14%;
					}

					.elementor-34 .elementor-element.elementor-element-2a25ff3 {
						width: 71.664%;
					}

					.elementor-34 .elementor-element.elementor-element-3e65c79 {
						width: 14%;
					}
				}

				@media(max-width:1024px) and (min-width:768px) {
					.elementor-34 .elementor-element.elementor-element-2aa6835 {
						width: 50%;
					}

					.elementor-34 .elementor-element.elementor-element-2a25ff3 {
						width: 50%;
					}

					.elementor-34 .elementor-element.elementor-element-3e65c79 {
						width: 100%;
					}
				}
			</style>
			<div data-elementor-type="wp-post" data-elementor-id="34" class="elementor elementor-34">
				<section class="elementor-section elementor-top-section elementor-element elementor-element-453658a elementor-section-full_width elementor-section-content-middle header_sticky mobile_sticky sticky_bg_dark elementor-section-height-default elementor-section-height-default" data-id="453658a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-2aa6835" data-id="2aa6835" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-f2fecd8 elementor-widget elementor-widget-ova_logo" data-id="f2fecd8" data-element_type="widget" data-widget_type="ova_logo.default">
									<div class="elementor-widget-container">

										<div class="brand_el">

											<a href="index.php">

												<img src="wp-content/uploads/2023/02/logo-white.png" alt="Aovis &#8211; Film &amp; Movie Booking WordPress Theme" class="logo_desktop" style="width:108px ; height:auto">

												<img src="wp-content/uploads/2023/02/logo-white.png" alt="Aovis &#8211; Film &amp; Movie Booking WordPress Theme" class="logo_mobile" style="width:108px ;  height:auto">

												<img src="wp-content/uploads/2023/02/logo-white.png" alt="Aovis &#8211; Film &amp; Movie Booking WordPress Theme" class="logo_sticky" style="width:108px ; height:auto">

											</a>

										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-2a25ff3" data-id="2a25ff3" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-9fa20ed elementor-view-primary-menu elementor-widget__width-auto elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-aovis_elementor_menu_nav" data-id="9fa20ed" data-element_type="widget" data-widget_type="aovis_elementor_menu_nav.default">
									<div class="elementor-widget-container">

										<nav class="main-navigation">
											<button class="menu-toggle">
												<span>
													Menu </span>
											</button>
											<div class="primary-navigation">
												<ul id="menu-primary-menu" class="menu">
													<li id="menu-item-56" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-56"><a href="./index.php">Home</a>
													</li>
													<li id="menu-item-2311" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2311"><a href="#">Quốc Gia</a>
														<ul class="sub-menu">
															<?php
															$sql_QG = "SELECT QuocGia FROM phim  GROUP BY QuocGia";
															$result = $conn->query("$sql_QG");
															while ($row = $result->fetch_assoc()) {
															?>
																<li id="menu-item-3418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3418"><a href="./country/country.php?QuocGia='<?php echo $row["QuocGia"] ?>'"><?php echo $row["QuocGia"] ?></a></li>
															<?php
															}
															?>
														</ul>
													</li>
													<li id="menu-item-75" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-75"><a href="#">Thể Loại</a>
														<ul class="sub-menu">
															<?php
															$sql_TL = "SELECT TheLoai FROM phim  GROUP BY TheLoai";
															$result = $conn->query("$sql_TL");
															while ($row = $result->fetch_assoc()) {
															?>
																<li id="menu-item-3418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3418"><a href="./categories/categories.php?TheLoai='<?php echo $row["TheLoai"] ?>'"><?php echo $row["TheLoai"] ?></a></li>
															<?php
															}
															?>
														</ul>
													</li>
													<li id="menu-item-75" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-75"><a href="#">Nhà Sản Xuất</a>
														<ul class="sub-menu">
															<?php
															$sql_SX = "SELECT NhaSanXuat FROM phim  GROUP BY NhaSanXuat";
															$result = $conn->query("$sql_SX");
															while ($row = $result->fetch_assoc()) {
															?>
																<li id="menu-item-3418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3418"><a href="./producer/producer.php?NhaSanXuat='<?php echo $row["NhaSanXuat"] ?>'"><?php echo $row["NhaSanXuat"] ?></a></li>
															<?php
															}
															?>
														</ul>
													</li>
												</ul>
											</div>
										</nav>


									</div>
								</div>
								<div class="elementor-element elementor-element-a4c2dd9 elementor-widget__width-auto elementor-hidden-desktop elementor-view-primary-menu elementor-widget elementor-widget-aovis_elementor_menu_canvas" data-id="a4c2dd9" data-element_type="widget" data-widget_type="aovis_elementor_menu_canvas.default">
									<div class="elementor-widget-container">

										<nav class="menu-canvas">
											<button class="menu-toggle">
												<span></span>
											</button>
											<nav class="container-menu dir_left">
												<div class="close-menu">
													<i class="ovaicon-cancel"></i>
												</div>
												<!-- <div class="primary-navigation">
													<ul id="menu-primary-menu-1" class="menu">
														<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-24 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-56">
															<a href="index.htm" aria-current="page">Home</a>

														</li>
														<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2310">
															<a href="movies-all/index.htm">Movies</a>
															<ul class="sub-menu">
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4151">
																	<a href="#">Movie All</a>
																	<ul class="sub-menu">
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4155">
																			<a href="movies-all/index.htm">Template
																				1</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4161">
																			<a href="movies-all-template-2/index.htm">Template
																				2</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4173">
																			<a href="movies-all-template-3/index.htm">Template
																				3</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4172">
																			<a href="movies-all-template-4/index.htm">Template
																				4</a>
																		</li>
																	</ul>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4188">
																	<a href="#">Movies Now Playing</a>
																	<ul class="sub-menu">
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4189">
																			<a href="movies-now-playing-template-1/index.htm">Template
																				1</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4191">
																			<a href="movies-now-playing-template-2/index.htm">Template
																				2</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4207">
																			<a href="movies-now-playing-template-3/index.htm">Template
																				3</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4206">
																			<a href="movies-now-playing-template-4/index.htm">Template
																				4</a>
																		</li>
																	</ul>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4214">
																	<a href="#">Movie Coming Soon</a>
																	<ul class="sub-menu">
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4213">
																			<a href="movies-coming-soon-template-1/index.htm">Template
																				1</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4229">
																			<a href="movies-coming-soon-template-2/index.htm">Template
																				2</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4228">
																			<a href="movies-coming-soon-template-3/index.htm">Template
																				3</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4227">
																			<a href="movies-coming-soon-template-4/index.htm">Template
																				4</a>
																		</li>
																	</ul>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4591">
																	<a href="#">Movie Category</a>
																	<ul class="sub-menu">
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4617">
																			<a href="thriller-category-template-1/index.htm">Thriller
																				&#8211; Template 1</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4611">
																			<a href="thriller-category-template-2/index.htm">Thriller
																				&#8211; Template 2</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4610">
																			<a href="thriller-category-template-3/index.htm">Thriller
																				&#8211; Template 3</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4609">
																			<a href="thriller-category-template-4/index.htm">Thriller
																				&#8211; Template 4</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4623">
																			<a href="adventure-category-template-1/index.htm">Adventure
																				– Template 1</a>
																		</li>
																	</ul>
																</li>
																<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4629">
																	<a href="movies-featured/index.htm">Movies
																		Featured</a>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4252">
																	<a href="#">Movie Filter Ajax 1</a>
																	<ul class="sub-menu">
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3652">
																			<a href="movie-filter-ajax-template-1/index.htm">Template
																				1</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4251">
																			<a href="movie-filter-ajax-template-2/index.htm">Template
																				2</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4250">
																			<a href="movie-filter-ajax-template-3/index.htm">Template
																				3</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4249">
																			<a href="movie-filter-ajax-template-4/index.htm">Template
																				4</a>
																		</li>
																	</ul>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4275">
																	<a href="#">Movie Filter Ajax 2</a>
																	<ul class="sub-menu">
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3661">
																			<a href="movie-filter-ajax-2-template-1/index.htm">Template
																				1</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4274">
																			<a href="movie-filter-ajax-2-template-2/index.htm">Template
																				2</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4273">
																			<a href="movie-filter-ajax-2-template-3/index.htm">Template
																				3</a>
																		</li>
																		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4272">
																			<a href="movie-filter-ajax-2-template-4/index.htm">Template
																				4</a>
																		</li>
																	</ul>
																</li>
																<li class="menu-item menu-item-type-post_type menu-item-object-movie menu-item-3303">
																	<a href="movie/wrong-turns-part-2/index.htm">Movie
																		Details</a>
																</li>
															</ul>
														</li>
														<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2311">
															<a href="events/index.htm">Events</a>
															<ul class="sub-menu">
																<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3418">
																	<a href="events/index.htm">Event Grid</a>
																</li>
																<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3426">
																	<a href="event-list/index.htm">Event List</a>
																</li>
																<li class="menu-item menu-item-type-post_type menu-item-object-event menu-item-3339">
																	<a href="event/the-strange-love-movie-oscar-event/index.htm">Event
																		Details</a>
																</li>
															</ul>
														</li>
														<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-75">
															<a href="#">Pages</a>
															<ul class="sub-menu">
																<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-818">
																	<a href="about/index.htm">About</a>
																</li>
																<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-819">
																	<a href="our-faqs/index.htm">Our Faqs</a>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3108">
																	<a href="https://chonloc/aovis/404">404</a>
																</li>
																<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3284">
																	<a href="my-account/index.htm">My Account</a>
																</li>
															</ul>
														</li>
														<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-57">
															<a href="news/index.htm">News</a>
															<ul class="sub-menu">
																<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2312">
																	<a href="news/index.htm">News</a>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3438">
																	<a href="https://chonloc/aovis/blog/?layout_sidebar=layout_1c">Default
																		No Sidebar</a>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2306">
																	<a href="https://chonloc/aovis/blog/?blog_template=grid">News
																		Grid</a>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2307">
																	<a href="https://chonloc/aovis/blog/?blog_template=grid&layout_sidebar=layout_1c">Grid
																		No Sidebar</a>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2308">
																	<a href="https://chonloc/aovis/blog/?blog_template=masonry">News
																		Masonry</a>
																</li>
																<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2309">
																	<a href="https://chonloc/aovis/blog/?blog_template=masonry&&layout_sidebar=layout_1c">Marsonry
																		No Sidebar</a>
																</li>
																<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-3437">
																	<a href="8-films-are-vying-for-the-foreign-oscar-nominations/index.htm">News
																		Details</a>
																</li>
															</ul>
														</li>
														<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-62">
															<a href="contact/index.htm">Contact</a>
														</li>
													</ul>
												</div> -->
											</nav>
											<div class="site-overlay"></div>
										</nav>
									</div>
								</div>
							</div>
						</div>
						<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-3e65c79 elementor-hidden-tablet elementor-hidden-mobile" data-id="3e65c79" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-947ac0b elementor-widget__width-auto elementor-widget elementor-widget-aovis_elementor_search_popup" data-id="947ac0b" data-element_type="widget" data-widget_type="aovis_elementor_search_popup.default">
									<div class="elementor-widget-container">
									
											
										<div class="ova_wrap_search_popup">
											<i class="ovaicon ovaicon-search"></i>
											<div class="ova_search_popup">
												<div class="search-popup__overlay"></div>
												<div class="container">
													<form role="search" method="get" class="search-form" action="movie/search/search.php">
														<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:">
														<button type="submit" class="search-submit">
															<i class="ovaicon ovaicon-search"></i>
														</button>
														
													</form>
												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="elementor-element elementor-element-417694b elementor-widget__width-auto elementor-view-default elementor-widget elementor-widget-icon" data-id="417694b" data-element_type="widget" data-widget_type="icon.default">
									<div class="elementor-widget-container">
										<div class="elementor-icon-wrapper">
											<a class="elementor-icon" href="../aovis/account/account.php" >
									
												<i aria-hidden="true" class="ovaicon ovaicon-user-1"></i> </a>
										</div><div></div>
									</div>
								<!-- </div><span style="color: white;"> <?php echo $user_data['TenKH'] ; ?></span> -->
							</div>
						</div>
					</div>
				</section>
			</div>
			<div data-elementor-type="wp-page" data-elementor-id="24" class="elementor elementor-24">
				<section class="elementor-section elementor-top-section elementor-element elementor-element-1dd1e82 elementor-section-full_width elementor-section-height-default elementor-section-height-default" id="section-home" data-id="1dd1e82" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-adccf66" data-id="adccf66" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-494f372 elementor-widget elementor-widget-movie_main_slider" data-id="494f372" data-element_type="widget" data-settings="{&quot;show_share_social&quot;:&quot;yes&quot;,&quot;show_category&quot;:&quot;yes&quot;,&quot;show_release_date&quot;:&quot;yes&quot;,&quot;show_trailer&quot;:&quot;yes&quot;,&quot;infinite&quot;:&quot;no&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:6900}" data-widget_type="movie_main_slider.default">
									<div class="elementor-widget-container">

										<div class="mb-movie-main-slider-wrapper main-wrapper-template1">

											<!-- main slider -->
											<div class="mb-movie-main-slider main-template1" data-options="{&quot;items&quot;:2,&quot;autoplayHoverPause&quot;:true,&quot;loop&quot;:false,&quot;autoplay&quot;:true,&quot;autoplayTimeout&quot;:6900,&quot;smartSpeed&quot;:500,&quot;rtl&quot;:false,&quot;template&quot;:&quot;template1&quot;}">


												<?php
												while ($row = $result1->fetch_assoc()) {
												?>
													<div class="movie-main-item-wrapper">

														<img class="slideshow-image" src="../aovis/img/<?php echo $row["AnhThem"]; ?>" alt="<?php echo $row["TenPhim"]; ?>">
														<div class="movie-social-sharing">
															<span class="text-share">Share</span>
															<span class="line"></span>
															<ul class="share-social-icons clearfix">

																<li><a class="share-ico ico-twitter" target="_blank" href="https://twitter.com/share?url=https://chonloc/aovis/movie/wrong-turns-part-2/&text=Wrong+Turns+Part+2&hashtags=simplesharebuttons"><i class="fab fa-twitter"></i></a></li>

																<li><a class="share-ico ico-facebook" target="_blank" href="https://www.facebook.com/sharer.php?u=https://chonloc/aovis/movie/wrong-turns-part-2/"><i class="fa fa-facebook"></i></a></li>

																<li><a class="share-ico ico-pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=https://chonloc/aovis/movie/wrong-turns-part-2/" title="<?php echo $row["TenPhim"]; ?>"><i class="fab fa-pinterest-p"></i></a></li>

															</ul>
														</div>

														<div class="movie-main-item-container row_site">


															<div class="movie-release">
																<span class="text"></span>
																<h3 class="time"></h3>
															</div>


															<div class="movie-main-item">

																<div class="movie-heading">
																	<h3 class="movie-category">
																		Phim <?php echo $row["TheLoai"] ?> </h3>

																	<a href="./movie/detail/detail.php?IDPhim=<?php echo $row["IDPhim"] ?>" title="<?php echo $row["TenPhim"]; ?>">
																		<h1 class="movie-title"><?php echo $row["TenPhim"]; ?></h1>
																	</a>
																</div>

																<p class="movie-excerpt">
																	Đạo diễn bởi: <?php echo $row["DaoDien"]; ?> / <?php echo $row["QuocGia"] ?> </p>

																<div class="button-wrapper">
																	<a href="./movie/detail/detail.php?IDPhim=<?php echo $row["IDPhim"] ?>" title="<?php echo $row["TenPhim"]; ?>">
																		<button class="btn btn-more-info">
																			More Info </button>
																	</a>
																	<a href="./booking/booking.php?IDPhim=<?php echo $row["IDPhim"]?>">
																		<button class="btn btn-more-info">
																			Get Ticket </button>
																	</a>
																</div>

															</div>


														</div>

													</div>
												<?php
												}
												?>



												<div class="movie-main-item-wrapper">

													<img class="slideshow-image" data-lazy="https://chonloc/aovis/wp-content/uploads/2023/02/banner-02.jpg" alt="The Witcher Season 2">

													<div class="movie-social-sharing">
														<span class="text-share">Share</span>
														<span class="line"></span>
														<ul class="share-social-icons clearfix">

															<li><a class="share-ico ico-twitter" target="_blank" href="https://twitter.com/share?url=https://chonloc/aovis/movie/the-witcher/&text=The+Witcher+Season+2&hashtags=simplesharebuttons"><i class="fab fa-twitter"></i></a></li>

															<li><a class="share-ico ico-facebook" target="_blank" href="https://www.facebook.com/sharer.php?u=https://chonloc/aovis/movie/the-witcher/"><i class="fa fa-facebook"></i></a></li>

															<li><a class="share-ico ico-pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=https://chonloc/aovis/movie/the-witcher/" title="The Witcher Season 2"><i class="fab fa-pinterest-p"></i></a></li>

														</ul>
													</div>

													<!-- <div class="movie-main-item-container row_site">

														<div class="movie-release">
															<span class="text">In theater</span>
															<h3 class="time">March 2023</h3>
														</div>

														<div class="movie-main-item">

															<div class="movie-heading">
																<h3 class="movie-category">
																	Action Movie </h3>

																<a href="movie/the-witcher/index.htm" title="The Witcher Season 2">
																	<h1 class="movie-title">
																		The Witcher Season 2 </h1>
																</a>
															</div>

															<p class="movie-excerpt">
																Writen and Directed by Aleesha Rose / Ireland 2023 </p>

															<div class="button-wrapper">
																<a href="movie/the-witcher/index.htm" title="The Witcher Season 2">
																	<button class="btn btn-more-info">
																		More Info </button>
																</a>

																<button class="btn btn-booking" data-movie-id="1015">
																	Get Ticket </button>
															</div>

														</div>

													</div> -->

												</div>



												<div class="movie-main-item-wrapper">

													<img class="slideshow-image" data-lazy="https://chonloc/aovis/wp-content/uploads/2023/03/banner3.jpg" alt="Love Nightmare">

													<div class="movie-social-sharing">
														<span class="text-share">Share</span>
														<span class="line"></span>
														<ul class="share-social-icons clearfix">

															<li><a class="share-ico ico-twitter" target="_blank" href="https://twitter.com/share?url=https://chonloc/aovis/movie/love-nightmare/&text=Love+Nightmare&hashtags=simplesharebuttons"><i class="fab fa-twitter"></i></a></li>

															<li><a class="share-ico ico-facebook" target="_blank" href="https://www.facebook.com/sharer.php?u=https://chonloc/aovis/movie/love-nightmare/"><i class="fa fa-facebook"></i></a></li>

															<li><a class="share-ico ico-pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=https://chonloc/aovis/movie/love-nightmare/" title="Love Nightmare"><i class="fab fa-pinterest-p"></i></a></li>

														</ul>
													</div>

													<!-- <div class="movie-main-item-container row_site">

														<div class="movie-release">
															<span class="text">In theater</span>
															<h3 class="time">March 2023</h3>
														</div>

														<div class="movie-main-item">

															<div class="movie-heading">
																<h3 class="movie-category">
																	Adventure Movie </h3>

																<a href="movie/love-nightmare/index.htm" title="Love Nightmare">
																	<h1 class="movie-title">
																		Love Nightmare </h1>
																</a>
															</div>

															<p class="movie-excerpt">
																Writen and Directed by Aleesha Rose / Ireland 2023 </p>

															<div class="button-wrapper">
																<a href="movie/love-nightmare/index.htm" title="Love Nightmare">
																	<button class="btn btn-more-info">
																		More Info </button>
																</a>

																<button class="btn btn-booking" data-movie-id="1024">
																	Get Ticket </button>
															</div>

														</div>

													</div> -->

												</div>


											</div>


											<!-- trailer slider wrapper -->
											<div class="mb-movie-trailer-slider-wrapper trailer-template1">

												<img decoding="async" class="arrow-trailers-img" src="wp-content/plugins/movie-booking/assets/img/arrow-watch-trailer.png" alt="Arrow watch trailer">
												<span class="text-trailer">Trailers</span>

												<!-- trailer slider -->
												<div class="mb-movie-trailer-slider" data-options="{&quot;items&quot;:2,&quot;autoplayHoverPause&quot;:true,&quot;loop&quot;:false,&quot;autoplay&quot;:true,&quot;autoplayTimeout&quot;:6900,&quot;smartSpeed&quot;:500,&quot;rtl&quot;:false,&quot;template&quot;:&quot;template1&quot;}">
													<?php
													while ($row = $resultTrailer->fetch_assoc()) {
													?>
														<div class="movie-trailer-item">
															<div class="movie-trailer-media">
																<img decoding="async" src="../aovis/img/<?php echo $row["AnhChinh"]; ?>" alt="<?php echo $row["TenPhim"]; ?>">

																<!-- Button Watch Trailer video -->

																<div class="has-trailer">

																	<a href="https://www.youtube.com" style="position:absolute; top :12px; left:13px">
																		<i aria-hidden="true" class="fas fa-play"></i>
																	</a>

																</div>


															</div>
														</div>
													<?php
													}
													?>
												</div>

											</div>


										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-fb251a5 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="fb251a5" data-element_type="section">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c10a968" data-id="c10a968" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-2d77ec2 elementor-widget elementor-widget-image" data-id="2d77ec2" data-element_type="widget" data-widget_type="image.default">
									<div class="elementor-widget-container">
										<style>
											/*! elementor - v3.17.0 - 01-11-2023 */
											.elementor-widget-image {
												text-align: center
											}

											.elementor-widget-image a {
												display: inline-block
											}

											.elementor-widget-image a img[src$=".svg"] {
												width: 48px
											}

											.elementor-widget-image img {
												vertical-align: middle;
												display: inline-block
											}
										</style> <img decoding="async" width="1894" height="10" src="wp-content/uploads/2023/02/image-lines-header.jpg" class="attachment-full size-full wp-image-114" alt="" srcset="wp-content/uploads/2023/02/image-lines-header.jpg 1894w, wp-content/uploads/2023/02/image-lines-header-300x2.jpg 300w, wp-content/uploads/2023/02/image-lines-header-1024x5.jpg 1024w, wp-content/uploads/2023/02/image-lines-header-768x4.jpg 768w, wp-content/uploads/2023/02/image-lines-header-1536x8.jpg 1536w, wp-content/uploads/2023/02/image-lines-header-600x3.jpg 600w" sizes="(max-width: 1894px) 100vw, 1894px">
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-905823c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="905823c" data-element_type="section">
					<div class="elementor-background-overlay"></div>
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d5d8fde" data-id="d5d8fde" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">

								<section class="elementor-section elementor-inner-section elementor-element elementor-element-8b471e9 elementor-section-boxed elementor-section-height-default elementor-section-height-default" id="section-movies" data-id="8b471e9" data-element_type="section">
									<div class="elementor-container elementor-column-gap-no">
										<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-3cb7684" data-id="3cb7684" data-element_type="column">
											<div class="elementor-widget-wrap elementor-element-populated">
												<div class="elementor-element elementor-element-0788966 elementor-widget elementor-widget-aovis_elementor_heading" data-id="0788966" data-element_type="widget" data-widget_type="aovis_elementor_heading.default">
													<div class="elementor-widget-container">

														<div class="ova-heading ova-heading-template1">

															<div class="icon">
																<i aria-hidden="true" class="flaticon flaticon-film-roll"></i>
															</div>

															<div class="top-heading ">
																<h3 class="sub-title ">Watch New Movies</h3>



																<h2 class="title">Movies Now Playing</h2>


															</div>


														</div>

													</div>
												</div>
												<div class="elementor-element elementor-element-8f55ef1 elementor-widget elementor-widget-movie_slider" data-id="8f55ef1" data-element_type="widget" data-settings="{&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;infinite&quot;:&quot;no&quot;,&quot;dot_control&quot;:&quot;yes&quot;}" data-widget_type="movie_slider.default">
													<div class="elementor-widget-container">

														<div class="mb-movie-slider mb-movie-slider-template1 owl-carousel owl-theme" data-options="{&quot;items&quot;:4,&quot;slideBy&quot;:1,&quot;margin&quot;:20,&quot;autoplayHoverPause&quot;:true,&quot;loop&quot;:false,&quot;autoplay&quot;:false,&quot;autoplayTimeout&quot;:3000,&quot;smartSpeed&quot;:500,&quot;dots&quot;:true,&quot;nav&quot;:false}">


															<?php
															while ($row = $result2->fetch_assoc()) {
															?>
																<div class="mb-movie-item item-template1">

																	<a href="./movie/detail/detail.php?IDPhim=<?php echo $row["IDPhim"] ?>" title="<?php echo $row["TenPhim"]; ?>">
																		<div class="movie-image">
																			<img decoding="async" src="./img/<?php echo $row["AnhChinh"]; ?>" alt="<?php echo $row["TenPhim"]; ?>">
																		</div>
																	</a>

																	<div class="movie-info">
																		<div class="categories-and-time">
																			<div class="movie-category">
																				<a href="./categories/categories.php?TheLoai=<?php echo $row["TheLoai"] ?>" title="<?php echo $row["TheLoai"]; ?>"><?php echo $row["TheLoai"]; ?></a>
																			</div>

																			<div class="separator">/</div>

																			<span class="running-time">
																				<?php echo $row["ThoiLuong"]; ?> Phút
																			</span>
																		</div>

																		<a href="./movie/detail/detail.php?IDPhim=<?php echo $row["IDPhim"] ?>" title="<?php echo $row["TenPhim"]; ?>">
																			<h3 class="movie-title"> <?php echo $row["TenPhim"]; ?> </h3>
																		</a>


																		<a href="./booking/booking.php?IDPhim=<?php echo $row["IDPhim"]?>">
																		<button class="btn btn-more-info">
																			Get Ticket </button>
																	</a>

																	</div>

																</div>
															<?php
															}
															
															?>
														</div>
													</div>
												</div>
												<!-- movies coming soon -->
												<div class="elementor-element elementor-element-0788966 elementor-widget elementor-widget-aovis_elementor_heading" data-id="0788966" data-element_type="widget" data-widget_type="aovis_elementor_heading.default">
												<div class="elementor-widget-container">
												<div class="ova-heading ova-heading-template1">
												<div class="top-heading ">
												<h2 class="title"> Movies Coming Soon</h2>
												</div>
												<div class="elementor-element elementor-element-8f55ef1 elementor-widget elementor-widget-movie_slider" data-id="8f55ef1" data-element_type="widget" data-settings="{&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;infinite&quot;:&quot;no&quot;,&quot;dot_control&quot;:&quot;yes&quot;}" data-widget_type="movie_slider.default">
													<div class="elementor-widget-container">

														<div class="mb-movie-slider mb-movie-slider-template1 owl-carousel owl-theme" data-options="{&quot;items&quot;:4,&quot;slideBy&quot;:1,&quot;margin&quot;:20,&quot;autoplayHoverPause&quot;:true,&quot;loop&quot;:false,&quot;autoplay&quot;:false,&quot;autoplayTimeout&quot;:3000,&quot;smartSpeed&quot;:500,&quot;dots&quot;:true,&quot;nav&quot;:false}">


															<?php
															if ($result3->num_rows > 0) {

															while ($row = $result3->fetch_assoc()) {
															?>
																<div class="mb-movie-item item-template1">

																	<a href="./movie/detail/detail.php?IDPhim=<?php echo $row["IDPhim"] ?>" title="<?php echo $row["TenPhim"]; ?>">
																		<div class="movie-image">
																			<img decoding="async" src="./img/<?php echo $row["AnhChinh"]; ?>" alt="<?php echo $row["TenPhim"]; ?>">
																		</div>
																	</a>

																	<div class="movie-info">
																		<div class="categories-and-time">
																			<div class="movie-category">
																				<a href="./categories/categories.php?TheLoai=<?php echo $row["TheLoai"] ?>" title="<?php echo $row["TheLoai"]; ?>"><?php echo $row["TheLoai"]; ?></a>
																			</div>

																			<div class="separator">/</div>

																			<span class="running-time">
																				<?php echo $row["ThoiLuong"]; ?> Phút
																			</span>
																		</div>

																		<a href="./movie/detail/detail.php?IDPhim=<?php echo $row["IDPhim"] ?>" title="<?php echo $row["TenPhim"]; ?>">
																			<h3 class="movie-title"> <?php echo $row["TenPhim"]; ?> </h3>
																		</a>


																		<a href="./booking/booking.php?IDPhim=<?php echo $row["IDPhim"]?>">
																		<button class="btn btn-more-info">
																			Get Ticket </button>
																	</a>

																	</div>

																</div>
															<?php
															}
														} else {echo '<h2 class="no-movies-message">Tạm chưa có phim</h2>';}
															$conn->close();
															?>
														</div>
													</div>
												</div>


												</div>
												</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>
				</section>




				<section class="elementor-section elementor-top-section elementor-element elementor-element-1e773e4 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" id="section-membership" data-id="1e773e4" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="elementor-background-overlay"></div>
					<div class="elementor-container elementor-column-gap-default">
						<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-981a74e" data-id="981a74e" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-a8f0a50 elementor-widget elementor-widget-aovis_elementor_heading" data-id="a8f0a50" data-element_type="widget" data-widget_type="aovis_elementor_heading.default">
									<div class="elementor-widget-container">

										<div class="ova-heading ova-heading-template1">

											<div class="icon">
												<i aria-hidden="true" class="flaticon flaticon-film-roll"></i>
											</div>

											<div class="top-heading ">
												<h3 class="sub-title ">Gói Hội Viên</h3>



												<h2 class="title">Đăng Ký Hội Viên Ngay
													Để Nhận Ưu Đãi Hấp Dẫn
												</h2>


											</div>

											<p class="description">lmaowmefmaowefs
											</p>

										</div>

									</div>
								</div>
								<div class="elementor-element elementor-element-9e03c55 elementor-widget elementor-widget-button" data-id="9e03c55" data-element_type="widget" data-widget_type="button.default">
									<div class="elementor-widget-container">
										<div class="elementor-button-wrapper">
											<a class="elementor-button elementor-button-link elementor-size-sm" href="#">
												<span class="elementor-button-content-wrapper">
													<span class="elementor-button-text">More Info</span>
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a589e16" data-id="a589e16" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-30bc8f2 elementor-widget elementor-widget-ova_events" data-id="30bc8f2" data-element_type="widget" data-widget_type="ova_events.default">
									<div class="elementor-widget-container">

										<div class="ovaev-event-element version_2">





											<div class="container-event">
												<div id="main-event" class="content-event">
													<div class="archive_event col1">


														<div class="ovaev-content">
															<div class="type1">

																<div class="desc">

																	<!-- Thumbnail -->

																	<div class="event-thumbnail">

																		<!-- Display Highlight Date 2 -->

																		<div class="date-event">

																			<span class="date">Exclusive</span>

																		</div>


																		<a href="event/best-magical-movies-ever-made/index.htm">
																			<img loading="lazy" decoding="async" width="373" height="403" src="wp-content/uploads/2023/03/Event06.jpg" class="attachment-ovaev_event_thumbnail size-ovaev_event_thumbnail wp-post-image" alt="" srcset="wp-content/uploads/2023/03/Event06.jpg 373w, wp-content/uploads/2023/03/Event06-278x300.jpg 278w" sizes="(max-width: 373px) 100vw, 373px">
																		</a>

																	</div>
																	<div class="event_post">

																		<div class="meta-event">

																			<div class="time equal-date">


																			</div>
																			<div class="venue">
																				<i class="fas fa-map-marker-alt icon_event"></i>
																				<span class="number">299,000 VND</span>
																			</div>
																		</div>

																		<!-- Title -->

																		<h2 class="second_font event_title">
																			<a href="event/best-magical-movies-ever-made/index.htm">
																				Gói Membership Hạng Bạc</a>
																		</h2>
																		<!-- Read More Button -->

																		<div class="button_event">
																			<a class="view_detail second_font" href="event/best-magical-movies-ever-made/index.htm">
																				Đăng ký ngay </a>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="ovaev-content">
															<div class="type1">

																<div class="desc">

																	<!-- Thumbnail -->

																	<div class="event-thumbnail">

																		<!-- Display Highlight Date 2 -->

																		<div class="date-event">

																			<span class="date">
																				Exclusive </span>

																		</div>


																		<a href="event/the-strange-love-movie-2023-festival/index.htm">
																			<img loading="lazy" decoding="async" width="373" height="405" src="wp-content/uploads/2023/03/Event05.jpg" class="attachment-ovaev_event_thumbnail size-ovaev_event_thumbnail wp-post-image" alt="" srcset="wp-content/uploads/2023/03/Event05.jpg 373w, wp-content/uploads/2023/03/Event05-276x300.jpg 276w" sizes="(max-width: 373px) 100vw, 373px">
																		</a>

																	</div>
																	<div class="event_post">

																		<div class="meta-event">

																			<div class="time equal-date">


																			</div>
																			<div class="venue">
																				<i class="fas fa-map-marker-alt icon_event"></i>
																				<span class="number">399,000 VND</span>
																			</div>
																		</div>

																		<!-- Title -->

																		<h2 class="second_font event_title">
																			<a href="event/the-strange-love-movie-2023-festival/index.htm">
																				Gói Membership Hạng Vàng
																			</a>
																		</h2>
																		<!-- Read More Button -->

																		<div class="button_event">
																			<a class="view_detail second_font" href="event/the-strange-love-movie-2023-festival/index.htm">
																				Đăng ký ngay </a>
																		</div>
																	</div>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>


										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>







			</div>
		</div> <!-- /Inside Content -->
		<div class="wrap_footer">
			<style id="elementor-post-159">
				.elementor-159 .elementor-element.elementor-element-258b10b:not(.elementor-motion-effects-element-type-background),
				.elementor-159 .elementor-element.elementor-element-258b10b>.elementor-motion-effects-container>.elementor-motion-effects-layer {
					background-color: #000000;
				}

				.elementor-159 .elementor-element.elementor-element-258b10b {
					transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
				}

				.elementor-159 .elementor-element.elementor-element-258b10b>.elementor-background-overlay {
					transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
				}

				.elementor-159 .elementor-element.elementor-element-795e95e {
					border-style: solid;
					border-width: 0px 0px 1px 0px;
					border-color: #FFFFFF26;
					transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
					padding: 20px 0px 30px 0px;
				}

				.elementor-159 .elementor-element.elementor-element-795e95e>.elementor-background-overlay {
					transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
				}

				.elementor-bc-flex-widget .elementor-159 .elementor-element.elementor-element-4ab32c6.elementor-column .elementor-widget-wrap {
					align-items: center;
				}

				.elementor-159 .elementor-element.elementor-element-4ab32c6.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
					align-content: center;
					align-items: center;
				}

				.elementor-159 .elementor-element.elementor-element-5f2ead5 {
					width: auto;
					max-width: auto;
				}

				.elementor-bc-flex-widget .elementor-159 .elementor-element.elementor-element-5317ab9.elementor-column .elementor-widget-wrap {
					align-items: center;
				}

				.elementor-159 .elementor-element.elementor-element-5317ab9.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
					align-content: center;
					align-items: center;
				}

				.elementor-159 .elementor-element.elementor-element-5317ab9.elementor-column>.elementor-widget-wrap {
					justify-content: flex-end;
				}

				.elementor-159 .elementor-element.elementor-element-7863967 a {
					color: #797979;
				}

				.elementor-159 .elementor-element.elementor-element-7863967 a:hover {
					color: #D96D2C;
				}

				.elementor-159 .elementor-element.elementor-element-7863967>.elementor-widget-container {
					margin: 0px 30px 0px 0px;
				}

				.elementor-159 .elementor-element.elementor-element-7863967 {
					width: auto;
					max-width: auto;
				}

				.elementor-159 .elementor-element.elementor-element-7656713 {
					--grid-template-columns: repeat(4, auto);
					--icon-size: 14px;
					--grid-column-gap: 10px;
					--grid-row-gap: 0px;
					width: auto;
					max-width: auto;
				}

				.elementor-159 .elementor-element.elementor-element-7656713 .elementor-widget-container {
					text-align: center;
				}

				.elementor-159 .elementor-element.elementor-element-7656713 .elementor-social-icon {
					background-color: #2F2F2F;
					--icon-padding: 1.2em;
				}

				.elementor-159 .elementor-element.elementor-element-7656713 .elementor-icon {
					border-radius: 50% 50% 50% 50%;
				}

				.elementor-159 .elementor-element.elementor-element-7656713 .elementor-social-icon:hover {
					background-color: #D96D2C;
				}

				.elementor-159 .elementor-element.elementor-element-7656713 .elementor-icon.elementor-social-icon {
					display: inline-flex;
				}

				.elementor-159 .elementor-element.elementor-element-9d7926d {
					padding: 90px 0px 50px 0px;
				}

				.elementor-159 .elementor-element.elementor-element-602e797>.elementor-element-populated {
					margin: 0px 30px 0px 0px;
					--e-column-margin-right: 30px;
					--e-column-margin-left: 0px;
				}

				.elementor-159 .elementor-element.elementor-element-7ecb24f {
					color: #FFFFFF;
					font-size: 20px;
					font-weight: 700;
					line-height: 1.8em;
				}

				.elementor-159 .elementor-element.elementor-element-7ecb24f p {
					margin: 0px 0px 0px 0px;
				}

				.elementor-159 .elementor-element.elementor-element-d99ffb0 .elementor-button {
					font-size: 13px;
					padding: 8px 20px 8px 20px;
				}

				.elementor-159 .elementor-element.elementor-element-d99ffb0 .elementor-button:hover,
				.elementor-159 .elementor-element.elementor-element-d99ffb0 .elementor-button:focus {
					color: lime;
					background-color: #FFFFFF;
				}

				.elementor-159 .elementor-element.elementor-element-d99ffb0 .elementor-button:hover svg,
				.elementor-159 .elementor-element.elementor-element-d99ffb0 .elementor-button:focus svg {
					fill: lime;
				}

				.elementor-159 .elementor-element.elementor-element-571e2f5>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
					margin-bottom: 10px;
				}

				.elementor-159 .elementor-element.elementor-element-571e2f5>.elementor-element-populated {
					margin: 0px 0px 0px 30px;
					--e-column-margin-right: 0px;
					--e-column-margin-left: 30px;
				}

				.elementor-159 .elementor-element.elementor-element-2f4d8b9 .ova-heading .title {
					font-size: 20px;
					line-height: 1em;
				}

				.elementor-159 .elementor-element.elementor-element-fdd25bb>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
					margin-bottom: 10px;
				}

				.elementor-159 .elementor-element.elementor-element-1316ca3 .ova-heading .title {
					font-size: 20px;
					line-height: 1em;
				}

				.elementor-159 .elementor-element.elementor-element-37c9a21 .ova-heading .title {
					font-size: 20px;
					line-height: 1em;
				}

				.elementor-159 .elementor-element.elementor-element-384fdb7 p {
					margin: 0px 0px 0px 0px;
				}

				.elementor-159 .elementor-element.elementor-element-384fdb7>.elementor-widget-container {
					margin: 10px 0px 0px 0px;
				}

				.elementor-159 .elementor-element.elementor-element-0c37c33:not(.elementor-motion-effects-element-type-background),
				.elementor-159 .elementor-element.elementor-element-0c37c33>.elementor-motion-effects-container>.elementor-motion-effects-layer {
					background-color: #131313;
				}

				.elementor-159 .elementor-element.elementor-element-0c37c33 {
					transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
					padding: 7px 0px 7px 0px;
				}

				.elementor-159 .elementor-element.elementor-element-0c37c33>.elementor-background-overlay {
					transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
				}

				.elementor-159 .elementor-element.elementor-element-3ec9ecc {
					text-align: center;
					font-size: 15px;
					line-height: 2.4em;
				}

				@media(max-width:1024px) {
					.elementor-159 .elementor-element.elementor-element-4ab32c6>.elementor-element-populated {
						margin: 0px 0px 20px 0px;
						--e-column-margin-right: 0px;
						--e-column-margin-left: 0px;
					}

					.elementor-159 .elementor-element.elementor-element-5317ab9.elementor-column>.elementor-widget-wrap {
						justify-content: flex-start;
					}

					.elementor-159 .elementor-element.elementor-element-7863967>.elementor-widget-container {
						margin: 0px 0px 20px 0px;
					}

					.elementor-159 .elementor-element.elementor-element-7863967 {
						width: 100%;
						max-width: 100%;
					}

					.elementor-159 .elementor-element.elementor-element-7656713 {
						width: auto;
						max-width: auto;
					}

					.elementor-159 .elementor-element.elementor-element-9d7926d {
						padding: 60px 0px 30px 0px;
					}

					.elementor-159 .elementor-element.elementor-element-602e797>.elementor-element-populated {
						margin: 0px 30px 30px 0px;
						--e-column-margin-right: 30px;
						--e-column-margin-left: 0px;
					}

					.elementor-159 .elementor-element.elementor-element-571e2f5>.elementor-element-populated {
						margin: 0px 0px 30px 0px;
						--e-column-margin-right: 0px;
						--e-column-margin-left: 0px;
					}

					.elementor-159 .elementor-element.elementor-element-fdd25bb>.elementor-element-populated {
						margin: 0px 0px 30px 0px;
						--e-column-margin-right: 0px;
						--e-column-margin-left: 0px;
					}

					.elementor-159 .elementor-element.elementor-element-2222280>.elementor-element-populated {
						margin: 0px 0px 30px 0px;
						--e-column-margin-right: 0px;
						--e-column-margin-left: 0px;
					}
				}

				@media(max-width:767px) {
					.elementor-159 .elementor-element.elementor-element-602e797>.elementor-element-populated {
						margin: 0px 0px 60px 0px;
						--e-column-margin-right: 0px;
						--e-column-margin-left: 0px;
					}
				}

				@media(min-width:768px) {
					.elementor-159 .elementor-element.elementor-element-602e797 {
						width: 30%;
					}

					.elementor-159 .elementor-element.elementor-element-571e2f5 {
						width: 20%;
					}

					.elementor-159 .elementor-element.elementor-element-fdd25bb {
						width: 25%;
					}

					.elementor-159 .elementor-element.elementor-element-2222280 {
						width: 25%;
					}
				}

				@media(max-width:1024px) and (min-width:768px) {
					.elementor-159 .elementor-element.elementor-element-4ab32c6 {
						width: 100%;
					}

					.elementor-159 .elementor-element.elementor-element-5317ab9 {
						width: 100%;
					}

					.elementor-159 .elementor-element.elementor-element-602e797 {
						width: 60%;
					}

					.elementor-159 .elementor-element.elementor-element-571e2f5 {
						width: 40%;
					}

					.elementor-159 .elementor-element.elementor-element-fdd25bb {
						width: 60%;
					}

					.elementor-159 .elementor-element.elementor-element-2222280 {
						width: 40%;
					}
				}
			</style>
			<div data-elementor-type="wp-post" data-elementor-id="159" class="elementor elementor-159">
				<section class="elementor-section elementor-top-section elementor-element elementor-element-258b10b elementor-section-boxed elementor-section-height-default elementor-section-height-default" id="section-footer" data-id="258b10b" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="elementor-container elementor-column-gap-default">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-57eb3c2" data-id="57eb3c2" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<section class="elementor-section elementor-inner-section elementor-element elementor-element-795e95e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="795e95e" data-element_type="section">
									<div class="elementor-container elementor-column-gap-no">
										<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4ab32c6" data-id="4ab32c6" data-element_type="column">
											<div class="elementor-widget-wrap elementor-element-populated">
												<div class="elementor-element elementor-element-5f2ead5 elementor-widget__width-auto elementor-widget elementor-widget-ova_logo" data-id="5f2ead5" data-element_type="widget" data-widget_type="ova_logo.default">
													<div class="elementor-widget-container">

														<div class="brand_el">

															<a href="index.htm">

																<img src="wp-content/uploads/2023/02/logo-white.png" alt="Aovis &#8211; Film &amp; Movie Booking WordPress Theme" class="logo_desktop" style="width:108px ; height:auto">

																<img src="wp-content/uploads/2023/02/logo-white.png" alt="Aovis &#8211; Film &amp; Movie Booking WordPress Theme" class="logo_mobile" style="width:108px ;  height:auto">

																<img src="wp-content/plugins/elementor/assets/images/placeholder.png" alt="Aovis &#8211; Film &amp; Movie Booking WordPress Theme" class="logo_sticky" style="width:auto ; height:auto">

															</a>

														</div>

													</div>
												</div>
											</div>
										</div>
										<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5317ab9" data-id="5317ab9" data-element_type="column">
											<div class="elementor-widget-wrap elementor-element-populated">
												<div class="elementor-element elementor-element-7863967 elementor-widget__width-auto elementor-widget-tablet__width-inherit elementor-widget elementor-widget-text-editor" data-id="7863967" data-element_type="widget" data-widget_type="text-editor.default">
													<div class="elementor-widget-container">
														<a href="about/index.htm">Help</a> / <a href="privacy-policy/index.htm">Privacy Policy</a>
													</div>
												</div>
												<div class="elementor-element elementor-element-7656713 elementor-grid-4 elementor-widget__width-auto elementor-widget-tablet__width-auto elementor-shape-rounded e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="7656713" data-element_type="widget" data-widget_type="social-icons.default">
													<div class="elementor-widget-container">
														<style>
															/*! elementor - v3.17.0 - 01-11-2023 */
															.elementor-widget-social-icons.elementor-grid-0 .elementor-widget-container,
															.elementor-widget-social-icons.elementor-grid-mobile-0 .elementor-widget-container,
															.elementor-widget-social-icons.elementor-grid-tablet-0 .elementor-widget-container {
																line-height: 1;
																font-size: 0
															}

															.elementor-widget-social-icons:not(.elementor-grid-0):not(.elementor-grid-tablet-0):not(.elementor-grid-mobile-0) .elementor-grid {
																display: inline-grid
															}

															.elementor-widget-social-icons .elementor-grid {
																grid-column-gap: var(--grid-column-gap, 5px);
																grid-row-gap: var(--grid-row-gap, 5px);
																grid-template-columns: var(--grid-template-columns);
																justify-content: var(--justify-content, center);
																justify-items: var(--justify-content, center)
															}

															.elementor-icon.elementor-social-icon {
																font-size: var(--icon-size, 25px);
																line-height: var(--icon-size, 25px);
																width: calc(var(--icon-size, 25px) + (2 * var(--icon-padding, .5em)));
																height: calc(var(--icon-size, 25px) + (2 * var(--icon-padding, .5em)))
															}

															.elementor-social-icon {
																--e-social-icon-icon-color: #fff;
																display: inline-flex;
																background-color: #69727d;
																align-items: center;
																justify-content: center;
																text-align: center;
																cursor: pointer
															}

															.elementor-social-icon i {
																color: var(--e-social-icon-icon-color)
															}

															.elementor-social-icon svg {
																fill: var(--e-social-icon-icon-color)
															}

															.elementor-social-icon:last-child {
																margin: 0
															}

															.elementor-social-icon:hover {
																opacity: .9;
																color: #fff
															}

															.elementor-social-icon-android {
																background-color: #a4c639
															}

															.elementor-social-icon-apple {
																background-color: #999
															}

															.elementor-social-icon-behance {
																background-color: #1769ff
															}

															.elementor-social-icon-bitbucket {
																background-color: #205081
															}

															.elementor-social-icon-codepen {
																background-color: #000
															}

															.elementor-social-icon-delicious {
																background-color: #39f
															}

															.elementor-social-icon-deviantart {
																background-color: #05cc47
															}

															.elementor-social-icon-digg {
																background-color: #005be2
															}

															.elementor-social-icon-dribbble {
																background-color: #ea4c89
															}

															.elementor-social-icon-elementor {
																background-color: #d30c5c
															}

															.elementor-social-icon-envelope {
																background-color: #ea4335
															}

															.elementor-social-icon-facebook,
															.elementor-social-icon-facebook-f {
																background-color: #3b5998
															}

															.elementor-social-icon-flickr {
																background-color: #0063dc
															}

															.elementor-social-icon-foursquare {
																background-color: #2d5be3
															}

															.elementor-social-icon-free-code-camp,
															.elementor-social-icon-freecodecamp {
																background-color: #006400
															}

															.elementor-social-icon-github {
																background-color: #333
															}

															.elementor-social-icon-gitlab {
																background-color: #e24329
															}

															.elementor-social-icon-globe {
																background-color: #69727d
															}

															.elementor-social-icon-google-plus,
															.elementor-social-icon-google-plus-g {
																background-color: #dd4b39
															}

															.elementor-social-icon-houzz {
																background-color: #7ac142
															}

															.elementor-social-icon-instagram {
																background-color: #262626
															}

															.elementor-social-icon-jsfiddle {
																background-color: #487aa2
															}

															.elementor-social-icon-link {
																background-color: #818a91
															}

															.elementor-social-icon-linkedin,
															.elementor-social-icon-linkedin-in {
																background-color: #0077b5
															}

															.elementor-social-icon-medium {
																background-color: #00ab6b
															}

															.elementor-social-icon-meetup {
																background-color: #ec1c40
															}

															.elementor-social-icon-mixcloud {
																background-color: #273a4b
															}

															.elementor-social-icon-odnoklassniki {
																background-color: #f4731c
															}

															.elementor-social-icon-pinterest {
																background-color: #bd081c
															}

															.elementor-social-icon-product-hunt {
																background-color: #da552f
															}

															.elementor-social-icon-reddit {
																background-color: #ff4500
															}

															.elementor-social-icon-rss {
																background-color: #f26522
															}

															.elementor-social-icon-shopping-cart {
																background-color: #4caf50
															}

															.elementor-social-icon-skype {
																background-color: #00aff0
															}

															.elementor-social-icon-slideshare {
																background-color: #0077b5
															}

															.elementor-social-icon-snapchat {
																background-color: #fffc00
															}

															.elementor-social-icon-soundcloud {
																background-color: #f80
															}

															.elementor-social-icon-spotify {
																background-color: #2ebd59
															}

															.elementor-social-icon-stack-overflow {
																background-color: #fe7a15
															}

															.elementor-social-icon-steam {
																background-color: #00adee
															}

															.elementor-social-icon-stumbleupon {
																background-color: #eb4924
															}

															.elementor-social-icon-telegram {
																background-color: #2ca5e0
															}

															.elementor-social-icon-thumb-tack {
																background-color: #1aa1d8
															}

															.elementor-social-icon-tripadvisor {
																background-color: #589442
															}

															.elementor-social-icon-tumblr {
																background-color: #35465c
															}

															.elementor-social-icon-twitch {
																background-color: #6441a5
															}

															.elementor-social-icon-twitter {
																background-color: #1da1f2
															}

															.elementor-social-icon-viber {
																background-color: #665cac
															}

															.elementor-social-icon-vimeo {
																background-color: #1ab7ea
															}

															.elementor-social-icon-vk {
																background-color: #45668e
															}

															.elementor-social-icon-weibo {
																background-color: #dd2430
															}

															.elementor-social-icon-weixin {
																background-color: #31a918
															}

															.elementor-social-icon-whatsapp {
																background-color: #25d366
															}

															.elementor-social-icon-wordpress {
																background-color: #21759b
															}

															.elementor-social-icon-xing {
																background-color: #026466
															}

															.elementor-social-icon-yelp {
																background-color: #af0606
															}

															.elementor-social-icon-youtube {
																background-color: #cd201f
															}

															.elementor-social-icon-500px {
																background-color: #0099e5
															}

															.elementor-shape-rounded .elementor-icon.elementor-social-icon {
																border-radius: 10%
															}

															.elementor-shape-circle .elementor-icon.elementor-social-icon {
																border-radius: 50%
															}
														</style>
														
														<div class="elementor-social-icons-wrapper elementor-grid">
															<span class="elementor-grid-item">
																<a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-animation-float elementor-repeater-item-48ef142" href="#" target="_blank">
																	<span class="elementor-screen-only">Twitter</span>
																	<i class="fab fa-twitter"></i> </a>
															</span>
															<span class="elementor-grid-item">
																<a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-animation-float elementor-repeater-item-2b85ff4" href="#" target="_blank">
																	<span class="elementor-screen-only">Facebook</span>
																	<i class="fab fa-facebook"></i> </a>
															</span>
															<span class="elementor-grid-item">
																<a class="elementor-icon elementor-social-icon elementor-social-icon-pinterest elementor-animation-float elementor-repeater-item-fb63f27" href="#" target="_blank">
																	<span class="elementor-screen-only">Pinterest</span>
																	<i class="fab fa-pinterest"></i> </a>
															</span>
															<span class="elementor-grid-item">
																<a class="elementor-icon elementor-social-icon elementor-social-icon-ovaicon-instagram-1 elementor-animation-float elementor-repeater-item-4a7c865" href="#" target="_blank">
																	<span class="elementor-screen-only">Ovaicon-instagram-1</span>
																	<i class="ovaicon ovaicon-instagram-1"></i> </a>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>

							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

	</div> <!-- Ova Wrapper -->
	<div id="mb_booking_popup" class="mb_booking_popup">
		<div class="mb-bp-container">
			<div class="mb-bp-content"></div>
			<div class="mb-close">x</div>
			<div class="mb-spinner">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
	</div>
	<div id="mb_trailer_video_popup" class="mb_trailer_video_popup">
		<div class="modal-container">
			<div class="modal">
				<i class="ovaicon-cancel"></i>
				<div class="modal-content"></div>
			</div>
		</div>
	</div>
	<script>
		(function() {
			function maybePrefixUrlField() {
				const value = this.value.trim()
				if (value !== '' && value.indexOf('http') !== 0) {
					this.value = 'http://' + value
				}
			}

			const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
			for (let j = 0; j < urlFields.length; j++) {
				urlFields[j].addEventListener('blur', maybePrefixUrlField)
			}
		})();
	</script>
	<script type="text/javascript">
		(function() {
			var c = document.body.className;
			c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
			document.body.className = c;
		})();
	</script>
	<link rel='stylesheet' id='slick-carousel-css' href='wp-content/plugins/movie-booking/assets/libs/slick/slick.css?ver=6.4.1' type='text/css' media='all'>
	<link rel='stylesheet' id='slick-carousel-theme-css' href='wp-content/plugins/movie-booking/assets/libs/slick/slick-theme.css?ver=6.4.1' type='text/css' media='all'>
	<link rel='stylesheet' id='odometer-css' href='wp-content/themes/aovis/assets/libs/odometer/odometer.min.css?ver=6.4.1' type='text/css' media='all'>
	<link rel='stylesheet' id='fancybox-css' href='wp-content/themes/aovis/assets/libs/fancybox/fancybox.css?ver=6.4.1' type='text/css' media='all'>
	<link rel='stylesheet' id='e-animations-css' href='wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.17.2' type='text/css' media='all'>
	<link rel='stylesheet' id='elementor-icons-shared-0-css' href='wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3' type='text/css' media='all'>
	<link rel='stylesheet' id='elementor-icons-fa-brands-css' href='wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.15.3' type='text/css' media='all'>
	<script type="text/javascript" src="wp-content/plugins/movie-booking/assets/js/elementor/script-elementor.js?ver=6.4.1" id="script-elementor-js"></script>
	<script type="text/javascript" src="wp-includes/js/underscore.min.js?ver=1.13.4" id="underscore-js"></script>
	<script type="text/javascript" src="wp-content/plugins/ova-events/assets/js/script-elementor.js?ver=6.4.1" id="script-elementor-event-js"></script>
	<script type="text/javascript" src="wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.8.2" id="swv-js"></script>
	<script type="text/javascript" id="contact-form-7-js-extra">
		/* <![CDATA[ */
		var wpcf7 = {
			"api": {
				"root": "https:\/\/chonloc\/aovis\/wp-json\/",
				"namespace": "contact-form-7\/v1"
			}
		};
		/* ]]> */
	</script>
	<script type="text/javascript" src="wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.8.2" id="contact-form-7-js"></script>
	<script type="text/javascript" id="mb_frontend-js-extra">
		/* <![CDATA[ */
		var ajax_object = {
			"ajax_url": "https:\/\/chonloc\/aovis\/wp-admin\/admin-ajax.php",
			"ajax_nonce": "4bdce5f79f"
		};
		/* ]]> */
	</script>
	<script type="text/javascript" src="wp-content/plugins/movie-booking/assets/js/frontend/script.min.js?ver=6.4.1" id="mb_frontend-js"></script>
	<script type="text/javascript" src="wp-content/plugins/ova-events/assets/js/frontend/event.js?ver=6.4.1" id="event-frontend-js-js"></script>
	<script type="text/javascript" src="wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.7.0-wc.8.2.1" id="jquery-blockui-js"></script>
	<script type="text/javascript" id="wc-add-to-cart-js-extra">
		/* <![CDATA[ */
		var wc_add_to_cart_params = {
			"ajax_url": "\/aovis\/wp-admin\/admin-ajax.php",
			"wc_ajax_url": "\/aovis\/?wc-ajax=%%endpoint%%",
			"i18n_view_cart": "View cart",
			"cart_url": "https:\/\/chonloc\/aovis\/cart\/",
			"is_cart": "",
			"cart_redirect_after_add": "no"
		};
		/* ]]> */
	</script>
	<script type="text/javascript" src="wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=8.2.1" id="wc-add-to-cart-js"></script>
	<script type="text/javascript" src="wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.8.2.1" id="js-cookie-js"></script>
	<script type="text/javascript" id="woocommerce-js-extra">
		/* <![CDATA[ */
		var woocommerce_params = {
			"ajax_url": "\/aovis\/wp-admin\/admin-ajax.php",
			"wc_ajax_url": "\/aovis\/?wc-ajax=%%endpoint%%"
		};
		/* ]]> */
	</script>
	<script type="text/javascript" src="wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=8.2.1" id="woocommerce-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/libs/carousel/owl.carousel.min.js" id="carousel-js"></script>
	<script type="text/javascript" src="wp-includes/js/imagesloaded.min.js?ver=5.0.0" id="imagesloaded-js"></script>
	<script type="text/javascript" src="wp-includes/js/masonry.min.js?ver=4.2.2" id="masonry-js"></script>
	<script type="text/javascript" id="aovis-script-js-extra">
		/* <![CDATA[ */
		var ScrollUpText = {
			"value": "Go to top"
		};
		/* ]]> */
	</script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/js/script.js" id="aovis-script-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/js/woo.js" id="aovis-woo-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/js/elementor/menu-canvas.js?ver=6.4.1" id="aovis-elementor-menu-canvas-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/js/elementor/search-popup.js?ver=6.4.1" id="aovis-elementor-search-popup-js"></script>
	<script type="text/javascript" src="wp-content/plugins/movie-booking/assets/libs/slick/slick.min.js?ver=6.4.1" id="slick-carousel-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/libs/appear/appear.js?ver=6.4.1" id="aovis-counter-appear-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/libs/odometer/odometer.min.js?ver=6.4.1" id="odometer-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/js/elementor/ova-counter.js?ver=6.4.1" id="aovis-elementor-ova-counter-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/js/elementor/video.js?ver=6.4.1" id="aovis-elementor-video-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/libs/fancybox/fancybox.umd.js?ver=6.4.1" id="fancybox-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/js/elementor/gallery-slide.js?ver=6.4.1" id="aovis-elementor-gallery-slide-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/js/elementor/image-slider.js?ver=6.4.1" id="aovis-elementor-image-slider-js"></script>
	<script type="text/javascript" src="wp-content/themes/aovis/assets/js/elementor/testimonial.js?ver=6.4.1" id="aovis-elementor-testimonial-js"></script>
	<script type="text/javascript" defer="" src="wp-content/plugins/mailchimp-for-wp/assets/js/forms.js?ver=4.9.9" id="mc4wp-forms-api-js"></script>
	<script type="text/javascript" src="wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.17.2" id="elementor-webpack-runtime-js"></script>
	<script type="text/javascript" src="wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.17.2" id="elementor-frontend-modules-js"></script>
	<script type="text/javascript" src="wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2" id="elementor-waypoints-js"></script>
	<script type="text/javascript" src="wp-includes/js/jquery/ui/core.min.js?ver=1.13.2" id="jquery-ui-core-js"></script>
	<script type="text/javascript" id="elementor-frontend-js-before">
		/* <![CDATA[ */
		var elementorFrontendConfig = {
			"environmentMode": {
				"edit": false,
				"wpPreview": false,
				"isScriptDebug": false
			},
			"i18n": {
				"shareOnFacebook": "Share on Facebook",
				"shareOnTwitter": "Share on Twitter",
				"pinIt": "Pin it",
				"download": "Download",
				"downloadImage": "Download image",
				"fullscreen": "Fullscreen",
				"zoom": "Zoom",
				"share": "Share",
				"playVideo": "Play Video",
				"previous": "Previous",
				"next": "Next",
				"close": "Close",
				"a11yCarouselWrapperAriaLabel": "Carousel | Horizontal scrolling: Arrow Left & Right",
				"a11yCarouselPrevSlideMessage": "Previous slide",
				"a11yCarouselNextSlideMessage": "Next slide",
				"a11yCarouselFirstSlideMessage": "This is the first slide",
				"a11yCarouselLastSlideMessage": "This is the last slide",
				"a11yCarouselPaginationBulletMessage": "Go to slide"
			},
			"is_rtl": false,
			"breakpoints": {
				"xs": 0,
				"sm": 480,
				"md": 768,
				"lg": 1025,
				"xl": 1440,
				"xxl": 1600
			},
			"responsive": {
				"breakpoints": {
					"mobile": {
						"label": "Mobile Portrait",
						"value": 767,
						"default_value": 767,
						"direction": "max",
						"is_enabled": true
					},
					"mobile_extra": {
						"label": "Mobile Landscape",
						"value": 880,
						"default_value": 880,
						"direction": "max",
						"is_enabled": false
					},
					"tablet": {
						"label": "Tablet Portrait",
						"value": 1024,
						"default_value": 1024,
						"direction": "max",
						"is_enabled": true
					},
					"tablet_extra": {
						"label": "Tablet Landscape",
						"value": 1200,
						"default_value": 1200,
						"direction": "max",
						"is_enabled": false
					},
					"laptop": {
						"label": "Laptop",
						"value": 1366,
						"default_value": 1366,
						"direction": "max",
						"is_enabled": false
					},
					"widescreen": {
						"label": "Widescreen",
						"value": 2400,
						"default_value": 2400,
						"direction": "min",
						"is_enabled": false
					}
				}
			},
			"version": "3.17.2",
			"is_static": false,
			"experimentalFeatures": {
				"e_dom_optimization": true,
				"e_optimized_assets_loading": true,
				"e_optimized_css_loading": true,
				"e_swiper_latest": true,
				"landing-pages": true
			},
			"urls": {
				"assets": "https:\/\/chonloc\/aovis\/wp-content\/plugins\/elementor\/assets\/"
			},
			"swiperClass": "swiper",
			"settings": {
				"page": [],
				"editorPreferences": []
			},
			"kit": {
				"active_breakpoints": ["viewport_mobile", "viewport_tablet"],
				"global_image_lightbox": "yes",
				"lightbox_enable_counter": "yes",
				"lightbox_enable_fullscreen": "yes",
				"lightbox_enable_zoom": "yes",
				"lightbox_enable_share": "yes",
				"lightbox_title_src": "title",
				"lightbox_description_src": "description"
			},
			"post": {
				"id": 24,
				"title": "Aovis%20%E2%80%93%20Film%20%26%20Movie%20Booking%20WordPress%20Theme%20%E2%80%93%20Film%20%26%20Movie%20Booking%20WordPress%20Theme",
				"excerpt": "",
				"featuredImage": false
			}
		};
		/* ]]> */
	</script>
	<script type="text/javascript" src="wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.17.2" id="elementor-frontend-js"></script>
</body><!-- /body -->

</html>