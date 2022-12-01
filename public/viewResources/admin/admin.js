'use strict';

var _globalFunction={
    clickLink: function(url)
    {
        document.querySelector('#modalLoading').style.display = 'block';

        window.location.href=url;
    }
}