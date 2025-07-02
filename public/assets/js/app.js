

(function () {
    document.getElementById('menu').addEventListener('click', function (e) {
        e.preventDefault();
        document.body.classList.toggle("hide-sidebar");
        window.getSelection().removeAllRanges();
    }
)
})()
