function blog_form_show() {
    document.getElementById('blog_form').style.display = 'Block';
}
function blog_form_hide() {
    document.getElementById('blog_form').style.display = 'none';
}
function blog_form_reset() {
    document.getElementById('blog_title').value = '';
    document.getElementById('blog_blog').value = '';
    // document.getElementsByClassName("mrx").innerHTML = "";

}