// AOS animation
AOS.init({
    duration: 600,
});

// case study video play
var video_play = document.getElementById('cs-play-video');
if (video_play) {
    var video = document.getElementById('cs-solution-video');
    video_play.addEventListener('click', function () {
        video_play.style.visibility = "hidden";
        video.controls = true;
        video.play();
    }, false);
}


//  Sticky header script
// window.onscroll = function() {
//     scrollFunction()
// };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("masthead").classList.add('sticky-header');
    } else {
        document.getElementById("masthead").classList.remove('sticky-header');
    }
}

/* Addded class on header */
const menu = document.querySelector('.site-header');
const humgurger = document.querySelector('.humgurger');
const bodytag = document.querySelector('body');
const htmltag = document.querySelector('html');
const btn = menu.querySelector('.humgurger');
btn.addEventListener('click', evt => {
    menu.classList.toggle('open');
    humgurger.classList.toggle('open');
    bodytag.classList.toggle('overflow-hidden');
    htmltag.classList.toggle('overflow-hidden');
});

// Added class on hover
// const submenu_arrow_hovers = document.querySelectorAll(".submenu_arrow");
// const bodytags = document.querySelector('html');

// submenu_arrow_hovers.forEach(submenu_arrow_hover => {
//     submenu_arrow_hover.addEventListener("mouseover", mOver, false);
//     submenu_arrow_hover.addEventListener("mouseout", mOut, false);
// });

// function mOver() {
//     bodytag.classList.add('overflow-hidden');
// }
// function mOut() {  
//     bodytag.classList.remove('overflow-hidden');
// }


/* On click add class to open */
const mediaQuery = window.matchMedia('(max-width: 991px)');
const submenu_arrows = document.querySelectorAll('.submenu_arrow');
const submenu_items = document.querySelectorAll('.sub-menu');


submenu_arrows.forEach(submenu_arrow => {

    submenu_arrow.addEventListener('click', function (event) {
        if (mediaQuery.matches) {

            var parent_node = event.target.parentElement;
            if (parent_node.classList.contains("submenu_arrow")) {
                if (submenu_arrow.classList.contains("sub-menu-active")) {
                    submenu_arrow.classList.remove("sub-menu-active");
                    submenu_arrow.classList.add("sub-menu-deactive");
                } else {
                    submenu_arrow.classList.add("sub-menu-active");
                    submenu_arrow.classList.remove("sub-menu-deactive");
                }
            }
        }
    });
});

function progressBarScroll() {
    let winScroll = document.body.scrollTop || document.documentElement.scrollTop,
        height = document.documentElement.scrollHeight - document.documentElement.clientHeight,
        scrolled = (winScroll / height) * 100;
    document.getElementById("progressBar").style.width = scrolled + "%";
}

window.onscroll = function () {
    scrollFunction();
    if (document.getElementById('progressBar')) {
        progressBarScroll();
    }
};

/* Contact form double click issue */
if (document.querySelector(".wpcf7-submit")) {
    var elements = document.getElementsByClassName("wpcf7-form");
    elements[0].addEventListener('submit', function () {
        document.getElementsByClassName('wpcf7-submit')[0].disabled = true;
    }, false);

    document.addEventListener('wpcf7invalid', function () {
        document.getElementsByClassName('wpcf7-submit')[0].disabled = false;
    }, false);

    document.addEventListener('wpcf7mailsent', function () {
        document.getElementsByClassName('wpcf7-submit')[0].disabled = false;
        var attach_ele_children = document.querySelectorAll('.file-name');
        if (attach_ele_children.length) {
            attach_ele_children.forEach(e => e.remove());
        }
    }, false);
}

if (document.getElementById('file')) {
    document.addEventListener('change', function (e) {
        if (e.target && e.target.id == 'file') {
            var fileName = e.target.files[0].name;
            var attach_ele = document.querySelector(".career-attach-main");
            if (attach_ele) {
                var attach_ele_children = document.querySelectorAll('.file-name');
                if (attach_ele_children.length) {
                    attach_ele_children.forEach(e => e.remove());
                }
                attach_ele.insertAdjacentHTML('afterend', '<span class="file-name text-primary col-md-12 mb-3 pb-md-1 file-name font-14">' + fileName + ' <a href="javascript:void(0);" class="text-primary" id="remove-file"></a></span>');
                //attach_ele.innerHTML = attach_ele.innerHTML + '<span class="file-name">'+fileName+' <a id="remove-file">X</a></span>';
            }
        }
    });
}

document.addEventListener('click', function (e) {
    if (e.target && e.target.id == 'remove-file') {
        document.getElementById("file").value = "";
        var attach_ele_children = document.querySelectorAll('.file-name');
        if (attach_ele_children.length) {
            attach_ele_children.forEach(e => e.remove());
        }
    }
});

/* Comment Form Validation */
if (document.querySelector(".comment-form")) {
    document.querySelector(".comment-form").addEventListener("submit", function (e) {
        if (this.elements.author) {
            var author = this.elements.author.value;
        }
        if (this.elements.email) {
            var email = this.elements.email.value;
        }
        if (this.elements.comment) {
            var comment = this.elements.comment.value;
        }
        var author_ele = document.querySelector(".comment-form-author");
        var email_ele = document.querySelector(".comment-form-email");
        var comment_ele = document.querySelector(".comment-form-comment");
        if (author_ele) {
            var author_ele_children = author_ele.querySelectorAll('.form-error');
            if (author_ele_children.length) {
                author_ele_children.forEach(e => e.remove());
            }
            if (author == '') {
                author_ele.innerHTML = author_ele.innerHTML + '<span class="form-error">Please enter Name<span>';
                e.preventDefault();
            }
        }
        if (email_ele) {
            var email_ele_children = email_ele.querySelectorAll('.form-error');
            if (email_ele_children.length) {
                email_ele_children.forEach(e => e.remove());
            }
            if (email == '') {
                email_ele.innerHTML = email_ele.innerHTML + '<span class="form-error">Please enter Email<span>';
                e.preventDefault();
            }
            else {
                if (!ALvalidateEmail(email)) {
                    email_ele.innerHTML = email_ele.innerHTML + '<span class="form-error">Please enter Valid Email<span>';
                    e.preventDefault();
                }
            }
        }
        if (comment_ele) {
            var comment_ele_children = comment_ele.querySelectorAll('.form-error');
            if (comment_ele_children.length) {
                comment_ele_children.forEach(e => e.remove());
            }


            if (comment == '') {
                comment_ele.innerHTML = comment_ele.innerHTML + '<span class="form-error">Please enter Comment<span>';
                e.preventDefault();
            }
        }
    });
}
function ALvalidateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

window.addEventListener('DOMContentLoaded', (event) => {
    if (document.querySelector(".htoc__toggle")) {
        if (document.querySelector('[data-htoc-state="expanded"]')) {
            document.querySelector('.htoc__toggle').click();
        }

        const ht_toc_title = document.querySelector('.htoc__title');
        ht_toc_title.addEventListener('click', () => {
            document.querySelector('.htoc__toggle').click();
        });
    }
});

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}


window.addEventListener('load', (event) => {
    var current_page = window.location.href;
    var cookie_name = 'last_visited_pages';
    var last_visited_pages = getCookie(cookie_name);
    var days = 1;
    if (last_visited_pages === null) {
        const last_visited_pages = [current_page];
        var json_str = JSON.stringify(last_visited_pages);
        setCookie(cookie_name, json_str, days);
    }
    else {
        var pages = JSON.parse(last_visited_pages);
        var total_page = pages.length;
        if (total_page < 10) {
            const newFirstElement = current_page;
            const newArray = [newFirstElement].concat(pages);
            let uniqueChars = newArray.filter((c, index) => {
                return newArray.indexOf(c) === index;
            });
            var json_str = JSON.stringify(uniqueChars);
            setCookie(cookie_name, json_str, days);

        }
        else {
            var pages = JSON.parse(last_visited_pages);
            let popped = pages.pop();
            const newFirstElement = current_page;
            const newArray = [newFirstElement].concat(pages);
            var json_str = JSON.stringify(newArray);
            setCookie(cookie_name, json_str, days);
        }
    }

    /*for thank you page*/
    var is_thank_you_page = frontend_ajax_object.is_thank_you_page;
    if (is_thank_you_page === 'yes') 
    {
        var cookie_ft_name = 'first_time';      
        var first_time = getCookie(cookie_ft_name);
        if(first_time == 'yes')
        {
            var cookie_ft_val = 'no';
            setCookie(cookie_ft_name, cookie_ft_val, '');
        }
    }

});


if (document.getElementById('videoelement')) {
    const videoElement = document.getElementById('videoelement');
    if (!videoElement.playing) {
        videoElement.muted = true;
        videoElement.controls = false;
        videoElement.autoplay = false;
        videoElement.play();
        //console.log("please play");
    }
    else {
        //console.log("playing");
    }
}

if (document.body.classList.contains('hyva-theme-development-page')) {
    var name = 'hyva-theme-development-ref';
    var value = 'MM22NYC';
    var exdate = '2022-10-05 23:59:59';
    expires = new Date(exdate).toUTCString();
    expires = "; expires=" + expires;
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Guides menus click add class js
if (document.querySelector('.mobile-guide-menu')) {
    let mobile_guide_menu = document.querySelector('.mobile-guide-menu');
    let guide_side_panel = document.querySelector('.guide-side-panel');
    mobile_guide_menu.addEventListener('click', function () {
        if (guide_side_panel.classList.contains("active") && mobile_guide_menu.classList.contains("active")) {
            guide_side_panel.classList.remove('active');
            mobile_guide_menu.classList.remove('active');
        } else {
            guide_side_panel.classList.add('active');
            mobile_guide_menu.classList.add('active');
        }
    });


    // 
    const scrollElements = document.querySelectorAll(".guides_next_prev_group");

    // let mobile_guide_menu = document.querySelector('.mobile-guide-menu');

    const elementInView = (el, dividend = 1) => {
        const elementTop = el.getBoundingClientRect().top;

        return (
            elementTop <=
            (window.innerHeight || document.documentElement.clientHeight) / dividend
        );
    };

    const elementOutofView = (el) => {
        const elementTop = el.getBoundingClientRect().top;

        return (
            elementTop > (window.innerHeight || document.documentElement.clientHeight)
        );
    };

    const displayScrollElement = (element) => {
        //   element.classList.add("scrolled");
        mobile_guide_menu.classList.add("visible");
    };

    const hideScrollElement = (element) => {
        mobile_guide_menu.classList.remove("visible");
        //   element.classList.remove("scrolled");
    };

    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el, 1.2)) {
                displayScrollElement(el);
            } else if (elementOutofView(el)) {
                hideScrollElement(el);
            }
        });
    };

    window.addEventListener("scroll", () => {
        handleScrollAnimation();
    });

    document.addEventListener('DOMContentLoaded', () => {
        handleScrollAnimation();
    });
}
document.addEventListener('DOMContentLoaded', () => {
    scrollFunction();
});

document.addEventListener( 'wpcf7mailsent', function( event ) {
    var thank_you_page = frontend_ajax_object.thank_you_page;
    if(thank_you_page)
    {
        var cookie_ft_name = 'first_time';
        var days = '';
        var cookie_val = 'yes';
        setCookie(cookie_ft_name, cookie_val, days);
        location = thank_you_page;
    }
}, false );