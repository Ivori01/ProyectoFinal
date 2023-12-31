"file:" != location.protocol || window.jQuery && window.bootstrap || alert("jQuery, Bootstrap and other libraries are not available!\n\nPlease run `npm install` to install them first."),
    function(u) {
        u(document).on("click", 'a[href="#"]', function(e) {
            e.preventDefault()
        }), u(".sidebar .badge[title]").tooltip({
            template: '<div class="tooltip" role="tooltip"><div class="arrow brc-danger"></div><div class="bgc-danger tooltip-inner font-bolder p-2"></div></div>',
            placement: "right",
            boundary: "viewport"
        }), u(".sidebar:not(.sidebar-h) .btn[title]").tooltip({
            template: '<div class="tooltip" role="tooltip"><div class="arrow brc-default"></div><div class="bgc-default tooltip-inner text-110 font-bolder p-2"></div></div>',
            placement: "top",
            boundary: "viewport"
        }), u(".sidebar.sidebar-h .btn[title]").tooltip({
            template: '<div class="tooltip" role="tooltip"><div class="arrow brc-dark"></div><div class="bgc-dark tooltip-inner text-110 font-bolder p-2"></div></div>',
            placement: "bottom",
            boundary: "viewport"
        }), u(".card").on("reload.ace.widget", function() {
            var e = this;
            setTimeout(function() {
                u(e).aceWidget("stopLoading")
            }, 500 + parseInt(500 * Math.random()))
        }), u(document).on("expanded.ace.sidebar", ".sidebar.hoverable", function(e) {
            u(this).aceSidebar("disableSubmenuPullup")
        }).on("collapsed.ace.sidebar", ".sidebar.hoverable", function(e) {
            u(this).aceSidebar("enableSubmenuPullup")
        });
        var a = "lightblue",
            r = "dark",
            n = "steelblue",
            s = "lightblue",
            l = "only-content",
            o = "auto";
        u("input[name=zoom-level]").on("change", function() {
            t(this.value)
        }), u("input[name=sidebar-theme]").on("change", function() {
            ! function(e) {
                y();
                e = e || "default";
                switch (u("#id-sidebar-themes-light , #id-sidebar-themes-dark").addClass("d-none"), e) {
                    case "light":
                        u("#id-sidebar-themes-light").removeClass("d-none");
                        break;
                    case "dark":
                        u("#id-sidebar-themes-dark").removeClass("d-none")
                }
                g(e)
            }(this.value)
        }), u("input[name=sidebar-dark]").on("change", function() {
            r = this.value, g(this.value)
        }), u("input[name=sidebar-light]").on("change", function() {
            a = this.value, g(this.value)
        }), u("#id-dropdown-select-light-theme").on("click", function() {
            u(this).button("toggle")
        }), u("input[name=sidebar-collapsed]").on("change", function() {
            var e = u(".sidebar");
            e.removeClass("expandable hoverable hideable").addClass(this.value), "hoverable" == this.value && e.is(".sidebar-fixed.collapsed") ? e.aceSidebar("enableSubmenuPullup") : e.aceSidebar("disableSubmenuPullup")
        }), u("input[name=navbar-theme]").on("change", function() {
            ! function(e) {
                y();
                e = e || "default";
                switch (u("#id-navbar-themes-light , #id-navbar-themes-dark").addClass("d-none"), e) {
                    case "light":
                        u("#id-navbar-themes-light").removeClass("d-none");
                        break;
                    case "dark":
                        u("#id-navbar-themes-dark").removeClass("d-none")
                }
                c(e)
            }(this.value)
        }), u("input[name=navbar-dark]").on("change", function() {
            n = this.value, c(this.value)
        }), u("input[name=navbar-light]").on("change", function() {
            s = this.value, c(this.value)
        }), u("input[name=body-theme]").on("change", function() {
            ! function(e) {
                y(), o = e = e || "auto";
                var t = u("body");
                if (t.removeClass(function(e, t) {
                        return (t.match(/(^|\s)body-\S+/g) || []).join("")
                    }).css("background-image", ""), "auto" != this.value) t.addClass("body-" + e), "img1" == e ? t.css("background-image", "url('assets/image/body-bg-1.jpg')") : "img2" == e && t.css("background-image", "url('assets/image/body-bg-2.jpg')")
            }(this.value)
        }), u("#id-navbar-fixed").on("change", function() {
            document.querySelector(".navbar").classList.toggle("navbar-fixed", this.checked)
        }), u("#id-sidebar-fixed").on("change", function() {
            document.querySelector(".sidebar").classList.toggle("sidebar-fixed", this.checked)
        }), u("#id-footer-fixed").on("change", function() {
            var e = this.checked;
            u(".footer").each(function() {
                this.classList.toggle("footer-fixed", e)
            })
        }), u("#id-push-content").on("change", function() {
            document.querySelector(".sidebar").classList.toggle("sidebar-push", this.checked)
        }), u("#id-sidebar-hover").on("change", function() {
            var e = document.querySelector("#sidebar");
            e.classList.toggle("sidebar-hover", this.checked), this.checked ? u(e).aceSidebar("enableSubmenuPullup").find(".nav-item.open").removeClass("open").find(".submenu.show").removeClass("show") : u(e).aceSidebar("disableSubmenuPullup")
        }), u("input[name=boxed-layout]").on("change", function() {
            ! function e(t) {
                t = t || "none";
                l = t;
                if ("none" == t) u(".body-container, .navbar-inner, .page-content").removeClass("container container-plus"), u(".navbar-inner > .container").contents().unwrap();
                else if ("all" == t) u(".page-content").removeClass("container container-plus"), u(".body-container, .navbar-inner").addClass("container container-plus"), window.isAceLayout2 ? 0 == u(".navbar-inner > .container").length && u(".navbar-inner").wrapInner('<div class="container container-plus" />') : u(".navbar-inner > .container").contents().unwrap();
                else if ("not-navbar" == t) {
                    if (window.isAceLayout2) return;
                    u(".navbar-inner, .page-content").removeClass("container container-plus"), u(".body-container").addClass("container container-plus"), u(".navbar-inner").wrapInner('<div class="container container-plus" />')
                } else "only-content" == t && (e("none"), u(".page-content").addClass("container"));
                "all" == t || "not-navbar" == t ? u("#id-body-bg").collapse("show") : u("#id-body-bg").collapse("hide")
            }(this.value)
        }), u("#id-rtl").on("change", function() {
            ! function(e) {
                e ? (u("html").addClass("rtl").attr("dir", "rtl"), u('link[rel=stylesheet][href*="/bootstrap.css"],link[rel=stylesheet][href*="/bootstrap.min.css"],link[rel=stylesheet][href*="/ace.css"],link[rel=stylesheet][href*="/ace.min.css"],link[rel=stylesheet][href*="/ace-themes.css"],link[rel=stylesheet][href*="/ace-themes.min.css"]').each(function() {
                    var t = u(this).attr("data-rtl") || u(this).attr("href").replace(/\/([^\/]+)$/, "/rtl/$1"),
                        a = this;
                    try {
                        x(t, "Loading RTL stylesheets ... please wait ...").then(function() {
                            u(a).attr("href", t)
                        })
                    } catch (e) {
                        u(a).attr("href", t)
                    }
                }), u(document).on("shown.bs.popover.rtl", function(e, t) {
                    u(".bs-popover-right, .bs-popover-left").each(function() {
                        "right" == (0 <= this.className.indexOf("-right") ? "right" : "left") ? (this.setAttribute("x-placement", "left"), this.className = this.className.replace("-right", "-left")) : (this.setAttribute("x-placement", "right"), this.className = this.className.replace("-left", "-right"))
                    })
                })) : (u("html").removeClass("rtl").attr("dir", "ltr"), u('link[rel=stylesheet][href*="/bootstrap.css"], link[rel=stylesheet][href*="/bootstrap.min.css"]').attr("href", f), u('link[rel=stylesheet][href*="/ace.css"],link[rel=stylesheet][href*="/ace.min.css"],link[rel=stylesheet][href*="/ace-themes.css"],link[rel=stylesheet][href*="/ace-themes.min.css"]').each(function() {
                    u(this).attr("href", u(this).attr("href").replace(/\/rtl\/([^\/]+)$/, "/$1"))
                }), u(document).off("shown.bs.popover.rtl"));
                u('.fa[class*="-right"],.fa[class*="-left"]').each(function() {
                    this.className = this.className.replace("-right", "-temp111"), this.className = this.className.replace("-left", "-right"), this.className = this.className.replace("-temp111", "-left")
                }), u('[data-placement="right"],[data-placement="left]').each(function() {
                    var e = this.getAttribute("data-placement");
                    this.setAttribute("data-placement", "right" == e ? "left" : "right")
                })
            }(this.checked)
        }), u("#id-change-font").on("change", function() {
            ! function(e) {
                if (!e || 0 == e.length) return;
                if (u("body,html").removeClass(function(e, t) {
                        return (t.match(/(^|\s)(font-)\S*/g) || []).join("")
                    }), "open-sans" == e) return;
                var t = {
                    lato: {
                        name: "Lato",
                        url: "https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap",
                        rules: "body.font-lato { font-family: 'Lato'; }"
                    },
                    montserrat: {
                        name: "Montserrat",
                        url: "https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap",
                        rules: "body.font-montserrat { font-family: 'Montserrat'; }"
                    },
                    "noto-sans": {
                        name: "Noto Sans",
                        url: "https://fonts.googleapis.com/css?family=Noto+Sans:400,700&display=swap",
                        rules: "body.font-noto-sans { font-family: 'Noto Sans'; }"
                    },
                    poppins: {
                        name: "Poppins",
                        url: "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap",
                        rules: "body.font-poppins { font-family: 'Poppins'; }"
                    },
                    raleway: {
                        name: "Raleway",
                        url: "https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&display=swap",
                        rules: "body.font-raleway { font-family: 'Raleway'; font-weight: 500; } .font-raleway .text-300, .font-raleway .font-light {font-weight: 400 !important;} .font-raleway .page-title {font-weight: 400 !important;}"
                    },
                    roboto: {
                        name: "Roboto",
                        url: "https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap",
                        rules: "body.font-roboto { font-family: 'Roboto'; }"
                    },
                    markazi: {
                        name: "Markazi Text",
                        url: "https://fonts.googleapis.com/css?family=Markazi+Text:400,500,600,700&display=swap&subset=arabic",
                        rules: "body.font-markazi { font-family: 'Markazi Text'; } html.font-markazi {font-size: 18px;}"
                    }
                };
                if (!t[e]) return;
                if (!w[e]) {
                    var a = t[e],
                        r = document.createElement("link");
                    r.setAttribute("rel", "stylesheet"), r.setAttribute("type", "text/css"), r.setAttribute("href", a.url), document.head.appendChild(r);
                    var n = document.createElement("style");
                    n.innerHTML = a.rules, document.head.appendChild(n), w[e] = !0
                }
                u("body,html").addClass("font-" + e)
            }(this.value)
        });
        var e = document.createElement("style");
        e.innerHTML = ".flex-equal-sm > * {flex: 0 1 1% !important;}\t\t\t\t\t\t @media (hover: hover) { #id-ace-settings-modal:not(.show) .aside-header > .btn:hover > .fa { animation: 0.6s fa-spin ease-in-out; }}\t\t\t\t\t\t @media screen and (prefers-reduced-motion: reduce) { #id-ace-settings-modal:not(.show) .aside-header > .btn:hover > .fa { animation: none; } }", document.head.appendChild(e);
        var t = function(e) {
            if ("none" == (e = e || "none")) u("html").css("font-size", "");
            else {
                u("html").css("font-size", {
                    90: "0.925rem",
                    110: "1.0625rem",
                    120: "1.125rem"
                }[e])
            }
        };

        function g(e) {
            var t = u(".sidebar");
            switch (! function(e) {
                e.removeClass(function(e, t) {
                    var a = t.match(/(^|\s)sidebar-\S+/g);
                    return ((a = a && a.filter(function(e) {
                        return !/sidebar-fixed|sidebar-visible|sidebar-backdrop|sidebar-top|sidebar-h|sidebar-push/.test(e)
                    })) || []).join("")
                }).find(".sidebar-inner").attr("class", "sidebar-inner"), e.find(".nav").removeClass("has-active-border active-on-top active-on-right has-active-arrow"), "auto" == o && u("body").removeClass(function(e, t) {
                    return (t.match(/(^|\s)body-\S+/g) || []).join("")
                });
                e.find(".sidebar-shortcuts-mini").parent().find(".btn").removeClass(function(e, t) {
                    var a = t.match(/(^|\s)(btn-|radius-|border-|brc-|text-)\S+/g);
                    return ((a = a && a.filter(function(e) {
                        return !/btn-sm|btn-smd/.test(e)
                    })) || []).join("")
                }), e.find(".fa-exclamation-triangle, .fa.fa-search , .fa.fa-microphone").removeClass(function(e, t) {
                    return (t.match(/(^|\s)(text-(\D)|opacity-)\S+/g) || []).join("")
                }).end().find(".badge").removeClass(function(e, t) {
                    return (t.match(/(^|\s)(border-|badge-|bgc-|text-(\D))\S+/g) || []).join("")
                }), window.isAceLayout3 || u("#sidebar-footer-bg").removeClass(function(e, t) {
                    return (t.match(/(^|\s)(bgc-|brc-)\S+/g) || []).join("")
                });
                window.isAceLayout2 && e.find(".navbar-brand, .navbar-brand span:last, .fa-leaf, img, #id-user-info a, #id-user-info div").removeClass(function(e, t) {
                    return (t.match(/(^|\s)(bgc-|brc-|text-|opacity-)\S+/g) || []).join("")
                })
            }(t), e) {
                case "light":
                    i(t, a);
                    break;
                case "dark":
                    i(t, r);
                    break;
                default:
                    i(t, e)
            }
        }
        var b = {
            default: {
                sidebar: "sidebar-default",
                nav: " has-active-border",
                navbar: "default",
                exclamation: "text-danger-m3",
                badge: "badge-primary badge-sm",
                "search-icon": "text-info",
                "mic-icon": "text-muted",
                brand: "text-140 text-grey",
                "brand-icon": "text-success",
                "user-img": "brc-primary-tp2",
                "user-info": "text-blue text-center",
                "user-desc": "text-muted text-80",
                footer: "bgc-white brc-primary-m3",
                "layout2-sidebar-header": "brc-secondary-l1",
                "layout2-sidebar-footer": "sidebar-default brc-grey-l1"
            }
        };
        b.lightblue = jQuery.extend({}, b.default, {
            sidebar: "sidebar-lightblue sidebar-spaced",
            nav: "",
            "layout2-sidebar-header": "brc-default-m4",
            "layout2-sidebar-footer": "sidebar-lightblue brc-default-m4"
        }), b.lightblue2 = jQuery.extend({}, b.default, {
            sidebar: "sidebar-lightblue2 sidebar-spaced",
            nav: "",
            "layout2-sidebar-header": "brc-default-m4",
            "layout2-sidebar-footer": "sidebar-lightblue2 brc-default-m4"
        }), b.lightpurple = jQuery.extend({}, b.default, {
            navbar: "purple",
            sidebar: "sidebar-lightpurple sidebar-spaced",
            nav: "",
            shortcuts: ["btn btn-light-purple btn-bgc-white btn-h-success border-2 radius-round btn-text-success", "btn btn-light-purple btn-bgc-white btn-h-purple border-2 radius-round btn-text-purple", "btn btn-light-purple btn-bgc-white btn-h-info border-2 radius-round btn-text-info", "btn btn-light-purple btn-bgc-white btn-h-warning border-2 radius-round btn-text-warning"],
            brand: "text-140 text-dark-tp3",
            "brand-icon": "text-success",
            "user-img": "brc-purple-tp2",
            "user-info": "text-purple light-1 text-center",
            "user-desc": "text-muted text-80",
            "layout2-sidebar-header": "brc-purple-l1",
            "layout2-sidebar-footer": "sidebar-lightpurple brc-purple-l1"
        }), b.white = jQuery.extend({}, b.default, {
            sidebar: "sidebar-white",
            "sidebar-inner": "shadow-sm",
            "layout2-sidebar-header": "brc-secondary-l1",
            "layout2-sidebar-footer": "brc-secondary-l1"
        }), b.white2 = jQuery.extend({}, b.default, {
            navbar: "white",
            sidebar: "sidebar-white2",
            nav: "has-active-border active-on-right active-on-top",
            "layout2-sidebar-header": "brc-secondary-l1",
            "layout2-sidebar-footer": "brc-secondary-l1"
        }), b.white3 = jQuery.extend({}, b.default, {
            navbar: "lightblue",
            sidebar: "sidebar-white3",
            "sidebar-inner": "shadow-sm",
            nav: "has-active-border active-on-right",
            shortcuts: ["btn btn-outline-success border-b-2 radius-round", "btn btn-outline-info border-b-2 radius-round", "btn btn-outline-warning border-b-2 radius-round", "btn btn-outline-danger border-b-2 radius-round"],
            "layout2-sidebar-header": "brc-secondary-l1",
            "layout2-sidebar-footer": "brc-secondary-l1"
        }), b.light = jQuery.extend({}, b.default, {
            sidebar: "sidebar-light",
            nav: "has-active-border active-on-right",
            "layout2-sidebar-header": "brc-secondary-m4",
            "layout2-sidebar-footer": "sidebar-light brc-secondary-m4"
        }), b.dark = jQuery.extend({}, b.default, {
            body: "body-darkblue3",
            navbar: "steelblue",
            sidebar: "sidebar-color sidebar-dark",
            nav: " has-active-border active-on-top has-active-arrow",
            "search-icon": "text-info-l2",
            "mic-icon": "text-brown-l3 opacity-1",
            brand: "text-white-tp1 text-140",
            "brand-icon": "text-success-l3",
            "user-img": "brc-secondary-m4",
            "user-info": "text-blue2-l3 text-center",
            "user-desc": "text-white-tp1 text-80",
            footer: "bgc-white brc-transparent",
            "layout2-sidebar-header": "brc-white-tp9",
            "layout2-sidebar-footer": "brc-white-tp10"
        }), b.steelblue = {
            body: "body-darkblue",
            navbar: "lightblue",
            sidebar: "sidebar-color sidebar-steelblue",
            nav: " has-active-border active-on-top has-active-arrow",
            shortcuts: "btn-outline-info border-2 text-white radius-2",
            exclamation: "text-danger-l3",
            badge: "bgc-primary text-white-tp1 badge-sm border-1 brc-white-tp2",
            "search-icon": "text-orange-l2",
            "mic-icon": "text-white-tp3",
            brand: "text-white-tp1 text-140",
            "brand-icon": "text-success-l3",
            "user-img": "brc-white-tp3",
            "user-info": "text-white-tp1 text-center",
            "user-desc": "text-white-tp2 text-80",
            footer: "bgc-white brc-transparent",
            "layout2-sidebar-header": "brc-white-tp9",
            "layout2-sidebar-footer": "brc-white-tp10"
        }, b.green = jQuery.extend({}, b.steelblue, {
            body: "body-darkgreen",
            navbar: "darkseagreen",
            sidebar: "sidebar-color sidebar-green",
            shortcuts: "btn-outline-yellow border-2 btn-text-white radius-round",
            badge: "border-0 bgc-white text-dark-tp1",
            "search-icon": "text-white-tp2"
        }), b.blue = jQuery.extend({}, b.steelblue, {
            body: "body-darkblue",
            sidebar: "sidebar-color sidebar-blue",
            nav: " has-active-border has-active-arrow",
            navbar: "orange",
            exclamation: "text-orange-l2",
            badge: "border-1 badge-warning brc-white-tp3"
        }), b.teal = jQuery.extend({}, b.green, {
            body: "body-darkslategrey",
            navbar: "mediumseagreen",
            sidebar: "sidebar-color sidebar-teal"
        }), b.plum = jQuery.extend({}, b.steelblue, {
            body: "body-lightplum",
            navbar: "lightpurple",
            sidebar: "sidebar-color sidebar-plum",
            shortcuts: "btn-outline-purple border-2 text-white radius-2",
            "search-icon": "text-orange-l2 opacity-2"
        }), b.purple = jQuery.extend({}, b.plum, {
            body: "body-img1",
            navbar: "burlywood",
            sidebar: "sidebar-color sidebar-purple",
            shortcuts: "opacity-1 btn text-white btn-outline-success border-2 radius-round",
            exclamation: "text-yellow-m2",
            badge: "badge-success badge-sm border-1 brc-white-tp2",
            "search-icon": "text-white-tp2",
            "mic-icon": "text-white-tp3"
        }), b.darkblue = jQuery.extend({}, b.steelblue, {
            body: "body-lightblue",
            navbar: "skyblue",
            sidebar: "sidebar-color sidebar-darkblue",
            nav: " has-active-border has-active-arrow",
            exclamation: "text-danger-l1"
        }), b.darkslategrey = jQuery.extend({}, b.steelblue, {
            body: "body-darkslategrey",
            navbar: "lightgrey",
            sidebar: "sidebar-color sidebar-darkslategrey",
            shortcuts: "btn-outline-warning btn-text-white border-2 radius-2",
            exclamation: "text-orange-l2"
        }), b.darkslateblue = jQuery.extend({}, b.steelblue, {
            body: "body-img1",
            navbar: "lightpurple",
            sidebar: "sidebar-color sidebar-darkslateblue",
            nav: "has-active-border active-on-right",
            shortcuts: "btn-purple btn-h-warning border-2 radius-2",
            "search-icon": "text-white-tp3",
            badge: "bgc-yellow-d1 text-dark-tp2 badge-sm border-1 brc-white-tp2"
        }), b.cadetblue = jQuery.extend({}, b.steelblue, {
            body: "body-darkslategrey",
            navbar: "lightgrey",
            sidebar: "sidebar-color sidebar-cadetblue",
            shortcuts: "btn-bgc-white btn-h-outline-success btn-text-success btn-h-text-white border-2 radius-2",
            badge: "bgc-yellow-d1 text-dark-tp2 badge-sm border-1 brc-white-tp2"
        }), b.darkcrimson = jQuery.extend({}, b.plum, {
            body: "body-darkplum",
            navbar: "darkseagreen",
            sidebar: "sidebar-color sidebar-darkcrimson",
            nav: " has-active-border has-active-arrow",
            shortcuts: "btn text-dark-tp3 btn-warning"
        }), b.gradient1 = jQuery.extend({}, b.green, {
            body: "body-darkblue2",
            navbar: "lightgrey",
            sidebar: "sidebar-color sidebar-gradient1"
        }), b.gradient2 = jQuery.extend({}, b.green, {
            body: "",
            navbar: "mediumseagreen",
            sidebar: "sidebar-color sidebar-gradient2",
            shortcuts: "btn-outline-purple border-2 btn-text-white radius-round"
        }), b.gradient3 = jQuery.extend({}, b.steelblue, {
            body: "body-lightblue3",
            navbar: "cadetblue",
            sidebar: "sidebar-color sidebar-gradient3",
            shortcuts: "btn-outline-green border-2 text-white radius-round",
            exclamation: "text-brown-l2",
            badge: "badge-danger badge-sm border-1 brc-white-tp2",
            "search-icon": "text-success-l3",
            "mic-icon": "text-white-tp2"
        }), b.gradient4 = jQuery.extend({}, b.steelblue, {
            body: "body-darkblue3",
            navbar: "blue",
            sidebar: "sidebar-color sidebar-gradient4"
        }), b.gradient5 = jQuery.extend({}, b.steelblue, {
            body: "body-img1",
            navbar: "burlywood",
            sidebar: "sidebar-color sidebar-gradient5",
            shortcuts: "btn-outline-warning border-2 btn-text-white radius-1",
            exclamation: "text-yellow-l3"
        });
        var m = !0,
            h = !0;

        function i(e, t) {
            var a = b[t];
            a = a || b.
            default, "auto" != o || "all" != l && "not-navbar" != l || u(document.body).addClass(a.body), a.navbar && h && u("#id-auto-match").prop("checked") && (m = !1, c(a.navbar)), h = !0, a.sidebar && e.addClass(a.sidebar), a["sidebar-inner"] && e.find(".sidebar-inner").addClass(a["sidebar-inner"]), a.nav && (e.find(".nav").addClass(a.nav), e.hasClass("sidebar-h") && (e.find(".nav").addClass("active-on-top"), "default" != t && (u("#id-full-height").prop("checked", !0), e.find(".container").removeClass("align-items-xl-end"), e.find(".nav").removeClass("nav-link-rounded")), ("default" == t || "light" == t || 0 <= t.indexOf("white")) && e.find(".sidebar-inner").addClass("border-b-1 brc-grey-l1")));
            var r = a.shortcuts || ["btn-success", "btn-info", "btn-warning", "btn-danger"];
            if (Array.isArray(r) && 1 != r.length)
                for (var n = e.find(".sidebar-shortcuts-mini").parent(), s = 0; s < 4; s++) n.find(".btn:nth-child(" + (s + 1) + ")").addClass(s < r.length ? r[s] : r[s - r.length]);
            else e.find(".sidebar-shortcuts-mini").parent().find(".btn").addClass(Array.isArray(r) ? r[0] : r);
            if (a.exclamation && e.find(".fa-exclamation-triangle").addClass(a.exclamation), a.badge && e.find(".badge:last").addClass(a.badge), a["search-icon"] && e.find(".fa.fa-search").addClass(a["search-icon"]), a["mic-icon"] && e.find(".fa.fa-microphone").addClass(a["mic-icon"]), a.footer && !window.isAceLayout3 && u("#sidebar-footer-bg").addClass(a.footer), window.isAceLayout2) {
                a.brand && e.find(".navbar-brand").addClass(a.brand), a["brand-icon"] && e.find(".fa-leaf").addClass(a["brand-icon"]), a["user-img"] && e.find("img").addClass(a["user-img"]), a["user-info"] && u("#id-user-info a").addClass(a["user-info"]), a["user-desc"] && u("#id-user-info div").addClass(a["user-desc"]);
                var i = u("#sidebar-header-brand1, #sidebar-header-brand2");
                i.removeClass(function(e, t) {
                    return (t.match(/(^|\s)(sidebar-|bgc-|bg-|brc-)\S*/g) || []).join("")
                });
                var d = u("#sidebar-footer");
                d.removeClass(function(e, t) {
                    return (t.match(/(^|\s)(sidebar-|bgc-|bg-|brc-)\S*/g) || []).join("")
                }), a["layout2-sidebar-header"] && i.addClass(a["layout2-sidebar-header"]), a["layout2-sidebar-footer"] && d.addClass(a["layout2-sidebar-footer"]), 0 <= a.sidebar.indexOf("sidebar-color") && (d.addClass(a.sidebar), 0 <= a.sidebar.indexOf("sidebar-gradient") && d.css("background-image", "none"))
            }
        }
        var p = {};

        function c(e) {
            e = e || "default";
            var t, a = u(".navbar");
            switch ((t = a).removeClass(function(e, t) {
                var a = t.match(/(^|\s)navbar-\S+/g);
                return ((a = a && a.filter(function(e) {
                    return !/navbar-fixed|navbar-sm|navbar-expand-lg/.test(e)
                })) || []).join("")
            }), t.find(".navbar-nav > .nav").removeClass(function(e, t) {
                return (t.match(/(^|\s)(nav-compact|border-0|has-active-border|mr-|m-|ml-|mx-)\S*/g) || []).join("")
            }).find("> .nav-item").removeClass(function(e, t) {
                return (t.match(/(^|\s)(mr-|m-|ml-|mx-)\S*/g) || []).join("")
            }).find("> a > .dropdown-caret").removeClass("d-none"), t.find(".navbar-brand, .navbar-brand span:last, .fa-leaf, .fa-search, .fa-flask, .fa-bell, #id-navbar-badge1, #id-navbar-badge2, .nav-user-name, #id-user-welcome, .navbar-nav > .nav > .nav-item > .nav-link,  .navbar-nav > .nav > .nav-item > .btn").removeClass(function(e, t) {
                return (t.match(/(^|\s)(btn-|bgc-|brc-|border-|text-|opacity-|m-|mx-|ml-|mr-|mt-|mb-|pl-|pr-|px-|p-|badge-)\S+/g) || []).join("")
            }), t.find('[data-toggle="sidebar"] , [data-toggle-mobile="sidebar"]').add(t.find(".fa-flask, .fa-bell").parent()).removeClass(function(e, t) {
                return (t.match(/(^|\s)(btn|btn-|brc-|text-|border-|(d-style))\S+/g) || []).join("")
            }).find(".bars").removeClass(function(e, t) {
                return (t.match(/(^|\s)(text-|bgc-|bg-)\S+/g) || []).join("")
            }), t.find(".fa-flask, .fa-bell").parent().removeClass(function(e, t) {
                return (t.match(/(^|\s)(d-)\S+/g) || []).join("")
            }), t.find("#id-navbar-user-image , .navbar-toggler img").removeClass(function(e, t) {
                return (t.match(/(^|\s)(brc-|border-|p-)\S+/g) || []).join("")
            }), t.find(".tmp--cloned").remove(), t.find(".dropdown-mega > .dropdown-menu").removeClass("mt-1px mt-0 border-t-0"), window.isAceLayout2 && u("#id-nav-post-btn").removeClass(function(e, t) {
                return (t.match(/(^|\s)(btn-|brc-)\S*/g) || []).join("")
            }), e) {
                case "light":
                    a.addClass("navbar-" + s), d(a, s);
                    break;
                case "dark":
                    a.addClass("navbar-" + n), d(a, n);
                    break;
                default:
                    a.addClass("navbar-" + e), d(a, e)
            }
        }

        function d(e, t) {
            var a = p[t];
            a = a || p.
            default, m && u("#id-auto-match").prop("checked") && a.sidebar && (h = !1, g(a.sidebar)), m = !0;
            var r = e.find(".navbar-nav > .nav");
            a.nav && r.addClass(a.nav), a["nav-item"] && r.find("> .nav-item").addClass(a["nav-item"]);
            var n = e.find(".navbar-brand");
            if (a.brand && n.addClass(a.brand), a["brand-icon"] && n.find(".fa-leaf").addClass(a["brand-icon"]), a["brand-subtext"] && n.find("span:last").addClass(a["brand-subtext"]), a.toggler) {
                var s = e.find('[data-toggle="sidebar"] , [data-toggle-mobile="sidebar"]');
                s.addClass(Array.isArray(a.toggler) ? a.toggler[0] : a.toggler).addClass("btn-burger"), Array.isArray(a.toggler), a.toggler[1] && s.find(".bars").addClass(a.toggler[1])
            }
            if (a.search && e.find('[data-target="#navbarSearch"]').addClass(a.search), a["search-icon"] && e.find(".fa.fa-search").addClass(a["search-icon"]), a["nav-item-flask"]) {
                var i = e.find(".fa-flask").parent();
                if (d = a["nav-item-flask"].match(/btn-(\w|\-)+/))(l = i.clone().insertAfter(i).addClass("d-lg-none tmp--cloned")).addClass("nav-link"), i.addClass("d-none d-lg-flex"), l.find(".fa").eq(0).addClass(d[0].replace("outline-", "") + " radius-round w-4 h-4 text-center pt-2");
                i.removeClass("nav-link").addClass(a["nav-item-flask"])
            }
            if (a["nav-item-bell"]) {
                var d, l;
                i = e.find(".fa-bell").parent();
                if (d = a["nav-item-bell"].match(/btn-(\w|\-)+/))(l = i.clone().insertAfter(i).addClass("d-lg-none tmp--cloned")).addClass("nav-link"), i.addClass("d-none d-lg-flex"), l.find(".fa").eq(0).addClass(d[0].replace("outline-", "") + " radius-round w-4 h-4 text-center pt-2");
                i.removeClass("nav-link").addClass(a["nav-item-bell"])
            }
            if (a["badge-bell"] && e.find("#id-navbar-badge1").addClass(a["badge-bell"]), a["badge-flask"] && e.find("#id-navbar-badge2").addClass(a["badge-flask"]), a["bell-icon"] && e.find(".fa-bell").addClass(a["bell-icon"]), a["flask-icon"] && e.find(".fa-flask").addClass(a["flask-icon"]), a["user-image"] && e.find("#id-navbar-user-image , .navbar-toggler img").addClass(a["user-image"]), a["user-name"] && e.find(".nav-user-name").addClass(a["user-name"]), a["user-welcome"] && e.find("#id-user-welcome").addClass(a["user-welcome"]), a.mega && e.find(".dropdown-mega > .dropdown-menu").addClass(a.mega), "lightgrey" == t) {
                var o = e.find(".navbar-brand").removeClass("d-none d-lg-block"),
                    b = o.clone();
                b.removeClass("text-white-tp1").addClass("text-dark-tp4 d-lg-none tmp--cloned").find(".fa-leaf").addClass("text-success-m1"), o.addClass("d-none d-lg-block"), o.after(b);
                var c = e.find(".btn-burger[data-toggle-mobile=sidebar]").find(".bars");
                b = c.clone().removeClass("text-white-tp1 d-none").addClass("text-dark-tp4 d-lg-none tmp--cloned"), c.addClass("d-none d-lg-block").after(b), window.isAceLayout2 && e.find(".btn-burger[data-toggle=sidebar]").addClass("btn-light-success btn-bold").find(".bars").removeClass("text-white-tp1").addClass("text-dark-tp4")
            } else e.find(".navbar-brand , .btn-burger[data-toggle-mobile=sidebar] .bars").removeClass("d-none d-lg-block");
            window.isAceLayout2 && a.button && u("#id-nav-post-btn").addClass(a.button + " btn-bold btn-sm")
        }
        p.
        default = {
            sidebar: "default",
            brand: "text-white",
            "search-icon": "text-white mr-n1",
            "nav-item-bell": "nav-link pl-lg-3 pr-lg-4",
            "badge-bell": "badge-sm badge-warning text-75 border-1 brc-white",
            "nav-item-flask": "nav-link pl-lg-3 pr-lg-4",
            "badge-flask": "badge-sm text-90 text-success-l3",
            "bell-icon": "mr-2 text-110",
            "flask-icon": "mr-1 text-110",
            toggler: ["", ""],
            "user-image": "brc-white-tp1 border-2",
            "user-welcome": "text-90",
            button: "btn-outline-default btn-h-white btn-a-white brc-white-tp3 btn-text-white"
        }, p.steelblue = jQuery.extend({}, p.default, {
            sidebar: "dark",
            "badge-bell": "badge-sm bgc-white text-orange-d2 text-75 border-0"
        }), p.purple = jQuery.extend({}, p.default, {
            sidebar: "lightpurple",
            "badge-bell": "badge-sm btn-yellow text-75 border-1 brc-white"
        }), p.plum = jQuery.extend({}, p.default, {
            sidebar: "lightpurple",
            nav: "nav-compact-2 has-active-border",
            "badge-bell": "badge-sm badge-warning mt-lg-n1 text-75 border-1 brc-white",
            "nav-item-flask": "nav-link pl-lg-3 pr-lg-4",
            "badge-flask": "badge-sm text-90 text-success-l3 mt-lg-n1 mr-lg-n1",
            "user-welcome": "opacity-1",
            "user-name": "mt-n1"
        }), p.orange = jQuery.extend({}, p.default, {
            sidebar: "cadetblue",
            "badge-bell": "badge-sm bgc-dark text-75 border-0",
            "badge-flask": "badge-sm text-dark-tp3 text-90"
        }), p.burlywood = jQuery.extend({}, p.default, {
            sidebar: "gradient5",
            nav: "nav-compact has-active-border mr-1",
            "badge-bell": "badge-sm bgc-white text-dark-tp2 text-75 border-0 mt-lg-n1",
            "badge-flask": "text-dark-tp3 text-90 mt-lg-n2 mr-lg-n1"
        }), p.darkseagreen = jQuery.extend({}, p.default, {
            sidebar: "dark",
            nav: "nav-compact has-active-border mr-1",
            "nav-item": "mr-lg-1",
            "badge-bell": "badge-sm btn-yellow text-75 mt-lg-n1 mr-lg-n1 border-0",
            "nav-item-flask": "nav-link pl-lg-3 pr-lg-3",
            "badge-flask": "badge-sm text-white text-90 mt-lg-n2 mr-lg-n2",
            "bell-icon": "text-white mr-lg-1 text-110"
        }), p.skyblue = jQuery.extend({}, p.default, {
            sidebar: "darkblue",
            nav: "border-0 has-active-border",
            "nav-item": "mr-lg-2px",
            "badge-bell": "badge-sm badge-warning border-1 brc-white text-80",
            "badge-flask": "badge-sm text-90"
        }), p.blue = jQuery.extend({}, p.skyblue, {}), p.secondary = jQuery.extend({}, p.default, {
            "badge-flask": "badge-sm text-white text-90"
        }), p.mediumseagreen = jQuery.extend({}, p.default, {
            sidebar: "darkblue",
            "badge-bell": "badge-sm bgc-warning-m2 text-75 text-dark-tp2",
            "badge-flask": "badge-sm bgc-warning-m2 text-75 text-dark-tp2 px-3px radius-round"
        }), p.teal = jQuery.extend({}, p.default, {
            sidebar: "cadetblue"
        }), p.cadetblue = jQuery.extend({}, p.default, {
            sidebar: "purple",
            nav: "has-active-border",
            "nav-item-flask": "btn btn-warning bgc-warning-tp3 pl-lg-3 pr-lg-4",
            "badge-bell": "badge-sm bgc-dark border-0 text-75",
            "badge-flask": "text-white-tp1 text-90",
            "user-image": "brc-white-tp3 border-2"
        }), p.white = jQuery.extend({}, p.default, {
            sidebar: "white2",
            nav: "has-active-border",
            brand: "text-grey",
            "brand-icon": "text-success",
            toggler: ["btn-h-white", "bgc-dark-tp3"],
            search: "px-2",
            "search-icon": "text-primary-l1",
            "badge-bell": "badge-info border-0 badge-sm text-80",
            "badge-flask": "text-danger text-80",
            "user-image": "brc-primary-m2 border-2 p-1px",
            mega: "mt-1px",
            button: "btn-outline-primary"
        }), p.white2 = jQuery.extend({}, p.white, {}), p.lightblue = {
            sidebar: "steelblue",
            nav: "nav-compact-2 mr-1 has-active-border",
            "nav-item": "mr-1",
            brand: "text-dark-tp2",
            "brand-icon": "text-success-m1",
            "brand-subtext": "text-orange-d2 opacity-1 text-90",
            toggler: ["btn-h-lighter-blue", "bgc-primary"],
            search: "px-2",
            "search-icon": "text-primary-m2",
            "nav-item-bell": "btn btn-warning px-lg-3",
            "badge-bell": "badge-danger badge-dot border-0",
            "nav-item-flask": "btn btn-success px-lg-3",
            "badge-flask": "badge-tr p-lg-1 text-75",
            "bell-icon": "text-110",
            "flask-icon": "text-110",
            "user-image": "brc-primary-m2 border-1 p-1px",
            "user-name": "mt-n2",
            "user-welcome": "opacity-1 text-85",
            mega: "mt-1px",
            button: "btn-outline-primary"
        }, p.lightpurple = {
            sidebar: "darkslateblue",
            nav: "nav-compact-2 mr-1 has-active-border",
            "nav-item": "mr-1",
            brand: "text-dark-tp3",
            "brand-icon": "text-purple-d1",
            toggler: ["btn-h-lighter-purple", "bgc-dark-tp3"],
            "search-icon": "text-dark-tp3",
            "nav-item-bell": "btn btn-purple px-lg-3",
            "badge-bell": "btn-yellow badge-dot p-0 mr-lg-2 mt-lg-2",
            "nav-item-flask": "btn btn-grey px-lg-3",
            "badge-flask": "badge-tr p-lg-1 text-75",
            "bell-icon": "text-110",
            "flask-icon": "text-110",
            "user-image": "brc-grey-tp3 border-1 p-1px",
            "user-name": "mt-n2 font-bolder",
            "user-welcome": "opacity-1 text-85",
            mega: "mt-1px",
            button: "btn-outline-purple"
        }, p.lightgreen = {
            sidebar: "green",
            nav: "nav-compact-2 mr-1 has-active-border",
            "nav-item": "mr-1",
            brand: "text-dark-tp2",
            "brand-icon": "text-success-m1",
            toggler: ["btn-h-white", "bgc-dark-tp3"],
            "search-icon": "text-orange-d1",
            "nav-item-bell": "btn btn-warning px-lg-3",
            "badge-bell": "bgc-white badge-dot p-0 mr-lg-2 mt-lg-2",
            "nav-item-flask": "btn btn-outline-danger px-lg-3",
            "badge-flask": "badge-tr p-lg-1 text-75 text-600",
            "bell-icon": "text-110",
            "flask-icon": "text-110",
            "user-image": "brc-grey-tp3 border-1 p-1px",
            "user-name": "mt-lg-n2 font-bolder",
            "user-welcome": "opacity-1",
            mega: "mt-0",
            button: "btn-outline-success"
        }, p.lightgrey = {
            sidebar: "cadetblue",
            nav: "nav-compact-2 mr-1 has-active-border",
            "nav-item": "mr-1",
            brand: "text-white-tp1",
            toggler: ["", "text-white-tp1"],
            "search-icon": "text-orange-d1",
            "nav-item-bell": "btn btn-purple px-lg-3",
            "badge-bell": "bgc-white badge-dot p-0 mr-lg-2 mt-lg-2",
            "nav-item-flask": "btn btn-outline-grey px-lg-3",
            "badge-flask": "badge-tr p-lg-1 text-75",
            "bell-icon": "text-110",
            "flask-icon": "text-110",
            "user-image": "brc-grey-tp3 border-1 p-1px",
            "user-name": "mt-lg-n2 text-600",
            "user-welcome": "opacity-1",
            mega: "mt-0",
            button: "btn-outline-default"
        }, p.lightyellow = {
            sidebar: "cadetblue",
            nav: "has-active-border",
            "nav-item": "mr-1px",
            brand: "text-dark-tp2",
            "brand-icon": "text-success",
            toggler: ["btn-h-light-yellow", "bgc-dark-tp3"],
            "search-icon": "text-brown-m2",
            "nav-item-bell": "btn btn-outline-purple pl-lg-3 pr-lg-4",
            "badge-bell": "badge-white text-75 brc-dark-tp3 border-1 badge-sm",
            "nav-item-flask": "btn btn-outline-success pl-lg-3 pr-lg-4",
            "badge-flask": "p-lg-1 text-85",
            "bell-icon": "text-110 mr-lg-2",
            "flask-icon": "text-110 mr-lg-1",
            "user-image": "brc-grey-tp3 border-1 p-1px",
            "user-name": "mt-n1",
            "user-welcome": "opacity-2",
            mega: "mt-1px",
            button: "btn-outline-success"
        }, p.khaki = {
            sidebar: "gradient5",
            nav: "has-active-border",
            "nav-item": "mr-1px",
            brand: "text-dark-tp2",
            "brand-icon": "text-dark-tp4",
            "brand-subtext": "text-85 ml-n1",
            toggler: ["btn-h-light-yellow", "bgc-dark-tp3"],
            "search-icon": "text-brown-m2",
            "nav-item-bell": "nav-link px-lg-3",
            "badge-bell": "text-85 border-0 badge-sm",
            "nav-item-flask": "nav-link px-lg-3",
            "badge-flask": "p-lg-1 text-85 badge-sm",
            "bell-icon": "text-110 mr-lg-2",
            "flask-icon": "text-110 mr-lg-2",
            "user-image": "brc-grey-tp3 border-1 p-1px",
            "user-name": "mt-n1",
            "user-welcome": "opacity-1 text-85",
            mega: "mt-1px",
            button: "btn-outline-dark"
        };
        var f = "";
        u('link[rel=stylesheet][href*="/bootstrap.css"], link[rel=stylesheet][href*="/bootstrap.min.css"]').each(function() {
            var e = u(this).attr("href");
            u(this).attr("data-rtl", -1 == e.indexOf(".min.css") ? "./dist/css/rtl/bootstrap.css" : "./dist/css/rtl/bootstrap.min.css"), f = u(this).attr("href")
        });
        var v = {};

        function x(n, s) {
            return new Promise(function(e, t) {
                if ("file:" == location.protocol) e();
                else if (v[n]) e();
                else {
                    var a = document.createElement("DIV");
                    a.innerHTML = '<div style="position: fixed !important; z-index: 2000; padding-top: 10rem;"\t\t\t\t\t\tclass="bgc-white position-tl w-100 h-100 text-center text-150 text-primary-m1">' + s + "</div>", document.body.appendChild(a), r = n, new Promise(function(e, t) {
                        var a = new XMLHttpRequest;
                        a.open("GET", r), a.onload = function() {
                            e(a.responseText)
                        }, a.onerror = function() {
                            t(a.statusText)
                        }, a.send()
                    }).then(function() {
                        v[n] = !0, a.parentNode.removeChild(a), e()
                    }).
                    catch(function() {
                        a.parentNode.removeChild(a), t()
                    })
                }
                var r
            })
        }

        function y() {
            var t = "";
            if (u('link[rel=stylesheet][href*="/ace.css"],link[rel=stylesheet][href*="/ace.min.css"]').each(function() {
                    t = u(this).attr("href").replace("ace.", "ace-themes.")
                }), !(0 < u('link[rel=stylesheet][href*="' + t + '"]').length)) {
                function a(e) {
                    var t = document.createElement("link");
                    t.setAttribute("rel", "stylesheet"), t.setAttribute("type", "text/css"), t.setAttribute("href", e), document.head.appendChild(t)
                }
                try {
                    x(t, "Loading themes stylesheet ... please wait ...").then(function() {
                        a(t)
                    })
                } catch (e) {
                    a(t)
                }
            }
        }
        var w = {}
    }(window.jQuery);