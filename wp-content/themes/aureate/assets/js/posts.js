var ppp = frontend_ajax_object.ppp;
var pageNumber = 2;
var ajaxurl = frontend_ajax_object.ajaxurl;
var load_more = true;
var tagid = frontend_ajax_object.tagid;
var catid = frontend_ajax_object.catid;
var sync_call = true;

if(document.getElementsByClassName('blog-loader'))
{
    document.getElementsByClassName('blog-loader')[0].style.visibility = 'hidden';
}
// window.onload = function() {
//     load_posts(catid, tagid, pageNumber);
// }

function load_posts(catid,tagid, pageNumber) {
    var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax&catid=' + catid+'&tagid=' + tagid;
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {
            document.getElementsByClassName('blog-loader')[0].style.visibility = 'hidden';
            var response = JSON.parse(request.response);
            var response_html = response.html;
            load_more = response.load_more;
            document.getElementById("ajax-post-data").innerHTML = document.getElementById("ajax-post-data").innerHTML + response_html;
            sync_call = true;
        }
        else
        {
            document.getElementsByClassName('blog-loader')[0].style.visibility = 'visible';
            sync_call = false;
        }
    };
    request.overrideMimeType("application/json");
    request.open("POST", ajaxurl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(str);
};

// function handleClick(id) {
//     pageNumber = 1
//     document.querySelectorAll('.blog-catgeory-wrap span').forEach(ele => {
//         ele.classList.remove('active')
//     })
//     document.getElementById("cat_" + id).classList.add("active");
//     document.getElementById("ajax-post-data").innerHTML = '';
//     load_posts(id, pageNumber);
// }

document.addEventListener('scroll', function() {
    //var result_div = document.getElementById("ajax-post-data").scrollHeight;
    var wrap = document.getElementById('ajax-post-data');
    var contentHeight = wrap.offsetHeight;
    var yOffset = window.pageYOffset; 
    var y = yOffset + window.innerHeight;

    if(y >= (contentHeight))
    {
        if(load_more === true )
        {
            if(sync_call == true)
            {
                pageNumber = pageNumber + 1;
                load_posts(catid ,tagid, pageNumber);        
            }
        }
    }
});