/*!

 =========================================================
 * Now UI Dashboard - v1.3.0
 =========================================================

 * Product Page: https://www.creative-tim.com/product/now-ui-dashboard-laravel
 * Copyright 2019 Creative Tim (http://www.creative-tim.com) & Updivision (https://updivision.com)

 * Designed by www.invisionapp.com Coded by www.creative-tim.com & https://updivision.com

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 */

(function () {
    isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;

    if (isWindows) {
        // if we are on windows OS we activate the perfectScrollbar function
        var ps = new PerfectScrollbar('.sidebar-wrapper');
        var ps2 = new PerfectScrollbar('.main-panel');

        $('html').addClass('perfect-scrollbar-on');
    } else {
        $('html').addClass('perfect-scrollbar-off');
    }
})();

transparent = true;
transparentDemo = true;
fixedTop = false;

navbar_initialized = false;
backgroundOrange = false;
sidebar_mini_active = false;
toggle_initialized = false;

var is_iPad = navigator.userAgent.match(/iPad/i) != null;
var scrollElement = navigator.platform.indexOf('Win') > -1 ? $(".main-panel") : $(window);

seq = 0, delays = 80, durations = 500;
seq2 = 0, delays2 = 80, durations2 = 500;

$(document).ready(function () {

    if ($('.full-screen-map').length == 0 && $('.bd-docs').length == 0) {
        // On click navbar-collapse the menu will be white not transparent
        $('.collapse').on('show.bs.collapse', function () {
            $(this).closest('.navbar').removeClass('navbar-transparent').addClass('bg-white');
        }).on('hide.bs.collapse', function () {
            $(this).closest('.navbar').addClass('navbar-transparent').removeClass('bg-white');
        });
    }

    $navbar = $('.navbar[color-on-scroll]');
    scroll_distance = $navbar.attr('color-on-scroll') || 500;

    // Check if we have the class "navbar-color-on-scroll" then add the function to remove the class "navbar-transparent" so it will transform to a plain color.
    if ($('.navbar[color-on-scroll]').length != 0) {
        nowuiDashboard.checkScrollForTransparentNavbar();
        $(window).on('scroll', nowuiDashboard.checkScrollForTransparentNavbar)
    }

    $('.form-control').on("focus", function () {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function () {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });

    // Activate bootstrapSwitch
    $('.bootstrap-switch').each(function () {
        $this = $(this);
        data_on_label = $this.data('on-label') || '';
        data_off_label = $this.data('off-label') || '';

        $this.bootstrapSwitch({
            onText: data_on_label,
            offText: data_off_label
        });
    });
});

$(document).on('click', '.navbar-toggle', function () {
    $toggle = $(this);

    if (nowuiDashboard.misc.navbar_menu_visible == 1) {
        $('html').removeClass('nav-open');
        nowuiDashboard.misc.navbar_menu_visible = 0;
        setTimeout(function () {
            $toggle.removeClass('toggled');
            $('#bodyClick').remove();
        }, 550);

    } else {
        setTimeout(function () {
            $toggle.addClass('toggled');
        }, 580);

        div = '<div id="bodyClick"></div>';
        $(div).appendTo('body').click(function () {
            $('html').removeClass('nav-open');
            nowuiDashboard.misc.navbar_menu_visible = 0;
            setTimeout(function () {
                $toggle.removeClass('toggled');
                $('#bodyClick').remove();
            }, 550);
        });

        $('html').addClass('nav-open');
        nowuiDashboard.misc.navbar_menu_visible = 1;
    }
});

$(window).resize(function () {
    // reset the seq for charts drawing animations
    seq = seq2 = 0;

    if ($('.full-screen-map').length == 0 && $('.bd-docs').length == 0) {

        $navbar = $('.navbar');
        isExpanded = $('.navbar').find('[data-toggle="collapse"]').attr("aria-expanded");
        if ($navbar.hasClass('bg-white') && $(window).width() > 991) {
            if (scrollElement.scrollTop() == 0) {
                $navbar.removeClass('bg-white').addClass('navbar-transparent');
            }
        } else if ($navbar.hasClass('navbar-transparent') && $(window).width() < 991 && isExpanded != "false") {
            $navbar.addClass('bg-white').removeClass('navbar-transparent');
        }
    }
    if (is_iPad) {
        $('body').removeClass('sidebar-mini');
    }
});

nowuiDashboard = {
    misc: {
        navbar_menu_visible: 0
    },

    showNotification: function (from, align) {
        color = 'primary';

        $.notify({
            icon: "now-ui-icons ui-1_bell-53",
            message: "Welcome to <b>Now Ui Dashboard</b> - a beautiful freebie for every web developer."

        }, {
            type: color,
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    }


};

function hexToRGB(hex, alpha) {
    var r = parseInt(hex.slice(1, 3), 16),
        g = parseInt(hex.slice(3, 5), 16),
        b = parseInt(hex.slice(5, 7), 16);

    if (alpha) {
        return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
    } else {
        return "rgb(" + r + ", " + g + ", " + b + ")";
    }
}
/********************************************
 * REVOLUTION 5.2 EXTENSION - NAVIGATION
 * @version: 1.2.4 (10.03.2016)
 * @requires jquery.themepunch.revolution.js
 * @author ThemePunch
*********************************************/
!function (t) { var e = jQuery.fn.revolution, i = e.is_mobile(); jQuery.extend(!0, e, { hideUnHideNav: function (t) { var e = t.c.width(), i = t.navigation.arrows, a = t.navigation.bullets, n = t.navigation.thumbnails, r = t.navigation.tabs; p(i) && T(t.c.find(".tparrows"), i.hide_under, e, i.hide_over), p(a) && T(t.c.find(".tp-bullets"), a.hide_under, e, a.hide_over), p(n) && T(t.c.parent().find(".tp-thumbs"), n.hide_under, e, n.hide_over), p(r) && T(t.c.parent().find(".tp-tabs"), r.hide_under, e, r.hide_over), y(t) }, resizeThumbsTabs: function (t, e) { if (t.navigation && t.navigation.tabs.enable || t.navigation && t.navigation.thumbnails.enable) { var i = (jQuery(window).width() - 480) / 500, a = new punchgs.TimelineLite, r = t.navigation.tabs, s = t.navigation.thumbnails, o = t.navigation.bullets; if (a.pause(), i = i > 1 ? 1 : 0 > i ? 0 : i, p(r) && (e || r.width > r.min_width) && n(i, a, t.c, r, t.slideamount, "tab"), p(s) && (e || s.width > s.min_width) && n(i, a, t.c, s, t.slideamount, "thumb"), p(o) && e) { var d = t.c.find(".tp-bullets"); d.find(".tp-bullet").each(function (t) { var e = jQuery(this), i = t + 1, a = e.outerWidth() + parseInt(void 0 === o.space ? 0 : o.space, 0), n = e.outerHeight() + parseInt(void 0 === o.space ? 0 : o.space, 0); "vertical" === o.direction ? (e.css({ top: (i - 1) * n + "px", left: "0px" }), d.css({ height: (i - 1) * n + e.outerHeight(), width: e.outerWidth() })) : (e.css({ left: (i - 1) * a + "px", top: "0px" }), d.css({ width: (i - 1) * a + e.outerWidth(), height: e.outerHeight() })) }) } a.play(), y(t) } return !0 }, updateNavIndexes: function (t) { function i(t) { a.find(t).lenght > 0 && a.find(t).each(function (t) { jQuery(this).data("liindex", t) }) } var a = t.c; i(".tp-tab"), i(".tp-bullet"), i(".tp-thumb"), e.resizeThumbsTabs(t, !0), e.manageNavigation(t) }, manageNavigation: function (t) { var i = e.getHorizontalOffset(t.c.parent(), "left"), n = e.getHorizontalOffset(t.c.parent(), "right"); p(t.navigation.bullets) && ("fullscreen" != t.sliderLayout && "fullwidth" != t.sliderLayout && (t.navigation.bullets.h_offset_old = void 0 === t.navigation.bullets.h_offset_old ? t.navigation.bullets.h_offset : t.navigation.bullets.h_offset_old, t.navigation.bullets.h_offset = "center" === t.navigation.bullets.h_align ? t.navigation.bullets.h_offset_old + i / 2 - n / 2 : t.navigation.bullets.h_offset_old + i - n), b(t.c.find(".tp-bullets"), t.navigation.bullets, t)), p(t.navigation.thumbnails) && b(t.c.parent().find(".tp-thumbs"), t.navigation.thumbnails, t), p(t.navigation.tabs) && b(t.c.parent().find(".tp-tabs"), t.navigation.tabs, t), p(t.navigation.arrows) && ("fullscreen" != t.sliderLayout && "fullwidth" != t.sliderLayout && (t.navigation.arrows.left.h_offset_old = void 0 === t.navigation.arrows.left.h_offset_old ? t.navigation.arrows.left.h_offset : t.navigation.arrows.left.h_offset_old, t.navigation.arrows.left.h_offset = "right" === t.navigation.arrows.left.h_align ? t.navigation.arrows.left.h_offset_old + n : t.navigation.arrows.left.h_offset_old + i, t.navigation.arrows.right.h_offset_old = void 0 === t.navigation.arrows.right.h_offset_old ? t.navigation.arrows.right.h_offset : t.navigation.arrows.right.h_offset_old, t.navigation.arrows.right.h_offset = "right" === t.navigation.arrows.right.h_align ? t.navigation.arrows.right.h_offset_old + n : t.navigation.arrows.right.h_offset_old + i), b(t.c.find(".tp-leftarrow.tparrows"), t.navigation.arrows.left, t), b(t.c.find(".tp-rightarrow.tparrows"), t.navigation.arrows.right, t)), p(t.navigation.thumbnails) && a(t.c.parent().find(".tp-thumbs"), t.navigation.thumbnails), p(t.navigation.tabs) && a(t.c.parent().find(".tp-tabs"), t.navigation.tabs) }, createNavigation: function (t, e) { var n = t.parent(), r = e.navigation.arrows, d = e.navigation.bullets, u = e.navigation.thumbnails, f = e.navigation.tabs, m = p(r), b = p(d), _ = p(u), y = p(f); s(t, e), o(t, e), m && v(t, r, e), e.li.each(function (i) { var a = jQuery(e.li[e.li.length - 1 - i]), n = jQuery(this); b && (e.navigation.bullets.rtl ? w(t, d, a, e) : w(t, d, n, e)), _ && (e.navigation.thumbnails.rtl ? x(t, u, a, "tp-thumb", e) : x(t, u, n, "tp-thumb", e)), y && (e.navigation.tabs.rtl ? x(t, f, a, "tp-tab", e) : x(t, f, n, "tp-tab", e)) }), t.bind("revolution.slide.onafterswap revolution.nextslide.waiting", function () { var i = 0 == t.find(".next-revslide").length ? t.find(".active-revslide").data("index") : t.find(".next-revslide").data("index"); t.find(".tp-bullet").each(function () { var t = jQuery(this); t.data("liref") === i ? t.addClass("selected") : t.removeClass("selected") }), n.find(".tp-thumb, .tp-tab").each(function () { var t = jQuery(this); t.data("liref") === i ? (t.addClass("selected"), t.hasClass("tp-tab") ? a(n.find(".tp-tabs"), f) : a(n.find(".tp-thumbs"), u)) : t.removeClass("selected") }); var s = 0, o = !1; e.thumbs && jQuery.each(e.thumbs, function (t, e) { s = o === !1 ? t : s, o = e.id === i || t === i ? !0 : o }); var d = s > 0 ? s - 1 : e.slideamount - 1, l = s + 1 == e.slideamount ? 0 : s + 1; if (r.enable === !0) { var h = r.tmp; if (jQuery.each(e.thumbs[d].params, function (t, e) { h = h.replace(e.from, e.to) }), r.left.j.html(h), h = r.tmp, l > e.slideamount) return; jQuery.each(e.thumbs[l].params, function (t, e) { h = h.replace(e.from, e.to) }), r.right.j.html(h), punchgs.TweenLite.set(r.left.j.find(".tp-arr-imgholder"), { backgroundImage: "url(" + e.thumbs[d].src + ")" }), punchgs.TweenLite.set(r.right.j.find(".tp-arr-imgholder"), { backgroundImage: "url(" + e.thumbs[l].src + ")" }) } }), h(r), h(d), h(u), h(f), n.on("mouseenter mousemove", function () { n.hasClass("tp-mouseover") || (n.addClass("tp-mouseover"), punchgs.TweenLite.killDelayedCallsTo(g), m && r.hide_onleave && g(n.find(".tparrows"), r, "show"), b && d.hide_onleave && g(n.find(".tp-bullets"), d, "show"), _ && u.hide_onleave && g(n.find(".tp-thumbs"), u, "show"), y && f.hide_onleave && g(n.find(".tp-tabs"), f, "show"), i && (n.removeClass("tp-mouseover"), c(t, e))) }), n.on("mouseleave", function () { n.removeClass("tp-mouseover"), c(t, e) }), m && r.hide_onleave && g(n.find(".tparrows"), r, "hide", 0), b && d.hide_onleave && g(n.find(".tp-bullets"), d, "hide", 0), _ && u.hide_onleave && g(n.find(".tp-thumbs"), u, "hide", 0), y && f.hide_onleave && g(n.find(".tp-tabs"), f, "hide", 0), _ && l(n.find(".tp-thumbs"), e), y && l(n.find(".tp-tabs"), e), "carousel" === e.sliderType && l(t, e, !0), "on" == e.navigation.touch.touchenabled && l(t, e, "swipebased") } }); var a = function (t, e) { var i = (t.hasClass("tp-thumbs") ? ".tp-thumbs" : ".tp-tabs", t.hasClass("tp-thumbs") ? ".tp-thumb-mask" : ".tp-tab-mask"), a = t.hasClass("tp-thumbs") ? ".tp-thumbs-inner-wrapper" : ".tp-tabs-inner-wrapper", n = t.hasClass("tp-thumbs") ? ".tp-thumb" : ".tp-tab", r = t.find(i), s = r.find(a), o = e.direction, d = "vertical" === o ? r.find(n).first().outerHeight(!0) + e.space : r.find(n).first().outerWidth(!0) + e.space, l = "vertical" === o ? r.height() : r.width(), h = parseInt(r.find(n + ".selected").data("liindex"), 0), p = l / d, u = "vertical" === o ? r.height() : r.width(), c = 0 - h * d, g = "vertical" === o ? s.height() : s.width(), v = 0 - (g - u) > c ? 0 - (g - u) : v > 0 ? 0 : c, f = s.data("offset"); p > 2 && (v = 0 >= c - (f + d) ? 0 - d > c - (f + d) ? f : v + d : v, v = d > c - d + f + l && c + (Math.round(p) - 2) * d < f ? c + (Math.round(p) - 2) * d : v), v = 0 - (g - u) > v ? 0 - (g - u) : v > 0 ? 0 : v, "vertical" !== o && r.width() >= s.width() && (v = 0), "vertical" === o && r.height() >= s.height() && (v = 0), t.hasClass("dragged") || ("vertical" === o ? s.data("tmmove", punchgs.TweenLite.to(s, .5, { top: v + "px", ease: punchgs.Power3.easeInOut })) : s.data("tmmove", punchgs.TweenLite.to(s, .5, { left: v + "px", ease: punchgs.Power3.easeInOut })), s.data("offset", v)) }, n = function (t, e, i, a, n, r) { var s = i.parent().find(".tp-" + r + "s"), o = s.find(".tp-" + r + "s-inner-wrapper"), d = s.find(".tp-" + r + "-mask"), l = a.width * t < a.min_width ? a.min_width : Math.round(a.width * t), h = Math.round(l / a.width * a.height), p = "vertical" === a.direction ? l : l * n + a.space * (n - 1), u = "vertical" === a.direction ? h * n + a.space * (n - 1) : h, c = "vertical" === a.direction ? { width: l + "px" } : { height: h + "px" }; e.add(punchgs.TweenLite.set(s, c)), e.add(punchgs.TweenLite.set(o, { width: p + "px", height: u + "px" })), e.add(punchgs.TweenLite.set(d, { width: p + "px", height: u + "px" })); var g = o.find(".tp-" + r); return g && jQuery.each(g, function (t, i) { "vertical" === a.direction ? e.add(punchgs.TweenLite.set(i, { top: t * (h + parseInt(void 0 === a.space ? 0 : a.space, 0)), width: l + "px", height: h + "px" })) : "horizontal" === a.direction && e.add(punchgs.TweenLite.set(i, { left: t * (l + parseInt(void 0 === a.space ? 0 : a.space, 0)), width: l + "px", height: h + "px" })) }), e }, r = function (t) { var e = 0, i = 0, a = 0, n = 0, r = 1, s = 1, o = 1; return "detail" in t && (i = t.detail), "wheelDelta" in t && (i = -t.wheelDelta / 120), "wheelDeltaY" in t && (i = -t.wheelDeltaY / 120), "wheelDeltaX" in t && (e = -t.wheelDeltaX / 120), "axis" in t && t.axis === t.HORIZONTAL_AXIS && (e = i, i = 0), a = e * r, n = i * r, "deltaY" in t && (n = t.deltaY), "deltaX" in t && (a = t.deltaX), (a || n) && t.deltaMode && (1 == t.deltaMode ? (a *= s, n *= s) : (a *= o, n *= o)), a && !e && (e = 1 > a ? -1 : 1), n && !i && (i = 1 > n ? -1 : 1), n = navigator.userAgent.match(/mozilla/i) ? 10 * n : n, (n > 300 || -300 > n) && (n /= 10), { spinX: e, spinY: i, pixelX: a, pixelY: n } }, s = function (t, i) { "on" === i.navigation.keyboardNavigation && jQuery(document).keydown(function (a) { ("horizontal" == i.navigation.keyboard_direction && 39 == a.keyCode || "vertical" == i.navigation.keyboard_direction && 40 == a.keyCode) && (i.sc_indicator = "arrow", i.sc_indicator_dir = 0, e.callingNewSlide(i, t, 1)), ("horizontal" == i.navigation.keyboard_direction && 37 == a.keyCode || "vertical" == i.navigation.keyboard_direction && 38 == a.keyCode) && (i.sc_indicator = "arrow", i.sc_indicator_dir = 1, e.callingNewSlide(i, t, -1)) }) }, o = function (t, i) { if ("on" === i.navigation.mouseScrollNavigation || "carousel" === i.navigation.mouseScrollNavigation) { i.isIEEleven = !!navigator.userAgent.match(/Trident.*rv\:11\./), i.isSafari = !!navigator.userAgent.match(/safari/i), i.ischrome = !!navigator.userAgent.match(/chrome/i); var a = i.ischrome ? -49 : i.isIEEleven || i.isSafari ? -9 : navigator.userAgent.match(/mozilla/i) ? -29 : -49, n = i.ischrome ? 49 : i.isIEEleven || i.isSafari ? 9 : navigator.userAgent.match(/mozilla/i) ? 29 : 49; t.on("mousewheel DOMMouseScroll", function (s) { var o = r(s.originalEvent), d = t.find(".tp-revslider-slidesli.active-revslide").index(), l = t.find(".tp-revslider-slidesli.processing-revslide").index(), h = -1 != d && 0 == d || -1 != l && 0 == l ? !0 : !1, p = -1 != d && d == i.slideamount - 1 || 1 != l && l == i.slideamount - 1 ? !0 : !1, u = !0; "carousel" == i.navigation.mouseScrollNavigation && (h = p = !1), -1 == l ? o.pixelY < a ? (h || (i.sc_indicator = "arrow", "reverse" !== i.navigation.mouseScrollReverse && (i.sc_indicator_dir = 0, e.callingNewSlide(i, t, -1)), u = !1), p || (i.sc_indicator = "arrow", "reverse" === i.navigation.mouseScrollReverse && (i.sc_indicator_dir = 1, e.callingNewSlide(i, t, 1)), u = !1)) : o.pixelY > n && (p || (i.sc_indicator = "arrow", "reverse" !== i.navigation.mouseScrollReverse && (i.sc_indicator_dir = 1, e.callingNewSlide(i, t, 1)), u = !1), h || (i.sc_indicator = "arrow", "reverse" === i.navigation.mouseScrollReverse && (i.sc_indicator_dir = 0, e.callingNewSlide(i, t, -1)), u = !1)) : u = !1; var c = i.c.offset().top - jQuery("body").scrollTop(), g = c + i.c.height(); return "carousel" != i.navigation.mouseScrollNavigation ? ("reverse" !== i.navigation.mouseScrollReverse && (c > 0 && o.pixelY > 0 || g < jQuery(window).height() && o.pixelY < 0) && (u = !0), "reverse" === i.navigation.mouseScrollReverse && (0 > c && o.pixelY < 0 || g > jQuery(window).height() && o.pixelY > 0) && (u = !0)) : u = !1, 0 == u ? (s.preventDefault(s), !1) : void 0 }) } }, d = function (t, e, a) { return t = i ? jQuery(a.target).closest("." + t).length || jQuery(a.srcElement).closest("." + t).length : jQuery(a.toElement).closest("." + t).length || jQuery(a.originalTarget).closest("." + t).length, t === !0 || 1 === t ? 1 : 0 }, l = function (t, a, n) { t.data("opt", a); var r = a.carousel; jQuery(".bullet, .bullets, .tp-bullets, .tparrows").addClass("noSwipe"), r.Limit = "endless"; var s = (i || "Firefox" === e.get_browser(), t), o = "vertical" === a.navigation.thumbnails.direction || "vertical" === a.navigation.tabs.direction ? "none" : "vertical", l = a.navigation.touch.swipe_direction || "horizontal"; o = "swipebased" == n && "vertical" == l ? "none" : n ? "vertical" : o, jQuery.fn.swipetp || (jQuery.fn.swipetp = jQuery.fn.swipe), jQuery.fn.swipetp.defaults && jQuery.fn.swipetp.defaults.excludedElements || jQuery.fn.swipetp.defaults || (jQuery.fn.swipetp.defaults = new Object), jQuery.fn.swipetp.defaults.excludedElements = "label, button, input, select, textarea, .noSwipe", s.swipetp({ allowPageScroll: o, triggerOnTouchLeave: !0, treshold: a.navigation.touch.swipe_treshold, fingers: a.navigation.touch.swipe_min_touches, excludeElements: jQuery.fn.swipetp.defaults.excludedElements, swipeStatus: function (i, n, s, o, h, p, u) { var c = d("rev_slider_wrapper", t, i), g = d("tp-thumbs", t, i), v = d("tp-tabs", t, i), f = jQuery(this).attr("class"), m = f.match(/tp-tabs|tp-thumb/gi) ? !0 : !1; if ("carousel" === a.sliderType && (("move" === n || "end" === n || "cancel" == n) && a.dragStartedOverSlider && !a.dragStartedOverThumbs && !a.dragStartedOverTabs || "start" === n && c > 0 && 0 === g && 0 === v)) switch (a.dragStartedOverSlider = !0, o = s && s.match(/left|up/g) ? Math.round(-1 * o) : o = Math.round(1 * o), n) { case "start": void 0 !== r.positionanim && (r.positionanim.kill(), r.slide_globaloffset = "off" === r.infinity ? r.slide_offset : e.simp(r.slide_offset, r.maxwidth)), r.overpull = "none", r.wrap.addClass("dragged"); break; case "move": if (r.slide_offset = "off" === r.infinity ? r.slide_globaloffset + o : e.simp(r.slide_globaloffset + o, r.maxwidth), "off" === r.infinity) { var b = "center" === r.horizontal_align ? (r.wrapwidth / 2 - r.slide_width / 2 - r.slide_offset) / r.slide_width : (0 - r.slide_offset) / r.slide_width; "none" !== r.overpull && 0 !== r.overpull || !(0 > b || b > a.slideamount - 1) ? b >= 0 && b <= a.slideamount - 1 && (b >= 0 && o > r.overpull || b <= a.slideamount - 1 && o < r.overpull) && (r.overpull = 0) : r.overpull = o, r.slide_offset = 0 > b ? r.slide_offset + (r.overpull - o) / 1.1 + Math.sqrt(Math.abs((r.overpull - o) / 1.1)) : b > a.slideamount - 1 ? r.slide_offset + (r.overpull - o) / 1.1 - Math.sqrt(Math.abs((r.overpull - o) / 1.1)) : r.slide_offset } e.organiseCarousel(a, s, !0, !0); break; case "end": case "cancel": r.slide_globaloffset = r.slide_offset, r.wrap.removeClass("dragged"), e.carouselToEvalPosition(a, s), a.dragStartedOverSlider = !1, a.dragStartedOverThumbs = !1, a.dragStartedOverTabs = !1 } else { if (("move" !== n && "end" !== n && "cancel" != n || a.dragStartedOverSlider || !a.dragStartedOverThumbs && !a.dragStartedOverTabs) && !("start" === n && c > 0 && (g > 0 || v > 0))) { if ("end" == n && !m) { if (a.sc_indicator = "arrow", "horizontal" == l && "left" == s || "vertical" == l && "up" == s) return a.sc_indicator_dir = 0, e.callingNewSlide(a, a.c, 1), !1; if ("horizontal" == l && "right" == s || "vertical" == l && "down" == s) return a.sc_indicator_dir = 1, e.callingNewSlide(a, a.c, -1), !1 } return a.dragStartedOverSlider = !1, a.dragStartedOverThumbs = !1, a.dragStartedOverTabs = !1, !0 } g > 0 && (a.dragStartedOverThumbs = !0), v > 0 && (a.dragStartedOverTabs = !0); var w = a.dragStartedOverThumbs ? ".tp-thumbs" : ".tp-tabs", _ = a.dragStartedOverThumbs ? ".tp-thumb-mask" : ".tp-tab-mask", x = a.dragStartedOverThumbs ? ".tp-thumbs-inner-wrapper" : ".tp-tabs-inner-wrapper", y = a.dragStartedOverThumbs ? ".tp-thumb" : ".tp-tab", T = a.dragStartedOverThumbs ? a.navigation.thumbnails : a.navigation.tabs; o = s && s.match(/left|up/g) ? Math.round(-1 * o) : o = Math.round(1 * o); var S = t.parent().find(_), j = S.find(x), C = T.direction, L = "vertical" === C ? j.height() : j.width(), Q = "vertical" === C ? S.height() : S.width(), k = "vertical" === C ? S.find(y).first().outerHeight(!0) + T.space : S.find(y).first().outerWidth(!0) + T.space, I = void 0 === j.data("offset") ? 0 : parseInt(j.data("offset"), 0), O = 0; switch (n) { case "start": t.parent().find(w).addClass("dragged"), I = "vertical" === C ? j.position().top : j.position().left, j.data("offset", I), j.data("tmmove") && j.data("tmmove").pause(); break; case "move": if (Q >= L) return !1; O = I + o, O = O > 0 ? "horizontal" === C ? O - j.width() * (O / j.width() * O / j.width()) : O - j.height() * (O / j.height() * O / j.height()) : O; var H = "vertical" === C ? 0 - (j.height() - S.height()) : 0 - (j.width() - S.width()); O = H > O ? "horizontal" === C ? O + j.width() * (O - H) / j.width() * (O - H) / j.width() : O + j.height() * (O - H) / j.height() * (O - H) / j.height() : O, "vertical" === C ? punchgs.TweenLite.set(j, { top: O + "px" }) : punchgs.TweenLite.set(j, { left: O + "px" }); break; case "end": case "cancel": if (m) return O = I + o, O = "vertical" === C ? O < 0 - (j.height() - S.height()) ? 0 - (j.height() - S.height()) : O : O < 0 - (j.width() - S.width()) ? 0 - (j.width() - S.width()) : O, O = O > 0 ? 0 : O, O = Math.abs(o) > k / 10 ? 0 >= o ? Math.floor(O / k) * k : Math.ceil(O / k) * k : 0 > o ? Math.ceil(O / k) * k : Math.floor(O / k) * k, O = "vertical" === C ? O < 0 - (j.height() - S.height()) ? 0 - (j.height() - S.height()) : O : O < 0 - (j.width() - S.width()) ? 0 - (j.width() - S.width()) : O, O = O > 0 ? 0 : O, "vertical" === C ? punchgs.TweenLite.to(j, .5, { top: O + "px", ease: punchgs.Power3.easeOut }) : punchgs.TweenLite.to(j, .5, { left: O + "px", ease: punchgs.Power3.easeOut }), O = O ? O : "vertical" === C ? j.position().top : j.position().left, j.data("offset", O), j.data("distance", o), setTimeout(function () { a.dragStartedOverSlider = !1, a.dragStartedOverThumbs = !1, a.dragStartedOverTabs = !1 }, 100), t.parent().find(w).removeClass("dragged"), !1 } } } }) }, h = function (t) { t.hide_delay = jQuery.isNumeric(parseInt(t.hide_delay, 0)) ? t.hide_delay / 1e3 : .2, t.hide_delay_mobile = jQuery.isNumeric(parseInt(t.hide_delay_mobile, 0)) ? t.hide_delay_mobile / 1e3 : .2 }, p = function (t) { return t && t.enable }, u = function (t) { return t && t.enable && t.hide_onleave === !0 && (void 0 === t.position ? !0 : !t.position.match(/outer/g)) }, c = function (t, e) { var a = t.parent(); u(e.navigation.arrows) && punchgs.TweenLite.delayedCall(i ? e.navigation.arrows.hide_delay_mobile : e.navigation.arrows.hide_delay, g, [a.find(".tparrows"), e.navigation.arrows, "hide"]), u(e.navigation.bullets) && punchgs.TweenLite.delayedCall(i ? e.navigation.bullets.hide_delay_mobile : e.navigation.bullets.hide_delay, g, [a.find(".tp-bullets"), e.navigation.bullets, "hide"]), u(e.navigation.thumbnails) && punchgs.TweenLite.delayedCall(i ? e.navigation.thumbnails.hide_delay_mobile : e.navigation.thumbnails.hide_delay, g, [a.find(".tp-thumbs"), e.navigation.thumbnails, "hide"]), u(e.navigation.tabs) && punchgs.TweenLite.delayedCall(i ? e.navigation.tabs.hide_delay_mobile : e.navigation.tabs.hide_delay, g, [a.find(".tp-tabs"), e.navigation.tabs, "hide"]) }, g = function (t, e, i, a) { switch (a = void 0 === a ? .5 : a, i) { case "show": punchgs.TweenLite.to(t, a, { autoAlpha: 1, ease: punchgs.Power3.easeInOut, overwrite: "auto" }); break; case "hide": punchgs.TweenLite.to(t, a, { autoAlpha: 0, ease: punchgs.Power3.easeInOu, overwrite: "auto" }) } }, v = function (t, e, i) { e.style = void 0 === e.style ? "" : e.style, e.left.style = void 0 === e.left.style ? "" : e.left.style, e.right.style = void 0 === e.right.style ? "" : e.right.style, 0 === t.find(".tp-leftarrow.tparrows").length && t.append('<div class="tp-leftarrow tparrows ' + e.style + " " + e.left.style + '">' + e.tmp + "</div>"), 0 === t.find(".tp-rightarrow.tparrows").length && t.append('<div class="tp-rightarrow tparrows ' + e.style + " " + e.right.style + '">' + e.tmp + "</div>"); var a = t.find(".tp-leftarrow.tparrows"), n = t.find(".tp-rightarrow.tparrows"); e.rtl ? (a.click(function () { i.sc_indicator = "arrow", i.sc_indicator_dir = 0, t.revnext() }), n.click(function () { i.sc_indicator = "arrow", i.sc_indicator_dir = 1, t.revprev() })) : (n.click(function () { i.sc_indicator = "arrow", i.sc_indicator_dir = 0, t.revnext() }), a.click(function () { i.sc_indicator = "arrow", i.sc_indicator_dir = 1, t.revprev() })), e.right.j = t.find(".tp-rightarrow.tparrows"), e.left.j = t.find(".tp-leftarrow.tparrows"), e.padding_top = parseInt(i.carousel.padding_top || 0, 0), e.padding_bottom = parseInt(i.carousel.padding_bottom || 0, 0), b(a, e.left, i), b(n, e.right, i), e.left.opt = i, e.right.opt = i, ("outer-left" == e.position || "outer-right" == e.position) && (i.outernav = !0) }, f = function (t, e, i) { var a = t.outerHeight(!0), n = (t.outerWidth(!0), void 0 == e.opt ? 0 : 0 == i.conh ? i.height : i.conh), r = "layergrid" == e.container ? "fullscreen" == i.sliderLayout ? i.height / 2 - i.gridheight[i.curWinRange] * i.bh / 2 : "on" == i.autoHeight || void 0 != i.minHeight && i.minHeight > 0 ? n / 2 - i.gridheight[i.curWinRange] * i.bh / 2 : 0 : 0, s = "top" === e.v_align ? { top: "0px", y: Math.round(e.v_offset + r) + "px" } : "center" === e.v_align ? { top: "50%", y: Math.round(0 - a / 2 + e.v_offset) + "px" } : { top: "100%", y: Math.round(0 - (a + e.v_offset + r)) + "px" }; t.hasClass("outer-bottom") || punchgs.TweenLite.set(t, s) }, m = function (t, e, i) { var a = (t.outerHeight(!0), t.outerWidth(!0)), n = "layergrid" == e.container ? "carousel" === i.sliderType ? 0 : i.width / 2 - i.gridwidth[i.curWinRange] * i.bw / 2 : 0, r = "left" === e.h_align ? { left: "0px", x: Math.round(e.h_offset + n) + "px" } : "center" === e.h_align ? { left: "50%", x: Math.round(0 - a / 2 + e.h_offset) + "px" } : { left: "100%", x: Math.round(0 - (a + e.h_offset + n)) + "px" }; punchgs.TweenLite.set(t, r) }, b = function (t, e, i) { var a = t.closest(".tp-simpleresponsive").length > 0 ? t.closest(".tp-simpleresponsive") : t.closest(".tp-revslider-mainul").length > 0 ? t.closest(".tp-revslider-mainul") : t.closest(".rev_slider_wrapper").length > 0 ? t.closest(".rev_slider_wrapper") : t.parent().find(".tp-revslider-mainul"), n = a.width(), r = a.height(); if (f(t, e, i), m(t, e, i), "outer-left" !== e.position || "fullwidth" != e.sliderLayout && "fullscreen" != e.sliderLayout ? "outer-right" !== e.position || "fullwidth" != e.sliderLayout && "fullscreen" != e.sliderLayout || punchgs.TweenLite.set(t, { right: 0 - t.outerWidth() + "px", x: e.h_offset + "px" }) : punchgs.TweenLite.set(t, { left: 0 - t.outerWidth() + "px", x: e.h_offset + "px" }), t.hasClass("tp-thumbs") || t.hasClass("tp-tabs")) { var s = t.data("wr_padding"), o = t.data("maxw"), d = t.data("maxh"), l = t.hasClass("tp-thumbs") ? t.find(".tp-thumb-mask") : t.find(".tp-tab-mask"), h = parseInt(e.padding_top || 0, 0), p = parseInt(e.padding_bottom || 0, 0); o > n && "outer-left" !== e.position && "outer-right" !== e.position ? (punchgs.TweenLite.set(t, { left: "0px", x: 0, maxWidth: n - 2 * s + "px" }), punchgs.TweenLite.set(l, { maxWidth: n - 2 * s + "px" })) : (punchgs.TweenLite.set(t, { maxWidth: o + "px" }), punchgs.TweenLite.set(l, { maxWidth: o + "px" })), d + 2 * s > r && "outer-bottom" !== e.position && "outer-top" !== e.position ? (punchgs.TweenLite.set(t, { top: "0px", y: 0, maxHeight: h + p + (r - 2 * s) + "px" }), punchgs.TweenLite.set(l, { maxHeight: h + p + (r - 2 * s) + "px" })) : (punchgs.TweenLite.set(t, { maxHeight: d + "px" }), punchgs.TweenLite.set(l, { maxHeight: d + "px" })), "outer-left" !== e.position && "outer-right" !== e.position && (h = 0, p = 0), e.span === !0 && "vertical" === e.direction ? (punchgs.TweenLite.set(t, { maxHeight: h + p + (r - 2 * s) + "px", height: h + p + (r - 2 * s) + "px", top: 0 - h, y: 0 }), f(l, e, i)) : e.span === !0 && "horizontal" === e.direction && (punchgs.TweenLite.set(t, { maxWidth: "100%", width: n - 2 * s + "px", left: 0, x: 0 }), m(l, e, i)) } }, w = function (t, e, i, a) { 0 === t.find(".tp-bullets").length && (e.style = void 0 === e.style ? "" : e.style, t.append('<div class="tp-bullets ' + e.style + " " + e.direction + '"></div>')); var n = t.find(".tp-bullets"), r = i.data("index"), s = e.tmp; jQuery.each(a.thumbs[i.index()].params, function (t, e) { s = s.replace(e.from, e.to) }), n.append('<div class="justaddedbullet tp-bullet">' + s + "</div>"); var o = t.find(".justaddedbullet"), d = t.find(".tp-bullet").length, l = o.outerWidth() + parseInt(void 0 === e.space ? 0 : e.space, 0), h = o.outerHeight() + parseInt(void 0 === e.space ? 0 : e.space, 0); "vertical" === e.direction ? (o.css({ top: (d - 1) * h + "px", left: "0px" }), n.css({ height: (d - 1) * h + o.outerHeight(), width: o.outerWidth() })) : (o.css({ left: (d - 1) * l + "px", top: "0px" }), n.css({ width: (d - 1) * l + o.outerWidth(), height: o.outerHeight() })), o.find(".tp-bullet-image").css({ backgroundImage: "url(" + a.thumbs[i.index()].src + ")" }), o.data("liref", r), o.click(function () { a.sc_indicator = "bullet", t.revcallslidewithid(r), t.find(".tp-bullet").removeClass("selected"), jQuery(this).addClass("selected") }), o.removeClass("justaddedbullet"), e.padding_top = parseInt(a.carousel.padding_top || 0, 0), e.padding_bottom = parseInt(a.carousel.padding_bottom || 0, 0), e.opt = a, ("outer-left" == e.position || "outer-right" == e.position) && (a.outernav = !0), n.addClass("nav-pos-hor-" + e.h_align), n.addClass("nav-pos-ver-" + e.v_align), n.addClass("nav-dir-" + e.direction), b(n, e, a) }, _ = function (t, e) { e = parseFloat(e), t = t.replace("#", ""); var i = parseInt(t.substring(0, 2), 16), a = parseInt(t.substring(2, 4), 16), n = parseInt(t.substring(4, 6), 16), r = "rgba(" + i + "," + a + "," + n + "," + e + ")"; return r }, x = function (t, e, i, a, n) { var r = "tp-thumb" === a ? ".tp-thumbs" : ".tp-tabs", s = "tp-thumb" === a ? ".tp-thumb-mask" : ".tp-tab-mask", o = "tp-thumb" === a ? ".tp-thumbs-inner-wrapper" : ".tp-tabs-inner-wrapper", d = "tp-thumb" === a ? ".tp-thumb" : ".tp-tab", l = "tp-thumb" === a ? ".tp-thumb-image" : ".tp-tab-image"; if (e.visibleAmount = e.visibleAmount > n.slideamount ? n.slideamount : e.visibleAmount, e.sliderLayout = n.sliderLayout, 0 === t.parent().find(r).length) { e.style = void 0 === e.style ? "" : e.style; var h = e.span === !0 ? "tp-span-wrapper" : "", p = '<div class="' + a + "s " + h + " " + e.position + " " + e.style + '"><div class="' + a + '-mask"><div class="' + a + 's-inner-wrapper" style="position:relative;"></div></div></div>'; "outer-top" === e.position ? t.parent().prepend(p) : "outer-bottom" === e.position ? t.after(p) : t.append(p), e.padding_top = parseInt(n.carousel.padding_top || 0, 0), e.padding_bottom = parseInt(n.carousel.padding_bottom || 0, 0), ("outer-left" == e.position || "outer-right" == e.position) && (n.outernav = !0) } var u = i.data("index"), c = t.parent().find(r), g = c.find(s), v = g.find(o), f = "horizontal" === e.direction ? e.width * e.visibleAmount + e.space * (e.visibleAmount - 1) : e.width, m = "horizontal" === e.direction ? e.height : e.height * e.visibleAmount + e.space * (e.visibleAmount - 1), w = e.tmp; jQuery.each(n.thumbs[i.index()].params, function (t, e) { w = w.replace(e.from, e.to) }), v.append('<div data-liindex="' + i.index() + '" data-liref="' + u + '" class="justaddedthumb ' + a + '" style="width:' + e.width + "px;height:" + e.height + 'px;">' + w + "</div>"); var x = c.find(".justaddedthumb"), y = c.find(d).length, T = x.outerWidth() + parseInt(void 0 === e.space ? 0 : e.space, 0), S = x.outerHeight() + parseInt(void 0 === e.space ? 0 : e.space, 0); x.find(l).css({ backgroundImage: "url(" + n.thumbs[i.index()].src + ")" }), "vertical" === e.direction ? (x.css({ top: (y - 1) * S + "px", left: "0px" }), v.css({ height: (y - 1) * S + x.outerHeight(), width: x.outerWidth() })) : (x.css({ left: (y - 1) * T + "px", top: "0px" }), v.css({ width: (y - 1) * T + x.outerWidth(), height: x.outerHeight() })), c.data("maxw", f), c.data("maxh", m), c.data("wr_padding", e.wrapper_padding); var j = "outer-top" === e.position || "outer-bottom" === e.position ? "relative" : "absolute"; "outer-top" !== e.position && "outer-bottom" !== e.position || "center" !== e.h_align ? "0" : "auto"; g.css({ maxWidth: f + "px", maxHeight: m + "px", overflow: "hidden", position: "relative" }), c.css({ maxWidth: f + "px", maxHeight: m + "px", overflow: "visible", position: j, background: _(e.wrapper_color, e.wrapper_opacity), padding: e.wrapper_padding + "px", boxSizing: "contet-box" }), x.click(function () { n.sc_indicator = "bullet"; var e = t.parent().find(o).data("distance"); e = void 0 === e ? 0 : e, Math.abs(e) < 10 && (t.revcallslidewithid(u), t.parent().find(r).removeClass("selected"), jQuery(this).addClass("selected")) }), x.removeClass("justaddedthumb"), e.opt = n, c.addClass("nav-pos-hor-" + e.h_align), c.addClass("nav-pos-ver-" + e.v_align), c.addClass("nav-dir-" + e.direction), b(c, e, n) }, y = function (t) { var e = t.c.parent().find(".outer-top"), i = t.c.parent().find(".outer-bottom"); t.top_outer = e.hasClass("tp-forcenotvisible") ? 0 : e.outerHeight() || 0, t.bottom_outer = i.hasClass("tp-forcenotvisible") ? 0 : i.outerHeight() || 0 }, T = function (t, e, i, a) { e > i || i > a ? t.addClass("tp-forcenotvisible") : t.removeClass("tp-forcenotvisible") } }(jQuery);
