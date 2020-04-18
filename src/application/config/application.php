<?php
// No need to set protected access for members here
// only public or private access.

class Application extends Staticy
{
    function onStart() {
        date_default_timezone_set('UTC');
    }

    //function onStop() {}
}
